<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">
		<div class="container">
			<form action="<?php echo base_url('admin/ebb');?>" method="post" enctype="multipart/form-data">
				<br>
				<div class="col-md-1">
				</div>
				<div class="col-md-8">
					<table class="table table-responsive">
						<tr>
							<td>Bus</td>
							<td><div class="col-md-6">
								<input type="hidden" name="id" value="<?php echo $cek->idbb;?>">
								<input type="text" name="bus" class="form-control" value="<?php echo $cek->bus;?>">
							</div></td>
						</tr>
						<tr>
							<td>NOPOL</td>
							<td><div class="col-md-6">
								<input type="text" name="nopol" class="form-control" value="<?php echo $cek->nopol;?>">
							</div></td>
						</tr>
						<tr>
							<td>Sopir</td>
							<td><div class="col-md-6">
								<select name="idsopir" class="form-control">
									<option value="<?php echo $cek->idsopir;?>"><?php echo $cek->napir;?></option>
									<?php
									foreach ($sopir as $key => $value) {
										echo '<option value="'.$value->id.'">'.$value->nama.'</option>';
									}
									?>
								</select>
								<!-- <input type="text" name="idsopir" class="form-control" value="<?php echo $cek->napir;?>"> -->
							</div></td>
						</tr>
						<tr>
							<td>Kapasitas</td>
							<td><div class="col-md-6">
								<!-- <input type="text" name="idshet" class="form-control" value="<?php echo $cek->jenis.' || '.$cek->jumlah;?>"> -->
								<select class="form-control" name="idshet" id="ids" onclick="jumshet()">
									<option value="<?php echo $cek->idshet;?>"><?php echo $cek->jenis.'||'.$cek->jumlah;?></option>
									<?php
									foreach ($sheet as $key => $value) {
										echo '<option value="'.$value->id.'">'.$value->jenis.'||'.$value->jumlah.'</option>';
									}
									?>
								</select>
							</div></td>
						</tr>
						<tr>
							<td>Jenis Bus</td>
							<td><div class="col-md-6">
								<select name="status" class="form-control">
									<option value="<?php echo $cek->status;?>"><?php echo $cek->stabus;?></option>
									<?php
									foreach ($statbus as $key => $value) {
										echo '<option value="'.$value->id.'">'.$value->nama.'</option>';
									}
									?>
								</select>
								<!-- <input type="text" name="status" class="form-control" value="<?php echo $cek->stabus;?>"> -->
							</div></td>
						</tr>
						<tr>
							<td>Jumlah Tiket</td>
							<td><div class="col-md-6">
								<!-- <input type="text" name="jumlahtiket" class="form-control" value="<?php echo $cek->jumlahtiket;?>"> -->
								<div id="EjmlShet"></div>
							</div></td>
						</tr>
						<tr>
							<td>Gambar</td>
							<td>
								<div class="col-md-6">
									<!-- <?php
									if($cek->gambar <> null){
										?>
										<img src="<?php echo base_url('assets/img/bus/'.$cek->gambar);?>" id='uploadPreview' class="form-control" style='width: 250px; height:150px;'/>
										<input id='uploadImage' type="file" value="<?php echo $cek->gambar;?>" name="gambar" onchange='PreviewImage();'>
										<?php
									}else{
									?>
									<img src="<?php echo base_url('assets/img/bus/'.$cek->gambar);?>" id='uploadPreview' class="form-control" style='width: 250px; height:150px;'/>
										<input id='uploadImage' type="file"  required="" name="gambar" onchange='PreviewImage();'>
									<?php
									}
									?> --><img src="<?php echo base_url('assets/img/bus/'.$cek->gambar);?>" id='uploadPreview' class="form-control" style='width: 250px; height:150px;'/>
										<input id='uploadImage' type="file"  required="" name="gambar" onchange='PreviewImage();'>
									
								</div>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" class="btn btn-info" value="Ubah"><a href="<?php echo site_url('admin/datamaster');?>" class="btn btn-danger">Cancel</a></td>
						</tr>
					</table>
				</div>
			</form>
		</div>
	</div>
</div>	

<script type="text/javascript">

//jumlah sheet
	   function jumshet(){
	  	var ids = $('#ids').val();
	  	$.ajax({
	  		type : "POST",
	  		url : "<?=base_url('index.php/admin/jumlahshetEdit');?>",
	  		data : "ids="+ids,
	  		success:function(msg){
	  			$("#EjmlShet").html(msg);
	  		}
	  	});
	  }

function PreviewImage() {
var oFReader = new FileReader();
oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
oFReader.onload = function (oFREvent)
 {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
	};
 };
</script>