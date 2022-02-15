<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    public $timestamps = false;
    protected $fillable = [
    	'customer_name', 'customer_email','customer_password','customer_phone','isban'
    ];
    protected $primaryKey = 'customer_id';
    protected $table = 'customer';
}
