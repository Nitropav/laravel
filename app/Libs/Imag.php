<?php namespace App\Libs;

/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 19.05.2015
 * Time: 22:08
 */

use Image;
use Auth;

class Imag
{
    public function __construct()
    {
    }

    public function url($puth = null, $directory = null, $name = null)
    {
        set_time_limit(50000);
        if ($puth != null) {
            if($directory != null)
            {
                $dir = public_path() . $directory;
            }
            else{
                $dir = public_path().'/uploads/';
            }
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $img = Image::make($puth);
            if($name != null)
            {
                $filename = $name . '.jpg';
            }
           else{
               $filename = date('y-m-d-h-i-s').'.jpg';
           }
           // dd("<script>console.log(" . $filename . "  - asfd)</script>");
            $img->resize(990, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($dir . $filename);

            $img->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $pic_small = 's_' . $filename;
            $img->save($dir . $pic_small);

            $img->resize(70, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $pic_very_small = 'ss_' . $filename;
            $img->save($dir . $pic_very_small);

            return $filename;
        } else {
            return false;
        }
    }

    public function dirDel($dir)
    {
        $d = opendir($dir);
        while (($entry = readdir($d)) !== false) {
            if ($entry != "." && $entry != "..") {
                if (is_dir($dir . "/" . $entry)) {
                    dirDel($dir . "/" . $entry);
                } else {
                    unlink($dir . "/" . $entry);
                }
            }
        }
        closedir($d);
        rmdir($dir);
    }
}