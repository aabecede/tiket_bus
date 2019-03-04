<div class="row">
	<div class="container">
		<div class="col-md-3 col-lg-3 col-sm-3">
		</div>
		<div class="col-md-6 col-lg-6 col-sm-6">
			<h4 align="center">Pemesanan Tiket</h4>
			<table class="table table-responsive">
				<tr>
					<td>Nama Bus</td>
					<td>
						<div class="col-md-12">
							<?php echo $bus->bus;?>
						</div>
					</td>
				</tr>
				<tr>
					<td>Tujuan</td>
					<td>
						<div class="col-md-6">
							<?php echo $bus->naju;?>
						</div>
					</td>
				</tr>
				<tr>
					<td>Berangkat Dari</td>
					<td>
						<div class="col-md-6">
							<?php echo $bus->dari;?>
						</div>
					</td>
				</tr>
				<tr>
					<td>Berangkat Hari</td>
					<td>
						<div class="col-md-6">
							<?php echo $bus->namahari;?>
						</div>
					</td>
				</tr>
				<tr>
					<td>Jam Keberangkatan</td>
					<td>
						<div class="col-md-6">
							<?php echo $bus->jamberangkat;?>
						</div>
					</td>
				</tr>
				<tr>
					<td>Harga Tiket</td>
					<td>
						<div class="col-md-6">
							<?php echo 'Rp. '.number_format($bus->harga);?>
						</div>
					</td>
				</tr>
				<tr>
					<td>Jenish dan Jumlah Sheet</td>
					<td>
						<div class="col-md-6">
							<?php echo 'Jenis : '.$bus->jenis.'<br>Jumlah :'.$bus->jumlah;?>
						</div>
					</td>
				</tr>
				<tr>
					<td>Denah Kursi</td>
					<td>
						<div class="col-md-12">
							<?php
							#var_dump($sheet);
							echo '
							<form action="'.base_url('member/ins_tiket').'" method="post" enctype="multipart/form-data">
							<table class="table table-responsive">
							<input type="hidden" name="idjadwal" value="'.$bus->idj.'">
							<input type="hidden" name="idbus" value="'.$bus->idd.'">
							<input type="hidden" name="harga" value="'.$bus->harga.'">
							<tr>
								<td colspan="2">Kernet</td>
								<td> CD </td>
								<td colspan="3">Sopir</td>
							</tr>';
							$no = 1;

							
							
							foreach ($sheet as $key => $value) {
								if($key <= 10)
								{
									?>
								<tr>
									<?php

									if(@$true1[$no] == true){
										echo '<td><input type="checkbox" disabled name="sheet[]" class="form-control" value="'.$value->sheet1.'">'.$value->sheet1.'</td>';
									}else{
										echo '<td><input type="checkbox" name="sheet[]" class="form-control" value="'.$value->sheet1.'">'.$value->sheet1.'</td>';
									}

									if(@$true2[$no+1] == true){
										echo '<td><input type="checkbox" disabled name="sheet[]" class="form-control" value="'.$value->sheet2.'">'.$value->sheet2.'</td>';
									}else{
										echo '<td><input type="checkbox" name="sheet[]" class="form-control" value="'.$value->sheet2.'">'.$value->sheet2.'</td>';
									}
									 echo '<td></td>';
									 if(@$true3[$no+2] == true){
										echo '<td><input type="checkbox" disabled name="sheet[]" class="form-control" value="'.$value->sheet3.'">'.$value->sheet3.'</td>';
									}else{
										echo '<td><input type="checkbox" name="sheet[]" class="form-control" value="'.$value->sheet3.'">'.$value->sheet3.'</td>';
									}
									if(@$true4[$no+3] == true){
										echo '<td><input type="checkbox" disabled name="sheet[]" class="form-control" value="'.$value->sheet4.'">'.$value->sheet4.'</td>';
									}else{
										echo '<td><input type="checkbox" name="sheet[]" class="form-control" value="'.$value->sheet4.'">'.$value->sheet4.'</td>';
									}
									if(@$true5[$no+4] == true){
										echo '<td><input type="checkbox" disabled name="sheet[]" class="form-control" value="'.$value->sheet5.'">'.$value->sheet5.'</td>';
									}else{
										echo '<td><input type="checkbox" name="sheet[]" class="form-control" value="'.$value->sheet5.'">'.$value->sheet5.'</td>';
									}

									?>
								</tr>
									<?php
								}/*elseif($no == 11){
									
									?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<?php

									if(@$true3[$no+3] == true){
										echo '<td><input type="checkbox" disabled name="sheet[]" class="form-control" value="'.$value->sheet3.'">'.$value->sheet3.'</td>';
									}else{
										echo '<td><input type="checkbox" name="sheet[]" class="form-control" value="'.$value->sheet3.'">'.$value->sheet3.'</td>';
									}

									if(@$true4[$no+4] == true){
										echo '<td><input type="checkbox" disabled name="sheet[]" class="form-control" value="'.$value->sheet4.'">'.$value->sheet4.'</td>';
									}else{
										echo '<td><input type="checkbox" name="sheet[]" class="form-control" value="'.$value->sheet4.'">'.$value->sheet4.'</td>';
									}

									if(@$true5[$no+5] == true){
										echo '<td><input type="checkbox" disabled name="sheet[]" class="form-control" value="'.$value->sheet5.'">'.$value->sheet5.'</td>';
									}else{
										echo '<td><input type="checkbox" name="sheet[]" class="form-control" value="'.$value->sheet5.'">'.$value->sheet5.'</td>';
									}

									?>
								</tr>
									<?php
								}else{
									

									if(@$true1[$no] == true){
										echo '<td><input type="checkbox" disabled name="sheet[]" class="form-control" value="'.$value->sheet1.'">'.$value->sheet1.'</td>';
									}else{
										echo '<td><input type="checkbox" name="sheet[]" class="form-control" value="'.$value->sheet1.'">'.$value->sheet1.'</td>';
									}

									if(@$true2[$no+1] == true){
										echo '<td><input type="checkbox" disabled name="sheet[]" class="form-control" value="'.$value->sheet2.'">'.$value->sheet2.'</td>';
									}else{
										echo '<td><input type="checkbox" name="sheet[]" class="form-control" value="'.$value->sheet2.'">'.$value->sheet2.'</td>';
									}
									 
									 if(@$true3[$no+2] == true){
										echo '<td><input type="checkbox" disabled name="sheet[]" class="form-control" value="'.$value->sheet3.'">'.$value->sheet3.'</td>';
									}else{
										echo '<td><input type="checkbox" name="sheet[]" class="form-control" value="'.$value->sheet3.'">'.$value->sheet3.'</td>';
									}

									if(@$true4[$no+3] == true){
										echo '<td><input type="checkbox" disabled name="sheet[]" class="form-control" value="'.$value->sheet4.'">'.$value->sheet4.'</td>';
									}else{
										echo '<td><input type="checkbox" name="sheet[]" class="form-control" value="'.$value->sheet4.'">'.$value->sheet4.'</td>';
									}

									if(@$true5[$no+4] == true){
										echo '<td><input type="checkbox" disabled name="sheet[]" class="form-control" value="'.$value->sheet5.'">'.$value->sheet5.'</td>';
									}else{
										echo '<td><input type="checkbox" name="sheet[]" class="form-control" value="'.$value->sheet5.'">'.$value->sheet5.'</td>';
									}

									

								}*/
								#var_dump($no);
								$no = $no +5;
								#$no++;
							}
							echo '
							<tr>
								<td colspan="3"></td>
								<td colspan="4">
								<input type="submit" value="Pesan" class="btn btn-success">
								</td>
							</tr>
							</table>';
							?>
						</div>
					</td>
				</tr>
			</table>
		</div>
		<div class="col-md-3 col-lg-3 col-sm-3">
		</div>
	</div>
</div>