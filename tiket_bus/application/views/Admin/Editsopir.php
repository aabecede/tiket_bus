<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">
		<div class="container">
			<form action="<?php echo base_url('admin/esopp');?>" method="post" enctype="multipart/form-data"><br>
				<div class="col-md-1">
				</div>
				<div class="col-md-9">
					<table class="table table-responsive">
						<tr>
							<input type="hidden" name="id" value="<?php echo $sopir->id;?>">
							<td>No KPT</td>
							<td><div class="col-md-6">
								<input type="text" class="form-control" name="no_ktp" value="<?php echo $sopir->no_ktp;?>">
							</div></td>
						</tr>
						<tr>
							<td>Nama</td>
							<td><div class="col-md-6">
								<input type="text" name="nama" class="form-control" value="<?php echo $sopir->nama;?>">
							</div>
							</td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>
								<div class="col-md-6">
									<?php
									if($sopir->jk == "L")
									{
									echo '<select name="jk" class="form-control">
										<option value="L">Laki - laki</option>
										<option value="P">Perempuan</option>
									</select>';
									}else{
										echo '<select name="jk" class="form-control">
										<option value="P">Perempuan</option>
										<option value="L">Laki - laki</option>
									</select>';
									}
									?>
									
								</div>
							</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>
								<div class="col-md-6">
									<textarea class="form-control" name="alamat"><?php echo $sopir->alamat;?></textarea>
								</div>
							</td>
						</tr>
						<tr>
							<td>Nomor Telpon</td>
							<td><div class="col-md-6">
								<input type="number" class="form-control" name="no_telp" value="<?php echo $sopir->no_telp;?>">
							</div>
							</td>
						</tr>
						<tr>
							<td>Tanggal Lahir</td>
							<td>
								<div class="col-md-6">
									<div class="datepicker-center">
							            <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
											<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							                <input class="form-control" name="tgl_lhr" type="text" required="" value="<?php echo $sopir->tgl_lhr;?>" readonly="readonly">

							            </div>
						            </div>
								</div>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" class="btn btn-info" value="Ubah"><input type="reset" value="Reset" class="btn btn-danger"></td>
						</tr>
					</table>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	    $(".input-group.date").datepicker({autoclose: true, todayHighlight: true});
</script>