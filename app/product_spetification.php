<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class product_spetification extends Model
{
    protected $table='product_spetification';
    protected $fillable=[
        'product_id','spetification_id','content'
    ];
   public function spename()
   {
       return $this->belongsTo(specification::class,'spetification_id','id');
   }
   
}
