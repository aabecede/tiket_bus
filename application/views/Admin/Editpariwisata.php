<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">
		<div class="container">
			<br>
			<div class="col-md-1">
			</div>
			<div class="col-sm-9">
				<form action="<?php echo base_url('admin/epar');?>" method="post" enctype="multipart/form-data">
					<table class="table table-responsive">
						<tr>
							<td>Tujuan</td>
							<td><div class="col-md-6">
								<input type="hidden" name="id" value="<?php echo $pariwisata->id;?>">
								<input type="text" name="tujuan" class="form-control" value="<?php echo $pariwisata->tujuan;?>">
							</div>
							</td>
						</tr>
						<tr>
							<td>Durasi</td>
							<td><div class="col-md-6">
								<input type="text" name="durasi" class="form-control" value="<?php echo $pariwisata->durasi;?>">
							</div>
							</td>
						</tr>
						<tr>
							<Td>Harga</Td>
							<td><div class="col-md-6">
								<input type="text" name="harga" class="form-control" value="<?php echo $pariwisata->harga;?>">
							</div></td>
						</tr>
						<tr>
							<Td></Td>
							<td><input type="submit" class="btn btn-info" value="Ubah Data"><a href="<?php echo base_url('admin/datamaster');?>" class="btn btn-warning">Batal</a></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>