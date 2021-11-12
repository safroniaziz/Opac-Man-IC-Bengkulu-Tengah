<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Online Public Access Catalog </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/puse-icons-feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.addons.css') }}">

  <!-- Font Awesome -->
  <link href="{{ asset('assets/vendors/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">

  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets/css/shared/style.css') }}">
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{ asset('assets/css/demo_2/style.css') }}">
  <!-- End Layout styles -->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
  <style>
    @media (max-width: 768px){
    .navbar.horizontal-layout .nav-bottom .page-navigation > .nav-item > .nav-link {
        -webkit-box-pack: start;
        -ms-flex-pack: start;
        justify-content: start;
        background: #8DA03C ;
    }
  }
  </style>
  @stack('styles')
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_horizontal-navbar.html -->
    <nav class="navbar horizontal-layout col-lg-12 col-12 p-0">
      <div class="container d-flex flex-row nav-top" style="padding: 15px 10px !important;">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top">
          <a class="navbar-brand brand-logo" href="index.html">
            <img src="{{ asset('assets/images/logo.jpg') }}" style="height: 60px !important; width:400px !important; max-width:500px !important" alt="logo" /> </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="{{ asset('assets/images/logo2.jpg') }}" style="height: 60px !important" alt="logo" /> </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <ul class="navbar-nav ml-auto">
           
          </ul>
          <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </div>
      <div class="nav-bottom"  style="background: #8DA03C">
        <div class="container">
          <ul class="nav page-navigation" style="background: #8DA03C">
            <li class="nav-item @if (Route::current()->getName() == "welcome") active @endif">
              <a href="{{ route('welcome') }}" class="nav-link">
                <i class="link-icon fa fa-home"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item @if (Route::current()->getName() == "cari_koleksi") active @endif">
              <a href="{{ route('cari_koleksi') }}" class="nav-link">
                <i class="link-icon fa fa-search"></i>
                <span class="menu-title">Cari Buku</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- partial -->
    @yield('content')
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('assets/vendors/js/vendor.bundle.addons.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('assets/js/shared/off-canvas.js') }}"></script>
  <script src="{{ asset('assets/js/shared/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('assets/js/shared/misc.js') }}"></script>
  <script src="{{ asset('assets/js/shared/settings.js') }}"></script>
  <script src="{{ asset('assets/js/shared/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('assets/js/shared/widgets.js') }}"></script>
  <script src="{{ asset('assets/js/demo_2/dashboard.js') }}"></script>
  <script src="{{ asset('assets/js/demo_2/script.js') }}"></script>
  <!-- End custom js for this page-->

  <!-- Custom js for this page-->
  <script src="{{ asset('assets/js/shared/data-table.js') }}"></script>
  <!-- End custom js for this page-->
  @stack('scripts')
</body>

</html>