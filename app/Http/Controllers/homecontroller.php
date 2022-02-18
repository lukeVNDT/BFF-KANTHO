<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\product;
use App\slide;
use App\favorite;
use App\articlemodel;
use App\category;
use Illuminate\Support\Facades\Redirect;

class homecontroller extends Controller
{
	private $category;
	public function __construct(category $categories){
		$this->category = $categories;
	}
	public function recommendajax(Request $req){
		
		$data = $req->all();
		if($data['query']){
			$product = product::where('product_status',1)->where('product_name','LIKE','%'.$data['query'].'%')->get();
			return view('pages.component.recomendedsearch')->with(compact('product'));
		}
		
	}

	
    public function index(Request $req){
    	$category = category::orderBy('category_id', 'DESC')->get();

    	// $cate = $this->category->whereNull('parent_id')->get();
		
		// dd($cate);
    	$article = articlemodel::join('articlecategory','article.articlecat_id','=','articlecategory.articlecat_id')->orderBy('article_id','DESC')->get();
    	$slide = slide::orderBy('slide_sort','ASC')->where('slide_position',1)->take(3)->get();
    	$slide2  = slide::orderBy('slide_sort','ASC')->where('slide_position',2)->take(2)->get();
    	$slide3  = slide::orderBy('slide_sort','ASC')->where('slide_position',3)->take(3)->get();
    	$url_canonical = $req->url();
    	$cat = DB::table('category')->where('category_status','1')->orderby('category_id','desc')->get();
    	$brand = DB::table('brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
    	$product = product::orderby('product_id','desc')->limit(8)->get();
    	$hot_product = product::where('product_hot',1)->get();
    	return view('pages.home')->with(compact('hot_product','category', 'slide', 'slide2', 'slide3', 'url_canonical', 'brand', 'product','article'));
    }


}
