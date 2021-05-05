<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permission_roles extends Model
{
    protected $table='permission_role';
    protected $fillable = [
        "id",
        "role_id",
        "permission_id",

    ];
}
