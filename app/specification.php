<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class specification extends Model
{ use Notifiable;
   protected $table='specifications';
   protected $fillable=['product_id','Display','Camera_front','Camera_rear','Band','Sim','Wifi','Security','Ram','Chip','battery',
'Mass','Design','Operating','Menmory','updated_at','created_at'];
}
