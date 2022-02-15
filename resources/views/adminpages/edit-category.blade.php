@extends('pages.admin')
@section('maincontent')
<header class="panel-heading">
   <p class="font-weight-bold">Cập nhật danh mục sản phẩm:</p>
</header>
<div class="row justify-content-center">
            <div class="col-lg-6">
                    <section class="panel">
                        

                            <div class="position-center">
                                @foreach($infocategory as $key => $editvalue)
                                <form role="form" action="{{URL::to('/update-category/'.$editvalue->category_id)}}" method="post">
                              {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" name="category_name" value="{{$editvalue->category_name}}" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                        
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea  rows="8" class="form-control" name="category_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{$editvalue->category_desc}}</textarea>
                                </div>
                                
                               
                                <button type="submit" name="updatecategory" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Lưu danh mục</button>
                                </form>
                                @endforeach
                        </div>
                    </section>

            </div>
    </div>
@endsection