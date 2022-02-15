@extends('pages.admin')
@section('maincontent')



<div class="card shadow h-100 py-2 allOrder"
                    style="background:linear-gradient(to right, #1488cc, #2b32b2);border-radius: 15px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-sm-1">
                                          
                                            <i style="font-size:50px" class='bx bxs-notepad bx-tada mt-1' ></i>
                                        </div>
                                        <div class="col-sm- 11 mr-1">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1"
                                             style="font-size:20px">
                                                Đơn hàng</div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>



<div class="card border-left-primary shadow h-100 py-2 mt-4"
style="border-radius: 15px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="card-body">
                                          
      <div class="col-sm-2">
        <div class="form-group">
          <span>Lọc trạng thái đơn:</span>
    
    <select id="statusid" class="form-control input-sm m-bot15">
          <option disabled selected value="NonChoose">---Chọn trạng thái---</option>
          <option value="1">Chưa xử lý</option>
           <option value="2">Đã xử lý</option>
        </select>
  </div>
  
      </div>

      
      
    


      <div class="renderTable">
        
      </div>
  </div>
</div>
                                        </div>
                                    </div>
                               

@endsection

@section('scripts')
<script type="text/javascript">
  $(document).ready(function(){
    getInitialData();

     $(document).on("click", ".pagination a", function(e){
      e.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      var status = $('#statusid :selected').val();
      fetchPaginationData(page,status);
    });

    function fetchPaginationData(page,status){
      $.ajax({
        url:"{{url('/listorder/fetch_data')}}" + "?page=" + page + "&status=" + status,
        success:function(data){
            $('.renderTable').html(data);
        }
      });
    }

    function getInitialData(){
      $.ajax({
        url:"{{url('/orderdata')}}",
        success:function(data){
          $('.renderTable').html(data);
        }
      });
    }
    function fetch(id){
      $.ajax({
        url:"{{ url('/filterstatus') }}",
        method:"GET",
        data:{id:id},
        success:function(data){
          $('.renderTable').html(data);
        }
      });
    }
    $('#statusid').on('change',function(e){
    var id = $(this).val();
    fetch(id);
  });


  // $('body').on('keyup','#search',function(){
  //   var query = $(this).val();
  //   $.ajax({
  //     method:'POST',
  //     url:"{{ url('/searchorder') }}",
  //     dataType:'JSON',
  //     data:{
  //       '_token': '{{ csrf_token() }}',
  //       query:query
  //     },
  //     success:function(res){
  //       var table_row = '';

  //       $('#rowresult').html('');
  //       $.each(res, function(index, value){
  //         table_row = '<tr><td>'+value.order_id+'</td><td>'+value.total_price+'</td></tr>';
  //         $('#rowresult').append(table_row);
  //       })
  //     }
  //   })
  // })
  });
  
</script>
@endsection