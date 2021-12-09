<?php require("include_header.php"); ?>

<?php
    $id = $_GET['id'];
	$array_wp_yoast_indexable = array(':param_id' => $id );
	$str_wp_yoast_indexable = "select * from wp_yoast_indexable where object_sub_type = 'post' and post_status = 'publish' and object_id = :param_id " ;
	$result_wp_yoast_indexable = $conn_wp->prepare($str_wp_yoast_indexable);
	$result_wp_yoast_indexable->execute($array_wp_yoast_indexable);
	$record_wp_yoast_indexable = $result_wp_yoast_indexable->fetch(PDO::FETCH_ASSOC);

	$meta_title = $record_wp_yoast_indexable['title'];
	$meta_description = $record_wp_yoast_indexable['description'];

	$array_wp_posts = array(':param_id' => $id );
	$str_wp_posts = "select * from wp_posts where post_status = 'publish' and post_type = 'post' and id = :param_id";
	$result_wp_posts = $conn_wp->prepare($str_wp_posts);
	$result_wp_posts->execute($array_wp_posts);
	$record_wp_posts = $result_wp_posts->fetch(PDO::FETCH_ASSOC);

	/*--- รูป --*/
	$array_wp_postmeta = array(':param_postid' => $record_wp_posts['ID']);
	$str_wp_postmeta = "select meta_value from wp_postmeta where post_id = :param_postid and meta_key = '_thumbnail_id'";
	$result_wp_postmeta = $conn_wp->prepare($str_wp_postmeta);
	$result_wp_postmeta->execute($array_wp_postmeta);
	$record_wp_postmeta = $result_wp_postmeta->fetch(PDO::FETCH_ASSOC);

	$array_wp_posts_img = array(
		':param_id' => $record_wp_postmeta['meta_value'], 
		':param_postid' => $record_wp_posts['ID']
	);

	$str_wp_posts_img = "select post_title, guid from wp_posts where id = :param_id and post_parent = :param_postid and post_type = 'attachment' and (post_mime_type = 'image/jpeg' or post_mime_type = 'image/png')";
	$result_wp_posts_img = $conn_wp->prepare($str_wp_posts_img);
	$result_wp_posts_img->execute($array_wp_posts_img);
	$record_wp_posts_img = $result_wp_posts_img->fetch(PDO::FETCH_ASSOC);

	$image_path = $record_wp_posts_img['guid'];
	$image_alt = $record_wp_posts_img['post_title'];

	$canonical_page = URL."/content_topic.php?id=".$id;
?>  

    <title><?php echo $meta_title; ?></title>
    <meta name="description" content="<?php echo $meta_description; ?>" />
    <meta property="og:image" content="<?php echo $image_path; ?>" />
    <link rel="canonical" href="<?php echo $canonical_page;?>"/>
</head>
<body itemscope itemtype="http://schema.org/WebPage"> 

<?php   if($devices == "mobile"){   ?>
            <div><?php include_once("page_mobile/content_topic.php"); ?></div>
<?php   
        }else{     
?>
            <div><?php include_once("page_desktop/content_topic.php"); ?></div>
<?php   }   ?>

<?php require("include_footer.php"); ?>
