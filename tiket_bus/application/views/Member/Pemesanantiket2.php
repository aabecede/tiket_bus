<?php
function pre($var){
	echo '<pre>';
	print_r($var);
	echo '</pre>';
}

$_JmlSheet = $get_shet->jumlah;
echo '<table class="table table-responsive">';
$no=1;
foreach ($sheet as $key => $value) {
								if($no <= 10)
								{
									?>
								<tr>
									<td>
										<input type="checkbox" name="sheet[]" class="form-control" value="<?php echo $value->sheet1;?>"><?php echo $value->sheet1;?></td>
									<td><input type="checkbox" name="sheet[]" class="form-control" value="<?php echo $value->sheet2;?>"><?php echo $value->sheet2;?></td></td>
									
									<td></td>
									<td><input type="checkbox" name="sheet[]" class="form-control" value="<?php echo $value->sheet3;?>"><?php echo $value->sheet3;?></td>
									<td><input type="checkbox" name="sheet[]" class="form-control" value="<?php echo $value->sheet4;?>"><?php echo $value->sheet4;?></td>
									<td><input type="checkbox" name="sheet[]" class="form-control" value="<?php echo $value->sheet5;?>"><?php echo $value->sheet5;?></td>
								</tr>
									<?php
								}elseif($no == 11){
									
									?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td><input type="checkbox" name="sheet[]" class="form-control" value="<?php echo $value->sheet3;?>"><?php echo $value->sheet3;?></td>
									<td><input type="checkbox" name="sheet[]" class="form-control" value="<?php echo $value->sheet4;?>"><?php echo $value->sheet4;?></td>
									<td><input type="checkbox" name="sheet[]" class="form-control" value="<?php echo $value->sheet5;?>"><?php echo $value->sheet5;?></td>
								</tr>
									<?php
								}else{
									?>
									<td><input type="checkbox" name="sheet[]" class="form-control" value="<?php echo $value->sheet1;?>"><?php echo $value->sheet1;?></td>
									<td><input type="checkbox" name="sheet[]" class="form-control" value="<?php echo $value->sheet2;?>"><?php echo $value->sheet2;?></td></td>
									<td><input type="checkbox" name="sheet[]" class="form-control" value="<?php echo $value->sheet3;?>"><?php echo $value->sheet3;?></td>
									<td><input type="checkbox" name="sheet[]" class="form-control" value="<?php echo $value->sheet4;?>"><?php echo $value->sheet4;?></td>
									<td><input type="checkbox" name="sheet[]" class="form-control" value="<?php echo $value->sheet5;?>"><?php echo $value->sheet5;?></td>
									<td><input type="checkbox" name="sheet[]" class="form-control" value="<?php echo $value->sheet6;?>"><?php echo $value->sheet6;?></td>
									<?php
								}
								#var_dump($no);
								
								$no++;
							}
echo '</table>';

#pre($_JmlSheet);

?>