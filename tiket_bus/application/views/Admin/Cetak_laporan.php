<?php
$link = array(
	'assets/lumino/css/bootstrap.min.css',
	'assets/lumino/css/styles.css');
foreach ($link as $key => $value) {
	echo '<link href="'.base_url($value).'" rel="stylesheet">';
}
$script = array(
	'assets/lumino/js/jquery-1.11.1.min.js',
	'assets/lumino/js/bootstrap.min.js',
	);

foreach ($script as $key => $value) {
	echo '<script src="'.base_url($value).'"></script>';
}
?>
<div class="jumbotron">
	<div class="panel panel-default">
		<?php
			if($tabel == 'laporan_tiket'){

				echo '<h3 align="center">Cetak Laporan Tiket</h3>';
				echo '<p align="center">Dari Tanggal'.$awal.' sampai Tanggal '.$akhir.'</p>';
			}
		?>
		<div class="panel-body">
			<table class="table table-responsive">
				<thead>
					 				<tr>
						 				<th>No</th>
						 				<th>Bus</th>
						 				<th>User</th>
						 				<th>Jadwal</th>
						 				<th>Jumlah Tiket</th>
						 				<th>Kursi</th>
						 				<th>Status</th>
						 				<th>Harga</th>
						 				<th>Total</th>
						 				<th>Tanggal Pemesanan</th>
					 				</tr>
					 			</thead>
					 			<tbody>
					 				<?php
					 				foreach ($data as $key => $value) {
					 					
					 					echo '<tr>
					 						<td>'.($key+1).'</td>
					 						<td>'.$value->idbus.'</td>
					 						<td>'.$value->iduser.'</td>
					 						<td>'.$value->idjadwal.'</td>
					 						<td>'.$value->jumlahtiket.'</td>
					 						<td>'.$value->kursitiket.'</td>
					 						<td>'.$value->status.'</td>
					 						<td>'.$value->harga.'</td>
					 						<td>'.$value->total.'</td>
					 						<td>'.$value->tgl_expired.'</td>
					 					</tr>';

					 				}
					 				?>
					 			</tbody>
					 			<tfoot>
					 				<tr>
					 					<td>No</td>
						 				<td>Bus</td>
						 				<td>User</td>
						 				<td>Jadwal</td>
						 				<td>Jumlah Tiket</td>
						 				<td>Kursi</td>
						 				<td>Status</td>
						 				<td>Harga</td>
						 				<td>Total</td>
						 				<td>Tanggal Pemesanan</td>
					 				</tr>
					 			</tfoot>
			</table>
		</div>
	</div>

</div>

<script type="text/javascript">
	window.print();
</script>