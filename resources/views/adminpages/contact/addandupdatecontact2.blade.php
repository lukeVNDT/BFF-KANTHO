@extends('pages.admin')
@section('maincontent')
 <!-- Main content -->
  @if(Session::has('success'))
          <div class="alert alert-success" role="alert">
                                            {{ Session::get('success') }} <i class="fas fa-check-circle"></i>
                                          </div>
          @endif


          <div class="card shadow h-100 py-2 allInfo"
                    style="background:linear-gradient(to right, #b993d6, #8ca6db);  border-radius: 20px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-sm-1">
                                            
                                            <i style="font-size:50px" class='bx bxs-info-square bx-tada mt-1' ></i>
                                        </div>
                                        <div class="col-sm- 11 mr-1">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1"
                                             style="font-size:20px">
                                              Thông tin website</div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
  <br>
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <form action="{{ URL::to('/addcontact/') }}" method="POST" role="form" enctype="multipart/form-data">
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
                <input type="file" id="myfile" name="imgcontact">
                <p></p>
                </div>
                
              </div>
              <!-- /.box-body -->

              
          </div>

          
          <!-- /.box -->
          <br></br>
          <!-- Form Element sizes -->
          <div class="card">
            <div class="card-header">
              <h3 class="box-title">Bản đồ</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="card-body">
                <div class="form-group">
                  <textarea style="height: 180px" name="map" class="form-control"  id="bando"></textarea>
                </div>
                
              </div>
              <!-- /.box-body -->

             

          </div>
          <!-- /.box -->
          <br></br>
          <div class="card">
            <div class="card-header">
              <h3 class="box-title">Fanpage</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

              <div class="card-body">
                <div class="form-group">
                  <textarea style="height: 180px;" name="fanpage" class="form-control" id="fanpage"></textarea>
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
              <h3 class="box-title">Thông tin liên hệ</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="card-body">
                <div class="form-group">
                  <textarea name="info_contact" class="form-control" id="contact1" ></textarea>
                </div>
                
              </div>
              <!-- /.box-body -->

              
          </div>
          <br></br>
          <div class="card">
            <div class="card-header">
              <h3 class="box-title">Số điện thoại</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="card-body">
                <div class="form-group">
                  <input type="number" name="phone" class="form-control" id="phone" >
                </div>
                
              </div>
              <!-- /.box-body -->
              
              
          </div>
          <br></br>
          <div class="card">
            <div class="card-header">
              <h3 class="box-title">Email</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="card-body">
                <div class="form-group">
                  <input type="email" name="contact_email" class="form-control" id="email" >
                </div>
                <button type="submit" class="btn btn-primary themthongtin"><i class="fas fa-save"></i> Lưu</button>
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
    <!-- /.content -->
    <br></br>
@endsection

@section('scripts')
<script type="text/javascript">
CKEDITOR.replace('contact1');
$("#myfile").fileinput({showCaption: false, dropZoneEnabled: false});
</script>
@endsection