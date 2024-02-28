<?php
namespace App\Models;
use MongoDB\Laravel\Eloquent\Model as Eloquent;
//use Illuminate\Database\Eloquent\Model;

class Address extends Eloquent
{
    //
    protected $connection = 'mongodb';
    protected $collection = 'address';

}
