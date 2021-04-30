<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Faker\Generator as Faker;
class product extends Model
{
    use Notifiable;
    protected $table='product';
    protected $fillable=['name','slug','price','discount','content','lower_name','image','category_id','producttype_id','startdate','enddate','startsale'];
    public function category(){
    	return $this->belongsTo('App\category','category_id','id');
    }
    public function producttype(){
    	return $this->belongsTo('App\producttype','producttype_id','id');
    }
 
    public function getnamespe()
    {
        return $this->belongsTo(specification::class,'spetification_id','id');
    }



   
}
