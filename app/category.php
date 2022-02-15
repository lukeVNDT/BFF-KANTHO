<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = "category";
    protected $primaryKey = 'category_id';
    protected $fillable = ['category_name', 'category_desc','parent_id','category_status'];

    public function childs(){
    	return $this->hasMany('App\category', 'parent_id');
    }
    public function productCount(){
        return $this->hasMany('App\product', 'category_id');
    }
}
