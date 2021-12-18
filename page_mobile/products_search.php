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
                            // $result_product_name มาจากหน้ารวม products_search  (ใช้รวมกัน)
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