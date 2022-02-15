<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slide;
use Illuminate\Support\Facades\Redirect;
use Response;
use App\notify;
use App\User;
use DB;
use Session;

class bannercontroller extends Controller
{
	public function update(Request $req){
		
		// $data = slide::where('slide_position', $req->slide_position)->where('slide_sort',$req->slide_sort)->get();
		// dd($data);
  //   	$count_row = $data->count();
  //   	if($count_row > 0)
  //   	{
  //   		return Redirect::to('/listbanner')->with('failed', 'Đã tồn tại 1 Banner cho vị trí ưu tiên này, vui lòng xóa hoặc cập nhật lại vị trí của Banner');
  //   	}
  //   	else
  //   	{
    		$slide = array();
			$slide['slide_name'] = $req->slide_name;
			$slide['slide_link'] = $req->slide_link;
			$slide['slide_content'] = $req->slide_content;
			$slide['slide_position'] = $req->slide_position;
			$slide['slide_sort'] = $req->slide_sort;
			$getimage = $req->slide_image2;
			if($getimage){
	    		$extension = $getimage->getClientOriginalExtension();
	            $filename = time() . '.' . $extension;
	            $getimage->move('public/upload/slide', $filename);
	            $slide['slide_image'] = $filename;
	    		slide::where('slide_id',$req->slide_id)->update($slide);
		    	return Redirect::to('/listbanner')->with('success', 'Cập nhật slide thành công');

    	}
    	slide::where('slide_id',$req->slide_id)->update($slide);
    	return Redirect::to('/listbanner')->with('success', 'Cập nhật slide thành công');
    	// }
		
		
		
		
	}
	public function del($id){
		slide::where('slide_id',$id)->delete();
	}
    public function index(){
    	$user = User::find(Session::get('staff_id'));
        $notify = notify::where('read_at',0)->orderBy('id','DESC')->limit(5)->get();
    	$slide = slide::paginate(5);
    	

    	$data = [
    		'slide' => $slide,
    		'user' => $user,
    		'notify' => $notify
    	];

    	return view('adminpages.banner.listbanner', $data);
    }
    public function insert(Request $req){
    	$data = slide::where('slide_position', $req->slide_position)->where('slide_sort',$req->slide_sort)->get();
    	$count_row = $data->count();
    	if($count_row > 0)
    	{
    		return Redirect::to('/listbanner')->with('failed', 'Đã tồn tại 1 Banner cho vị trí ưu tiên này, vui lòng xóa hoặc cập nhật lại vị trí của Banner');
    	}
    	else
    	{
    		$slide = new slide;
	    	$slide['slide_name'] = $req->slide_name;
	    	$slide['slide_link'] = $req->slide_link;
	    	$slide['slide_content'] = $req->slide_content;
	    	$slide['slide_position'] = $req->slide_position;
	    	$slide['slide_sort'] = $req->slide_sort;
	        $slide['staff_id'] = Session::get('staff_id');
	    	if($req->hasfile('slide_image')){
	    		$file = $req->file('slide_image');
	    		$extension = $file->getClientOriginalExtension();
	    		$filename = time() . '.' . $extension;
	    		$file->move('public/upload/slide', $filename);
	    		$slide['slide_image'] = $filename;

    	}
    	$slide->save();
    	return Redirect::to('/listbanner')->with('success', 'Thêm slide thành công');
    	}
    	
    }
    public function edit(Request $req, $slide_id){
    	if($req->ajax()){
    		$sl = slide::find($slide_id);
    		// dd($sl);
    		return view('pages.component.editBanner')->with(compact('sl'));
    	}
    	
    	// $output['slide_name'] = $slide->slide_name;
    	// $output['slide_link'] = $slide->slide_link;
    	// $output['slide_target'] = $slide->slide_target;
    	// $output['slide_sort'] = $slide->slide_sort;
    	// $output['slide_image'] = '<p><img style="height: 150px;width: 150px;" src="public/upload/slide/'.$slide->slide_image.'"></p>';

    	
    }
}
