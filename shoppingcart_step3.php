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
        
        if($_POST['tname'] !=""){
            $_SESSION['tname'] = $_POST['tname'];
        }
        if($_POST['tphone'] !=""){
            $_SESSION['tphone'] = $_POST['tphone'];
        }
        if($_POST['temail'] !=""){
            $_SESSION['temail'] = $_POST['temail'];
        }
        if($_POST['taddress'] !=""){
            $_SESSION['taddress'] = $_POST['taddress'];
        }
        if($_POST['tprovince'] !=""){
            $_SESSION['tprovince'] = $_POST['tprovince'];
        }
        if($_POST['tamphur'] !=""){
            $_SESSION['tamphur'] = $_POST['tamphur'];
        }
        if($_POST['tdistrict'] !=""){
            $_SESSION['tdistrict'] = $_POST['tdistrict'];
        }
        if($_POST['tzipcode'] !=""){
            $_SESSION['tzipcode'] = $_POST['tzipcode'];
        }
        
    ?>

<?php   if($devices == "mobile"){   ?>
            <div><?php include_once("page_mobile/shoppingcart_step3.php"); ?></div>
<?php   
        }else{     
?>
            <div><?php include_once("page_desktop/shoppingcart_step3.php"); ?></div>
<?php   }   ?>

<?php require("include_footer.php"); ?>
