<?php include_once("page_desktop/header.php"); flush();?>
<script>
    document.getElementById("myDropdown").classList.toggle("show");
</script>

<div class="container-fluid">
	<div class="row">
		<div class="container">
			<div class="row">
				<!-- <div class="col-3">
					
				</div> -->
				<div class="col-12" style="min-height: 500px;">
					<div class="row" style="margin-top: 25px;">
						<div class="col-12">
							<h1><?php echo $keyword; ?></h1>
						</div>
					</div>
					<div class="row">
						<?php
                            $array_param_product_name = array(
                                ':param_tkeyword' => "%".$keyword."%", 
                                ':param_price' => '0', 
                                ':param_drop_status' => 'N'
                            );
                            // $str_product_name = "select id, product_code, name, tags from product_name 
                            // where (product_code LIKE :param_tkeyword or name LIKE :param_tkeyword or detail LIKE :param_tkeyword) and (is_drop = :param_drop_status)";
                            // $str_orderby = "order by id desc";

                            $str_product_name = "select product_name.name as product_name_name, product_name.tags, 
                            product_name.is_bestseller, product_sku.*, product_sku.name as product_sku_name 
                            from product_sku, product_name 
                            where product_sku.id_products_name = product_name.id and 
                            (product_name.product_code LIKE :param_tkeyword or 
                            product_name.name LIKE :param_tkeyword or product_name.detail LIKE :param_tkeyword or 
                            product_sku.sku_code LIKE :param_tkeyword) and 
                            product_sku.price > :param_price and 
                            product_sku.is_drop = :param_drop_status and 
                            product_name.is_drop = :param_drop_status ";
                            $str_orderby = "order by product_sku.full_price , product_name.name , product_name.id desc";
                            
                            $str_product_name = $str_product_name.$str_orderby;
                        
                            if(isset($_GET['nowpage'])){ ///--
                                $nowpage = $_GET['nowpage'];
                            }else{
                                $nowpage = 1;
                            }
                        
                            $pagesize = 21;
                            $pagestart = ($nowpage-1)*$pagesize;
                        
                            $str_final = $str_product_name." LIMIT $pagestart, $pagesize";
                            $result_product_name = $conn->prepare($str_final);
                            $result_product_name->execute($array_param_product_name);
                        ?>
                        <?php 
                            while($record_product_name = $result_product_name->fetch(PDO::FETCH_ASSOC)){ 
                        ?>
                                <div class="col-3" style="margin-bottom:0.1em; padding: 0.5em; ">
                                    <?php include("page_desktop/products_predetail.php");?>
                                </div>
                        <?php 
                            } 
                            flush();
                        ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once("page_desktop/footer.php");?>