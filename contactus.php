<?php require("include_header.php"); ?>

<?php
    if($lang == "en"){
        $canonical_page = URL."?lang=en";
    }else{
        $canonical_page = URL;
    }
?>

    <title>ติดต่อเรา PM INTERMART</title>
    
    <meta name="description" content="ติดต่อเรา Pm Intermart ศูนย์รวมของใช้ในบ้าน คุณภาพ มาตราฐานโรงแรม" />
    <link rel="canonical" href="<?php echo $canonical_page;?>" />
</head>
<body itemscope itemtype="http://schema.org/WebPage"> 

<?php   if($devices == "mobile"){   ?>
            <div><?php include_once("page_mobile/contactus.php"); ?></div>
<?php   
        }else{     
?>
            <div><?php include_once("page_desktop/contactus.php"); ?></div>
<?php   }   ?>

<?php require("include_footer.php"); ?>
