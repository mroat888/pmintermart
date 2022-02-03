<?php require("include_header.php"); ?>

<?php
	$array_order_main = array(
		':param_id_member' => $_SESSION['memid']
	);
    $str_order_main = "SELECT * FROM order_main WHERE id_member = :param_id_member  order by id desc";
    $result_order_main = $conn->prepare($str_order_main);
    $result_order_main->execute($array_order_main);
?>

    <title>ประวัติการสั่งซื้อ</title>
    <!-- <meta name="description" content="<?php echo $mata_description; ?>" /> -->
    <link rel="canonical" href="<?php echo $canonical_page;?>" />

</head>
<body itemscope itemtype="http://schema.org/WebPage">   

<?php   if($devices == "mobile"){   ?>
            <div><?php include_once("page_mobile/order_history.php"); ?></div>
<?php   
        }else{     
?>
            <div><?php include_once("page_desktop/order_history.php"); ?></div>
<?php   }   ?>

<?php require("include_footer.php"); ?>