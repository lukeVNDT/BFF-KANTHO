@extends('pages.admin')
@section('maincontent')
 <!-- Main content -->
  @if(Session::has('success'))
          <div class="alert alert-success" role="alert">
                                            {{ Session::get('success') }} <i class="fas fa-check-circle"></i>
                                          </div>
          @endif
    <section class="content">
     
        <!--/.col (left) -->
        <!-- right column -->
        
          <!-- Horizontal Form -->
          
          <form action="{{ url('/addrole') }}" method="POST">
            {{csrf_field()}}
             <div class="card">
          
            <div class="card-header">
              <h3 class="box-title">Tên vai trò</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="card-body">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="phone" value="">
                </div>
              </div>
              <!-- /.box-body -->
          </div>
          <br></br>
          <div class="card">
            <div class="card-header">
              <h3 class="box-title">Mô tả</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="card-body">
                <div class="form-group">
                  <textarea rows="5" type="text" name="display_name" class="form-control" id="email" value=""></textarea>
                </div>
                {{-- <button type="submit" class="btn btn-primary themthongtin"><i class="fas fa-save"></i> Lưu</button> --}}
              </div>
              <!-- /.box-body -->
          </div>
           <br></br>
           @foreach($parentPermission as $parent)
           <div class="card border-left-success shadow h-100 py-2">
                                  <div class="card-header">
                                    <label>
                                       <input class="checkbox-wrapper" type="checkbox" name="">
                                    </label>
                                      {{ $parent->name }}
                                   
                                  </div>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                      @foreach($parent->hasChild as $child)
                                        <div class="col-md-3 mb-5">
                                          <input value="{{ $child->id }}" class="checkbox-children" type="checkbox" name="permission_id[]"> {{ $child->name }}
                                        </div>
                                      @endforeach
                                    </div>
                                </div>
                            </div>

          <br></br>
          @endforeach
          <button class="btn btn-primary">Thêm</button>
          </form>
         
          <!-- /.box -->
          <!-- general form elements disabled -->
          
          <!-- /.box -->
        
@endsection

@section('scripts')
<script type="text/javascript">
$(".checkbox-wrapper").on("click", function(){
  $(this).parents('.card').find('.checkbox-children').prop('checked', $(this).prop('checked'));
});

CKEDITOR.replace('contact1');
$("#myfile").fileinput({showCaption: false, dropZoneEnabled: false});
</script>
@endsection