<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table='orders';
    protected $fillable=[
        'custommer_id','status','amount','firstname','lastname','address','phone','note','optionID','order_code'
    ];
    public function getcustomer()
    {
        return $this->belongsTo('App\custommer','custommer_id','id');
    }
}
