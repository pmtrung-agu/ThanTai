<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;

class Logistic extends Eloquent
{
    //
    protected $connection = 'mongodb';
    protected $collection = 'logistics';
}
