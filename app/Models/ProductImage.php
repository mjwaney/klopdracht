<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{	
        protected $table = 'products_image';

        public function product(){
        	return $this->belongsTo(Product::class, 'product_id');
        }
}
