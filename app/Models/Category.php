<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;

class Category extends Eloquent
{
    //
    protected $connection = 'mongodb';
    protected $collection = 'categories';
}
