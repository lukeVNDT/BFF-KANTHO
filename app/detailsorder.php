<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailsorder extends Model
{
    public $timestamps = false;
    protected $fillable = [
    	'product_name','product_price','productsales_quantity','product_coupon','fee_id','fee_if_not_exist','order_id','product_id'
    ];
    protected $primaryKey = 'orderdetails_id';
    protected $table = 'detailsorder';
    public function product(){
    	return $this->belongsTo('App\product','product_id');
    }
    public function feeship(){
    	return $this->belongsTo('App\feeship','fee_id');
    }
    public function customerorder(){
        return $this->belongsTo('App\customerorder','order_id');
    }
}
