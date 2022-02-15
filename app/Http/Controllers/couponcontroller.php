<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\coupon;
use Carbon\Carbon;
use App\notify;
use App\User;

class couponcontroller extends Controller
{
    public function update(Request $req)
    {
        $all = coupon::where('coupon_code',$req->coucode)->get();
        $count = $all->count();
        if($count>0)
        {
            echo "failed";
            
        }
        else{
             $data = [];
        $data['coupon_name'] = $req->couname;
        $data['coupon_date_start'] = $req->coustart;
        $data['coupon_date_end'] = $req->couend;
        $data['coupon_code'] = $req->coucode;
        $data['coupon_time'] = $req->couqty;
        $data['coupon_cond'] = $req->coucond;
        $data['coupon_status'] = $req->coustatus;
        $data['coupon_method'] = $req->coumethod;
        coupon::where('coupon_id', $req->couid)->update($data);
        echo "done";
        // Session::put('message','Cập nhật mã coupon thành công');
        // return Redirect::to('/listcoupon');
        }

        
    }
    public function listcoupon(){
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');
    	$coupon = coupon::orderby('coupon_id','DESC')->paginate(5);
        $user = User::find(Session::get('staff_id'));
        $notify = notify::where('read_at',0)->orderBy('id','DESC')->limit(5)->get();

        $data = 
        [
            'user' => $user,
            'notify' => $notify,
            'coupon' => $coupon,
            'today' => $today
        ];

    	return view('adminpages.coupon',$data);
    }
    public function insert(Request $req){
        $all = coupon::where('coupon_code',$req->coupon_code)->get();
        $count = $all->count();
        $data = $req->all();
        if($count>0)
        {
            return Redirect('/listcoupon')->with('failed','Vui lòng nhập mã không trùng!');
        }
        else
        {
        $coupon = new coupon;
        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_date_start = $data['coupon_date_start'];
        $coupon->coupon_date_end = $data['coupon_date_end'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_time = $data['coupon_time'];
        $coupon->coupon_cond = $data['coupon_cond'];
        $coupon->coupon_status = $data['coupon_status'];
        $coupon->coupon_method = $data['coupon_method'];
        $coupon->staff_id = Session::get('staff_id');

        $coupon->save();

        Session::put('message','Thêm mã coupon thành công');
        return Redirect::to('/listcoupon');
        }
    	

    	
    }
    public function delete( $coupon_id){
    	coupon::where('coupon_id',$coupon_id)->delete();
    	return Redirect::to('/listcoupon');
    }
    public function unset(){
    	$cp = Session::get('coupon');
    	if($cp==true){
    		Session::forget('coupon');
    		return Redirect()->back()->with('messagesc','Xóa hiệu lực mã Coupon thành công');
    	}
    }

}
