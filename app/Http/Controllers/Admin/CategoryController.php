<?php

namespace Distribuidora\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Distribuidora\Http\Controllers\Controller;
use Distribuidora\Category;

class CategoryController extends Controller
{
    public function index()
    {
    	//Listar categorias de 10 en 10
        $categories = Category::orderBy('name')->paginate(10);
    	return view('admin.categories.index')->with(compact('categories')); //listado		
    }

    public function create()
    {
		return view('admin.categories.create'); //formulario de registro
    }
     
    public function store(Request $request)
    {
        
        $this->validate($request, Category::$rules, Category::$messages); 

    	//registrar en la bd
        Category::create($request->all()); // tipo de create se llama asignacion masiva o mass assignment

        //redireccion
        return redirect('/admin/categories');

    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit')->with(compact('category')); //formulario de edición
    }
     
    public function update(Request $request, Category $category)
    {
        
        $this->validate($request, Category::$rules, Category::$messages);    

        //actualizar datos de la bd
        $category->update($request->all());

        return redirect('/admin/categories');

    }

    public function destroy(Category $category)
    {

        $category->delete();// Elimina Producto

        return back();

    }
}
