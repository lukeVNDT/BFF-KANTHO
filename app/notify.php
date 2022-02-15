<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notify extends Model
{
    public $timestamps = false;
    protected $fillable = [
    	'notify_type','notify_content','link','read_at','created_at','updated_at'
    ];
    protected $primaryKey = 'id';
    protected $table = 'notify';
}
