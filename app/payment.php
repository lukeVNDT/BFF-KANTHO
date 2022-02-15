<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $table = "payment";
    protected $filltable = ['id','order_id', 'customer_id', 'money','note','vnp_response_code','code_vnpay','code_bank','created_at','updated_at'];
}
