<?php

namespace Distribuidora\Http\Controllers;

use Illuminate\Http\Request;
use Distribuidora\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
    	$products = $category->products()->paginate(10);
    	return view('categories.show')->with(compact('category', 'products'));
    }
}
