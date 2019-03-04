<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
    
     <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">

<section class="main-section">
	<div class="container">
		<h3>List Pemesana Tiket Bus</h3>
		<div class="panel panel-default">
			<div class="panel-body">
				 <table id="tbl1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      	<tr>
                        	<th>No</th>
                            <th>Nama Pemesan</th>
                            <th>Nama Bus</th>
                            <th>Tujuan</th>
                            <th>Berangkat Hari / Jam</th>
                            <th>Jumlah Kursi</th>
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
                                	<td><?php echo $nama;?></td>
                                    <td><?php echo $value->bus;?></td>
                                    <td><?php echo $value->naju;?></td>
                                    <td><?php echo $value->namahari.' / '. $value->jamberangkat;?></td>
                                    <td><?php echo $value->juket.'<br>'.$value->kursitiket;?></td>
                                    <td><?php echo $value->tgl_expired?></td>
                                    <td><img src="<?php echo @base_url('assets/img/bukti/'.$value->bukti);?>"></td>
                                  
                                    <td>
                                    	<?php
                                        $date = date('Y-m-d H:m:s');
                                         
                                        if($value->natus == '0' or $value->natus == ''){
                                            
                                            echo '<a href="'.base_url('member/updatepemesanantiket/'.$value->idtiket).'"class="btn btn-info">Upload Bukti</a>';

                                        }elseif($value->natus == "Setujui"){

                                            echo '<p style="color:Green" align="Center">'.$value->natus.'</p>';
                                            echo '<a href="'.base_url('member/print_tiket/'.$value->idtiket).'" class="btn btn-info" target="_blank">Print</a>';

                                        }elseif ($value->natus == "Tolak") {
                                            
                                            echo '<p style="color:Red" align="center">'.$value->natus.'</p>';
                                            echo '<a href="'.base_url('member/updatepemesanantiket/'.$value->idtiket).'"class="btn btn-info">Upload Bukti</a>';

                                        }else{

                                            echo '<p style="color:orange" align="center">'.$value->natus.'</p>';

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
                                    <td>Nama Bus</td>
                                    <td>Tujuan</td>
                                    <td>Berangkat Hari / Jam</td>
                                    <td>Jumlah Kursi</td>
                                    <td>Tanggaal Akhir upload</td>
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