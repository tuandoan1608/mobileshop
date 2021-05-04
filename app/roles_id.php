<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles_id extends Model
{
    protected $table='user_roles';
    protected $fillable = [
        "id",
        "user_id",
        "user_role",
      
        
    ];
}
