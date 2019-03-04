<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lumino/css/datepicker3.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lumino/css/bootstrap.min.css');?>">
<script type="text/javascript" src="<?php echo base_url('assets/lumino/js/bootstrap-datepicker.js');?>"></script>
<section class="main-section"><!--main-section-start-->
    <div class="container">
       
       <!-- datatables -->
       <div class="panel panel-default">
       		<div class="panle-body">
       			<h3>List Pemesanan</h3>
       			<!-- data table-->
       			<?php
            #var_dump($query);
       			$no = '1';
       			foreach ($query as $key => $value) {
       				?>
       				<table class="table table-responsive">
       				<form action="<?php echo base_url('Member/konfirmasipemesanan'); ?>" method="post" enctype="multipart/form-data">
       				<tr>
       					<td>Pemesan <?php echo $no;?></td>
       					<td><div class="col-md-6">
       						<p>
       							<input type="hidden" name="id" value="<?php echo $value->idpp;?>">
       							<?php echo $value->nama.'<br>'.$value->no_hp;
       							?>
       						</p>
       					</div>
       					</td>
       				</tr>
       				<tr>
       					<td>Tujuan</td>
       					<td><div class="col-md-6">
       						<p>
       							<?php echo $value->tujuan;?>
       						</p>
       					</div></td>
       				</tr>
       				<tr>
       					<td>Durasi</td>
       					<td><div class="col-md-6">
       						<p>
       							<?php echo $value->durasi;?>
       						</p>
       					</div></td>
       				</tr>
       				<tr>
       					<td>Harga</td>
       					<td><div class="col-md-6">
       						<?php echo 'Satuan : Rp.'.number_format($value->harga),',',0;
                  $total = $value->harga*$value->jumlahbus;
                  echo '<br>Total : Rp.'.number_format($total),',',0;
                  ?>
       					</div>
       					</td>
       				</tr>
              <tr>
                <td>Jumlah Bus</td>
                <td><div class="col-md-6">
                  <?php echo $value->jumlahbus;
                  ?>
                </div></td>
              </tr>
       			<!--   <tr>
              <td>Sheet Bus</td>
              <td><div class="col-md-6">
                <?php echo $value->jenis;?>
              </div>
              </td>
            </tr>
            <tr>
              <td>Jumlah Sheet</td>
              <td>
                <div class="col-md-6">
                  <?php echo $value->jumlah;?>
                </div>
              </td>
            </tr> -->
       				<tr>
       					<td>Tanggal Berangkat</td>
       					<td>
       						<div class="col-md-3">
							       <div class="datepicker-center">
							            <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
											<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							                <input class="form-control" name="from" id="iddate" type="text" required="" value="<?php echo $value->tgl_b;?>"  readonly="readonly">

							            </div>
						            </div>
							</div>
							<div class="col-md-1">
								<p>To</p>
							</div>
							<div class="col-md-3">
							 <div class="datepicker-center">
                                                             <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
                                                                             <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                                 <input class="form-control" name="to" id="iddate" type="text" required="" value="<?php echo $value->tgl_p;?>"  readonly="readonly">

                                                             </div>
                                                      </div>
							</div>
       					</td>
       				</tr>
                                  <tr>
                                         <td>Berangkat Dari</td>
                                         <td><div class="col-md-6">
                                                <?php echo $value->dari;?>
                                         </div>
                                         </td>
                                  </tr>
                                  <tr>
                                  	<td>Silahkan kirim di</td>
                                  	<td><div class="col-md-6">
                                  		<table class="table table-responsive">
                                  			<tr>
                                  				<td>Nomor Rekening</td>
                                  				<td><?php echo $value->norek;?></td>
                                  			</tr>
                                  			<tr>
                                  				<td>Atas Nama</td>
                                  				<td><?php echo $value->an;?></td>
                                  			</tr>
                                  			<tr>
                                  				<td>Batas Pembayaran</td>
                                  				<td><?php echo $value->tgl_expied;?></td>
                                  			</tr>
                                  		</table>
                                  	</div>
                                  	</td>
                                  </tr>
                                  <tr>
                                  	<td>Bukti Pembayaran</td>
                                  	<td><div class="col-md-6">
                                  		<img src="<?php echo base_url('assets/img/bukti/'.$value->bukti_transfer);?>" id='uploadPreview' class="form-control" style='width: 150px; height:150px;'/>
										<input id='uploadImage' type="file"  required="" name="bukti_transfer" onchange='PreviewImage();'>
                    <?php
                    if($value->status == 0){
                      echo '<div class="alert alert-warning" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  Lakukan Pembayaran
</div>';
                    }elseif ($value->status == 1) {
                      echo '<div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  Sudah Melakukan Pembayaran
</div>';
                    }else{
                      echo '<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  Bukti Pembayaran di tolak
</div>';
                    }
                    ?>
										<!--<h6><p style="color:red">File berupa jpg, jika tidak tidak keluar</p></h6>-->
                                  	</div>
                                  	</td>
                                  </tr>
                                  <
       				<tr>
       					<td></td>
       					<td><input type="submit" class="btn btn-success" value="Konfirmasi"></td>
       				</tr>
       				</form>
       			</table>
       				<?php
       				$no++;
       			}
       			?>
       			
       			<!-- end data table -->
       		</div>
       </div>
       <!-- end datatables -->    
    </div>
</section>
<script type="text/javascript">
	/*function pesan()
	{
		tanya = confirm("Yakin Untuk memesan paket ini ?");
	 	if(tanya == true ) return true;
	 	else
	 		return false;
	}*/
	function PreviewImage() {
var oFReader = new FileReader();
oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
oFReader.onload = function (oFREvent)
 {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
	};
 };
	
</script>