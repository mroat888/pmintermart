<?php include_once("page_desktop/header.php"); flush();?>
<script>
    /*document.getElementById("myDropdown").classList.toggle("show");*/
</script>

<div class="container-fluid" style="background-color: #FFFFFF;">
	<div class="row">
		<div class="container">
			<div class="row">
				<!-- <div class="col-3">

				</div> -->
				<div class="col-12" style="min-height: 500px; margin-bottom: 2em">
                    <div class="col-12">
                        <?php include_once("breadcrumb_wigget.php"); ?>
                    </div>
					<div class="row" style="margin-top: 1em; margin-bottom: 1em;">
						<div class="col-12">
							<div style="float:left"><h1><?php echo $type2_name; ?></h1></div>
                            <?php
                                if($record_type2['is_brand'] == "Y"){
                            ?>
                                    <div style="float:left; margin-top:-8px; margin-left:30px;">
                                        <div style="background-color:#000; padding:15px; height:30px; margin-top:20px;">
                                            <div style="margin-top:-20px; color:#FFF; font-size:25px;" class="font_logo_ele">ELEGANCE</div>
                                        </div>
                                    </div>
                            <?php
                                }
                            ?>
						</div>
					</div>

                    <?php
                        if(!is_null($record_type2['name_description'])){
                    ?>
                        <!-- <div class="row" style="margin-top: -0.5em; margin-bottom: 1em;"> -->
                        <div class="row" style="margin-top: 2em; margin-bottom: 1em;">
                            <div class="col-12">
                                <div><h5><?php echo $record_type2['name_description']; ?></h5></div>
                            </div>   
                        </div>
                    <?php
                        }
                    ?>

                    <!-- <div class="row" style="margin-top: 1em; margin-bottom: 3em; padding-left:21px; padding-right:21px;"> -->
                    <div class="row" style="margin-top: 2.5em; margin-bottom: 3em; padding-left:21px; padding-right:21px;">
                        <?php
                            $array_param_producttype_level3 = array(
                                ':param_type2_id' => $typ2, 
                                ':param_status' => 'Y'
                            );
                            $str_producttype_level3 = "select * from producttype_level3 
                            where status = :param_status and id_producttype_level2 = :param_type2_id 
                            order by ordinal_number asc , name asc";
                            $result_producttype_level3 = $conn->prepare($str_producttype_level3);
                            $result_producttype_level3->execute($array_param_producttype_level3);

                            $count_producttype_level3 = $result_producttype_level3->rowCount();
                            switch ($count_producttype_level3) {
                                case 1:
                                case 2:
                                case 3:
                                    // $class_col = "col-4";
                                    // break;
                                case 4:
                                    $class_col = "col-3";
                                    break;
                                default:
                                    $class_col = "col-2";
                            }  
                            $check_lv = false;  
                            while($record_producttype_level3 = $result_producttype_level3->fetch(PDO::FETCH_ASSOC)){ 
                                if($record_producttype_level3['id'] != ""){
                                    $check_lv = true;
                                }
                                $link_product_name = $record_producttype_level2['name'];
                                $permalink = URL."category/".$record_producttype_level3['id']."/".$record_producttype_level3['name']."/1/";
                                $header_type_text_widget = "";
                                if(file_exists("img_product_category/".$record_producttype_level3['id'].".jpg")) {
                                    $img_type3 = URL."img_product_category/".$record_producttype_level3['id'].".jpg";
                                }else{
                                    $img_type3 = URL."images/bg-default.jpg";
                                    $header_type_text_widget = $record_producttype_level3['name'];
                                }
                        ?>
                            <!-- <div class="<?=$class_col?>" style="padding-left:0.2em; padding-right: 0.2em; margin-bottom: 1em;"> -->
                            <div class="<?=$class_col?>" style="padding:0.5em; ">
                                <a href="<?php echo $permalink; ?>">
                                    <div class="header_type_text_widget">
                                        <?php echo $header_type_text_widget?>
                                    </div>
                                    <img src="<?php echo $img_type3; ?>" style="max-width:100%;" 
                                    alt="<?php echo $record_producttype_level3['name']; ?>" draggable="false" >
                                </a>
                                <a href="<?php echo $permalink; ?>" class="font_black">
                                    <div style="margin-top: 1em;"><?php echo $record_producttype_level3['name']; ?></div>
                                </a>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
					<div class="row">
						<?php
                            $array_param_product_name = array(
                                ':param_type2_id' => $typ2, 
                                //':param_price' => '0', 
                                ':param_drop_status' => 'N'
                            );
                            if($check_lv){
                                $str_product_name = "select product_name.name as product_name_name, product_name.tags, 
                                product_name.is_bestseller, product_name.is_arrival, product_sku.*, product_sku.name as product_sku_name 
                                from product_sku, product_name, producttype_level3 
                                where (product_sku.id_products_name = product_name.id) and 
                                (product_name.id_producttype_level3 = producttype_level3.id) and 
                                product_name.is_drop = :param_drop_status and 
                                product_sku.is_drop = :param_drop_status and 
                                product_name.id_producttype_level2 = :param_type2_id "; 
                                // $str_orderby = "order by producttype_level3.name , product_sku.full_price , product_name.position_index , product_name.name , product_name.id desc";
                                $str_orderby = "order by producttype_level3.ordinal_number, producttype_level3.name, 
                                product_name.position_index, product_name.id desc, product_name.name , product_sku.ordinal_number";
                            }else{
                                $str_product_name = "select product_name.name as product_name_name, product_name.tags, 
                                product_name.is_bestseller, product_name.is_arrival, product_sku.*, product_sku.name as product_sku_name 
                                from product_sku, product_name 
                                where product_sku.id_products_name = product_name.id and 
                                product_name.is_drop = :param_drop_status and 
                                product_sku.is_drop = :param_drop_status and 
                                product_name.id_producttype_level2 = :param_type2_id ";   
                                // $str_orderby = "order by product_sku.full_price , product_name.position_index , product_name.name , product_name.id desc";
                                $str_orderby = "order by product_name.position_index, product_name.id desc, 
                                product_name.name, product_sku.ordinal_number";
                            }
                            
                            $str_product_name = $str_product_name.$str_orderby;
                        
                            if(isset($_GET['nowpage'])){ ///--
                                $nowpage = $_GET['nowpage'];
                            }else{
                                $nowpage = 1;
                            }
                        
                            $pagesize = 24;
                            $pagestart = ($nowpage-1)*$pagesize;
                        
                            $str_final = $str_product_name." LIMIT $pagestart, $pagesize";
                            $result_product_name = $conn->prepare($str_final);
                            $result_product_name->execute($array_param_product_name);
                        ?>
                        <?php 
                            while($record_product_name = $result_product_name->fetch(PDO::FETCH_ASSOC)){ 
                        ?>
                                <div class="col-md-3 col-6">
                                    <?php include("page_desktop/products_predetail.php");?>
                                </div>
                        <?php 
                            } 
                            flush();
                        ?>
				    </div>
                    <div class="">
                        <?php 
                            $get_pagination = "collection/".$typ2."/".$type2_name."/";
                            include_once("products_pagination.php"); 
                        ?>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>


<?php
    if($record_type2['header_description'] != ""){
?>
<div class="container-fluid" style="background-color: #FFFFFF;">
    <div class="row">
        <div class="container">
            <div class="row" style="margin-top: 1em; margin-bottom: 1em;">
                <div class="col-12">
                    <div class="span_decription span_content" 
                    style="margin-top: 2em; margin-bottom: 2em; padding-left: 0.5em; padding-right: 0.5em; ">
                        <?php echo $record_type2['header_description'];?>
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