<?php require("include_header.php"); ?>

<?php
    $tag = $_GET['tag'];
    $meta_title = "ค้นหา : ".$tag;
    $canonical_page = URL."tags/".$tag."/1/";
?>

    <title><?php echo $meta_title; ?></title>
    <meta name="description" content="" />
    <link rel="canonical" href="<?php echo $canonical_page;?>" />

</head>
<body itemscope itemtype="http://schema.org/WebPage">   

<?php   if($devices == "mobile"){   ?>
            <div><?php include_once("page_mobile/products_tags.php"); ?></div>
<?php   
        }else{     
?>
            <div><?php include_once("page_desktop/products_tags.php"); ?></div>
<?php   }   ?>

<?php require("include_footer.php"); ?>