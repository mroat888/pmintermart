<?php
session_start() ;
header('Content-Type: application/json');
try{
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        session_destroy();
        http_response_code(200);
        echo json_encode($resporn = [
            'status' => true,
            'message' => 'LogOff Success'
        ]);
    }
}catch(Excaption $ex){
    echo $ex->getMessage();
}
?>