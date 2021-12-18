<?php include_once("page_mobile/menu_header.php"); flush();?>

<div class="container-fluid">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-12" >
                    <div class="col-12">
                        <?php include_once("breadcrumb_wigget.php"); ?>
                    </div>
					<div class="row" style="margin-top: 1em; margin-bottom: 1em;">
						<div class="col-12">
							<h1><?php echo $type3_name; ?></h1>
						</div>
					</div>
					<div class="row">
                        <?php
                            $array_param_product_name = array(
                                ':param_type3_id' => $typ3, 
                                //':param_price' => '0', 
                                ':param_drop_status' => 'N'
                            );
                            $str_product_name = "select product_name.name as product_name_name, product_name.tags, 
                            product_name.is_bestseller, product_sku.*, product_sku.name as product_sku_name 
                            from product_sku, product_name 
                            where product_sku.id_products_name = product_name.id and 
                            product_name.is_drop = :param_drop_status and 
                            product_sku.is_drop = :param_drop_status and 
                            product_name.id_producttype_level3 = :param_type3_id ";
                        
                            $str_orderby = "order by product_sku.full_price , product_name.name , product_name.id desc";
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
                                <div class="col-6">
                                    <?php include("page_desktop/products_predetail.php");?>
                                </div>
                        <?
                            } 
                            flush();
                        ?>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once("page_mobile/footer.php");?>