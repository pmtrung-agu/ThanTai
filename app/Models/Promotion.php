<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;

class Promotion extends Eloquent
{
    //
    protected $connection = 'mongodb';
    protected $collection = 'promotions';
}
