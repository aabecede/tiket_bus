<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
    
     <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">
	     
	     <div class="col-lg-12 col-md-12">
			<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg></a></li>
				<li class="active"><?=$icon;?></li>
			</ol>
		</div><!--/.row-->
			<h2 align="center">Laporan Pariwisata</h2>
			<?='<p>'.@$alert.'</p>';?>
		</div>
		<div class="col-md-12">
	     	<form action="<?php echo base_url('admin/laporan_pariwisata');?>" method="post" enctype="multipart/form-data">
	     		<div class="col-md-4">
	     			<label>Tanggal Awal</label>
	     			<input type="date" name="tgl_awal" class="form-control">
	     		</div>
	     		<div class="col-md-4">
	     			<label>Tanggal Akhir</label>
	     			<input type="date" name="tgl_akhir" class="form-control">
	     		</div>
	     		<div class="col-md-4">
	     		</div>
	     		<div class="col-md-12">
	     			<input type="submit" value="Cari Laporan" class="btn btn-info">
	     		</div>
	     	</form>
		 </div>
	 
		 <div class="panel panel-default">
		 	<div class="panel-body">

		 		<h3>Laporan Pariwisata dari Tanggal <?php echo @$tgl_awal;?> sampai Tanggal <?php echo @$tgl_akhir;?></h3>

		 		<a href="<?php echo base_url('admin/cetak_laporan/npemesanan_pariwisata/'.$tgl_awal.'/'.$tgl_akhir);?>" target="_blank" class="btn btn-success">Cetak Laporan</a>

		 		<table id="tbl1" class="table table-striped table-bordered " cellspacing="0" width="100%">
		 			<thead>
		 				<tr>
			 				<th>No</th>
			 				<th>Nama</th>
			 				<th>Bus</th>
			 				<th>Tanggal Berangkat</th>
			 				<th>Tanggal Pulang</th>
			 				<th>Berangkat dari</th>
			 				<th>Tujuan</th>
			 				<th>Jumlah Bus</th>
			 				<th>Harga</th>
			 				<th>Total</th>
			 				<th>DP</th>
			 				<th>Status</th>
			 				<th>Tanggal</th>
		 				</tr>
		 			</thead>
		 			<tbody>
		 				<?php
		 				if(count($data) > 0){

			 				foreach ($data as $key => $value) {
			 					
			 					echo '<tr>
			 						<td>'.($key+1).'</td>
			 						<td>'.$value->iduser.'</td>
			 						<td>'.$value->idbus.'</td>
			 						<td>'.$value->tgl_b.'</td>
			 						<td>'.$value->tgl_p.'</td>
			 						<td>'.$value->berangkatdari.'</td>
			 						<td>'.$value->tujuan.'</td>
			 						<td>'.$value->jumbus.'</td>
			 						<td>Rp. '.number_format($value->tarif,2).'</td>
			 						<td>Rp. '.number_format($value->total,2).'</td>
			 						<td>Rp. '.number_format($value->DP,2).'</td>
			 						<td>'.$value->status.'</td>
			 						<td>'.$value->tgl_expied.'</td>
			 					</tr>';

			 				}
		 				}
		 				?>
		 			</tbody>
		 			<tfoot>
		 				<tr>
		 					<td>No</td>
			 				<td>Nama</td>
			 				<td>Bus</td>
			 				<td>Tanggal Berangkat</td>
			 				<td>Tanggal Pulang</td>
			 				<td>Berangkat dari</td>
			 				<td>Tujuan</td>
			 				<td>Jumlah Bus</td>
			 				<td>Harga</td>
			 				<td>Total</td>
			 				<td>DP</td>
			 				<td>Status</td>
			 				<td>Tanggal</td>
		 				</tr>
		 			</tfoot>
		 		</table>

		 	</div>
		 </div>
	</div>
</div>

<script type="text/javascript">
	 $('#tbl1').DataTable({
            "columnDefs": [{ 
                "targets": [ -1 ],
                "orderable": false,
            }]
        });

       
</script>