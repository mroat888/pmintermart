<?php require("include_header.php"); ?>

<?php
    if($lang == "en"){
        $canonical_page = URL."?lang=en";
    }else{
        $canonical_page = URL;
    }
?>

    <title>ศูนย์รวมของใช้ในบ้าน นวัตกรรมนำสมัย หรูหรา สไตล์โรงแรม</title>
    
    <meta name="description" content="ซื้อ ของตกแต่งบ้าน ของใช้ในบ้าน สไตล์โรงแรม หรูหรา ทันสมัย เพื่อชีวิตที่สะดวกสบายขึ้นอย่างมสไตล์ ตกแต่งบ้าน คอนโด ที่บ้านแบบรีสอร์ท ตอบโจทย์การแต่งบ้าน" />
    <link rel="canonical" href="<?php echo $canonical_page;?>" />
</head>
<body itemscope itemtype="http://schema.org/WebPage"> 

<?php   if($devices == "mobile"){   ?>
            <div><?php include_once("page_mobile/index.php"); ?></div>
<?php   
        }else{     
?>
            <div><?php include_once("page_desktop/index.php"); ?></div>
<?php   }   ?>



<?php require("include_footer.php"); ?>
