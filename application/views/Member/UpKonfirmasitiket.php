<section class="main-section">
    <div class="panel-body">
        <div class="container">
            <div class="col-md-3 col-lg-3 col-sm-3">
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6">
            <table class="table table-responsive">
                <tr>
                    <td>Nama</td>
                    <td><?php echo $log->nama;?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><?php echo $log->alamat;?></td>
                </tr>
                <tr>
                    <td>Bus</td>
                    <td><?php echo $tiket->bus;?></td>
                </tr>
                <tr>
                    <td>Tujuan</td>
                    <td>
                        <?php echo $tiket->naju ;?>
                    </td>
                </tr>
                <tr>
                    <td>Berangkat Hari / Jam</td>
                    <td><?php echo $tiket->hari.' / '.$tiket->berangkat;?></td>
                </tr>
                <tr>
                    <td>Jumlah Tiket</td>
                    <td><?php echo $tiket->juket;?></td>
                </tr>
                <tr>
                    <td>Harga Tiket</td>
                    <td><?php echo number_format($tiket->harga);?></td>
                </tr>
                <tr>
                    <td>Total Bayar</td>
                    <td><?php echo number_format($tiket->total);?></td>
                </tr>
                <tr>
                    <td>Batas Akhir Pembayaran</td>
                    <td><?php echo $tiket->tgl_expired;?></td>
                </tr>
                <form action="<?php echo base_url('member/up_tiket/'.$tiket->idtiket);?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $tiket->idtiket;?>">
                <tr>
                    <td>Bukti Pembayaran</td>
                                    <td><div class="col-md-6">
                                        <img src="#" id='uploadPreview' class="form-control" style='width: 150px; height:150px;'/>
                                        <input id='uploadImage' type="file"  required="" name="bukti" onchange='PreviewImage();'>
                                                    <?php
                                                    if($tiket->natus == 0){
                                                      echo '<div class="alert alert-warning" role="alert">
                                  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                  <span class="sr-only">Error:</span>
                                  Lakukan Pembayaran
                                </div>';
                                                    }elseif ($pemesanan->natus == 1) {
                                                      echo '<div class="alert alert-success" role="alert">
                                  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                  <span class="sr-only">Error:</span>
                                  Sudah Melakukan Pembayaran
                                </div>';
                                                    }else{
                                                      echo '<div class="alert alert-danger" role="alert">
                                  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                  <span class="sr-only">Error:</span>
                                  Bukti Pembayaran di tolak
                                </div>';
                                                    }
                                                    ?>
                                        <!--<h6><p style="color:red">File berupa jpg, jika tidak tidak keluar</p></h6>-->
                                    </div>
                                    </td>
                    <!-- bukti trnasfer ends -->
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Upload Bukti" class="btn btn-success"></td>
                </tr>
                </form>
            </table>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    function PreviewImage() {
var oFReader = new FileReader();
oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
oFReader.onload = function (oFREvent)
 {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
 };
</script>