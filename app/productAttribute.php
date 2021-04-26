<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productAttribute extends Model
{
    protected $table='product_attribute';
    protected $fillable=['product_id','astributevalue_id','import_price','export_price','quantity','quantity_sell'];
    public function productsize(){
    	return $this->belongsTo(attributevalue_size::class,'attributevaluesize_id','id');
    }
    public function productcolor(){
    	return $this->belongsTo(attributevalue::class,'attributevalue_id','id');
    }
    public function productname(){
    	return $this->belongsTo(product::class,'product_id','id');
    }
}
