<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;

class MailList extends Eloquent
{
    //
    protected $connection = 'mongodb';
    protected $collection = 'mail_list';
}
