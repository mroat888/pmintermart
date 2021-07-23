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

<?php   if($devices == "mobile"){   ?>
            <div><?php include_once("page_mobile/howtobuying.php"); ?></div>
<?php   
        }else{     
?>
            <div><?php include_once("page_desktop/howtobuying.php"); ?></div>
<?php   }   ?>

<?php require("include_footer.php"); ?>
