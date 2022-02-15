<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use App\customerorder;
use Session;
use App\detailsorder;
use App\coupon;

class membercontroller extends Controller
{

	public function logout(){
		Session::forget('customer_id');
		echo "done";
	}
	public function getallinfocus(Request $req){
		$info = customer::where('customer_id',$req->customer_id)->get();
		$html = view("pages.component.fieldpayment")->with(compact('info'))->render();
			return response([
				"html"=>$html]);
	}
	public function viewdetail(Request $req, $id){
		if($req->ajax()){
			$order_detail = detailsorder::join('product','detailsorder.product_id','=','product.product_id')->join('feeship','detailsorder.fee_id','=','feeship.fee_id')->join('customerorder','detailsorder.order_id','=','customerorder.order_id')->join('shipping','customerorder.shipping_id','=','shipping.shipping_id')->where('detailsorder.order_id',$id)->get();
			// dd($order_detail);
			foreach ($order_detail as $key => $value) {
				$order_id = $value->order_id;
				$order_status = $value->order_status;
				$shipping_method = $value->shipping_method;
				$fee_money = $value->fee_money;
				$product_coupon = $value->product_coupon;
			}
			 if($product_coupon!='không có coupon'){
	        $coupon = coupon::where('coupon_code',$product_coupon)->first();
	        $coupon_cond = $coupon->coupon_cond;
	        $coupon_money = $coupon->coupon_method;
	        }else{
	            $coupon_cond = 2;
	            $coupon_money = 0;
	        }
			$html = view("pages.component.tableorderdetail")->with(compact('order_detail','order_id','order_status','shipping_method','fee_money','coupon_cond','coupon_money'))->render();
			return response([
				"html"=>$html]);
		}
	}
    public function index($cusid){
    	$customer = customer::where('customer_id',$cusid)->get();
    	return view('pages.member.contentprofile')->with(compact('customer'));
    }
    public function update(Request $req){
    	$member = customer::find($req->customer_id);
    	$member->customer_name = $req->name;
    	$member->customer_phone = $req->phone;
    	$member->customer_address = $req->dc;
    	$member->update();
    	echo "done";
    }
    public function fl(){
    	$order = customerorder::join('customer','customer.customer_id','=','customerorder.customer_id')->where('customerorder.customer_id',Session::get('customer_id'))->orderby('customerorder.created_at','DESC')->paginate(7);
    	return view('pages.member.florder')->with(compact('order',$order));
    }
}
