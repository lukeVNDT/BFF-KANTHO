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
use App\coupon;
use Carbon\Carbon;
use App\notify;
use Mail;
use App\customer;
use App\customerorder;
use App\detailsorder;
use App\payment;
use App\User;
use App\Notifications\projectnotify;
use Illuminate\Support\Facades\Notification;



class checkoutcontroller extends Controller
{
    public function logincheck(Request $req){
        $url_canonical = $req->url();
    	return view('pages.checkout.logincheckout')->with('url_canonical',$url_canonical);
    }
    public function register(Request $req){
        $listcustomer = customer::where('customer_email', $req->customer_email)->get();
        $count = $listcustomer->count();
        if($count > 0)
        {
            echo "email exist";
        }
        else
        {
        $data = array();
        $data['customer_name'] = $req->customer_name;
        $data['customer_email'] = $req->customer_email;
        $data['customer_password'] = md5($req->customer_password);

        $cusid = DB::table('customer')->insertGetId($data);

        Session::put('customer_id',$cusid);
        Session::put('customer_name',$req->customer_name);


        echo "done";
        }
       
        
    }
    public function checkout(){
    	$city = city::orderby('matp','ASC')->get();

    	return view('pages.checkout.checkout')->with('city',$city);
    }
    public function createpayment(Request $req){
        foreach (Session::get('information') as $payment) {
            $total_price = $payment['total_price'];
        }
        $vnp_TxnRef = substr(md5(microtime()),rand(0,26),5); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $req->order_desc;
        $vnp_OrderType = $req->order_type;
        $vnp_Amount = $total_price * 100;
        $vnp_Locale = $req->language;
        $vnp_BankCode = $req->bank_code;
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => env('VNP_TMNCODE'),
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => route('vnpay.return'),
            "vnp_TxnRef" => $vnp_TxnRef,
        );


        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = env('VNP_URL') . "?" . $query;
        if (env('VNP_HASH_SECRET')) {
           // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', env('VNP_HASH_SECRET') . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        // $returnData = array('code' => '00'
        //     , 'message' => 'success'
        //     , 'data' => $vnp_Url);
        // echo json_encode($returnData);

        return Redirect($vnp_Url);

    }
    public function returnvnpay(Request $req){
        if(Session::get('information') && $req->vnp_ResponseCode=="00"){
            foreach (Session::get('information') as $info) {
                $order_coupon = $info['order_coupon'];
                $customer_id = $info['customer_id'];
                $total_price = $info['total_price'];
                $shipping_cusname = $info['shipping_cusname'];
                $shipping_email = $info['shipping_email'];
                $shipping_address = $info['shipping_address'];
                $shipping_phone = $info['shipping_phone'];
                $shipping_notes = $info['shipping_notes'];
                $order_fee = $info['order_fee'];
                $payment_method = $info['payment_method'];
            }
            if($order_coupon!='không có coupon'){
        $coupon = coupon::where('coupon_code',$order_coupon)->first();
        $coupon->coupon_used = $coupon->coupon_used.','.$customer_id;
        $coupon->coupon_time = $coupon->coupon_time - 1;
        $coupon_mail = $coupon->coupon_code;
        $coupon->save();
        }else{
            $coupon_mail = 'Không có';
        }

        $shipping = new shipping;
        $shipping->shipping_cusname = $shipping_cusname;
        $shipping->shipping_email = $shipping_email;
        $shipping->shipping_address = $shipping_address;
        $shipping->shipping_phone = $shipping_phone;
        $shipping->shipping_notes = $shipping_notes;
        $shipping->shipping_method = $payment_method;
        $shipping->save();
        // substr(md5(microtime()),rand(0,26),5);
        
        $shipping_id = $shipping->shipping_id;
        $ordercode = substr(str_shuffle("0123456789"), 0, 5);
        $order = new customerorder;
        $order->order_id = $ordercode;
        $order->customer_id = $customer_id;
        $order->shipping_id = $shipping_id;
        $order->order_status = 1;
        $order->total_price = $total_price;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order->created_at = now();
        $order->save();

        $payment = new payment;
        $payment->order_id = $ordercode;
        $payment->customer_id = $customer_id;
        $payment->money = $req->vnp_Amount;
        $payment->note = $req->vnp_OrderInfo;
        $payment->vnp_response_code = $req->vnp_ResponseCode;
        $payment->code_vnpay = $req->vnp_TransactionNo;
        $payment->code_bank = $req->vnp_BankCode;
        $payment->save();



        if(Session::get('cart')==true){
            foreach (Session::get('cart') as $key => $cart) {
                $orderdetail = new detailsorder;
                $orderdetail->order_id = $ordercode;
                // $orderdetail->product_name = $cart['product_name'];
                // $orderdetail->product_price = $cart['product_price'];
                $orderdetail->productsales_quantity = $cart['product_qty'];
                $orderdetail->product_coupon = $order_coupon;
                $orderdetail->fee_id = $order_fee;
                $orderdetail->fee_if_not_exist = Session::get('feemoney');
                $orderdetail->product_id = $cart['product_id'];
                $orderdetail->save();

            }
        }
        //sendmail
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s');

        $title_mail = "Đơn hàng nhận ngày".' '.$now;
        $customer = customer::find($customer_id);

        $data['email'][] = $customer->customer_email;
        

        if(Session::get('cart')==true){
            foreach (Session::get('cart') as $key => $cart_email) {
                $cart_arr[] = array(
                    'product_name' =>$cart_email['product_name'],
                    'product_price'=>$cart_email['product_price'],
                    'product_qty'=> $cart_email['product_qty'],
                    'total' => $req->total_price,);
            }
        }
        //shippin
        $shipping_arr = array(
            'shipping_cusname'=> $customer->customer_name,
            'shipping_email'=> $shipping_email,
            'shipping_address'=> $shipping_address,
            'shipping_phone'=> $shipping_phone,
            'shipping_notes'=> $shipping_notes,
            'shiping_mehtod'=> $payment_method
        );
        $order_code_mail = array(
            'coupon_code'=> $coupon_mail,
            'order_code'=> $ordercode
        );
        Mail::send('pages.mail.orderconfirm', ['cart_arr'=> $cart_arr,'shipping_arr'=> $shipping_arr,'order_code_mail'=> $order_code_mail] , function($message) use ($title_mail, $data){
        $message->to($data['email'])->subject($title_mail);
        $message->from($data['email'], $title_mail);
         });

        $notify_content = 'Bạn có đơn hàng mới';
        $notify_type = 'thông báo đơn hàng';
        $datanotify = [];
        $datanotify['notify_type'] = $notify_type;
        $datanotify['notify_content'] = $notify_content;
        $datanotify['link'] = url('/detailorder/'.$ordercode);
        // Notification::send($user, new projectnotify($message));
        notify::insert($datanotify);


        Session::forget('coupon');
        Session::forget('fee');
        Session::forget('feemoney');
        Session::forget('cart');
        }
        return view('pages.checkout.thank');
    }
    public function savecheckout(Request $req){
    	// $data = array();
    	// $data['shipping_cusname'] = $req->shipping_cusname;
    	// $data['shipping_email'] = $req->shipping_email;
    	// $data['shipping_address'] = $req->shipping_address;
    	// $data['shipping_phone'] = $req->shipping_phone;
    	// $data['shipping_notes'] = $req->shipping_notes;

    	// $shippingid = DB::table('shipping')->insertGetId($data);

    	// Session::put('shipping_id',$shippingid);

    	// return Redirect::to('/payment');
        if($req->payment==2){

            if($req->shipping_cusname == null)
            {
                echo "failed";
            }
            else if($req->shipping_address == null)
            {
                echo "failed";
            }
            else if($req->shipping_email == null)
            {
                echo "failed";
            }
             else if($req->shipping_phone == null)
            {
                echo "failed";
            }
            else if($req->shipping_notes == null)
            {
                echo "failed";
            }
            else
            {
                $paymentinfor[] = array(
                'customer_id'=>$req->customer_id,
                'total_price'=>$req->tongtatca,
                'shipping_cusname'=>$req->shipping_cusname,
                'shipping_address'=>$req->shipping_address,
                'shipping_email'=>$req->shipping_email,
                'shipping_phone'=>$req->shipping_phone,
                'shipping_notes'=>$req->shipping_notes,
                'order_fee'=>$req->order_fee,
                'order_coupon'=>$req->order_coupon,
                'payment_method'=>$req->payment);
            Session::put('information',$paymentinfor);
            foreach ($paymentinfor as $key => $value) {
                $money = $value['total_price'];
            }
            // // dd($money);
            echo "done";
            // return view('pages.vnpay.index');
            }
            
        }
        // dd($req->all());
    }
    public function index(){
        return view('pages.vnpay.index');
    }
    public function payment(){
    	return view('pages.checkout.payment');
    }
    public function logoutcheckout(){
    	Session::flush();
        Session::forget('coupon');
        Session::forget('customer_id');
        Session::forget('customer_name');
    	return Redirect::to('/logincheckout')->with('message','Đã đăng xuất');
    }
    public function login(Request $req){
    	$email = $req->email;
    	$pass = md5($req->password);
        $url_canonical = $req->url();
    	$result = DB::table('customer')->where('customer_email',$email)->where('customer_password',$pass)->first();
        $result2 = DB::table('customer')->where('customer_email',$email)->where('customer_password',$pass)->where('isban',0)->first();

    	if($result && $result2){
    		Session::put('customer_id',$result->customer_id);
            Session::put('customer_name',$result->customer_name);
            Session::put('customer_email',$result->customer_email);
            Session::put('customer_phone',$result->customer_phone);
            Session::put('url_canonical', $url_canonical);
            Session::put('messagesuccess', 'Đăng nhập thành công');
    		// return Redirect::to('/checkout')->with('url_canonical',$url_canonical)->with('messagesc','Đăng nhập thành công');
            echo "done";
    	}
    	elseif($result && !$result2){
            // return Redirect::to('/logincheckout')->with('url_canonical',$url_canonical)->with('messagef','Bạn đã bị cấm, liên hệ admin');
            echo "isban";
    	}
        else
        {
            // return Redirect::to('/logincheckout')->with('url_canonical',$url_canonical)->with('messagef','Sai tên tài khoản hoặc mật khẩu');
            echo "iswrong";
        }
    }
    public function order(Request $req){
    	//payment
    	dd($req->all());

    	
    }
    public function listorder(Request $req){
    	$allorder = DB::table('order')
    	->join('customer','order.customer_id','=','customer.customer_id')->select('order.*','customer.customer_name')
    	->orderby('order.order_id','desc')->get();
    	$order = view('adminpages.order')->with('allorder',$allorder);
    	return view('pages.admin')->with('adminpages.order',$order);
    }
    public function detail($order_id){
    	return view('adminpages.orderdetail');
    }
    public function select(Request $req){
    	$data = $req->all();
    	if($data['action']){
    		$output = '';
    		if($data['action']=="city"){
    			$selectprovince = DB::table('district')->where('matp',$data['matp'])->orderby('maqh','ASC')->get();
    			$output.='<option>----chọn quận huyện----</option>';
    			foreach ($selectprovince as $key => $province) {
    				$output.='<option value="'.$province->maqh.'">'.$province->name_qh.'</option>';
    			}
    		}else{
    			$selectward = DB::table('ward')->where('maqh',$data['matp'])->orderby('xaid','ASC')->get();
    			$output.='<option>----chọn xã phường trị trấn----</option>';
    			foreach ($selectward as $key => $ward) {
    				$output.='<option value="'.$ward->xaid.'">'.$ward->name_xptt.'</option>';
    			}
    		}
    	}
    	echo $output;
    }
    public function caculate(Request $req){
    	$data = $req->all();
    	if($data['matp']){
           
            // $feeship = DB::select('select * from feeship a, tinhtp b, quanhuyen c, xaphuongthitran d where a.fee_matp = b.matp and b.matp = c.matp and c.maqh = d.maqh and a.fee_matp = "'.$data['matp'].'" and c.maqh = "'.$data['maqh'].'" and d.xaid = "'.$data['maxa'].'"');
            $feeship = feeship::join('provinceorcity','provinceorcity.matp','=','feeship.fee_matp')->join('district','district.matp','=','provinceorcity.matp')->join('ward','ward.maqh','=','district.maqh')->where('fee_matp',$data['matp'])->where('district.maqh',$data['maqh'])->where('ward.xaid',$data['maxa'])->get();
            // dd($feeship);
    		if($feeship){
                $count = $feeship->count();

                    if($count>0) 
                    {
                foreach ($feeship as $key => $value) {
                Session::put('fee',$value->fee_id);
                Session::put('feemoney',$value->fee_money);
                Session::save();
            }
                    }
                    else
                    {
                        $allFee = feeship::where('type','All')->get();
                        foreach ($allFee as $key => $value) {
                            $feemoney = $value['fee_money'];
                            $feeid = $value['fee_id'];
                            Session::put('feemoney',$feemoney);
                            Session::put('fee',$feeid);
                             Session::save();
                           
                    }

                        
                         
                

                // dd(Session::get('feemoney'));
                // return response(['feemoney'=>$fee]);
          
                    }
                // dd(Session::get('feemoney'),Session::get('feeifnotexist'));

    		}
    		
    	}

    }
    public function confirm(Request $req){
        $user = User::all();
        
    	$data = $req->all();
        // dd($data);
        //get coupon
        if($data['order_coupon']!='không có coupon'){
        $coupon = coupon::where('coupon_code',$data['order_coupon'])->first();
        $coupon->coupon_used = $coupon->coupon_used.','.Session::get('customer_id');
        $coupon->coupon_time = $coupon->coupon_time - 1;
        $coupon_mail = $coupon->coupon_code;
        $coupon->save();
        }else{
            $coupon_mail = 'Không có';
        }
        

    	$shipping = new shipping;
    	$shipping->shipping_cusname = $data['shipping_cusname'];
    	$shipping->shipping_email = $data['shipping_email'];
    	$shipping->shipping_address = $data['shipping_address'];
    	$shipping->shipping_phone = $data['shipping_phone'];
    	$shipping->shipping_notes = $data['shipping_notes'];
    	$shipping->shipping_method = $data['shipping_method'];
    	$shipping->save();

    	$shipping_id = $shipping->shipping_id;
    	$ordercode = substr(str_shuffle("0123456789"), 0, 5);
    	$order = new customerorder;
        $order->order_id = $ordercode;
    	$order->customer_id = Session::get('customer_id');
    	$order->shipping_id = $shipping_id;
    	$order->order_status = 1;
    	$order->total_price = $req->total_price;
    	date_default_timezone_set('Asia/Ho_Chi_Minh');
    	$order->created_at = now();
    	$order->save();

    	if(Session::get('cart')==true){
    		foreach (Session::get('cart') as $key => $cart) {
    			$orderdetail = new detailsorder;
    			$orderdetail->order_id = $ordercode;
    			$orderdetail->product_name = $cart['product_name'];
    			$orderdetail->product_price = $cart['product_price'];
    			$orderdetail->productsales_quantity = $cart['product_qty'];
    			$orderdetail->product_coupon = $data['order_coupon'];
                $orderdetail->fee_id = $data['order_fee'];
                $orderdetail->product_id = $cart['product_id'];
    			$orderdetail->save();

    		}
    	}
        //sendmail
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s');

        $title_mail = "Đơn hàng nhận ngày".' '.$now;
        $customer = customer::find(Session::get('customer_id'));

        $data['email'][] = $customer->customer_email;
        

        if(Session::get('cart')==true){
            foreach (Session::get('cart') as $key => $cart_email) {
                $cart_arr[] = array(
                    'product_name' =>$cart_email['product_name'],
                    'product_price'=>$cart_email['product_price'],
                    'product_qty'=> $cart_email['product_qty'],
                    'total' => $req->total_price,
                    );
            }
        }
        //shippin
        $shipping_arr = array(
            'shipping_cusname'=> $customer->customer_name,
            'shipping_email'=> $data['shipping_email'],
            'shipping_address'=> $data['shipping_address'],
            'shipping_phone'=> $data['shipping_phone'],
            'shipping_notes'=> $data['shipping_notes'],
            'shiping_mehtod'=> $data['shipping_method']
        );
        $order_code_mail = array(
            'coupon_code'=> $coupon_mail,
            'order_code'=> $ordercode
        );
        Mail::send('pages.mail.orderconfirm', ['cart_arr'=> $cart_arr,'shipping_arr'=> $shipping_arr,'order_code_mail'=> $order_code_mail] , function($message) use ($title_mail, $data){
        $message->to($data['email'])->subject($title_mail);
        $message->from($data['email'], $title_mail);
         });


        $notify_content = 'Bạn có đơn hàng mới';
        $notify_type = 'thông báo đơn hàng';
         $datanotify = [];
        $datanotify['notify_type'] = $notify_type;
        $datanotify['notify_content'] = $notify_content;
        $datanotify['link'] = url('/detailorder/'.$ordercode);
        // Notification::send($user, new projectnotify($message));
        notify::insert($datanotify);

    	Session::forget('coupon');
    	Session::forget('fee');
        Session::forget('feemoney');
    	Session::forget('cart');



    }
    public function getthank(){
        return view('pages.checkout.thank');
    }
}
