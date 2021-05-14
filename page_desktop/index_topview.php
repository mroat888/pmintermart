<!-- <div class="">
    <h3><i class="fab fa-hotjar"></i> สินค้ายอดฮิต</h3>
</div> -->
<div class="">
    <div class="owl-carousel owl-carousel-topview owl-theme">
    <?php
        $array_param_product_name = array(
             ':param_is_hotdeal' => 'N', 
             ':param_drop_status' => 'N'
        );
        $str_product_name = "SELECT id, product_code, name FROM product_name 
            WHERE is_drop = :param_drop_status and is_hotdeal = :param_is_hotdeal LIMIT 0,10";
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
            <div class="item">
              <?php include("products_productpredetail.php"); ?>
            </div>
    <?php
        }
        flush();
    ?> 
    </div>
</div>

<script>
    $(document).ready(function() {
        var owl_topview = $('.owl-carousel-topview');
        owl_topview.owlCarousel({
        items:5,
        loop:true,
        margin:8,
        autoplay:true,
        autoplayTimeout:4900,
        autoplayHoverPause:true,
        nav:true,
        dots:false,
        navText: ["<i class='fa fa-chevron-left fanav orvertopfanav'></i>","<i class='fa fa-chevron-right fanav orvertopfanav'></i>"]
        })
    });

</script>
