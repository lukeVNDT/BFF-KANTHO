<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
    public $timestamps = false;
     protected $table = "favorite";
    protected $filltable = ['favorite_id','customer_id','product_id'];
    protected $primaryKey = 'favorite_id';
    public function product(){
    	return $this->belongsTo('App\product','product_id');
    }
}
