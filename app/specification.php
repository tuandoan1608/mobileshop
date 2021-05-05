<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class specification extends Model
{
   use Notifiable;
   protected $table = 'specifications';
   protected $fillable = ['name', 'default', 'status', 'updated_at', 'created_at', 'deleted_at'];
   public function getspe($id)
   {
        
       return $this->hasMany(product_spetification::class,'spetification_id')->where('product_id',$id)->get();
   }
   public function getspes()
   {
        
       return $this->hasMany(product_spetification::class,'spetification_id');
   }
}
