<!-- <h3 class="font_header" style="font-weight: bold;"><i class="fas fa-bolt"></i> Hot Deal</h3> -->
<div style="margin-top: 0.9em;">
    <div class="">
        <div class="owl-carousel owl-carousel-group_products owl-theme">
            <?php
                $array_type_lv1 = array(":param_status" => "Y");
                $str_type_lv1 = "select * from producttype_level1 
                where status = :param_status order by ordinal_number, id";
                $result_type_lv1 = $conn->prepare($str_type_lv1);
                $result_type_lv1->execute($array_type_lv1);
                while($record_type_lv1 = $result_type_lv1->fetch(PDO::FETCH_ASSOC)){
                    $patch_img = URL."img_product_group/".$record_type_lv1['id']."-1.jpg";
            ?>
                    <div class="item">
                        <a href="<?php echo URL;?>group/<?php echo $record_type_lv1['id']; ?>/<?php echo $record_type_lv1['name']; ?>/1/" class="font_black">
                            <img src="<?php echo $patch_img;?>" style="max-width: 100%;" 
                            alt="<?php echo $record_type_lv1['name']; ?>">
                            <div class="btn_groupproducts">
                                <?=$record_type_lv1['name']; ?>
                            </div>
                        </a>
                    </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var owl = $('.owl-carousel-group_products');
        owl.owlCarousel({
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

<style type="text/css">
    .btn_groupproducts{
        position: absolute;
        text-align: center;
        margin-top: -8em;
        width: 60%;
        margin-left: 20%;
        /*border: 1px solid green;*/
        border-radius: 1.5em;
        background-color: #FFFFFF;
        padding: 10px;
        font-size: 0.7em;
        font-weight: bold;
    }
</style>