<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class attributevalue_size extends Model
{

    protected $table='attribute_value_size';
    protected $fillable=['name','attribute_id',];
    public function attributesize(){
    	return $this->belongsTo('App\attribute','attribute_id','id');
    }
}
