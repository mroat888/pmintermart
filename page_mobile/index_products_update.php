<div class="row" style="background-color: #47b10d; padding-top: 1em; padding-bottom: 1em;">
    <div class="col-12">
        <h3 class="font_header font_yellow" style="font-weight: bold;"><i class="fas fa-star"></i> สินค้ามาใหม่</h3>
    </div>
</div>
<div style="margin-top: 15px;">
    <div class="row">
        <?php
            $array_param_product_name = array(
                ':param_price' => '0', 
                ':param_drop_status' => 'N'
            );
            $str_product_name = "SELECT product_name.name as product_name_name, product_name.tags, 
            product_name.is_bestseller, product_sku.*, product_sku.name as product_sku_name 
            FROM product_sku, product_name 
            WHERE product_sku.id_products_name = product_name.id and 
            product_name.is_drop = :param_drop_status and 
            product_sku.is_drop = :param_drop_status and 
            product_sku.price > :param_price ";
            $str_orderby = "order by product_sku.full_price , product_name.name , product_name.id desc ";
            $str_product_name = $str_product_name.$str_orderby;
                if(isset($_GET['nowpage'])){ ///--
                    $nowpage = $_GET['nowpage'];
                }else{
                    $nowpage = 1;
                }
                        
                $pagesize = 18;
                $pagestart = ($nowpage-1)*$pagesize;
                        
                $str_final = $str_product_name." LIMIT $pagestart, $pagesize";
                $result_product_name = $conn->prepare($str_final);
                $result_product_name->execute($array_param_product_name);

            while($record_product_name = $result_product_name->fetch(PDO::FETCH_ASSOC)){ 
        ?>
                <div class="col-6" style="margin-top: 1.5em;">
                  <?php include("products_predetail.php"); ?>
                </div>
        <?php
            }
            flush();
        ?> 
    </div>
</div>

