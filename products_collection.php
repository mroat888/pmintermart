<?php require("include_header.php"); ?>

<?php

    $typ2 = $_GET['typ2'];
    $array_param_type2 = array(
        ':param_type2_id' => $typ2
    );
    $str_typ2 = "select * from producttype_level2 where id = :param_type2_id";
    $result_type2 = $conn->prepare($str_typ2);
    $result_type2->execute($array_param_type2);
    $record_type2 = $result_type2->fetch(PDO::FETCH_ASSOC);

    $array_param_type1 = array(
        ':param_type1_id' => $record_type2['id_producttype_level1']
    );
    $str_typ1 = "select * from producttype_level1 where id = :param_type1_id";
    $result_type1 = $conn->prepare($str_typ1);
    $result_type1->execute($array_param_type1);
    $record_type1 = $result_type1->fetch(PDO::FETCH_ASSOC);

    if($lang == "en"){
        $type1_name = $record_type1['name_en'];
        $type2_name = $record_type2['name_en'];
        $mata_title = @$record_type2['mata_title_en'];
        $canonical_type2_name = $pagetitle->setLinkReplace($type2_name);
        $canonical_page = URL."collection/".$record_type2['id']."/".$canonical_type2_name."/"."1/".$lang."/";
    }else{
        $type1_name = $record_type1['name'];
        $type2_name = $record_type2['name'];
        $meta_title = @$record_type2['meta_title'];
        $canonical_type2_name = $pagetitle->setLinkReplace($type2_name);
        $canonical_page = URL."collection/".$record_type2['id']."/".$canonical_type2_name."/"."1/";
    }
    
    if($meta_title == ""){
        $meta_title = $type2_name." ".$type1_name. " มาตราฐานโรงแรม";
    }

    $meta_description = $record_type2['meta_description'];
?>

    <title><?php echo $meta_title; ?></title>
    <meta name="description" content="<?php echo $meta_description; ?>" />
    <link rel="canonical" href="<?php echo $canonical_page;?>" />

</head>
<body itemscope itemtype="http://schema.org/WebPage">   

<?php   if($devices == "mobile"){   ?>
            <div><?php include_once("page_mobile/products_collection.php"); ?></div>
<?php   
        }else{     
?>
            <div><?php include_once("page_desktop/products_collection.php"); ?></div>
<?php   }   ?>

<?php require("include_footer.php"); ?>