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
                                                        <td><?php echo $value->jumlahtiket;?></td>
                                                        <td>
                                                            <?php
                                                            #$date = $this->db->query('SELECT now() - INTERVAL "3" Day as rentang')->row();
                                                            $date = date('Y-m-d');
                                                           // baru dimatikan $hasil = date_diff(date_create($date),date_create($get->mulai));
                                                            #$hasilexplode = explode('-', $date);
                                                            // $jarakhari = $hasil->d - 3;
                                                            // $hasilexplode2 = explode(('-'), $get->mulai);
                                                            // $data[] = $hasilexplode2[0];
                                                            // $data[] = $hasilexplode2[1];
                                                            // $data[] = ($hasilexplode2[2] - 3);

                                                            // $result = implode('-', $data);
                                                            // if($date >= $result and $date <= $get->akhir){
                                                            //     echo '<a href="'.base_url('member/pemesanantiket/'.$value->idd).'" class="btn btn-success">Pesan Tiket</a>';
                                                            // }else{
                                                            //     echo $jarakhari.' Hari Lagi Untuk melakukan Pemesanan';
                                                            // }

                                                            echo '<a href="'.base_url('member/pemesanantiket/'.$value->idd).'" class="btn btn-success">Pesan Tiket</a>';

                                                            #var_dump($hasilexplode2);
                                                            #$jarakhari = $hasil->d - 3;
                                                            /*if($hasil->d <= 3){
                                                                echo '<a href="'.base_url('#').'" class="btn btn-success">Pesan Tiket</a>';
                                                            }else{
                                                                echo $jarakhari.' Hari Lagi Untuk melakukan Pemesanan';
                                                            }*/
                                                           /*if($date->rentang == $get->mulai and $date->rentang <= $get->akhir){
                                                            echo 'Muncul';
                                                           }else{
                                                            echo 'Gak Muncul';
                                                            #var_dump($date);
                                                           }*/
                                                            ?>
                                                        </td>
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