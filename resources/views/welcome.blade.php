@extends('layouts.layout')
@push('styles')
<style>
    #chartdiv, #chartdiv2, #chartdiv3, #chartdiv4 {
      width: 100%;
      height: 350px;
    }
    </style>
@endpush
@section('content')
<div class="container-fluid page-body-wrapper">
    <div class="main-panel container">
      <div class="content-wrapper">
        <section class="panel" style="margin-bottom:20px;">
          <header class="panel-heading" style="color: #ffffff;background-color: #388a08;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
              <i class="fa fa-home"></i>&nbsp;Dashboard
              <span class="tools pull-right" style="margin-top:-5px;">
                  <a class="fa fa-chevron-down" href="javascript:;" style="float: left;margin-left: 3px;padding: 10px;text-decoration: none;"></a>
                  <a class="fa fa-times" href="javascript:;" style="float: left;margin-left: 3px;padding: 10px;text-decoration: none;"></a>
              </span>
          </header>
          <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
              <div class="row" style="margin-right:-15px; margin-left:-15px;">
                  <div class="col-md-12">Selamat datang di Online Public Access Catalog</b> <br>
                    Madrasah Aliyah Negeri Insan Cendikia (MAN IC) Bengkulu Tengah, Provinsi Bengkulu <br>
                    <a href="" class="btn btn-primary btn-sm mt-2"><i class="fa fa-search"></i>&nbsp; Cari Buku Sekarang</a>
                  </div>
              </div>
          </div>
      </section>

        <div class="row">
          <div class="col-md-12">
              <section class="panel">
                  <header class="panel-heading" style="color: #ffffff;background-color: #388a08;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
                      <i class="fa fa-bar-chart"></i>&nbsp;Statistik Data Aplikasi
                  </header>
                  <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
                      <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                          <div class="card card-statistics">
                            <div class="card-body pb-0">
                              <p class="text-muted">Semua Buku</p>
                              <div class="d-flex align-items-center">
                                <h4 class="font-weight-semibold"></h4>
                                <h6 class="text-success font-weight-semibold ml-2">{{ $semuaBuku }}</h6>
                              </div>
                              <small class="text-muted">Buku Yang Tersedia Saat Ini</small>
                            </div>
                            <canvas class="mt-2" height="40" id="statistics-graph-1"></canvas>
                          </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                          <div class="card card-statistics">
                            <div class="card-body pb-0">
                              <p class="text-muted">Buku Ekonomi Islam</p>
                              <div class="d-flex align-items-center">
                                <h4 class="font-weight-semibold"></h4>
                                <h6 class="text-danger font-weight-semibold ml-2">(%)</h6>
                              </div>
                              <small class="text-muted">Total dan Persentase</small>
                            </div>
                            <canvas class="mt-2" height="40" id="statistics-graph-3"></canvas>
                          </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                          <div class="card card-statistics">
                            <div class="card-body pb-0">
                              <p class="text-muted">Buku Pendidikan Islam</p>
                              <div class="d-flex align-items-center">
                                <h4 class="font-weight-semibold"></h4>
                                <h6 class="text-success font-weight-semibold ml-2">(%)</h6>
                              </div>
                              <small class="text-muted">Total dan Persentase</small>
                            </div>
                            <canvas class="mt-2" height="40" id="statistics-graph-2"></canvas>
                          </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                          <div class="card card-statistics">
                            <div class="card-body pb-0">
                              <p class="text-muted">Buku Gelar Islam</p>
                              <div class="d-flex align-items-center">
                                <h4 class="font-weight-semibold"></h4>
                                <h6 class="text-success font-weight-semibold ml-2">(%)</h6>
                              </div>
                              <small class="text-muted">Total dan Persentase</small>
                            </div>
                            <canvas class="mt-2" height="40" id="statistics-graph-4"></canvas>
                          </div>
                        </div>
                      </div>
                  </div>
              </section>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <section class="panel">
                <header class="panel-heading" style="color: #ffffff;background-color: #388a08;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
                    <i class="fa fa-bar-chart"></i>&nbsp;Statistik Buku Per Tahun Terbit (Grafik Lingkaran)
                </header>
                <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
                    <div class="row">
                        <div class="col-md-12">
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
                    </div>
                </div>
            </section>
          </div>

          <div class="col-md-6">
            <section class="panel">
                <header class="panel-heading" style="color: #ffffff;background-color: #388a08;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
                    <i class="fa fa-bar-chart"></i>&nbsp;Statistik Buku Per Tahun Terbit (Grafik Batang)
                </header>
                <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
                    <div class="row">
                        <div class="col-md-12">
                            @section('charts2')
                            chart.data = [
                                @foreach ($subyek as $data)
                                {
                                    "country": "{{ $data->TAHUN }}",
                                    "visits": {{ $data->jumlah }}
                                },
                                @endforeach
                            ];
                        @endsection
                        <div id="chartdiv2"></div>
                        </div>
                    </div>
                </div>
            </section>
          </div>
        </div>
        
        <br>
        <div class="row">
          <div class="col-md-6">
            <section class="panel">
                <header class="panel-heading" style="color: #ffffff;background-color: #388a08;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
                    <i class="fa fa-bar-chart"></i>&nbsp;Statistik Absensi Pengunjung Per Tahun
                </header>
                <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
                    <div class="row">
                        <div class="col-md-12">
                            @section('charts3')
                                chart.data = [
                                    @foreach ($perTahun as $data)
                                        {
                                             "country": "{{ $data['tahun'] }}",
                                            "litres": {{ $data['jumlah'] }}
                                        },
                                    @endforeach
                                ];
                            @endsection
                            <div id="chartdiv3"></div>
                        </div>
                    </div>
                </div>
            </section>
          </div>

          <div class="col-md-6">
            <section class="panel">
                <header class="panel-heading" style="color: #ffffff;background-color: #388a08;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
                    <i class="fa fa-bar-chart"></i>&nbsp;Statistik Absensi Pengunjung Per Jenis Kelamin
                </header>
                <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
                    <div class="row">
                        <div class="col-md-12">
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
                    </div>
                </div>
            </section>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      <footer class="footer">
        <div class="container clearfix">
          <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2021 <a href=""
              target="_blank">Madrash Islam Negeri Insan Cendikia</a></span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a>Bengkulu Tengah, Provinsi Bengkulu </a>
          </span>
        </div>
      </footer>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
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