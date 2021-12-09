<?php require("include_header.php"); ?>

<?php
	$array_order_main = array(
		':param_id_member' => $_SESSION['memid'],
        ':parma_id_order' => $_GET['id']
	);
    $str_order_main = "SELECT * FROM order_main WHERE id = :parma_id_order and id_member = :param_id_member  order by id desc";
    $result_order_main = $conn->prepare($str_order_main);
    $result_order_main->execute($array_order_main);
?>

    <title>ประวัติการสั่งซื้อ</title>
    <meta name="description" content="<?php echo $mata_description; ?>" />
    <link rel="canonical" href="<?php echo $canonical_page;?>" />

</head>
<body itemscope itemtype="http://schema.org/WebPage">   

<?php   if($devices == "mobile"){   ?>
            <div><?php include_once("page_mobile/payment.php"); ?></div>
<?php   
        }else{     
?>
            <div><?php include_once("page_desktop/payment.php"); ?></div>
<?php   }   ?>

<?php require("include_footer.php"); ?>