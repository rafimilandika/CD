<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>CornDoctor</title>

    <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ url('/') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('/') }}/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url('/') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('/') }}/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="{{ url('/') }}/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('/') }}/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="{{ url('/') }}/dist/css/skins/_all-skins.min.css">

   <!-- Google Font: Source Sans Pro -->
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

   <style>
     body{
      background-image: url('{{ url('/') }}/assets/img/1.2.jpg');
      background-repeat: no-repeat;
      background-size:cover;
    }
  </style>
</head>
<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-light navbar-white">
      <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
          <img src="{{ url('/') }}/assets/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
          <span class="brand-text font-weight-light">CornDoctor</span>
        </a>

        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('tambah_penyakit') }}" class="nav-link">Tambah Penyakit</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('tambah_gejala')}}" class="nav-link">Tambah Gejala</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('forum_admin')}}" class="nav-link">Forum</a>
          </li>

        </ul>
      </li>
    </ul>
    <!-- Right navbar links -->

    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">{{ Auth::user()->name }}</a>
        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
          <li><a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">{{ __('Keluar') }}</a></li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
          <!-- End Level two -->
        </ul>
      </div>
    </nav>
    <!-- /.navbar -->
  </div>
  @yield('forum')
  <div class="contentuser">
    @yield('contentuser')
  </div>


  <!-- jQuery -->
  <script src="{{ url('/') }}/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ url('/') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{ url('/') }}/dist/js/adminlte.min.js"></script>
  <!-- FastClick -->
  <script src="{{ url('/') }}/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ url('/') }}/dist/js/demo.js"></script>
</body>
</html>
