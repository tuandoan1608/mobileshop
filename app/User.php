<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;
    protected $table='users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'email', 'password','address','created_at','updated_at','phone','lastname',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles()
    {
        return $this->belongsToMany(roles::class,'user_roles','user_id','user_role');
    }
    public function checkPermissionAccess($permissions)
    {
        $roles=auth()->user()->roles;
      
        foreach($roles as $role){
            $permission=permission_roles::where('role_id',$role->id)->join('permission','permission_role.permission_id','=','permission.id')
            ->select('permission.key_permission')->get();
           
            
            if($permission->contains('key_permission',$permissions)){
                return true;
            }
            
        }
       
        return false;
    }
}
