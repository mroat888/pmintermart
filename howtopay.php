<?php require("include_header.php"); ?>

<?php
    if($lang == "en"){
        $canonical_page = URL."?lang=en";
    }else{
        $canonical_page = URL;
    }
?>

    <title>วิธีการชำระเงิน PM INTERMART</title>
    
    <meta name="description" content="ชำระเงินได้ง่าย ปลอดภัยด้วยมาตรฐานสากล" />
    <link rel="canonical" href="<?php echo $canonical_page;?>" />
</head>
<body itemscope itemtype="http://schema.org/WebPage"> 

<?php   if($devices == "mobile"){   ?>
            <div><?php include_once("page_mobile/howtopay.php"); ?></div>
<?php   
        }else{     
?>
            <div><?php include_once("page_desktop/howtopay.php"); ?></div>
<?php   }   ?>

<?php require("include_footer.php"); ?>
