<div class="table-responsive">
    		<table class="table table-bordered">
        <thead>
          <tr>
          
            <th scope="col">Tên thành phố</th>
            <th scope="col">Tên quận huyện</th>
            <th scope="col">Tên xã phường thị trấn</th>
            <th scope="col">Phí ship</th>
            
          </tr>
        </thead>
        <tbody>

           @foreach ($feeship as $key => $fee) 
          
        
        <tr>
                     <td>{{$fee->name_city}}</td>
                       <td>{{$fee->name_qh}}</td>
                       <td>{{$fee->name_xptt}}</td>
              <td contenteditable data-feeship_id="{{$fee->fee_id}}" class="feeship_edit">{{number_format($fee->fee_money,0,',','.')}}</td>
            </tr>
     @endforeach

        </tbody>

      </table>
      </div>
        <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">Hiển thị kết quả {{$feeship->firstItem()}} đến {{$feeship->lastItem()}} trong tổng số {{$feeship->total()}}</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          {{$feeship->render()}}
        </div>
      </div>
    