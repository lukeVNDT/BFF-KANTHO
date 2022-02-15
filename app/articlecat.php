<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class articlecat extends Model
{
    protected $table = "articlecategory";
    protected $filltable = ['articlecat_id','articlecat_name','articlecat_desc','created_at','updated_at'];
    protected $primaryKey = 'articlecat_id';
}
