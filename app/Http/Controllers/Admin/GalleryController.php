<?php

namespace App\Http\Controllers\Admin;
use App\Gallery;
use Auth;
use App\Http\Controllers\Controller;

class GalleryController extends Controller {

	/**
	 * Index page
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index()
    {
		return view('admin.gallery.index');
	}
public function postindex()
{
    $pic=\App::make(\App\Libs\Imag::class)
        ->url($_FILES['picture1']['tmp_name']);
    if($pic)
    {
        $picture=$pic;
    }
    else{
        $picture='';
    }
    $abs = new Gallery;
    $abs -> name = $_POST['name'];
    $abs -> picture = $picture;
    $abs -> user_id = Auth::user()->id;
    $abs -> status = '';
    $abs -> save();
    return redirect()->back();
}
}
