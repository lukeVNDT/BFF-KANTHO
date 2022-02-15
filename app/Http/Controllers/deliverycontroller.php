<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\city;
use App\ward;
use App\province;
use App\feeship;
use App\notify;
use App\User;
use Illuminate\Pagination\Paginator;

class deliverycontroller extends Controller
{
    public function getdelivery(Redirect $req){
    	$city = city::orderby('matp','ASC')->get();
        $user = User::find(Session::get('staff_id'));
        $notify = notify::where('read_at',0)->orderBy('id','DESC')->limit(5)->get();
        $data = 
        [
            'user' => $user,
            'notify' => $notify,
            'city' => $city
        ];
    	return view('adminpages.delivery.delivery',$data);
    }
    public function select(Request $req){
    	$data = $req->all();
    	if($data['action']){
    		$output = '';
    		if($data['action']=="city"){
    			$selectprovince = DB::table('district')->where('matp',$data['matp'])->orderby('maqh','ASC')->get();
    			$output.='<option>----chọn quận huyện----</option>';
    			foreach ($selectprovince as $key => $province) {
    				$output.='<option value="'.$province->maqh.'">'.$province->name_qh.'</option>';
    			}
    		}else{
    			$selectward = DB::table('ward')->where('maqh',$data['matp'])->orderby('xaid','ASC')->get();
    			$output.='<option>----chọn xã phường trị trấn----</option>';
    			foreach ($selectward as $key => $ward) {
    				$output.='<option value="'.$ward->xaid.'">'.$ward->name_xptt.'</option>';
    			}
    		}
    	}
    	echo $output;
    }
    public function insert(Request $req){
    	$data = $req->all();
        $feeship = feeship::where("fee_matp",$data['city'])->where("fee_qh",$data['province'])->where("fee_xaid",$data['ward'])->get();
        if($feeship->count() > 0)
        {
            echo "failed";
        }
        else
        {
        	$fee_ship = new feeship;
        	$fee_ship->fee_matp = $data['city'];
            $fee_ship->fee_qh = $data['province'];
            $fee_ship->fee_xaid = $data['ward'];
        	$fee_ship->fee_money = $data['feeship'];
        	$fee_ship->save();
            echo "done";
        }
    }
    public function paginate(Request $req){
        if ($req->ajax()) {
             $feeship = feeship::join('provinceorcity', 'provinceorcity.matp','=','feeship.fee_matp')->join('district', 'district.matp','=','provinceorcity.matp')->join('ward','ward.maqh','=','district.maqh')->groupBy('feeship.fee_id')->paginate(5);
             return view('pages.component.paginateDelivery')->with(compact('feeship'))->render();
        }
    }
    public function selectfee(){
    	// $feeship = feeship::orderby('fee_id','DESC')->get();
        // $feeship = DB::select('select * from feeship a, provinceorcity b, district c, ward d where a.fee_matp = b.matp and b.matp = c.matp and c.maqh = d.maqh GROUP BY a.fee_id');
        $feeship = feeship::join('provinceorcity', 'provinceorcity.matp','=','feeship.fee_matp')->join('district', 'district.matp','=','provinceorcity.matp')->join('ward','ward.maqh','=','district.maqh')->groupBy('feeship.fee_id')->paginate(5);
        return view('pages.component.paginateDelivery')->with(compact('feeship'));
    	// $output = '';
    	// $output .='

    	// 	<div class="table-responsive">
    	// 	<table class="table table-bordered">
     //    <thead>
     //      <tr>
          
     //        <th scope="col">Tên thành phố</th>
     //        <th scope="col">Tên quận huyện</th>
     //        <th scope="col">Tên xã phường thị trấn</th>
     //        <th scope="col">Phí ship</th>
            
     //      </tr>
     //    </thead>
     //    <tbody>';
     //    foreach ($feeship as $key => $fee) {
    			
    	// 		$output .='
     //    <tr>
    	//                <td>'.$fee->name_city.'</td>
     //                   <td>'.$fee->name_qh.'</td>
     //                   <td>'.$fee->name_xptt.'</td>
    	// 				<td contenteditable data-feeship_id="'.$fee->fee_id.'" class="feeship_edit">'.number_format($fee->fee_money,0,',','.').'</td>
    	// 			</tr>
    	// 			';
    	// 		}

    	// 		$output .='
     //    </tbody>

    	// </table>
    	// </div>
     //    <div class="row">
        
     //    <div class="col-sm-5 text-center">
     //      <small class="text-muted inline m-t-sm m-b-sm">Hiển thị kết quả '.$feeship->firstItem().' đến '.$feeship->lastItem().' trong tổng số '.$feeship->total().'</small>
     //    </div>
     //    <div class="col-sm-7 text-right text-center-xs">                
     //      '.$feeship->render().'
     //    </div>
     //  </div>
    	// ';

    	// echo $output;
       
    	
    }
    public function update(Request $req){
    	$data = $req->all();
    	$feeship = feeship::find($data['feeship_id']);
    	$fee_v = rtrim($data['fee_money'],'.');
    	$feeship->fee_money = $fee_v;
    	$feeship->save();
    }
}
