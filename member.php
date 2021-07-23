<?php require("include_header.php"); ?>

<?php
    if(isset($_SESSION['memid']) && $_SESSION['memid'] != ""){
        $id = $_SESSION['memid'];
    }else{
        $id = "";
    }
    $array_member = array(
        ':param_member_id' => $id
    );
    $str_member = "SELECT * FROM member WHERE id = :param_member_id";
    $result_member = $conn->prepare($str_member);
    $result_member->execute($array_member);
    $record_member = $result_member->fetch(PDO::FETCH_ASSOC);

?>

    <title>ข้อมูลสมาชิก</title>
    <meta name="description" content="<?php echo $mata_description; ?>" />
    <link rel="canonical" href="<?php echo $canonical_page;?>" />

</head>
<body itemscope itemtype="http://schema.org/WebPage">   

<?php   if($devices == "mobile"){   ?>
            <div><?php include_once("page_mobile/member.php"); ?></div>
<?php   
        }else{     
?>
            <div><?php include_once("page_desktop/member.php"); ?></div>
<?php   }   ?>

<?php require("include_footer.php"); ?>