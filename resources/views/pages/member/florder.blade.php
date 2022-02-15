@extends('pages.memberprofile')
@section('maincontent')
<style type="text/css">
    .steps .step {
    display: block;
    width: 100%;
    margin-bottom: 35px;
    text-align: center
}

.card__order {
    box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 8px;
    border-radius: 20px;
}
.breadcrumb {
         border-radius: 20px;
    }
.check
{
    color: #4caf50;
}
.feeship
{
    color: #4caf50;
}

.steps .step .step-icon-wrap {
    display: block;
    position: relative;
    width: 100%;
    height: 80px;
    text-align: center
}

.steps .step .step-icon-wrap::before,
.steps .step .step-icon-wrap::after {
    display: block;
    position: absolute;
    top: 50%;
    width: 50%;
    height: 3px;
    margin-top: -1px;
    background-color: #e1e7ec;
    content: '';
    z-index: 1
}

.steps .step .step-icon-wrap::before {
    left: 0
}

.steps .step .step-icon-wrap::after {
    right: 0
}

.steps .step .step-icon {
    display: inline-block;
    position: relative;
    width: 80px;
    height: 80px;
    border: 1px solid #e1e7ec;
    border-radius: 50%;
    background-color: #f5f5f5;
    color: #374250;
    font-size: 38px;
    line-height: 81px;
    z-index: 5
}

.steps .step .step-title {
    margin-top: 16px;
    margin-bottom: 0;
    color: #606975;
    font-size: 14px;
    font-weight: 500
}

.steps .step:first-child .step-icon-wrap::before {
    display: none
}

.steps .step:last-child .step-icon-wrap::after {
    display: none
}

.steps .step.completed .step-icon-wrap::before,
.steps .step.completed .step-icon-wrap::after {
    background-color: #0da9ef
}

.steps .step.completed .step-icon {
    border-color: #0da9ef;
    background-color: #0da9ef;
    color: #fff
}

@media (max-width: 576px) {
    .flex-sm-nowrap .step .step-icon-wrap::before,
    .flex-sm-nowrap .step .step-icon-wrap::after {
        display: none
    }
}

@media (max-width: 768px) {
    .flex-md-nowrap .step .step-icon-wrap::before,
    .flex-md-nowrap .step .step-icon-wrap::after {
        display: none
    }
}

@media (max-width: 991px) {
    .flex-lg-nowrap .step .step-icon-wrap::before,
    .flex-lg-nowrap .step .step-icon-wrap::after {
        display: none
    }
}

@media (max-width: 1200px) {
    .flex-xl-nowrap .step .step-icon-wrap::before,
    .flex-xl-nowrap .step .step-icon-wrap::after {
        display: none
    }
}

.bg-faded, .bg-secondary {
    background-color: #f5f5f5 !important;
}
Similar snippets
</style>
 <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Đơn hàng đã mua</li>
                        </ol>
                        {{-- <div class="card">
                            <div class="card-body">
                                <p class="card-title">ahaha</p>
                                <div class="row">
                                    <div class="col-8">adaaf</div>
                                    <div class="col-4">adaaf</div>
                                </div>
                            </div>
                        </div> --}}

<div class="renderTable">
    
</div>

<div class="card h-100 card__order">
    <div class="card-body">
        <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Tên khách hàng</th>
      <th scope="col">Tổng tiền</th>
      <th scope="col">Ngày đặt hàng</th>
      <th scope="col">Tình trạng</th>
      <th scope="col">Hành động</th>
    </tr>
  </thead>
  <tbody>
    @foreach($order as $od)

    <tr>
      <td>{{ $od->customer_name }}</td>
      <td>{{ number_format($od->total_price).' '.'VNĐ' }}</td>
      <td>{{ $od->created_at }}</td>
      <td>@if($od->order_status==1)
                <span class="badge badge-secondary">Chưa xử lý</span>
                @else
                <span class="badge badge-success">Đã xử lý</span>
                @endif
            </td>
            <td><a href="{{ url('vieworderuser/'.$od->order_id) }}" class="btn btn-warning showdetail"><i style="font-size:20px;" class='bx bxs-show mt-1'></i>
</a></td>
    </tr>
    <!-- Modal -->

    @endforeach
  </tbody>
</table>

<div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">Hiển thị kết quả {{$order->firstItem()}} đến {{$order->lastItem()}} trong tổng số {{$order->total()}}</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
        
          {{$order->links()}}
        </div>
      </div>
    </div>
</div>



 
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chi tiết đơn hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')

<script type="text/javascript">
	$(document).ready(function() {



    $('.showdetail').click(function(e){
        e.preventDefault();
        let url = $(this).attr('href');
        $.ajax({
            url:url,

        }).done(function(result){
            $("#exampleModal .modal-body").html(result.html);
            $("#exampleModal").modal({
                show : true
            });

        });
    });

    $(document).on("click",'.submitprofile',function(){
    	var name = $('#hovaten').val();
    	var phone = $('#sdt').val();
    	var customer_id = $('#customer_id').val();
    	$.ajax({
    		url:"{{ url('/updatememberprofile') }}",
    		method:"POST",
    		data:
    		{
    			"_token":"{{ csrf_token() }}",
    			name:name,
    			phone:phone,
    			customer_id:customer_id
    		},
    		success:function(data){
    			if(data == "done"){
                    swal("Thông báo!", "Cập nhật thông tin thành công", "success").then(() => window.location.reload());
                }
    		}
    	});
    });


    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });
});
</script>


@endsection