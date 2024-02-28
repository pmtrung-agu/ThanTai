<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;

class Visit extends Eloquent
{
    //
    protected $connection = 'mongodb';
    protected $collection = 'visits';

    protected $fillable = ['_id', 'day','week', 'month','year', 'date_text', 'server_info', 'created_date', 'updated_date'];

}
