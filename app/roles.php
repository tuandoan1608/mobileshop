<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    protected $guarded=[];
    protected $table='roles';
    protected $fillable = [
        "id",
        "name",
        "display_name",
    ];
    public function permissions()
    {
        return $this->belongsToMany(roles::class,'permission_role','role_id','permission_id');
    }
    
}
