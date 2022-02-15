<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\product;
use App\category;
use App\brand;
use App\comment;
use App\rating;
use App\album;
use App\favorite;
use File;
use Carbon\Carbon;
use Response;
use App\notify;
use App\HelperClass\Recusive;
use App\User;

class productcontroller extends Controller
{
    public function quickview(Request $req, $product_id){
        if($req->ajax())
        {
            $favorite = favorite::where('product_id', $product_id)->where('customer_id', Session::get('customer_id'))->count();
            $product = product::where('product_id',$product_id)->get();
            $rating = rating::where('product_id',$product_id)->get();
        }
        $row_count = $product->count();
        if($row_count > 0)
        {
            $result = view('pages.component.quickview')->with(compact('favorite','product','rating'))->render();
            return response([
                'result' => $result
            ]);
        }
    }
    public function loadmore(Request $req){
        if($req->ajax()){
            if($req->id>0){
                $comment = comment::where('comment_id','<', $req->id)->where('comment_product_id',$req->product_id)->orderBy('comment_id','DESC')->limit(5)->get();
            }else{
                $comment = comment::where('comment_product_id',$req->product_id)->orderBy('comment_id','DESC')->limit(5)->get();
            }
            $output = '';
            $last_id = '';
            if(!$comment->isEmpty()){
                foreach ($comment as $value) {
                    $output .= '<div class="row comment-author-infos">
            <div class="col-md-2">
                                            
                                            <img src="'.url('/public/upload/avatar/1618725990.jpg').'" width="50%">
                                        </div>
                                        <div class="col-md-10">
                                            <p style="color: blue;">'.$value->comment_person.'</p>
                                        <p>'.$value->comment.'</p>
                                    </div></div><p></p>';
                                    $last_id = $value->comment_id;
                }
                $output .='<div id="taithem">
                                         <div class="col-md-10"><button data-id="'.$last_id.'" type="button" class="btn btn-outline-info loadmore"><i class="fas fa-arrow-down"></i> Tải thêm bình luận khác</button></div>
                                     </div><p></p>';
            }else{
                $output .='<div id="taithem">
                                         <div class="col-md-10"><button disabled data-id="'.$last_id.'" type="button" class="btn btn-outline-info loadmore"><i class="fas fa-arrow-down"></i> Không còn bình luận</button></div>
                                     </div><p></p>';
            }
            echo $output;
        }
    }
    public function post(Request $req){
        $name = $req->name;
        $content = $req->content;
        $id = $req->product_id;
        $comment = new comment;
        $comment->comment_person = $name;
        $comment->comment = $content;
        $comment->comment_product_id = $id;
        $comment->save();
    }
    public function fetch(Request $req){
        $product_id = $req->product_id;
        $data = comment::where('comment_product_id',$product_id)->orderby('comment_id','DESC')->limit(5)->get();
        $output = '';
        foreach ($data as $cmt) {
            $output .= '<div class="row comment-author-infos">
            <div class="col-md-2">
                                            
                                            <img src="'.url('/public/upload/avatar/1618725990.jpg').'" width="50%">
                                        </div>
                                        <div class="col-md-10">
                                            <p style="color: blue;">'.$cmt->comment_person.'</p>
                                        <p>'.$cmt->comment.'</p>
                                    </div></div><p></p>
                                    <div id="taithem">
                                         <div class="col-md-10"><button data-id="'.$cmt->comment_id.'" type="button" class="btn btn-outline-info loadmore"><i class="fas fa-arrow-down"></i> Tải thêm bình luận khác</button></div>
                                     </div>';
        }
        echo $output;
    }
    public function listproduct(){
        $user = User::find(Session::get('staff_id'));
        $notify = notify::where('read_at',0)->orderBy('id','DESC')->limit(5)->get();
    	$cat = category::all();

        $recusive = new Recusive($cat);
        $htmlOption = $recusive->Recusivecategory();
    	$brand =DB::table('brand')->get();
    	$allproduct = product::join('category','category.category_id','=','product.category_id')->join('brand','brand.brand_id','=','product.brand_id')->paginate(5);
        $data = 
        [
            'htmlOption' => $htmlOption,
            'user' => $user,
            'notify' => $notify,
            'cat' => $cat,
            'brand' => $brand,
            'allproduct' => $allproduct
        ];
    	return view('adminpages.all-product',$data)->render();
    }
    public function getInitialData(){
        $data = product::join('category','category.category_id','=','product.category_id')->join('brand','brand.brand_id','=','product.brand_id')->orderBy('product_id','DESC')->paginate(5);
        return view('pages.component.paginateProduct')->with(compact('data'));
    }

    public function insertproduct(Request $req){
    	$data = array();
    	$data['product_name'] = $req->product_name;
        $data['product_quantity'] = $req->product_quantity;
    	$data['category_id'] = $req->category_id;
    	$data['brand_id'] = $req->brand_id;
    	$data['product_desc'] = $req->product_desc;
    	$data['product_content'] = $req->product_content;
    	$data['product_price'] = $req->product_price;
    	$data['product_status'] = $req->product_status;

        $path = 'public/upload/product/';
        $path_album = 'public/upload/album/';
    	
    	if($req->hasfile('product_img')){
    		$file = $req->file('product_img');
    		$extension = $file->getClientOriginalExtension();
    		$filename = time() . '.' . $extension;
    		$file->move($path, $filename);
            File::copy($path.$filename, $path_album.$filename);
    		$data['product_img'] = $filename;

    	}else{
    		return $req;

    		$data['product_img'] = '';
    	}
    	$product_id = product::insertGetId($data);
        $album = new album;
        $album->album_name = $filename;
        $album->album_image = $filename;
        $album->product_id = $product_id;
        $album->save();

    	return Redirect('/list-product')->with('success', 'Thêm sản phẩm thành công');
    }
    public function detailproduct($product_id, Request $req){
        $user = User::find(Session::get('staff_id'));
        $notify = notify::where('read_at',0)->orderBy('id','DESC')->limit(5)->get();
        $DTSport = "DTSport";
        $album = album::where('product_id',$product_id)->get();
        // DB::enableQueryLog();
        $allrating = rating::groupBy('star')->where('product_id',$product_id)->whereNull('rating_person')->where('approve',1)->select(DB::raw('count(star) as solandanhgia'),DB::raw('sum(star) as tongsao'))->addSelect('star')->get()->toArray();
        // $query = DB::getQueryLog();
        // dd($query);

        $arrayrt = [];
        // dd($allrating);
        if(!empty($allrating))
        {
            for($i = 1; $i <= 5; $i++)
            {
                $arrayrt[$i] = 
                [
                    "solandanhgia" => 0,
                    "tongsao" => 0,
                    "star" => 0
                ];
                foreach ($allrating as $key => $value) {
                    if($value['star'] == $i)
                    {
                        $arrayrt[$i] = $value;
                        continue;
                    }
                }
            }
        }

        $viewdata = 
        [
            "arrayrt" => $arrayrt
        ];


        $favorite = favorite::where('product_id', $product_id)->where('customer_id', Session::get('customer_id'))->count();



    	$prodetail = DB::table('product')->join('category','category.category_id','=','product.category_id')
    	->join('brand','brand.brand_id','=','product.brand_id')->where('product.product_id',$product_id)->get();

    	foreach($prodetail as $key=>$value){
    		$category_id = $value->category_id;
    	}

        
    	$relatedpro = product::join('category','category.category_id','=','product.category_id')
    	->join('brand','brand.brand_id','=','product.brand_id')->where('category.category_id',$category_id)->whereNotIn('product.product_id',[$product_id])->get();
    	return view('pages.product.productdetail',$viewdata)->with('detailproduct',$prodetail)->with('related',$relatedpro)->with('album',$album)->with(compact('favorite'));
    }
    public function allcatbrand(){
    	// $category = DB::table('category')->orderby('category_id','desc')->get();
    	// $brand = DB::table('brand')->orderby('brand_id','desc')->get();
    	$data = category::all();
    	return view('adminpages.all-product')->with('category',$data);
    }
    public function searchproduct(Request $req){
    	$searchtext =$_GET['keyword'];
    	$product = product::where('product_name','LIKE','%'.$searchtext.'%')->get();
    	$cat = DB::table('category')->where('category_status','1')->orderby('category_id','desc')->get();
    	$productdisplay = DB::table('product')->orderby('product_id','desc')->limit(8)->get();
    	return view('pages.product.productsearch')->with('result',$product)->with('product', $productdisplay)->with('category', $cat);
    }
    public function delete(Request $req, $product_id){
    	if($req->ajax())
        {
            product::where('product_id',$product_id)->delete();
        }
    }
     public function getcategory($parentid){
        $listcategory = category::all();
        $recusive = new Recusive($listcategory);
        $htmlOption = $recusive->Recusivecategory($parentid);
        return $htmlOption;
    }
    public function update($product_id){
        $option = '';
        $product = product::where('product_id', $product_id)->get();
        foreach ($product as $key => $value) {
            $category_id = $value->category_id;
            $product_status = $value->product_status;
        }
        $htmlOption = $this->getcategory($category_id);
        $user = User::find(Session::get('staff_id'));
        $notify = notify::where('read_at',0)->orderBy('id','DESC')->limit(5)->get();
        $category = DB::table('category')->orderby('category_id','desc')->get();
        $brand = DB::table('brand')->orderby('brand_id','desc')->get();

       if($product_status == 1)
        {
            $option .= '<option selected value="1">Hiển thị</option>'; 
            $option .= '<option value="0">Ẩn</option>'; 
        }
        else
        {
            $option .= '<option selected value="0">Ẩn</option>';
            $option .= '<option value="1">Hiển thị</option>'; 

        }

        return view('adminpages.add-category')->with('brand',$brand)->with('category',$category)->with('product',$product)->with(compact('user','notify', 'htmlOption', 'option'));
    }
    public function saveproduct(Request $req, $product_id){

        // dd($req->all());
        $data =array();
        $data['product_name'] = $req->product_name;
        $data['product_quantity'] = $req->product_quantity;
        $data['category_id'] = $req->category_id;
        $data['brand_id'] = $req->brand_id;
        $data['product_hot'] = $req->product_hot;
        $data['product_desc'] = $req->product_desc;
        $data['product_content'] = $req->product_content;
        $data['product_price'] = $req->product_price;
        $data['product_status'] = $req->product_status;
        $getimage = $req->product_img;
        if($getimage){
            $extension = $getimage->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $getimage->move('public/upload/product', $filename);
            $data['product_img'] = $filename;
            DB::table('product')->where('product_id',$product_id)->update($data);
            Session::put('success','Cập nhật sản phẩm thành công');
            return Redirect('/list-product');
        }

        DB::table('product')->where('product_id',$product_id)->update($data);
        Session::put('success','Cập nhật sản phẩm thành công');
        return Redirect('/list-product');

    }
    public function disablestatus($product_id){
        DB::table('product')->where('product_id', $product_id)->update(['product_status'=>1]);
        Session::put('success','Hiển thị sản phẩm thành công');
        return Redirect::to('/list-product');
    }
    public function enablestatus($product_id){
        DB::table('product')->where('product_id', $product_id)->update(['product_status'=>0]);
        Session::put('success', 'Ẩn sản phẩm thành công');
        return Redirect::to('/list-product');
    }
    public function search(Request $req){
        // $qr = $req->get('query');
        // $data = product::where('product_name','LIKE','%'.$qr.'%')->get();
        // return json_encode($data);
        if($req->ajax()){
            $output = '';
            $qr = $req->get('query');
            if($qr != ''){
                $data = product::join('category','category.category_id','=','product.category_id')
        ->join('brand','brand.brand_id','=','product.brand_id')->where('product_name','LIKE','%'.$qr.'%')->paginate(5);
            }
            else{
                $data =  product::join('category','category.category_id','=','product.category_id')
        ->join('brand','brand.brand_id','=','product.brand_id')->orderBy('product_id','DESC')->paginate(5);
            }
            return view('pages.component.paginateProduct')->with(compact('data'));
        
        }
    }
    public function paginate(Request $req){
        if($req->ajax())
        {
           $qr = $req->get('query');
            $data = product::join('category','category.category_id','=','product.category_id')
        ->join('brand','brand.brand_id','=','product.brand_id')->where('product_name','LIKE','%'.$qr.'%')->paginate(5);
        return view('pages.component.paginateProduct')->with(compact('data'));
        }
    }
}
