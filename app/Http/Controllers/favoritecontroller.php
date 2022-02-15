<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\favorite;
use Session;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class favoritecontroller extends Controller
{
	public function deletefavorite(Request $req, $id){
		if($req->ajax()){
			$favorite = favorite::with('product')->where('favorite.product_id',$id)->delete();
		}
	}
	public function addfavorite(Request $req){
		$product_id = $req->product_id;
		$customer_id = $req->customer_id;
		$count_favorite = favorite::where('product_id', $product_id)->where('customer_id', $customer_id)->count();
		// dd($count_favorite, $count2_favorite);
		$done = "";
		$fail = "";
		$require = "";
		if($req->ajax()){
			if($customer_id == ''){
				$message = "Bạn cần phải đăng nhập để yêu thích sản phẩm!";
				$require = "require";
			}
			else{
			
				if($count_favorite == 0){
					$favorite = new favorite;
					$favorite->customer_id = $customer_id;
					$favorite->product_id = $product_id;
					$favorite->save();
					$message = "Thêm sản phẩm yêu thích thành công";
					$done = "done";
				}
				elseif($count_favorite > 0) {
					favorite::where('customer_id', $customer_id)->where('product_id', $product_id)->delete();
					$message = "Đã bỏ yêu thích sản phẩm";
					$fail = "fail";
				}
			
			
			
		}
		
		}
		return response(['message'=>$message,'done' => $done,'fail'=>$fail, 'require'=>$require]);
			
		
}
	public function paginate(Request $req){
		$fv = favorite::with('product')->where('customer_id',Session::get('customer_id'))->orderBy('favorite_id','DESC')->paginate(5);
		return view('pages.component.tablefavorite')->with(compact('fv'));
	}
	public function initialdata(){
		$fv = favorite::with('product')->where('customer_id',Session::get('customer_id'))->orderBy('favorite_id','DESC')->paginate(5);
		return view('pages.component.tablefavorite')->with(compact('fv'));
	}
    public function listfavorite(){
    	$fv = favorite::with('product')->where('customer_id',Session::get('customer_id'))->paginate(5);
    	$html = view('pages.member.listfavorite')->with(compact('fv'))->render();
    	return $html;   
    }
}
