<!-- <div class="">
    <div class="owl-carousel owl-carousel-banner owl-theme">
        <div class="item">
            <img class="d-block w-100" src="<?php echo URL; ?>/banner_slide/banner-slide-4.jpg" 
            alt="Sale pm intermart"style="max-width:825px; max-height: 460px;">
        </div> 
        <div class="item">
            <img class="d-block w-100" src="<?php echo URL; ?>/banner_slide/banner-slide-5.jpg" 
            alt="Sale pm intermart"style="max-width:825px; max-height: 460px;">
        </div> 
    </div>
</div> -->

<div class="" style="margin:0px; padding: 0px; margin-top: 0.1em; ">
    <div class="owl-carousel owl-carousel-banner owl-theme">
        <div class="item">
            <img class="d-block w-100" src="<?php echo URL; ?>/banner_slide/banner-4.jpg" 
            alt="Sale pm intermart"style="max-width:100%;">
        </div> 
        <div class="item">
            <img class="d-block w-100" src="<?php echo URL; ?>/banner_slide/banner-3.jpg" 
            alt="Sale pm intermart"style="max-width:100%;">
        </div> 
        <div class="item">
            <img class="d-block w-100" src="<?php echo URL; ?>/banner_slide/banner-1.jpg" 
            alt="Sale pm intermart"style="max-width:100%;">
        </div> 
        <div class="item">
            <img class="d-block w-100" src="<?php echo URL; ?>/banner_slide/banner-2.jpg" 
            alt="Sale pm intermart"style="max-width:100%;">
        </div> 
    </div>
</div>

<script>
    $(document).ready(function() {
        var owl_topview = $('.owl-carousel-banner');
        owl_topview.owlCarousel({
        items:1,
        loop:true,
        margin:0,
        autoplay:true,
        autoplayTimeout:2900,
        autoplayHoverPause:true,
        nav:true,
        dots:true,
        navText: ["<i class='fa fa-chevron-left fanav' style='font-size:3em'></i>","<i class='fa fa-chevron-right fanav' style='font-size:3em'></i>"]
        })
    });
</script>