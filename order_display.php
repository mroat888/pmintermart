<?php require("include_header.php"); ?>

<?php
    if($lang == "en"){
        $canonical_page = URL."?lang=en";
    }else{
        $canonical_page = URL;
    }
?>

    <title>ของใช้ในบ้าน ตกแต่งบ้าน ด้วยสินค้าเกรดโรงแรม ในราคาผู้ผลิต</title>
    
    <meta name="description" content="ของใช้ในบ้าน ตกแต่งบ้าน ด้วยสินค้าเกรดโรงแรม ในราคาผู้ผลิต" />
    <link rel="canonical" href="<?php echo $canonical_page;?>" />
</head>
<body itemscope itemtype="http://schema.org/WebPage"> 

<?php   if($devices == "mobile"){   ?>
            <div><?php include_once("page_mobile/order_dispaly.php"); ?></div>
<?php   
        }else{     
?>
            <div><?php include_once("page_desktop/order_dispaly.php"); ?></div>
<?php   }   ?>

<?php require("include_footer.php"); ?>
