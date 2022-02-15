<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\notify;
use App\User;
use App\roles;
use DB;

class rolemanagementcontroller extends Controller
{

	private $user;
	private $roles;

	public function __construct(User $user, roles $roles){
		$this->user = $user;
		$this->roles = $roles;
	} 

   	public function index(){
   		$role = $this->roles->get();
   		$users = $this->user->paginate(10);
   	 	$notify = notify::where('read_at',0)->orderBy('id','DESC')->limit(5)->get();
   	 	$data = [
   	 		"notify" => $notify,
   	 		"users" => $users,
   	 		"role" => $role
   	 	];
   		return view('adminpages.roleManagement.userRole.listuser', $data);
    }

    public function insert(Request $req){
    	// dd($req->all());

    	try
    	{
    		DB::beginTransaction();
    		$user = $this->user->create([
    		"staff_name" => $req->staff_name,
    		"email" => $req->email,
    		"password" => bcrypt($req->password)
    	]);
    	$user->roles()->attach($req->role_id);
    	DB::commit();
    	return Redirect('/listroleofuser');
    	} catch(Exception $exception)
    	{
    		DB::rollback();
    	}
    	
    	
    }
    public function getdatauser($id){
    	$role = $this->roles->all();
    	$user = $this->user->find($id);
    	$roleOfUser = $user->roles;
    	// dd($roleOfUser);
    	return view('pages.component.editRoleUser')->with(compact('role', 'user', 'roleOfUser'));
    }

    public function update(Request $req, $id){

    	try {
            if($req->filled('password')){

            DB::beginTransaction();
            $this->user->find($id)->update([
            "staff_name" => $req->staff_name,
            "email" => $req->email,
            "password" => bcrypt($req->password)
        ]);
            $user = $this->user->find($id);
            $user->roles()->sync($req->role_id);
            DB::commit();
            return Redirect('/listroleofuser');
            }
            else
            {
                 DB::beginTransaction();
            $this->user->find($id)->update([
            "staff_name" => $req->staff_name,
            "email" => $req->email
        ]);
            $user = $this->user->find($id);
            $user->roles()->sync($req->role_id);
            DB::commit();
            return Redirect('/listroleofuser');
            }
    		
    	} catch (Exception $e) {
    		DB::rollback();
    	}
    	


    }

    public function delete(Request $req){
    	$this->user->find($req->id)->delete();
    }
}
