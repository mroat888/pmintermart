<?php
	$breadcrumb_producttype_level1 = "";
	$breadcrumb_producttype_level2 = "";
	$breadcrumb_producttype_level3 = "";
	$breadcrumb_typ2  = ""; 
	$breadcrumb_typ3  = ""; 
	$breadcrumb_sku  = "";
    if(isset($_GET['typ1']) && $_GET['typ1'] != ""){
    	$breadcrumb_typ1 = $_GET['typ1'];
    	$param_producttype_level1 = array('param_producttype_level1_id'=> $_GET['typ1']);
		$str_producttype_level1 = "select * from producttype_level1 where id = :param_producttype_level1_id";
		$result_producttype_level1 = $conn->prepare($str_producttype_level1);
		$result_producttype_level1->execute($param_producttype_level1);
		$record_producttype_level1 = $result_producttype_level1->fetch(PDO::FETCH_ASSOC);
        $breadcrumb_producttype_level1 .= " ".$record_producttype_level1['name']; 
    }

    if(isset($_GET['typ2']) && $_GET['typ2'] != ""){
    	$breadcrumb_typ2 = $_GET['typ2'];
    	$param_producttype_level2 = array(':param_producttype_level2_id'=> $_GET['typ2']);
		$str_producttype_level2 = "select * from producttype_level2 where id = :param_producttype_level2_id";
		$result_producttype_level2 = $conn->prepare($str_producttype_level2);
		$result_producttype_level2->execute($param_producttype_level2);
		$record_producttype_level2 = $result_producttype_level2->fetch(PDO::FETCH_ASSOC);
        $breadcrumb_producttype_level2 .= " ".$record_producttype_level2['name']; 

        $breadcrumb_typ1 = $record_producttype_level2['id_producttype_level1'];
    	$param_producttype_level1 = array(':param_producttype_level1_id'=> $record_producttype_level2['id_producttype_level1']);
		$str_producttype_level1 = "select * from producttype_level1 where id = :param_producttype_level1_id";
		$result_producttype_level1 = $conn->prepare($str_producttype_level1);
		$result_producttype_level1->execute($param_producttype_level1);
		$record_producttype_level1 = $result_producttype_level1->fetch(PDO::FETCH_ASSOC);
        $breadcrumb_producttype_level1 .= " ".$record_producttype_level1['name']; 
        $breadcrumb_producttype_level1_url = URL."group/".$record_producttype_level1['id']."/".$record_producttype_level1['name']."/1/";
    }

    if(isset($_GET['typ3']) && $_GET['typ3'] != ""){
    	$breadcrumb_typ3 = $_GET['typ3'];
    	$param_producttype_level3 = array(':param_producttype_level3_id'=> $_GET['typ3']);
		$str_producttype_level3 = "select * from producttype_level3 where id = :param_producttype_level3_id";
		$result_producttype_level3 = $conn->prepare($str_producttype_level3);
		$result_producttype_level3->execute($param_producttype_level3);
		$record_producttype_level3 = $result_producttype_level3->fetch(PDO::FETCH_ASSOC);
        $breadcrumb_producttype_level3 .= " ".$record_producttype_level3['name']; 

        $breadcrumb_typ2 = $record_producttype_level3['id_producttype_level2'];
    	$param_producttype_level2 = array(':param_producttype_level2_id'=> $record_producttype_level3['id_producttype_level2']);
		$str_producttype_level2 = "select * from producttype_level2 where id = :param_producttype_level2_id";
		$result_producttype_level2 = $conn->prepare($str_producttype_level2);
		$result_producttype_level2->execute($param_producttype_level2);
		$record_producttype_level2 = $result_producttype_level2->fetch(PDO::FETCH_ASSOC);
        $breadcrumb_producttype_level2 .= " ".$record_producttype_level2['name']; 
        $breadcrumb_producttype_level2_url = URL."collection/".$record_producttype_level2['id']."/".$record_producttype_level2['name']."/1/";

        $breadcrumb_typ1 = $record_producttype_level2['id_producttype_level1'];
    	$param_producttype_level1 = array(':param_producttype_level1_id'=> $record_producttype_level2['id_producttype_level1']);
		$str_producttype_level1 = "select * from producttype_level1 where id = :param_producttype_level1_id";
		$result_producttype_level1 = $conn->prepare($str_producttype_level1);
		$result_producttype_level1->execute($param_producttype_level1);
		$record_producttype_level1 = $result_producttype_level1->fetch(PDO::FETCH_ASSOC);
        $breadcrumb_producttype_level1 .= " ".$record_producttype_level1['name']; 
        $breadcrumb_producttype_level1_url = URL."group/".$record_producttype_level1['id']."/".$record_producttype_level1['name']."/1/";

    }

    if(isset($_GET['id']) && $_GET['id'] != ""){
    	$breadcrumb_sku = $_GET['id'];
    	$param_sku = array(':param_sku_id'=> $_GET['id']);
		$str_sku = "select * from product_sku where id = :param_sku_id";
		$result_sku = $conn->prepare($str_sku);
		$result_sku->execute($param_sku);
		$record_sku = $result_sku->fetch(PDO::FETCH_ASSOC);
        $breadcrumb_sku .= " ".$record_sku['name']; 

        $breadcrumb_product_name = $record_sku['id_products_name'];
     	$param_product_name = array(':param_product_name_id' => $record_sku['id_products_name']);
		$str_product_name = "select * from product_name where id = :param_product_name_id";
		$result_product_name = $conn->prepare($str_product_name);
		$result_product_name->execute($param_product_name);
		$record_product_name = $result_product_name->fetch(PDO::FETCH_ASSOC);
		$breadcrumb_product_name = " ".$record_product_name['name'].$record_sku['name']; 

		if($record_product_name['id_producttype_level2'] != 0){
			$breadcrumb_typ2 = $record_product_name['id_producttype_level2'];
	    	$param_producttype_level2 = array(
	    		':param_producttype_level2_id'=> $record_product_name['id_producttype_level2']
	    	);
			$str_producttype_level2 = "select * from producttype_level2 where id = :param_producttype_level2_id";
			$result_producttype_level2 = $conn->prepare($str_producttype_level2);
			$result_producttype_level2->execute($param_producttype_level2);
			$record_producttype_level2 = $result_producttype_level2->fetch(PDO::FETCH_ASSOC);
	        $breadcrumb_producttype_level2 .= " ".$record_producttype_level2['name']; 
	        $breadcrumb_producttype_level2_url = URL."collection/".$record_producttype_level2['id']."/".$record_producttype_level2['name']."/1/";
    	}

    	if($record_product_name['id_producttype_level3'] != 0){
			$breadcrumb_typ3 = $record_product_name['id_producttype_level3'];
	    	$param_producttype_level3 = array(
	    		':param_producttype_level3_id'=> $record_product_name['id_producttype_level3']
	    	);
			$str_producttype_level3 = "select * from producttype_level3 where id = :param_producttype_level3_id";
			$result_producttype_level3 = $conn->prepare($str_producttype_level3);
			$result_producttype_level3->execute($param_producttype_level3);
			$record_producttype_level3 = $result_producttype_level3->fetch(PDO::FETCH_ASSOC);
	        $breadcrumb_producttype_level3 .= " ".$record_producttype_level3['name']; 
	        $breadcrumb_producttype_level3_url = URL."category/".$record_producttype_level3['id']."/".$record_producttype_level3['name']."/1/";
    	}

        $breadcrumb_typ1 = $record_product_name['id_producttype_level1'];
    	$param_producttype_level1 = array(':param_producttype_level1_id'=> $record_product_name['id_producttype_level1']);
		$str_producttype_level1 = "select * from producttype_level1 where id = :param_producttype_level1_id";
		$result_producttype_level1 = $conn->prepare($str_producttype_level1);
		$result_producttype_level1->execute($param_producttype_level1);
		$record_producttype_level1 = $result_producttype_level1->fetch(PDO::FETCH_ASSOC);
        $breadcrumb_producttype_level1 .= " ".$record_producttype_level1['name']; 
        $breadcrumb_producttype_level1_url = URL."group/".$record_producttype_level1['id']."/".$record_producttype_level1['name']."/1/";
    }
?>
<div class="row" style="margin-top: 1em; margin-bottom: 1em;">
	<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a href='<?php echo URL; ?>' class="breadcrumb-text-link" itemprop="url item" title="<?=$breadcrumb_home?>">
			<span itemprop="name" class="fas fa-home" style="font-size:12px;"></span></a>
        <meta itemprop="position" content="1" />
    </span>
    <?php
    	if($breadcrumb_typ1 != ""){
    		if($breadcrumb_typ2 !="" || $breadcrumb_sku !=""){
    ?>
	    		<i class="fas fa-angle-right" style="margin-top:0.725em; margin-left:0.625em; margin-right:0.625em; font-size:0.625em;"></i>
	    		<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
	                <a href='<?=$breadcrumb_producttype_level1_url?>' class="breadcrumb-text-link" itemprop="url item" title="<?=$breadcrumb_producttype_level1?>">
	                <span itemprop="name"><?=$breadcrumb_producttype_level1; ?></span></a>
	                <meta itemprop="position" content="2" />
	            </span>
    <?php
    		}else{
    ?>
	    		<i class="fas fa-angle-right" style="margin-top:0.725em; margin-left:0.625em; margin-right:0.625em; font-size:0.625em;"></i>
	    		<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
	                <span itemprop="name"><?=$breadcrumb_producttype_level1; ?></span>
	                <meta itemprop="position" content="2" />
	            </span>
    <?php
    		}
    	}
    ?>

    <?php
    	if($breadcrumb_typ2 != ""){
    		if($breadcrumb_typ3 !="" || $breadcrumb_sku !=""){
    ?>
	    		<i class="fas fa-angle-right" style="margin-top:0.725em; margin-left:0.625em; margin-right:0.625em; font-size:0.625em;"></i>
	    		<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
	                <a href='<?=$breadcrumb_producttype_level2_url?>' class="breadcrumb-text-link" itemprop="url item" title="<?=$breadcrumb_producttype_level2?>">
	                <span itemprop="name"><?=$breadcrumb_producttype_level2; ?></span></a>
	                <meta itemprop="position" content="2" />
	            </span>
    <?php
    		}else{
    ?>
	    		<i class="fas fa-angle-right" style="margin-top:0.725em; margin-left:0.625em; margin-right:0.625em; font-size:0.625em;"></i>
	    		<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
	                <span itemprop="name"><?=$breadcrumb_producttype_level2; ?></span>
	                <meta itemprop="position" content="2" />
	            </span>
    <?php
    		}
    	}
    ?>

    <?php
    	if($breadcrumb_typ3 != ""){
    		if($breadcrumb_sku !=""){
    ?>
	    		<i class="fas fa-angle-right" style="margin-top:0.725em; margin-left:0.625em; margin-right:0.625em; font-size:0.625em;"></i>
	    		<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
	                <a href='<?=$breadcrumb_producttype_level3_url?>' class="breadcrumb-text-link" itemprop="url item" title="<?=$breadcrumb_producttype_level3?>">
	                <span itemprop="name"><?=$breadcrumb_producttype_level3; ?></span></a>
	                <meta itemprop="position" content="2" />
	            </span>
    <?php
    		}else{
    ?>
	    		<i class="fas fa-angle-right" style="margin-top:0.725em; margin-left:0.625em; margin-right:0.625em; font-size:0.625em;"></i>
	    		<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
	                <span itemprop="name"><?=$breadcrumb_producttype_level3; ?></span>
	                <meta itemprop="position" content="2" />
	            </span>
    <?php
    		}
    	}
    ?>

    <?php
    	if($breadcrumb_sku != ""){
    ?>
	    	<i class="fas fa-angle-right" style="margin-top:0.725em; margin-left:0.625em; margin-right:0.625em; font-size:0.625em;"></i>
	    	<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
	            <span itemprop="name"><?=$breadcrumb_product_name; ?></span>
	            <meta itemprop="position" content="2" />
	        </span>
    <?php
    	}
    ?>

</div>