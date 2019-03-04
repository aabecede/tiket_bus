<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
    
     <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">

		<div class="col-lg-12 col-md-12">
			<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg></a></li>
				<li class="active"><?=$icon;?></li>
			</ol>
			</div><!--/.row-->
		</div>

		<div class="col-md-6 col-lg-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
						Event
				</div>
				<div class="panel-body">
						 <table id="tbl1" class="table table-striped table-bordered " cellspacing="0" width="100%">
						                    <thead>
						                        <tr>
						                            <th>No</th>
						                            <th>Event</th>
						                            <th>Tanggal Mulai</th>
						                            <th>Tanggal Akhir</th>
						                            <th>Aksi</th>
						                        </tr>
						                    </thead>
						                    <tbody>
						                        <?php 
						                        $no = 1;
						                        foreach ($event as $key => $value) { ?>
						                            <tr>
						                                <td><?php echo $no ?></td>
						                                <td><?php echo $value->event ?></td>
						                                <td><?php echo $value->mulai;?></td>
						                                <td><?php echo $value->akhir ?></td>
						                                <td>Aksi</td>
						                            </tr>
						                        <?php 
						                        $no++;
						                    } ?>
						                    </tbody>
						                    <tfoot>
						                        <tr>
						                            <td>No</td>
						                            <td>Event</td>
						                            <td>Tanggal Mulai</td>
						                            <td>Tanggal Akhir</td>
						                            <td>Aksi</td>
						                        </tr>
						                    </tfoot>
						                </table>
					</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-6">
			<div class="panel panel-info">
				<div class="panel-heading">
						Tambah Event
				</div>
				<div class="panel-body">
					<form action="<?php echo base_url('admin/ins_event');?>" method="post" enctype="multipart/form-data">
						<table class="table table-responsive">
							<tr>
								<td>Nama Event</td>
								<td><div class="col-md-8">
									<input type="text" name="event" class="form-control">
								</div></td>
							</tr>
							<tr>
								<td>Tanggal Mulai</td>
								<td>
									<div class="col-md-8">
										<div class="datepicker-center">
		                                	<div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
		                              			<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
		                                  		<input class="form-control" id="iddate" type="text" name="mulai" required=""  readonly="readonly">
		                                    </div>
		                                </div>
									</div>
								</td>
							</tr>
							<tr>
								<td>Tanggal Berakhir</td>
								<td>
									<div class="col-md-8">
										<div class="datepicker-center">
		                                	<div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
		                              			<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
		                                  		<input class="form-control" id="iddate" type="text" name="akhir" required=""  readonly="readonly">
		                                    </div>
		                                </div>
									</div>
								</td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" value="Tambah Event" class="btn btn-success"></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	   $('#tbl1').DataTable({
            "columnDefs": [{ 
                "targets": [ -1 ],
                "orderable": false,
            }]
        });
	$(".input-group.date").datepicker({autoclose: true, todayHighlight: true});
</script>