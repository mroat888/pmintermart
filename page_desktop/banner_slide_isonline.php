<div class="">
    <div class="owl-carousel owl-carousel-banner-isonline owl-theme">
        <div class="item">
            <a href="<?php echo URL; ?>collection/7/ไดร์เป่าผม/1/">
                <img class="d-block w-100" src="<?php echo URL; ?>/banner_slide/Wall-Mounted-Hair-Dryer-2020-04-02.jpg" 
                alt="โต๊ะรีดผ้า สีเทา"style="max-width:100%;">
            </a>
        </div>
        <div class="item">
            <a href="<?php echo URL; ?>product/2/โต๊ะรีดผ้า - สีดำ/">
                <img class="d-block w-100" src="<?php echo URL; ?>/banner_slide/banner-IRT-3613HT-T2.jpg" 
                alt="โต๊ะรีดผ้า สีดำ"style="max-width:100%;">
            </a>
        </div> 
        <div class="item">
            <a href="<?php echo URL; ?>product/16/ตู้เซฟโรงแรม หน้าปัดเหลี่ยมโค้ง - สีดำ/">
                <img class="d-block w-100" src="<?php echo URL; ?>/banner_slide/safebox-hsb-fb-2042.jpg" 
                alt="ตู้เซฟโรงแรม"style="max-width:100%;">
            </a>
        </div> 
        
    </div>
</div>

<script>
    $(document).ready(function() {
        var owl_topview = $('.owl-carousel-banner-isonline');
        owl_topview.owlCarousel({
        items:1,
        loop:true,
        margin:0,
        autoplay:true,
        autoplayTimeout:4900,
        autoplayHoverPause:true,
        nav:true,
        dots:false,
        navText: ["<i class='fa fa-chevron-left fanav'></i>","<i class='fa fa-chevron-right fanav'></i>"]
        })
    });
</script>