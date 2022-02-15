<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class slide extends Model
{
    protected $fillable = [
    	'slide_name', 'slide_link','slide_content','slide_image','slide_position','slide_sort','staff_id','created_at','updated_at'
    ];
    protected $primaryKey = 'slide_id';
    protected $table = 'slide';
}
