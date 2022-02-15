<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customerorder extends Model
{
     public $timestamps = false;
    protected $fillable = [
    	'order_id','customer_id','staff_id','shipping_id','order_status','total_price','created_at'
    ];
    protected $primaryKey = 'order_id';
    protected $table = 'customerorder';

    const STATUS_DONE = 2;
    const STATUS_DEFAULT = 1;

    public function customer(){
    	return $this->belongsTo('App\customer','customer_id');
    }
}
