<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{    
        protected $guarded = [];

        protected $table = 'products';

        public function stock(){
            return $this->hasOne(ProductStock::class, 'product_id');
        }

        public function image(){
            return $this->hasOne(ProductImage::class, 'product_id');
        }

        public function users(){
            return $this->belongsToMany(User::class, 'products_users', 'product_id', 'user_id');
        }
}
