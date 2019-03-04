<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lumino/css/datepicker3.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lumino/css/bootstrap.min.css');?>">
<script type="text/javascript" src="<?php echo base_url('assets/lumino/js/bootstrap-datepicker.js');?>"></script>
<?php
#var_dump($tujuan);
?>
<div class="container">
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		      <img src="<?php echo base_url();?>" style="width: 250px;height: 250px;">
		      <div class="caption" align="center">
	        Detail Bus
		      </div>
		   </div>
		 </div>
		 <div class="col-md-3">
		 </div>
	</div>
	<div class="row">
		
		</div>
		<div class="col-md-12">
			<form action="<?php echo base_url('Member/ins_pemesanan');?>" method="post" enctype="multipart/form-data">
				<table class="table table-responsive">
					<tr>
						<td>Tanggal Reservasi&nbsp;</td>

						<td>
							<input type="hidden" name="idbus" value="<?php echo $bus->idbus;?>">
							<div class="col-md-6">
								<div class="datepicker-center">
							       <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
									<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							        <input class="form-control" id="iddate" type="text" name="tgl_b" required=""  readonly="readonly">
						            </div>
					            </div>
							</div>
							<div class="col-md-6">
								<div class="datepicker-center">
							       <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
									<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							        <input class="form-control" type="text" name="tgl_p" required=""  readonly="readonly">
						            </div>
					            </div>
							</div>
						</td>
					</tr>
					<tr>
						<td>Titik Pemberangkatan</td>
						<td>
							<div class="col-md-6">
								<input type="text" name="titik" required="" class="form-control">
							</div>
						</td>
					</tr>
					<tr>
						<td>Kota Tujuan</td>
						<td>
							<div class="col-md-6">
								<select name="tujuan" class="form-control" id="tujuan" onchange="harga(),change()">
									<?php
									foreach ($tujuan as $key => $value) {
										echo '<option value="'.$value->id.'">'.$value->tujuan.'</option>';
									}
									?>
								</select>
							</div>
						</td>
					</tr>
					<tr>
						<td>Nomor HP</td>
						<td>
							<div class="col-md-6">
								<input type="text" name="noHP" class="form-control" min="0">
								<input type="hidden" name="rentang" required="" value="<?php echo $rentang->rentang;?>">
							</div>
						</td>
					</tr>
					<tr>
						<td>Nomor Rekening<br>AN</td>
						<td><div class="col-md-6">
								<textarea class="form-control" name="noRek" readonly="">1923123123,Abdul J</textarea>
							</div>
						</td>
					</tr>
					<tr>
						<td>Harga</td>
						<td><div class="col-md-6">
							<div id="div_harga"></div>
							<div id="harga2"></div>
						</div></td>
					</tr>
					<tr>
						<td></td>
						<td><button value="Reservasi" class="btn btn-info">Reservasi</button></td>
					</tr>
				</table>
			</form>
		</div>
		
	</div>
</div>
<script type="text/javascript">
	function harga(){
		var id = $("#tujuan").val();
	    $.ajax ({
	      type :"POST",
	      url : "<?=base_url('index.php/member/get_harga');?>",
	      data : "tujuan="+id,
	      success:function(msg){
	        $("#div_harga").html(msg);

	      }
	    });
	}
	/*cek*/
	function change(){
		 var id = $("#tujuan").val();
	    $.ajax ({
	      type :"POST",
	      url : "<?=base_url('index.php/member/get_harga2');?>",
	      data : "tujuan="+id,
	      success:function(msg){
	        $("#harga2").html(msg);

	      }
	    });
	}

	$(".input-group.date").datepicker({autoclose: true, todayHighlight: true});
</script>