<!-- <?php //include_once("page_desktop/header.php"); flush();?>
<script>
    /*document.getElementById("myDropdown").classList.toggle("show");*/
</script> -->

<?php
	$id = $_GET['id'];
?>

<div class="container-fluid">
	<div class="row">
		<div class="container">

			<div class="row" style="margin-top: 25px; margin-bottom: 25px;">
				<div class="col-12">

					<div class="box_border">
						<div class="row">
							<div class="col-12" style="text-align: center;">
			                    <img src="<?php echo URL_IMG;?>images/PM-LOGO-1.png" style="max-height: 105px; padding-top: 25px; padding-bottom: 20px;" >
			                </div>
		            	</div>
		            	<div class="row">
		            		<div class="col-12" style="text-align: right;">
		            			<?php
		            				echo "PM Intermart"."<br>";
									echo "67/85 หมู่ที่ 6 ตำบล ไทรน้อย"."<br>";
									echo "นนทบุรี/ Nonthaburi"."<br>";
								?>
		            		</div>
		            	</div>
		            	<div class="row">
		            		<?php
		            			$array_order_address = array(':param_id_order' => $id);
		            			$str_order_address = "SELECT * FROM order_address WHERE id_order = :param_id_order";
		            			$result_order_address = $conn->prepare($str_order_address);
		            			$result_order_address->execute($array_order_address);
		            			$record_order_address = $result_order_address->fetch(PDO::FETCH_ASSOC);

		            			$array_district = array(':param_id_district' => $record_order_address['district']);
		            			$str_district = "SELECT name_th FROM districts 
		            			WHERE id = :param_id_district";
		            			$result_district = $conn->prepare($str_district);
		            			$result_district->execute($array_district);
		            			$record_district = $result_district->fetch(PDO::FETCH_ASSOC);

		            			$array_amphur = array(':param_id_amphur' => $record_order_address['amphur']);
		            			$str_amphur = "SELECT name_th FROM amphures WHERE id = :param_id_amphur";
		            			$result_amphur = $conn->prepare($str_amphur);
		            			$result_amphur->execute($array_amphur);
		            			$record_amphur = $result_amphur->fetch(PDO::FETCH_ASSOC);

		            			$array_province = array(':param_id_province' => $record_order_address['province']);
		            			$str_province = "SELECT name_th FROM provinces 
		            			WHERE id = :param_id_province";
		            			$result_province = $conn->prepare($str_province);
		            			$result_province->execute($array_province);
		            			$record_province = $result_province->fetch(PDO::FETCH_ASSOC);

		            			$delivery_address = $record_order_address['address']." ".
		            			$record_district['name_th']." ".$record_amphur['name_th']." ".
		            			$record_province['name_th']." ".$record_order_address['zipcode'];

		            		?>
		            		<div class="col-12"><?php echo $record_order_address['name']; ?></div>
		            		<div class="col-12"><?php echo $delivery_address; ?></div>
		            		<div class="col-12"><?php echo "โทรศัพท์ : ".$record_order_address['phone'].
		            		" อีเมล : ".$record_order_address['email']; ?></div>
		            	</div>
		            	<div class="row" style="margin-top: 25px; margin-bottom: 25px;">
		            		<div class="col-12">รายละเอียดคำสั่งซื้อ</div>
		            	</div>
		            	<?php
		            		$array_order_main = array(':param_id_order' => $id);
		            		$str_order_main = "SELECT * FROM order_main WHERE id = :param_id_order";
		            		$result_order_main = $conn->prepare($str_order_main);
		            		$result_order_main->execute($array_order_main);
		            		$record_order_main = $result_order_main->fetch(PDO::FETCH_ASSOC);
		            		$order_date = explode(" ", $record_order_main['order_datetime']);
		            	?>
		            	<div class="row">
		            		<div class="col-12">วันที่สั่งซื้อ : <?php echo $order_date[0]; ?></div>
		            		<div class="col-12">เลขที่สั่งซื้อ : <?php echo $record_order_main['id']; ?></div>
		            	</div>

		            	<div class="row" style="margin-top: 15px; margin-bottom: 15px;">
		            		<div class="col-12">
		            			<!-- -->
		            			<div class="table-responsive">
									<table class="table table-striped">
										<thead>
				    						<tr>
				    							<th scope="col" style="width: 5%; text-align: center;">#</th>	
												<th scope="col" style="width: 55%;" class="text-nowrap">รายการ</th>
												<th scope="col" style="width: 15%; text-align: right;">ราคา/หน่วย</th>
												<th scope="col" style="width: 10%; text-align: right;">จำนวน</th>
												<th scope="col" style="width: 15%; text-align: right;">ยอดสุทธิ</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											$array_order_detail = array(':param_id_order' => $id);
											$str_order_detail = "SELECT * FROM order_detail 
											WHERE id_order = :param_id_order";
											$result_order_detail = $conn->prepare($str_order_detail);
											$result_order_detail->execute($array_order_detail);

											$count_no = 0;
											$subtotal = 0;
											while($record_order_detail = $result_order_detail->fetch(PDO::FETCH_ASSOC)){
												$count_no++;
												$subtotal = $subtotal+$record_order_detail['sum_price'];
												$array_sku = 
												array(':param_sku_id' => $record_order_detail['id_product_sku']);
												$str_sku = "SELECT * FROM product_sku WHERE id = :param_sku_id";
												$result_sku = $conn->prepare($str_sku);
												$result_sku->execute($array_sku);
												$record_sku = $result_sku->fetch(PDO::FETCH_ASSOC);

												$array_product = 
												array(':param_product_id' => $record_sku['id_products_name']);
												$str_product = "SELECT name FROM product_name WHERE id = :param_product_id";
												$result_product = $conn->prepare($str_product);
												$result_product->execute($array_product);
												$record_product = $result_product->fetch(PDO::FETCH_ASSOC);
												$product_name = $record_product['name']." ".$record_sku['name'];
										?>
										
				    						<tr>
					    						<th scope="row" style="text-align: center;">
					    							<?php echo $count_no; ?>
												</th>	
												<td>
													<?php echo $product_name;?><br><?php echo $record_sku['sku_code']; ?>
												</td>
												<td style="text-align: right;">
													<?php 
														echo number_format($record_order_detail['product_sku_price']);
													?>
												</td>
												<td style="text-align: right;">
													<?php echo number_format($record_order_detail['quantity']); ?>
												</td>
												<td align="right">
													<div>
														<?php echo number_format($record_order_detail['sum_price']); ?>
													</div>
				                                </td>
											</tr>
										<?php
											}
										?>
										</tbody>

									</table>
								</div>
		            			<!-- -->
		            		</div>
		            	</div>
		            	<div class="row">
		            		<div class="col-12">ราคารวม : <?php echo number_format($subtotal); ?></div>
		            		<div class="col-12">สวนลด : -</div>
		            		<div class="col-12">ค่าขนส่ง : <?php echo number_format($record_order_main['order_shipping']); ?></div>
		            		<div class="col-12">ราคาสุทธิ : 
		            			<?php echo number_format($record_order_main['order_sum_price']); ?>
		            		</div>
		            	</div>

		            	<div class="row" style="margin-top: 35px; margin-bottom: 35px; text-align: center;">
		            		<div class="col-12">
		            			<span style="font-size:18px;">ขอบพระคุณสำหรับคำสั่งซื้อ</span>
		            		</div>
		            		<div class="col-12">
		                            <span style="font-size:18px;">
		                            	หากมีข้อสงสัยหรือต้องการสอบถามรายละเอียดเพิ่มเติม ได้ตามช่องทางต่อไปนี้
		                            </span>
		                        </div>
		                        <div class="col-12">
		                            <span style="font-size:16px;">
		                            	โทรศัพท์ : (02) 149 5471 อีเมล contact.pmintermart@gmail.com
		                        	</span>
		                        </div>
		                        
		            	</div>

					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<!-- 
<?php //include_once("page_desktop/footer.php");?> -->