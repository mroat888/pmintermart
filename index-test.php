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
</head>
<body itemscope itemtype="http://schema.org/WebPage"> 

<nav class="navbar sticky-top navbar-light bg-light">
  <div class="container">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  </div>
</nav>
<?php   if($devices == "mobile"){   ?>
            <div><?php include_once("page_mobile/index.php"); ?></div>
<?php   
        }else{     
?>
            <div><?php include_once("page_desktop/index.php"); ?></div>
<?php   }   ?>

<?php require("include_footer.php"); ?>
