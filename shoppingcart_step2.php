<?php require("include_header.php"); ?>

<script language="javascript">
    function delid(keyid){
        if(confirm("คุณต้องการลบใช่หรือไม่")){
            window.location.href="shoppingcart_aed.php?typ=del&delid="+keyid;
       	}
    }
</script>	

    <title>ตระกร้าสินค้า</title>
    <meta name="description" content="<?php echo $mata_description; ?>" />
    <link rel="canonical" href="<?php echo $canonical_page;?>" />

</head>
<body itemscope itemtype="http://schema.org/WebPage">   
<?php
    if(empty($_SESSION['memid'])){
        echo "<script>";
            echo "window.location.href='login.php'";
        echo "</script>";
    }
?>
<?php   if($devices == "mobile"){   ?>
            <div><?php include_once("page_mobile/shoppingcart_step2.php"); ?></div>
<?php   
        }else{     
?>
            <div><?php include_once("page_desktop/shoppingcart_step2.php"); ?></div>
<?php   }   ?>


<?php include_once("lib/php/function.provinceAmphurDistrict.php"); ?>
<?php require("include_footer.php"); ?>
