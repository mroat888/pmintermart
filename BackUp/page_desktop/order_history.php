<?php include_once("page_desktop/header.php"); flush();?>
<script>
    /*document.getElementById("myDropdown").classList.toggle("show");*/
</script>

<div class="container-fluid">
	<div class="row">
		<div class="container">
			<div class="row" style="margin-top: 25px;">
				<div class="col-12">
					<h2>ประวัติการสั่งซื้อ</h2>
				</div>
				<div class="col-12">

					<div class="table-responsive">
						<table class="table table-striped">
						<thead>
    						<tr>
    							<th scope="col" style="width: 10%; text-align: center;">#</th>	
    							<th scope="col" style="width: 10%;" class="text-nowrap">วันที่สั่งซื้อ</th>
								<th scope="col" style="width: 10%; text-align: right;">ราคาสุทธิ</th>
								<th scope="col" style="width: 30%;">จัดส่งไปที่</th>
								<th scope="col" style="width: 15%; text-align: center;">สถานะ</th>
								<th scope="col" style="width: 15%; text-align: center;">แจ้งชำระเงิน</th>
								<th scope="col" style="width: 10%; text-align: center;">เอกสาร</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$countNo = 0;
								while($record_order_main = $result_order_main->fetch(PDO::FETCH_ASSOC)){
									$order_date = explode(" ", $record_order_main['order_datetime']);

									$array_order_process = array(
										':param_id_order_process' => $record_order_main['id_order_process']
									);
									$str_order_process = "SELECT id, name FROM order_process WHERE id = :param_id_order_process";
									$result_order_process = $conn->prepare($str_order_process);
									$result_order_process->execute($array_order_process);
									$record_order_process = $result_order_process->fetch(PDO::FETCH_ASSOC);
							?>
							<tr>
	    						<th scope="row" style="text-align: center;">
	    							<?php echo ++$countNo; ?>
								</th>	
								<td><?php echo $order_date[0]; ?></td>
								<td style="text-align: right;">
									<?php echo number_format($record_order_main['order_sum_price']); ?>
								</td>
								<td>
							<?php
		            			$array_order_address = array(':param_id_order' => $record_order_main['id']);
		            			$str_order_address = "SELECT * FROM order_address WHERE id_order = :param_id_order";
		            			$result_order_address = $conn->prepare($str_order_address);
		            			$result_order_address->execute($array_order_address);
		            			$record_order_address = $result_order_address->fetch(PDO::FETCH_ASSOC);

								if($record_order_address['district'] != ""){
									$array_district = array(':param_id_district' => $record_order_address['district']);
									$str_district = "SELECT name_th FROM districts 
									WHERE id = :param_id_district";
									$result_district = $conn->prepare($str_district);
									$result_district->execute($array_district);
									$record_district = $result_district->fetch(PDO::FETCH_ASSOC);
								}
								if($record_order_address['amphur'] != ""){
									$array_amphur = array(':param_id_amphur' => $record_order_address['amphur']);
									$str_amphur = "SELECT name_th FROM amphures WHERE id = :param_id_amphur";
									$result_amphur = $conn->prepare($str_amphur);
									$result_amphur->execute($array_amphur);
									$record_amphur = $result_amphur->fetch(PDO::FETCH_ASSOC);
								}
								if($record_order_address['province'] != ""){
									$array_province = array(':param_id_province' => $record_order_address['province']);
									$str_province = "SELECT name_th FROM provinces 
									WHERE id = :param_id_province";
									$result_province = $conn->prepare($str_province);
									$result_province->execute($array_province);
									$record_province = $result_province->fetch(PDO::FETCH_ASSOC);
								}
								if($record_order_address['address'] != "" && $record_district['name_th'] != "" && 
									$record_amphur['name_th'] != "" && $record_province['name_th'] != "" 
									&& $record_order_address['zipcode'] != "" ){
									$delivery_address = $record_order_address['address']." ".
									$record_district['name_th']." ".$record_amphur['name_th']." ".
									$record_province['name_th']." ".$record_order_address['zipcode'];
								}
		            		?>
		            			<?php 
									if(isset($delivery_address) && $delivery_address != ""){
										echo $delivery_address; 
									}
								?>
								</td>
								<td style="text-align: center;">
									<?php echo $record_order_process['name'];?>	
								</td>
								<td style="text-align: center;">
							<?php

								if($record_order_process['id'] == "1"){
							?>
									<a href="<?php echo URL; ?>payment.php?id=<?=$record_order_main['id']?>"
										class="text_link_white">
										แจ้งชำระเงิน
									</a>
							<?php
								}else{
							?>
										แจ้งชำระแล้ว
							<?php
								}
							?>
								</td>
								<td style="text-align: center;">
									<a href="<?php echo URL; ?>order_display.php?id=<?=$record_order_main['id']?>" target="_blank" class="text_link_white">ดูรายละเอียด</a>
								</td>
							</tr>
							<?php
								}
							?>
						</tbody>
						</table>
					</div>
					
				</div>
			</div>

		</div>
	</div>
</div>

<?php include_once("page_desktop/footer.php");?>