<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Opac Man IC | @yield('title')</title>
  <link rel="shortcut icon" href="{{ asset('assets/images/manic.png') }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('assets/lte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/lte/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('assets/lte/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/lte/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('assets/lte/dist/css/skins/_all-skins.min.css') }}">
  <style>
    .preloader {    position: fixed;    top: 0;    left: 0;    right: 0;    bottom: 0;    background-color: #ffffff;    z-index: 99999;    height: 100%;    width: 100%;    overflow: hidden !important;}.do-loader{    width: 200px;    height: 200px;    position: absolute;    left: 50%;    top: 50%;    margin: 0 auto;    -webkit-border-radius: 100%;       -moz-border-radius: 100%;         -o-border-radius: 100%;            border-radius: 100%;    background-image: url({{ asset('assets/images/logo_2.png') }});    background-size: 80% !important;    background-repeat: no-repeat;    background-position: center;    -webkit-background-size: cover;            background-size: cover;    -webkit-transform: translate(-50%,-50%);       -moz-transform: translate(-50%,-50%);        -ms-transform: translate(-50%,-50%);         -o-transform: translate(-50%,-50%);            transform: translate(-50%,-50%);}.do-loader:before {    content: "";    display: block;    position: absolute;    left: -6px;    top: -6px;    height: calc(100% + 12px);    width: calc(100% + 12px);    border-top: 1px solid #07A8D8;    border-left: 1px solid transparent;    border-bottom: 1px solid transparent;    border-right: 1px solid transparent;    border-radius: 100%;    -webkit-animation: spinning 0.750s infinite linear;       -moz-animation: spinning 0.750s infinite linear;         -o-animation: spinning 0.750s infinite linear;            animation: spinning 0.750s infinite linear;}@-webkit-keyframes spinning {   from {-webkit-transform: rotate(0deg);}   to {-webkit-transform: rotate(359deg);}}@-moz-keyframes spinning {   from {-moz-transform: rotate(0deg);}   to {-moz-transform: rotate(359deg);}}@-o-keyframes spinning {   from {-o-transform: rotate(0deg);}   to {-o-transform: rotate(359deg);}}@keyframes spinning {   from {transform: rotate(0deg);}   to {transform: rotate(359deg);}}
  </style>
  @stack('styles')

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="{{ asset('assets/offline/fonts.css') }}">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
  <div class="preloader">
    <div class="do-loader"></div>
</div>
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="{{ route('welcome2') }}" class="navbar-brand"><b>MAN IC</b>&nbsp;Benteng</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="@if (Route::current()->getName() == "welcome2") active @endif"><a href="{{ route('welcome2') }}"><i class="fa fa-home"></i>&nbsp;Dashboard <span class="sr-only">(current)</span></a></li>
            <li class="@if (Route::current()->getName() == "cari_koleksi2") active @endif"><a href="{{ route('cari_koleksi2') }}"><i class="fa fa-search"></i>&nbsp;Cari Buku</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
                <!-- The user image in the navbar-->
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <a href="{{ route('login') }}"><i class="fa fa-sign-in"></i>&nbsp;Login</a>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
          <small>Online Public Access Catalog</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="callout callout-info">
          <table border="0" style="width: 75%; margin: 0 auto;">
              {{-- <tr>
                  <td rowspan="4" style="width: 10%">
                      <img src="{{ asset('assets/images/manic.png') }}" style="width: 120px" alt="">
                  </td>
                  <td colspan="3">
                      <h3 style="text-align: center; font-weight:bold">
                          PERPUSTAKAAN MAN INSAN CENDIKIA BENGKULU TENGAH
                      </h3>
                  </td>
              </tr> --}}

              <div class="row">
                <div class="col-md-10" style="">
                  <div class="col-md-2" style="text-align:center">
                    <img src="{{ asset('assets/images/manic.png') }}" style="width: 120px" alt="">
                  </div>
                  <div class="col-md-10" style="text-align: center">
                    <h3 style="text-align: center; font-weight:bold">
                        PERPUSTAKAAN MAN INSAN CENDIKIA BENGKULU TENGAH
                        <br>
                        OPAC
                        <br>
                        <h4 style="font-style: italic; text-align:center">
                          Online Public Access Catalog
                        </h4>
                    </h3>
                  </div>
                </div>
              </div>
              {{-- <tr>
                  <td colspan="4">
                      <h4 style="text-align: center; font-weight:bold; font-size:25px;">
                          OPAC
                      </h4>
                  </td>
              </tr>
              <tr>
                  <td colspan="4">
                      <h4 style="font-style: italic; text-align:center">
                        Online Public Access Catalog
                      </h4>
                  </td>
              </tr> --}}
          </table>
        </div>
        @yield('content')
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Versi</b> 1.0
      </div>
      <strong>Copyright &copy; 2021 <a>MAN Insan Cendikia</a>.</strong> Bengkulu Tengah
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('assets/lte/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('assets/lte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('assets/lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('assets/lte/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/lte/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/lte/dist/js/demo.js') }}"></script>
<script>
  // jQuery(window).load(function() {
  //       // will first fade out the loading animation
  //       jQuery(".status").fadeOut();
  //       // will fade out the whole DIV that covers the website.
  //       jQuery(".preloader").delay(0).fadeOut("slow");

  //     });

      $(window).on('load', function(){
        // will first fade out the loading animation
        jQuery(".status").fadeOut();
        // will fade out the whole DIV that covers the website.
        jQuery(".preloader").delay(0).fadeOut("slow");

      });

</script>
@stack('scripts')
</body>
</html>
