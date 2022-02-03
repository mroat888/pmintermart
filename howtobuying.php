<?php require("include_header.php"); ?>

<?php
    if($lang == "en"){
        $canonical_page = URL."?lang=en";
    }else{
        $canonical_page = URL;
    }
?>

    <title>วิธีการสั่งซื้อ PM INTERMART</title>
    
    <meta name="description" content="สั่งซื้อสินค้าของเราได้ง่ายๆ ไม่กี่ขั้นตอน" />
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
