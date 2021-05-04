<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class attribute extends Model
{
    protected $table='attribute';
    protected $fillable=['name'];
    public function getattributesize()
    {
        return $this->hasMany(attributevalue::class,'attribute_id');
    }
    public function getattributecolor()
    {
        return $this->hasMany(attributevalue_size::class,'attribute_id');
    }
}
