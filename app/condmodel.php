<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class condmodel extends Model
{
    
	public $timestamps = false;
     protected $table = "condition";
    protected $filltable = ['cond_id','cond_name', 'cond_value','created_at','updated_at'];
    protected $primaryKey = 'cond_id';
}
