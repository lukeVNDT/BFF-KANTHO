@if(is_array($cond) || is_object($cond))
@foreach($cond as $key => $con)
<table class="table table-striped">
    <thead>
      <tr>
        <th>Tên điều kiện</th>
        <th>Giá trị</th>
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{ $con->cond_name }}</td>
        <td>{{ $con->cond_value }}</td>
        <td><button data-toggle="modal" data-target="#themdk" class="btn btn-success them">them</button><button class="btn btn-warning sua">sua</button><button class="btn btn-danger xoa">xoa</button></td>
      </tr>
    </tbody>
  </table>
  @endforeach
  @endif