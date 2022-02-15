<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class articlemodel extends Model
{
    protected $table = "article";
    protected $filltable = ['article_id','article_name','articlecat_id','article_desc','article_avatar','article_content','staff_id','created_at','updated_at'];
    protected $primaryKey = 'article_id';
    public function articlecategory(){
    	return $this->belongsTo(articlecat::class,'articlecat_id');
    }
    public function adminmodel(){
    	return $this->belongsTo('App\adminmodel','staff_id');
    }
}
