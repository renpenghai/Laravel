<?php

namespace App\Http\Controllers;

class memberController extends Controller
{
	public function info()
	{
		return view('member/info',['name' => '我是名称','age'=>19]);
	}
}