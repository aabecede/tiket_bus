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
			<h2 align="center">Laporan Tiket</h2>
			<?='<p>'.@$alert.'</p>';?>
		</div>
		<div class="col-md-12">
	     	<form action="<?php echo base_url('admin/laporan_tiket');?>" method="post" enctype="multipart/form-data">
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

		 		<h3>Laporan Tiket dari Tanggal <?php echo @$tgl_awal;?> sampai Tanggal <?php echo @$tgl_akhir;?></h3>

		 		<a href="<?php echo base_url('admin/cetak_laporan/laporan_tiket/'.$tgl_awal.'/'.$tgl_akhir);?>" target="_blank" class="btn btn-success">Cetak Laporan</a>

		 		<table id="tbl1" class="table table-striped table-bordered " cellspacing="0" width="100%">
		 			<thead>
		 				<tr>
			 				<th>No</th>
			 				<th>Bus</th>
			 				<th>User</th>
			 				<th>Jadwal</th>
			 				<th>Jumlah Tiket</th>
			 				<th>Kursi</th>
			 				<th>Status</th>
			 				<th>Harga</th>
			 				<th>Total</th>
			 				<th>Tanggal Pemesanan</th>
		 				</tr>
		 			</thead>
		 			<tbody>
		 				<?php
		 				foreach ($data as $key => $value) {
		 					
		 					echo '<tr>
		 						<td>'.($key+1).'</td>
		 						<td>'.$value->idbus.'</td>
		 						<td>'.$value->iduser.'</td>
		 						<td>'.$value->idjadwal.'</td>
		 						<td>'.$value->jumlahtiket.'</td>
		 						<td>'.$value->kursitiket.'</td>
		 						<td>'.$value->status.'</td>
		 						<td>Rp '.number_format($value->harga,2).'</td>
		 						<td>Rp. '.number_format($value->total,2).'</td>
		 						<td>'.$value->tgl_expired.'</td>
		 					</tr>';

		 				}
		 				?>
		 			</tbody>
		 			<tfoot>
		 				<tr>
		 					<td>No</td>
			 				<td>Bus</td>
			 				<td>User</td>
			 				<td>Jadwal</td>
			 				<td>Jumlah Tiket</td>
			 				<td>Kursi</td>
			 				<td>Status</td>
			 				<td>Harga</td>
			 				<td>Total</th>
			 				<td>Tanggal Pemesanan</td>
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

        $('#tbl2').DataTable({
            "columnDefs": [{ 
                "targets": [ -1 ],
                "orderable": false,
            }]
        });
</script>