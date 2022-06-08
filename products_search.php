<?php require("include_header.php"); ?>

<?php
    $keyword = $_GET['keyword'];
    $meta_title = "ค้นหา : ".$keyword;
    $canonical_page = URL."search/".$keyword."/1/";
?>

    <title><?php echo $meta_title; ?></title>
    <meta name="description" content="" />
    <link rel="canonical" href="<?php echo $canonical_page;?>" />

</head>
<body itemscope itemtype="http://schema.org/WebPage">   

<?php
                            $array_param_product_name = array(
                                ':param_tkeyword' => "%".$keyword."%", 
                                //':param_price' => '0', 
                                ':param_drop_status' => 'N'
                            );
                            // $str_product_name = "select id, product_code, name, tags from product_name 
                            // where (product_code LIKE :param_tkeyword or name LIKE :param_tkeyword or detail LIKE :param_tkeyword) and (is_drop = :param_drop_status)";
                            // $str_orderby = "order by id desc";

                            $str_product_name = "select product_name.name as product_name_name, product_name.tags, 
                            product_name.is_bestseller, product_sku.*, product_sku.name as product_sku_name 
                            from product_sku, product_name 
                            where product_sku.id_products_name = product_name.id and 
                            (product_name.product_code LIKE :param_tkeyword or 
                            product_name.name LIKE :param_tkeyword or product_name.detail LIKE :param_tkeyword or 
                            product_sku.sku_code LIKE :param_tkeyword) and 
                            product_sku.is_drop = :param_drop_status and 
                            product_name.is_drop = :param_drop_status ";
                            $str_orderby = "order by product_sku.full_price , product_name.name , product_name.id desc";
                            
                            $str_product_name = $str_product_name.$str_orderby;
                        
                            if(isset($_GET['nowpage'])){ ///--
                                $nowpage = $_GET['nowpage'];
                            }else{
                                $nowpage = 1;
                            }
                        
                            $pagesize = 21;
                            $pagestart = ($nowpage-1)*$pagesize;
                        
                            $str_final = $str_product_name." LIMIT $pagestart, $pagesize";
                            $result_product_name = $conn->prepare($str_final);
                            $result_product_name->execute($array_param_product_name);
                        ?>

<?php  // if($devices == "mobile"){   ?>
            <div><?php // include_once("page_mobile/products_search.php"); ?></div>
<?php   
        // }else{     
?>
            <div><?php include_once("page_desktop/products_search.php"); ?></div>
<?php   // }   ?>

<?php require("include_footer.php"); ?>