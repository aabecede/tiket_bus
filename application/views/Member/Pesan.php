<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lumino/css/datepicker3.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lumino/css/bootstrap.min.css');?>">
<script type="text/javascript" src="<?php echo base_url('assets/lumino/js/bootstrap-datepicker.js');?>"></script>
<section class="main-section"><!--main-section-start-->
    <div class="container">
       
       <!-- datatables -->
       <div class="panel panel-default">
       		<div class="panle-body">
       			<h3>Paket Wisata yang dipilih</h3>
       			<!-- data table-->
       			<?php
       			#var_dump($query);
       			?>
       			<table class="table table-responsive">
       				<form action="<?php echo base_url('Member/insertpemesanan_pp'); ?>" method="post" enctype="multipart/form-data">
       				<tr>
       					<td>Pemesan</td>
       					<td><div class="col-md-6">
       						<input type="hidden" name="idp" value="<?php echo $query->idpaket;?>">
       						<input type="text" readonly="" name="pemesan" class="form-control" value="<?php echo $nama;?>">
                                                  <input type="hidden" name="rentang" value="<?php echo $rentang->rentang;?>">
                                                 <input type="hidden" name="jenis" value="P">
       					</div>
       					</td>
       				</tr>
       				<tr>
       					<td>Tujuan</td>
       					<td><div class="col-md-6">
       						<input type="text" readonly="" class="form-control" value="<?php echo $query->tujuan;?>">
       					</div></td>
       				</tr>
       				<tr>
       					<td>Durasi</td>
       					<td><div class="col-md-6">
       						<input type="text" readonly="" class="form-control" value="<?php echo $query->durasi;?>">
                  <?php
                  $hari = substr($query->durasi,6,1);
                  ?>
       					</div></td>
       				</tr>
       				<tr>
       					<td>Harga</td>
       					<td><div class="col-md-6">
       						<input type="hidden" readonly="" class="form-control" value="<?php echo $query->harga;?>" id="harga">
                  <input type="text" readonly="" class="form-control" value="<?php echo $query->harga;?>" name="" id="total">
       					</div>
       					</td>
       				</tr>
              <tr>
                <td>Jumlah Bus</td>
                <td>
                  <div class="col-md-6">
                  <input type="number" min="1" max="<?php echo $max->Ebus;?>" name="jumlahbus" class="form-control" id="jumlah" onkeyup="myfunc()" onchange="myfunc(),getlimit()">
                  <!-- <div id="div_limit"></div> -->
                  <input type="text" id="batas" name="batas" class="form-control" readonly="" hidden>
                </div>
                </td>
              </tr>
              
              
            
       				<!-- <tr>
                <td>Sheet Bus</td>
                <td><div class="col-md-6">
                  <input type="text" readonly="" class="form-control" value="<?php echo $query->jenis;?>" name="">
                </div>
                </td>
              </tr>
              <tr>
                <td>Jumlah Sheet</td>
                <td>
                  <div class="col-md-6">
                    <input type="text" readonly="" class="form-control" value="<?php echo $query->jumlah;?>" name="from">
                  </div>
                </td>
              </tr> -->
       				<tr>
       					<td>Tanggal Berangkat</td>
       					<td>
       						<div class="col-md-3">
									<div class="datepicker-center">
							            <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
											<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							                <input class="form-control" name="from" id="iddate" onchange="dpp()" type="text" name="tgl_b" required=""  readonly="readonly">

							            </div>
						            </div>
							</div>
							<div class="col-md-1">
								<p>To</p>
							</div>
							<div class="col-md-2">
							<input type="text" class="form-control" name="to" id="end" readonly="">	
							</div>
       					</td>
       				</tr>
                                     <tr>
                                         <td>Berangkat Dari</td>
                                         <td><div class="col-md-6">
                                                <input type="text" name="berangkat" class="form-control">
                                         </div>
                                         </td>
                                  </tr>
       				<tr>
       					<td></td>
       					<td><input type="submit" class="btn btn-success" value="Pesan" onclick="pesan()"></td>
       				</tr>
       				</form>
       			</table>
       			<!-- end data table -->
       		</div>
       </div>
       <!-- end datatables -->    
    </div>
</section>
<script type="text/javascript">

   function myfunc(){

    var harga =  document.getElementById('harga').value;
    var jumlah =  document.getElementById('jumlah').value;

    var total = parseInt(harga)*parseInt(jumlah);
    document.getElementById("total").value = total;

  }
	function pesan()
	{
  // var id_bis = $('#batas').val();
  //   $.ajax ({
  //       url : "<?php echo base_url('index.php/Member/insertpemesanan_pp');?>",
  //       type :"post",
  //       data : {id_bis: id_bis},
  //       success:function(msg){
  //         console.log(msg)
  //         // if (msg == "sukses") {
  //         //   window.location = "<?php echo base_url('m/konfirmasi') ?>"
  //         // }else{
  //         //   location.reload()
  //         // }
  //       	// tanya = confirm("Yakin Untuk memesan paket ini ?");
  //     	 	// if(tanya == true ) return true;
  //     	 	// else
  //     	 	// 	return false;          
  //       }
  //     });
    
  
	}
	function dpp(x){
		var x = new Date (document.getElementById("iddate").value);
		
		x.setDate(x.getDate() + <?php echo $hari;?>);
    var curr_date = x.getDate();
    var curr_month = x.getMonth() + 1; //Months are zero based
    var curr_year = x.getFullYear();
    var x = (curr_year + "-" + curr_month + "-" + curr_date);
		document.getElementById("end").value = x;

	}

   function getlimit()
    {
      var limit = $("#jumlah").val();
      $.ajax ({
        type :"POST",
        url : "<?php echo base_url('index.php/Member/getlimit');?>",
        data : "limit="+limit,
        success:function(msg){
          // $("#div_limit").html(msg);
          $("#batas").val(msg);
        }
      });
    }

  /*Jumlah*/
   $('#jumlah').keyup(function(){
    if ($(this).val() > `<?php echo $max->Ebus;?>`){
      alert("Maksimal`<?php echo $max->Ebus;?>`");
      $(this).val(<?php echo $max->Ebus;?>);
    }else if($(this).val() < 1){
      alert("Min 1");
      $(this).val("1");
    }else{
      $(this).val("1");
    }
  });

	 $(".input-group.date").datepicker({autoclose: true, todayHighlight: true});
        //Timepicker
		// $(document).ready(function() {
	 //    //$("#datepicker").datepicker();
	 //    //$("#datepicker").datepicker(
	 //    //{
	 //    //   dateFormat: 'dd/mm/yy',
	 //    //   changeMonth: true,
	 //    //   changeYear: true
	 //    //defaultDate: '20/03/2010'
	 //    // });

		// $('#datepicker').datetimepicker({

		// dateFormat: 'yy-mm-dd',
		// timeFormat: 'HH:mm:ss',
		// stepHour: 2,
		// stepMinute: 10,
		// stepSecond: 10
		// });
	 //  });
</script>