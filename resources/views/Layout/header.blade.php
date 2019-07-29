<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Sistem Infromasi Desa</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
  <!-- Icon -->
  <link rel="shortcut icon" type="image/icon" href="../favicon.ico">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="{{ asset('css/bootsrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('css/_all-skins.min.css') }}">
</head>
<header class="main-header">
  <!-- Logo -->
  <div class="logo">
    <span class="logo-mini"><img src="{{ asset('foto/Lobar.png') }}" class="img-circle" alt="Logo" height="50" width="50"></span>
    <span class="logo-lg"><b>Informasi Desa</b></span>
  </div>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{ asset('foto/Lobar.png') }}" class="user-image" alt="Foto">
            <span class="hidden-xs" style="text-transform:capitalize;"></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              @guest
              <img src="{{ asset('foto/Lobar.png') }}" class="img-circle" alt="Foto">
              <!--<h3><p>Akademik</p></h3>-->
              <p style="text-transform:capitalize;">Hi </p>
              @endguest
              <p>Welcome To IDS Akademik</p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="../lockscreen.php" class="btn btn-primary">Lockscreen <i class="fa fa-lock"></i></a>
              </div>
              <div class="pull-right">
                <a href="../logout.php" class="btn btn-primary">Sign out <i class="fa fa-sign-out"></i></a>
              </div>
            </li>
        </li>
      </ul>
    </div>
  </nav>
</header>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    @yield('content')
  </div><!-- ./wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs"></div>
    <strong>Copyright &copy; <?php echo date("Y") ?> Sistem Informasi Desa and Created By <a href="#">Ade Chandra & Kurniawan</a></strong>
  </footer>
  <!-- jQuery 2.1.4 -->
  <script src="../aset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="../aset/bootstrap/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="../aset/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../aset/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="../aset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="../aset/plugins/fastclick/fastclick.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../aset/dist/js/app.min.js"></script>
</body>

</html>