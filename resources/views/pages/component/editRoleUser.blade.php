<div class="modal" id="updateRoleUser" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cập nhật User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{URL::to('/updateuser/'.$user->staff_id)}}" method="POST" role="form">
          {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Tên User</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên User" name="staff_name"
    value="{{ $user->staff_name }}">
  </div>
  <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <input type="text" class="form-control" name="email" id="exampleInputPassword1" placeholder="Nhập Email" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Nhập Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn vai trò</label>
                                      <select id="select3" name="role_id[]" class="form-control" multiple>
                                            <option value=""></option>
                                            @foreach($role as $roles)
                                            <option
                                            {{$roleOfUser->contains('id' , $roles->id) ? 'selected' : ''}}
                                             value="{{ $roles->id }}">{{ $roles->name }}</option>
                                            @endforeach
                                    </select>
                                </div>
  <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Lưu</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
  </div>
</form>
</div>
</div>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#updateRoleUser').modal("show");

    $('#select3').select2({
      'placeholder':'chọn vai trò'
    });
  });
</script>