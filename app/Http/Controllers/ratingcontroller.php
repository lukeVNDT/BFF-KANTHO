<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rating;
use App\product;
use App\notify;
use App\User;
use App\detailsorder;
use App\customerorder;
use Session;

class ratingcontroller extends Controller
{
    public function waitingcmt(Request $req){
        if($req->ajax()){
            $rating = rating::where('approve',0)->orderBy('rating_id','DESC')->paginate(5);
            return view('pages.component.paginateWaitingCmt')->with(compact('rating'));
        }
    }
    public function approve(Request $req){
        if($req->ajax()){

            $data = [
                "approve" => 1
            ];
            if($req->rating_id)
                {
                    $this->staticratingproduct($req->pro_id, $req->star);
                }
            $rating = new rating;
            $rating->where('rating_id',$req->rating_id)->update($data);
            echo "done";
        }
    }
    public function reject(Request $req, $rating_id){
        if($req->ajax()){
            rating::where('rating_id',$rating_id)->delete();
            echo "done";
        }
    }
    public function filterpaginaterating(Request $req){
        if($req->ajax()){
            $output = '';
            $star = $req->star;
            if($star == "NonChoose"){
                $rating = rating::whereNull('rating_person')->where('approve',1)->orderBy('rating_id','DESC')->paginate(5);
                $ratingParent = rating::whereNotNull('rating_person')->where('approve',1)->get();
            }
            else{
                $rating = rating::where('star',$star)->whereNull('rating_person')->where('approve',1)->orderBy('rating_id','DESC')->paginate(5);
                  $ratingParent = rating::whereNotNull('rating_person')->where('approve',1)->get();
            }
            return view('pages.component.paginateRating')->with(compact('rating','ratingParent'));
            
        }
    }
    public function filter(Request $req){
         if($req->ajax()){
            $output = '';
            $id = $req->id;
            if($id != ''){
                $rating = rating::where('star',$id)->whereNull('rating_person')->where('approve',1)->orderBy('rating_id','DESC')->paginate(5);
                 $ratingParent = rating::whereNotNull('rating_person')->where('approve',1)->get();
            }
            else{
                $rating = rating::whereNull('rating_person')->where('approve',1)->orderBy('rating_id','DESC')->paginate(5);
                 $ratingParent = rating::whereNotNull('rating_person')->where('approve',1)->get();
            }
            return view('pages.component.paginateRating')->with(compact('rating','ratingParent'));
            
        }
    }
    public function initialdata(){
        $rating = rating::whereNull('rating_person')->where('approve',1)->orderBy('rating_id','DESC')->paginate(5);
        $ratingParent = rating::whereNotNull('rating_person')->where('approve',1)->get();
        // dd($rating, $ratingParent);
        return view('pages.component.paginateRating')->with(compact('rating','ratingParent'));
    }
	public function update(Request $req){
		if($req->ajax()){
			$data = [
				"rating_content" => $req->content
			];
			$rating = new rating;
			$rating = rating::where('rating_id',$req->rating_id)->update($data);
			echo "done";
		}
	}
	public function reply(Request $req){
        // dd($req->all());
        $alreadyreply = rating::where('rating_parent_id', $req->parent_id)->get();
        if($req->ajax()){
            try {
                $reply = array();
                $data = array();
                $reply = $req->reply_content;
                
                for ($i=0; $i < count($reply); $i++) { 
                    $data[] = array(
                        'star' => $req->star,
                        'approve' => 1,
                        'rating_person' => "DTSport",
                        'rating_parent_id' => $req->parent_id,
                        'product_id' => $req->product_id,
                        'rating_cusid'=> $req->cusid,
                        'rating_content' => $reply[$i]
                    );

                }

                    $query = rating::insert($data);
                    
                    echo "done";
                } catch (Exception $e) {
                    echo "failed";
                }
		}
	}
    public function count(){
        $count_waiting = rating::where('approve',0)->count();
        return response()->json(['count'=>$count_waiting]);
    }
	public function index(){
		
        
        // dd($rating);
        $user = User::find(Session::get('staff_id'));
        $notify = notify::where('read_at',0)->orderBy('id','DESC')->limit(5)->get();
        $count_waiting = rating::where('approve',0)->get();
		$viewdata = [
            'user' => $user,
            'notify' => $notify,
            'count_waiting' => $count_waiting
    	];
		return view('adminpages.rating.listrating',$viewdata);
	}
    public function loadmorert(Request $req){
        if($req->ajax()){

            if($req->id>0){
                $rating = rating::with('customer')->where('rating_id','<', $req->id)->where('product_id',$req->product_id)->where('approve',1)->where('rating_parent_id','=',0)->orderBy('rating_id','DESC')->limit(5)->get();
                 
                            }else{
                $rating = rating::with('customer')->where('product_id',$req->product_id)->where('approve',1)->where('rating_parent_id','=',0)->orderBy('rating_id','DESC')->limit(5)->get();
            }
           
            $rating_rep = rating::with('customer')->where('product_id',$req->product_id)->where('approve',1)->where('rating_parent_id','>',0)->orderBy('rating_id','DESC')->limit(5)->get();
            $output = '';
            $last_id = '';
            $active = 'active';
            if(!$rating->isEmpty()){
                foreach ($rating as $key => $value) {
                    $output .= '<div class="row comment-author-infos">
            <div class="col-md-2">
                                            
                                            <img src="'.url('/public/upload/avatar/user2.png').'" width="50%" style="margin-top:16px;">
                                        </div>
                                        <div class="col-md-10">
                                            <p style="color: blue;">'.$value->customer->customer_name.'</p>
                                            <p><i id="checkCirlce" class="fas fa-check-circle"></i> Đã mua sản phẩm tại DTSport</p>';
                for($i = 1;$i <= 5; $i++){
                	if($i <= $value->star)
                	{
                		$output .= '<span><i class="fas fa-star active"></i></span>';
                	}
                	else
                	{
                		$output .= '<span class=" "><i class="fas fa-star"></i></span>';
                	}
                }
              $output .='				<p></p>
                                        <p>'.$value->rating_content.'</p>
                                    </div></div></div><p></p>';

                    foreach ($rating_rep as $key => $rep) {
                    	if($rep->rating_parent_id == $value->rating_id){
                                    	$output .= '<div class="row comment-author-infos" style="margin:5px 40px">
            <div class="col-md-2">
                                            
                                            <img src="'.url('/public/upload/avatar/adminavt.png').'" width="50%">
                                        </div>
                                        <div class="col-md-10">
                                            <p style="color: blue;">'.$rep->rating_person.'</p>
                                        <p>'.$rep->rating_content.'</p>
                                    </div></div></br>
                                    ';
                                }
                                    }                
                    
                                    $last_id = $value->rating_id;

                }
                $output .='<div id="taithem">
                                         <div class="col-md-10"><button data-id="'.$last_id.'" type="button" class="btn btn-primary loadmore"> Tải thêm đánh giá khác</button></div>
                                     </div><p></p>';
            }else{
                $output .='<div id="taithem">
                                         <div class="col-md-10"><button disabled data-id="'.$last_id.'" type="button" class="btn btn-outline-info loadmore"> Không còn đánh giá nào khác</button></div>
                                     </div><p></p>';
            }
            echo $output;
        }
    }
    public function sendrating(Request $req){
        $alreadybuyproduct = detailsorder::join('product', 'detailsorder.product_id','=','product.product_id')->join('customerorder','detailsorder.order_id','=','customerorder.order_id')->join('customer','customerorder.customer_id','=','customer.customer_id')->where('detailsorder.product_id', $req->pro_id)->where('customerorder.customer_id',$req->person)->get();
        // dd($alreadybuyproduct);
    	if(Session::get('customer_id') ==''){
    		echo "failed";
    	}
        else
        {
            if($alreadybuyproduct->isEmpty()){

                echo "notbuy";
            }
            else
            {
                $rating = new rating;
                $rating->product_id = $req->pro_id;
                $rating->rating_cusid = $req->person;
                $rating->star = $req->star;
                $rating->rating_content = $req->content;
                // $rating->product_name = $req->product_name;
                $rating->save();
                $notify_content = 'Bạn có đánh giá sản phẩm mới';
                $notify_type = 'thông báo đánh giá';
                $datanotify = [];
                $datanotify['notify_type'] = $notify_type;
                $datanotify['notify_content'] = $notify_content;
                $datanotify['link'] = url('/listrating');
        // Notification::send($user, new projectnotify($message));
        notify::insert($datanotify);

        // if($rating->rating_id)
        // {
        //     $this->staticratingproduct($req->pro_id, $req->star);
        // }
        $this->count();
        echo "done";
            }
        }
        
       
    }
    private function staticratingproduct($product_id, $number){
    	$product = product::find($product_id);
    	$product->product_total_rating++;
    	$product->product_total_star += $number;
    	$product->save();
    }
}
