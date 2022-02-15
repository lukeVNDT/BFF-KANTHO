<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    public $timestamps = false;
     protected $table = "contact";
    protected $filltable = ['info_contact','info_fanpage','contact_img','contact_map','contact_phone','contact_email','created_at','updated_at'];
    protected $primaryKey = 'contact_id';
}
