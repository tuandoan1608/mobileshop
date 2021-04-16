<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class attributevalue extends Model
{
    protected $table='attribute_value';
    protected $fillable=['name','attribute_id','color'];
}
