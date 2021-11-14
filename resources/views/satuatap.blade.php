<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Opac Man IC | @yield('title')</title>
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
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="{{ route('satuatap') }}" class="navbar-brand"><b>MAN IC</b>&nbsp;Benteng</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
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

      <!-- Main content -->
      <section class="content">
        <div class="callout callout-info">
            <h4>Selamat Datang</h4>
        
            <p>
              Aplikasi Satu Atap Madrasah Aliyah Insan Cendikia <b>(MAN IC)</b> Bengkulu Tengah, Kota Bengkulu 
            </p>
          </div>
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title" style="display: inline">
                  <marquee behavior="" direction="">
                      <b>Aplikasi Satu Atap Madrasah Insan Cendikia (MAN IC)</b>
                  </marquee>
              </h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="{{ asset('assets/images/manic.jpg') }}" style="width: 100%" alt="">
                            </div>
                            <a href="">
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <div class="info-box bg-aqua">
                                      <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>
                          
                                      <div class="info-box-content">
                                        <span class="info-box-text"></span><br>
                                        <span class="info-box-number">Layanan Inventaris Perpustakaan</span>
                                            <span style="font-style: italic" class="progress-description">
                                              Aplikasi Pencatatan Inventaris Perpustakaan
                                            </span>
                                      </div>
                                      <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                            </a>
            
                            <a href="http://10.42.0.1/opac/public" target="_blank">
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <div class="info-box bg-red">
                                      <span class="info-box-icon"><i class="fa fa-book"></i></span>
                          
                                      <div class="info-box-content">
                                        <span class="info-box-text"></span><br>
                                        <span class="info-box-number">Opac</span>
                                            <span style="font-style: italic" class="progress-description">
                                              Online Public Access Catalog
                                            </span>
                                      </div>
                                      <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                            </a>
            
                            <a href="">
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <div class="info-box bg-green">
                                      <span class="info-box-icon"><i class="fa fa-money"></i></span>
                          
                                      <div class="info-box-content">
                                        <span class="info-box-text"></span><br>
                                        <span class="info-box-number">Sirlulasi</span>
                                            <span style="font-style: italic" class="progress-description">
                                              Layanan Sirkulasi Simpan Pinjam Koleksi
                                            </span>
                                      </div>
                                      <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                            </a>

                            <a href="">
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <div class="info-box bg-blue">
                                      <span class="info-box-icon"><i class="fa fa-money"></i></span>
                          
                                      <div class="info-box-content">
                                        <span class="info-box-text"></span><br>
                                        <span class="info-box-number">Absensi</span>
                                            <span style="font-style: italic" class="progress-description">
                                              Pencatatan Kunjungan / Absensi Siswa
                                            </span>
                                      </div>
                                      <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <a href="">
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <div class="info-box bg-yellow">
                                      <span class="info-box-icon"><i class="fa fa-users"></i></span>
                          
                                      <div class="info-box-content">
                                        <span class="info-box-text"></span><br>
                                        <span class="info-box-number">Simpeg</span>
                                            <span style="font-style: italic" class="progress-description">
                                              Layanan Data Kepegawaian 
                                            </span>
                                      </div>
                                      <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                            </a>

                            <a href="">
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <div class="info-box bg-blue">
                                      <span class="info-box-icon"><i class="fa fa-envelope"></i></span>
                          
                                      <div class="info-box-content">
                                        <span class="info-box-text"></span><br>
                                        <span class="info-box-number">Simas</span>
                                            <span style="font-style: italic" class="progress-description">
                                              Layanan Data Surat Menyurat
                                            </span>
                                      </div>
                                      <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                            </a>

                            <a href="">
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <div class="info-box bg-green">
                                      <span class="info-box-icon"><i class="fa fa-money"></i></span>
                          
                                      <div class="info-box-content">
                                        <span class="info-box-text"></span><br>
                                        <span class="info-box-number">Disposisi Surat</span>
                                            <span style="font-style: italic" class="progress-description">
                                              Layanan Disposisi Surat Masuk dan Surat Keluar
                                            </span>
                                      </div>
                                      <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                            </a>

                            <a href="">
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <div class="info-box bg-yellow">
                                      <span class="info-box-icon"><i class="fa fa-money"></i></span>
                          
                                      <div class="info-box-content">
                                        <span class="info-box-text"></span><br>
                                        <span class="info-box-number">Siakad</span>
                                            <span style="font-style: italic" class="progress-description">
                                              Layanan Sistem Informas Akademik
                                            </span>
                                      </div>
                                      <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                            </a>

                            <a href="">
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <div class="info-box bg-blue">
                                      <span class="info-box-icon"><i class="fa fa-money"></i></span>
                          
                                      <div class="info-box-content">
                                        <span class="info-box-text"></span><br>
                                        <span class="info-box-number">Monitoring Siswa</span>
                                            <span style="font-style: italic" class="progress-description">
                                              Layanan Penelusuran Nilai dan Kehadiran Siswa
                                            </span>
                                      </div>
                                      <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                            </a>

                            <a href="">
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <div class="info-box bg-green">
                                      <span class="info-box-icon"><i class="fa fa-money"></i></span>
                          
                                      <div class="info-box-content">
                                        <span class="info-box-text"></span><br>
                                        <span class="info-box-number">Absensi</span>
                                            <span style="font-style: italic" class="progress-description">
                                              Layanan Absensi Siswa
                                            </span>
                                      </div>
                                      <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                            </a>

                            <a href="">
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <div class="info-box bg-aqua">
                                      <span class="info-box-icon"><i class="fa fa-money"></i></span>
                          
                                      <div class="info-box-content">
                                        <span class="info-box-text"></span><br>
                                        <span class="info-box-number">Asrama</span>
                                            <span style="font-style: italic" class="progress-description">
                                                Layanan Asrama Siswa
                                            </span>
                                      </div>
                                      <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                            </a>
                        </div>
                    </div>
                  </div>
            </div>
            <!-- /.box-body -->
          </div>
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
</body>
</html>
