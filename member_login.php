<?php require("include_header.php"); ?>

    <title>เข้าระบบสมาชิก</title>
    <!-- <meta name="description" content="<?php echo $mata_description; ?>" />
    <link rel="canonical" href="<?php echo $canonical_page;?>" /> -->

</head>
<body itemscope itemtype="http://schema.org/WebPage">   
<?php   if($devices == "mobile"){   ?>
            <div><?php include_once("page_mobile/member_login.php"); ?></div>
<?php   
        }else{     
?>
            <div><?php include_once("page_desktop/member_login.php"); ?></div>
<?php   }   ?>

<?php require("include_footer.php"); ?>