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
		// $query = $req->get('term','');
		// $product = product::where('product_name','LIKE','%'.$query.'%')->where('product_status',1)->get();
		// $data = [];

		// foreach ($product as $pro) {
		// 	$data[] = [
		// 		'product_name' => $pro->product_name,
		// 		'product_id' => $pro->product_id
		// 	];

		// }
		// if(count($data)){
		// 	return $data;
		// }
		// else
		// {
		// 	return ['product_name' => 'Không tìm thấy sản phẩm','product_id'=>''];
		// }
		$data = $req->all();
		if($data['query']){
			$product = product::where('product_status',1)->where('product_name','LIKE','%'.$data['query'].'%')->get();
			$output = '<ul class="dropdown-menu" style="display: inline-block; position: absolute;">';
			foreach ($product as $key => $value) {
				$output .= '
				<a class="dropdown-item" href="#>'.$value->product_name.'</a>';
			}
			$output .='</ul>';
			echo $output;

		}
		else
		{
			$output = '<ul class="dropdown-menu" style="display: inline-block; position: absolute;">';
			$output .= '
				<li><a href="#>Không tìm thấy sản phẩm phù hợp</a></li>';
			$output .='</ul>';
			echo $output;
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
