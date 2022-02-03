<div class="row ">
    <div class="col-12" style="text-align:right;"> 
        <a href="client.php">
            <div>
                <span class="text_color_header" style="font-size:25px;">Some of our reference clients...</span>
            </div>
        </a>
    </div>
</div>
<div class="mt-3">
    <div class="owl-carousel owl-theme">
        <?php
            for($i=1; $i<38; $i++){
        ?>
        <div class="item">
            <img data-u="image" onclick="javascript:window.location.href='client.php'" 
            style="cursor: pointer; max-height:55px; " 
            src="<?php echo URL; ?>referance/ref-<?=$i?>.png" />
        </div>
        <?php
            }
        ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items:10,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:1000,
            autoplayHoverPause:true,
            dots:false,
            responsiveClass:true,
        });
    });
</script>
