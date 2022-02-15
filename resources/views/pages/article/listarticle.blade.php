@extends('welcome')
@section('content')
<style type="text/css">
    .center {
  display: block;
  margin-left: 530px;
  margin-right: auto;
  width: 50%;
}
</style>
<!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                            <li class="active">Bài viết</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Begin Li's Main Blog Page Area -->
            <div class="li-main-blog-page pt-60 pb-55">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Main Content Area -->
                        <div class="col-lg-12">
                            <div class="row li-main-content">
                                @foreach($listarticle as $list)
                                <div class="col-lg-6 col-md-6">
                                    <form>
                                        @csrf
                                    <div class="li-blog-single-item pb-25">
                                        <div class="li-blog-banner">
                                            <a href="{{ URL::to('/articledetail/'.$list->article_id) }}"><img class="img-full" src="{{ asset('public/upload/article/'.$list->article_avatar) }}" height="250" width="100"></a>
                                        </div>
                                        <div class="li-blog-content">
                                            <div class="li-blog-details">
                                                <h3 class="li-blog-heading pt-25"><a href="{{ URL::to('/articledetail/'.$list->article_id) }}">{{ $list->article_name }}</a></h3>
                                                <div class="li-blog-meta">
                                                    <a class="author" href="#"><i class="fa fa-user"></i>Admin</a>
                                                    {{-- <a class="comment" href="#"><i class="fa fa-comment-o"></i> 3 comment</a> --}}
                                                    <a class="post-time" href="#"><i class="fa fa-calendar"></i> {{ $list->created_at }}</a>
                                                </div>
                                                <p>{!!$list->article_desc!!}</p>
                                                <a class="read-more" href="{{ URL::to('/articledetail/'.$list->article_id) }}">Chi tiết...</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
                                @endforeach
                                <!-- Begin Li's Pagination Area -->
                                <div class="col-lg-12">
                                    <div class="center">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="pagination">
                                                    {{$listarticle->links()}}
                                                    {{-- <li><a class="Previous" href="#">Previous</a></li>
                                                    <li class="active"><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a class="Next" href="#">Next</a></li> --}}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Li's Pagination End Here Area -->
                            </div>
                        </div>
                        <!-- Li's Main Content Area End Here -->
                    </div>
                </div>
            </div>
@endsection

@section('scripts')
{{-- <script type="text/javascript">
    $(document).ready(function(){
        var _token = $('input[name="_token"]').val();

        fetchdata('');

        function fetchdata(id = ''){
            $.ajax({
                url:"{{ url('/loadmorearticle') }}",
                method:"POST",
                data:{
                    id:id,
                    _token:_token
                },
                success:function(data){
                    $('.loadmore').remove();
                    $('#loadcomment').append(data);
                }
            });
        }

        $(document).on("click",'.loadmore',function(){
            id = $(this).data('id');
            $('.loadmore').html('<i class="fas fa-spinner"></i>');
            fetchdata(id);
        });
    });
</script> --}}
@endsection