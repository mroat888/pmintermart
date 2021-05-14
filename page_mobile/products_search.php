<?php include_once("page_mobile/menu_header.php"); flush();?>

<div class="container-fluid">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-12" style="min-height: 500px;">
					<div class="row" style="margin-top: 25px;">
						<div class="col-12">
							<h1><?php echo $keyword; ?></h1>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
						</div>
					</div>
					<div class="row">
						<?php
                            $array_param_product_name = array(
                                ':param_tkeyword' => "%".$keyword."%", 
                                ':param_drop_status' => 'N'
                            );
                            $str_product_name = "select id, product_code, name from product_name 
                            where (product_code LIKE :param_tkeyword or name LIKE :param_tkeyword or detail LIKE :param_tkeyword) and (is_drop = :param_drop_status)";
                        
                            $str_orderby = "order by id desc";
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
                                $array_sku = array(
                                     ':param_product_id' => $record_product_name['id'],
                                     ':param_is_drop' => 'N',
                                );
                                $str_sku = "select * from product_sku where id_products_name = :param_product_id and is_drop = :param_is_drop";
                                $result_sku = $conn->prepare($str_sku);
                                $result_sku->execute($array_sku);
                                while($record_sku = $result_sku->fetch(PDO::FETCH_ASSOC)){
                        ?>
                                <div class="col-6" style="margin-bottom:20px;">
                                    <?php include("page_mobile/products_predetail.php");?>
                                </div>
                        <?php 
                                }
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