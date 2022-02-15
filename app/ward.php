<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ward extends Model
{
    public $timestamps = false;
    protected $fillable = [
    	'name_xptt', 'type', 'maqh'
    ];
    protected $primaryKey = 'xaid';
    protected $table = 'ward';

    public function quanhuyen(){
    	return $this->belongsTo('App\province','maqh');
    }
}
