<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;

class MarketPrice extends Eloquent
{
    //
    protected $connection = 'mongodb';
    protected $collection = 'market_price';

    //_id, title, tungay, denngay, dinhkem
}
