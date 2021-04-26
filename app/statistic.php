<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class statistic extends Model
{
    protected $table='statistical';
    protected $fillable=[
        'order_date','sales','profit','quantity','total_order'
    ];
}
