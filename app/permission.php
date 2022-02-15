<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    public $timestamps = false;
    protected $table = "permissions";
    protected $filltable = ['id','name','parent_id', 'created_at','updated_at'];
    protected $primaryKey = 'id';

    public function hasChild(){
    	return $this->hasMany(permission::class, 'parent_id');
    }
}
