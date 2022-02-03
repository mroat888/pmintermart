<?php require("include_header.php"); ?>

<?php
    // if(!isset($_SESSION['cart_id']) || empty($_SESSION['cart_id'])){
    //     echo "<script>";
    //         echo "window.location.href='".URL."index.php'";
    //     echo "</script>";
    // }
?>

<script language="javascript">
    function delid(keyid){
        if(confirm("คุณต้องการลบใช่หรือไม่")){
            window.location.href="shoppingcart_aed.php?typ=del&delid="+keyid;
       	}
    }
</script>	

    <title>ตระกร้าสินค้า</title>
    <!-- <meta name="description" content="<?php echo $mata_description; ?>" /> -->
    <link rel="canonical" href="<?php echo $canonical_page;?>" />

</head>
<body itemscope itemtype="http://schema.org/WebPage">   

<?php   if($devices == "mobile"){   ?>
            <div><?php include_once("page_mobile/shoppingcart_step1.php"); ?></div>
<?php   
        }else{     
?>
            <div><?php include_once("page_desktop/shoppingcart_step1.php"); ?></div>
<?php   }   ?>

<?php require("include_footer.php"); ?>
