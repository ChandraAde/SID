<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>Sistem Informasi Desa</title>
	<!-- Library CSS -->
	@extends('css.css')
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      @extends('layouts.app')
      @section('content')
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <p></p>
            </div>
          </div><!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <ul class="sidebar-menu">
            <li class="header"><h4><b><center>Menu Panel</center></b></h4></li>
            <li ><a href="{{ route('home')}}"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
            <li><a href="{{ route('warga.index')}}"><i class="active fa fa-user"></i><span>Warga</span></a></li>
            <li><a href="{{ route('surat.index')}}"><i class="fa fa-envelope"></i><span>Surat</span></a></li>
            <li ><a href="{{ route('jadwal.index')}}"><i class="fa fa-calendar"></i><span>Jadwal Kegiatan</span></a></li>
            <li ><a href="{{ route('user.index')}}"><i class="fa fa-user-circle-o"></i><span>Staff</span></a></li>
            <li class="active"><a href="about.php"><i class="fa fa-info-circle"></i><span>Tentang Aplikasi</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tentang Aplikasi
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-info-circle"></i> Tentang Aplikasi</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
          <h1><center><b>Sistem Informasi Desa</b></center></h1>
          <center><img src="{{ asset('foto/Lobar.png') }}" width="225" height="310" /></center>
          <center><h2><b>Desa Karang Bongkot, Labu Api Lombok Barat <?php echo date ('Y') ?></b></h2></center>
           <center> <strong>Copyright &copy; <?php echo date("Y") ?> Sistem Informasi Desa and Created By <a href="#">Ade Chandra & Kurniawan</a></strong></center>
          
                </div><!-- /.box-header -->
                <div class="box-body">
					
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
		
    </div><!-- /.content-wrapper -->
	@endsection
    </div><!-- ./wrapper -->
	<!-- Library Scripts -->
	@extends('Script.script')
  </body>
</html>
