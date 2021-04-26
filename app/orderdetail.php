<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderdetail extends Model
{
    protected $table='order_detail';
    protected $fillable=[
        'order_id','product_id','quantity','total_price'
    ];
}
