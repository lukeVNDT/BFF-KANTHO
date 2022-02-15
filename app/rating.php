<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
	public $timestamps = false;
     protected $table = "rating";
    protected $filltable = ['rating_id','star','rating_person', 'rating_content','rating_parent_id','product_id','product_name','rating_cusid','created_at'];
    protected $primaryKey = 'rating_id';
    public function product(){
    	return $this->belongsTo('App\product','product_id');
    }
    public function customer(){
    	return $this->belongsTo('App\customer','rating_cusid');
    }
    
}
