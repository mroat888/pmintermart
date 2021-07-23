<?php require("include_header.php"); ?>

<?php
    if($lang == "en"){
        $canonical_page = URL."?lang=en";
    }else{
        $canonical_page = URL;
    }
?>

    <title>ของใช้โรงแรม สินค้าโรงแรม อุปกรณ์สำหรับโรงแรม ราคาผู้ผลิต</title>
    
    <meta name="description" content="ของใช้ในโรงแรม จำหน่ายปลีก-ส่ง อุปกรณ์ของใช้โรงแรมครบวงจร สินค้าโรงแรม ของใช้ในห้องพัก สินค้าพื้นที่ส่วนกลาง ของใช้ในห้องน้ำ อเมนิตี้ รถเข็นโรงแรม ป้ายแขวนประตู ไดร์เป่าผมติดผนัง ตู้เย็นโรงแรม กระจกส่องหน้า รองเท้าสลิปเปอร์" />
    <link rel="canonical" href="<?php echo $canonical_page;?>" />



<?php
    include_once("config/config.php");
    $url_link = URL."vendor/OwlCarousel2-2.3.4/docs";  
    echo $url_link;
?>


</head>
<body itemscope itemtype="http://schema.org/WebPage"> 

          <div class="owl-carousel owl-theme">
            <div class="item">
              <h4>1</h4>
            </div>
            <div class="item">
              <h4>2</h4>
            </div>
            <div class="item">
              <h4>3</h4>
            </div>
            <div class="item">
              <h4>4</h4>
            </div>
            <div class="item">
              <h4>5</h4>
            </div>
            <div class="item">
              <h4>6</h4>
            </div>
            <div class="item">
              <h4>7</h4>
            </div>
            <div class="item">
              <h4>8</h4>
            </div>
            <div class="item">
              <h4>9</h4>
            </div>
            <div class="item">
              <h4>10</h4>
            </div>
            <div class="item">
              <h4>11</h4>
            </div>
            <div class="item">
              <h4>12</h4>
            </div>
          </div>

          <script>
            $(document).ready(function() {
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                margin: 10,
                nav: true,
                loop: true,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 3
                  },
                  1000: {
                    items: 5
                  }
                }
              })
            })
          </script>
        </div>
      </div>
    </section>



<?php require("include_footer.php"); ?>
