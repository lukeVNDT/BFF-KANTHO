<style type="text/css">
    .center {
  display: block;
  margin-left: 300px;
  margin-right: auto;
  width: 50%;
}
</style>
@if($rating->count() > 0)
<table id="datatable" class="table">
        <thead>
          <tr>
            {{-- <th scope="col">ID</th> --}}
            <th scope="col">Tên người đánh giá</th>
            <th scope="col">Số sao</th>
            <th scope="col">Sản phẩm</th>
            <th scope="col">Nội dung</th>
            <th scope="col">Hành động</th>
          </tr>
        </thead>
        <tbody>
          


<style type="text/css">
  .ratings span i{
    color: #eff0f5;
  }
  .ratings span.active i{
    color: #faca51;
  }
  .alreadyrep p i{
    color:  #388e3c;
  }
  .alreadyrep p {
    color: #388e3c;
    font-weight: bold;
  }
</style>


<div class="modal" id="insertcat" tabindex="-1" role="dialog">
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
  
  {{-- <div class="form-group">
    <label for="exampleInputPassword1">Nội dung</label>
                                    <textarea  rows="8" class="form-control reply_contentCustomer" ></textarea>
  </div> --}}
  <div id="repeater">
    <div class="repeater__heading" align="right">
       <button  class="delete btn btn-danger"><i class="fas fa-minus"></i></button>
      <button id="add" class="btn btn-success"><i class="fas fa-plus"></i></button>
    </div>
    <div class="clearfix">
      
    </div>
    <br>
    <div class="items" data-group="reply__comment">
      <div class="items__content">
        <div class="row">
          <div class="col-md-12">
            {{-- <div class="form-group">
          <textarea class="form-control" rows="3"></textarea>
        </div> --}}
        <form class="form-horizontal formReply">
<fieldset>

<!-- Form Name -->
<legend>Trả lời đánh giá của khách hàng:</legend>

<!-- Text input-->
<div id="items" class="form-group">
  <textarea rows="3" id="textinput"  placeholder="Nhập bình luận..." class="form-control reply_contentCustomer"></textarea>
</div>

</fieldset>
</form>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  
  <div class="modal-footer">
        <button type="submit" class="btn btn-primary reply" >Lưu</button>
        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal"> Đóng</button> --}}
  </div>
{{-- </form> --}}
</div>
</div>
</div>
</div>
@foreach($rating as $rt)

          <tr>
            <input type="hidden" class="branddelete_val_id" value="{{ $rt->rating_cusid }}">
            <td>{{ $rt->customer->customer_name }}</td>
            <td>
              <div class="ratings">
                @for($i = 1;$i <= 5; $i++)
                <span class="{{ $i <= $rt->star ? 'active' : '' }}"><i class="fas fa-star"></i></span>
                @endfor
              </div>
            </td>
            <td>
            
            <a href="{{ url('/chitietsp/'.$rt->product->product_id) }}" target="_blank">{{ $rt->product->product_name }}</a></td>
            <td>{{ $rt->rating_content }}
              
                @foreach($ratingParent as $rtrep)
                @if($rtrep->rating_parent_id == $rt->rating_id)
                
                  <div class="alreadyrep">
                    <p><i class="fas fa-check-circle"></i> Đã reply</p>
                  </div>
                  
               
                @endif
                @endforeach
              </td>
            <td>
        
           {{-- @foreach($ratingParent as $rtrep) --}}
                @if($ratingParent->count() > 0)
       
<button class="btn btn-warning replyrating" data-starnumber="{{ $rt->star }}" data-productid="{{ $rt->product->product_id }}" data-ratingid="{{ $rt->rating_id }}" data-cusid = "{{ $rt->rating_cusid }}" data-toggle="modal" data-target="#insertcat"><i class="fas fa-edit"></i> Sửa</button>
@else
 {{-- <button style="display:none;" type="button" class="btn btn-warning updateart" data-toggle="modal" data-target="#updatebrand" data-commentid="{{ $rtrep->rating_id }}"  data-commentreply="{{ $rtrep->rating_content }}"><i class="far fa-edit"></i>
</button> --}}
 <button type="button" class="btn btn-warning updateart" data-toggle="modal" data-target="#updatebrand" data-commentid="{{ $rtrep->rating_id }}"  data-commentreply="{{ $rtrep->rating_content }}"><i class="far fa-edit"></i>
</button>
@endif

{{-- @endforeach --}}
                {{-- @if($rt->rating_parent_id == 0)
<button class="btn btn-success replyrating" data-starnumber="{{ $rt->star }}" data-productid="{{ $rt->product->product_id }}" data-ratingid="{{ $rt->rating_id }}" data-cusid = "{{ $rt->rating_cusid }}" data-toggle="modal" data-target="#insertcat"><i class="fas fa-comment-dots"></i></button>
@else
<button style="display:none;" class="btn btn-success replyrating" data-starnumber="{{ $rt->star }}" data-productid="{{ $rt->product->product_id }}" data-ratingid="{{ $rt->rating_id }}" data-cusid = "{{ $rt->rating_cusid }}" data-toggle="modal" data-target="#insertcat"><i class="fas fa-comment-dots"></i></button>
@endif --}}
            </td>
          </tr>
        
      @endforeach
      
        </tbody>
      </table>
      
 
   {{--  <footer class="panel-footer"> --}}
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">Hiển thị kết quả {{$rating->firstItem()}} đến {{$rating->lastItem()}} trong tổng số {{$rating->total()}}</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
         
          {{$rating->links()}}
        </div>
      </div>
    {{-- </footer> --}}
    
@else
<table class="table">
        <thead>
            <tr>
                {{-- <img src="{{asset('public/upload/nodata3.jpg')}}" class="center"  height="450" width="450"> --}}
                <span class="center" style="font-size: 25px;font-weight: bold;text-align: center;">Không tìm thấy đánh giá phù hợp!</span>
            </tr>
        </thead>
    </table>
@endif

<script type="text/javascript">
  $(".delete").hide();
  //when the Add Field button is clicked
  $("#add").click(function(e) {
    $(".delete").fadeIn("1500");
    //Append a new row of code to the "#items" div
    $("#items").append(
      '<p></p><div class="next-referral"><textarea rows="3" id="textinput"  placeholder="Nhập bình luận..." class="form-control reply_contentCustomer"></textarea></div>'
    );
  });
  $("body").on("click", ".delete", function(e) {
    $(".next-referral").last().remove();
  });
  $('.modal').on('hide.bs.modal,hidden.bs.modal', function () {
 setTimeout(function(){
  $('body').css('padding-right',0);
 },0);
});
</script>
