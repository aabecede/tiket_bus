<script>
    alert("Silahkan Lakukan Pembayaran");
</script>
<?php
$now = date('Y-m-d');
$waktu = $this->db->query("SELECT ADDDATE(now(), INTERVAL 12 HOUR) as waktu")->row();
?>
<section class="main-section"><!--main-section-start-->
    <div class="container">
       <h3></h3>
       <!-- datatables -->
           <div class="panel panel-default">
                <div class="panel-body">
                    <h3 align="center">PEMESANAN TIKET</h3>
                </div>
                <div class="panel-footer">
                   
                      <table class="table table-responsive">
                        <thead>
                          <th>Titik Berangkat</th>
                          <th>Kota Tujuan</th>
                          <th>Jam Keberangkatan</th>
                          <th>Harga</th>
                          <th>Jumlah Tiket</th>
                          <th>Total Bayar</th>
                        </thead>
                        <tbody>
                          <tr>
                            <td><?=$from?></td>
                            <td><?=$to?></td>
                            <td><?=$jam.' WIB'?></td>
                            <td><?='Rp '.number_format($harga),',',0;?></td>
                            <td><?=count($kursi);?></td>
                            <td><?php
                            $total = $harga * count($kursi);
                            echo 'Rp'.number_format($total),',',0
                            ?></td>
                          </tr>
                        </tbody>
                      </table>
                    <table class="table table-responsive">                  
                      <tr>
                        <td>Kode Transaksi</td>
                        <td><input type="text" disabled="" name="id" value="Automatis"></td>
                      </tr>
                      <tr>
                        <td>Silahkan transaksi ke</td>
                        <td><p>
                          No Rekening : 192361235125<br>
                          AN           : Apemo
                        </p></td>
<input type="hidden" value="192361235125" name="norek">
                      </tr>
                      <tr>
                        <td>Nama</td>
                        <td><input type="text" name="nama" class="form-control"></td>
                      </tr>
                      
                      <tr>
                          <td></td>
                          <td><input type="submit" value="Pesan" class="btn btn-success" name=""></td>
                      </tr>
                    </table>
                </div>
            </div>
            <!-- end datatables -->
    </div>
</section>
<script>
  function PreviewImage(){
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
    oFReader.onload = function(oFREvent){
      document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
  };
  
</script>