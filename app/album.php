<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class album extends Model
{
    protected $table = "album";
    protected $filltable = ['album_name','album_image', 'product_id'];
    protected $primaryKey = 'album_id';
}
