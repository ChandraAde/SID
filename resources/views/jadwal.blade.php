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
					<li class="header">
						<h4><b>
								<center>Menu Panel</center>
							</b></h4>
					</li>
					<li><a href="{{ route('dash.index')}}"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
					<li><a href="{{ route('warga.index')}}"><i class="active fa fa-user"></i><span>Warga</span></a></li>
					<li><a href="{{ route('surat.index')}}"><i class="fa fa-envelope"></i><span>Surat</span></a></li>
					<li class="active"><a href="{{ route('jadwal.index')}}"><i class="fa fa-calendar"></i><span>Jadwal Kegiatan</span></a></li>
					<li><a href="{{ route('user.index')}}"><i class="fa fa-user-circle-o"></i><span>Staff</span></a></li>
					<li><a href="{{ route('about.index')}}"><i class="fa fa-info-circle"></i><span>Tentang Aplikasi</span></a></li>
				</ul>
			</section>
			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Jadwal
				</h1>
				<ol class="breadcrumb">
					<li><i class="fa fa-calendar"></i> Jadwal</li>
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
											<th>Moderator</th>
											<th>Kegiatan</th>
											<th>Tempat</th>
											<th>Hari</th>
											<th>Jam_Mulai</th>
											<th>Jam_Selesai</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($data as $warga)
										<tr>
											<td>{{$warga->staf->nama}}</td>
											<td>{{$warga->kegiatan}}</td>
											<td>{{$warga->tempat}}</td>
											<td>{{$warga->hari}}</td>
											<td>{{$warga->jam_mulai}}</td>
											<td>{{$warga->jam_selesai}}</td>
											<td>
												<form action="{{ route('jadwal.destroy', ['id'=>$warga->id]) }}" method="post">
													<a class="btn btn-info" href="{{route('jadwal.edit',['id'=>$warga->id])}}">Ubah</a>
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
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Tambah Jadwal</h4>
							</div>
							<div class="modal-body">
								<form action="{{route('jadwal.store')}}" name="modal_popup" enctype="multipart/form-data" method="post">
									{{ csrf_field() }}
									<div class="form-group">
										<label>Moderator</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-user"></i>
											</div>
											<select name="moderator" class="form-control">
												@foreach($data2 as $p)
												<option value="{{ $p->id }}">{{ $p->nama }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="form-group">
										<label>Kegiatan</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-book"></i>
											</div>
											<input class="form-control" type="text" name="kegiatan">
										</div>
									</div>
									<div class="form-group">
										<label>Tempat</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-columns"></i>
											</div>
											<input name="tempat" type="text" class="form-control" placeholder="Tempat">
										</div>
									</div>

									<div class="form-group">
										<label>Hari</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input id="tanggal_Lahir" name="hari" type="date" class="form-control" placeholder="hari">
										</div>
									</div>
									<div class="form-group">
										<label>Jam Mulai</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-clock-o"></i>
											</div>
											<input id="Jam_Mulai" name="Jam_Mulai" type="text" class="form-control" placeholder="Jam Mulai">
										</div>
									</div>
									<div class="form-group">
										<label>Jam Selesai</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-clock-o"></i>
											</div>
											<input id="Jam_Selesai" name="Jam_Selesai" type="text" class="form-control" placeholder="Jam Selesai">
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
				<div id="ModalEditJadwal" class="modal fade" tabindex="-1" role="dialog"></div>

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
		@extends('Script.script')
</body>

</html>