<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class roles extends Model
{
	use SoftDeletes;

    public $timestamps = false;
    protected $table = "roles";
    protected $fillable = ['id','name','display_name', 'created_at','updated_at'];
    protected $primaryKey = 'id';

    public function permissions(){
    	return $this->belongsToMany(permission::class, 'permissions_role', 'role_id', 'permission_id');
    }
}
