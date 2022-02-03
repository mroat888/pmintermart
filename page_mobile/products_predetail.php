<?php
	if($record_product_name['product_sku_name'] !=""){
		$record_sku_name = " - ".$record_product_name['product_sku_name'];
		
	}else{
		$record_sku_name = "";
	}
	$product_name = $record_product_name['product_name_name'].$record_sku_name;
    $product_code = $record_product_name['sku_code'];
    
    $link_product_name = $record_product_name['product_name_name'].$record_sku_name."-".$record_product_name['sku_code'];
    $permalink_product_name = $pagetitle->setLinkReplace($link_product_name);
    $permalink = URL."product/".$record_product_name['id']."/".$permalink_product_name."/";


    if(($record_product_name['full_price'] != 0) && ($record_product_name['full_price'] > $record_product_name['price'])){
        $save_price = $record_product_name['full_price']-$record_product_name['price'];
        $price = "<span style='color:#FF0000;'>&#3647;".number_format($record_product_name['price'])."</span>";
        $full_price = "<s> ราคาปกติ &#3647;".number_format($record_product_name['full_price'])."</s>&nbsp;&nbsp;
        <span style='color:green;'>ประหยัด &#3647;".number_format($save_price)."<span>";
    }else{
        $price = "<span>&#3647;".number_format($record_product_name['price'])."</span>";
        $full_price = "";
    }
?>
<a href="<?php echo $permalink; ?>" class="card_title_link">
<div class="box-card">
	<div class="div-box-tag" style="position: absolute;">
		<?php
			if(($record_product_name['full_price'] != 0) && ($record_product_name['full_price'] > $record_product_name['price'])){
				$persent_discount = ($save_price*100)/$record_product_name['full_price'];
		?>
				<div class="div-tag" style="background-color: #FF0000;">
					ลด<br>
					<?php echo "-".round($persent_discount)."%";?>
				</div>
		<?php
			}
		?>
		<?php
			$tags_bestsell = false;
			if(($record_product_name['tags'] != "")){
				$tags_message = $record_product_name['tags'];
				$tags_find = "bestseller";
				if((strpos($tags_message,$tags_find)) !== false){
					$tags_bestsell = true;
				}
			}else{
				$tags_message = $record_product_name['tags'];
				$tags_find = "bestseller";
				if((strpos($tags_message,$tags_find)) !== false){
					$tags_bestsell = true;
				}
			}
			
			if($tags_bestsell){
		?>
				<div class="div-tag" style="background-color: #ffd21d; color: #000000;">
					สินค้า<br>ขายดี
				</div>
		<?php
			}
		?>
	</div>

	<div class="card-body">
		<a href="<?php echo $permalink; ?>">
			<?php
				$first_img = URL_IMG.FOLDER_SKU."/".$record_product_name['sku_code']."__1.jpg";
				//$second_img = URL_IMG.FOLDER_SKU."/".$record_sku['sku_code']."__2.jpg";

				if(file_exists(FOLDER_SKU."/".$record_product_name['sku_code']."__2.jpg")) {
					$second_img = URL_IMG.FOLDER_SKU."/".$record_product_name['sku_code']."__2.jpg";
				}else{
					$second_img = URL_IMG.FOLDER_SKU."/".$record_product_name['sku_code']."__1.jpg";
				}
			?>

			
			<img class="card-img-top" src="<?php echo $first_img; ?>" 
				style="max-width:100%;" alt="<?php echo $product_name; ?>" draggable="false"
				onmouseover="this.src='<?php echo $second_img; ?>'"
   				onmouseout="this.src='<?php echo $first_img; ?>'">
		</a>
		<?php
				// if($record_product_name['instock'] <= 0){
				// 	$filter = "filter: grayscale(100%);"; 
		?>
			<!-- <div class="div-outstock">
					จองสินค้าผ่านไลน์
			</div> -->
		<?php
				// }else{
				// 	$filter = "";
				// }
		?>
	</div>

	<a href="<?php echo $permalink; ?>" class="card_title_link">
	<div class="card-body">
		<div style="height: 4em; overflow: hidden;">
			<h5 class="card-title"><?php echo $product_name; ?></h5>
		</div>
		<p class="card-text">
	    	<span style="font-size: 0.8em; color: #888;">รหัสสินค้า : <?php echo $product_code;?></span>
	    </p>
	    <!-- <p class="card-text" style="height: 4em;">
	    	<span style="font-size: 1.8em; font-weight: bold; color: #333;"><?php echo $price;?></span>
	    	<br>
	    	<span style="font-size: 0.9em;"><?php echo $full_price; ?></span>
	    </p> -->
	</div>
	</a>
</div>

<style type="text/css">

	.box-card{
		/*border-radius: 0.5em;
  		border: 0.2em solid #FFFFFF;*/
  		/*box-shadow: 0px 0px 5px #dfdfdf;*/
  		box-sizing: border-box;
  		min-height: 23.125em; 
  		background-color: #FFFFFF;
  		margin-top: 1em;
  		margin-bottom: 1em;
	}

	.box-card:hover{
		/*margin-top: -0.1em;*/
  		/*border: 0.2em solid #ffd21d;
  		box-shadow: 0px 5px 10px #dfdfdf;*/
  		cursor:pointer;
	}

	.box-card:after {
	    pointer-events: none;
	    position: absolute;
	    width: 100%;
	    height: 100%;
	    border-radius: 0.5em;
	    content: '';
	    box-sizing: content-box;
	    border: 0.2em solid #ffd21d;
	    box-shadow: 0px 5px 10px #dfdfdf;
	    top: 0;
	    left: 0;
	    opacity: 0;
	    transition: 400ms;
	}
	.box-card:hover:after {
	    opacity: 1;
	    /*transform: scale(1.0005);*/
	    z-index: 1;
	}

	.div-box-tag{
		float:right;
		right: 0.6em;
		font-size: 0.8em;
		font-weight: 500;
	}
	.div-tag::first-line{
		font-size: 0.7em;
		font-weight: 0;
	}

	.div-tag{
		float:right;
		width: 3em;
		height: 3em;
		margin-right: 0.35em;
		color: #FFFFFF;
		text-align: center;
		padding-top: 0em;
		padding-bottom:0.3em;
		border-radius: 0em 0em 0.3em 0.3em;
		box-shadow: 0px 0px 5px #dfdfdf;
	}

	.div-outstock{
		position: absolute;
		text-align: center;
		line-height: 3em;
		width: 90%;
		/*top:0;*/
		margin-left: -0.5em;
		/*margin-top: 4em;*/
		/*opacity: 50%;
		background-color: #999; 
		color: #FF0000;
		order-radius: 0.5em;*/
		color: #33cc33;
		font-size: 1em;
		font-weight: 500;
		z-index: 1;
	}

	


</style>