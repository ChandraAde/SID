@include('css.css')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
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
        <a href="{{route('surat.index')}}" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            {{ __('Back To Surat') }}
        </a>
        <div class="navbar-custom-menu">
            @guest

            @if (Route::has('register'))
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class=""></span>{{ __('Register') }}</a></li>
            </ul>
            @endif
            @else
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
                            <img src="{{ asset('foto/Lobar.png') }}" class="user-image" alt="Foto">
                            @guest
                            <img src="{{ asset('foto/Lobar.png') }}" class="img-circle" alt="Foto">
                            <!--<h3><p>Akademik</p></h3>-->
                            <p style="text-transform:capitalize;"></p>
                            @endguest
                            <p style="text-transform:capitalize;">Hi, {{ Auth::user()->name }}
                            </p>
                            <p>Welcome To SID Karang Bongkot </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="../lockscreen.php" class="btn btn-primary">Lockscreen <i class="fa fa-lock"></i></a>
                            </div>
                            <div class="pull-right">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                </li>
                @endguest
            </ul>
        </div>
    </nav>
</header>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <body class="hold-transition login-page">
            <div class="login-box">

                <div class="login-box-body">
                    <b>
                        <p class="login-box-msg">Edit Surat</p>
                    </b>
                    @foreach($surat as $p)
                   
                    <form action="/surat/update" name="modal_popup" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <input class="form-group" type="hidden" name="id" value="{{ $p->id_permohonan }}">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <select name="Nama" class="form-control">
                                    <option>Pilih Nama</option>
                                    @foreach($data2 as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Memohon Surat</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <select name="surat_permohonan" class="form-control">
                                    <option>Pilih Surat</option>
                                    @foreach($data3 as $p)
                                    <option value="{{ $p->id }}">{{ $p->surat }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit">
                                Add
                            </button>
                            <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">
                                Cancel
                            </button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="aset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="aset/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="aset/plugins/iCheck/icheck.min.js"></script>
</body>
</div><!-- ./wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs"></div>
    <strong>Copyright &copy; <?php echo date("Y") ?> Sistem Informasi Desa and Created By <a href="#">Ade Chandra & Kurniawan</a></strong>
</footer>
@include('Script.script')