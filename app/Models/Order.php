<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;

class Order extends Eloquent
{
    //
    protected $connection = 'mongodb';
    protected $collection = 'orders';

    //_id, code, customer(id_customer, hoten, dienthoai, email, diachi, ghichu), products(_id, id_sanpham, title, quantity, prices, discount, total, id_seller, status)

    //status = 0 - processing, 
    //status = 1 - delivery
    //status = 2 - cancel
}
