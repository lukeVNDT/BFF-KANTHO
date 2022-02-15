@extends('welcome')
@section('content')
@foreach($detail as $key => $dt)
            <!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                            <li class="active">{{ $dt->article_name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
@endforeach
            <!-- Begin Li's Main Blog Page Area -->
            <div class="li-main-blog-page li-main-blog-details-page pt-60 pb-60 pb-sm-45 pb-xs-45">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Blog Sidebar Area -->
                        <div class="col-lg-3 order-lg-1 order-2">
                            <div class="li-blog-sidebar-wrapper">
                                
                                
                                
                                <div class="li-blog-sidebar">
                                    <h4 class="li-blog-sidebar-title">Bài viết gần đây</h4>
                                    @foreach($recent_post as $rcpost)
                                    <div class="li-recent-post pb-30">
                                        <div class="li-recent-post-thumb">
                                            <a href="blog-details.html">
                                                <img style="height: 77.33px;width: 65px;" class="img-full" src="{{ URL::to('/public/upload/article/'.$rcpost->article_avatar) }}" alt="Li's Product Image">
                                            </a>
                                        </div>
                                        <div class="li-recent-post-des">
                                            <span><a href="{{ URL::to('/articledetail/'.$rcpost->article_id) }}">{{ $rcpost->article_name }}</a></span>
                                            <span class="li-post-date">{{ $rcpost->created_at }}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                
                            </div>
                        </div>
                        @foreach($detail as $key => $de)
                        <!-- Li's Blog Sidebar Area End Here -->
                        <!-- Begin Li's Main Content Area -->
                        <div class="col-lg-9 order-lg-2 order-1">
                            <div class="row li-main-content">
                                <div class="col-lg-12">
                                    <div class="li-blog-single-item pb-30">
                                        <div class="li-blog-banner">
                                            <a href="blog-details.html"><img class="img-full" src="images/blog-banner/bg-banner.jpg" alt=""></a>
                                        </div>
                                        <div class="li-blog-content">
                                            <div class="li-blog-details">
                                                <h3 class="li-blog-heading pt-25"><a href="#">{{ $de->article_name }}</a></h3>
                                                <div class="li-blog-meta">
                                                    <a class="author" href="#"><i class="fa fa-user"></i>Admin</a>
                                                    
                                                    <a class="post-time" href="#"><i class="fa fa-calendar"></i> {{ $de->created_at }}</a>
                                                </div>
                                                <p>{!! $de->article_desc !!}</p>
                                                <!-- Begin Blog Blockquote Area -->
                                                <div class="li-blog-blockquote">
                                                    <img src="{{ URL::to('/public/upload/article/'.$de->article_avatar) }}" style="height: 400px;width: 800px;">
                                                </div>
                                                <!-- Blog Blockquote Area End Here -->
                                                <p>{!!$de->article_content !!}</p>
                                               
                                                <div class="li-blog-sharing text-center pt-30">
                                                    <h4>share this post:</h4>
                                                    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0&appId=903125927198846&autoLogAppEvents=1" nonce="D9Avx15g"></script>
<div class="fb-share-button" data-href="{{ Request::url() }}" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Begin Li's Blog Comment Section -->
                                    {{-- <div class="li-comment-section">
                                        <h3>03 comment</h3>
                                         <div class="fb-comments" data-href="{{ Request::url() }}" data-width="1178" data-numposts="5">
                                        
                                    </div>
                                    </div> --}}
                                    <!-- Li's Blog Comment Section End Here -->
                                    <!-- Begin Blog comment Box Area -->
                                    {{-- <div class="li-blog-comment-wrapper">
                                        <h3>leave a reply</h3>
                                        <p>Your email address will not be published. Required fields are marked *</p>
                                        <form action="#">
                                            <div class="comment-post-box">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label>comment</label>
                                                        <textarea name="commnet" placeholder="Write a comment"></textarea>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 mt-5 mb-sm-20 mb-xs-20">
                                                        <label>Name</label>
                                                        <input type="text" class="coment-field" placeholder="Name">
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 mt-5 mb-sm-20 mb-xs-20">
                                                        <label>Email</label>
                                                        <input type="text" class="coment-field" placeholder="Email">
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 mt-5 mb-sm-20">
                                                        <label>Website</label>
                                                        <input type="text" class="coment-field" placeholder="Website">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="coment-btn pt-30 pb-sm-30 pb-xs-30 f-left">
                                                            <input class="li-btn-2" type="submit" name="submit" value="post comment">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div> --}}
                                    <!-- Blog comment Box Area End Here -->
                                </div>
                            </div>
                        </div>
                        <!-- Li's Main Content Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Li's Main Blog Page Area End Here -->
@endforeach
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