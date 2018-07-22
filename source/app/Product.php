<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function productImages()
    {
    	return $this->hasMany(ProductImage::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
    	$featuredImage = $this->productImages()->where('featured', true)->first();
    	if (!$featuredImage)
    		$featuredImage = $this->productImages()->first();
    	
    	if ($featuredImage) {
    		return $featuredImage->url;
    	}

    	// default Imagen
    	return '/images/products/default.jpg';
    }
}
