<?php
$link = array('css/bootstrap.css','css/style.css','css/font-awesome.css','css/responsive.css','css/animate.css','css/cssfamily.css','css/cyrillic.css');
foreach($link as $row => $value){
    ?>
    <link href="<?=base_url('assets/'.$value);?>?>" rel="stylesheet" type="text/css">
    <?php
}
?>
<br><br>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-lg-4 col-ls-4">
			<table class="table table-responsive">
				<tr>
					<td>Nama Pemesan</td>
					<td><?php echo $data->email;?></td>
				</tr>
				<tr>
					<td>Nama Bus</td>
					<td><?php echo $data->bus;?></td>
				</tr>
				<tr>
					<td>Plat Bus</td>
					<td><?php echo $data->nopol;?></td>
				</tr>
				<tr>
					<td>Berangkat Dari</td>
					<td><?php echo $data->dari;?></td>
				</tr>
				<tr>
					<td>Tujuan</td>
					<td><?php echo $data->naju;?></td>
				</tr>
				<tr>
					<td>Jumlah Tiket | Kursi</td>
					<td><?php echo $data->juket.' | '.$data->kursitiket;?></td>
				</tr>
				<tr>
					<td>Berangkat | Hari</td>
					<td><?php echo $data->jamberangkat.' | '.$data->namahari;?></td>
				</tr>
			</table>
		</div>

	</div>
	<input type="submit" class="btn btn-default" id="print" value="Print" onclick="return tanya()">
</div>

<script type="text/javascript">
	window.print();
	function tanya(){
		window.print();
		document.getElementById('print').style.visibility = 'hidden';

	}
</script>