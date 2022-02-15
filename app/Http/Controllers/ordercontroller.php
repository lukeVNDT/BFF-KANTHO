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
use App\product;
use App\customerorder;
use App\detailsorder;
use App\notify;
use App\User;


class ordercontroller extends Controller
{
    public function filterpaginate(Request $req){
        if($req->ajax()){
            $status = $req->status;
            // dd($status);
            if($status == "NonChoose")
            {
                 $ordercus = customerorder::join('customer','customerorder.customer_id','=','customer.customer_id')->orderBy('customerorder.created_at')->paginate(5);
            }
            else
            {
                $ordercus = customerorder::join('customer','customerorder.customer_id','=','customer.customer_id')->where('customerorder.order_status',$status)->paginate(5);
            }
            
            return view('pages.component.paginateOrder')->with(compact('ordercus'));
        }
    }
    public function filter(Request $req){
        if($req->ajax()){
            $output = '';
            $id = $req->id;
            if($id != ''){
                // $data = customerorder::where('order_status',$id)->orderby('created_at','DESC')->get();
                // foreach ($data as $key => $value) {
                //     $customer_id = $value->customer_id;
                // }
                $ordercus = customerorder::join('customer','customerorder.customer_id','=','customer.customer_id')->where('customerorder.order_status',$id)->paginate(5);

            }
            else{
                $ordercus = customerorder::join('customer','customerorder.customer_id','=','customer.customer_id')->orderBy('customerorder.created_at')->paginate(5);
            }
            return view('pages.component.paginateOrder')->with(compact('ordercus'));
            
        }
    }
    public function listorder(Request $req){
        // $datajoin = DB::table('customerorder')->join('customer','customerorder.customer_id','=','customer.customer_id')->where('customerorder.order_status',2)->select('customer.customer_name','customerorder.created_at','customerorder.order_status','customerorder.order_id');
        // dd($datajoin);
    	$ordercus = DB::table('customerorder')->join('customer','customer.customer_id','=','customerorder.customer_id')->orderby('customerorder.created_at','DESC')->get();
        $user = User::find(Session::get('staff_id'));
        $notify = notify::where('read_at',0)->orderBy('id','DESC')->limit(5)->get();

        $data = 
        [
            'user' => $user,
            'notify' => $notify,
            'ordercus' => $ordercus
        ];
        // dd($ordercus);
    	return view('adminpages.order', $data);
    }
    public function getinitaldata(){
        $ordercus = customerorder::join('customer','customer.customer_id','=','customerorder.customer_id')->orderby('customerorder.created_at','DESC')->paginate(5);
        return view('pages.component.paginateOrder')->with(compact('ordercus'));
    }
    public function detail($order_code){
    	$order_detail = detailsorder::with('product')->where('order_id',$order_code)->get();
        foreach ($order_detail as $key => $value) {
            $product_id = $value->product_id;
        }
        // dd($order_detail);
    	$order = DB::table('customerorder')->where('order_id',$order_code)->get();
    	foreach ($order as $key => $od) {
    		$customer_id = $od->customer_id;
    		$shipping_id = $od->shipping_id;
            $order_status = $od->order_status;
    	}
    	$customer = customer::where('customer_id',$customer_id)->first();
    	$shipping = shipping::where('shipping_id',$shipping_id)->first();
    	$orderdetail = detailsorder::with('product','feeship','customerorder')->where('order_id',$order_code)->get();

        foreach ($orderdetail as $key => $order_coupon) {
            $product_coupon = $order_coupon->product_coupon;
        }
        if($product_coupon!='không có coupon'){
        $coupon = coupon::where('coupon_code',$product_coupon)->first();
        $coupon_cond = $coupon->coupon_cond;
        $coupon_money = $coupon->coupon_method;
        }else{
            $coupon_cond = 2;
            $coupon_money = 0;
        }
        $notify = notify::where('read_at',0)->orderBy('id','DESC')->limit(5)->get();
        
    	return view('adminpages.orderdetail')->with(compact('orderdetail','customer','shipping','orderdetail','coupon_cond','coupon_money','order','order_status','notify'));
    }
    public function update(Request $req){
        $data = $req->all();

        $order = customerorder::find($data['order_id']);
        $order->order_status = $data['order_status'];
        $order->staff_id = Session::get('staff_id');
        $order->save();

        if($order->order_status==2){
            foreach ($data['order_product_id'] as $key => $product_id) {
                $product = product::find($product_id);
                $product_quantity = $product->product_quantity;
                $product_sold = $product->product_sold;
                foreach ($data['quantity'] as $key2 => $qty) {
                    
                    if($key==$key2){
                        $product_remain = $product_quantity - $qty;
                        $product->product_quantity = $product_remain;
                        $product->product_sold = $product_sold + $qty;
                        $product->save();
                    }
                }
            }
        }elseif($order->order_status!=2 && $order->order_status!=3){
            foreach ($data['order_product_id'] as $key => $product_id) {
                $product = product::find($product_id);
                $product_quantity = $product->product_quantity;
                $product_sold = $product->product_sold;
                foreach ($data['quantity'] as $key2 => $qty) {
                    
                    if($key==$key2){
                        $product_remain = $product_quantity + $qty;
                        $product->product_quantity = $product_remain;
                        $product->product_sold = $product_sold - $qty;
                        $product->save();
                    }
                }
            }
        }
    }
    public function updateqty(Request $req){
        $data = $req->all();
        $order_detail = detailsorder::where('product_id',$data['order_product_id'])->where('order_id',$data['order_code'])->first();
        $order_detail->productsales_quantity = $data['order_qty'];
        $order_detail->save();
    }
    public function history(){
        if(!Session::get('customer_id')){
            return Redirect('/logincheckout')->with('messagef','Vui lòng đăng nhập để thực hiện xem lịch sử đơn hàng');
        }elseif(Session::get('customer_id')){
            $getorder = order::where('customer_id',Session::get('customer_id'))->orderby('created_at','DESC')->get();
            return Redirect('/customerorder')->with(compact('getorder'));
        }
    }
    public function viewhistory(){
        return view('pages.history.historyorder');
    }
    public function search(Request $req){
        if($req->ajax()){
            $query = $req->query;
            if($query != ''){
                $data = customerorder::where('order_id','LIKE','%'.$query.'%')->get();
            }
            else{
                $data = customerorder::orderby('order_id','desc')->get();
            }
            $count_row = $data->count();
            if($count_row>0){
                foreach ($data as $row) {
                    $output .= '
                    <tr>
                        <td>'.$row->order_id.'</td
                    </tr>';
                }
            }
            else{
                $output .= '
                    <tr>
                        <td align="center" colspan="5">Không tìm thấy dữ liệu</td
                    </tr>';
            }
            $data = [
                'result_table' => $output
            ];
            return json_encode($data);
        }
    }
    public function livesearch(Request $req){
        $search_input = $req->get('query');

        $result = customerorder::where('total_price','like','%'.$search_input.'%')->get();

        echo json_encode($result);
    }
    public function get(){
        return view('pages.checkout.payment');
    }
}
