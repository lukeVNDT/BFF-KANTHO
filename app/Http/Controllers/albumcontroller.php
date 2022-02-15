<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\album;
use App\notify;
use App\User;
use Session;

class albumcontroller extends Controller
{
    public function index($product_id){
    	$user = User::find(Session::get('staff_id'));
        $notify = notify::where('read_at',0)->orderBy('id','DESC')->limit(5)->get();
        $album = album::where('product_id',$product_id)->paginate(5);
    	$pro_id = $product_id;
    	$data = [
    		'user' => $user,
    		'notify' => $notify,
    		'pro_id' => $pro_id,
            'album' => $album
    	];
    	return view('adminpages.album.albumcollection',$data);
    }
    public function fetch(Request $req){
    	$product_id  = $req->pro_id;
    	$album = album::where('product_id',$product_id)->get();
    	$output = '<form>'.csrf_field().' 
    	      <table id="datatable" class="table">
        <thead>
          <tr>
            <th scope="col">Tên hình ảnh</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Quản lý</th>
          </tr>
        </thead>
        <tbody>
        </form>';
        $count_rs = $album->count();
        if($count_rs>0){
        	foreach ($album as $ab) {
        		$output .='
        		 <tr>
            <td contenteditable class = "editalbumname" data-editalbumid="'.$ab->album_id.'">'.$ab->album_name.'</td>
            <td><img src="'.url('public/upload/album/'.$ab->album_image).'" height="100" width="100"></td>
            <td><button data-idalbum="'.$ab->album_id.'" class="btn btn-danger xoaanh" type="button">
              <i class="far fa-trash-alt"></i>
               </button></td>
          </tr>';
        	}
        }
        else{
        	$output .='
        	<tr>
            <td colspan="4">Sản phẩm chưa có Album ảnh</td></tr>';
        }
        echo $output;
    }
    public function insert($pro_id,Request $req){
    	$image = $req->file('albumimage');
    	if($image){
    		foreach ($image as $key => $im) {
    			$getname = $im->getClientOriginalName();
    			$nameimg = current(explode('.', $getname));
    			$new_image = $nameimg.rand(0,99).'.'.$im->getClientOriginalExtension();
    			$im->move('public/upload/album',$new_image);
    			$album = new album;
    			$album->album_name = $new_image;
    			$album->album_image = $new_image;
    			$album->product_id = $pro_id;
    			$album->save();
    		}
    	}
    	return Redirect()->back()->with('success', 'Thêm Album thành công');
    }
    public function edit(Request $req){
    	$album_id = $req->album_id;
    	$album_name = $req->album_name;
    	$album = album::find($album_id);
    	$album->album_name = $album_name;
    	$album->save();
    }
    public function delete($id){
    	$album_id = $id;
    	album::where('album_id',$album_id)->delete();
    	return Redirect()->back();
    }
    public function slice(Request $req){
    	$album_id = $req->id;
    	album::where('album_id',$album_id)->delete();
    }
}
