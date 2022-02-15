<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\category;
use App\brand;
use App\product;
use Session;
use App\notify;
use App\User;
use App\HelperClass\Recusive;


class productcategory extends Controller
{

    private $category;

    public function __construct(category $cate){
        $this->category = $cate;
    }

    public function filterrange(Request $req){
        if($req->ajax()){
            $result = product::whereBetween('product_price',[$req->min,$req->max])->orderBy('product_price','DESC')->get();
        }
        $row_count = $result->count();
        if($row_count>0){
            $html = view("pages.component.filterproduct")->with(compact('result'))->render();
            return response([
                'html' => $html
            ]);
        }
        elseif($row_count==0){
            $message = 'Không có sản phẩm nào phù hợp trong tầm giá';
            return response([
                'message' => $message
            ]);
        }
    }
    public function test(){
        return view('pages.category.test');
    }
    public function filter2(Request $req){
        
        if($req->ajax())
        {
            if($req->selected == "giagiam")
            {
                $result = product::orderBy('product_price','DESC')->get();
            }
            elseif($req->selected == "giatang")
            {
                $result = product::orderBy('product_price','ASC')->get();
            }
            elseif($req->selected == "az")
            {
                $result = product::orderBy('product_name','ASC')->get();
            }
            elseif($req->selected == "za")
            {
                $result = product::orderBy('product_name','DESC')->get();
            }
            $row_count = $result->count();
                if($row_count>0)
                {
                    $html = view("pages.component.filterproduct")->with(compact('result'))->render();
                    return response([
                    "html"=>$html]);
                }
        }
    }
    public function filter(Request $req){

        if($req->ajax()){
            $output = '';
            
                $query = product::with('brand')->with('category')->where('product_status',1);
                if($req->selected == "giagiam")
                {
                    $result = $query->orderBy('product_price','DESC')->paginate(6);
                }
                elseif($req->selected == "giatang")
                {
                    $result = $query->orderBy('product_price','ASC')->paginate(6);
                }
                elseif($req->selected == "az")
                {
                    $result = $query->orderBy('product_name','ASC')->paginate(6);
                }
                elseif($req->selected == "za")
                {
                    $result = $query->orderBy('product_name','DESC')->paginate(6);
                }
                if($req->min && $req->max){
                    $min = explode(',', $req->min);
                    $minval = '';
                    $maxval = '';
                    foreach ($min as $key => $value) {
                        $minval .= $min[$key];
                    }

                    $max = explode(',', $req->max);
                    foreach ($max as $key => $value) {
                        $maxval .= $max[$key];
                    }

                    $result = $query->whereBetween('product_price',[$minval,$maxval])->orderBy('product_price','DESC')->paginate(6);
                }
                elseif ($req->min == '' && $req->max == '') {
                      $message = 'Không có sản phẩm nào phù hợp trong tầm giá';
                        return response([
                            'message' => $message
                        ]);              
                }
                if($req->finalbrand)
                {
                    $brand_id = implode(',', $req->finalbrand);
                    $result = $query->whereIn('brand_id',[$brand_id])->paginate(6);
                }
                if($req->finalcate){
                    $category_id =  implode("','", $req->finalcate);
                    $result = $query->whereIn('category_id',[$category_id])->paginate(6);
                    
                }
                
                $row_count = $result->count();
                if($row_count>0)
                {
                    $html = view("pages.component.filterproduct")->with(compact('result'))->render();
                    return response([
                    "html"=>$html]);
                   
                }
                else
                {
                    $html = '<br><br><h3 class="ml-3">Không tìm thấy sản phẩm nào phù hợp!</h3></span>';
                    return response([
                    "html"=>$html]);
                }
            
        }
        // echo $output;
    }
    public function addcategory(){
    	return view('adminpages.add-category');
    }
    public function initialcategory(){
        $listcategory = category::orderBy('category_id','DESC')->paginate(5);
        return view('pages.component.paginateCategory')->with(compact('listcategory'));
    }
    public function paginate(Request $req){
        if ($req->ajax()) {
            $listcategory = category::orderBy('category_id','DESC')->paginate(5);
            return view('pages.component.paginateCategory')->with(compact('listcategory'));
        }
    }
    public function listcategory(){
        $user = User::find(Session::get('staff_id'));
        $notify = notify::where('read_at',0)->orderBy('id','DESC')->limit(5)->get();
    	$listcategory = category::orderBy('category_id', 'DESC')->get();
        $recusive = new Recusive($listcategory);
        $htmlOption = $recusive->Recusivecategory();

        $allcategory = category::orderBy('category_id','DESC')->paginate(5);
        $data = 
        [
            'user' => $user,
            'notify' => $notify,
            'listcategory' => $listcategory,
        ];
    	return view('adminpages.all-category',$data)->with(compact('htmlOption','allcategory'));
    }
    public function savecategory(Request $req){
    	$data = $this->category->create([
            "category_name" => $req->category_name,
            "category_desc" => $req->category_desc,
            "category_status" => $req->category_status,
            "parent_id" => $req->parent_id
        ]);
    	if($data){
    		Session::put('message','Thêm danh mục sản phẩm thành công.');
    		return Redirect::to('/add-category');
    	}
    	else{
    		Session::put('messagefailed','Thêm danh mục sản phẩm thất bại.');
    	}

    }
    public function disablestatus($category_id){
    	DB::table('category')->where('category_id', $category_id)->update(['category_status'=>1]);
    	Session::put('message','Hiển thị danh mục sản phẩm thành công');
    	return Redirect::to('/list-category');
    }
    public function enablestatus($category_id){
    	DB::table('category')->where('category_id', $category_id)->update(['category_status'=>0]);
    	Session::put('message', 'Ẩn danh mục sản phẩm thành công');
    	return Redirect::to('/list-category');
    }
    public function editcategory($category_id){
    	$infocategory = DB::table('category')->where('category_id', $category_id)->get();
    	$rendercat = view('adminpages.edit-category')->with('infocategory', $infocategory);
    	return view('pages.admin')->with('adminpages.edit-category', $rendercat);
    }
    public function updatecategory($category_id, Request $req){
    	$data = array();
    	$data['category_name'] = $req->category_name;
    	$data['category_desc'] = $req->category_desc;
    	DB::table('category')->where('category_id', $category_id)->update($data);
    	Session::put('messageupdate', 'Cập nhật danh mục sản phẩm thành công');
    	return Redirect::to('/list-category');
    }
    public function getcategory($parentid){
        $listcategory = category::all();
        $recusive = new Recusive($listcategory);
        $htmlOption = $recusive->Recusivecategory($parentid);
        return $htmlOption;

    }
    public function geteditcategory($id, Request $req){
        $option = '';
        $category = $this->category->find($id);
        $htmlOption = $this->getcategory($category->parent_id);
        if($category->category_status == 1)
        {
            $option .= '<option selected value="1">Hiển thị</option>'; 
            $option .= '<option value="0">Ẩn</option>'; 
        }
        else
        {
            $option .= '<option selected value="0">Ẩn</option>';
            $option .= '<option value="1">Hiển thị</option>'; 

        }
        


        return view('pages.component.editCategory')->with(compact('htmlOption','category', 'option'));
    }
    public function insertcat(Request $req){

        // dd($req->parent_id);
    	$data = $this->category->create([
            "category_name" => $req->category_name,
            "category_desc" => $req->category_desc,
            "parent_id" => $req->parent_id,
            "category_status" => $req->category_status,
            
        ]);
        if($data){
            return Redirect('/list-category')->with('success', 'Thêm danh mục sản phẩm thành công');
        }
        else{
            Session::put('messagefailed','Thêm danh mục sản phẩm thất bại.');
        }
    	

    }
    public function deletecat($id){
    	DB::table('category')->where('category_id', $id)->delete();

    	return Redirect::to('/list-category');
    }
    public function initialdata($category_id){
         $result = DB::table('product')->join('category','product.category_id','=','category.category_id')->where('product.category_id',$category_id)->where('product_status',1)->paginate(6);
         return view('pages.component.filterproduct')->with(compact('result'));
    }
    public function filterpaginateproductbycate(Request $req, $category_id){
        if($req->ajax()){
            $query = product::with('brand')->with('category')->where('product_status',1);
            if($req->filterby == "giagiam")
                {
                    $result = $query->orderBy('product_price','DESC')->paginate(6);
                }
                elseif($req->filterby == "giatang")
                {
                    $result = $query->orderBy('product_price','ASC')->paginate(6);
                }
                elseif($req->filterby == "az")
                {
                    $result = $query->orderBy('product_name','ASC')->paginate(6);
                }
                elseif($req->filterby == "za")
                {
                    $result = $query->orderBy('product_name','DESC')->paginate(6);
                }
                if($req->min && $req->max){
                    $result = $query->whereBetween('product_price',[$req->min,$req->max])->orderBy('product_price','DESC')->paginate(6);
                }
                if($req->brand)
                {
                    $brand_id = $req->brand;
                    $result = $query->whereIn('brand_id',[$brand_id])->paginate(6);
                }
                if($req->cate){
                    $category_id =  $req->cate;
                    $result = $query->whereIn('category_id',[$category_id])->paginate(6);
                    
                }
                else {
                      $result = DB::table('product')->join('category','product.category_id','=','category.category_id')->where('product.category_id',$category_id)->where('product_status',1)->paginate(6);       
                }
                return view("pages.component.filterproduct")->with(compact('result'));
                // dd($result);
                // $row_count = $result->count();
                // if($row_count>0)
                // {
                //     $html = view("pages.component.filterproduct")->with(compact('result'))->render();
                //     return response([
                //     "html"=>$html]);
                   
                // }
                // else
                // {
                //     $html = '<br><br><h3 class="ml-3">Không tìm thấy sản phẩm nào phù hợp!</h3></span>';
                //     return response([
                //     "html"=>$html]);
                // }
        }
    }
    public function productbycate($category_id){
        $max_price = product::max('product_price');
        $min_price = product::min('product_price');
        $min_price_range = $min_price + 0;
        $max_price_range = $max_price + 0;
        $cat = category::where('category_status',1)->get();
        $productbycate = DB::table('product')->join('category','product.category_id','=','category.category_id')->where('product.category_id',$category_id)->get();
        // dd($productbycate);
        $catebyid = DB::table('category')->where('category.category_id',$category_id)->limit(1)->get();
        $brand = brand::all();
        return view('pages.category.productbycate')->with('category',$cat)->with('probycate',$productbycate)->with('catebyid',$catebyid)->with('brand',$brand)->with('min_price_range',$min_price_range)->with('max_price_range',$max_price_range)->with('min_price',$min_price)->with('max_price',$max_price);
    }
    public function update($id, Request $req){
        $this->category->find($id)->update([
            "category_name" => $req->category_name,
            "category_desc" => $req->category_desc,
            "category_status" => $req->category_status,
            "parent_id" => $req->parent_id
        ]);
        return Redirect::to('/list-category')->with('message','Cập nhật danh mục sản phẩm thành công'); 
    }
}
