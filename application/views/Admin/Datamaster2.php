<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
    
     <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
     
    <!--  <link rel="stylesheet" media="all" type="text/css" href="<?=base_url('assets/css/');?>jquery-ui-timepicker-addon.css" />
    <script type="text/javascript" src="<?=base_url('assets/js/');?>jquery-ui-timepicker-addon.js"></script>
    	<script type="text/javascript" src="<?=base_url('assets/js/');?>jquery-ui-sliderAccess.js"></script> -->

<!-- Tambah Modal-->
	<!-- bus -->
	<div class="modal fade bs-example-modal-lg" id="myModalb" role="dialog" aria-labelledby="myLargeModalLabel">

        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Bus</h4>
                </div>
                <div class="modal-body">
                    <form action="<?=base_url('Admin/bus')?>" method="post" enctype="multipart/form-data">
						<table class="table table-responsive">
							<tr>
								<td>Jenis Bus</td>
								<td>
									<div class="col-md-6">
										<select class="form-control" name="status" id="idstatus" onclick="get_namabus(),getsopir()">
											<?php
											foreach ($jenis_bus as $key => $value) {
												echo '<option value="'.$value->id.'">'.$value->nama.'</option>';
											}
											?>
										</select>
									</div>
								</td>
							</tr>
							<tr>
								<td>Nama Bus</td>
								<td><div class="col-md-6">
									<!-- <input type="text" name="bus" class="form-control" value="<?php echo $kodejadi;?>"> -->
									<div id="divnabus"></div>
								</div></td>
							</tr>
							<tr>
								<td>Jenis Sheet</td>
								<td><div class="col-md-6">
									<select name="idshet" class="form-control" id="ids" onclick="jumshet()" onchange="jumshet()">
										<?php
										foreach ($sheet as $key => $value) {
											echo '<option value="'.$value->id.'">'.$value->jenis.'('.$value->jumlah.')</option>';
											#echo '<input type="hidden" name="jumlahtiket" value="'.$value->jumlah.'">';
										}
										?>
									</select>
									<div id="Esheet"></div>
								</div></td>
							</tr>
							
							<tr>
								<td>Sopir</td>
								<td><div class="col-md-6">
									<!-- <select name="idsopir" required="" class="form-control" id="idsp"> -->
										<select name="idsopir" required="" class="form-control">
										<?php

										foreach ($sopir as $key => $value) {
											
										echo '<option value="'.$value->id.'">'.$value->nama.'</option>';

										}

										?>
									</select>
								</div></td>
							</tr>
							<tr>
								<td>Nopol</td>
								<td><div class="col-md-6">
									<input type="text" name="nopol" required="" class="form-control">
								</div></td>
							</tr>
							<tr>
								<td>Gambar</td>
								<td>
									<div class="col-md-6">
										<img src="<?php echo base_url('assets/img/bus1.png');?>" id='uploadPreview' class="form-control" style='width: 250px; height:150px;'/>
										<input id='uploadImage' type="file"  required="" name="gambar" onchange='PreviewImage();'>
									</div>
								</td>
							</tr>
							<tr>
								<td></td>
								<td>
									<?php
									if($sopir == null)
									{
										echo '<button class="btn btn-info" disabled="disabled">Submit</button>';
									}else{
										echo '<button class="btn btn-info">Submit</button>';
									}
									?>
									
								</td>
							</tr>
						</table>
					</form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end bus -->
    <!-- sopir -->
    <div class="modal fade bs-example-modal-lg" id="myModals" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Sopir</h4>
                </div>
                <div class="modal-body">
                    <form action="<?=base_url('admin/sopir')?>" method="post" enctype="multipart/form-data">
                    	<table class="table table-responsive">
						<tr>
							<td>Nomor KTP</td>
							<td>
							<div class="col-md-6">
								<input type="text" class="form-control" required="" name="no_ktp" placeholder="123623xx">
							</div></td>
						</tr>
						<tr>
							<td>Nama</td>
							<td><div class="col-md-6">
								<input type="text" required="" class="form-control" name="nama">
							</div></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td><div class="col-md-6">
								<select name="jk" required="" class="form-control">
									<option value="L">Laki - Laki </option>
									<option value="P">Perempuan</option>
								</select>
							</div>
							</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>
							<div class="col-md-6">
								<textarea required="" name="alamat" class="form-control"></textarea>
							</div></td>
						</tr>
						<tr>
							<td>Nomor Telpo</td>
							<td><div class="col-md-6">
								<input required="" type="number" name="no_telp" class="form-control">
							</div></td>
						</tr>
						<tr>
							<td>Tanggal Lahir</td>
							<td>
								<div class="col-md-6">
									<div class="datepicker-center">
							            <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
											<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							                <input class="form-control" name="tgl_lhr" type="text" required=""  readonly="readonly">

							            </div>
						            </div>
								</div>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" value="Tambahkan" class="btn btn-info"></td>
						</tr>
						</table>
					</form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end sopir -->
    <!-- jadwal bus-->
    <div class="modal fade bs-example-modal-lg" id="myModaljb" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Jadwal Bus</h4>
                </div>
                <div class="modal-body">
                    <form action="<?=base_url('admin/jadwal')?>" method="post" enctype="multipart/form-data">
                    	<table class="table table-responsive">
							<tr>
								<td>Bus</td>
								<td><div class="col-md-6">
									<select name="idbus" id="idstat_bus" class="form-control" onclick="get_dari(),get_tujuan(),get_sopir()" required="">
										<?php
										foreach ($bus as $key => $value) {
											echo '<option value="'.$value->idb.'">'.$value->bus.'('.@$value->napir.'|'.@$value->nama.' | '.@$value->nopol.')</option>';
										}
										?>
									</select>
								</div></td>
							</tr>
							<!-- <tr>
								<td>Sopir</td>
								<td>
									<div class="col-md-6">
										<div id="sopir">
										</div>
									</div>
								</td>
							</tr> -->
							<tr>
								<td>Dari</td>
								<td><div class="col-md-6">
									<!-- <div id="div_dari"> -->
										<input type="text" required="" name="dari" value="Tw Alun" class="form-control">
									</div>
								</div></td>
							</tr>
							<tr>
								<td>Tujuan</td>
								<td>
									<div class="col-md-6">
										<!-- <div id="div_tujuan"> -->
											<?php
											echo '<select name="tujuan" class="form-control">';
											foreach ($tujuan as $key => $value) {
												echo '<option value="'.$value->id.'">'.$value->nama.'</option>';
											}
											echo '</select>';
											?>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<Td>Berangkat</Td>
								<td><div class="col-md-6">
									<select name="berangkat" class="form-control" id="berangkat">
										<?php
										$date = $this->db->get('jamberangkat')->result();
										
										#echo '<select name="hari" class="form-control">';
										
										foreach ($date as $key => $value) {
											#var_dump($date);
											echo '<option value="'.$value->id.'">'.$value->jam.'</option>';
										}
										?>
									</select>
								</div>
								</td>
							</tr>
							<tr>
								<td>Hari</td>
								<td>
									<div class="col-md-6">
										<select name="hari" class="form-control">
											<?php
										$date = $this->db->get('hari')->result();
										
										#echo '<select name="hari" class="form-control">';
										
										foreach ($date as $key => $value) {
											#var_dump($date);
											echo '<option value="'.$value->id.'">'.$value->nama.'</option>';
										}
										echo '</select>';
										?>
										</select>
									</div>
								</td>
							</tr>
							<tr>
								<td>Harga</td>
								<td><div class="col-md-6">
									<input type="number" name="harga" class="form-control">
								</div>
								</td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" class="btn btn-info" value="Tambah Data"></td>
							</tr>
						</table>
					</form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end jadwal bus-->
    <!-- jadwal pariwisata -->
     <div class="modal fade bs-example-modal-lg" id="myModaljdwpariwisata" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Jadwal Pariwisatar</h4>
                </div>
                <div class="modal-body">
                    <form action="<?=base_url('admin/jdw_pariwisata')?>" method="post" enctype="multipart/form-data">
                    	<table class="table table-responsive">
						<tr>
							<td>Tujuan</td>
							<td>
							<div class="col-md-6">
								<input type="text" class="form-control" required="" name="tujuan" placeholder="Cianjur / Bandung">
							</div></td>
						</tr>
						<tr>
							<td>Durasi</td>
							<td><div class="col-md-6">
								<input type="text" required="" placeholder="12 Jam" class="form-control" name="durasi">
							</div></td>
						</tr>
						<!-- <tr>
							<td>Sheet</td>
							<td>
							<div class="col-md-6">
								<select class="form-control" name="sheet">
									<option> << SILAHKAN PILIH >></option>
									<?php
									foreach ($sheet as $key => $value) {
										echo '<option value="'.$value->id.'">'.$value->jenis.'('.$value->jumlah.')</option>';
									}
									?>
								</select>
							</div></td>
						</tr> -->
						<tr>
							<td>Harga</td>
							<td><div class="col-md-6">
								<input type="text" required="" name="harga" class="form-control">
							</div>
							</td>
						</tr>
						
						
						<tr>
							<td></td>
							<td><input type="submit" value="Tambahkan" class="btn btn-info"></td>
						</tr>
						</table>
					</form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end jadwal pariwisata -->
    <!-- paket wisata -->
     <div class="modal fade bs-example-modal-lg" id="myModalpaketwisata" role="dialog" aria-labelledby="myLargeModalLabel">
	        <div class="modal-dialog modal-lg" role="document">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <button type="button" class="close" data-dismiss="modal">&times;</button>
	                    <h4 class="modal-title">Tambah Paket Pariwisatar</h4>
	                </div>
	                <div class="modal-body">
	                    <form action="<?=base_url('admin/paket_wisata')?>" method="post" enctype="multipart/form-data">
	                    	<table class="table table-responsive">
							<tr>
								<td>Tujuan</td>
								<td>
								<div class="col-md-6">
									<input type="text" class="form-control" required="" name="tujuan" placeholder="Cianjur / Bandung">
								</div></td>
							</tr>
							<tr>
								<td>Durasi</td>
								<td><div class="col-md-6">
									<input type="text" required="" placeholder="12 Jam" class="form-control" name="durasi">
								</div></td>
							</tr>
							<!-- <tr>
								<td>Sheet</td>
								<td>
								<div class="col-md-6">
									<select class="form-control" name="sheet">
										<option> << SILAHKAN PILIH >></option>
										<?php
										foreach ($sheet as $key => $value) {
											echo '<option value="'.$value->id.'">'.$value->jenis.'('.$value->jumlah.')</option>';
										}
										?>
									</select>
								</div></td>
							</tr> -->
							<tr>
								<td>Harga</td>
								<td><div class="col-md-6">
									<input type="text" required="" name="harga" class="form-control">
								</div>
								</td>
							</tr>
							
							
							<tr>
								<td></td>
								<td><input type="submit" value="Tambahkan" class="btn btn-info"></td>
							</tr>
							</table>
						</form>
	                </div>
	                <div class="modal-footer">
	                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
	                </div>
	            </div>
	        </div>
	    </div>
    <!-- end paket wisata -->
			<!-- //tambah-->
			<!-- start modal-->
     <div class="modal fade bs-example-modal-lg" id="modalbus" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Bus</h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data">ke</div>
                    datane gak metu
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">

		<div class="col-lg-12 col-md-12">
			<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg></a></li>
				<li class="active"><?=$icon;?></li>
			</ol>
		</div><!--/.row-->
			<h2 align="center">Data Master</h2>
			<?='<p>'.@$alert.'</p>';?>
		</div>
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body tabs">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab1" data-toggle="tab">Data BUS</a></li>
							<li><a href="#tab2" data-toggle="tab">Jadwal</a></li>
							<li><a href="#tab3" data-toggle="tab">Angkutan Pariwisata</a></li>
							<!-- <li><a href="#tab4" data-toggle="tab">Angkutan Mudik</a></li>
							<li><a href="#tab5" data-toggle="tab">Angkutan Bandara</a></li> -->

						</ul>
		
						<div class="tab-content">
							<div class="tab-pane fade in active" id="tab1">
								<div class="panel panel-default">
									<a href="#" data-target="#myModalb" data-toggle="modal" class="glyphicon glyphicon-plus btn btn-info"> Tambah Data Bus</a>
									<a href="#" data-target="#myModals" data-toggle="modal" class="glyphicon glyphicon-plus btn btn-warning"> Tambah Data Sopir</a>
						            <div class="panel-body">
									<h3>Data Bus</h3>
						                <table id="tbl1" class="table table-striped table-bordered " cellspacing="0" width="100%">
						                    <thead>
						                        <tr>
						                            <th>No</th>
						                            <th>BUS</th>
						                            <th>Nopol</th>
						                           <!--  <th>Sopir</th> -->
						                            <th>Kapasitas</th>
						                            <th>Jenis Bus</th>
						                            <th>Jumlah Tiket</th>
						                            <th>Gambar</th>
						                            <th>Aksi</th>
						                        </tr>
						                    </thead>
						                    <tbody>
						                        <?php 
						                        $no = 1;
						                        foreach ($tabel1 as $key => $value) { ?>
						                            <tr>
						                                <td><?php echo $no ?></td>
						                                <td><?php echo $value->bus ?></td>
						                                <td><?php echo $value->nopol;?></td>
						                                <!-- <td><?php echo $value->napir ?></td> -->
						                                <td><?php echo $value->jenis ?><br>(Jumlah Sheet <?php echo $value->jumlah;?>)</td>
						                                <td><?=$value->stabus;?></td>
						                                <td><?php echo $value->jumlahtiket;?></td>
						                                <td><img src="<?php echo base_url('assets/img/bus/'.$value->gambar);?>" class="img-thumbnail" alt="Cinque Terre"></td>
						                                <td class="text-right">
						                                    <a href="<?php echo site_url();?>/admin/deletbus/<?php echo $value->idbb;?>" onclick="return konfirmasidelete()" class="btn btn-danger btn-xs" title="Hapus"><b class="glyphicon glyphicon-trash"></b></a>

						                                   <!-- <a href="" class="btn btn-primary btn-xs" title="Edit<?php echo $value->idbb;?>" data-target="#modalbus" data-toggle="modal" data-id="<?php echo $value->id;?>"><b class="glyphicon glyphicon-edit"></b></a> -->
						                                    	<a href="<?php echo base_url('admin/editbus/'.$value->idbb);?>" name="" class="btn btn-primary btn-xs">
						                                    		<b class="glyphicon glyphicon-edit"></b>
						                                    	</a>
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
						                            <td>Nopol</td>
						                           <!--  <td>Sopir</td> -->
						                            <td>Kapasitas</td>
						                            <td>Jenis Bus</td>
						                            <td>Gambar</td>
						                            <td>Aksi</td>
						                        </tr>
						                    </tfoot>
						                </table>
						                <h3>Data Sopir</h3>
						                <table id="tbl2" class="table table-striped table-bordered " cellspacing="0" width="100%">
						                    <thead>
						                        <tr>
						                            <th>No</th>
						                            <th>No KTP</th>
						                            <th>Nama</th>
						                            <th>Alamat</th>
						                            <th>No HP</th>
						                            <th>Jenis Kelamin</th>
						                            <th>Tanggal Lahir</th>
						                            <th>Aksi</th>
						                        </tr>
						                    </thead>
						                    <tbody>
						                        <?php 
						                        $no = 1;
						                        foreach ($tabel1s as $key => $value) { ?>
						                            <tr>
						                                <td><?php echo $no ?></td>
						                                <td><?php echo $value->no_ktp;?></td>
						                                <td><?php echo $value->nama ?></td>
						                                <td><?php echo $value->alamat ?></td>
						                                <td><?php echo $value->no_telp ?></td>
						                                <td><?=$value->jk;?></td>
						                                <td><?=$value->tgl_lhr?></td>
						                                <td class="text-right">
						                                	<a href="" class="btn btn-danger btn-xs" title="Hapus"><b class="glyphicon glyphicon-trash"></b></a>
						                                    <a href="<?php echo base_url('admin/esop/'.$value->id);?>" class="btn btn-primary btn-xs" title="Edit"><b class="glyphicon glyphicon-edit"></b></a>
						                                </td>
						                            </tr>
						                        <?php 
						                        $no++;
						                    } ?>
						                    </tbody>
						                    <tfoot>
						                        <tr>
						                            <td>No</td>
						                            <td>NO KTP</td>
						                            <td>Nama</td>
						                            <td>Alamat</td>
						                            <td>No HP</td>
						                            <td>Jenis Kelamin</td>
						                            <td>Tanggal Lahir</td>
						                            <td>Aksi</td>
						                        </tr>
						                    </tfoot>
						                </table>

						            </div>

						        </div>
							</div>
							<!-- id tab2 -->
							<div class="tab-pane fade" id="tab2">
								<div class="panel panel-default">
									<a href="#" data-target="#myModaljb" data-toggle="modal" class="glyphicon glyphicon-plus btn btn-info"> Tambah Jadwal Bus</a>
									<div class="panel-body">
										
						                <table id="tbl3" class="table table-striped table-bordered " cellspacing="0" width="100%">
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
						                            <th>Aksi</th>
						                        </tr>
						                    </thead>
						                    <tbody>
						                        <?php 
						                        $no = 1;
						                        foreach ($tabel2 as $key => $value) { ?>
						                            <tr>
						                                <td><?php echo $no ?></td>
						                                <td><?php echo $value->bus ?></td>
						                                <td><?php echo $value->napir ?></td>
						                                <td><?php echo $value->dari?></td>
						                                <td><?php echo $value->naju?></td>
						                                <td><?php echo $value->jamberangkat.' WIB'?></td>
						                                <td><?php echo $value->_nHari?></td>
						                                <td><?='Rp '.number_format($value->harga),',',0?></td>
						                                <td class="text-right">
						                                	<div class="col-md-6">
						                                		<form action="<?=base_url('admin/delete')?>" method="post" enctype="multipart/form-data">
						                                		<input type="hidden" name="id" value="<?=$value->idj?>">
						                                		<input type="hidden" name="db" value="jadwal">
						                                		<button href="" class="btn btn-danger btn-xs" title="Hapus"><b class="glyphicon glyphicon-trash"></b></button>
						                                	</form>
						                                	</div>
						                                	<div class="col-md-6">
						                                		<form action="<?php echo base_url('admin/editjadwal');?>" method="post" enctype="multipart/form-data">
						                                		<input type="hidden" name="id" value="<?=$value->idj?>">
						                                		<input type="hidden" name="db" value="jadwal">
						                                		<button href="" class="btn btn-warning btn-xs" title="Edit"><b class="glyphicon glyphicon-edit"></b></button>
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
						                            <td>BUS</td>
						                            <td>Sopir</td>
						                            <td>Dari</td>
						                            <td>Tujuan</td>
						                            <td>Berangkat</td>
						                            <td>Sampai</td>
						                            <td>Harga</td>
						                            <td>Aksi</td>
						                        </tr>
						                    </tfoot>
						                </table>
									</div>
								</div>

								
								
							</div>
							<div class="tab-pane fade" id="tab3">
								<h4>Data Angkutan Pariwisata</h4>
								<div class="panel panel-default">
									<a href="#" data-target="#myModaljdwpariwisata" data-toggle="modal" class="glyphicon glyphicon-plus btn btn-info"> Harga Pariwisata</a>
									<div class="panel-body">
										
						                <table id="tbl4" class="table table-striped table-bordered " cellspacing="0" width="100%">
						                    <thead>
						                        <tr>
						                            <th>No</th>
						                            <th>Tujuan</th>
						                            <th>Durasi</th>
						                            <th>Harga</th>
						                           <!--  <th>Sheet</th>
						                           <th>Jumlah Sheet</th> -->
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
						                                <!-- <td><?php echo $value->jenis?></td>
						                                <td><?=$value->jumlah;?></td> -->
						                                
						                                <td class="text-right">
						                                	<div class="col-md-2">
						                                		<form action="<?=base_url('admin/delete')?>" method="post" enctype="multipart/form-data">
						                                		<input type="hidden" name="id" value="<?=$value->idjwd?>">
						                                		<input type="hidden" name="db" value="jdw_pariwisata">
						                                		<button href="" class="btn btn-danger btn-xs" title="Hapus" onclick="return konfirmasidelete()"><b class="glyphicon glyphicon-trash"></b></button>
						                                	</form>
						                                	</div>
						                                	<div class="col-md-2">
						                                		<form action="<?php echo base_url('admin/editpariwisata');?>" method="post" enctype="multipart/form-data">
						                                		<input type="hidden" name="id" value="<?=$value->idjwd?>">
						                                		<input type="hidden" name="db" value="jdw_pariwisata">
						                                		<button href="" class="btn btn-warning btn-xs" title="Edit"><b class="glyphicon glyphicon-edit"></b></button>
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
						                            <!-- <td>Sheet</td>
						                            <td>Jumlah Sheet</td> -->
						                            <td>Aksi</td>
						                        </tr>
						                    </tfoot>
						                </table>
						                <!-- paket wisata -->
						               <!--  <a href="#" data-target="#myModalpaketwisata" data-toggle="modal" class="glyphicon glyphicon-plus btn btn-info">Paket Wisata</a>
						               
						               <h3>Paket Wisata</h3>
						               <table id="tbl5" class="table table-striped table-bordered " cellspacing="0" width="100%">
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
						                       foreach ($tabel31 as $key => $value) { ?>
						                           <tr>
						                               <td><?php echo $no ?></td>
						                               <td><?php echo $value->tujuan ?></td>
						                               <td><?php echo $value->durasi ?></td>
						                               <td><?php echo 'Rp.'.number_format($value->harga),',',0?></td>
						                               <td><?php echo $value->jenis?></td>
						                               <td><?=$value->jumlah;?></td>
						                               
						                               <td class="text-right">
						                               	<div class="col-md-2">
						                               		<form action="<?=base_url('admin/delete')?>" method="post" enctype="multipart/form-data">
						                               		<input type="hidden" name="id" value="<?=$value->idpaket?>">
						                               		<input type="hidden" name="db" value="jdw_pariwisata">
						                               		<button href="" class="btn btn-danger btn-xs" title="Hapus"><b class="glyphicon glyphicon-trash"></b></button>
						                               	</form>
						                               	</div>
						                               	<div class="col-md-2">
						                               		<form action="" method="post" enctype="multipart/form-data">
						                               		<input type="hidden" name="id" value="<?=$value->idpaket?>">
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
						               </table> -->
									</div>
									</div>
								</div>
							</div>
							<!-- <div class="tab-pane fade" id="tab4">
								<h4>Tab 3</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget rutrum purus. Donec hendrerit ante ac metus sagittis elementum. Mauris feugiat nisl sit amet neque luctus, a tincidunt odio auctor. </p>
							</div>
							<div class="tab-pane fade" id="tab5">
								<h4>Tab 3</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget rutrum purus. Donec hendrerit ante ac metus sagittis elementum. Mauris feugiat nisl sit amet neque luctus, a tincidunt odio auctor. </p>
							</div> -->
						</div>
					</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	// DataTable------------------------------------------------------------------------------------------
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

        $('#tbl3').DataTable({
            "columnDefs": [{ 
                "targets": [ -1 ],
                "orderable": false,
            }]
        });
        $('#tbl4').DataTable({
        	"columnDefs":[{
        		"targets": [-1],
        		"orderable": false,
        	}]
        })
        $('#tbl5').DataTable({
        	"columnDefs":[{
        		"targets": [-1],
        		"orderable": false,
        	}]
        })
        //Datepicker
        $(".input-group.date").datepicker({autoclose: true, todayHighlight: true});
        //Timepicker
		$(document).ready(function() {
	    //$("#datepicker").datepicker();
	    //$("#datepicker").datepicker(
	    //{
	    //   dateFormat: 'dd/mm/yy',
	    //   changeMonth: true,
	    //   changeYear: true
	    //defaultDate: '20/03/2010'
	    // });
		 
		$('#datepicker').datetimepicker({
		dateFormat: 'yy-mm-dd',
		timeFormat: 'HH:mm:ss',
		stepHour: 2,
		stepMinute: 10,
		stepSecond: 10
		});
	  });

		//modal
		/* $(document).ready(function() {
	        // Untuk sunting
	        $('#modalbus').on('show.bs.modal', function (event) {
	            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
	            var modal  = $(this)
 
	            // Isi nilai pada field
	            modal.find('#id').attr("value",div.data('id'));
	            modal.find('#bus').attr("value",div.data('nama'));
	            /*modal.find('#alamat').html(div.data('alamat'));
	            modal.find('#pekerjaan').attr("value",div.data('pekerjaan'));
	        });
	    });*/
	/*	$(document).ready(function(){
        $('#modalbus').on('show.bs.modal', function(e){
            var rowid = $(e.relatedTarget).data('id');
            //ambil data
            $.ajax({
               type :'POST',
	      		url : '<?php echo base_url('admin/get_bus');?>',
                data : 'rowid='+rowid,
                success : function(data){
                    $('.fetched-data').html(data);//tampil data di modal.
                }

            });
        });
    });
*/
	//getnamabus
	function get_namabus(){
		var idstatus = $("#idstatus").val();
		$.ajax({
			type :"POST",
			url : "<?php echo base_url('index.php/admin/getnamabus');?>",
			data : "idstatus="+idstatus,
			success:function(data){
				$("#divnabus").html(data);
				//$("#idsp").visible.true;
			}
		});
	}
	//get Dari
	 function get_dari()
	  {
	    var idstat_bus = $("#idstat_bus").val();
	    $.ajax ({
	      type :"POST",
	      url : "<?=base_url('index.php/admin/get_dari');?>",
	      data : "idstat_bus="+idstat_bus,
	      success:function(msg){
	        $("#div_dari").html(msg);
	      }
	    });
	  }
	  function get_tujuan(){
	  	var idstat_bus = $("#idstat_bus").val();
	    $.ajax ({
	      type :"POST",
	      url : "<?=base_url('index.php/admin/get_tujuan');?>",
	      data : "idstat_bus="+idstat_bus,
	      success:function(msg){
	        $("#div_tujuan").html(msg);
	      }
	    });
	  }
	  function get_sopir(){
	  	var idsopir = $('#idstat_bus').val();
	  	$.ajax({
	  		type : "POST",
	  		url : "<?=base_url('index.php/admin/get_sopir');?>",
	  		data : "idsopir="+idsopir,
	  		success:function(msg){
	  			$("#sopir").html(msg);
	  		}
	  	});
	  }
	  //jumlah sheet
	   function jumshet(){
	  	var ids = $('#ids').val();
	  	$.ajax({
	  		type : "POST",
	  		url : "<?=base_url('index.php/admin/jumlahshet');?>",
	  		data : "ids="+ids,
	  		success:function(msg){
	  			$("#Esheet").html(msg);
	  		}
	  	});
	  }
	 



</script>
<script type="text/javascript">
	// function getsopir(){
	// 	 var id = document.getElementById('idstatus').value;
	// 	if(id == '2')
	// 	{
	// 		document.getElementById("idsp").style.visibility = 'hidden';

	// 	}else{
	// 		document.getElementById("idsp").style.visibility = 'visible';
	// 	}
	// }

	function PreviewImage() {
var oFReader = new FileReader();
oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
oFReader.onload = function (oFREvent)
 {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
	};
 };

 function konfirmasidelete(){
 	tanya = confirm("Yakin Menghapus Data ini ?");
 	if(tanya == true ) return true;
 	else
 		return false;
 }

</script>