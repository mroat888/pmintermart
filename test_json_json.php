<?php include_once("config/config.php"); ?>
<?php include_once("lib/php/class.dbConnect.php"); ?>
<?php
    $conn = new Database();
    
    if($_SERVER['REQUEST_METHOD'] == "GET"){
        $str_products = "select * from product_sku";
        $result = $conn->prepare($str_products);
        $result->execute();
        $resultArray = array();
        $record = $result->fetchAll();
        echo json_encode($record,JSON_UNESCAPED_UNICODE);
    } else if($_SERVER['REQUEST_METHOD'] == "POST"){
        echo json_encode('This is POST',JSON_UNESCAPED_UNICODE);;
    }else{
        http_response_code(405);
    }
 ?>