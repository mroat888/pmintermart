<?php include_once("page_desktop/header.php"); flush();?>
<script>
    /*document.getElementById("myDropdown").classList.toggle("show");*/
</script>

<?php
	$product_name = $record_products['name']." ".$record_sku['name'];
?>

<div class="container-fluid">
	<div class="row">
		<div class="container">
			<div class="col-12">
				<?php include_once("breadcrumb_wigget.php"); ?>
			</div>
			<div class="row" style="margin-top: 1em; margin-bottom: 1em;">
				<div class="col-6">
					<?php include_once("page_desktop/products_display_image.php"); ?>
				</div>
				<div class="col-6" style="min-height: 31.25em;">
					<div class="row">
						<div class="col-12">
							<h1><?php echo $product_name; ?></h1>
						</div>
					</div>
					<!-- <div class="row" style="margin-top: 0.9375em;">
						<div class="col-12">
							<span style="font-size: 1.75em; color: #FF0000;">
								 <strong>ราคา <?php echo number_format($record_sku['price']); ?> THB.</strong>
							</span>
						</div>
					</div> -->
					<div class="row" style="margin-top: 0.9375em;">
						<div class="col-12">
							
							<div class="col-md-12 mt-10" style="margin-top:35px;">
								สนใจสินค้า ติดต่อได้เลย..!
							</div>
							<div class="col-md-12 my-3" style="margin-top:0px;">
								<a href="่tel:0830258992" class="btn btn-warning" style="background-color:#FFF; color:#2959c2; 
									padding:10px 30px 10px 30px; font-size:25px;  border: 1.5px solid;" title="ขอใบเสนอราคา">
									<strong>โทร : 083-025-8992</strong>
								</a>
							</div>
							<div class="col-md-12" style="margin-top:10px;">
								<!-- <a href="https://page.line.me/pmintermart">
									<img src="https://scdn.line-apps.com/n/line_add_friends/btn/th.png" alt="เพิ่มเพื่อน" height="36" border="0"></a> -->
									<a href="https://lin.ee/7ueYKjj" target="_blank">
										<img src="https://scdn.line-apps.com/n/line_add_friends/btn/th.png" alt="เพิ่มเพื่อน" height="36" border="0"></a>
							</div>

						</div>
					</div>

						<!-- <form class="form-inline" name="form1" method="post" enctype="multipart/form-data" action="<?php echo URL;?>shoppingcart_aed.php?typ=add">
						<div class="row" style="margin-top: 0.9375em;">
							<div class="col-12" style="text-align: left;">
							<?php
								$array_selectsku = array(':param_id_products_name' => $record_products['id'] , 
									':param_is_drop' => 'N');
								$str_selectsku = "select id, sku_code, name, instock from product_sku where id_products_name = :param_id_products_name and is_drop = :param_is_drop";
								$result_selectsku = $conn->prepare($str_selectsku);
								$result_selectsku->execute($array_selectsku);
								while($record_selectsku = $result_selectsku->fetch(PDO::FETCH_ASSOC)){

									if($record_selectsku['instock'] > 0){
										if(($record_selectsku['id'] == $record_sku['id'])){
											$redio_checked = "checked";
										}else{
											$redio_checked = " ";
										}
										$stock_status = "<span style='color: #999999;'>คงเหลือ ".$record_selectsku['instock']."</span>";
										$instock = $record_selectsku['instock'];
										$btn_status[] = "yes";
							?>		
								<div style="margin-top: 0.9375em;">
									<?php
										//$permalink = URL."products_display.php?id=".$record_selectsku['id'];
										$permalink = URL."product/".$record_selectsku['id']."/".$record_selectsku['name']."/";
									?>
	                               	<input type="radio" name="radio_sku_id" style="margin-right:20px;" 
	                               	value="<?php //echo $record_selectsku['id']; ?>" required="required" 
	                               	<?php //echo $redio_checked;?> onclick="setStock(<?php //echo $instock?>);" 
									data-stock="<?php //echo $instock?>">
									<input type="radio" name="radio_sku_id" style="margin-right:20px;" 
									value="<?php echo $record_selectsku['id']; ?>" required="required" 
									<?php echo $redio_checked;?> onclick="openpage('<?=$permalink;?>');" 
									data-stock="<?php echo $instock?>">
										<a href="<?php echo $permalink; ?>"><img src="<?php echo URL_IMG."img_product_sku/".$record_selectsku['sku_code']."__1.jpg"; ?>" 
									   	style="width:50px;" alt="<?php echo $record_products['name']; ?>" draggable="false"></a>

									<span><?=$record_selectsku['name'];?></span> 
									&nbsp;&nbsp;&nbsp;
									<?php echo $stock_status;?> 
	                            </div>-->
	                               	
							<?php
									}else{
										$redio_checked = "disabled";
										$stock_status = "<span style='color: #FF0000;'>สินค้าหมด</span>";
										$btn_status[] = "no";
									}
								}
								//echo $stock_status;
							?>
							</div>
							<div class="col-12" style="margin-top:1.25em;"> 
								<!-- <button type="button" class="qty-minus btn btn-outline-dark" data-package="1">
									<i class="fas fa-minus"></i>
								</button>
								<input type="text" id="sel_quantity" name="sel_quantity" 
								class="span1 input-number form-control" min="1" value ="1"  style="width: 80px;" readonly>
								<button type="button" id="qty-plus" class="qty-plus btn btn-outline-dark" data-package="1" data-stock="<?=$instock?>">
									<i class="fas fa-plus"></i>
								</button>
								<span id="choiceLabel"></span> -->
	                    	</div>
	                    	<div class="col-12" style="margin-top:1.25em;"> 
	                    		<?php
	                    			foreach ($btn_status as $key => $value) {
	                    				if($value == "yes"){
	                    					$btn_check = true;
	                    					break; 
	                    				}
	                    				$btn_check = false;
	                    			}

	                    			if($btn_check){
	                    				$btn_disabled = " ";
	                    			}else{
	                    				$btn_disabled = "disabled";
	                    			}
									if($record_sku['instock'] > 0){
								?>
									<!-- <button type="submit" class="btn bg_yellow" <?php echo $btn_disabled; ?>>Add To Cart</button> -->
								<?php
									}else{
								?>
									<!-- <button type="button" class="btn btn-success" 
									onclick="javascript:window.open('https://page.line.me/pmintermart', '_blank');">
									<i class="fab fa-line"></i> จองสินค้าผ่านไลน์</button> -->
									
								<?php
									}
								?>
                            	
                        	</div>
						</div>
					</form>

				</div>
			</div>
			<div class="row" style="margin-top: 1.5625em; margin-bottom: 1.5625em;">
				<div class="col-12">
					<button class="dropbtn bg_yellow" style="text-align: center; width: 150px; margin: 0px;">
						Description
					</button>
					<hr class="bg_yellow" style="height: 2px; margin: 0px;">
				</div>
				<div class="col-9" style="margin-top: 1.5625em margin-bottom: 1.5625em; padding-top: 1.5625em;">
					<div id = "div_content" class="span_content content_detail" style="height: 20em;">
						<article><?php echo $record_products['detail']; ?></article>
					</div>
					<div id="div_more_botton_detail">
                        <a href="javascript:void(0)" onclick="show_detail('div_content','div_more_botton_detail');" 
                          class="btn btn-outline-primary btn_more" role="button">++ ดูรายละเอียดเพิ่มเติม ++</a>
                    </div>
				</div>
				<div class="col-3" style="margin-top: 1.5625em; margin-bottom: 1.5625em;"></div>
			</div>
		</div>
	</div>
</div>

<?php include_once("page_desktop/footer.php");?>
<style>
	#div_content ul li{
		margin-left: 1.5em;
	}
	.content_detail{
		/*height: 20em; */
		overflow: hidden;
		background: -webkit-linear-gradient(#212529, #212529,#eee);
  		-webkit-background-clip: text;
  		-webkit-text-fill-color: transparent;
	}
	.btn_more{
		margin-top:0.5em; 
		margin-bottom:1.5em;
		margin-left: 3em;
		width: 15em;	
	}
</style>
<script>

    function show_detail(id_div_detail,id_div_botton_detail){
        document.getElementById(id_div_detail).style = "overflow:display;";
        document.getElementById(id_div_botton_detail).style = "display:none";

        var element = document.getElementById(id_div_detail);
 		element.classList.remove("content_detail");
    }

	function openpage(urlpath){
		var urlpath = urlpath;
		window.location.href = urlpath;
	}

	function setStock(instock){
		var stk = parseInt(instock);
		var qty = document.getElementsByName('sel_quantity');
		var val = parseInt($(qty).val());
		if(val>stk){
			$(qty).val(stk);
		}	
		if(stk > 0){
			document.getElementById('choiceLabel').innerText = "เหลือเพียง "+instock;
		}else{
			document.getElementById('choiceLabel').innerText = "สินค้าหมด";
		}
	}

	$('.qty-minus').click(function(){
		var pkg = parseInt($(this).data('package'));
		var qty = $(this).parent().find('.span1').eq(0);
		var val = parseInt($(qty).val());
		if(val<=pkg){
			$(qty).val(1);
		}else{
			$(qty).val(val - pkg);
		}
	});

	$('.qty-plus').click(function(){
		var radios = document.getElementsByName('radio_sku_id');
		for(var i = 0; i < radios.length; i++){
		    if (radios[i].checked) {
		        //document.getElementById('choiceLabel').innerText = radios[i].getAttribute('data-stock');
		       	var stk = parseInt(radios[i].getAttribute('data-stock'));
		    }
		}
		//var stk = parseInt($(this).data('stock'));
		var pkg = parseInt($(this).data('package'));
		var qty = $(this).parent().find('.span1').eq(0);
		
		$(document).ready(function(){
			var val = parseInt($(qty).val());
			if(val<stk){
				$(qty).val(val + pkg);
			}else{
				$(qty).val(stk);
			}	
		});
	});

</script>