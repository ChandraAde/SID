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
					<li class="active"><a href="{{ route('surat.index')}}"><i class="fa fa-envelope"></i><span>Surat</span></a></li>
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
					Permohonan Surat
				</h1>
				<ol class="breadcrumb">
					<li><i class="fa fa-envelope"></i> Surat</li>
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
											<th>NAMA</th>
											<th>NIK</th>
											<th>JENIS SURAT PERMOHONAN</th>
											<th>ALAMAT</th>
											<th>TANGGAL PERMOHONAN</th>
											<th>AKSI</th>
										</tr>
									</thead>
									<tbody>
										@foreach($data as $surat)
										<tr>
											<td>{{$surat->warga->nama}}</td>
											<td>{{$surat->warga->nik}}</td>
											<td>{{$surat->surDet->surat}}</td>
											<td>{{$surat->warga->alamat}}</td>
											<td>{{$surat->created_at}}</td>
											<td>
												<form action="{{ route('surat.destroy', ['id'=>$surat->id_permohonan]) }}" method="post">
													<a class="btn btn-info" href="{{route('surat.edit',['id'=>$surat->id_permohonan])}}">Ubah</a>
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
							</div>
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
							<h4 class="modal-title">Permohonan Surat</h4>
						</div>
						<div class="modal-body">
							<form action="{{ route('surat.store') }}" name="modal_popup" enctype="multipart/form-data" method="post">
								{{ csrf_field() }}
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
					</div>
				</div>
			</div>
		</div>
</div>
		<!-- Modal Popup Dosen Edit -->
		<div id="ModalEditJurusan" class="modal fade" tabindex="-1" role="dialog"></div>

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