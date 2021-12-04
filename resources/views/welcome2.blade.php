@extends('layouts.layout2')
@push('styles')
<style>
    #chartdiv, #chartdiv2, #chartdiv3, #chartdiv4 {
      width: 100%;
      height: 350px;
    }
    </style>
@endpush
@section('title')
    Dashboard
@endsection
@section('content')
<div class="callout callout-info">
    <h4>Selamat Datang</h4>

    <p>
      <b>Online Public Access Catalog (OPAC)</b> adalah aplikasi perkembangan dari ilmu perpustakaan
      dengan menerapkan pencarian koleksi buku sederhana hanya dengan satu kriteria pencarian saja 
    </p>
  </div>
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Informasi Aplikasi</h3>
    </div>
    <div class="box-body">
      <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Messages</span>
                <span class="info-box-number">1,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Bookmarks</span>
                <span class="info-box-number">410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Uploads</span>
                <span class="info-box-number">13,648</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">93,139</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
  
    </div>
    <!-- /.box-body -->
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
    <script src="{{ asset('assets/offline/core.js') }}"></script>
    <script src="{{ asset('assets/offline/chart.js') }}"></script>
    <script src="{{ asset('assets/offline/animated.js') }}"></script>

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
  <script src="{{ asset('assets/offline/cdn/core.js') }}"></script>
  <script src="{{ asset('assets/offline/cdn/charts.js') }}"></script>
  <script src="{{ asset('assets/offline/cdn/animated.js') }}"></script>

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