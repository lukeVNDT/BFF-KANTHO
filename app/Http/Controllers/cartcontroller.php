<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cart;
use App\coupon;
use Carbon\Carbon;

class cartcontroller extends Controller
{
    public function savecart(Request $req){
    	// $productid = $req->productid_hidden;
    	// $quantity = $req->product_quantity;
    	// $productinfo = DB::table('product')->where('product_id',$productid)->first();
    	// // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
    	// $data['id'] = $productinfo->product_id;
    	// $data['qty'] = $quantity;
    	// $data['name'] = $productinfo->product_name;
    	// $data['price'] = $productinfo->product_price;
    	// $data['weight'] = $productinfo->product_price;
    	// $data['options']['image'] = $productinfo->product_img;
    	// Cart::add($data);
    	Cart::destroy();
    	return Redirect::to('/showcart');
    }
    public function showcart(){
    	return view('pages.cart.cart');
    }
    public function deletecartitem($rowId){
    	Cart::update($rowId,0);
    	return Redirect::to('/showcart');
    }
    public function updatequantity(Request $req){
    	Cart::update($req->rowId,$req->qty);
    	return Redirect::to('/showcart');
    }
    public function addcart(Request $req, $product_id){
    	$product = DB::table('product')->where('product_id',$product_id)->first();
    	if($product != null){
    		$currentcart = Session('cart') ? Session('cart') : null;
    		$newcart = new cart($currentcart);
    		$newcart->addtocart($product, $product_id);
    		dd($newcart);
    	// 	$req->session()->put('cart', $newcart);
    	// 	dd(Session('cart'));
    	}
    }
    public function addajax(Request $req){
    	$data = $req->all();
    	// dd($data);
    	$session_id = substr(md5(microtime()), rand(0,26),5);
    	$cart = Session::get('cart');
    	if($cart==true){
    		$available = 0;
    		foreach ($cart as $key => $value) {
    			if($value['product_id']==$data['cart_product_id']){
    				$available++;
                    $cart[$key] = array(
                'session_id' => $value['session_id'],
                'product_name' =>$value['product_name'],
                'product_id' =>$value['product_id'],
                'product_img' =>$value['product_img'],
                'product_quantity' =>$value['product_quantity'],
                'product_price' =>$value['product_price'],
                'product_qty' =>$value['product_qty']+$data['cart_product_qty'],
            );
                Session::put('cart',$cart);
    			}
    		}
    		if ($available == 0) {
    			$cart[] = array(
    			'session_id' => $session_id,
    			'product_name' =>$data['cart_product_name'],
    			'product_id' =>$data['cart_product_id'],
    			'product_img' =>$data['cart_product_img'],
                'product_quantity' =>$data['cart_product_quantity'],
    			'product_price' =>$data['cart_product_price'],
    			'product_qty' =>$data['cart_product_qty'],
    		);
    			Session::put('cart',$cart);
    		}
    	}
    	else{
    		$cart[] = array(
    			'session_id' => $session_id,
    			'product_name' =>$data['cart_product_name'],
    			'product_id' =>$data['cart_product_id'],
    			'product_img' =>$data['cart_product_img'],
                'product_quantity' =>$data['cart_product_quantity'],
    			'product_price' =>$data['cart_product_price'],
    			'product_qty' =>$data['cart_product_qty'],
    		);

    	}
    	Session::put('cart',$cart);
    	Session::save();
        return view('pages.cart.cartdropdown',compact('cart'));
    }
    public function showcartajax(){
    	return view('pages.cart.ajaxcart');
    }
    public function deleteitem($session_id){
    	$cart = Session::get('cart');
    	if($cart==true){
    		foreach($cart as $key => $value) {
    			if($value['session_id']==$session_id){
    				unset($cart[$key]);
    			}
    			
    		}
    		Session::put('cart',$cart);
    		return Redirect()->back()->with('messagesc','Xóa sản phẩm giỏ hàng thành công');
    	}
    	else{
    		return Redirect()->back()->with('messagef','Xóa sản phẩm giỏ hàng thất bại');
    	}
    }
    public function xoa($id){
        $cart = Session::get('cart');
        if($cart==true){
            foreach($cart as $key => $value) {
                if($value['session_id']==$id){
                    unset($cart[$key]);
                }
                
            }
            Session::put('cart',$cart);
            return view('pages.cart.cartdropdown',compact('cart'));
        }
        // else{
        //     return Redirect()->back()->with('messagef','Xóa sản phẩm giỏ hàng thất bại');
        // }
    }
    public function updateitem(Request $req){
    	$data = $req->all();
    	$cart = Session::get('cart');
    	if($cart==true){
            $message = '';
    		foreach ($data['cart_qty'] as $key => $qty) {
    			foreach ($cart as $session => $value) {
    				if($value['session_id']==$key && $qty<$cart[$session]['product_quantity']){
    					$cart[$session]['product_qty'] = $qty;
                        $message .= 'cập nhật số lượng '.$cart[$session]['product_name'].' thành công ';
    				}
                    elseif($value['session_id']==$key && $qty>$cart[$session]['product_quantity']){
                        $message .= 'cập nhật số lượng '.$cart[$session]['product_name'].' thất bại ';
                    }
    			}
    	
    		}
    		Session::put('cart',$cart);
    		return Redirect()->back()->with('messagesc',$message);
    	}
    	else{
    		return Redirect()->back()->with('messagef','Xóa sản phẩm giỏ hàng thất bại');
    	}
    }
    public function deleteall(){
    	$cart = Session::get('cart');
    	if($cart==true){
    		Session::forget('cart');
    		Session::forget('coupon');
    		return Redirect()->back()->with('messagesc','Xóa toàn bộ sản phẩm khỏi giỏ hàng thành công');
    	}
    }
    public function check(Request $req){
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');
    	$data = $req->all();
        if(Session::get('customer_id')){
             $coupon = coupon::where('coupon_code',$data['coupon_code'])->where('coupon_status',1)->where('coupon_date_end','>=',$today)->where('coupon_used','LIKE','%'.Session::get('customer_id').'%')->first();

             if($coupon){
                return Redirect('/checkout')->with('messagef','Mã coupon đã được sử dụng vui lòng nhập mã khác');
             }
                else{
                    $coupon_login = coupon::where('coupon_code',$data['coupon_code'])->where('coupon_status',1)->where('coupon_date_end','>=',$today)->first();
        if($coupon_login){
            $count = $coupon_login->count();
            if($count>0){
                $sessioncp = Session::get('coupon');
                if($sessioncp==true){
                    $available = 0;
                    if($available==0){
                        $cou[] = array(
                            'coupon_code'=>$coupon_login->coupon_code,
                            'coupon_cond'=>$coupon_login->coupon_cond,
                            'coupon_method'=>$coupon_login->coupon_method,
                        );
                        Session::put('coupon',$cou);
                    }
                }else{
                    $cou[] = array(
                            'coupon_code'=>$coupon_login->coupon_code,
                            'coupon_cond'=>$coupon_login->coupon_cond,
                            'coupon_method'=>$coupon_login->coupon_method,
                        );
                        Session::put('coupon',$cou);
                }
                Session::save();
                return Redirect()->back()->with('messagesc','Áp dụng mã coupon thành công');
            }
        }else{
            return Redirect()->back()->with('messagef','Mã coupon không đúng hoặc đã hết hạn sử dụng');
        }
             }
        }else{
            $coupon = coupon::where('coupon_code',$data['coupon_code'])->where('coupon_status',1)->where('coupon_date_end','>=',$today)->first();
        if($coupon){
            $count = $coupon->count();
            if($count>0){
                $sessioncp = Session::get('coupon');
                if($sessioncp==true){
                    $available = 0;
                    if($available==0){
                        $cou[] = array(
                            'coupon_code'=>$coupon->coupon_code,
                            'coupon_cond'=>$coupon->coupon_cond,
                            'coupon_method'=>$coupon->coupon_method,
                        );
                        Session::put('coupon',$cou);
                    }
                }else{
                    $cou[] = array(
                            'coupon_code'=>$coupon->coupon_code,
                            'coupon_cond'=>$coupon->coupon_cond,
                            'coupon_method'=>$coupon->coupon_method,
                        );
                        Session::put('coupon',$cou);
                }
                Session::save();
                return Redirect()->back()->with('messagesc','Áp dụng mã coupon thành công');
            }
        }else{
            return Redirect()->back()->with('messagef','Mã coupon không đúng hoặc đã hết hạn sử dụng');
        }
        }
    	
    }
}
