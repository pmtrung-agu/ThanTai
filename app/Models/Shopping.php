<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;

class Shopping extends Eloquent
{
    //
    protected $connection = 'mongodb';
    protected $collection = 'shoppings';

    public function getRouteKeyName(){
      return 'slug';
    }
}
