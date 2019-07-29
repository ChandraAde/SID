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
					<li><a href="{{ route('home')}}"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
					<li><a href="{{ route('warga.index')}}"><i class="active fa fa-user"></i><span>Warga</span></a></li>
					<li><a href="{{ route('surat.index')}}"><i class="fa fa-envelope"></i><span>Surat</span></a></li>
					<li><a href="{{ route('jadwal.index')}}"><i class="fa fa-calendar"></i><span>Jadwal Kegiatan</span></a></li>
					<li class="active"><a href="{{ route('user.index')}}"><i class="fa fa-user-circle-o"></i><span>Staff</span></a></li>
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
					Staff
				</h1>
				<ol class="breadcrumb">
					<li><i class="fa fa-user-circle-o"></i> Staff</li>
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
								<a href="#"><button class="btn btn-success" type="button" data-target="#ModalAddDosen" data-toggle="modal"><i class="fa fa-plus"></i> Add Staff</button></a>
								<br></br>
								<table id="data" class="table table-bordered table-striped table-scalable">
									<thead>
										<tr>
											<th>Id Staff</th>
											<th>Nama Staff</th>
											<th>Jenis Kelamin</th>
											<th>Jabatan</th>
											<th>Telpon</th>
											<th>Alamat</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($data as $staff)
										<tr>
											<td>{{$staff->id}}</td>
											<td>{{$staff->nama}}</td>
											<td>{{$staff->jenis_kelamin}}</td>
											<td>{{$staff->jabatan}}</td>
											<td>{{$staff->No_Hp}}</td>
											<td>{{$staff->alamat}}</td>
											<td>
												<form action="{{ route('user.destroy', ['id'=>$staff->id]) }}" method="post">
													<a class="btn btn-info" href="{{route('user.edit',['id'=>$staff->id])}}">Ubah</a>
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
			<div id="ModalAddDosen" class="modal fade" tabindex="-1" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Tambah Data Staff</h4>
						</div>
						<div class="modal-body">
							<form action="{{ route('user.store') }}" name="modal_popup" enctype="multipart/form-data" method="post">
								{{ csrf_field() }}
								<div class="form-group">
									<label>Nama</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input name="nama" type="text" class="form-control" placeholder="Nama" />
									</div>
								</div>
								<div class="form-group">
									<label>Jabatan</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input name="jabatan" type="text" class="form-control" placeholder="jabatan">
									</div>
								</div>
								<div class="form-group">
									<label>Jenis Kelamin</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user-o"></i>
										</div>
										<select name="JK" class="form-control">
											<option selected>Pilih Jenis Kelamin</option>
											<option value="Laki - Laki">Laki - laki</option>
											<option value="Perempuan">Perempuan</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label>No. Telp</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-phone"></i>
										</div>
										<input name="No_Telp" type="text" class="form-control" placeholder="No Telpon" />
									</div>
								</div>
								<div class="form-group">
									<label>Alamat</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-flag"></i>
										</div>
										<input name="Alamat" type="text" class="form-control" placeholder="Alamat" />
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

			<!-- Modal Popup Dosen -->
			<div id="ModalAddMahasiswa" class="modal fade" tabindex="-1" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Tambah User Mahasiswa</h4>
							<br />
							<h6 class="modal-title">Username Dan Password = NIM Mahasiswa</h6>
						</div>
						<div class="modal-body">
							<form action="user_add_mahasiswa.php" name="modal_popup" enctype="multipart/form-data" method="post">
								<div class="form-group">
									<label>Usergroup</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<select name="Id_Usergroup_User" class="form-control">
											<option value=3 selected>Mahasiswa</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label>Mahasiswa</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<select name="User_Mahasiswa" class="form-control">
											<?php
											//select option user
											?>
										</select>
									</div>
								</div>
								<div class="modal-footer">
									<button class="btn btn-success" type="submit">
										Create User
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
	@extends('Script.script')
</body>

</html>