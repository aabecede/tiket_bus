<style type="text/css">
#kosong{
    background: red;
    color : black;

}
</style>
<section class="main-section"><!--main-section-start-->
    <div class="container">
       <h3>Cari Tiket</h3>
       <!-- datatables -->
           <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-lg-4 col-md-4">
                        <form>
                            <table class="table table-responsive">
                                <tr>
                                    <td>Titik Berangkat</td>
                                    <td><select class="form-control">
                                        <option name="">A</option>
                                        <option name="">B</option>
                                        <option name="">C</option>
                                    </select></td>
                                </tr>
                                 <tr>
                                    <td>Kota Tujuan</td>
                                    <td><select class="form-control">
                                        <option name="">A</option>
                                        <option name="">B</option>
                                        <option name="">C</option>
                                    </select></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="x" value="Cari" class="btn btn-success form-control"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <?php
                    /*if(@$cari == true)
                    {

                    }*/
                    ?>
                    <div class="col-lg-8 col-md-8">
                        <h3>Tiket Tersedia</h3>
                        <form action="<?=base_url('pesantiket');?>" method="post" enctype="multipart/form-data">
                        <table class="table table-responsive">
                            <tr>
                                <thead>
                                    <th>No</th>
                                    <th>Titik Berangkat</th>
                                    <th>Kota Tujuan</th>
                                    <th>Jumlah Tiket Tersedia</th>
                                    <th>Jam Berangkat</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody align="center">
                                    <tr>
                                        <input type="hidden" name="berangkat" value="A">
                                        <input type="hidden" name="tujuan" value="Z">
                                        <input type="hidden" name="jam" value="07.00">
                                        <input type="hidden" name="tiket" value="3">
                                        <input type="hidden" name="harga" value="40000">
                                        <td>1</td>
                                        <td>A</td>
                                        <td>Z</td>
                                        <td>13</td>
                                        <td>07.00</td>
                                        <td>Rp. 40.000,-</td>
                                        <td><button class="btn btn-warning">Pesan</button></td>
                                    </tr>
                                    <tr id="kosong">
                                        <input type="hidden" name="berangkat" value="A">
                                        <input type="hidden" name="tujuan" value="C">
                                        <input type="hidden" name="jam" value="10.00">
                                        <input type="hidden" name="tiket" value="3">
                                        <td>2</td>
                                        <td>A</td>
                                        <td>C</td>
                                        <td>0</td>
                                        <td>10.00</td>
                                        <td>Rp. 40.000,-</td>
                                        <td><button disabled="" class="btn btn-warning">Pesan</button></td>
                                    </tr>
                                </tbody>
                            </tr>
                        </table>
                    </form>
                    </div>
                </div>
            </div>
            <!-- end datatables -->
    </div>
</section>