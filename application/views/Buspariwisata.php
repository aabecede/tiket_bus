<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
    
     <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
     <!-- -->
<section class="main-section"><!--main-section-start-->
    <div class="container">
       
       <!-- datatables -->
       <div class="panel panel-default">
       		<div class="panle-body">
       			<h3>Bus Pariwisata Wisata</h3>
       			<!-- data table #2-->
       			<table id="tbl1" class="table table-striped table-bordered " cellspacing="0" width="100%">
						                    <thead>
						                        <tr>
						                            <th>No</th>
						                            <th>Tujuan</th>
						                            <th>Durasi</th>
						                            <th>Harga</th>
						                            <th>Sheet</th>
						                            <th>Jumlah Sheet</th>
						                            <th>Aksi</th>
						                        </tr>
						                    </thead>
						                    <tbody>
						                        <?php 
						                        $no = 1;
						                        foreach ($tabel3 as $key => $value) { ?>
						                            <tr>
						                                <td><?php echo $no ?></td>
						                                <td><?php echo $value->tujuan ?></td>
						                                <td><?php echo $value->durasi ?></td>
						                                <td><?php echo 'Rp.'.number_format($value->harga),',',0?></td>
						                                <td><?php echo $value->jenis?></td>
						                                <td><?=$value->jumlah;?></td>
						                                
						                                <td class="text-right">
						                                	<div class="col-md-6">
						                                		<form action="<?=base_url('m/n_pesan');?>" method="post" enctype="multipart/form-data">
							                                		<input type="hidden" name="id" value="<?=$value->idjwd?>">
							                                		
							                                		<button href="" class="btn btn-success btn-xs" title="Edit"><b>Pesan</b></button>
						                                		</form>
						                                	</div>
						                                	<!-- <div class="col-md-6">
						                                		<form action="" method="post" enctype="multipart/form-data">
						                                		<input type="hidden" name="id" value="<?=$value->idjwd?>">
						                                		<input type="hidden" name="db" value="jdw_pariwisata">
						                                		<button href="" class="btn btn-warning btn-xs" title="Edit"><b class="glyphicon glyphicon-edit"></b></button>
						                                	</form> -->
						                                	</div>
						                                	
						                                   <!--  <a href="" class="btn btn-danger btn-xs" title="Hapus"><b class="glyphicon glyphicon-trash"></b></a> -->
						                                    <!-- <a href="#" class="btn btn-primary btn-xs" title="Edit"><b class="glyphicon glyphicon-edit"> -->
						                                </td>
						                            </tr>
						                        <?php 
						                        $no++;
						                    } ?>
						                    </tbody>
						                    <tfoot>
						                        <tr>
						                            <td>No</td>
						                            <td>Tujuan</td>
						                            <td>DUrasi</td>
						                            <td>Harga</td>
						                            <td>Sheet</td>
						                            <td>Jumlah Sheet</td>
						                            <td>Aksi</td>
						                        </tr>
						                    </tfoot>
						                </table>
       			<!-- end data table -->
       			<h3>Paket Wisata</h3>
       			<!-- data table #2-->
       			<table id="tbl2" class="table table-striped table-bordered " cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No</th>
						    <th>Tujuan</th>
						    <th>Durasi</th>
						    <th>Harga</th>
						    <th>Sheet</th>
						    <th>Jumlah Sheet</th>
						    <th>Aksi</th>
						</tr>
							</thead>
						    	<tbody>
						        	<?php 
						            	$no = 1;
						                        foreach ($tabel1 as $key => $value) { ?>
						                            <tr>
						                                <td><?php echo $no ?></td>
						                                <td><?php echo $value->tujuan ?></td>
						                                <td><?php echo $value->durasi ?></td>
						                                <td><?php echo 'Rp.'.number_format($value->harga),',',0?></td>
						                                <td><?php echo $value->jenis?></td>
						                                <td><?=$value->jumlah;?></td>
						                                
						                                <td class="text-right">
						                                	
						                                	<div class="col-md-6">
						                                		<form action="<?=base_url('m/p_pesan');?>" method="post" enctype="multipart/form-data">
							                                		<input type="hidden" name="id" value="<?=$value->idpaket?>">
							                                		
							                                		<button href="" class="btn btn-success btn-xs" title="Edit"><b>Pesan</b></button>
						                                		</form>
						                                	</div>
						                                	
						                                   <!--  <a href="" class="btn btn-danger btn-xs" title="Hapus"><b class="glyphicon glyphicon-trash"></b></a> -->
						                                    <!-- <a href="#" class="btn btn-primary btn-xs" title="Edit"><b class="glyphicon glyphicon-edit"> -->
						                                </td>
						                            </tr>
						                        <?php 
						                        $no++;
						                    } ?>
						                    </tbody>
						                    <tfoot>
						                        <tr>
						                            <td>No</td>
						                            <td>Tujuan</td>
						                            <td>DUrasi</td>
						                            <td>Harga</td>
						                            <td>Sheet</td>
						                            <td>Jumlah Sheet</td>
						                            <td>Aksi</td>
						                        </tr>
						                    </tfoot>
						                </table>
       			<!-- end data table -->
       		</div>
       </div>
       
    </div>
</section>
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