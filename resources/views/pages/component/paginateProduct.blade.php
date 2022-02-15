<style type="text/css">
    .center {
  display: block;
  margin-left: 300px;
  margin-right: auto;
  width: 50%;
}
</style>
@if($data->count() > 0)
 <table id="datatable" class="table">
        <thead>
          <tr>
            <!-- <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th> -->
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Số lượng sản phẩm</th>
            <th scope="col">Hiển thị</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Danh mục</th>
            <th scope="col">Nhãn hiệu</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Nội dung</th>
            <th style="width:220px;">Hành động</th>
          </tr>
        </thead>
        <tbody id="tablerow">
 @foreach($data as $key => $row)
 <tr>
                        <td>{{$row->product_name}}</td>
                        <td>{{$row->product_quantity}}</td>
                        <td>
                            @if($row->product_status== 0)
                            <a href="{{URL::to('/disable-pro/'.$row->product_id)}}" class="btn btn-primary"><i class="fas fa-eye"></i> Hiển thị</a> 
                            @else
                            <a href="{{URL::to('/enable-pro/'.$row->product_id)}}" class="btn btn-danger"><i class="fas fa-eye-slash"></i> Ẩn</a>
                            @endif
                        </td>
                        <td>
                           <img src="{{url('public/upload/product/'.$row->product_img)}}" height="50" width="50">
                        </td>
                        <td>{{$row->category_name}}</td>
                        <td>{{$row->brand_name}}</td>
                        <td>{{$row->product_desc}}</td>
                        <td>{{$row->product_content}}</td>
                        <td><button type="button" data-id="{{$row->product_id}}" class="btn btn-danger swalbutton">
              <i class="far fa-trash-alt"></i> Xóa
            </button>
              <a href="{{URL::to('/updateproduct/'.$row->product_id)}}" class="btn btn-warning">
                <i class="far fa-edit"></i> Sửa
              </a>
              <a href="{{URL::to('/albumproduct/'.$row->product_id)}}" class="btn btn-success">
                <i class="far fa-image"></i> Ảnh
              </a></td>
                    </tr>
@endforeach
 </tbody>
      </table>
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">Hiển thị kết quả {{$data->firstItem()}} đến {{$data->lastItem()}} trong tổng số {{$data->total()}}</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          {{-- <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul> --}}
          {{$data->links()}}
        </div>
      </div>
@else
    <table class="table">
        <thead>
            <tr>
                {{-- <img src="{{asset('public/upload/nodata2.png')}}" class="center"  height="450" width="450"> --}}
                <span class="center" style="font-size: 25px;font-weight: bold;text-align: center;">Không tìm thấy sản phẩm phù hợp!</span>
            </tr>
        </thead>
    </table>
    
@endif

{{-- <td colspan="9" style="font-size: 25px;font-weight: bold;text-align: center;">Không tìm thấy sản phẩm phù hợp</td> --}}