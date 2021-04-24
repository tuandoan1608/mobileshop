<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productAttribute extends Model
{
    protected $table='product_attribute';
    protected $fillable=['product_id','astributevalue_id','import_price','export_price','quantity','quantity_sell'];
    public function productsize(){
    	return $this->belongsTo('App\attributevalue_size','attributevaluesize_id','id');
    }
    public function productcolor(){
    	return $this->belongsTo('App\attributevalue','attributevalue_id','id');
    }
}
