@extends('pages.admin')
@section('maincontent')


<div class="card shadow h-100 py-2 allDelivery"
                    style="background:linear-gradient(to right, #4cb8c4, #3cd3ad);border-radius: 20px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-sm-1">
                                          
                                            <i style="font-size:50px" class='bx bxs-package bx-tada mt-1' ></i>
                                        </div>
                                        <div class="col-sm- 11 mr-1">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1"
                                             style="font-size:20px">
                                                Vận chuyển</div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
    
      


   <div class="card border-left-primary shadow h-100 py-2 mt-4"
   style="border-radius:20px">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                       <div class="card-body">
                                        {{--  <h2>Danh sách phí vận chuyển</h2> --}}
      <br>

    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertcat"><span class="glyphicon glyphicon-plus"></span>
  Thêm phí vận chuyển
</button> --}}
<form>
          @csrf
    <div class="form-group">
    <label for="exampleInputEmail1">Chọn thành phố</label>
    <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
      <option value="">----chọn thành phố----</option>
      @foreach($city as $key => $ct)  
              <option value="{{ $ct->matp }}">{{ $ct->name_city }}</option>
      @endforeach                        
    </select>
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Chọn quận huyện</label>
    <select name="province" id="province" class="form-control input-sm m-bot15 province choose">
              <option value="">----chọn quận huyện----</option>                     
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Chọn xã phường thị trấn</label>
    <select name="ward" id="ward" class="form-control input-sm m-bot15 ward">
              <option value="">----chọn xã phường thị trấn----</option>                        
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Phí ship</label>
    <input name="fee_ship"  type="number" class="form-control fee_ship" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập phí ship">
  </div>

  <div class="modal-footer">
        <button name="adddelivery" type="button" class="btn btn-primary adddelivery"> Lưu</button>
  </div>
</form>

  <h2>Danh sách phí vận chuyển</h2>
  <p style="font-style: italic;">(Chú ý) Có thể sửa giá phí ship trực tiếp trên bảng</p>
      <br>
      
    <div id="load_delivery">
      
    </div>

    <div id="toast">
  
</div>
   
                                       </div>
                                    </div>
                                </div>
                            </div>
  

@endsection

@section('scripts')
<script type="text/javascript">
  $(document).ready(function(){
    var spinner = '<div class="spinner-border text-light" role="status"><span class="sr-only"></span></div>';
    fetch_delivery();

    $(document).on("click", ".pagination a", function(e){
      e.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      fetchPaginationData(page);
    });

    function fetchPaginationData(page){
      $.ajax({
        url:"{{url('/delivery/fetch_data')}}" + "?page=" + page,
        success:function(data){
            $('#load_delivery').html(data);
        }
      });
    }

    function fetch_delivery(){
      var _token = $('input[name="_token"]').val();
      $.ajax({
          url: '{{ url('/selectfee') }}',
          method: 'POST',
          data:{_token:_token},
          success:function(data){
            $('#load_delivery').html(data);

          }
        });
    }
      $('.choose').on('change',function(){
        var action = $(this).attr('id');
        var matp = $(this).val();
        var _token = $('input[name="_token"]').val();
        // alert(action);
        // alert(matp);
        // alert(_token);
        var rs = '';
        if(action =='city'){
          rs = 'province';
        }else{
          rs = 'ward';
        }
        $.ajax({
          url: '{{ url('/selectdelivery') }}',
          method: 'POST',
          data:{action:action,matp:matp,_token:_token},
          success:function(data){
            $('#'+rs).html(data);
          }
        });
      });
      $(document).on('blur','.feeship_edit',function(){
        var feeship_id = $(this).data('feeship_id');
        var fee_money = $(this).text();
        var _token = $('input[name="_token"]').val();
        $.ajax({
          url: '{{ url('/updatefee') }}',
          method: 'POST',
          data:{feeship_id:feeship_id,fee_money:fee_money,_token:_token},
          success:function(data){
            toast({
  title: 'Thông báo',
  message: 'Cập nhật phí vận chuyển thành công!',
  type: 'success',
  duration: 7000
 });
            fetch_delivery();
          }
        });
      });
      $('.adddelivery').click(function(){

      var city = $('.city').val();
      var province = $('.province').val();
      var ward = $('.ward').val();
      var feeship = $('.fee_ship').val();
      var _token = $('input[name="_token"]').val();
      $(this).html(spinner);
      setTimeout(function(){
        $.ajax({
          url: '{{ url('/insertdeliveryfee') }}',
          method: 'POST',
          data:{city:city,province:province,ward:ward,feeship:feeship,_token:_token},
          success:function(data){
            if (data == "done") {
              $(".adddelivery").text("Lưu");
            toast({
              title: 'Thông báo',
              message: 'Thêm phí vận chuyển thành công!',
              type: 'success',
              duration: 7000
             });
            fetch_delivery();
            }
            else
            {
              $(".adddelivery").text("Lưu");
            toast({
              title: 'Thông báo',
              message: 'Phí vận chuyển này đã được thêm trước đó!',
              type: 'error',
              duration: 7000
             });
            }
          }
        });
      },1500);
      
    });
  });
</script>

@endsection