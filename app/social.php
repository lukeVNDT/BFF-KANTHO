<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class social extends Model
{
    public $timestamps = false;
    protected $fillable = [
          'provider_user_id',  'provider',  'user', 'provider_user_email'
    ];
 
    protected $primaryKey = 'user_id';
 	protected $table = 'social';
 	public function customer(){
 		return $this->belongsTo('App\customer', 'user');
 	}

}
