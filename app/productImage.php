<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productImage extends Model
{
    protected $table='product_image';
    protected $fillable=['productattribute_id','image'];
}
