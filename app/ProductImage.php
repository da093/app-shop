<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //$productIamges->product
    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
