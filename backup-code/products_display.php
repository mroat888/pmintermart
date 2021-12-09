<?php require("include_header.php"); ?>

<?php
	$id = $_GET['id'];

	$array_sku = array(':param_sku_id' => $id);
	$str_sku = "select * from product_sku where id = :param_sku_id";
	$result_sku = $conn->prepare($str_sku);
	$result_sku->execute($array_sku);
	$record_sku = $result_sku->fetch(PDO::FETCH_ASSOC);
	$id_products_name = $record_sku['id_products_name'];

	$array_products = array(':param_id' => $id_products_name);
	$str_products = "select * from product_name where id = :param_id";
	$result_products = $conn->prepare($str_products);
	$result_products->execute($array_products);
	$record_products = $result_products->fetch(PDO::FETCH_ASSOC);

	$meta_title = $record_products['name']." ".$record_sku['name'];

	//--- ใช้เฉพาะ canonical เท่านั้น ป้องกันการ duplicate หน้า ----------
	$array_canonical = array('param_id_product_name' => $record_products['id']);
	$str_canonical_sku = "select id from product_sku where id_products_name = :param_id_product_name 
	order by id LIMIT 0,1";
	$result_canonical_sku = $conn->prepare($str_canonical_sku);
	$result_canonical_sku->execute($array_canonical);
	$record_canonical = $result_canonical_sku->fetch(PDO::FETCH_ASSOC);
	$canonical_page = URL."products_display.php?id=".$record_canonical['id'];
	//-----------------------------------------------------
?>
    <title><?php echo $meta_title; ?></title>
    <meta name="description" content="<?php echo $mata_description; ?>" />
    <link rel="canonical" href="<?php echo $canonical_page;?>" />

</head>
<body itemscope itemtype="http://schema.org/WebPage" onload="switch_css();">   

<?php   if($devices == "mobile"){   ?>
            <div><?php include_once("page_mobile/products_display.php"); ?></div>
<?php   
        }else{     
?>
            <div><?php include_once("page_desktop/products_display.php"); ?></div>
<?php   }   ?>

<?php require("include_footer.php"); ?>

