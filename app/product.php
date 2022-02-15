<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public $timestamps = false;
    protected $filltable = ['product_name', 'category_id', 'brand_id', 'product_desc', 'product_content', 'product_price', 'product_img', 'product_status','product_hot','created_at','updated_at'];
    protected $primaryKey = 'product_id';
    protected $table = 'product';

    public function brand(){
        return $this->belongsTo('App\brand', 'brand_id');
    }
    public function category(){
        return $this->belongsTo('App\category', 'category_id');
    }
}