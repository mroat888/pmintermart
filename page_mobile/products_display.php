<?php include_once("page_mobile/menu_header.php"); flush();?>

<form class="form-inline" name="form1" method="post" enctype="multipart/form-data" action="<?php echo URL;?>shoppingcart_aed.php?typ=add">
<div style="position:fixed;
    bottom:0px; /* or whatever is best for your design */
    right:0px; /* or whatever is best for your design */
    z-index: 999; /* this assures that it stays in front of all other content*/
    width: 100%;" > 
    <?php
    	//echo $record_sku['instock'].$record_sku['name'];
    	if($record_sku['instock'] > 0){
    ?>
			<button type="submit" class="btn bg_yellow" 
			style="width:100%; font-size: 2.5em; font-weight: bold; color: #FF0000;">Add To Cart</button>
	<?php
		}else{
	?>
			<button type="button" class="btn btn-success" 
			onclick="javascript:window.open('https://page.line.me/pmintermart', '_blank');" 
			style="width:100%; font-size: 2.5em; font-weight: bold;"><i class="fab fa-line"></i> จองสินค้าผ่านไลน์</button>
	<?php
		}
	?>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-12">
                    <div class="col-12"><?php include_once("breadcrumb_wigget.php"); ?></div>
                </div>
				<div class="col-12">
					<div class="box_predetail" style="padding:6px;">
						<?php
							$first_img = URL_IMG.FOLDER_SKU."/".$record_sku['sku_code']."__1.jpg";
						?>
						<img src="<?php echo $first_img; ?>" 
						style="max-width:100%;" alt="<?php echo $record_products['name']; ?>" draggable="false">
					</div>
				</div>
				<div class="col-12">
					<div class="row">
						<div class="col-12">
							<h1><?php echo $product_name; ?></h1>
						</div>
					</div>
					<div class="row" style="margin-top: 15px;">
						<div class="col-12">
							<font style="font-size: 28px; color: #FF0000;">
								<strong>ราคา <?php echo number_format($record_sku['price']); ?> THB.</strong>
							</font>
						</div>
					</div>
					<!-- <div class="row" style="margin-top: 15px;">
						<div class="col-12">
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat.
							</p>
						</div>
					</div> -->

					<!-- <form class="form-inline" name="form1" method="post" enctype="multipart/form-data" 
                		action="shoppingcart_aed.php?typ=add"> -->
						<div class="row" style="margin-top: 15px;">
	                        <input type="hidden" name="radio_sku_id" id="radio_sku_id" 
	                        value="<?php echo  $record_sku['id']; ?>">
	                        <input type="hidden" class="form-control" id="sel_quantity" 
	                        name="sel_quantity" min="1" value ="1" placeholder="จำนวน" s>

	                    	<!-- <div  > 
                            	<button type="submit" class="btn bg_yellow" style="width: 100%">Add To Cart</button>
                        	</div> -->
						</div>
					<!-- </form> -->

				</div>
			</div>
			<div class="row" style="margin-top: 25px;">
				<div class="col-12">
					<button class="dropbtn bg_yellow" style="text-align: center; width: 150px; margin: 0px;">
						Description
					</button>
					<hr class="bg_yellow" style="height: 2px; margin: 0px;">
				</div>
				<div class="col-12" style="margin-top: 25px; margin-bottom: 25px;">
					<?php echo $record_products['detail']; ?>
				</div>
			</div>

		</div>
	</div>
</div>

</form>

<?php include_once("page_mobile/footer.php");?>