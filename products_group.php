<?php require("include_header.php"); ?>

<?php
    $typ1 = $_GET['typ1'];
    $array_param_type1 = array(
        ':param_type1_id' => $typ1
    );
    $str_typ1 = "select * from producttype_level1 where id = :param_type1_id";
    $result_type1 = $conn->prepare($str_typ1);
    $result_type1->execute($array_param_type1);
    $record_type1 = $result_type1->fetch(PDO::FETCH_ASSOC);

    if($lang == "en"){
        $type1_name = $record_type1['name_en'];
        $canonical_type1_name = $pagetitle->setLinkReplace($type1_name);
        $canonical_page = URL."group/".$record_type1['id']."/".$canonical_type1_name."/"."1/".$lang."/";

    }else{
        if($record_type1['name_en'] != ""){
            $type1_name = $record_type1['name'].' : '.$record_type1['name_en'];
        }else{
            $type1_name = $record_type1['name'];
        }
        $type1_name_setLinkReplace = $record_type1['name'];
        $canonical_type1_name = $pagetitle->setLinkReplace($type1_name_setLinkReplace);
        $canonical_page = URL."group/".$record_type1['id']."/".$canonical_type1_name."/"."1/";
    }

    $meta_title = $record_type1['meta_title'] ;
    $meta_description = $record_type1['meta_description'];
?>

    <title><?php echo $meta_title; ?></title>
    <meta name="description" content="<?php echo $meta_description; ?>" />
    <link rel="canonical" href="<?php echo $canonical_page;?>" />

</head>
<body itemscope itemtype="http://schema.org/WebPage">   

<?php   if($devices == "mobile"){   ?>
            <div><?php include_once("page_mobile/products_group.php"); ?></div>
<?php   
        }else{     
?>
            <div><?php include_once("page_desktop/products_group.php"); ?></div>
<?php   }   ?>

<?php require("include_footer.php"); ?>