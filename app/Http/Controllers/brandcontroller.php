<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\brand;
use App\notify;
use App\User;

class brandcontroller extends Controller
{
    public function listbrand(){
        $user = User::find(Session::get('staff_id'));
        $notify = notify::where('read_at',0)->orderBy('id','DESC')->limit(5)->get();
        
    	$listbrand = brand::orderBy('brand_id','DESC')->paginate(5);
        $data = [
            'user' => $user,
            'notify' => $notify,
            'listbrand' => $listbrand
        ];
    	return view('adminpages.all-brand', $data);
    }
    public function insertbrand(Request $req){
    	$this->validate($req, [
    		'brand_name'=> 'required',
    		'brand_desc'=> 'required',
    		'brand_status'=> 'required'
    	]);
    	$brand = new brand;
    	$brand->brand_name = $req->input('brand_name');
    	$brand->brand_desc = $req->input('brand_desc');
    	$brand->brand_status = $req->input('brand_status');

    	$brand->save();

    	return Redirect::to('/list-brand')->with('success', 'Thêm nhãn hiệu sản phẩm thành công');
    }
    public function disablebrand($brand_id){
    	DB::table('brand')->where('brand_id', $brand_id)->update(['brand_status'=> 1]);
    	return Redirect::to('/list-brand')->with('success', 'Hiển thị nhãn hiệu sản phẩm thành công');
    }
    public function enablebrand($brand_id){
    	DB::table('brand')->where('brand_id', $brand_id)->update(['brand_status'=> 0]);
    	return Redirect::to('/list-brand')->with('success', 'Ẩn nhãn hiệu sản phẩm thành công');;
    }
    public function deletebrand($id){
    	DB::table('brand')->where('brand_id', $id)->delete();
    	return Redirect::to('/list-brand');
    }
    public function update(Request $req){
    	$data = [
    		'brand_name'=>$req->brandname,
    		'brand_desc'=>$req->brandesc,
    		'brand_status'=>$req->brandst
    	];
    	DB::table('brand')->where('brand_id',$req->brand_id)->update($data);
    	return Redirect::to('/list-brand')->with('success', 'Cập nhật nhãn hiệu sản phẩm thành công');
    }
}
