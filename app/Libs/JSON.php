<?php namespace App\Libs;

/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 19.05.2015
 * Time: 22:08
 */

use App\Product;

class JSON
{
    public function __construct()
    {
    }

    public function url($data)
    {
        $all = Product::where('cat_id', $data->id)->where('showhide','show')->get();
        $arr = [];
        foreach ($all as $key=>$one) {
            $arr[$key]['id']=$one->id;
            $arr[$key]['name']=$one->name;
            $arr[$key]['author']=$one->icon_picture;
            $arr[$key]['genre']=$one->cat_id;
            $arr[$key]['year']=$one->price_min;
        }

        return response()->json($arr);
    }
}