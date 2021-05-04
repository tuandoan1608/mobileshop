<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    protected $table='permission';
    protected $fillable = [
        "id",
        "name",
        "displayname",
        "parent_id",
        "key_permission",
    ];
    public function permissionChildrent()
    {
        return $this->hasMany(permission::class,'parent_id');
    }
   
}
