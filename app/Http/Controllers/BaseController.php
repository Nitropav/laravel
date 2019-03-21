<?php

namespace App\Http\Controllers;
use App\Maintext;


class BaseController extends Controller
{
    public function getIndex()
	{
		return view('welcome');
	}
	public function getStatic($url=null)
	{
		$obj=Maintext::where('url',$url)->first();
		return view('static',compact('obj'));
	}
}
