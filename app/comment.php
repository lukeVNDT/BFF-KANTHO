<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
	public $timestamps = false;
     protected $table = "comment";
    protected $filltable = ['comment_id','comment', 'comment_person','comment_date','comment_product_id'];
    protected $primaryKey = 'comment_id';
}
