@extends('pages.memberprofile')
@section('maincontent')
<style type="text/css">
    .card__favourite {
        box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 8px;
        border-radius: 20px;
    }
    .breadcrumb {
         border-radius: 20px;
    }
</style>
 <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Sản phẩm yêu thích</li>
                        </ol>

<div class="card h-100 card__favourite">
    <div class="card-body">
<div class="renderTable">
  
</div>
</div>
</div>

@endsection
@section('scripts')

<script type="text/javascript">
   $('.deletefavorite').click(function(e){
        e.preventDefault();
        let url = $(this).attr('href');
        let that = $(this);
        $.ajax({
            url:url,
            method:"GET",
            success:function(data){
              Toast.fire({
              icon: 'success',
              title: 'Đã bỏ yêu thích sản phẩm'
            });
            that.parent().parent().remove();
            }
        });
          
       
    });
	$(document).ready(function() {

    getInitialData();
        

    function getInitialData(){
      $.ajax({
        url:"{{url('/initialfavorite')}}",
        success:function(data){
          $('.renderTable').html(data);
        }
      });
    }

    $(document).on("click", ".pagination a", function(e){
      e.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      fetchPaginationData(page);
    });

    function fetchPaginationData(page){
      $.ajax({
        url:"{{url('/listfavorite/fetch_data')}}" + "?page=" + page,
        success:function(data){
            $('.renderTable').html(data);
        }
      });
    }


   


    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });
});
</script>


@endsection