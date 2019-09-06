<?php

namespace Distribuidora;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	//un producto pertenece a una categoria
    public function category()
    {
    	return $this->belongsto(Category::class);
    }

    //$public->images
    public function images()
    {
    	return $this->hasMany(ProductImage::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
    	$featuredImage = $this->images()->where('featured', true)->first();
    	if (!$featuredImage) {
    		$featuredImage = $this->images()->first();

    		if ($featuredImage) {
    			return $featuredImage->url;
    		}

    		//default
    		return '/images/default.svg';
    	}
    }

    public function getCategoryNameAttribute()
    {
        if ($this->category)
            return $this->category->name;
        return 'General';
    }

    
}
