<?php require("include_header.php"); ?>

<?php
    if($lang == "en"){
        $canonical_page = URL."?lang=en";
    }else{
        $canonical_page = URL;
    }
?>

    <title>ลูกค้าของเรา PM INTERMART</title>
    
    <meta name="description" content="ลูกค้าของเรา" />
    <link rel="canonical" href="<?php echo $canonical_page;?>" />
</head>
<body itemscope itemtype="http://schema.org/WebPage"> 
    <?php
		if($_GET['ctp'] != ""){
			$client_type = $_GET['ctp'];
		}else{
			$client_type = "3";
		}

        $param_array_client_type = array(':param_status'=>'Y');
        $str_client_type = "select * from client_type where status=:param_status order by pro_index";
        $result_client_type = $conn->prepare($str_client_type);
        $result_client_type->execute($param_array_client_type);
    ?>


<?php   //if($devices == "mobile"){   ?>
            <div><?php //include_once("page_mobile/client.php"); ?></div>
<?php   
        //}else{     
?>
            <div><?php include_once("page_desktop/client.php"); ?></div>
<?php   //}   ?>


<?php require("include_footer.php"); ?>
