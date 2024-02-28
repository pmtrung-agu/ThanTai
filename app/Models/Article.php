<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;

class Article extends Eloquent
{
    //
    protected $connection = 'mongodb';
    protected $collection = 'articles';
}
