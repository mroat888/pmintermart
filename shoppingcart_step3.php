<?php require("include_header.php"); ?>

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

    <?php
        
        if(!empty($_POST['tname'] ) && $_POST['tname'] !=""){
            $_SESSION['tname'] = $_POST['tname'];
        }
        if(!empty($_POST['tphone']) && $_POST['tphone'] !=""){
            $_SESSION['tphone'] = $_POST['tphone'];
        }
        if(!empty($_POST['temail']) && $_POST['temail'] !=""){
            $_SESSION['temail'] = $_POST['temail'];
        }
        if(!empty($_POST['taddress']) && $_POST['taddress'] !=""){
            $_SESSION['taddress'] = $_POST['taddress'];
        }
        if(!empty($_POST['tprovince']) && $_POST['tprovince'] !="0" && $_POST['tprovince'] != ""){
            $_SESSION['tprovince'] = $_POST['tprovince'];
        }
        if(!empty($_POST['tamphur']) && $_POST['tamphur'] !="0" && $_POST['tamphur'] != ""){
            $_SESSION['tamphur'] = $_POST['tamphur'];
        }
        if(!empty($_POST['tdistrict']) && $_POST['tdistrict'] !="0" && $_POST['tdistrict'] != ""){
            $_SESSION['tdistrict'] = $_POST['tdistrict'];
        }
        if(!empty($_POST['tzipcode']) && $_POST['tzipcode'] !=""){
            $_SESSION['tzipcode'] = $_POST['tzipcode'];
        }
        if(!empty($_POST['tpayment']) && $_POST['tpayment'] !=""){
            $_SESSION['tpayment'] = $_POST['tpayment'];
        }
        
    ?>

<?php   if($devices == "mobile"){   ?>
            <div><?php include_once("page_mobile/shoppingcart_step3.php"); ?></div>
<?php   
        }else{     
?>
            <div><?php include_once("page_desktop/shoppingcart_step3.php"); ?></div>
<?php   }   ?>


<script>
	function comfirm_order(){
		window.location.href="<?php echo URL?>confirm_order.php";
	}

	function backpage_step2(){
		window.location.href="<?php echo URL?>shoppingcart_step2.php";
	}
</script>

<?php require("include_footer.php"); ?>

