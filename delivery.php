<?php require("include_header.php"); ?>

<?php
    if($lang == "en"){
        $canonical_page = URL."?lang=en";
    }else{
        $canonical_page = URL;
    }
?>

    <title>เกี่ยวกับ PM INTERMART</title>
    
    <meta name="description" content="ของใช้ในโรงแรม จำหน่ายปลีก-ส่ง อุปกรณ์ของใช้โรงแรมครบวงจร สินค้าโรงแรม ของใช้ในห้องพัก สินค้าพื้นที่ส่วนกลาง ของใช้ในห้องน้ำ อเมนิตี้ รถเข็นโรงแรม ป้ายแขวนประตู ไดร์เป่าผมติดผนัง ตู้เย็นโรงแรม กระจกส่องหน้า รองเท้าสลิปเปอร์" />
    <link rel="canonical" href="<?php echo $canonical_page;?>" />
</head>
<body itemscope itemtype="http://schema.org/WebPage"> 

 <?php
        if($lang == "en"){
            $delivery_free_1 = "Free delivered by our staffs";
            $delivery_free_detial_1 = "The amounts order over Bht. 5,000<br>
                                            (Inner Bangkok Area & Nonthaburi)";
            $delivery_free_2 = "Delivered by transportation";
            $delivery_free_detial_2 = "Transport cost pay at destination<br>
                                            (All cities in thailand)";
            $delivery_free_3 = "Delivered by parcel post";
            $delivery_free_detial_3 = "Small parcel goods only<br>
                                            Client's payment (notice before delivery)";
        }else{
            $delivery_free_1 = "จัดส่งโดยพนักงานบริษัท";
            $delivery_free_detial_1 = "ในเขตพื้นที่กรุงเทพชั้นในและนนทบุรี";

            $delivery_free_2 = "จัดส่งโดยบริษัทขนส่งเอกชน";
            $delivery_free_detial_2 = "ทุกจังหวัดในประเทศไทย";

            $delivery_free_3 = "จัดส่งทางพัสดุไปรษณีย์";
            $delivery_free_detial_3 = "สินค้าขนาดเล็ก จำนวนไม่มาก";
        }
    ?> 

<?php   if($devices == "mobile"){   ?>
            <div><?php include_once("page_mobile/delivery.php"); ?></div>
<?php   
        }else{     
?>
            <div><?php include_once("page_desktop/delivery.php"); ?></div>
<?php   }   ?>

<?php require("include_footer.php"); ?>
