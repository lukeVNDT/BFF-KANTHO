<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class province extends Model
{
    public $timestamps = false;
    protected $fillable = [
    	'name_qh', 'type', 'matp'
    ];
    protected $primaryKey = 'maqh';
    protected $table = 'district';

    public function city(){
    	return $this->belongsTo('App\city','matp');
    }
}
