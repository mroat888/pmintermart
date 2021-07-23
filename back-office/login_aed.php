<?php
session_start();
header('Content-Type: application/json');

include_once("../config/config.php");
include_once("../lib/php/class.dbConnect.php"); 
$conn = new Database();
/**
 * GET,POST,PUT,PAD,DELETE
 */

// if($_SERVER['REQUEST_METHOD'] === "POST"){
// 	$param_array = array(
// 		':param_tuser' => $_POST['tuser'], 
// 		':param_tpass' => $_POST['tpass'], 
// 		':param_status' => 'Y'
// 	);
// 	$str_login = "SELECT id FROM admin WHERE ( uname  = :param_tuser and upassword  = :param_tpass) and (status  = :param_status)";
	
//  	$result_login = $conn->prepare($str_login);
//  	$result_login->execute($param_array);
	 
// 		$record_login = $result_login->fetch(PDO::FETCH_ASSOC);
// 		$_SESSION['ss_id'] = session_id() ;
// 		$_SESSION['ss_accountid'] = $record_login['id'];

// 		echo json_encode($record_login);
				
// }else{
// 	echo "ไม่ถูกต้อง";
// }

try{
	if($_SERVER['REQUEST_METHOD'] === "POST"){
		$param_array = array(
			':param_tuser' => $_POST['tuser'], 
			':param_tpass' => $_POST['tpass'], 
			':param_status' => 'Y'
		);

		$str_login = "SELECT id FROM admin 
		WHERE ( uname  = :param_tuser and upassword  = :param_tpass) and (status  = :param_status)";
		$result_login = $conn->prepare($str_login);
		$result_login->execute($param_array);

		if($result_login->rowcount() == 1){
			$record_login = $result_login->fetch(PDO::FETCH_ASSOC);
			$_SESSION['ss_id'] = session_id() ;
			$_SESSION['ss_accountid'] = $record_login['id'];
			
			http_response_code(200);
			echo json_encode($resporn = [
				'status' => true,
				'message' => 'Login Success'
			]);
		}else{
			http_response_code(400);
			echo json_encode($resporn = [
				'status' => false,
				'message' => 'File Not Found.'
			]);
		}
	}
}catch(Excaption $ex){
	echo $ex->getMessage();
}
?>