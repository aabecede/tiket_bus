<?php
//update bus
#var_dump($cektgl);
$date = date('Y-m-d');
foreach ($cektgl as $key => $value) {
  #echo $value->idbus.'<br>';
  $singlebus = explode(',', $value->idbus);
  $no = 0;
  if($date > $value->tgl_p)
  {

    foreach ($singlebus as $key => $value2) {
      $idbus = $singlebus[$no];
      #echo $idbus.'<br>';
      $ubah = $this->db->query('update bus set sttb="0" where id = ?',array($idbus));
      $no++;
    }
    $this->db->query('update npemesanan_pariwisata set buskem ="1" where id = ?',array($value->idpp));
  }
    
}
?>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
    
     <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">

     <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lumino/css/datepicker3.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lumino/css/bootstrap.min.css');?>">
<script type="text/javascript" src="<?php echo base_url('assets/lumino/js/bootstrap-datepicker.js');?>"></script>
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
     <!-- start modal-->
     <div class="modal fade bs-example-modal-lg" id="modalpesan" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pemesanan Bus Pariwisata</h4>
                </div>
                <div class="modal-body">
                  <form action="<?php echo base_url('member/p_pesan');?>" method="post" enctype="multipart/form-data">
                    <table class="table table-responsive">
                      <tr>
                        <td>Nama Pemesan</td>
                        <td><?php echo $log->nama;?></td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td><?php echo $log->alamat;?></td>
                      </tr>
                      <tr>
                        <td>Tujuan</td>
                        <td><div class="col-md-6">
                            <select class="form-control" name="tujuan" id="idtujuan" onclick="tujuanbus(),dpp()">
                          <?php                        
                          foreach ($tabel3 as $key => $value) {
                            echo '<option value="'.$value->id.'">'.$value->tujuan.'</option>';
                          }
                          ?>
                            </select>
                        </div>
                        </td>
                      </tr>
                      
                      <tr>
                        <td>Tarif</td>
                        <td><div id="hargabus"></div></td>
                      </tr>
                      <tr>
                        <td>Tanggal Berangkat</td>
                        <td><div class="col-md-6">
                             <div class="datepicker-center">
                                 <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                  <input class="form-control" id="iddate" type="text" name="tgl_b" required=""  readonly="readonly">
                                  
                                    </div>
                                  </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>Tanggal Pulang</td>
                        <td>
                          <div class="col-md-6">
                             <div class="datepicker-center">
                                <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                               <input class="form-control" id="iddatep" type="text" name="tgl_p" required="" onclick="dpp()"  readonly="readonly">
                                </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>Berangkat dari</td>
                        <td><div class="col-md-6">
                          <input type="text" name="berangkatdari" class="form-control">
                        </div></td>
                      </tr>
                      <tr>
                        <td>Jumlah Sheet</td>
                        <td>
                          <div class="col-md-6">
                            <input type="text" value="<?php echo $sheet1->jenis.' || '.$sheet1->jumlah.' Kursi';?>" class="form-control" readonly>
                            <input type="hidden" name="jumkursi" value="<?php echo $sheet1->id;?>" class="form-control" readonly="">
                           <!--  <select class="form-control" name="jumkursi" id="idsheet" onclick="jumsheet()">
                             <?php
                             foreach ($sheet as $key => $value) {
                               echo '<option value="'.$value->id.'">Jenis Sheet'.$value->jenis.' || Jumlah Sheet '.$value->jumlah.'</option>';
                             }
                             ?>
                           </select> -->
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>Jumlah Bus Tersedia</td>
                        <td><!-- <div id="bustersedia"></div> -->
                          
                          <?php
                          $query =  $this->db->query('SELECT * FROM `bus`, status_bus, jenis_sheet where bus.status = status_bus.id and bus.status = "2" and jenis_sheet.id = bus.idshet and bus.sttb = "0" and bus.idshet = "2"')->num_rows();
                          ?>
                          <div class="col-md-6">
                            <input type="text" readonly="" name="tersedia" class="form-control" value="<?php echo $query;?>">
                            <div id="selbus"></div>
                          </div>
                        </td>
                      </tr>
                     <!-- <tr>
                       <td></td>
                        <td></td>
                      </tr> -->

                      <tr>
                       <td>Jumlah Bus yang dipesan</td>
                       <td>
                         <div class="col-md-6">
                           <input type="text" name="jumbus" value="" id="ebus" class="form-control" onkeyup="dpp(),selectbus()">
                         </div>
                       </td>
                      </tr>

                      <tr>
                        <td>Total Pembayaran</td>
                        <td>
                          <div class="col-md-6"><input type="text" id="end" readonly="" class="form-control">
                            <input type="hidden" name="total" id="end2">
                          </div>
                          <?php

                        ?></td>
                      </tr>

                      <tr>
                        <td>No Rek</td>
                        <td>
                          <div class="col-md-6">
                            <input type="text" name="norek" class="form-control" value="198752428" readonly="">
                            <input type="text" name="an" class="form-control" value="Damri" readonly="">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td>
                          <input type="hidden" name="tgl_expied" value="<?php echo $rentang->rentang;?>">
                          <?php

                          $cekbus = $this->db->query('SELECT *, bus.id as idbus FROM bus, status_bus where status_bus.id = bus.status and status_bus.id = 2 and bus.sttb="0"')->num_rows();
                          if($cekbus == 0){
                            echo '<input type="submit" value="Pesan" disabled class="btn btn-info">';
                          }else{
                            echo '<input type="submit" value="Pesan" class="btn btn-info">';
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
     <!-- end modal-->
<section class="main-section"><!--main-section-start-->

    <div class="container">
      <a href="#" data-target="#modalpesan" data-toggle="modal" class="btn btn-info"  title="">Pesan Bus</a>
    	<div class="row">

       <?php
       #var_dump($bus);
       foreach ($bus as $key => $value) {
       	?>
       	
		  <div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		      <img src="<?php echo base_url('assets/img/Bus/'.$value->gambar);?>" style="width: 250px;height: 250px;">
		      <div class="caption" align="center">
		        
		        <form action="<?php echo base_url('m/pemesanan');?>" method="POST" enctype="multipart/form-data">
		        	
		        	<input type="hidden" name="id" value="<?php echo $value->idbus;?>">
		        	<?php
		        	if($value->sttb == null or $value->sttb == 0){
		        		echo '<button title="Pesan" class="btn btn-primary" disabled>Tersedia</button>';
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
      
    </div> <!-- end container -->
</section><!-- section -->
<script type="text/javascript">
  //getnamabus
  function tujuanbus(){
    var idtujuan = $("#idtujuan").val();
    $.ajax({
      type :"POST",
      url : "<?php echo base_url('index.php/member/hargabus');?>",
      data : "idtujuan="+idtujuan,
      success:function(msg){
        $("#hargabus").html(msg);
      }
    });
  }
  function jumsheet(){
    var idsheet = $("#idsheet").val();
    $.ajax({
      type :"POST",
      url : "<?php echo base_url('index.php/member/bustersedia');?>",
      data : "idsheet="+idsheet,
      success:function(msg){
        $("#bustersedia").html(msg);
      }
    });
  }
   function selectbus(){
    var limit = $("#ebus").val();
    $.ajax({
      type :"POST",
      url : "<?php echo base_url('index.php/member/selbus');?>",
      data : ("limit="+limit),
      //data : "idsheet="+idsheet),
      success:function(msg){
        $("#selbus").html(msg);
      }
    });
  }
  //else
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
                url : '<?php echo base_url('Member/get_bus');?>',
                data : 'rowid=' + rowid,
                success : function(data){
                    $('.fetched-data').html(data);//tampil data di modal.
                }

            });
        });
    });
  $(".input-group.date").datepicker({autoclose: true, todayHighlight: true});

  function dpp(x) {
    var x = new Date (document.getElementById("iddatep").value);
    var y = new Date (document.getElementById('iddate').value);
    var tarif = document.getElementById('tarif').value;
    var bus = document.getElementById('ebus').value;
    
    
 x.setDate(x.getDate() - y.getDate());
   // var parse = x;
    var curr_date = x.getDate() * tarif * bus;
    var curr_month = x.getMonth() + 1; //Months are zero based
    var curr_year = x.getFullYear();
    var x = (curr_year + "-" + curr_month + "-" + curr_date);
   
    document.getElementById("end").value = curr_date.toLocaleString();
    document.getElementById("end2").value = curr_date;
  }
</script>
