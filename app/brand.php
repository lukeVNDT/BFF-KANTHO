<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $primaryKey = 'brand_id';
    protected $table = "brand";
    protected $filltable = ['brand_id','brand_name', 'brand_desc', 'brand_status'];
}
