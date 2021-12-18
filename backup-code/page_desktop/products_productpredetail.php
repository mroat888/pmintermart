<?php
	$product_name = $record_product_name['name'] ;
    $product_code = $record_product_name['product_code'];

    //$permalink = URL."product/".$record_product_name['id']."/".$product_name."/";
    $permalink = URL."products_display.php?id=".$record_sku['id'];

    if(($record_sku['full_price'] != 0) && ($record_sku['full_price'] > $record_sku['price'])){
        $save_price = $record_sku['full_price']-$record_sku['price'];
        $price = "<span style='color:#FF0000;'>&#3647;".number_format($record_sku['price'])."</span>";
        $full_price = "&#3647;<s>".number_format($record_sku['full_price'])."</s>&nbsp;&nbsp;
        <span style='color:green;'>ประหยัด &#3647;".number_format($save_price)."<span>";
    }else{
        $price = "<span>&#3647;".number_format($record_sku['price'])."</span>";
        $full_price = "";
    }
?>

<div class="box-card">
	<a href="<?php echo $permalink; ?>">
		<img class="card-img-top" src="<?php echo URL_IMG.FOLDER_PRODUCT."/".$record_product_name['id']."-1.jpg"; ?>" 
		style="max-width:100%;" alt="<?php echo $product_name; ?>" draggable="false">
	</a>
	<a href="<?php echo $permalink; ?>" class="card_title_link">
	<div class="card-body">
		<div style="min-height: 2.5em;">
			<h5 class="card-title"><?php echo $product_name; ?></h5>
		</div>
	    <p class="card-text" style="height: 3em;">
	    	<span style="font-size: 1.2em; font-weight: bold; color: #333;"><?php echo $price;?></span>
	    	<br>
	    	<span style="font-size: 0.8em;"><?php echo $full_price; ?></span>
	    </p>
	</div>
	</a>
</div>

<style type="text/css">
	.box-card{
		border-radius: 0.25em;
  		border: 0.05em solid #dfdfdf;
  		box-shadow: 0px 0px 5px #dfdfdf;
  		box-sizing: border-box;
  		/*min-height: 23.125em; */
  		background-color: #FFFFFF;
	}

	.box-card:hover{
		/*margin-top: -0.1em;*/
  		border: 0.05em solid #ffd21d;
  		box-shadow: 0px 5px 10px #dfdfdf;
	}

</style>