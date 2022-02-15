<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderdetail extends Model
{
    public $timestamps = false;
    protected $fillable = [
    	'order_code','product_id','product_name','product_price','productsales_quantity','product_coupon','product_feeship'
    ];
    protected $primaryKey = 'orderdetails_id';
    protected $table = 'order_details';
    public function product(){
    	return $this->belongsTo('App\product','product_id');
    }
    
}
