<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;

class Product extends Eloquent
{
    //
    protected $connection = 'mongodb';
    protected $collection = 'products';

    //_id, code, title, slug, id_product_category[]  description, contents, photos, prices, status, hot, id_user, id_seller, created_at, updated_at

    public function getRouteKeyName(){
      return 'slug';
    }
}
