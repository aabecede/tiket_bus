<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
    
     <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
     <!-- -->
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
<section class="main-section"><!--main-section-start-->
    <div class="container">
      <a href="<?php echo base_url('');?>" class="btn btn-info">Pesan Tiket Bus</a>
      <div class="row">

       <?php
       #var_dump($bus);
       foreach ($bus as $key => $value) {
        ?>
        
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img src="<?php echo base_url('assets/img/Bus/'.$value->gambar);?>" style="width: 250px;height: 250px;">
          <div class="caption" align="center">
            
            <form action="#" method="POST" enctype="multipart/form-data">
              
              <input type="hidden" name="id" value="<?php echo $value->idbus;?>">
              <?php
              if($value->sttb == null or $value->sttb == 0){
                echo '<button title="Pesan" disabled class="btn btn-primary">Tersedia</button>';
              }elseif($value->sttb == 1){
                echo '<button disabled value="Booking" title="TerBooking" class="btn btn-warning">Booking</button>';
              }else{
                echo '<input type="button" disabled value="Dipesan" title="TerPakai" class="btn btn-danger">';
              }
              ?>
              <a href="#" data-target="#modalbus" data-toggle="modal" class="btn btn-info" id="custIdnegara" data-id="<?php echo $value->idbus;?>" title="<?php echo $value->bus;?>">Detail Bus</a>
            </form>
            
          </div>
        </div>
      </div>
    
        <?php
       }
       ?>
      </div><!-- end row -->
       <!-- datatables
       <div class="panel panel-default">
          <div class="panle-body">
            <h3>Tujuan BUS</h3>
            data table
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
                                                          <div class="col-md-6">
                                                            <form action="" method="post" enctype="multipart/form-data">
                                                            <input type="hidden" name="id" value="<?=$value->idjwd?>">
                                                            <input type="hidden" name="db" value="jdw_pariwisata">
                                                            <button href="" class="btn btn-warning btn-xs" title="Edit"><b class="glyphicon glyphicon-edit"></b></button>
                                                          </form>
                                                          </div>
                                                          
                                                           <a href="" class="btn btn-danger btn-xs" title="Hapus"><b class="glyphicon glyphicon-trash"></b></a>
                                                            <a href="#" class="btn btn-primary btn-xs" title="Edit"><b class="glyphicon glyphicon-edit">
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
            end datatable
            <h3>Paket Wisata</h3>
            data table
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
                                                              
                                                              <button href="" class="btn btn-success btn-xs" title="Pesan"><b>Pesan</b></button>
                                                            </form>
                                                          </div>
                                                          
                                                           <a href="" class="btn btn-danger btn-xs" title="Hapus"><b class="glyphicon glyphicon-trash"></b></a>
                                                            <a href="#" class="btn btn-primary btn-xs" title="Edit"><b class="glyphicon glyphicon-edit">
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
            end data table
                      </div>
                   </div>
                   end datatables
       
            </div>end panel body
          </div>end panel -->
    </div> <!-- end container -->
</section><!-- section -->
<script type="text/javascript">
  $('#tbl1').DataTable({
            "columnDefs": [{ 
                "targets": [ -1 ],
                "orderable": false,
            }]
        });
  $(document).ready(function(){
        $('#modalbus').on('show.bs.modal', function(e){
            var  rowid = $(e.relatedTarget).data('id');
            //ambil data
            $.ajax({
                type : 'post',
                url : '<?php echo base_url('index.php/welcome/get_bus');?>',
                data : 'rowid=' + rowid,
                success : function(data){
                    $('.fetched-data').html(data);//tampil data di modal.
                }

            });
        });
    });
</script>
