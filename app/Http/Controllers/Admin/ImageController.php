<?php

namespace Distribuidora\Http\Controllers\Admin;

use Distribuidora\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Distribuidora\Product;
use Distribuidora\productImage;
use File;

class ImageController extends Controller
{
    public function index($id)
    {
    	$product = Product::find($id);
    	$images = $product->images()->orderBy('featured', 'desc')->get();
    	return view('admin.products.images.index')->with(compact('product', 'images'));
    }

    public function store(Request $request, $id)
    {
        //guardar la img en nuestro proyecto
    	$file = $request->file('photo');
    	$path = public_path() . '/images/products';
    	$fileName = uniqid() . $file->getClientOriginalName();
    	$moved = $file->move($path, $fileName);

        //crear 1 registro en la tabla product_images
        if ($moved) {
	        $productImage = new productImage();
	        $productImage->image = $fileName;
	        //imagen destacada por defecto
	        //$productImage->featured = false;
	        
	        $productImage->product_id = $id;
	        $productImage->save(); //INSERT
        }
        
        return back();
    }

    public function destroy(Request $request, $id)
    {
    	//eliminar el archivo
    	$productImage = productImage::find($request->image_id);
    	if (substr($productImage->image, 0, 4) === "http" ) {
    		$deleted = true;
    	} else {
    		$fullPath = public_path() . '/images/products/' . $productImage->image;
    		$deleted = File::delete($fullPath);
    	}
    	//eliminar el registro de la bd
    	if ($deleted) {
    		$productImage->delete();
    	}
    	return back();
    }

    public function select($id, $image)
    {
    	ProductImage::where('product_id', $id)->update([
    		'featured' => false
    	]);

    	$productImage = ProductImage::find($image);
    	$productImage->featured = true;
    	$productImage->save();


 		return back();
    }


}
