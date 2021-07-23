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

    if($lang == "en"){
        $type2_name = $record_type2['name_en'];
        $mata_title = @$record_type2['mata_title_en'];
        $canonical_type2_name = $pagetitle->setLinkReplace($type2_name);
        $canonical_page = URL."collection/".$record_type2['id']."/".$canonical_type2_name."/"."1/".$lang."/";
    }else{
        $type2_name = $record_type2['name'];
        $meta_title = @$record_type2['mata_title'];
        $canonical_type2_name = $pagetitle->setLinkReplace($type2_name);
        $canonical_page = URL."collection/".$record_type2['id']."/".$canonical_type2_name."/"."1/";
    }
    
    if($meta_title == ""){
        $meta_title = $type2_name;
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