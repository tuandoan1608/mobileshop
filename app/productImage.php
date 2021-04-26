<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productImage extends Model
{
    protected $table='product_image';
    protected $fillable=['productattribute_id','image','product_id'];
    public function getcolorimg()
    {
        return $this->belongsTo('App\attributevalue','color_id','id');
    }
}
