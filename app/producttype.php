<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class producttype extends Model
{
    use Notifiable;
    protected $table='producttype';
    protected $fillable= ['name','slug','status','categori_id'];
    public function category(){
    	return $this->belongsTo('App\category','categori_id','id');
    }
}
