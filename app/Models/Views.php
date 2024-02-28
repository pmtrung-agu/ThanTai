<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;

class Views extends Eloquent
{
    //
    protected $connection = 'mongodb';
    protected $collection = 'views';

    protected $fillable = ['id', 'viewable','visitor','collection','viewed_at','updated_at', 'created_at'];
}
