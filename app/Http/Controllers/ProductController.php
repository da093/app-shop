<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
    	return view('admin.products.index'); //listado		
    }

    public function create()
    {
		return view('admin.products.create'); //formulario de registro
    }
     
    public function store()
    {
    	//registrar el nuevo producto en la bd
    }
}
