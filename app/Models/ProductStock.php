<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{	
        protected $table = 'products_stock';

        public function product(){
        	return $this->belongsTo(Product::class, 'product_id');
        }
}
