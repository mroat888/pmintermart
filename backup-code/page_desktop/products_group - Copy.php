<?php include_once("page_desktop/header.php"); flush();?>
<script>
    /*document.getElementById("myDropdown").classList.toggle("show");
</script>

<div class="container-fluid">
	<div class="row">
		<div class="container">
			<div class="row">
				<!-- <div class="col-3">
					
				</div> -->
				<div class="col-12" style="min-height: 500px; margin-bottom: 2em;">
                    <div class="col-12">
                        <?php include_once("breadcrumb_wigget.php"); ?>
                    </div>
					<div class="row" style="margin-top: 1em; margin-bottom: 1em;">
                        <div class="col-12">
                            <h1><?php echo $type1_name; ?></h1>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 1em; margin-bottom: 1em;">
                        <?php
                            $array_param_producttype_level2 = array(
                                ':param_type1_id' => $typ1, 
                                ':param_status' => 'Y'
                            );
                            $str_producttype_level2 = "select * from producttype_level2 
                            where status = :param_status and id_producttype_level1 = :param_type1_id 
                            order by name ";
                            $result_producttype_level2 = $conn->prepare($str_producttype_level2);
                            $result_producttype_level2->execute($array_param_producttype_level2);
                            $count_producttype_level2 = $result_producttype_level2->rowCount();
                            switch ($count_producttype_level2) {
                                case 1:
                                case 2:
                                case 3:
                                    $class_col = "col-4";
                                    break;
                                case 4:
                                    $class_col = "col-3";
                                    break;
                                default:
                                    $class_col = "col-2";
                            }        
                            $check_lv = false;                     
                            while($record_producttype_level2 = $result_producttype_level2->fetch(PDO::FETCH_ASSOC)){ 
                                if($record_producttype_level2['id'] != ""){
                                    $check_lv = true;
                                }
                                $link_product_name = $record_producttype_level2['name'];
                                $permalink = URL."collection/".$record_producttype_level2['id']."/".$link_product_name."/"."1/";

                                $header_type_text_widget = "";

                                if(file_exists("img_product_collection/".$record_producttype_level2['id'].".jpg")) {
                                    $img_type2 = URL."img_product_collection/".$record_producttype_level2['id'].".jpg";
                                }else{
                                    $img_type2 = URL."images/bg-default.jpg";
                                    $header_type_text_widget = $record_producttype_level2['name'];
                                }
                        ?>
                            <div class="<?=$class_col?>" style="padding:0.2em; padding-right: 0.2em; padding-top: 0.5em; padding-bottom: 0.8em;">
                                <a href="<?php echo $permalink; ?>">
                                    <div class="header_type_text_widget">
                                        <?php echo $header_type_text_widget?>
                                    </div>
                                    <img src="<?php echo $img_type2; ?>" style="max-width:100%;" 
                                    alt="<?php echo $record_producttype_level2['name']; ?>" 
                                    draggable="false" >
                                </a>
                                <a href="<?php echo $permalink; ?>" class="font_black">
                                    <div style="margin-top: 1em;"><?php echo $record_producttype_level2['name']; ?></div>
                                </a>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
					<div class="row">
						<?php
                            $array_param_product_name = array(
                                ':param_type1_id' => $typ1, 
                                ':param_drop_status' => 'N'
                            );

                            if($check_lv){
                                $str_product_name = "select product_name.id, product_name.product_code, 
                                product_name.name, product_name.tags 
                                from product_name , producttype_level2 , product_sku 
                                where (product_name.id_producttype_level2 = producttype_level2.id) and 
                                (product_sku.id = product_name.id) and 
                                product_name.is_drop = :param_drop_status and 
                                product_name.id_producttype_level1 = :param_type1_id 
                                order by producttype_level2.name , product_name.id desc";
                            }else{
                                $str_product_name = "select id, product_code, name 
                                from product_name where is_drop = :param_drop_status and 
                                id_producttype_level1 = :param_type1_id 
                                order by id desc";
                            }
                            
                            $str_product_name = $str_product_name;

                            if(isset($_GET['nowpage'])){ ///--
                                $nowpage = $_GET['nowpage'];
                            }else{
                                $nowpage = 1;
                            }
                           
                            $pagesize = 24;
                            $pagestart = ($nowpage-1)*$pagesize;
                        
                            $str_final = $str_product_name." LIMIT $pagestart, $pagesize";
                            //echo $str_final;
                            $result_product_name = $conn->prepare($str_final);
                            $result_product_name->execute($array_param_product_name);
                        ?>
                        <?php 
                            while($record_product_name = $result_product_name->fetch(PDO::FETCH_ASSOC)){ 
                                $array_sku = array(
                                    ':param_product_id' => $record_product_name['id'], 
                                    ':param_is_drop' => 'N'
                                );
                                $str_sku = "select * from product_sku where id_products_name = :param_product_id and is_drop = :param_is_drop order by full_price";
                                $result_sku = $conn->prepare($str_sku);
                                $result_sku->execute($array_sku);
                                while($record_sku = $result_sku->fetch(PDO::FETCH_ASSOC)){
                        ?>
                                <div class="col-3">
                                    <?php include("page_desktop/products_predetail.php");?>
                                </div>
                        <?php 
                                }
                            } 
                            flush();
                        ?>
					</div>
                    <div class="row">
                        <?php 
                            $get_pagination = "group/".$typ1."/".$type1_name."/";
                            include_once("products_pagination.php"); 
                        ?>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
    if($record_type1['header_description'] != ""){
?>
<div class="container-fluid" style="background-color: #FFFFFF;">
    <div class="row">
        <div class="container">
            <div class="row" style="margin-top: 1em; margin-bottom: 1em;">
                <div class="col-12">
                    <div class="span_decription span_content" 
                    style="margin-top: 2em; margin-bottom: 2em; padding-left: 0.5em; padding-right: 0.5em; ">
                        <?php echo $record_type1['header_description'];?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>

<?php include_once("page_desktop/footer.php");?>