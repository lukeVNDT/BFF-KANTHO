<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Quản trị BFF Kantho</title>
  
<link rel="stylesheet" href="{{asset('public/backend/admindashboard/bootstrap-3.4.1-dist/css/bootstrap.min.css')}}" >
<script src="https://kit.fontawesome.com/bd4f972d9b.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{asset('public/frontend/limupa/css/darkmode.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<link href='https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css' rel='stylesheet'>
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.17/sweetalert2.min.css" integrity="sha512-fZ1HwrDVLoUUUDGK7gZdHJ4TIMQ9KnleLU/Jgf98v1nGz9umOciIbF3zs3R5stCIY/MVMqReXgUGnxOoWUdZDQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

<!-- Custom CSS -->
<!-- <link href="{{asset('public/backend/visitor/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/backend/visitor/css/style-responsive.css')}}" rel="stylesheet"/>
     -->

  <!-- Custom fonts for this template -->
  {{-- <link href="{{asset('public/backend/sbadmin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css"> --}}
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://code.highcharts.com/css/highcharts.css">

  <!-- Custom styles for this template -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link href="{{asset('public/backend/sbadmin/css/sb-admin-2.css')}}" rel="stylesheet">
   <link href="{{asset('public/backend/sbadmin/css/ToastMsg.css')}}" rel="stylesheet">
   <link href="{{asset('public/backend/sbadmin/css/switchbutton.css')}}" rel="stylesheet">
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- Custom styles for this page -->
  <link href="https://cdn.datatables.net/autofill/2.3.7/css/autoFill.bootstrap4.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
   <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
   <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

<style type="text/css">

            .loader
            {
                width: 100%;
                height: 100%;
                position: fixed;
                padding-top: 19%;
                background: #4e73df;
                padding-left: 48%;
                margin: 0 auto;
                z-index: 99999;
            }
            .btn-warning{
              margin-left: 5px;
              background-color: #ffc400;
              padding: 8px 12px;
              border-radius: 15px;
              color: #fff;
              font-size: 12px;
              transition: all 200ms ease;
              cursor: pointer;
              box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
              border: none;
            }
            .btn-danger{
              margin-left: 5px;
              background-color: #ff1744;
              padding: 8px 12px;
              border-radius: 15px;
              color: #fff;
              font-size: 12px;
              transition: all 200ms ease;
              cursor: pointer;
             box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
              border: none;
            }
            .btn-primary{
              margin-left: 5px;
              background-color: #304ffe;
              padding: 8px 12px;
              border-radius: 15px;
              color: #fff;
              font-size: 12px;
              transition: all 200ms ease;
              cursor: pointer;
              box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
              border: none;
            }
            .btn-secondary{
              margin-left: 5px;
              background-color: #858796;
              padding: 8px 12px;
              border-radius: 15px;
              color: #fff;
              font-size: 12px;
              transition: all 200ms ease;
              cursor: pointer;
             box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
              border: none;
            }
            .btn-info{
              margin-left: 5px;
              background-color: #2196f3;
              padding: 8px 12px;
              border-radius: 15px;
              color: #fff;
              font-size: 12px;
              transition: all 200ms ease;
              cursor: pointer;
             box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
              border: none;
            }
            .btn-success{
              margin-left: 5px;
              background-color: #00e676;
              padding: 8px 12px;
              border-radius: 15px;
              color: #fff;
              font-size: 12px;
              transition: all 200ms ease;
              cursor: pointer;
              box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
              border: none;
            }
            .nav-item.active {
              border-left: 5rem solid linear-gradient(to right,#8971ea,#7f72ea,#7574ea,#6a75e9,#5f76e8);
              /*padding: 2px;
              margin-left: 10px;
              margin-right: 10px;
              border-radius: 10px;
              background-color: #b2ff59;*/
              
            }

        </style>
</head>

<body id="page-top" class style="padding-right: none">
    @if(Session::has('login'))
    <script type="text/javascript">
      swal("Good job!", "{{!!Session::get('login')!!}}", "success");
    </script>
    @endif
    
    <div class="loader">
            <img src="{{asset('public/upload/loader/audio.svg')}}" height="100" width="100">
        </div>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i style="font-size:25px;color: #7f72ea;" class='bx bxs-florist bx-tada' ></i>
        </div>
        <div style="color: #7f72ea;" class="sidebar-brand-text mx-3">BFF Quản trị</div>
      </a>

      <!-- Divider -->
      {{-- <hr class="sidebar-divider my-0"> --}}

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{ URL::to('/') }}">
          <i style="font-size:20px" class='bx bxs-home bx-tada' ></i>
          <span>Trang chủ</span></a>
      </li>
      <!-- Divider -->
     {{--  <hr class="sidebar-divider"> --}}

      <!-- Heading -->
     {{--  <div class="sidebar-heading">
        Interface
      </div> --}}

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{request()->is('*list-category*') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{URL::to('/list-category')}}">
        <i style="font-size:20px" class='bx bxs-category bx-tada' ></i>
          <span>Danh mục sản phẩm</span>
        </a>
      </li>
     {{--  <hr class="sidebar-divider"> --}}
      <li class="nav-item {{request()->is('*dashboard*') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{ URL::to('/dashboard') }}">
         <i style="font-size:20px" class='bx bxs-bar-chart-alt-2 bx-tada' ></i>
          <span>Thống kê</span>
        </a>
      </li>
     {{--  <hr class="sidebar-divider"> --}}
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{request()->is('*list-brand*') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{URL::to('/list-brand')}}">
          <i style="font-size:20px" class='bx bxs-copyright bx-tada' ></i>
          <span>Hãng sản phẩm</span>
        </a>
       
      </li>
     {{--  <hr class="sidebar-divider"> --}}
      <li class="nav-item {{request()->is('*list-product*') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{URL::to('/list-product')}}">
          <i style="font-size:20px" class='bx bxs-florist bx-tada' ></i>
          <span>Sản phẩm</span>
        </a>
        
      </li>
     {{--  <hr class="sidebar-divider"> --}}
      <li class="nav-item {{request()->is('*listorder*') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{URL::to('/listorder')}}">
          <i style="font-size:20px;" class='bx bxs-notepad bx-tada' ></i>
          <span>Đơn Hàng</span>
        </a>
       
      </li>
     {{--  <hr class="sidebar-divider"> --}}
      <li class="nav-item {{request()->is('*listcoupon*') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{URL::to('/listcoupon')}}">
          <i style="font-size:20px" class='bx bxs-gift bx-tada' ></i>
          <span>Mã giảm giá</span>
        </a>
        
      </li>
     {{--  <hr class="sidebar-divider"> --}}
      <li class="nav-item {{request()->is('*delivery*') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{URL::to('/delivery')}}">
          <i style="font-size:20px" class='bx bxs-package bx-tada' ></i>
          <span>Vận chuyển</span>
        </a>

      </li>
     {{--  <hr class="sidebar-divider"> --}}
      <!-- Heading -->
     {{--  <div class="sidebar-heading">
        Interface
      </div> --}}

      <li class="nav-item {{request()->is('*articlecategory*') ? 'active' : ''}}">
        <a class="nav-link" href="{{ URL::to('/articlecategory') }}">
         <i style="font-size:20px;" class='bx bx-detail bx-tada' ></i>
          <span>Danh mục bài viết</span></a>
      </li>
     {{--  <hr class="sidebar-divider"> --}}
      <li class="nav-item {{request()->is('*listarticle*') ? 'active' : ''}}">
        <a class="nav-link" href="{{ URL::to('/listarticle') }}">
          <i style="font-size:20px;" class='bx bxs-news bx-tada' ></i>
          <span>Bài viết</span></a>
      </li>
     {{--  <hr class="sidebar-divider"> --}}
      <li class="nav-item {{request()->is('*listuser*') ? 'active' : ''}}">
        <a class="nav-link" href="{{ URL::to('/listuser') }}">
         <i style="font-size:20px;" class='bx bxs-group bx-tada' ></i>
          <span>Khách hàng</span></a>
      </li>
     {{--  <hr class="sidebar-divider"> --}}
       <li class="nav-item {{request()->is('*listroleofuser*') ? 'active' : ''}}">
        <a class="nav-link" href="{{ URL::to('/listroleofuser') }}">
          <i style="font-size:20px;" class='bx bxs-check-shield bx-tada' ></i>
          <span>Quản lý phân quyền</span></a>
      </li>
     {{--  <hr class="sidebar-divider"> --}}
       <li class="nav-item {{request()->is('*listrole*') ? 'active' : ''}}">
        <a class="nav-link" href="{{ URL::to('/listrole') }}">
        <i style="font-size:20px;" class='bx bxs-spreadsheet bx-tada' ></i>
          <span>Vai trò</span></a>
      </li>
     {{--  <hr class="sidebar-divider"> --}}



      

      <li class="nav-item {{request()->is('*listbanner*') ? 'active' : ''}}">
        <a class="nav-link" href="{{ URL::to('/listbanner') }}">
          <i style="font-size:20px" class='bx bx-carousel bx-tada'></i>
          <span>Banner</span></a>
      </li>
     {{--  <hr class="sidebar-divider"> --}}
       <li class="nav-item {{request()->is('*listrating*') ? 'active' : ''}}">
        <a class="nav-link" href="{{ URL::to('/listrating') }}">
          <i style="font-size:20px" class='bx bxs-star-half bx-tada' ></i>
          <span>Đánh giá</span></a>
      </li>
     {{--  <hr class="sidebar-divider"> --}}
       <li class="nav-item {{request()->is('*contactinfo*') ? 'active' : ''}}">
        <a class="nav-link" href="{{ URL::to('/contactinfo') }}">
          <i style="font-size:20px;" class='bx bxs-info-square bx-tada' ></i>
          <span>Thông tin</span></a>
      </li>

     {{--  <hr class="sidebar-divider"> --}}
       <li class="nav-item">
         <a class="nav-link">
         <i style="font-size:20px" class='bx bxs-moon bx-tada' ></i>
         Chế độ tối
          <label class="switch">
            <input type="checkbox" id='switch-theme' >
            <span class="slider round"></span>
          </label>
          </a>
       </li>
      
      

      <!-- Divider -->
     {{--  <hr class="sidebar-divider"> --}}

      {{-- <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li> --}}

      <!-- Divider -->
      {{-- <hr class="sidebar-divider d-none d-md-block"> --}}

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow navBar">

          <!-- Sidebar Toggle (Topbar) -->
          <form class="form-inline">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>
          </form>

          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>


            

          {{-- <button class="btn btn-primary" id="darkmode">enable dark mode</button> --}}

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                @if($notify->count())
                <span class="badge badge-danger badge-counter">{{ $notify->count() }}</span>
                @endif
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 style="font-size: 10px;border-radius: 3.5px;" class="dropdown-header">
                  Thông báo
                </h6>
                <p></p>
                <div>
                    <a href="{{ url('/dadoc') }}" style="color: green;"><h5 style="text-align: center;">Đánh dấu là đã đọc</h5></a>
                  </div>
                @foreach($notify as $notification)
                <a style="background-color: lightgray;border-radius: 3.5px;" class="dropdown-item d-flex align-items-center" href="{{ $notification->link }}">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-clipboard-list text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">{{ $notification->created_at }}</div>
                    {{ $notification->notify_content }}
                  </div>
                </a>
                @endforeach

               
                <a style="border-radius: 3.5px;" class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php
                $name = Session::get('staff_name');
                if($name){
                  echo $name;
                }
                ?></span>
                <img class="img-profile rounded-circle" src="public/upload/avatar/{{ Session::get('staff_avatar') }}">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ URL::to('/myprofile') }}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Đăng xuất
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          @yield('maincontent')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white footerBar">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i style="padding-bottom: : 5px;" class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>



  <!-- Bootstrap core JavaScript-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="{{asset('public/backend/sbadmin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('public/backend/sbadmin/js/ToastMsg.js')}}"></script>
  <script src="{{asset('public/backend/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


  <!-- Core plugin JavaScript-->
  <script src="{{asset('public/backend/sbadmin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('public/backend/sbadmin/js/sb-admin-2.min.js')}}"></script>
  

  <!-- Page level plugins -->
  <script type="text/javascript" src="https://cdn.datatables.net/autofill/2.3.7/js/dataTables.autoFill.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/autofill/2.3.7/js/autoFill.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script src="{{asset('public/backend/sbadmin/js/sweetalert.js')}}"></script>
   <script src="{{asset('public/backend/sbadmin/js/darkmode.js')}}"></script>
  <script src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script>
  <!-- JavaScript -->
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

        
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <!-- CSS -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <!-- Default theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
        <!-- Semantic UI theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
        <!-- Bootstrap theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
      {{--   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.17/sweetalert2.min.js" integrity="sha512-PECs0FDgx6coAK87ta7MM+8nQfT8jl21gfsXBegEWFqQzCyNtAilGNyyWM0Y8FXNpycZQU3A4QM6ZN0r3KXs5g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/fileinput.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/themes/fas/theme.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

        <script type="text/javascript">
            $(() => {
                setTimeout(() =>{
                    $('.loader').fadeOut(500);
                },1000);
            });

            
    $('.modal').on('hide.bs.modal,hidden.bs.modal', function () {
 setTimeout(function(){
  $('body').css('padding-right',0);
 },0);
});
        </script>
  @yield('scripts')

  <script type="text/javascript">
     
  </script>

</body>

</html>
