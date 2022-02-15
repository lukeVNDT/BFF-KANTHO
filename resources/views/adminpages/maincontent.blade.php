@extends('pages.admin')
@section('maincontent')
<div class="modal" id="updatebrand" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tổng quan doanh thu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
  <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2 revenueDay" style="border-radius: 15px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size: 10px;">
                                                Tổng doanh thu ngày:</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 10px;">{{ number_format($moneyperday).' '.'VNĐ' }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class='bx bx-coin' style="font-size:25px;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2 revenueMonth" style="border-radius: 15px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size: 10px;">
                                                Tổng doanh thu tháng:</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 10px;">{{ number_format($moneypermonth).' '.'VNĐ' }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class='bx bxs-coin' style="font-size:25px;" ></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2 revenueYear" style="border-radius: 15px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size: 10px;">
                                                Tổng doanh thu năm:</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 10px;">{{ number_format($moneyperyear).' '.'VNĐ' }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class='bx bx-coin-stack' style="font-size:25px"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                      </div>
  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-window-close"></i> Đóng</button>
  </div>
</div>
</div>
</div>
</div>
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2 totalOrder"
                            style="background: linear-gradient(to right, #da22ff, #9733ee);border-radius: 15px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 10px;">
                                                Tổng số đơn hàng:</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 20px;">{{ $total_order }}</div><a
                                            class="text-xs font-weight-bold text-white text-uppercase mb-1"
                                             href="{{ URL::to('/listorder') }}" style="font-size: 15px">Chi tiết</a>
                                        </div>
                                        <div class="col-auto">
                                            <i style="font-size:40px;" class='bx bxs-notepad' ></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2 totalProduct"
                            style="background: linear-gradient(to left, #e65c00, #f9d423);border-radius: 15px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 10px;">
                                                Tổng sản phẩm:</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 20px;">{{ $total_product }}</div>
                                            <a 
                                            class="text-xs font-weight-bold text-white text-uppercase mb-1"
                                            style="font-size:15px" 
                                            href="{{ URL::to('/list-product') }}">Chi tiết</a>
                                        </div>
                                        <div class="col-auto">
                                            <i style="font-size:40px;" class='bx bxs-florist'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2 totalCustomer"
                            style="background: linear-gradient(to right, #ff9966, #ff5e62);border-radius: 15px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 10px;">
                                                Số lượng khách hàng:</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 20px;">{{ $total_user }}</div>
                                            <a
                                            class="text-xs font-weight-bold text-white text-uppercase mb-1" 
                                            style="font-size: 15px;"
                                             href="{{ URL::to('/listuser') }}">Chi tiết</a>
                                        </div>
                                        <div class="col-auto">
                                            <i class='bx bxs-group' style="font-size:40px;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2 totalArticle"
                            style=" background: linear-gradient(to right, #4cb8c4, #3cd3ad);border-radius: 15px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1" style="font-size: 10px;">
                                                Số lượng bài viết:</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 20px;">{{ $total_article }}</div>
                                            <a 
                                            class="text-xs font-weight-bold text-white text-uppercase mb-1"
                                            style="font-size: 15px;"
                                            href="{{ URL::to('/listarticle') }}">Chi tiết</a>
                                        </div>
                                        <div class="col-auto">
                                            <i style="font-size:40px;" class='bx bx-news'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
<div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4" style="border-radius: 15px;">
                                
                                <!-- Card Body -->
                                <div class="card-body">
                                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#updatebrand"><i class="fas fa-eye"></i> Doanh thu
</button>
<p></p>
{{-- <input type="text" name="" id="datepicker"/> <input type="text" name="" id="datepicker2"/>
<button id="loc" type="button" class="btn btn-success"><i class="fas fa-funnel-dollar"></i></button> --}}
                                    <figure class="highcharts-figure">
    <div id="container"  data-list-day="{{ $list_day }}" data-money="{{ $arrrevenuemonth }}" data-money-df="{{ $arrrevenuemonthdf }}"></div>
    <p class="highcharts-description">
        
    </p>
</figure>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4" style="border-radius: 15px;">
                                
                                <!-- Card Body -->
                                <div class="card-body">
                                    <figure class="highcharts-figure">
  <div id="container2"></div>
  <p class="highcharts-description">
    
  </p>
</figure>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Direct
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Referral
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<div class="col-md-6">
     <div class="card shadow h-100 py-2 favouriteProduct"
                    style="background: linear-gradient(to bottom, #ff416c, #ff4b2b);border-radius: 15px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-sm-1">
                                            
                                            <i style="font-size:45px;" class='bx bxs-happy-heart-eyes bx-tada' ></i>
                                        </div>
                                        <div class="col-sm- 11 mr-1">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1"
                                             style="font-size:20px">
                                                Sản phẩm được yêu thích</div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                                                <div class="card border-left-primary shadow h-100 py-2 mt-4"
                                                style="border-radius: 15px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                      <div class="card-body">
                                        
      {{-- Danh sách sản phẩm --}}
      
  


      <div class="renderTablefavor">
        
      </div>
      
    
    {{-- <footer class="panel-footer"> --}}
      
    {{-- </footer> --}}
                                      </div>
                                        
                                    </div>
                                </div>
                            </div>
</div>
<div class="col-md-6">
     <div class="card shadow h-100 py-2 purchaseProduct"
                    style="background: linear-gradient(to right, #fc00ff, #00dbde);border-radius: 15px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-sm-1">
                                           
                                           <i style="font-size:45px" class='bx bxs-dollar-circle bx-tada' ></i>
                                        </div>
                                        <div class="col-sm- 11 mr-1">
                                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1"
                                             style="font-size:20px">
                                                Lượt mua sản phẩm</div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                                                <div class="card border-left-primary shadow h-100 py-2 mt-4"
                                                style="border-radius: 15px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                      <div class="card-body">
                                        
      {{-- Danh sách sản phẩm --}}
      
  


      <div class="renderTable">
        
      </div>
      
    
    {{-- <footer class="panel-footer"> --}}
      
    {{-- </footer> --}}
                                      </div>
                                        
                                    </div>
                                </div>
                            </div>
</div>
@endsection
@section('scripts')
 <script type="text/javascript">
  $(function(){
    $("#datepicker").datepicker({
      prevText:"Tháng trước",
      nextText:"Tháng sau",
      dateFormat:"yy/mm/dd",
      dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
      duration: "slow"
    });
    $("#datepicker2").datepicker({
      prevText:"Tháng trước",
      nextText:"Tháng sau",
      dateFormat:"yy/mm/dd",
      dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
      duration: "slow"
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){


    getinitialsellproduct();

    getinitialfavoriteproduct();

    function getinitialsellproduct(){
        $.ajax({
            url:"{{url('/sellproductdata')}}",
            success:function(data){
                $(".renderTable").html(data);
            }
        });
    }

    function getinitialfavoriteproduct(){
        $.ajax({
            url:"{{url('/favoriteproductdata')}}",
            success:function(data){
                $(".renderTablefavor").html(data);
            }
        });
    }

    $(document).on("click", ".pagination a", function(e){
      e.preventDefault();
      var page = $(this).attr('href').split('sellproduct=')[1];
      fetchPaginationData(page);
    });

    function fetchPaginationData(page){
      $.ajax({
        url:"{{url('/sellproduct/fetch_data')}}" + "?sellproduct=" + page,
        success:function(data){
            $('.renderTable').html(data);
        }
      });
    }

    $(document).on("click", ".pagination a", function(e){
      e.preventDefault();
      var page = $(this).attr('href').split('favorite=')[1];
      fetchPaginationDataFavorite(page);
    });

    function fetchPaginationDataFavorite(page){
      $.ajax({
        url:"{{url('/favoriteproduct/fetch_data')}}" + "?favorite=" + page,
        success:function(data){
            $('.renderTablefavor').html(data);
        }
      });
    }


    perdayonchart();
    function perdayonchart(){
    let listday = $('#container').attr('data-list-day');
  let money = $('#container').attr('data-money');
  let moneydf = $('#container').attr('data-money-df');

  moneydf = JSON.parse(moneydf);
  money = JSON.parse(money);
  listday = JSON.parse(listday);
  Highcharts.chart('container', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Chi tiết doanh thu các ngày trong tháng'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: listday
    },
    yAxis: {
        title: {
            text: 'Doanh thu'
        },
        labels: {
            formatter: function () {
                var label = this.axis.defaultLabelFormatter.call(this);

                // Use thousands separator for four-digit numbers too
                if (/^[0-9]{4}$/.test(label)) {
                    return Highcharts.numberFormat(this.value, 0);
                }
                return label;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        series:{
          color: '#FF8000',
          
        },
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Hoàn tất',
        marker: {
            symbol: 'diamond'
        },
        data: money

    }
    ]
});
  }
  

    function render(res){
       $('#container').empty();
            $('#container').html(res);
    }

    $(document).on('click','#loc', function(){
      // var _token = $('input[name="_token"]').val();
      var from_day = $('#datepicker').val();
      var to_day = $('#datepicker2').val();

      $.ajax({
        url:"{{url('/thongke')}}",
        method:"POST",
        dataType:"JSON",
        data:{from_day:from_day,to_day:to_day,'_token':'{{ csrf_token() }}'},
        success:function(data){
  //          let listday = $('#container').attr('data-list-day');
  //          let fiter = $('#container').attr('data-filter');
  // let money = $('#container').attr('data-money');
  // let moneydf = $('#container').attr('data-money-df');

  // moneydf = JSON.parse(moneydf);
  // money = JSON.parse(money);
  // listday = JSON.parse(listday);
  // fiter = JSON.parse(fiter);
  
  // var chart = $('#container').highcharts();
  //          chart.series[0].setData(money);
        }
      });
    });
  
  

  });
</script>

{{-- <script type="text/javascript">
  // Create the chart
  let data = "{{ $datamoney }}";
  datachart = JSON.parse(data.replace(/&quot;/g,'"'));

  console.log(datachart);
   let listday = $('#container').attr('data-list-day');
  let money = $('#container').attr('data-money');
  let moneydf = $('#container').attr('data-money-df');

  moneydf = JSON.parse(moneydf);
  money = JSON.parse(money);
  listday = JSON.parse(listday);
Highcharts.chart('container', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Biểu đồ thể hiện doanh thu'
  },
  subtitle: {
    text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
  },
  accessibility: {
    announceNewData: {
      enabled: true
    }
  },
  xAxis: {
    categories: listday
  },
  yAxis: {
    title: {
      text: 'Số tiền'
    }

  },
  legend: {
    enabled: false
  },
  plotOptions: {
    series: {
      borderWidth: 0,
      dataLabels: {
        enabled: true,
        format: '{point.y:.1f} VNĐ'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
  },

  series: [
    {
      name: "Doanh thu",
      colorByPoint: true,
      data: money
    }
  ],
  drilldown: {
    series: [
      {
        name: "Chrome",
        id: "Chrome",
        data: [
          [
            "v65.0",
            0.1
          ],
          [
            "v64.0",
            1.3
          ],
          [
            "v63.0",
            53.02
          ],
          [
            "v62.0",
            1.4
          ],
          [
            "v61.0",
            0.88
          ],
          [
            "v60.0",
            0.56
          ],
          [
            "v59.0",
            0.45
          ],
          [
            "v58.0",
            0.49
          ],
          [
            "v57.0",
            0.32
          ],
          [
            "v56.0",
            0.29
          ],
          [
            "v55.0",
            0.79
          ],
          [
            "v54.0",
            0.18
          ],
          [
            "v51.0",
            0.13
          ],
          [
            "v49.0",
            2.16
          ],
          [
            "v48.0",
            0.13
          ],
          [
            "v47.0",
            0.11
          ],
          [
            "v43.0",
            0.17
          ],
          [
            "v29.0",
            0.26
          ]
        ]
      },
      {
        name: "Firefox",
        id: "Firefox",
        data: [
          [
            "v58.0",
            1.02
          ],
          [
            "v57.0",
            7.36
          ],
          [
            "v56.0",
            0.35
          ],
          [
            "v55.0",
            0.11
          ],
          [
            "v54.0",
            0.1
          ],
          [
            "v52.0",
            0.95
          ],
          [
            "v51.0",
            0.15
          ],
          [
            "v50.0",
            0.1
          ],
          [
            "v48.0",
            0.31
          ],
          [
            "v47.0",
            0.12
          ]
        ]
      }
    ]
  }
});
</script> --}}
<script type="text/javascript">
  let datastatus = "{{ $statusorder }}";
  piechart = JSON.parse(datastatus.replace(/&quot;/g,'"'));
  Highcharts.chart('container2', {

  chart: {
    styledMode: true
  },

  title: {
    text: 'Thống kê trạng thái đơn hàng'
  },

  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },

  series: [{
    type: 'pie',
    allowPointSelect: true,
    keys: ['name', 'y', 'selected', 'sliced'],
    data: piechart,
    showInLegend: true
  }]
});
</script>
<?php
                                $message = Session::get('success');
                                if($message){
                                    echo '<script type="text/javascript">
                                    swal({
                                      title: "Thông báo",
                                      text: "'.$message.'",
                                      icon: "success",
                                      button: "Đồng ý",
                                    });
                             </script>';
                             Session::put('success',null);
                                }
                            ?>
@endsection