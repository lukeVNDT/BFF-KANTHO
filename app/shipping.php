<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shipping extends Model
{
    public $timestamps = false;
    protected $fillable = [
    	'shipping_cusname', 'shipping_address', 'shipping_email', 'shipping_phone', 'shipping_notes','shipping_method'
    ];
    protected $primaryKey = 'shipping_id';
    protected $table = 'shipping';
}
