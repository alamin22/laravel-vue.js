<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Myclass\myTest;

class AddClassController extends Controller
{
    function addClass(){
		$data = new myTest();
		$est = $data->displayData();
		return view('add-class',compact('est'));
	}
}
