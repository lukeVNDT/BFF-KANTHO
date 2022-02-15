<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\articlecat;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Notifications\projectnotify;
use Illuminate\Support\Facades\Notification;
use Session;
use App\notify;

class articlecategory extends Controller
{
	public function delete(Request $req){
		articlecat::where('articlecat_id',$req->id)->delete();
		return Redirect('/articlecategory');
	}
    public function paginate(Request $req){
        if ($req->ajax()) {
            $user = User::find(Session::get('staff_id'));
            $notify = notify::where('read_at',0)->orderBy('id','DESC')->limit(5)->get();
            $menuarticle = articlecat::orderBy('articlecat_id', 'DESC')->paginate(5);
            return view('adminpages.articlecategory.menuarticle')->with(compact('menuarticle','user','notify'))->render();
        }
    }
    public function index(){
    	$user = User::find(Session::get('staff_id'));
        $notify = notify::where('read_at',0)->orderBy('id','DESC')->limit(5)->get();

    	$menuarticle = articlecat::orderBy('articlecat_id', 'DESC')->paginate(5);

    	$viewdata = [
    		'menuarticle' => $menuarticle,
    		'user' => $user,
    		'notify' => $notify
    	];

    	return view('adminpages.articlecategory.menuarticle', $viewdata);
    }

    public function insert(Request $req){
    	$user = User::all();
    	$articlecategory = new articlecat;
    	$articlecategory['articlecat_name'] = $req->articlecat_name;
    	$message = "Đã thêm mới một danh mục";

    	$articlecategory->save();
    	
    	return Redirect::to('/articlecategory')->with('success', 'Thêm danh mục bài viết thành công');
    }
    public function update(Request $req){
    	$data = [
    		'articlecat_name'=>$req->articlecat_name
    	];

    	articlecat::where('articlecat_id',$req->articlecat_id)->update($data);
    	return Redirect::to('/articlecategory')->with('success', 'Cập nhật danh mục bài viết thành công');
    	
    }
}
