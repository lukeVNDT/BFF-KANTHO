<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public $timestamps = false;
    protected $fillable = [
    	'customer_id','shipping_id','order_status','order_code','created_at'
    ];
    protected $primaryKey = 'order_id';
    protected $table = 'order';
    
}