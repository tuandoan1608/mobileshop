<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productAttribute extends Model
{
    protected $table='product_attribute';
    protected $fillable=['product_id','astributevalue_id','import_price','export_price','quantity','quantity_sell'];
}
