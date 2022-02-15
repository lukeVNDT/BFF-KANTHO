@extends('pages.admin')
@section('maincontent')
<style type="text/css">

/* for xl */

.custom-switch.custom-switch-xl .custom-control-label {
    padding-left: 4rem;
    padding-bottom: 2.5rem;
}

.custom-switch.custom-switch-xl .custom-control-label::before {
    height: 2.5rem;
    width: calc(4rem + 0.75rem);
    border-radius: 5rem;
}

.custom-switch.custom-switch-xl .custom-control-label::after {
    width: calc(2.5rem - 4px);
    height: calc(2.5rem - 4px);
    border-radius: calc(4rem - (2.5rem / 2));
}

.custom-switch.custom-switch-xl .custom-control-input:checked ~ .custom-control-label::after {
    transform: translateX(calc(2.5rem - 0.25rem));
    background: linear-gradient(to right, #aaffa9, #11ffbd); 

}
</style>
 @foreach($product as $key => $pro)
            <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <form action="{{ URL::to('/save-product/'.$pro->product_id) }}" method="POST" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="box-title">Ảnh</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="card-body">
                <div class="form-group">
                  <label for="myfile">Chọn hình ảnh:</label>
                <input type="file" id="myfile" name="product_img">
                <p></p>
                <img src="{{ URL::to('public/upload/product/'.$pro->product_img) }}" width="88px" height="88px">
                </div>
                
              </div>
              <!-- /.box-body -->

              
          </div>

          
          <!-- /.box -->
          <br></br>
          <!-- Form Element sizes -->
          <div class="card">
            <div class="card-header">
              <h3 class="box-title">Tên sản phẩm</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="card-body">
                <div class="form-group">
                                    
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm" name="product_name" value="{{ $pro->product_name }}">
                                  </div>
                
              </div>
              <!-- /.box-body -->

             

          </div>
          <!-- /.box -->
          <br></br>
          <div class="card">
            <div class="card-header">
              <h3 class="box-title">Số lượng sản phẩm</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

              <div class="card-body">
                <div class="form-group">
                                    
                                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập số lượng sản phẩm" name="product_quantity" value="{{ $pro->product_quantity }}">
                                  </div>
                
              </div>
              <!-- /.box-body -->

              

          </div>

          <br></br>
          <div class="card">
            <div class="card-header">
              <h3 class="box-title">Giá sản phẩm</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="card-body">
                <div class="form-group">
                                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập giá sản phẩm" name="product_price" value="{{ $pro->product_price }}">
                                  </div>
              </div>
              <!-- /.box-body -->
          </div>
          <br></br>

          <div class="card">
            <div class="card-header">
              <h3 class="box-title">Mô tả sản phẩm</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="card-body">
                <div class="form-group">
                                   
                                    <textarea  rows="8" class="form-control" name="product_desc" id="exampleInputPassword1" placeholder="Mô tả sản phẩm">{{ $pro->product_desc }}</textarea>
                                </div>
              </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- Input addon -->
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="card">
            <div class="card-header">
              <h3 class="box-title">Nội dung sản phẩm</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="card-body">
                <div class="form-group">
                                    
                                    <textarea  rows="8" class="form-control" name="product_content" id="exampleInputPassword1" placeholder="Nội dung sản phẩm">{{ $pro->product_content }}</textarea>
                                </div>
              
              </div>
              <!-- /.box-body -->
          </div>
          <br></br>

          <div class="card">
            <div class="card-header">
              <h3 class="box-title">HOT</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="card-body">
                <div class="form-group">
                              <div class="custom-control custom-switch custom-switch-xl">
  <input type="checkbox" class="custom-control-input" id="customSwitch7" name="product_hot" 
  value="{{$pro->product_hot == 1 ? 1 : 0}}" {{$pro->product_hot == 1 ? "checked" : ""}}>
  <label class="custom-control-label" for="customSwitch7"></label>
</div>
                            {{-- <input name="product_hot" type="checkbox" data-toggle="toggle"  value="{{$pro->product_hot == 1 ? 1 : 0}}" {{$pro->product_hot == 1 ? "checked" : ""}}> --}}
                            
                                </div>
               
              </div>
              <!-- /.box-body -->
          </div>

          <br></br>

          <div class="card">
            <div class="card-header">
              <h3 class="box-title">Danh mục sản phẩm</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="card-body">
                <div class="form-group">
                                    
                                      <select name="category_id" class="form-control input-sm m-bot15">
                                       
                                            {!! $htmlOption !!}
                                    </select>
                                </div>
              
              </div>
              <!-- /.box-body -->
          </div>
          <br></br>

          <div class="card">
            <div class="card-header">
              <h3 class="box-title">Nhãn hiệu sản phẩm</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="card-body">
                <div class="form-group">
                                    
                                      <select name="brand_id" class="form-control input-sm m-bot15">
                                        @foreach($brand as $key=> $br)
                                        @if($br->brand_id==$pro->brand_id)
                                           <option selected value="{{ $br->brand_id }}">{{ $br->brand_name }}</option>
                                        @else
                                        <option value="{{ $br->brand_id }}">{{ $br->brand_name }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
              
              </div>
              <!-- /.box-body -->
          </div>
          <br></br>

          <div class="card">
            <div class="card-header">
              <h3 class="box-title">Ẩn/Hiển thị</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="card-body">
                <div class="form-group">
                                
                                      <select name="product_status" class="form-control input-sm m-bot15">
                                            {!!$option!!}
                                    </select>
                                </div>
                <a href="{{url()->previous()}}">                
                <button style="float:right;" type="button" class="btn btn-secondary"><i class="fas fa-window-close"></i> Quay lại</button>
              </a>
                 <button style="float:right;" type="submit" class="btn btn-primary themthongtin"><i class="fas fa-save"></i> Lưu</button>
              </div>
              <!-- /.box-body -->
          </div>

          
        </form>
          <!-- /.box -->
          <!-- general form elements disabled -->
          
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    @endforeach
    <!-- /.content -->
    <br></br>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $("#myfile").fileinput({showCaption: false, dropZoneEnabled: false});
        $("#customSwitch7").change(function(){
          if($(this).prop("checked"))
          {
            $(this).val(1);
          }
          else 
          {
            $(this).val(0);
          }
        });
    });
</script>
@endsection