<div class="container">
	<?php
	#var_dump($query);
	?>

	<h3 align="center"><p>Reservasi Pemesanan Pariwisata</p></h3>
	<h6 style="color:red"><?php echo 'Batas Pembayaran '.$query->tgl_expied;?></h6>
	<table class="table table responsive">
		<tr>
			<td>Nama Pemesan</td>
			<td><?php echo $query->nama;?></td>
		</tr>
		<tr>
			<td>Bus</td>
			<td><?php echo $query->bus;?></td>
		</tr>
		<tr>
			<td>Tanggal Berangkat / Pulang</td>
			<td><?php echo $query->tgl_b.' | '. $query->tgl_p;?></td>
		</tr>
		<tr>
			<td>Berangkat dari</td>
			<td><?php echo $query->titik;?></td>
		</tr>
		<tr>
			<td>Nomor HP</td>
			<td><?php echo $query->noHP;?></td>
		</tr>
		<tr>
			<td>No Rekening yang dituju</td>
			<td><?php echo $query->noRek;?></td>
		</tr>
		
		<tr>
			<td>Total Pembayaran<br>Bayar</td>
			<td><?php echo 'Rp. '.number_format($query->harga),',';?>
				<br><?php echo 'Rp. '.number_format($query->hrg),',';?>
				
			</td>
		</tr>
		<tr>
			<td>Tujuan</td>
			<td><?php echo $query->tj;?></td>
		</tr>
		<form action="<?php echo base_url('Member/konfirmasipemesanan');?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $query->idp;?>">
		<tr>
			<td>Bukti Pembayaran</td>
			<td>
				<div class="col-md-6">
                                  		
					                    <?php
					                    if($query->stt == 0){
					                      ?>
					                      <img src="<?php echo base_url('assets/img/bukti/'.@$query->bukti_transfer);?>" id='uploadPreview' class="form-control" style='width: 150px; height:150px;'/>
										<input id='uploadImage' type="file"  required="" name="bukti_transfer" onchange='PreviewImage();'>
					                      <div class="alert alert-warning" role="alert">
					  <!-- <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					  <span class="sr-only">Error:</span> -->
					  Lakukan Pembayaran
					</div>
					</div>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><button class="btn btn-info">Upload Bukti</button></td>
		</tr><?php
					                    }elseif ($query->stt == 1) {
					                      ?><img src="<?php echo base_url('assets/img/bukti/'.@$query->bukti_transfer);?>" id='uploadPreview' class="form-control" style='width: 150px; height:150px;'/>
										<!-- <input id='uploadImage' type="file"  required="" name="bukti_transfer" onchange='PreviewImage();'> -->
										<div class="alert alert-success" role="alert">
					  <!-- <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					  <span class="sr-only">Error:</span> -->
					  Sudah Melakukan Pembayaran
					</div>
					</div>
			</td>
		</tr>
		<tr>
			<td></td>
			<!-- <td><button class="btn btn-info">Upload Bukti</button></td> -->
		</tr><?php
					                    }else{
					                      ?><img src="<?php echo base_url('assets/img/bukti/'.@$query->bukti_transfer);?>" id='uploadPreview' class="form-control" style='width: 150px; height:150px;'/>
										<input id='uploadImage' type="file"  required="" name="bukti_transfer" onchange='PreviewImage();'>
										<div class="alert alert-danger" role="alert">
					  <!-- <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					  <span class="sr-only">Error:</span> -->
					  Bukti Pembayaran di tolak
					</div>
					</div>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><button class="btn btn-info">Upload Bukti</button></td>
		</tr><?php
					                    }
					                    ?>
										<!--<h6><p style="color:red">File berupa jpg, jika tidak tidak keluar</p></h6>-->
                                  	
		</form>
	</table>
</div>

<script type="text/javascript">
	function PreviewImage() {
var oFReader = new FileReader();
oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
oFReader.onload = function (oFREvent)
 {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
	};
 };
</script>