<?php
$link = array('css/bootstrap.css','css/style.css','css/font-awesome.css','css/responsive.css','css/animate.css','css/cssfamily.css','css/cyrillic.css');
foreach($link as $row => $value){
    ?>
    <link href="<?=base_url('assets/'.$value);?>?>" rel="stylesheet" type="text/css">
    <?php
}
?>

<!--[if IE]><style type="text/css">.pie {behavior:url(PIE.htc);}</style><![endif]-->
<?php
$script = array ('js/jquery.1.8.3.min.js','js/bootstrap.js','js/jquery-scrolltofixed.js','js/jquery.easing.1.3.js','js/jquery.isotope.js','js/wow.js','js/classie.js');
foreach($script as $row => $value){
    ?>
    <script type="text/javascript" src="<?=base_url('assets/'.$value);?>"></script>
    <?php
}
?>
<div class="container">
	<div class="row">
		<div class="col-md-2">
			<img src="<?php echo base_url('assets/img/logoDm.png');?>" style="width : 100px; height: 100px; margin-left: 35px;">
			<p style="color : dark grey; font-size : 20px;" align="center">D A M R I</p>
		</div>

		<div class="col-md-8">
			<h4 align="center">SURAT PERMINTAAN SEWA ANGKUTAN  BORONGAN</h4>
			<h4 align="center">( S P S A B )</h4>
			<?php $date = date ('Y-m-d');
			$time = date('H:m:s');
			$detailtime = explode(':', $time);
			$detaildate = explode('-', $date);
			#var_dump($detaildate);
			echo '<h4 align="center">Nomor : '.$detaildate[0].'/'.$detaildate[1].'/'.$detaildate[2].'/'.$detailtime[0].'/'.$detailtime[1].'</h4>';
			?>
			
		</div>
	</div>
	<br><br><br>
	<div class="row">
		<p>Bersama ini dengan hormat :</p>
		<table>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><?php echo $query->nama;?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><?php echo $query->alamat;?></td>
			</tr>
		</table>
		<p>Mengajukan permintaan sewa angkutan borongan kepada Perum "DAMRI"</p>
		<Br>
		<table>
			<tr>
				<td>1</td>
				<td>Jenis Kendaraan yang diperlukan</td>
				<td>:</td>
				<td>Bus Pariwisata</td>
			</tr>
			<tr>
				<td>2</td>
				<td>Banyak Kendaraan yang diperlukan</td>
				<td>:</td>
				<td> <?php echo $query->jumbus;?> Buah</td>
			</tr>
			<tr>
				<td>3</td>
				<td>Tanggal Keperluan</td>
				<td>:</td>
				<td><?php echo $query->tgl_b.' ~ '.$query->tgl_p;?></td>
			</tr>
			<tr>
				<td>4</td>
				<td>Tempat Berangkat</td>
				<td>:</td>
				<td><?php echo $query->berangkatdari;?></td>
			</tr>
			<tr>
				<td>5</td>
				<td>Tempat Tujuan</td>
				<td>:</td>
				<td><?php echo $query->naju;?></td>
			</tr>
			<tr>
				<td>6</td>
				<td>Bus Tersedia</td>
				<td>:</td>
				<td>
					<table>
						<?php
						$singlebus = explode(',', $query->idbus);
						$no = 0;
						foreach ($singlebus as $key => $value) {
							$idbus = $singlebus[$no];
							$bus = $this->db->query('select * from bus,jenis_sheet where jenis_sheet.id = bus.idshet and bus.id = ?',array($idbus))->row();
							$no++;
							#var_dump($bus);
							if($bus != null)
							{

						?>
							<tr>
								<td>Bus</td>
								<td><?php echo $no;?></td>
							</tr>
							<tr>
								<td>Nama bus</td>
								<td><?php echo $bus->bus;?></td>
							</tr>
							<tr>
								<td>Kapasitas</td>
								<td><?php echo $bus->jumlah;?></td>
							</tr>

							<?php
							}
						}
						?>
					</table>
				</td>
			</tr>
			<tr>
				<td>7</td>
				<td>Uang Sewa</td>
				<td>:</td>
				<td>
					<table>
						<tr>
							<td>Tarif Pariwisata</td>
							<td>:</td>
							<td><?php echo number_format($query->tarif);?></td>
						</tr>
						<tr>
							<td>Jumlah Bus</td>
							<td>:</td>
							<td><?php echo $query->jumbus;?></td>
						</tr>
						<tr>
							<td>Jumlah Hari</td>
							<td>:</td>
							<td>
								<?php
								/*$diffdate = $query->tgl_p - $query->tgl_b;
								echo $diffdate;*/
								$explodedate1 = explode('-', $query->tgl_b);
								$explodedate2 = explode('-', $query->tgl_p);
								#var_dump($explodedate1);
								$hasilhari = $explodedate2[2] - $explodedate1[2];
								echo $query->tgl_b.' ~ '. $query->tgl_p.'('.$hasilhari.' Hari)';
								?>
							</td>
						</tr>
						<tr>
							<td>Total</td>
							<td>:</td>
							<td><?php echo 'Rp '.number_format($query->total);?></td>
						</tr>
						<tr>
							<td>DP</td>
							<td>:</td>
							<td><?php echo 'Rp '.number_format($query->DP);?></td>
						</tr>
						<tr>
							<td>Sisa Bayar</td>
							<td>:</td>
							<td><?php 
							$total = $query->total;
							$dp = $query->DP;
							@$sisa = $total - $dp;
							echo 'Rp '.number_format(@$sisa);
							?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>

	
	<input type="submit" class="btn btn-default" id="print" value="print" onclick="return tanya()">
</div>

<script type="text/javascript">
	window.print();
	function tanya(){
		window.print();
		document.getElementById('print').style.visibility = 'hidden';

	}
</script>