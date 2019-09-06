<?php

namespace Distribuidora\Http\Controllers;

use Illuminate\Http\Request;
use Distribuidora\Category;

class TestController extends Controller
{
    public function welcome(){

    	$categories = Category::has('products')->get();
    	return view('welcome')->with(compact('categories'));
    }
}
