<?php include_once("page_mobile/menu_header.php"); flush();?>

<form class="form-inline" name="form1" method="post" enctype="multipart/form-data" 
action="<?php echo URL; ?>shoppingcart_aed.php?typ=update">
<div class="container-fluid">
	<div class="row">
		<div class="container">

			<div class="row">
				<div class="col-12">
					<h1>ตะกร้าสินค้า (<?php echo count($_SESSION['cart_id']); ?> รายการ)</h1>
				</div>				
			</div>

			<div class="row">
				<div class="col-12">

					<div class="table-responsive">
					<table class="table table-striped">
						<thead>
    						<tr>
    							<th scope="col" style="width: 10%; text-align: center;">#</th>	
								<th scope="col" style="width: 60%;" class="text-nowrap">รายการ</th>
								<th scope="col" style="width: 10%; text-align: right;">ราคา/หน่วย</th>
								<th scope="col" style="width: 10%;">จำนวน</th>
								<th scope="col" style="width: 10%; text-align: right;">ยอดสุทธิ</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							$summary_price = 0;
							foreach($_SESSION['cart_id'] as $key=>$value){
								$array_sku = array(':param_sku_id' => $value);
								$str_sku = "SELECT * FROM product_sku WHERE id = :param_sku_id";
								$result_sku = $conn->prepare($str_sku);
								$result_sku->execute($array_sku);
								$record_sku = $result_sku->fetch(PDO::FETCH_ASSOC);

								$array_product = array(':param_product_id' => $record_sku['id_products_name']);
								$str_product = "SELECT name FROM product_name WHERE id = :param_product_id";
								$result_product = $conn->prepare($str_product);
								$result_product->execute($array_product);
								$record_product = $result_product->fetch(PDO::FETCH_ASSOC);
								$product_name = $record_product['name']." ".$record_sku['name'];

								$total_price = $_SESSION['cart_num'][$key]*$record_sku['price'];
								$summary_price = $summary_price+$total_price;
						?>
						
    						<tr>
	    						<th scope="row">
	    							<img src="<?php echo URL_IMG.FOLDER_SKU."/".$record_sku['sku_code']."__1.jpg"; ?>" 
									style="max-width:50px;" class="rounded mx-auto d-block" alt="<?php echo $product_name; ?>" draggable="false">
								</th>	
								<td>
									<?php echo $product_name;?><br><?php echo $record_sku['sku_code']; ?>
									
								</td>
								<td style="text-align: right;"><?php echo $record_sku['price'];?></td>
								<td>
		                            <input type="hidden" id="sku_id[]" name="sku_id[]" value="<?php echo $value;?>">
		                            <input type="number" id="quantity[]"name="quantity[]" 
		                            min="1" value ="<?php echo $_SESSION['cart_num'][$key];?>" 
		                            placeholder="จำนวน" style="width: 100%;"> 
		                            <?php
		                            	$permalink = URL."products_display.php?id=".$record_sku['id'];
		                            ?>
		                            <div>
		                            	<a href="<?php echo $permalink;?>" style="font-size: 14px;"><i class="fas fa-pen"></i></a>
		                            </div>
								</td>
								<td align="right">
									<div><?php echo number_format($total_price); ?></div>
									<div>
	                                    <a href="javascript:void(0)" onClick="javascript:delid(<?=$key?>);">
	                                        <i class="fas fa-trash-alt"></i>
	                                    </a>
                                	</div>
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
			<hr>
			<div class="row" style="text-align: right;">
				<div class="col-12">
					<button type="submit" class="btn bg_yellow">แก้ไขคำสั่งซื้อ</button>
				</div>
			</div>

			<div class="row" style="margin-top: 35px;">
				<div class="col-12" style="font-weight: bold;">
					<div class="row">
						<div class="col-12">สรุปยอดการสั่งซื้อ</div>
					</div>
					<hr>
					<div class="row" style="margin-top: 15px;">
						<div class="col-6">มูลค่าสินค้า</div>
						<div class="col-6" style="text-align: right;"><?php echo number_format($summary_price);?></div>
					</div>
					<div class="row" style="margin-top: 15px;">
						<div class="col-6">ค่าจัดส่ง</div>
						<div class="col-6" style="text-align: right;"></div>
					</div>
					<hr>
					<div class="row">
						<div class="col-6">ยอดรวมทั้งหมด</div>
						<div class="col-6" style="text-align: right;"><?php echo number_format($summary_price);?></div>
					</div>
					<div class="row" style="margin-top: 35px; margin-bottom: 35px;">
						<div class="col-12" style="text-align: right;">
						<?php
							if(isset($_SESSION['memid']) && $_SESSION['memid'] != ""){
						?>
								<button type="button" class="btn bg_yellow" 
								onclick="javascript:window.location.href='shoppingcart_step2.php'">ดำเนินการต่อ <i class="fas fa-arrow-right"></i></button>
						<?php
							}else{
						?>
								<a href="<?php echo URL;?>login.php" data-toggle="modal" data-target="#Modallogin">
									<button type="button" class="btn bg_yellow">ดำเนินการต่อ <i class="fas fa-arrow-right"></i></button>
								</a>
								
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
</form>

<?php include_once("page_mobile/footer.php");?>
