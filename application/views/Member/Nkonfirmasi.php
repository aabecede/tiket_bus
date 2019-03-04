<section class="main-section">
	<div class="panel-body">
		<div class="container">
			<div class="col-md-3">
			</div>
			<div class="col-md-6">
			<table class="table table-responsive">
				<tr>
					<td>Nama</td>
					<td><?php echo $log->nama;?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td><?php echo $log->alamat;?></td>
				</tr>
				<tr>
					<td>Tujuan</td>
					<td><?php echo $pemesanan->naju;?></td>
				</tr>
				<tr>
					<td>Jumlah Kursi</td>
					<td><?php echo $pemesanan->nalah.'<br>Jenis Sheet '.$pemesanan->najis;?></td>
				</tr>
				<tr>
					<td>Tanggal Berangkat</td>
					<td><?php echo $pemesanan->tgl_b;?></td>
				</tr>
				<tr>
					<td>Tanggal Pulang</td>
					<td><?php echo $pemesanan->tgl_p;?></td>
				</tr>
				<tr>
					<td>Jumlah Bus</td>
					<td><?php echo $pemesanan->jumbus;?><br><a href="#" class="btn btn-success" data-toggle="modal" data-target="#modalbus" data-id="<?php echo $pemesanan->idpp;?>" data-expied="<?php echo $pemesanan->tgl_expied;?>">Detail Bus</a></td>
				</tr>
				<tr>
					<td>Tarif</td>
					<td><?php echo 'Rp '.number_format($pemesanan->tarif);?></td>
				</tr>
				<tr>
					<td>Total</td>
					<td><?php echo 'Rp '.number_format($pemesanan->total);?></td>
				</tr>
				<tr>
					<td>Batas Terakhir DP</td>
					<td><?php echo $pemesanan->tgl_expied;?></td>
				</tr>
				<form action="<?php echo base_url('member/up_pesan');?>" method="post" enctype="multipart/form-data">
				<tr>
					<input type="hidden" name="id" value="<?php echo $pemesanan->idpp;?>">
					<td>DP / Uang Muka</td>
					<td><?php
					@$DP = 0.25 * $pemesanan->total;
					echo 'Rp '.number_format($DP);
					echo '<input type="hidden" name="DP" value="'.$DP.'">';
					?></td>
				</tr>
				<tr>
						<td>Bukti Pembayaran</td>
                                  	<td><div class="col-md-6">
                                  		<img src="#" id='uploadPreview' class="form-control" style='width: 150px; height:150px;'/>
										<input id='uploadImage' type="file"  required="" name="bukti_tf" onchange='PreviewImage();'>
								                    <?php
								                    if($pemesanan->natus == 0){
								                      echo '<div class="alert alert-warning" role="alert">
								  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								  <span class="sr-only">Error:</span>
								  Lakukan Pembayaran
								</div>';
								                    }elseif ($pemesanan->natus == 1) {
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
					<!-- bukti trnasfer ends -->
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Upload Bukti Transaksi" class="btn btn-warning"></td>
				</tr>
				</form>
			</table>
			</div>
		</div>
	</div>
</section>

<!-- start modal-->
     <div class="modal fade bs-example-modal-lg" id="modalbus" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
     <!-- end modal-->

<script type="text/javascript">
	function PreviewImage() {
var oFReader = new FileReader();
oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
oFReader.onload = function (oFREvent)
 {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
	};
 };

 	$(document).ready(function(){
        $('#modalbus').on('show.bs.modal', function(e){
            var  rowid = $(e.relatedTarget).data('id');
            var expied = $(e.relatedTarget).data('expied');
            //ambil data
            $.ajax({
                type : 'post',
                url : '<?php echo base_url('Member/get_bus_pesan');?>',
                data : 'rowid=' + rowid ,
                success : function(data){
                    $('.fetched-data').html(data);//tampil data di modal.
                }

            });
        });
    });
</script>

