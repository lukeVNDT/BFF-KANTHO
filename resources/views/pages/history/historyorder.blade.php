@extends('welcome')
@section('content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách đơn hàng
      
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertcat"><span class="glyphicon glyphicon-plus"></span>
  Thêm nhãn hiệu
</button> --}}


      <table id="datatable" class="table table-striped b-t b-light">
        <thead>
          <tr>
          	<th scope="col">STT</th>
            <th scope="col">Mã đơn hàng</th>
            <th scope="col">Ngày đặt hàng</th>
            <th scope="col">Tình trạng đơn hàng</th>
            <th style="width:180px;">Hành động</th>
          </tr>
        </thead>
        <tbody>
     @php
     $i = 0;
     @endphp
     @foreach($getorder as $key => $od)
     @php
     $i++;
     @endphp
     
          <tr>
            <input type="hidden" class="branddelete_val_id" value="{{ $od->order_id }}">
            <td>{{$i}}</td>
            <td>{{$od->order_code}}</td>
            <td>{{$od->created_at}}</td>
            <td>@if($od->order_status==1)
            	Đơn hàng mới
            	@else
            	Đã xử lý
            	@endif
            </td>
            <td>
        <button type="button" data-id="{{ $od->order_id }}"  class="btn btn-danger swalbutton">
          <span class="glyphicon glyphicon-trash" ></span> Xóa
          <form action="" id="deletebrand{{$od->order_id}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }} 
          </form>
          <a href="{{ URL::to('detailorder/'.$od->order_code) }}">
        </button>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#updatebrand"><span class="glyphicon glyphicon-eye-open"></span>
  Chi tiết
</button>
</a>
            </td>
          </tr>
     @endforeach
        </tbody>
      </table>
      
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection