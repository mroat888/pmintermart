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
							<h1><?php echo $type3_name; ?></h1>
						</div>
					</div>
					<div class="row">
						<?php
                            $array_param_product_name = array(
                                ':param_type3_id' => $typ3, 
                                ':param_drop_status' => 'N'
                            );
                            $str_product_name = "select id, product_code, name, tags, is_bestseller 
                            from product_name 
                            where is_drop = :param_drop_status and id_producttype_level3 = :param_type3_id ";
                        
                            $str_orderby = "order by name , id desc";
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
                            $get_pagination = "category/".$typ3."/".$type3_name."/";
                            include_once("products_pagination.php"); 
                        ?>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
    if($record_type3['header_description'] != ""){
?>
<div class="container-fluid" style="background-color: #FFFFFF;">
    <div class="row">
        <div class="container">
            <div class="row" style="margin-top: 1em; margin-bottom: 1em;">
                <div class="col-12">
                    <div class="span_decription span_content" 
                    style="margin-top: 2em; margin-bottom: 2em; padding-left: 0.5em; padding-right: 0.5em; ">
                        <?php echo $record_type3['header_description'];?>
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