@extends('pages.admin')
@section('maincontent')
<div class="modal" id="listwaitcmt" tabindex="-1" role="dialog" >
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document" style="border-radius: 10px;">
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title">Danh sách các đánh giá chờ phê duyệt</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
          
          <div class="WaitingCmtTbl">
            
          </div>
  <div class="modal-footer">
        
  </div>

</div>
</div>
</div>
</div>
      

<div class="card shadow h-100 py-2 allRating"
                    style="background:linear-gradient(to bottom, #4e54c8, #8f94fb);   border-radius: 20px;">
                                <div class="card-body">

                                    <div class="row no-gutters align-items-center">
                                        <div class="col-sm-1">
                                            <i style="font-size:50px" class='bx bxs-star-half bx-tada bx-flip-vertical' ></i>
                                            
                                        </div>
                                        <div class="col-sm- 11 mr-1">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1"
                                             style="font-size:20px">
                                                Đánh giá của khách hàng</div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>


    <div class="card border-left-danger shadow h-100 py-2 mt-4"
    style="border-radius: 20px;">

                                <div class="card-body">
                                  <button class="btn btn-info ml-4 waitingapprove" data-toggle="modal" data-target="#listwaitcmt"></button>
                                    <div class="row no-gutters align-items-center">
                                        <div class="card-body">
                                          
   <div class="col-sm-2">
        <div class="form-group">
          <span>Lọc theo số sao:</span>
    
    <select id="statusid" class="form-control input-sm m-bot15">
          <option disabled selected value="NonChoose">---Chọn số sao---</option>
          <option value="1">1 sao</option>
           <option value="2">2 sao</option>
            <option value="3">3 sao</option>
           <option value="4">4 sao</option>
            <option value="5">5 sao</option>

        </select>
  </div>
  
      </div>




<div class="modal" id="updatebrand" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Trả lời đánh giá của khách hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{-- <form action="{{URL::to('/insertarticle')}}" method="POST" role="form" enctype="multipart/form-data">
          {{ csrf_field() }} --}}
  <div class="form-group">
    <label for="exampleInputPassword1">Comment cũ:</label>
                                    <textarea disabled id="oldcmt" rows="8" class="form-control reply_content" {{-- id="article1" --}}></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Comment mới:</label>
                                    <textarea  rows="8" class="form-control newcmt" {{-- id="article1" --}}></textarea>
  </div>
  
  <div class="modal-footer">
        <button type="submit" class="btn btn-primary changecmt" >Gửi</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Đóng</button>
  </div>
{{-- </form> --}}
</div>
</div>
</div>
</div>
      <div class="renderTable">
        
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
  const spinner = '<div class="spinner-border text-light" role="status"><span class="sr-only"></span></div>';

  function getInitialDataRating(){
      $.ajax({
        url:"{{url('/initialrating')}}",
        success:function(data){
          $(".renderTable").html(data);
        }
      });
    }

  function waitingCmt(){
        $.ajax({
          url:"{{url('/waitingcmt')}}",
          success:function(data){
            $('.WaitingCmtTbl').html(data);
          }
        });
        setTimeout(waitingCmt, 3000);
      }

  $(document).on("click",".denined",function(){
    var rating_id = $(this).data('ratingid');
    var that = $(this);
    $(this).html(spinner);
    setTimeout(function(){
      $.ajax({
      url:`{{url('/reject/${rating_id}')}}`,
      success:function(data){
        if(data == "done")
        {
          toast({
                                    title: "Thông báo",
                                    message: "Đã từ chối đối với bình luận này!",
                                    type: "success",
                                    duration: 7000
                                   });
          $(".denined").html('<i class="fas fa-comment-slash"></i>');
          that.parent().parent().remove();
          // waitingCmt();
        }
        
      }
    });
    },1500);
  });

  $(document).on("click", ".approve",function(){
    var rating_id = $(this).data('ratingid');
    var pro_id = $(this).data('pro_id');
    var star =$(this).data('star');
    $(this).html(spinner);
    setTimeout(function(){
      $.ajax({
      url:"{{url('/approve')}}",
      method:"POST",
      data:{
        rating_id:rating_id,
        pro_id:pro_id,
        star:star,
        "_token":"{{ csrf_token() }}"
      },
      success:function(data){
        if(data == "done")
        {
          toast({
                                    title: "Thông báo",
                                    message: "Đã phê duyệt bình luận!",
                                    type: "success",
                                    duration: 7000
                                   });
          $(".approve").html('<i class="fas fa-check-circle"></i>');
          waitingCmt();
          getInitialDataRating();
        }
        
      }
    });
    },1500);
  });
  

  $(document).on('blur','.editcontent', function(){
      var rating_id = $(this).data('ratingid');
      var content = $(this).text();
      $.ajax({
        url:"{{ url('/updatecmt') }}",
        method:'POST',
        data:{rating_id:rating_id,content:content,"_token":"{{ csrf_token() }}",},
          success:function(data){
            if (data=="done") {
              toast({
              title: 'success',
              message: 'Cập nhật nội dung đánh giá thành công!',
              type: 'success',
              duration: 7000
             });
            // loadalbum();
            }
            else
            {
               toast({
              title: 'error',
              message: 'Đã có lỗi xảy ra!',
              type: 'success',
              duration: 7000
             });
            }
            
          }
      });
    });
  $(document).on("click",'.replyrating',function(){
     
      var icon = '<i class="fas fa-comment-dots"></i>';
      var star = $(this).data('starnumber');
      var parent_id = $(this).data('ratingid');
      var product_id = $(this).data('productid');
      var cusid = $(this).data('cusid');
      $(document).on("click",".reply",function(){
        var reply_content = [];
        $(".reply_contentCustomer").each(function(){
          reply_content.push($(this).val());
        });
        
        $(this).html(spinner);
        setTimeout(function(){
             $.ajax({
        url:"{{ url('/replyrating') }}",
        method:"POST",
        data:
        {
          "_token":"{{ csrf_token() }}",
          star:star,
          parent_id:parent_id,
          product_id:product_id,
          reply_content:reply_content,
          cusid:cusid
        },
        success:function(data){
          if(data == "done"){
                    $(".reply").text("Gửi");
                     toast({
                                    title: "Thông báo",
                                    message: "Trả lời bình luận khách hàng thành công!",
                                    type: "success",
                                    duration: 7000
                                   });
                     setTimeout(function(){
                      location.reload();
                     },1000);
                }
          else
          {
            swal("Thông báo!", "Đã có lỗi xảy ra!", "error");
           //  toast({
           //  title: 'Thông báo',
           //  message: 'Mỗi đánh giá được trả lời một lần!',
           //  type: 'error',
           //  duration: 5000
           // });
            // toast({
            //                         title: "Thông báo",
            //                         message: "Đánh giá này đã được Reply!",
            //                         type: "warning",
            //                         duration: 7000
            //                        });
             $(".reply").text("Gửi");
          }
        }
      });
        }, 1200);
     
      });
    });
  $(document).ready(function(){



    getInitialDataRating();

    setTimeout(waitingCmt, 3000);

    setTimeout(getcount, 3000);








    function getcount(){
    $.ajax({
      url:"{{url('/countwaiting')}}",
      success:function(data){
        $(".waitingapprove").html(`Đánh giá chờ duyệt <span class="badge badge-danger">${data.count}</span>`);
        
      }
    });
    setTimeout(getcount, 3000);
  }

      


     $(document).on("click", ".pagination a", function(e){
      e.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      var star = $('#statusid :selected').val();
      fetchPaginationData(page,star);
    });

    function fetchPaginationData(page,star){
      $.ajax({
        url:"{{url('/listrating/fetch_data')}}" + "?page=" + page + "&star=" + star,
        success:function(data){
            $('.renderTable').html(data);
        }
      });
    }


    function fetch(id){
      $.ajax({
        url:"{{ url('/filterrating') }}",
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

    
   
  $('#updatebrand').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var old = button.data('commentreply');
    var cmtid = button.data('commentid');

    var modal =$(this);
    modal.find('.modal-body #oldcmt').val(old);

    

    $(document).on('click', '.changecmt', function(){
      var newcmt = $('.newcmt').val();
      $(this).html(spinner);
      setTimeout(function(){
        $.ajax({
        url:"{{ url('/updatecmt') }}",
        method:"POST",
        data:
        {
          "_token":"{{ csrf_token() }}",
          newcmt:newcmt,
          cmtid:cmtid
        },
        success:function(data){
           if(data == "done"){
            $('changecmt').text("Gửi");
                     toast({
                                    title: "Thông báo",
                                    message: "Cập nhật bình luận thành công!",
                                    type: "success",
                                    duration: 7000
                                   });
                     setTimeout(function(){
                      location.reload();
                     },1000)
                }
        }
      });
      },1500);
      
    });
  });

    
    $('.swalbutton').click(function(e){
      e.preventDefault();
      id = e.target.dataset.id;
           swal({
  title: "Thông báo?",
  text: "Bạn có chắc muốn xóa nhãn hiệu sản phẩm này?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    $(`#deletebrand${id}`).submit();
    swal("Thành công! nhãn hiệu đã bị xóa!", {
      icon: "success",
    });

  } else {
    swal("Danh mục của bạn vẫn an toàn!");
  }
});
    });
  });
</script>
<script type="text/javascript">
  $('.updateart').click(function(){
    var article_id = $(this).data('idarticle');
    var _token = $('input[name="_token"]').val();
    $.ajax({
      url:"{{url('/editarticle')}}",
      method:"POST",
      dataType:"JSON",
      data:{article_id:article_id,_token:_token},
      success:function(html){
        $('#articlename').val(html.data.article_name);
        $('#articledesc').val(html.data.article_desc);
        // $('#articlecatid').html(data.articlecat_name);
        $('#articlecontent').val(html.data.article_content);
        $('#articleimg').html("<img height= '150' width= '150' src=public/upload/article/"+ html.data.article_avatar +" />");

      }

    });
  });
</script>

<?php
                                $message = Session::get('success');
                                if($message){
                                    echo '<script type="text/javascript">
                                    toast({
                                    title: "Thông báo",
                                    message: "'.$message.'",
                                    type: "success",
                                    duration: 7000
                                   });
                             </script>';
                             Session::put('success',null);
                                }
                            ?>
@endsection