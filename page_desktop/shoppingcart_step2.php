<?php include_once("page_desktop/header.php"); flush();?>
<script>
    /*document.getElementById("myDropdown").classList.toggle("show");*/
</script>

<form name="form1" method="post" action="<?php echo URL; ?>shoppingcart_step3.php">
<div class="container-fluid">
	<div class="row" style="margin-top: 35px; margin-bottom: 35px;">
		
		<div class="container">
			<div class="row">
				<div class="col-8">
				<div class="box_predetail">
					<div class="col-12"><strong>ข้อมูลผู้รับสินค้า</strong></div>
					<hr>
					
					<div class="col-12">
						<div class="form-group">
						    <label for="tname">ชื่อ - นามสกุล</label>
						    <?php  if(isset($_SESSION['tname']) && $_SESSION['tname'] !=""){?>
                            		    <input type="text" class="form-control" id="tname" name="tname" style="width:100%" placeholder="ชื่อโรงแรม/ชื่อบริษัท/ชื่อผู้ติดต่อ" value="<?=$_SESSION['tname']?>" required="required">
                            <?php  	}else{ ?>
                                        <input type="text" class="form-control" id="tname" name="tname" placeholder="ชื่อโรงแรม/ชื่อบริษัท/ชื่อผู้ติดต่อ" required="required">
                            <?php  }  ?>
						</div>
						<div class="form-group">
						   	<label for="tphone">เบอร์โทรศัพท์</label>
						    <?php  if(isset($_SESSION['tphone']) && $_SESSION['tphone'] !=""){ ?>
                                        <input type="text" class="form-control" id="tphone" name="tphone" placeholder="เบอร์โทรศัพท์" value="<?=$_SESSION['tphone']?>" required="required">
                            <?php  }else{ ?>
                                        <input type="text" class="form-control" id="tphone" name="tphone" placeholder="เบอร์โทรศัพท์" required="required">
                            <?php  }  ?>
						</div>
						<div class="form-group">
						   	<label for="temail">Email Address</label>
						    <?php  if(isset($_SESSION['temail']) && $_SESSION['temail'] !=""){ ?>
                                        <input type="email" class="form-control" id="temail" name="temail" placeholder="Email Address" value="<?=$_SESSION['temail']?>" required="required">
                            <?php  	}else{ ?>
                                    	<input type="email" class="form-control" id="temail" name="temail" placeholder="Email Address" required="required">
                            <?php  }  ?>
						</div>
						<div class="form-group">
						    <label for="exampleFormControlTextarea1">ที่อยู่</label>
						    <?php  if(isset($_SESSION['taddress']) && $_SESSION['taddress'] !=""){ ?>
						    			<textarea class="form-control" id="exampleFormControlTextarea1" id="taddress"
						    			name = "taddress" rows="3" required="required"><?php echo $_SESSION['taddress']; ?></textarea>
						    <?php 	}else{ ?>
						    			<textarea class="form-control" id="exampleFormControlTextarea1" id="taddress"
						    			name = "taddress" rows="3" required="required"></textarea>
						    <?php 	} ?>
						</div>
						<div class="form-row">
						    <div class="form-group col-6">
						    	<label for="inputEmail4">จังหวัด *</label>
						      	<select class="form-control" id="tprovince" name="tprovince" 
								  	onchange="choose_amphur(this);">
													<option value="0" selected="selected">-- จังหวัด --</option>
										<?php 
												$str_province = "select id, name_th from provinces order by name_th";
												$result = $conn->prepare($str_province);
												$result->execute();
												while($record = $result->fetch(PDO::FETCH_ASSOC)){
													if($_SESSION['tprovince'] == $record['id']){
										?>
													<option value="<?php echo $record['id']?>" selected><?php echo $record['name_th']?></option>
										<?php       }else{    ?>
													<option value="<?php echo $record['id']?>"><?php echo $record['name_th']?></option>
										<?php   
													}
												}   
										?>  
								</select>
						    </div>
						    <div class="form-group col-6">
						      	<label for="inputPassword4">อำเภอ/เขต *</label>
						    	<select class="form-control" id="tamphur" name="tamphur" 
						    		onchange="choose_district(this);">
										<?php
												if($_SESSION['tamphur'] !="" && $_SESSION['tprovince'] !=""){
													$param_amphur = array('PROVINCE_ID' => $_SESSION['tprovince']);
													$str_amphur = "select id, name_th from amphures 
													where province_id = :PROVINCE_ID order by name_th";
													$result = $conn->prepare($str_amphur);
													$result->execute($param_amphur);
													while($record = $result->fetch(PDO::FETCH_ASSOC)){
														if($_SESSION['tamphur'] == $record['id']){
										?>
														<option value="<?php echo $record['id']?>" selected><?php echo $record['name_th']?></option>
										<?php 			}else{    ?>
														<option value="<?php echo $record['id']?>"><?php echo $record['name_th']?></option>
										<?php
														}
													}
												}else{
										?>
												  <option value="0">-- อำเภอ/เขต --</option>
										<?php   }    ?>
								</select>
						    </div>
						</div>
						<div class="form-row">
						    <div class="form-group col-6">
						      	<label for="inputEmail4">ตำบล/แขวง</label>
						      	<select class="form-control" id="tdistrict" name="tdistrict" onchange="choose_zipcode(this);">
										<?php
												if($_SESSION['tdistrict'] !="" && $_SESSION['tamphur']){;
													$param_district = array('AMPHUR_ID' => $_SESSION['tamphur']);
													$str_district= "select id, name_th from districts 
													where amphure_id = :AMPHUR_ID order by name_th";
													$result = $conn->prepare($str_district);
													$result->execute($param_district);
													while($record = $result->fetch(PDO::FETCH_ASSOC)){
														if($_SESSION['tdistrict'] == $record['id']){
										?>
														<option value="<?php echo $record['id']?>" selected><?php echo $record['name_th']?></option>
										<?php 			}else{    ?>
														<option value="<?php echo $record['id']?>"><?php echo $record['name_th']?></option>
										<?php
														}
													}
												}else{
										?>
												  <option value="0">-- ตำบล/แขวง --</option>
										<?php   }    ?>
								</select>
						    </div>
						    <div class="form-group col-6">
						      	<label for="zipcode">รหัสไปรษณีย์</label>
						      	<?php  if(isset($_SESSION['tzipcode']) && $_SESSION['tzipcode'] !=""){ ?>
						      		<input type="text" class="form-control" id="tzipcode" name="tzipcode" 
						      		value="<?php echo $_SESSION['tzipcode']; ?>" required="required">
							     <?php }else{ ?>
							     	<input type="text" class="form-control" id="tzipcode" name="tzipcode" 
						      		required="required">
							     <?php } ?>
						    </div>
						</div>
					</div>
				</div>
				<div class="col-12" style="margin-top: 2em; margin-bottom: 2em">
					<button type="button" class="btn bg_yellow" 
					onclick="javascript:history.back();"><i class="fas fa-arrow-left"></i> ย้อนกลับ</button>
				</div>
				</div>

				<div class="col-4">
					<div class="col-12" style="font-weight: bold;">
					<?php 
						$summary_price = 0;
						foreach($_SESSION['cart_id'] as $key=>$value){
							$array_sku = array(':param_sku_id' => $value);
							$str_sku = "select * from product_sku where id = :param_sku_id";
							$result_sku = $conn->prepare($str_sku);
							$result_sku->execute($array_sku);
							$record_sku = $result_sku->fetch(PDO::FETCH_ASSOC);

							$array_product = array(':param_product_id' => $record_sku['id_products_name']);
							$str_product = "select name from product_name where id = :param_product_id";
							$result_product = $conn->prepare($str_product);
							$result_product->execute($array_product);
							$record_product = $result_product->fetch(PDO::FETCH_ASSOC);
							$product_name = $record_product['name']." ".$record_sku['name'];

							$total_price = $_SESSION['cart_num'][$key]*$record_sku['price'];
							$summary_price = $summary_price+$total_price;
						}
					?>
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
					<!-- <div class="row" style="margin-top: 15px;">
						<div class="col-6">ค่าจัดส่ง</div>
						<div class="col-6" style="text-align: right;"></div>
					</div> -->
					<hr>
					<div class="row">
						<div class="col-6">ยอดรวมทั้งหมด</div>
						<div class="col-6" style="text-align: right;"><?php echo number_format($summary_price);?></div>
					</div>
					<hr>
					<div class="row" style="text-align: right; margin-top: 35px; margin-bottom: 35px;">
						<div class="col-12">
							<button type="submit" class="btn bg_yellow">ดำเนินการต่อ <i class="fas fa-arrow-right"></i></button>
						</div>
					</div>
					</div>
				</div>		

			</div>
		</div>

		
	</div>
</div>
</form>

<?php include_once("page_desktop/footer.php");?>
