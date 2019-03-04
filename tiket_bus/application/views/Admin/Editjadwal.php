<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">
		<div class="container">
			<br>
			<div class="col-md-1">
			</div>
			<div class="col-md-9">
				<form action="<?php echo base_url('admin/ejad');?>" method="post" enctype="multipart/form-data">
					<table class="table table-responsive">
						<tr>
							<td>Bus</td>
							<td>
								<div class="col-md-6">
									<input type="hidden" name="id" value="<?php echo $jadwal->idj;?>">
									<select name="idbus" class="form-control">
										<option value="<?php echo $jadwal->idbus;?>"><?php echo $jadwal->nabus;?></option>
										<?php
										foreach ($bus as $key => $value) {
											echo '<option value="'.$value->id.'">'.$value->nabus.'</option>';
										}
										?>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td>Dari</td>
							<td>
								<div class="col-md-6">
									<input type="text" class="form-control" name="dari" readonly="" value="<?php echo $jadwal->dari;?>">
								</div>
							</td>
						</tr>
						<tr>
							<td>Tujuan</td>
							<td>
								<div class="col-md-6">
									<select class="form-control" name="tujuan">
										<option value="<?php echo $jadwal->tujuan;?>"><?php echo $jadwal->naju;?></option>
										<?php
										foreach ($tujuan as $key => $value) {
											echo '<option value="'.$value->id.'">'.$value->nama.'</option>';
										}
										?>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td>Berangkat</td>
							<td>
								<div class="col-md-6">
									<select class="form-control" name="berangkat">
										<option value="<?php echo $jadwal->berangkat;?>"><?php echo $jadwal->jamberangkat;?></option>
										<?php
									foreach ($jamberangkat as $key => $value) {

										if($value->jam == $jadwal->jamberangkat){

										}else{

											echo '<option value="'.$value->id.'">'.$value->jam.'</option>';	
										}
										
									}
									  ?>
									</select>

								</div>
							</td>
						</tr>
						<tr>
							<td>Hari</td>
							<td>
								<div class="col-md-6">
									<select class="form-control" name="hari">
										<option value="<?php echo $jadwal->hari;?>"><?php echo $jadwal->_nHari;?></option>
										<?php
										foreach ($hari as $key => $value) {

											if($value->nama == $jadwal->_nHari){

											}else{

												echo '<option value="'.$value->id.'">'.$value->nama.'</option>';	

											}
											
										}
										?>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td>Harga</td>
							<td><div class="col-md-6">
								<input type="number" name="harga" class="form-control" min="0" value="<?php echo $jadwal->harga;?>">
							</div>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" value="Ubah Data" class="btn btn-info"><input type="reset" class="btn btn-danger" value="reset"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>