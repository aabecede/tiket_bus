<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
    
     <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">

<section class="main-section">
	<div class="container">
		<h3>List Pemesana Bus Pariwisata</h3>
		<div class="panel panel-default">
			<div class="panel-body">
				 <table id="tbl1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      	<tr>
                        	<th>No</th>
                            <th>Nama Pemesan</th>
                            <th>Tujuan</th>
                            <th>Tanggal Berangkat</th>
                            <th>Tanggal Pulang</th>
                            <th>Jumlah Kursi</th>
                            <th>Jumlah Bus</th>
                            <th>Tanggaal Akhir upload</th>
                            <th>Bukti Transfer</th>
                            <th>Status</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
					<tbody>
                    	<?php 
                        	$no = 1;
                            	foreach ($tabel1 as $key => $value) { ?>
                                <tr>
                                   	<td><?php echo $no ?></td>
                                	<td><?php echo $value->nalog;?></td>
                                    <td><?php echo $value->tujuan;?></td>
                                    <td><?php echo $value->tgl_b;?></td>
                                    <td><?php echo $value->tgl_p;?></td>
                                    <td><?php echo $value->jumlah?></td>
                                    <td><?php echo $value->jumbus?>
                                    	<a href="#" class="btn btn-success" data-toggle="modal" data-target="#modalbus" data-id="<?php echo $value->idpp;?>">Detail Bus</a></td>
                                    <td><?php echo $value->tgl_expied;?></td>
                                  
                                    <td>
                                    	<img src="<?php echo base_url('assets/img/bukti/'.$value->bukti_tf);?>">
                                    </td>
                                    <td>
                                    	<?php



                                    		$now = date('Y-m-d H:m:s');
	                                    	if($value->status == 'DI TOLAK'){
	                                    		if($now >= $value->tgl_expied){
	                                    			echo '<p style="color:red">EXPIED</p>';
	                                    			$singlebus = explode(',', $value->idbus);
	                                    			#var_dump($idbus);
	                                    			$no = 0;
	                                    			foreach ($singlebus as $key => $value) {
	                                    				$idbus = $singlebus[$no];
	                                    				$ubahstatusbus = $this->db->query('update bus set sttb ="0" where id = ?',array($idbus));
														$no++;
	                                    			}
	                                    		}else{
	                                    		echo '<a href="'.base_url('member/uppariwisata/'.$value->idpp).'" class="btn btn-danger">Upload Ulang</a>';
	                                    		}
	                                    	}elseif($value->status == '' or $value->status=='null'){
	                                    		if($now >= $value->tgl_expied){
	                                    			echo '<p style="color:red">EXPIED</p>';
	                                    			$singlebus = explode(',', $value->idbus);
	                                    			#var_dump($idbus);
	                                    			$no = 0;
	                                    			foreach ($singlebus as $key => $value) {
	                                    				$idbus = $singlebus[$no];
	                                    				$ubahstatusbus = $this->db->query('update bus set sttb ="0" where id = ?',array($idbus));
														$no++;
	                                    			}
	                                    		}else{
	                                    			echo '<a href="'.base_url('member/uppariwisata/'.$value->idpp).'" class="btn btn-danger">Silahkan Upload Bukti Pembayaran</a>';


	                                    		}
	                                    		
	                                    	}elseif($value->status == 'SETUJU'){
	                                    		echo $value->status;
	                                    		echo '<a href="'.base_url('member/print_pariwisata/'.$value->idpp).'" target="_blank" class="btn btn-success">Print</a>';
	                                    	}elseif ($value->status == 'Tunggu Konfirmasi') {
                                                echo $value->status;
                                            }else{
                                                $value->status;
                                            }
                                    	?>
									</td>
                                    <!-- <td><a href="#">Lihat Detail</a></td> -->
                                </tr>
                                     <?php 
                                	$no++;
                                	} ?>
                  	</tbody>
                    <tfoot>
                                <tr>
                                	<td>No</td>
                                    <td>Nama Pemesan</td>
                                    <td>Sopir</td>
                                    <td>Tanggal Berangkat</td>
                                    <td>Tanggal Pulang</td>
                                    <td>Jumlah Kursi</td>
                                    <td>Jumlah Bus</td>
                                    <td>Tanggal Akhir upload Bukti</td>
                                    
                                    <td>Bukti Transfer</td>
                                    <td>Status</td>
                                    <!-- <td>Aksi</td> -->
                                </tr>
                    </tfoot>
                </table>
			</div>
		</div>
	</div>
</section>


<!-- start modal-->
     <div class="modal fade bs-example-modal-lg" id="modalbus" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
     <!-- end modal-->



 <script type="text/javascript">
    // DataTable------------------------------------------------------------------------------------------
        $('#tbl1').DataTable({
            "columnDefs": [{ 
                "targets": [ -1 ],
                "orderable": false,
            }]
        });

        $(document).ready(function(){
        $('#modalbus').on('show.bs.modal', function(e){
            var  rowid = $(e.relatedTarget).data('id');
           // var expied = $(e.relatedTarget).data('expied');
            //ambil data
            $.ajax({
                type : 'post',
                url : '<?php echo base_url('Member/get_bus_pesan');?>',
                data : 'rowid=' + rowid ,
                success : function(data){
                    $('.fetched-data').html(data);//tampil data di modal.
                }

            });
        });
    });
</script>