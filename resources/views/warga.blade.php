<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Sistem Informasi Desa</title>
	<!-- Library CSS -->
	<link rel="shortcut icon" type="image/icon" href="../favicon.ico">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=1.0" name="viewport" />
	<!-- Bootstrap 3.3.5 -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
	<!-- DataTables -->
	<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
	<!-- Date Picker -->
	<link rel="stylesheet" href="{{ asset('css/datepicker3.css') }}">
	<!-- Date Range Picker -->
	<link rel="stylesheet" href="{{ asset('css/daterangepicker-bs3.css') }}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
	<!-- Sweet Alert -->
	<link rel="stylesheet" href="{{ asset('css/_all-skins.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">
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
					<li class="header">
						<h4><b>
								<center>Menu Panel</center>
							</b></h4>
					</li>
					<li><a href="{{ route('home')}}"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
					<li class="active"><a href="{{ route('warga.index')}}"><i class="active fa fa-user"></i><span>Warga</span></a></li>
					<li><a href="{{ route('surat.index')}}"><i class="fa fa-envelope"></i><span>Surat</span></a></li>
					<li><a href="{{ route('jadwal.index')}}"><i class="fa fa-calendar"></i><span>Jadwal Kegiatan</span></a></li>
					<li><a href="{{ route('user.index')}}"><i class="fa fa-user-circle-o"></i><span>Staff</span></a></li>
					<li><a href="{{ route('about.index')}}"><i class="fa fa-info-circle"></i><span>Tentang Aplikasi</span></a></li>
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Warga
				</h1>
				<ol class="breadcrumb">
					<li><i class="fa fa-user"></i> Data Warga</li>
				</ol>
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-header">

							</div><!-- /.box-header -->
							<div class="box-body">
								<a href="#"><button class="btn btn-success" type="button" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Add</button></a>
								<br></br>
								<table id="data" class="table table-bordered table-striped table-scalable">
									<thead>
										<tr>
											<th>NIK</th>
											<th>Nama Warga</th>
											<th>Tanggal Lahir</th>
											<th>Jenis Kelamin</th>
											<th>Telpon</th>
											<th>Alamat</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($data as $warga)
										<tr>
											<td>{{$warga->nik}}</td>
											<td>{{$warga->nama}}</td>
											<td>{{$warga->tanggal_lahir}}</td>
											<td>{{$warga->jenis_kelamin}}</td>
											<td>{{$warga->no_hp}}</td>
											<td>{{$warga->alamat}}</td>
											<td>

												<form action="{{ route('warga.destroy', ['id'=>$warga->id]) }}" method="post">
													<a class="btn btn-info" href="{{route('warga.edit',['id'=>$warga->id])}}">Ubah</a>
													{{ csrf_field() }}
													{{ method_field('DELETE') }}
													<button class="btn btn-danger" type="button" onclick="if (confirm('Anda yakin ?')) this.form.submit();">
														Hapus
													</button>
												</form>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div><!-- /.box-body -->
						</div><!-- /.box -->
					</div><!-- /.col -->
				</div><!-- /.row -->
			</section><!-- /.content -->

			<!-- Modal Popup Dosen -->
			<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Tambah Data Warga</h4>
						</div>
						<div class="modal-body">
							@if (count($errors) > 0)
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
							@endif
							<form action="{{ route('warga.store') }}" name="modal_popup" enctype="multipart/form-data" method="post">
								{{ csrf_field() }}
								<div class="form-group">
									<label for="nik">NIK</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="nik" type="text" class="form-control" placeholder="Nomor Induk Kependudukan" required/>
									</div>
								</div>
								<div class="form-group">
									<label for="nama">Warga</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input name="nama" type="text" class="form-control" placeholder="Nama Warga" required/>
									</div>
								</div>
								<div class="form-group">
									<label for="ttl">Tanggal Lahir</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input id="tanggal_Lahir" name="ttl" type="date" class="form-control" placeholder="Tanggal Lahir" required>
									</div>
								</div>
								<div class="form-group">
									<label for="JK">Jenis Kelamin</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user-o"></i>
										</div>
										<select name="JK" class="form-control" required>
											<option selected>Pilih Jenis Kelamin</option>
											<option value="Laki - Laki">Laki - laki</option>
											<option value="Perempuan">Perempuan</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="No_Telp" >No. Telp</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-phone"></i>
										</div>
										<input name="No_Telp" type="text" class="form-control" placeholder="No Telpon" min="2" max="12" required />
									</div>
								</div>
								<div class="form-group">
									<label for="Alamat">Alamat</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div>
										<input name="Alamat" type="text" class="form-control" placeholder="Alamat" required/>
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
						</div>
					</div>
				</div>
			</div>

			<!-- Modal Popup Dosen Edit -->
			<div id="Modaledit" class="modal fade" tabindex="-1" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Tambah Data Warga</h4>
						</div>
						<div class="modal-body">

							<form action="/warga" name="modal_popup" enctype="multipart/form-data" method="post" id="editform">
								{{ csrf_field() }}
								{{ method_field('PUT') }}
								<div class="form-group">

									<label>NIK</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-id-card"></i>
										</div>
										<input name="nik" id="nik" type="text" class="form-control" placeholder="Nomor Induk Kependudukan" />
									</div>
								</div>
								<div class="form-group">
									<label>Warga</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input name="nama" id="nama" type="text" class="form-control" placeholder="Nama Warga" />
									</div>
								</div>
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input id="tanggal_Lahir ttl" name="ttl" type="date" class="form-control" placeholder="Tanggal Lahir">
									</div>
								</div>
								<div class="form-group">
									<label>Jenis Kelamin</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user-o"></i>
										</div>
										<select name="JK" id="JK" class="form-control">
											<option selected>Pilih Jenis Kelamin</option>
											<option value="L">Laki - laki</option>
											<option value="P">Perempuan</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label>No. Telp</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-phone"></i>
										</div>
										<input name="No_Telp" id="no_telp" type="text" class="form-control" placeholder="No Telpon" />
									</div>
								</div>
								<div class="form-group">
									<label>Alamat</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div>
										<input name="Alamat" id="alamat" type="text" class="form-control" placeholder="Alamat" />
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

						</div>
					</div>
				</div>
			</div>

			<!-- Modal Popup untuk delete-->
			<div class="modal fade" id="modal_delete">
				<div class="modal-dialog">
					<div class="modal-content" style="margin-top:100px;">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
						</div>
						<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
							<a href="#" class="btn btn-danger" id="delete_link">Delete</a>
							<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
						</div>
					</div>
				</div>
			</div>

		</div><!-- /.content-wrapper -->
		@endsection
	</div><!-- ./wrapper -->
	<!-- Library Scripts -->
	<script src="{{ asset('js/jQuery-2.1.4.min.js') }}"></script>
	<!-- Bootstrap 3.3.5 -->
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<!-- DataTables -->
	<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
	<!-- SlimScroll -->
	<script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
	<!-- FastClick -->
	<script src="{{ asset('js/fastclick.min.js') }}"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('js/app.min.js') }}"></script>
	<!-- Daterange Picker -->
	<script src="{{ asset('js/moment.min.js') }}"></script>
	<script src="{{ asset('js/daterangepicker.js') }}"></script>
	<script src="{{ asset('js/select2.full.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function() {

			var table = $('#datatable').DataTable();

			table.on('click', 'edit', function() {

				$tr = $(this).closest('tr');
				if ($($tr).hasClass('child')) {
					$tr = $tr.prev('.parent');

				}

				var data = table.row($tr).data();
				console.log(data);

				$('#nik').val(data[1]);
				$('#nama').val(data[2]);
				$('#ttl').val(data[3]);
				$('#JK').val(data[4]);
				$('#no_telp').val(data[5]);
				$('#alamat').val(data[6]);

				$('#editform').attr('action', '/warga/' + data[0]);
				$('#Modaledit').modal('show');

			});


		});
	</script>
</body>

</html>