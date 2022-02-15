<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class feeship extends Model
{
    public $timestamps = false;
    protected $fillable = [
    	'fee_matp','fee_money'
    ];
    protected $primaryKey = 'fee_id';
    protected $table = 'feeship';

    public function city(){
    	return $this->belongsTo('App\city','fee_matp');
    }
}
