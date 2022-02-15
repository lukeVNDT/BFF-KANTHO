<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cart;
use App\city;
use App\province;
use App\ward;
use App\feeship;
use App\shipping;
use App\order;
use App\orderdetail;
use App\customer;
use App\coupon;
use Carbon\Carbon;
use Mail;
use Illuminate\Support\Str;

class mailcontroller extends Controller
{
    public function sendcoupon($coupon_time,$coupon_condition,$coupon_method,$coupon_code){
    	$customer_loyal = customer::where('customer_loyal',1)->get();
        $row_count = $customer_loyal->count();
        if($row_count > 0){
            $coupon = coupon::where('coupon_code',$coupon_code)->first();
            $start_day = $coupon->coupon_date_start;
            $end_day = $coupon->coupon_date_end;
            $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
            $title_mail = "Mã khuyến mãi ngày".' '.$now;
            $data = [];
            foreach ($customer_loyal as $key => $cusloyal) {
                $data['email'] = $cusloyal->customer_email;
            }
            $coupon = array(
                'start_day'=> $start_day,
                'end_day'=> $end_day,
                'coupon_time'=> $coupon_time,
                'coupon_condition'=> $coupon_condition,
                'coupon_method'=> $coupon_method,
                'coupon_code'=> $coupon_code
            );
            Mail::send('pages.mail.sendcouponemail', ['coupon'=> $coupon] , function($message) use ($title_mail, $data){
                $message->to($data['email'])->subject($title_mail);
                $message->from($data['email'], $title_mail);
            });
            // return Redirect()->back()->with('message','Gửi mã khuyến mãi cho khách hàng thành công');
            echo "done";
        }
        else{
            // return Redirect()->back()->with('failed','Hiện tại chưa có khách hàng thân thiết nào được thêm!');
            echo "failed";
        }
        
    }
    public function mail(){
    	return view('pages.mail.sendcouponemail');
    }
    public function forgetpassword(){
    	return view('pages.mail.forgetpassword');
    }
    public function resetpassword(Request $req){
    $data = $req->all();
    	
    $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
    $title_mail = "Lấy lại mật khẩu tài khoản DTSport".' '.$now;
    $customer = customer::where('customer_email','=',$data['email_account'])->get();
    foreach ($customer as $key => $cus) {
    	$customer_id = $cus->customer_id;
    }
    if($customer){
    	$count_customer = $customer->count();
    	if($count_customer==0){
    		echo "not exist";
    	}else{
    		$random_token = Str::random();
    		$customer = customer::find($customer_id);
    		$customer->customer_token = $random_token;
    		$customer->save();

    		$to_email = $data['email_account'];
    		$link_reset = url('/update-new-pass?email='.$to_email.'&token='.$random_token);

    		$data = array("name"=>$title_mail,"body"=>$link_reset,"email"=>$data['email_account']);

    		Mail::send('pages.mail.updatepassword',['data'=>$data], function($message) use ($title_mail, $data){
    			$message->to($data['email'])->subject($title_mail);
    			$message->from($data['email'], $title_mail);
    		});
    		echo "done";
    	}
    }
    
    
    }
    public function updatenewpass(){
    	return view('pages.mail.newpass');
    }
    public function resetnewpass(Request $req){
    	$data = $req->all();
    	$random_token = Str::random();
    	$customer = customer::where('customer_email','=',$data['email'])->where('customer_token','=',$data['token'])->get();
    	$count = $customer->count();
    	if($count>0){
    		foreach ($customer as $key => $cus) {
    			$customer_id = $cus->customer_id;
    		}
    		$reset = customer::find($customer_id);
    		$reset->customer_password = md5($data['password_account']);
    		$reset->customer_token = $random_token;
    		$reset->save();
    		return Redirect('logincheckout')->with('message','Mật khẩu đã được cập nhật, vui lòng đăng nhập lại');
    	}
    	else{
    		return Redirect('forgetpassword')->with('messagef','Link quá hạn vui lòng gửi đi yêu cầu reset mật khẩu mới');
    	}
    }
    public function get(){
    	return view('pages.mail.orderconfirm');
    }
    public function sendcouponnormal($coupon_time,$coupon_condition,$coupon_method,$coupon_code){
    	$customer = customer::where('customer_loyal','=',0)->get();
        $row_count = $customer->count();
        if($row_count > 0)
        {
            $coupon = coupon::where('coupon_code',$coupon_code)->first();
            $start_day = $coupon->coupon_date_start;
            $end_day = $coupon->coupon_date_end;
            $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
            $title_mail = "Mã khuyến mãi ngày".' '.$now;
            $data = [];
            foreach ($customer as $key => $cus) {
                $data['email'] = $cus->customer_email;
            }
            $coupon = array(
                'start_day'=> $start_day,
                'end_day'=> $end_day,
                'coupon_time'=> $coupon_time,
                'coupon_condition'=> $coupon_condition,
                'coupon_method'=> $coupon_method,
                'coupon_code'=> $coupon_code
            );
            Mail::send('pages.mail.sendcouponemail', ['coupon'=> $coupon] , function($message) use ($title_mail, $data){
                $message->to($data['email'])->subject($title_mail);
                $message->from($data['email'], $title_mail);
            });
            echo "done";
        }
        else{
            echo "failed";
        }
    	
    }
    
}
