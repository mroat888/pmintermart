<?php require("include_header.php"); ?>
<?php
    $canonical_page = URL."products_hotsale.php";
?>
    <title><?php echo $meta_title; ?></title>
    <meta name="description" content="" />
    <link rel="canonical" href="<?php echo $canonical_page;?>" />

</head>
<body itemscope itemtype="http://schema.org/WebPage">   

<?php   if($devices == "mobile"){   ?>
            <div><?php include_once("page_mobile/products_hotsale.php"); ?></div>
<?php   
        }else{     
?>
            <div><?php include_once("page_desktop/products_hotsale.php"); ?></div>
<?php   }   ?>

<?php require("include_footer.php"); ?>