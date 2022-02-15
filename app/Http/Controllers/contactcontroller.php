<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\contact;
use App\articlecat;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use App\notify;
use App\User;
use Session;

class contactcontroller extends Controller
{
	public function save(Request $req, $contact_id){
			$data = $req->all();
			$contact = contact::find($contact_id);
			$contact['info_contact'] = $data['info_contact'];
			$contact['info_fanpage'] = $data['fanpage'];
			$contact['contact_map'] = $data['map'];
			$contact['contact_phone'] = $data['phone'];
			$contact['contact_email'] = $data['contact_email'];
			if($req->hasfile('imgcontact')){
    		$file = $req->file('imgcontact');
    		$extension = $file->getClientOriginalExtension();
    		$filename = time() . '.' . $extension;
    		$file->move('public/upload/contact', $filename);
    		$contact['contact_img'] = $filename;

    	}
    	$contact->save();


    	return Redirect::to('/contactinfo')->with('success', 'Lưu thông tin thành công');
	}
	public function add(Request $req){
			$contact = new contact;
			$contact['info_contact'] = $req->info_contact;
			$contact['info_fanpage'] = $req->fanpage;
			$contact['contact_map'] = $req->map;
			$contact['contact_phone'] = $req->phone;
			$contact['contact_email'] = $req->contact_email;
			if($req->hasfile('imgcontact')){
    		$file = $req->file('imgcontact');
    		$extension = $file->getClientOriginalExtension();
    		$filename = time() . '.' . $extension;
    		$file->move('public/upload/contact', $filename);
    		$contact['contact_img'] = $filename;

    		

    	}
    	$contact->save();


    	return Redirect::to('/contactinfo')->with('success', 'Thêm thông tin thành công');
	}
    public function index(){
    	$contact = contact::all();
    	$user = User::find(Session::get('staff_id'));
        $notify = notify::where('read_at',0)->orderBy('id','DESC')->limit(5)->get();
        $data = [
    		'user' => $user,
    		'notify' => $notify,
    		'contact' => $contact
    	];
    	return view('pages.contact.contact',$data);
    }
    public function get(){
    	$user = User::find(Session::get('staff_id'));
        $notify = notify::where('read_at',0)->orderBy('id','DESC')->limit(5)->get();
    	$contact_id = contact::select(DB::raw('contact_id'))->addSelect('contact_id')->get();
    	if(!$contact_id->isEmpty())
    	{
    	$contact = contact::find($contact_id);
    	$data = [
    		'user' => $user,
    		'notify' => $notify,
    		'contact' => $contact
    	];
    	return view('adminpages.contact.addandupdatecontact',$data);
    	}
    	else
    	{
    	return view('adminpages.contact.addandupdatecontact2')->with('success','Vui lòng thêm thông tin về trang web của bạn');
    	}
    }
}
