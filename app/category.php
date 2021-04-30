<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table='category';
    protected $fillable = [
        "id",
        "name",
        "slug",
        "parent_id",
        "status",
        
    ];
    public function categorychildrent(){
        return $this->hasMany(category::class,'parent_id')->where('status',1);
    }
    public function categoryproduct(){
        return $this->hasMany(product::class,'category_id')->where('status',1);
    }
}
