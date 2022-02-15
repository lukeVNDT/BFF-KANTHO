<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\HelperClass\Date;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
session_start();
use App\social;
use Socialite;
use App\customer;
use App\articlemodel;
use Auth;
use App\customerorder;
use App\statistical;
use App\product;
use App\adminmodel;
use App\condmodel;
use Response;
use App\User;
use App\Exports\CustomerExport;
use App\favorite;
use Carbon\Carbon;
use App\notify;
use App\detailsorder;

class admincontroller extends Controller
{
    public function delcus($id){
        customer::where('customer_id',$id)->delete();
    }
    public function unban(Request $req){
        $data = ['isban'=>0];
        customer::where('customer_id',$req->id)->update($data);
    }
    public function ban(Request $req){
        $data = ['isban'=>1];
        customer::where('customer_id',$req->id)->update($data);
    }
    public function getallcond(Request $req){
        if($req->ajax()){
            $cond = condmodel::get();
            $html = view("pages.component.cond")->with(compact('cond'))->render();
            return response([
                "html"=>$html]);
        }
    }
    public function insertcond(Request $req){
        $data = [];
        $data['cond_name'] = $req->cond_name;
        $data['cond_value'] = $req->cond_value;
        condmodel::insert($data);
    }
    public function disableloyal(Request $req){
        $data = [];
        $data['customer_loyal'] = $req->values;
        $customer = customer::where('customer_id',$req->customer_id)->update($data);
    }
    public function enableloyal(Request $req){
        $data = [];
        $data['customer_loyal'] = $req->values;
        $customer = customer::where('customer_id',$req->customer_id)->update($data);
    }
    public function get(Request $req){
        if($req->ajax())
        {
            $value = $req->id;
            if($value == "NonChoose"){
                $list_user  = customer::orderBy('customer_id','DESC')->paginate(5);
            }
            else
            {
                $list_user = customerorder::join('customer','customer.customer_id','=','customerorder.customer_id')->select(\DB::raw('customerorder.customer_id'),\DB::raw('customer_name'),\DB::raw('customer_email'),\DB::raw('customer_loyal'),\DB::raw('sum(total_price)'))->groupBy(\DB::raw('customerorder.customer_id'))->groupBy(\DB::raw('customer_name'))->groupBy(\DB::raw('customer_loyal'))->groupBy(\DB::raw('customer_email'))->havingRaw('sum(total_price) >= '.$value.'')->paginate(5);
            }
            
            return view("pages.component.paginateCustomer")->with(compact('list_user'));
            
        }
        

    }
    public function paginate(Request $req){
        if($req->ajax()){
            $value = $req->value;
             if($value == "NonChoose"){
                $list_user = customer::orderBy('customer_id','DESC')->paginate(5);
             }
             else{
                $list_user = customerorder::join('customer','customer.customer_id','=','customerorder.customer_id')->select(\DB::raw('customerorder.customer_id'),\DB::raw('customer_name'),\DB::raw('customer_email'),\DB::raw('customer_loyal'),\DB::raw('sum(total_price)'))->groupBy(\DB::raw('customerorder.customer_id'))->groupBy(\DB::raw('customer_name'))->groupBy(\DB::raw('customer_loyal'))->groupBy(\DB::raw('customer_email'))->havingRaw('sum(total_price) >= '.$value.'')->paginate(5);
             }
             return view("pages.component.paginateCustomer")->with(compact('list_user'));
        }
         
    }
    public function maincontent(Request $request){
        //doanh thu ngay
        $moneyperday = customerorder::whereDay('created_at', date('d'))->where('order_status',customerorder::STATUS_DONE)
        ->sum('total_price');
        //doanh thu thang
        $moneypermonth = customerorder::whereMonth('created_at', date('m'))->where('order_status',customerorder::STATUS_DONE)
        ->sum('total_price');
        //doanh thu nam
        $moneyperyear = customerorder::whereYear('created_at', date('Y'))->where('order_status',customerorder::STATUS_DONE)
        ->sum('total_price');
        $datamoney = [
            [
                "name" => "Doanh thu ngày",
                "y" => (int)$moneyperday
            ],
            [
                "name" => "Doanh thu tháng",
                "y" => (int)$moneypermonth
            ],
            [
                "name" => "Doanh thu năm",
                "y" => (int)$moneyperyear
            ]
        ];

        $listday = Date::getallday();



        $total_order = customerorder::select('id')->count();

        $total_product = product::select('id')->count();

        $total_user = customer::select('id')->count();

        $total_article = articlemodel::select('id')->count();

        

        $countstatusdone = customerorder::where('order_status',customerorder::STATUS_DONE)->select('id')->count();
        $countstatusdefault = customerorder::where('order_status',customerorder::STATUS_DEFAULT)->select('id')->count();

        $statusorder = [
            [
                "Đang xử lý", $countstatusdefault, false
            ],
            [
                "Đã xử lý", $countstatusdone, false
            ]
        ];

    //doanh thu tung ngay trong thang
        $revenuedayinmonth = customerorder::where('order_status',customerorder::STATUS_DONE)->whereMonth('created_at',date('m'))->select(\DB::raw('sum(total_price) as tongtien'),\DB::raw('DATE(created_at) as ngay'))->groupBy('ngay')->get()->toArray();
        // $revenuedayinmonth = customerorder::join('detailsorder','detailsorder.order_id','=','customerorder.order_id')->where('order_status',customerorder::STATUS_DONE)->whereMonth('customerorder.created_at',date('m'))->select(\DB::raw('sum(detailsorder.product_price) as tongtien'),\DB::raw('DATE(customerorder.created_at) as ngay'))->groupBy('ngay')->get()->toArray();

        $arrrevenuemonth = [];
        foreach ($listday as $day) {
            $total = 0;
            foreach ($revenuedayinmonth as $key => $revenue) {
                if ($revenue['ngay'] == $day) {
                    $total = $revenue['tongtien'];
                    break;
                }
            }
            $arrrevenuemonth[] = (int)$total;
        }

        $revenuedayinmonthdf = customerorder::join('detailsorder','detailsorder.order_id','=','customerorder.order_id')->join('product','detailsorder.product_id','=','product.product_id')->where('customerorder.order_status',customerorder::STATUS_DEFAULT)->whereMonth('customerorder.created_at',date('m'))->select(\DB::raw('sum(product.product_price) as tongtien'),\DB::raw('DATE(customerorder.created_at) as ngay'))->groupBy('ngay')->get()->toArray();

        $arrrevenuemonthdf = [];
        foreach ($listday as $day) {
            $total = 0;
            foreach ($revenuedayinmonthdf as $key => $revenue) {
                if ($revenue['ngay'] == $day) {
                    $total = $revenue['tongtien'];
                    break;
                }
            }
            $arrrevenuemonthdf[] = (int)$total;
        }
        $user = User::find(Session::get('staff_id'));
        $notify = notify::where('read_at',0)->orderBy('id','DESC')->limit(5)->get();
        $favorite = favorite::join('product', 'favorite.product_id','=','product.product_id')->select(\DB::raw('count(favorite.product_id) as soluotthich'),\DB::raw('product.product_name as product_name'),\DB::raw('product.product_img as product_image'))->groupBy('favorite.product_id')->paginate(5,['*'],'favorite');
        $sellproduct = detailsorder::join('product', 'detailsorder.product_id','=','product.product_id')->join('customerorder', 'detailsorder.order_id','=','customerorder.order_id')->where('customerorder.order_status',2)->select(\DB::raw('SUM(detailsorder.productsales_quantity) as tongban'),\DB::raw('product.product_name as product_name'),\DB::raw('product.product_img as product_image'),\DB::raw('product.product_id as product_id'))->groupBy('detailsorder.product_id')->paginate(5,['*'],'sellproduct');
        $data = [
            'sellproduct' => $sellproduct,
            'moneyperday' => $moneyperday,
            'moneypermonth'=> $moneypermonth,
            'moneyperyear' => $moneyperyear,
            'datamoney' => json_encode($datamoney),
            'statusorder' => json_encode($statusorder),
            'total_order' => $total_order,
            'total_product' =>$total_product,
            'total_user' => $total_user,
            'total_article' => $total_article,
            'list_day'=> json_encode($listday),
            'arrrevenuemonth' =>json_encode($arrrevenuemonth),
            'arrrevenuemonthdf' => json_encode($arrrevenuemonthdf),
            'user' => $user,
            'notify' => $notify,
            'favorite'=> $favorite
        ];


    	return view('adminpages.maincontent', $data);
    }
    public function paginatefavoriteproduct(Request $req){
        if($req->ajax())
        {
            $favorite = favorite::join('product', 'favorite.product_id','=','product.product_id')->select(\DB::raw('count(favorite.product_id) as soluotthich'),\DB::raw('product.product_name as product_name'),\DB::raw('product.product_img as product_image'))->groupBy('favorite.product_id')->paginate(5,['*'],'favorite');
        return view('pages.component.favoriteproduct')->with(compact('favorite'));
        }
    }
    public function initialdatafavorite(){
        $favorite = favorite::join('product', 'favorite.product_id','=','product.product_id')->select(\DB::raw('count(favorite.product_id) as soluotthich'),\DB::raw('product.product_name as product_name'),\DB::raw('product.product_img as product_image'))->groupBy('favorite.product_id')->paginate(5,['*'],'favorite');
        return view('pages.component.favoriteproduct')->with(compact('favorite'));
    }
    public function paginatesellproduct(Request $req){
        if($req->ajax())
        {
            $sellproduct = detailsorder::join('product', 'detailsorder.product_id','=','product.product_id')->join('customerorder', 'detailsorder.order_id','=','customerorder.order_id')->where('customerorder.order_status',2)->select(\DB::raw('SUM(detailsorder.productsales_quantity) as tongban'),\DB::raw('product.product_name as product_name'),\DB::raw('product.product_img as product_image'),\DB::raw('product.product_id as product_id'))->groupBy('detailsorder.product_id')->paginate(5,['*'],'sellproduct');
        return view('pages.component.sellproduct')->with(compact('sellproduct'));
        }
    }
    public function initialdatasellproduct(){
        $sellproduct = detailsorder::join('product', 'detailsorder.product_id','=','product.product_id')->join('customerorder', 'detailsorder.order_id','=','customerorder.order_id')->where('customerorder.order_status',2)->select(\DB::raw('SUM(detailsorder.productsales_quantity) as tongban'),\DB::raw('product.product_name as product_name'),\DB::raw('product.product_img as product_image'),\DB::raw('product.product_id as product_id'))->groupBy('detailsorder.product_id')->paginate(5,['*'],'sellproduct');
        return view('pages.component.sellproduct')->with(compact('sellproduct'));
    }
    public function login(Request $req){
        // dd($req->all());
        // $rs = DB::table('staff')->where('staff_email',$email)->where('staff_password',$pass)->first();

        // $user = User::where('email', $req->email)->first();
      

        // if(!Hash::check($req->password, $user->password))
        // {
        //     Session::put('message','Tên tài khoản hoặc mật khẩu không chính xác');
        //     echo "login failed";
        // }
        // else
        // {
        //     Session::put('staff_name',Auth::user()->staff_name);
        //     Session::put('staff_id',Auth::user()->staff_id);
        //     Session::put('staff_avatar',Auth::user()->staff_avatar);
        //     Session::put('success','Đăng nhập thành công.'." "."Chào mừng bạn trở lại.");
        //     echo "login successfully";
        // }

        $validationData = $req->only('email','password');
    	// $email = $req->email;
    	// $pass = md5($req->password);

        // $res= User::insert($validationData);
        // if($res){
        //     dd('ok');
        // }
        // else {
        //     dd('faol');
        // }

        

    	// $rs = DB::table('staff')->where('staff_email',$email)->where('staff_password',$pass)->first();
    	if(Auth::attempt($validationData)){
    		Session::put('staff_name',Auth::user()->staff_name);
    		Session::put('staff_id',Auth::user()->staff_id);
            Session::put('staff_avatar',Auth::user()->staff_avatar);
            Session::put('success','Đăng nhập thành công.'." "."Chào mừng bạn trở lại.");
    		echo "login successfully";
    	}
    	else{
    		Session::put('message','Tên tài khoản hoặc mật khẩu không chính xác');
    		echo "login failed";
    	}
    }
    public function logout(){
    		Session::put('staff_name',null);
    		Session::put('staff_id',null);
    		return Redirect::to('/dangnhap');
}
    public function googlelogin(){
        // config(['services.google.redirect' => env('GOOGLE_CLIENT_URL')]);
        return Socialite::driver('google')->redirect();
    }
    public function googlecallback(){
        // config(['services.google.redirect' => env('GOOGLE_CLIENT_URL')]);
        $users = Socialite::driver('google')->stateless()->user(); 
        // return $users->id;
        $authUser = $this->findOrCreateUser($users,'google');
        if($authUser){
        $account_name = customer::where('customer_id',$authUser->user)->first();
        Session::put('customer_name',$account_name->customer_name);
        Session::put('customer_id',$account_name->customer_id);
        
        }elseif($customer_new){
            $account_name = customer::where('customer_id',$authUser->user)->first();
        Session::put('customer_name',$account_name->customer_name);
        Session::put('customer_id',$account_name->customer_id);
        }
        return Redirect('/')->with('message','success');

    }
    public function findOrCreateUser($users,$provider){
        $authUser = social::where('provider_user_id', $users->id)->first();
        if($authUser){

            return $authUser;
        }else{
            $customer_new = new social([
            'provider_user_id' => $users->id,
            'provider_user_email' => $users->email,
            'provider' => strtoupper($provider)
        ]);

        $orang = customer::where('customer_email',$users->email)->first();

            if(!$orang){
                $orang = customer::create([
                    'customer_name' => $users->name,
                    'customer_email' => $users->email,
                    'customer_password' => '',
                    'customer_phone' => ''
                ]);
            }
        $customer_new->customer()->associate($orang);
        $customer_new->save();
        return $customer_new;
        }
      
        

        // $account_name = Login::where('admin_id',$authUser->user)->first();
        // Session::put('admin_login',$account_name->admin_name);
        // Session::put('admin_id',$account_name->admin_id);
        // return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');



    }
    public function tk(Request $request){
        $getall = $request->all();
        $from_day = $getall['from_day'];
        $to_day = $getall['to_day'];
         //doanh thu ngay
        $moneyperday = customerorder::whereDay('created_at', date('d'))->where('order_status',customerorder::STATUS_DONE)
        ->sum('total_price');
        //doanh thu thang
        $moneypermonth = customerorder::whereMonth('created_at', date('m'))->where('order_status',customerorder::STATUS_DONE)
        ->sum('total_price');
        //doanh thu nam
        $moneyperyear = customerorder::whereYear('created_at', date('Y'))->where('order_status',customerorder::STATUS_DONE)
        ->sum('total_price');
        $datamoney = [
            [
                "name" => "Doanh thu ngày",
                "y" => (int)$moneyperday
            ],
            [
                "name" => "Doanh thu tháng",
                "y" => (int)$moneypermonth
            ],
            [
                "name" => "Doanh thu năm",
                "y" => (int)$moneyperyear
            ]
        ];

        $listday = Date::getallday();



        $total_order = customerorder::select('id')->count();

        $total_product = product::select('id')->count();

        $total_user = customer::select('id')->count();

        $total_article = articlemodel::select('id')->count();

        

        $countstatusdone = customerorder::where('order_status',customerorder::STATUS_DONE)->select('id')->count();
        $countstatusdefault = customerorder::where('order_status',customerorder::STATUS_DEFAULT)->select('id')->count();

        $statusorder = [
            [
                "Đang xử lý", $countstatusdefault, false
            ],
            [
                "Đã xử lý", $countstatusdone, false
            ]
        ];

    //doanh thu tung ngay trong thang
        $revenuedayinmonth = customerorder::where('order_status',customerorder::STATUS_DONE)->whereMonth('created_at',date('m'))->select(\DB::raw('sum(total_price) as tongtien'),\DB::raw('DATE(created_at) as ngay'))->groupBy('ngay')->get()->toArray();
        // $revenuedayinmonth = customerorder::join('detailsorder','detailsorder.order_id','=','customerorder.order_id')->where('order_status',customerorder::STATUS_DONE)->whereMonth('customerorder.created_at',date('m'))->select(\DB::raw('sum(detailsorder.product_price) as tongtien'),\DB::raw('DATE(customerorder.created_at) as ngay'))->groupBy('ngay')->get()->toArray();

        $arrrevenuemonth = [];
        foreach ($listday as $day) {
            $total = 0;
            foreach ($revenuedayinmonth as $key => $revenue) {
                if ($revenue['ngay'] == $day) {
                    $total = $revenue['tongtien'];
                    break;
                }
            }
            $arrrevenuemonth[] = (int)$total;
        }

        $revenuedayinmonthdf = customerorder::join('detailsorder','detailsorder.order_id','=','customerorder.order_id')->where('customerorder.order_status',customerorder::STATUS_DEFAULT)->whereMonth('customerorder.created_at',date('m'))->select(\DB::raw('sum(detailsorder.product_price) as tongtien'),\DB::raw('DATE(customerorder.created_at) as ngay'))->groupBy('ngay')->get()->toArray();

        $arrrevenuemonthdf = [];
        foreach ($listday as $day) {
            $total = 0;
            foreach ($revenuedayinmonthdf as $key => $revenue) {
                if ($revenue['ngay'] == $day) {
                    $total = $revenue['tongtien'];
                    break;
                }
            }
            $arrrevenuemonthdf[] = (int)$total;
        }
        // $chart_data = [];
        
        $get = customerorder::whereBetween('created_at',[$from_day,$to_day])->orderBy('created_at','ASC')->get();
            $filter = [];
        foreach ($listday as $day) {
            $total = 0;
            foreach ($get as $key => $revenue) {
                if ($revenue['ngay'] == $day) {
                    $total = $revenue['tongtien'];
                    break;
                }
            }
            $filter[] = (int)$total;
        }

        $data = [
            'moneyperday' => $moneyperday,
            'moneypermonth'=> $moneypermonth,
            'moneyperyear' => $moneyperyear,
            'datamoney' => json_encode($datamoney),
            'statusorder' => json_encode($statusorder),
            'total_order' => $total_order,
            'total_product' =>$total_product,
            'total_user' => $total_user,
            'total_article' => $total_article,
            'list_day'=> json_encode($listday),
            'arrrevenuemonth' =>json_encode($arrrevenuemonth),
            'arrrevenuemonthdf' => json_encode($arrrevenuemonthdf),
            'filter' => json_encode($filter)
        ];


        return view('pages.component.chartcomponent', $data);
        
        

    }
    public function export(Request $request){
        if($request->Export=='true'){
            return \Excel::download(new CustomerExport, 'donhang.xlsx');
        }
    }

    public function fetchuser(){
        
        // $cond_id = condmodel::select(DB::raw('cond_id'))->addSelect('cond_id')->get();
        // if(!$cond_id->isEmpty())
        // {
        // $cond = condmodel::find($cond_id);
        // }
        // else
        // {
        // return view('adminpages.User.user')->with('success','Vui lòng thêm thông tin về trang web của bạn');
        // }
        $user = User::find(Session::get('staff_id'));
        $notify = notify::where('read_at',0)->orderBy('id','DESC')->limit(5)->get();
      

        $view_data = [
            'user' => $user,
            'notify' => $notify
        ];
        return view('adminpages.User.user', $view_data);
    }
    public function initialdata(){
          $list_user = customer::orderBy('customer_id','DESC')->paginate(5);
          return view('pages.component.paginateCustomer')->with(compact('list_user'));
    }
    public function viewprofile(){
        $notify = notify::where('read_at',0)->orderBy('id','DESC')->limit(5)->get();
        $staff = User::where('staff_id', Auth::user()->staff_id)->get();
        $data = [
            'staff' => $staff,
            'notify' => $notify
        ];
        return view('adminpages.profile.myprofile',$data);
    }
    public function edit(Request $req){
        $staff_id = $req->staff_id;
        if($req->ajax()){
            $admin = adminmodel::find($staff_id);
            return Response()->json(['data'=>$admin]);
        }

        
    }
    public function save(Request $req){
        // dd($req->all());
        if($req->hasfile('article_img')){
            $file = $req->file('article_img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('public/upload/avatar', $filename);
        }

            $data = [
                'staff_name' => $req->staff_name,
                'staff_mailbox' => $req->staff_mailbox,
                'staff_phone' => $req->staff_phone,
                'staff_address' => $req->staff_address,
                'staff_avatar' => $filename
            ];

            adminmodel::where('staff_id',$req->staff_id)->update($data);
            return Redirect::to('/myprofile')->with('success', 'Cập nhật Thông tin thành công');
    }
    public function getnotify(){
        $user = User::find(2);
        return view('pages.admin',compact('user'));
    }
    public function dadoc(){
        $data = [];
        $data['read_at'] = Carbon::now();
        notify::where('read_at',0)->update($data);
        return Redirect()->back();
    }

}
