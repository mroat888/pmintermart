<?php include_once("page_desktop/header.php"); flush();?>
<script>
    /*document.getElementById("myDropdown").classList.toggle("show");*/
</script>

<?php
	/*$param_provin = array('PROVINCE_ID' => $_SESSION['tprovince']);
	/*$str_province = "select PROVINCE_ID, PROVINCE_NAME from province 
	where PROVINCE_ID = :PROVINCE_ID order by PROVINCE_NAME";*/
	$param_provin = array(':PROVINCE_ID' => $_SESSION['tprovince']);
	$str_province = "select id, name_th from provinces where id = :PROVINCE_ID order by name_th";
	$result_province = $conn->prepare($str_province);
	$result_province->execute($param_provin);
	$record_province = $result_province->fetch(PDO::FETCH_ASSOC);
	$province = $record_province['name_th'];

	/*$param_amphur = array('AMPHUR_ID' => $_SESSION['tamphur']);
	$str_amphur = "select AMPHUR_ID, AMPHUR_NAME from amphur 
	where AMPHUR_ID = :AMPHUR_ID order by AMPHUR_NAME";*/
	$param_amphur = array(':AMPHUR_ID' => $_SESSION['tamphur']);
	$str_amphur = "select id, name_th from amphures where id = :AMPHUR_ID order by name_th";
	$result_amphur = $conn->prepare($str_amphur);
	$result_amphur->execute($param_amphur);
	$record_amphur = $result_amphur->fetch(PDO::FETCH_ASSOC);
	$amphur = $record_amphur['name_th'];

	/*$param_district = array('DISTRICT_ID' => $_SESSION['tdistrict']);
	$str_district= "select DISTRICT_ID, DISTRICT_NAME from district 
	where DISTRICT_ID = :DISTRICT_ID order by DISTRICT_NAME";*/
	$param_district = array(':DISTRICT_ID' => $_SESSION['tdistrict']);
	$str_district= "select id, name_th from districts where id = :DISTRICT_ID order by name_th";
	$result_district = $conn->prepare($str_district);
	$result_district->execute($param_district);
	$record_district = $result_district->fetch(PDO::FETCH_ASSOC);
	$district = $record_district['name_th'];

?>

<!-- <form name="form1" action="<?php echo URL."confirm_order.php"; ?>"> -->
<div class="container-fluid">
	<div class="row" style="margin-top: 35px; margin-bottom: 35px;">
		
		<div class="container">
			<div class="row">
				<div class="col-8">
					<div class="box_predetail">
						<div class="col-12"><strong>ข้อมูลที่อยู่ผู้รับสินค้า</strong></div>
						<div class="col-12"><hr></div>
						<div class="col-12" style="margin-top: 15px;"><?php echo $_SESSION['tname']; ?></div>
						<?php 
							$address = $_SESSION['taddress']."<br>ตำบล ".$district." อำเภอ "
							.$amphur." จังหวัด ".$province." ".$_SESSION['tzipcode']; 
						?>
						<div class="col-12" style="margin-top: 15px;"><?php echo $address; ?></div>
						<div class="col-12" style="margin-top: 15px;">โทรศัพท์ : <?php echo $_POST['tphone']; ?></div>
						<div class="col-12" style="margin-top: 15px;">อีเมล : 
						<?php if(isset($_SESSION['temail'])){ echo $_SESSION['temail']; } ?></div>
					</div>

					<div class="box_predetail" style="margin-top: 25px;">
						<div class="col-12"><strong>รายการสินค้า</strong></div>
						<div class="col-12"><hr></div>
						<div class="col-12">
							<div class="table-responsive">
								<table class="table table-striped">
									<thead>
			    						<tr>
			    							<th scope="col" style="width: 10%; text-align: center;">#</th>	
											<th scope="col" style="width: 60%;" class="text-nowrap">รายการ</th>
											<th scope="col" style="width: 15%; text-align: right;">ราคา/หน่วย</th>
											<th scope="col" style="width: 15%; text-align: right;">ยอดสุทธิ</th>
										</tr>
									</thead>
									<tbody>
									<?php 
										// $summary_price = 0;
										// foreach($_SESSION['cart_id'] as $key=>$value){
										// 	$array_sku = array(':param_sku_id' => $value);
										// 	$str_sku = "select * from product_sku where id = :param_sku_id";
										// 	$result_sku = $conn->prepare($str_sku);
										// 	$result_sku->execute($array_sku);
										// 	$record_sku = $result_sku->fetch(PDO::FETCH_ASSOC);

										// 	$array_product = array(':param_product_id' => $record_sku['id_products_name']);
										// 	$str_product = "select name from product_name where id = :param_product_id";
										// 	$result_product = $conn->prepare($str_product);
										// 	$result_product->execute($array_product);
										// 	$record_product = $result_product->fetch(PDO::FETCH_ASSOC);
										// 	$product_name = $record_product['name']." ".$record_sku['name'];

										// 	$total_price = $_SESSION['cart_num'][$key]*$record_sku['price'];
										// 	$summary_price = $summary_price+$total_price;

										$summary_price = 0;
										$box_weight = 0;
										$box_w = 0;
										$box_l = 0;
										$box_h = 0;
										foreach($_SESSION['cart_id'] as $key=>$value){
											$array_sku = array(':param_sku_id' => $value);
											$str_sku = "select * from product_sku where id = :param_sku_id";
											$result_sku = $conn->prepare($str_sku);
											$result_sku->execute($array_sku);
											$record_sku = $result_sku->fetch(PDO::FETCH_ASSOC);

											$array_product = array(':param_product_id' => $record_sku['id_products_name']);
											$str_product = "select id, name, box_weight, box_width, box_long, box_height from product_name where id = :param_product_id";
											$result_product = $conn->prepare($str_product);
											$result_product->execute($array_product);
											$record_product = $result_product->fetch(PDO::FETCH_ASSOC);
											$product_name = $record_product['name']." ".$record_sku['name'];

											$total_price = $_SESSION['cart_num'][$key]*$record_sku['price'];
											$summary_price = $summary_price+$total_price;

											$weight = $_SESSION['cart_num'][$key]*$record_product['box_weight'];
											$bw = $_SESSION['cart_num'][$key]*$record_product['box_width'];
											$bl = $_SESSION['cart_num'][$key]*$record_product['box_long'];
											$bh = $_SESSION['cart_num'][$key]*$record_product['box_height'];

											$box_weight = $box_weight+$weight;
											$box_w = $box_w+$bw;
											$box_l = $box_l+$bl;
											$box_h = $box_h+$bh;
									?>
									
			    						<tr>
				    						<th scope="row">
				    							<img src="<?php echo URL_IMG.FOLDER_SKU."/".$record_sku['sku_code']."__1.jpg"; ?>" 
												style="max-width:80px;" class="rounded mx-auto d-block" alt="<?php echo $product_name; ?>" draggable="false">
											</th>	
											<td>
												<?php echo $product_name;?><br><?php echo $record_sku['sku_code']; ?>
											</td>
											<td style="text-align: right;">
												<?php echo $record_sku['price'];?> x 
												<?php echo $_SESSION['cart_num'][$key];?>	
											</td>
											<td align="right">
												<div><?php echo number_format($total_price); ?></div>
			                                </td>
										</tr>
									<?php
										}
										//echo $box_w."+".$box_l."+".$box_h."+".$box_weight;
										$shipprice = $shippingrates->shippingPrice($box_w,$box_l,$box_h,$box_weight,$_SESSION['tprovince']);
										$summary_netprice = $summary_price+$shipprice;
										$_SESSION['summary_netprice'] = $summary_netprice;
									?>
									</tbody>

								</table>
							</div>
						</div>
					</div>
					<div class="col-12" style="margin-top: 2em; margin-bottom: 2em">
						<!-- <button type="button" class="btn bg_yellow" 
						onclick="javascript:history.back();"><i class="fas fa-arrow-left"></i> ย้อนกลับ</button> -->
						<button type="button" class="btn bg_yellow" 
						onclick="javascript:backpage_step2();"><i class="fas fa-arrow-left"></i> ย้อนกลับ</button>
					</div>
				</div>
				<div class="col-4" style="font-weight: bold;">
					<div class="col-12">
						<div class="row">
							<div class="col-12">รายการชำระเงิน</div>
						</div>
						<hr>
						<div class="row" style="margin-top: 15px;">
							<div class="col-6">มูลค่าสินค้า</div>
							<div class="col-6" style="text-align: right;"><?php echo number_format($summary_price);?></div>
						</div>
						<div class="row" style="margin-top: 15px;">
							<div class="col-6">สวนลด</div>
							<div class="col-6" style="text-align: right;"></div>
						</div>
						<div class="row" style="margin-top: 15px;">
							<div class="col-6">ค่าจัดส่ง</div>
							<div class="col-6" style="text-align: right;">
								<?php echo number_format($shipprice); ?>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-6">ยอดรวมทั้งหมด</div>
							<div class="col-6" style="text-align: right;"><?php echo number_format($_SESSION['summary_netprice']);?></div>
						</div>
						<hr>
						<div class="row" style="text-align: right; margin-top: 35px; margin-bottom: 35px;">
							<div class="col-12">
							<?php
								if(isset($_SESSION['tpayment'])){
								    //$_SESSION['summary_netprice'] = $summary_netprice*100;
									if($_SESSION['tpayment'] == "credit_card"){
										include_once("vendor_payment/payment.php");
									}else{
							?>
										<button type="submit" class="btn bg_yellow" onclick="comfirm_order();">
											<i class="fas fa-save"></i> ยืนยันการสั่งซื้อ
										</button>
							<?php
									}
								}else{
							?>
								<button type="submit" class="btn bg_yellow" onclick="comfirm_order();">
									<i class="fas fa-save"></i> ยืนยันการสั่งซื้อ
								</button>
							<?php
								}
							?>

							</div>

							
						</div>
					</div>
				</div>		

			</div>
		</div>

		
	</div>
</div>
<!-- </form> -->


<?php include_once("page_desktop/footer.php");?>