<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\notify;
use App\User;
use App\roles;
use App\permission;
use DB;


class rolescontroller extends Controller
{
	private $roles;
	private $notify;
	private $permission;
	public function __construct(roles $role, notify $notify,permission $permission ){
		$this->roles = $role;
		$this->notify = $notify;
		$this->permission = $permission;
	}

	public function deleterole(Request $req){
		$role = $this->roles->find($req->id)->delete();

	}

	public function edit(Request $req, $id){
		try {
			DB::beginTransaction();
			$this->roles->find($id)->update([
				"name" => $req->name,
				"display_name" => $req->display_name
			]);

			$role = $this->roles->find($id);

			$role->permissions()->sync($req->permission_id);

			DB::commit();

			return Redirect('/listrole');
		} catch (Exception $e) {
			DB::rollback();
		}
	}
	public function editpage($id){
		$notify = $this->notify->where('read_at', 0)->orderBy('id', 'DESC')->limit(5)->get();


		$role = $this->roles->find($id);

		
		$checkedPermission = $role->permissions;

		

		$parentPermission = $this->permission->where('parent_id', 0)->get();

		$data = 
		[
			"notify" => $notify,
			"parentPermission" => $parentPermission
		];

		return view('adminpages.roleManagement.role.editrole', $data)->with(compact('role', 'checkedPermission'));
	}
	public function add(Request $req){
		try {
			DB::beginTransaction();
			$role = $this->roles->create([
				"name" => $req->name,
				"display_name" => $req->display_name,

			]);
			$role->permissions()->attach($req->permission_id);
			DB::commit();
			return Redirect('/listrole');
		} catch (Exception $e) {
			DB::rollback();
		}
	}
	public function rolepage(){
		$notify = $this->notify->where('read_at', 0)->orderBy('id', 'DESC')->limit(5)->get();

		$parentPermission = $this->permission->where('parent_id', 0)->get();

		$data = 
		[
			"notify" => $notify,
			"parentPermission" => $parentPermission
		];

		return view('adminpages.roleManagement.role.addroles', $data);
	}
    public function getallrole(){

    	$roles = $this->roles->all();

    	
    	$notify  = $this->notify->where('read_at', 0)->orderBy('id', 'DESC')->limit(5)->get();

    	$data = 
    	[
    		"notify" => $notify,
    		"roles" => $roles
    	];
    	return view('adminpages.roleManagement.role.listrole', $data);
    }
}
