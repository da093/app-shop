<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	//un producto pertenece a una categoria
    public function category()
    {
    	return $this->belongsto(Category::class);
    }

    //$public->images
    public function images(){
    	return $this->hasMany(ProductImage::class);
    }
}
