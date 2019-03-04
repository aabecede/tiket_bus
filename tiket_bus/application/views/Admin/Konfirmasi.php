<?php
//update bus
#var_dump($cektgl);
$date = date('Y-m-d');
foreach ($cektgl as $key => $value) {
  #echo $value->idbus.'<br>';
  $singlebus = explode(',', $value->idbus);
  $no = 0;
  if($date > $value->tgl_p)
  {
    foreach ($singlebus as $key => $value) {
      $idbus = $singlebus[$no];
      #echo $idbus.'<br>';
      $ubah = $this->db->query('update bus set sttb="0" where id = ?',array($idbus));
      $no++;
    }
  }
    
}
?>
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
			<h2 align="center">Konfirmasi Pemesanan</h2>
			<?='<p>'.@$alert.'</p>';?>
		</div>
		<!-- start tabs -->
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body tabs">
					<ul class="nav nav-tabs">
						<!-- <li class="active"><a href="#tab1" data-toggle="tab">Pemesanan Pariwisata Non - Paket</a></li> -->
						<li class="active"><a href="#tab1" data-toggle="tab">Pemesanan Pariwisata</a></li>
						<li><a href="#tab2" data-toggle="tab">Pemesanan Tiket</a></li>
					</ul>
					<div class="tab-content">
						<!-- start tab 1 -->
						<div class="tab-pane fade in active" id="tab1">
								<div class="panel panel-default">
									
						            <div class="panel-body">
									<h3>Pemesanan Pariwisata</h3>
						                <table id="tbl1" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
						                    <thead>
						                        <tr>
						                            <th>No</th>
						                            <th>Pemesan</th>
						                           	<th>Tanggal Berangkat / Tanggal Pulang</th>
						                            <th>Tujuan</th>
													<th>Jumlah Bus</th>
													<th>Bukti Transfer</th>
													<th>Status</th>
						                            <th>Aksi</th>
						                        </tr>
						                    </thead>
						                    <tbody>
						                        <?php 
						                        $no = 1;
						                        if(count($query) > 0)
						                        {


						                        foreach ($query as $key => $value) { ?>
						                            <tr>
						                                <td><?php echo $no ?></td>
						                                <td><?php echo $value->nalog.'<br>'.$value->no_hp.'<br>'.$value->alamat; ?></td>
						                                <td><?php echo $value->tgl_b.'<br>'.$value->tgl_p;?></td>
						                                <td><?php echo $value->naju;?></td>
						                                <td><?php echo $value->jumbus;?></td>
						                                <td><img src="<?php echo base_url('assets/img/bukti/'.$value->bukti_tf);?>" id='uploadPreview' class="form-control" style='width: 150px; height:150px;'/></td>
						                                <td>
						                                	<?php
						                                	if($value->stt == 'Tunggu Konfirmasi'){
						                                		echo '<p style="color:orange;">Pending</p>';
						                                	}elseif ($value->stt == "SETUJU") {
						                                		echo '<p style="color:green;">Diterima</p>';
						                                	}else{
						                                		echo '<p style="color:red;">Ditolak</p>';
						                                	}
						                                	?>
						                                		
						                                	</td>
						                                <td class="text-right">
						                                	<?php
						                                	if($tgl_now->now > $value->tgl_expied){

						                                		echo '-';

						                                	}elseif($value->stt == 1){
						                                		?>
						                                		
						                                		<form action="<?php echo base_url('admin/tolak');?>" method="post" enctype="multipart">
						                                			<input type="hidden" name="id" value="<?php echo $value->idpp;?>">
						                                			<button class="btn btn-warning glyphicon glyphicon-remove"></button>
						                                		</form>
						                                		<?php
						                                	}else{
						                                		?>
						                                		<form action="<?php echo base_url('admin/setujui');?>" method="post" enctype="multipart">
						                                			<input type="hidden" name="id" value="<?php echo $value->idpp;?>">
						                                			
						                                			<button class="btn btn-success glyphicon glyphicon-ok"></button>
						                                		</form>
						                                		<form action="<?php echo base_url('admin/tolak');?>" method="post" enctype="multipart">
						                                			<input type="hidden" name="id" value="<?php echo $value->idpp;?>">
						                                			<button class="btn btn-warning glyphicon glyphicon-remove"></button>
						                                		</form>
						                                		<?php

						                                	}
						                                	?>
						                                	
						                                   
						                                </td>
						                            </tr>
						                        <?php 
						                        $no++;
						                    }
						                    }else{
						                    	echo 'Tidak ada data';
						                    } ?>
						                    </tbody>
						                    <tfoot>
						                        <tr>
						                            <td>No</td>
						                            <td>Pemesanan</td>
						                            <td>BUS</td>
						                            <td>Tanggal Berangkat / Tanggal Pulang</td>
						                            <td>Nomor HP</td>
						                            <td>Nomor Rekening</td>
						                            <td>Status</td>
						                            <td>Berangkat dari</td>
						                            
						                        </tr>
						                    </tfoot>
						                </table>

						        	</div>
								</div>
						</div>	<!-- end tab 1-->
						<!-- start tab 2 -->
						<div class="tab-pane fade" id="tab2">
								<div class="panel panel-default">
									
									<div class="panel-body">
										
						                <table id="tbl2" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
						                    <thead>
						                        <tr>
						                            <th>No</th>
						                            <th>Pemesan</th>
						                            <th>Detail Bus</th>
						                            <th>Jumlah Tiket</th>
						                            <th>Nomor Tiket Bus</th>
						                            <th>Harga Satuan | Total</th>
						                            <th>Bukti Pembayaran</th>
						                            <th>Status</th>
						                            <th>Aksi</th>
						                        </tr>
						                    </thead>
						                    <tbody>
						                       <?php
						                       foreach ($tabel2 as $key => $value) {
						                       	
						                       	echo '<tr>
						                       			<td>'.($key+1).'</td>
						                       			<td>'.$value->nama_user.'</td>
						                       			<td>'.$value->namabus.'<br>'
						                       			.$value->namatujuan.'<br>
						                       			'.$value->jamberangkat.'<br>
						                       			'.$value->namahari.'</td>
						                       			<td>'.$value->jumtiket.'</td>
						                       			<td>'.$value->kursitiket.'</td>
						                       			<td> Rp. '.number_format($value->harga,2).' | Rp. '.number_format($value->total,2).'<?td>
						                       			<td><img src="'.base_url('assets/img/bukti/'.$value->bukti).'" id="uploadPreview" class="form-control" style="width: 150px; height:150px;"/></td><td>';
						                       			// if($value->namastat == '' or $value->namastat == 0){

						                       			// 	echo '<p style="color:orange;">'.$value->namastat.'</p>';

						                       			// }elseif ($value->namastat == 'Setujui') {
						                       				
							                       		// 	echo '<p style="color:green;">'.$value->namastat.'</p>';	

						                       			// }else{

						                       			// 	echo '<p style="color:red;">'.$value->namastat.'</p>';

						                       			// }

						                       	echo ''.$value->namastat.'</td><td> <a href="'.base_url('admin/agree/'.$value->idpesan.'/Setujui/pemesanan_tiket').'" class="btn btn-success btn-xs" title="Agree"><b class="glyphicon glyphicon-ok"></b></a>
						                                    <a href="'.base_url('admin/disband/'.$value->idpesan.'/Tolak/pemesanan_tiket').'" class="btn btn-danger btn-xs" title="Tolak"><b class="glyphicon glyphicon-remove"></td>
						                       		</tr>';

						                       }
						                       ?>
						                    </tbody>
						                    <tfoot>
						                        <tr>
						                            <td>No</td>
						                            <td>Pemesanan</td>
						                            <td>Detail Bus</td>
						                            <td>Jumlah Tiket</td>
						                            <td>Nomor Tiket Bus</td>
						                            <td>Bukti Pembayaran</td>
						                            <td>Status</td>
						                            <td>Aksi</td>
						                        </tr>
						                    </tfoot>
						                </table>
									</div>
								</div>

								
								
							</div><!-- end tab 2 -->
					</div><!-- tab content-->
				</div><!-- body tabs -->
			</div><!-- panel panel default -->
		</div><!-- col-md-12-->
		<!-- end tabs -->
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