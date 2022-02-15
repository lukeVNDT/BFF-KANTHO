
<figure class="highcharts-figure">
    <div id="container" data-filter = "{{ $filter }}"  data-list-day="{{ $list_day }}" data-money="{{ $arrrevenuemonth }}" data-money-df="{{ $arrrevenuemonthdf }}"></div>
    <p class="highcharts-description">
        
    </p>
</figure>

@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		// function render(res){
		// 	 $('#container').empty();
  //           $('#container').html(res);
		// }
		let listday = $('#container').attr('data-list-day');
           let fiter = $('#container').attr('data-filter');
  let money = $('#container').attr('data-money');
  let moneydf = $('#container').attr('data-money-df');

  moneydf = JSON.parse(moneydf);
  money = JSON.parse(money);
  listday = JSON.parse(listday);
  fiter = JSON.parse(fiter);
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
        categories: fiter
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
	});
</script>
@endsection