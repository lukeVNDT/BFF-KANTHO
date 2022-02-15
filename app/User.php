<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $timestamps = false;
    protected $table = 'staff';
    protected $fillable = [
        'staff_id','email','staff_mailbox','staff_name','password','staff_avatar','staff_phone','staff_address',
    ];
    protected $primaryKey = 'staff_id';

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

    public function roles(){
        return $this->belongsToMany(roles::class, 'user_role', 'staff_id', 'role_id');
    }

    public function checkPermission($permissionCheck){
        //lay tat ca cac role cua user
        $role = auth()->user()->roles;
        foreach ($role as $roles) {
            $permission = $roles->permissions;
            //so sanh role cua user co giong quyen cua middleware route hay khong
            if($permission->contains('key_code', $permissionCheck)){
                return true;
            }
        }
        return false;
    }
}
