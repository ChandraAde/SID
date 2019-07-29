				<table>
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
				@foreach($data as $dosen)
								<tr>
									<td>$dosen[nik]</td>
									<td>$dosen[nama]</td>
									<td>$dosen[Tanggal_Lahir]</td>
									<td></td>
									<td>$dosen[No_Telp]</td>
									<td>$dosen[Alamat]</td>
									<td>
										<a href='#' class='open_modal'>Edit</a> |
										<a href='#' onClick='confirm_delete(\"dosen_delete.php?NIP=$dosen[NIP]\")'>Delete</a>
									</td>
								</tr>
								@endforeach
				</tbody>
				</table>
		