<?php

namespace App\Http\Controllers\Admin;

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
    dd($_POST);
}
}
