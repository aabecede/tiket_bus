
<section class="main-section"><!--main-section-start-->
    <div class="container">
       <h3>Cari Tiket</h3>
       <!-- datatables -->
           <div class="panel panel-default">
                <div class="panel-body">
                    <h3>PEMESANAN TIKET</h3>
                   <div class="col-lg-6 col-md-6">
                        <table class="table table-responsive">
                            <thead id="th">
                                <th>Titik Berangkat</th>
                                <th>Kota Tujuan</th>
                                <th>Jam Berangkat</th>
                                <th>Harga</th>
                                <th>Tiket Tersedia</th>
                            </thead>
                            <tbody id="tb">
                                <tr>
                                    <td><?=$from;?></td>
                                    <td><?=$to;?></td>
                                    <td><?=$jam;?></td>
                                    <td><?=$harga;?></td>
                                    <td><?=$jum;?></td>
                                </tr>
                            </tbody>
                        </table>
                   </div>
                   <?php
                   #$query = $this->db->query('select * from sheet');
                   ?>
<style type="text/css">

</style>
                   <div class="col-lg-6 col-md-6">
                        <form action="<?=base_url('trans');?>" method="post" enctype="multipart/form-data">
                            <table class="table table-responsive">
                                <tr align="center">
                                    <td colspan="2">Pintu</td>
                                    <td colspan="1">CC</td>
                                    <td colspan="3">Sopir</td>
                                </tr>
                                <input type="hidden" name="from" value="<?=$from?>">
                                <input type="hidden" name="to" value="<?=$to;?>">
                                <input type="hidden" name="jam" value="<?=$jam;?>">
                                <input type="hidden" name="harga" value="<?=$harga;?>">
                                    <?php
                                    foreach ($query as $key => $value) {
                                        echo '<tr align="center">';
                                        echo '<td><input type="checkbox" name="kursi" value="'.$value->sheet1.'">&nbsp;'.$value->sheet1.'</td>
                                              <td><input type="checkbox" name="kursi" value="'.$value->sheet2.'">&nbsp;'.$value->sheet2.'</td>
                                              <td>&nbsp;</td>
                                              <td><input type="checkbox" name="kursi" value="'.$value->sheet3.'">&nbsp;'.$value->sheet3.'</td>
                                              <td><input type="checkbox" name="kursi" value="'.$value->sheet4.'">&nbsp;'.$value->sheet4.'</td>
                                              <td><input type="checkbox" name="kursi" value="'.$value->sheet5.'">&nbsp;'.$value->sheet5.'</td>
                                              ';
                                        echo '</tr>';
                                    }
                                   # var_dump($value);
                                    ?>
                                
                            </table>

    
                            <button class="btn btn-warning">PESAN SEKARANG</button>
                          <input type="button" class="btn btn-info" onclick="lihatjumlah()" value="Total Pesan"> 
                        </form>
                          
                           <!--  <button  class="btn btn-primary" onclick="lihatbangku()">Detail Bangku Pesan</button> -->
                   </div>
                </div>
            </div>
            <!-- end datatables -->
    </div>
</section>
<script>
    function lihatjumlah(){
        var kursi = document.forms[0];
        var txt = "";
        var i;
        for (i = 0; i < kursi.length; i++) {
            if (kursi[i].checked) {
                txt = txt + kursi[i].value + " ,";
            }
        }
        //document.getElementById("order").value = "You ordered a coffee with: " + txt;
        alert("yang dipesan kursi nomor  "+ txt)
    }
    /*function lihatbangku(){
        var kursi = document.forms[0];
        var txt = "";
        var i;
        for(i=0;i<kursi.length;i++){
            if(kursi[i].checked){
                txt = txt + kursi[i].value + " ,";
            }
        }
        
        alert("Jumlah Bangku : " + (count(txt)))
    }*/
</script>