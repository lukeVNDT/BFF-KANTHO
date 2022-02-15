<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    public $timestamps = false;
    protected $fillable = [
    	'coupon_name','coupon_date_start','coupon_date_end', 'coupon_code', 'coupon_time', 'coupon_method', 'coupon_cond','coupon_status','coupon_used','staff_id'
    ];
    protected $primaryKey = 'coupon_id';
    protected $table = 'coupon';
}
