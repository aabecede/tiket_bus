<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
    
     <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
<section class="main-section"><!--main-section-start-->
    <div class="container">
       <h3>Jadwal Keberangkatan</h3>
       <!-- datatables -->
           <div class="panel panel-default">
                <div class="panel-body">
                     <table id="tbl1" class="table table-striped table-bordered " cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>BUS</th>
                                                    <th>Sopir</th>
                                                    <th>Dari</th>
                                                    <th>Tujuan</th>
                                                    <th>Berangkat</th>
                                                    <th>Hari</th>
                                                    <th>Harga</th>
                                                    <th>Jumlah Tiket</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $no = 1;
                                                foreach ($bus as $key => $value) { ?>
                                                    <tr>
                                                        <td><?php echo $no ?></td>
                                                        <td><?php echo $value->bus ?></td>
                                                        <td><?php echo $value->napir ?></td>
                                                        <td><?php echo $value->dari?></td>
                                                        <td><?php echo $value->naju?></td>
                                                        <td><?php echo $value->jamberangkat.' WIB'?></td>
                                                        <td><?php echo $value->_nHari?></td>
                                                        <td><?='Rp '.number_format($value->harga),',',0?></td>
                                                        <?php

                                                        if(@$sisa_tiket[$value->idd][$value->idj] > 0){
                                                            
                                                            echo '<td>'.$sisa_tiket[$value->idd][$value->idj].'</td>';

                                                            if(@$sisa_tiket[$value->idd][$value->idj] <= 0){

                                                                echo '<td><a href="'.base_url('member/pemesanantiket/'.$value->idd).'/'.$value->idj.'" class="btn btn-success" disabled>Pesan Tiket</a></td>';

                                                            }else{
                                                                 echo '<td><a href="'.base_url('member/pemesanantiket/'.$value->idd).'/'.$value->idj.'" class="btn btn-success">Pesan Tiket</a></td>';
                                                            }

                                                        }else{

                                                            echo '<td>'.$value->jumlahtiket.'</td>';
                                                             echo '<td><a href="'.base_url('member/pemesanantiket/'.$value->idd).'/'.$value->idj.'" class="btn btn-success">Pesan Tiket</a></td>';


                                                        }

                                                        ?>
                                                       

                                                           
                                                        
                                                    </tr>
                                                <?php 
                                                $no++;
                                            } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td>No</td>
                                                    <td>BUS</td>
                                                    <td>Sopir</td>
                                                    <td>Dari</td>
                                                    <td>Tujuan</td>
                                                    <td>Berangkat</td>
                                                    <td>Sampai</td>
                                                    <td>Harga</td>
                                                    <td>Jumlah Tiket</td>
                                                    <td>Aksi</td>
                                                </tr>
                                            </tfoot>
                                        </table>

                </div>
                <!-- <h5 style="color:red">pemesanan hanya bisa dilakukan dihari H - 3 hari dari Tanggal <?php echo $get->mulai;?> sampai tanggal <?php echo $get->akhir;?></h5> -->
            </div>
            <!-- end datatables -->

    </div>
</section>

 <script type="text/javascript">
    // DataTable------------------------------------------------------------------------------------------
        $('#tbl1').DataTable({
            "columnDefs": [{ 
                "targets": [ -1 ],
                "orderable": false,
            }]
        });

</script>