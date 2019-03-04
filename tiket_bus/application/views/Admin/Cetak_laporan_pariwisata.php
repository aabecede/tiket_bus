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
				<tr>
			 				<th>No</th>
			 				<th>Nama</th>
			 				<th>Bus</th>
			 				<th>Tanggal Berangkat</th>
			 				<th>Tanggal Pulang</th>
			 				<th>Berangkat dari</th>
			 				<th>Tujuan</th>
			 				<th>Jumlah Bus</th>
			 				<th>Harga</th>
			 				<th>Total</th>
			 				<th>DP</th>
			 				<th>Status</th>
			 				<th>Tanggal</th>
		 				</tr>
		 			</thead>
		 			<tbody>
		 				<?php
		 				if(count($data) > 0){

			 				foreach ($data as $key => $value) {
			 					
			 					echo '<tr>
			 						<td>'.($key+1).'</td>
			 						<td>'.$value->iduser.'</td>
			 						<td>'.$value->idbus.'</td>
			 						<td>'.$value->tgl_b.'</td>
			 						<td>'.$value->tgl_p.'</td>
			 						<td>'.$value->berangkatdari.'</td>
			 						<td>'.$value->tujuan.'</td>
			 						<td>'.$value->jumbus.'</td>
			 						<td>Rp. '.number_format($value->tarif,2).'</td>
			 						<td>Rp. '.number_format($value->total,2).'</td>
			 						<td>Rp. '.number_format($value->DP,2).'</td>
			 						<td>'.$value->status.'</td>
			 						<td>'.$value->tgl_expied.'</td>
			 					</tr>';

			 				}
		 				}
		 				?>
		 			</tbody>
		 			<tfoot>
		 				<tr>
		 					<td>No</td>
			 				<td>Nama</td>
			 				<td>Bus</td>
			 				<td>Tanggal Berangkat</td>
			 				<td>Tanggal Pulang</td>
			 				<td>Berangkat dari</td>
			 				<td>Tujuan</td>
			 				<td>Jumlah Bus</td>
			 				<td>Harga</td>
			 				<td>Total</td>
			 				<td>DP</td>
			 				<td>Status</td>
			 				<td>Tanggal</td>
		 				</tr>
		 			</tfoot>
					
			</table>
		</div>
	</div>

</div>

<script type="text/javascript">
	window.print();
</script>