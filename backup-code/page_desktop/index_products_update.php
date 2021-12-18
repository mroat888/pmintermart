<div>
    <div class="row">
        <?php
            $array_param_product_name = array(
                 ':param_is_hotdeal' => 'N', 
                 ':param_drop_status' => 'N'
            );
            $str_product_name = "SELECT id, product_code, name FROM product_name 
                WHERE is_drop = :param_drop_status and is_hotdeal = :param_is_hotdeal ORDER BY id DESC LIMIT 0,12";
            $result_product_name = $conn->prepare($str_product_name);
            $result_product_name->execute($array_param_product_name);
            while($record_product_name = $result_product_name->fetch(PDO::FETCH_ASSOC)){ 
                $array_sku = array(
                    ':param_product_id' => $record_product_name['id'],
                    ':param_is_drop' => 'N',
                );
                $str_sku = "SELECT * FROM product_sku 
                WHERE id_products_name = :param_product_id and is_drop = :param_is_drop";
                $result_sku = $conn->prepare($str_sku);
                $result_sku->execute($array_sku);
                $record_sku = $result_sku->fetch(PDO::FETCH_ASSOC);
        ?>
                <div class="col-3" style="margin-top: 1.5em;">
                  <?php include("products_productpredetail.php"); ?>
                </div>
        <?php
            }
            flush();
        ?> 
    </div>
</div>

