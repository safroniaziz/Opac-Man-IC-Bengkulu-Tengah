@extends('layouts.backend')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-dashboard"></i>&nbsp;DASHBOARD
@endsection
@section('user-login','Operator')
@section('sidebar-menu')
    @include('operator/sidebar')
@endsection
@push('styles')
    <style>
        #chartdiv, #chartdiv2, #chartdiv3, #chartdiv4 {
            width: 90%;
            height: 500px;
        }
    </style>
@endpush
@section('content')
    <div class="callout callout-info ">
        <h4>SELAMAT DATANG!</h4>
        <p>
            <b>Online Public Access Catalog (OPAC)</b> adalah aplikasi perkembangan dari ilmu perpustakaan
      dengan menerapkan pencarian koleksi buku sederhana hanya dengan satu kriteria pencarian saja 
            <br>
            <b><i>Catatan:</i></b> Untuk keamanan, jangan lupa keluar setelah menggunakan aplikasi
        </p>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                <h3 class="box-title">
                    <i class="fa fa-pie-chart"></i>&nbsp;Statistik Buku Per Tahun Terbit (Grafik Lingkaran)
                </h3>
                </div>
                <div class="box-body">
                    @section('charts')
                        chart.data = [
                            @foreach ($subyek as $data)
                                {
                                        "country": "{{ $data['TAHUN'] }}",
                                    "litres": {{ $data['jumlah'] }}
                                },
                            @endforeach
                        ];
                    @endsection
                    <div id="chartdiv"></div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                <h3 class="box-title">
                    <i class="fa fa-bar-chart"></i>&nbsp;Statistik Buku Per Tahun Terbit (Grafik Batang)
                </h3>
                </div>
                <div class="box-body">
                    @section('charts2')
                        chart.data = [
                            @foreach ($subyek as $data)
                                {
                                        "country": "{{ $data['TAHUN'] }}",
                                    "visits": {{ $data['jumlah'] }}
                                },
                            @endforeach
                        ];
                    @endsection
                    <div id="chartdiv2"></div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                <h3 class="box-title">
                    <i class="fa fa-pie-chart"></i>&nbsp;Statistik Absensi Pengunjung Per Tahun
                </h3>
                </div>
                <div class="box-body">
                    @section('charts3')
                        chart.data = [
                            @foreach ($perTahun as $data)
                                {
                                        "country": "{{ $data['TAHUN'] }}",
                                    "litres": {{ $data['jumlah'] }}
                                },
                            @endforeach
                        ];
                    @endsection
                    <div id="chartdiv3"></div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                <h3 class="box-title">
                    <i class="fa fa-bar-chart"></i>&nbsp;Statistik Absensi Pengunjung Per Jenis Kelamin
                </h3>
                </div>
                <div class="box-body">
                    @section('charts4')
                    chart.data = [
                        @foreach ($perJenisKelamin as $data)
                        {
                            "country": "{{ $data->JENKEL }}",
                            "visits": {{ $data->jumlah }}
                        },
                        @endforeach
                    ];
                    @endsection
                    <div id="chartdiv4"></div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Resources -->
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

    <!-- Chart code -->
    <script>
        am4core.ready(function() {

        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        // Create chart instance
        var chart = am4core.create("chartdiv", am4charts.PieChart);

        // Add data
        @yield('charts')

        // Add and configure Series
        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "litres";
        pieSeries.dataFields.category = "country";
        pieSeries.slices.template.stroke = am4core.color("#fff");
        pieSeries.slices.template.strokeWidth = 2;
        pieSeries.slices.template.strokeOpacity = 1;

        // This creates initial animation
        pieSeries.hiddenState.properties.opacity = 1;
        pieSeries.hiddenState.properties.endAngle = -90;
        pieSeries.hiddenState.properties.startAngle = -90;

        }); // end am4core.ready()
    </script>




  <!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv2", am4charts.XYChart);

// Add data
@yield('charts2')

// Create axes

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "country";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.minGridDistance = 30;

categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
  if (target.dataItem && target.dataItem.index & 2 == 2) {
    return dy + 25;
  }
  return dy;
});

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.valueY = "visits";
series.dataFields.categoryX = "country";
series.name = "Visits";
series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
series.columns.template.fillOpacity = .8;

var columnTemplate = series.columns.template;
columnTemplate.strokeWidth = 2;
columnTemplate.strokeOpacity = 1;

}); // end am4core.ready()
</script>

<script>
  am4core.ready(function() {

  // Themes begin
  am4core.useTheme(am4themes_animated);
  // Themes end

  // Create chart instance
  var chart = am4core.create("chartdiv3", am4charts.PieChart);

  // Add data
  @yield('charts3')

  // Add and configure Series
  var pieSeries = chart.series.push(new am4charts.PieSeries());
  pieSeries.dataFields.value = "litres";
  pieSeries.dataFields.category = "country";
  pieSeries.slices.template.stroke = am4core.color("#fff");
  pieSeries.slices.template.strokeWidth = 2;
  pieSeries.slices.template.strokeOpacity = 1;

  // This creates initial animation
  pieSeries.hiddenState.properties.opacity = 1;
  pieSeries.hiddenState.properties.endAngle = -90;
  pieSeries.hiddenState.properties.startAngle = -90;

  }); // end am4core.ready()
</script>

<script>
  am4core.ready(function() {
  
  // Themes begin
  am4core.useTheme(am4themes_animated);
  // Themes end
  
  // Create chart instance
  var chart = am4core.create("chartdiv4", am4charts.XYChart);
  
  // Add data
  @yield('charts4')
  
  // Create axes
  
  var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
  categoryAxis.dataFields.category = "country";
  categoryAxis.renderer.grid.template.location = 0;
  categoryAxis.renderer.minGridDistance = 30;
  
  categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
    if (target.dataItem && target.dataItem.index & 2 == 2) {
      return dy + 25;
    }
    return dy;
  });
  
  var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
  
  // Create series
  var series = chart.series.push(new am4charts.ColumnSeries());
  series.dataFields.valueY = "visits";
  series.dataFields.categoryX = "country";
  series.name = "Visits";
  series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
  series.columns.template.fillOpacity = .8;
  
  var columnTemplate = series.columns.template;
  columnTemplate.strokeWidth = 2;
  columnTemplate.strokeOpacity = 1;
  
  }); // end am4core.ready()
  </script>
@endpush