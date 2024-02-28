<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;

class ProductCategory extends Eloquent
{
    //
    protected $connection = 'mongodb';
    protected $collection = 'product_categories';

    public function getRouteKeyName(){
      return 'slug';
    }
}
