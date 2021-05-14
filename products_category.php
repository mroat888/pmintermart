<?php require("include_header.php"); ?>

<?php

    $typ3 = $_GET['typ3'];
    $array_param_type3 = array(
        ':param_type3_id' => $typ3
    );
    $str_typ3 = "select * from producttype_level3 where id = :param_type3_id";
    $result_type3 = $conn->prepare($str_typ3);
    $result_type3->execute($array_param_type3);
    $record_type3 = $result_type3->fetch(PDO::FETCH_ASSOC);

    if($lang == "en"){
        $type3_name = $record_type2['name_en'];
        $mata_title = @$record_type2['mata_title_en'];
        $canonical_type3_name = $pagetitle->setLinkReplace($type3_name);
        $canonical_page = URL."category/".$record_type2['id']."/".$canonical_type2_name."/"."1/".$lang."/";
    }else{
        $type3_name = $record_type3['name'];
        $meta_title = @$record_type3['mata_title'];
        $canonical_type3_name = $pagetitle->setLinkReplace($type3_name);
        $canonical_page = URL."category/".$record_type3['id']."/".$canonical_type3_name."/"."1/";
    }
    
    if($meta_title == ""){
        $meta_title = $type3_name;
    }

    $meta_description = $record_type3['meta_description'];
?>

    <title><?php echo $meta_title; ?></title>
    <meta name="description" content="<?php echo $meta_description; ?>" />
    <link rel="canonical" href="<?php echo $canonical_page;?>" />

</head>
<body itemscope itemtype="http://schema.org/WebPage">   

<?php   if($devices == "mobile"){   ?>
            <div><?php include_once("page_mobile/products_category.php"); ?></div>
<?php   
        }else{     
?>
            <div><?php include_once("page_desktop/products_category.php"); ?></div>
<?php   }   ?>

<?php require("include_footer.php"); ?>