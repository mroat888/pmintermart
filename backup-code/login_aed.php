<?php 
	session_start() ; 
	header('Content-Type: application/json');

	include_once("config/config.php");
	include_once("lib/php/class.dbConnect.php"); 
	$conn = new Database();
?>
<meta charset="UTF-8">
<?php 
try{

	if($_SERVER['REQUEST_METHOD'] === "POST"){
		$tloginemail = Trim($_POST['tloginemail']);
		$tloginpassword = Trim($_POST['tloginpassword']);

		$array_login = array(
			':param_loginemail' => $tloginemail, 
			':param_loginpassword' => $tloginpassword,
			':param_activate' => 'Y'
		);
			
		$str_member = "SELECT * FROM member WHERE uemail = :param_loginemail 
		and upassword = :param_loginpassword and activate = :param_activate";
		$result_member = $conn->prepare($str_member);
		$result_member->execute($array_login);
				
		if($result_member){
			if($result_member->rowcount() == 1){
				$record_member = $result_member->fetch(PDO::FETCH_ASSOC);
				if($record_member['id'] != ""){
					$_SESSION['memid'] = $record_member['id'];

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
			}else{
				http_response_code(400);
				echo json_encode($resporn = [
					'status' => false,
					'message' => 'File Not Found.'
				]);
			}
		}else{
			http_response_code(400);
			echo json_encode($resporn = [
				'status' => false,
				'message' => 'File Not Found.'
			]);
		}
	}

}catch (Exception $ex){
	echo $ex->getMessage();
}




/**
 * prel php
 */
// try{

// 	include_once("config/config.php");
// 	include_once("lib/php/class.dbConnect.php"); 
// 	$conn = new Database();

// 	$tloginemail = Trim($_POST['tloginemail']);
// 	$tloginpassword = Trim($_POST['tloginpassword']);

// 	$array_login = array(
// 		':param_loginemail' => $tloginemail, 
// 		':param_loginpassword' => $tloginpassword,
// 		':param_activate' => 'Y'
// 	);

// 	$str_member = "SELECT * FROM member WHERE uemail = :param_loginemail 
// 	and upassword = :param_loginpassword and activate = :param_activate";
// 	$result_member = $conn->prepare($str_member);
// 	$result_member->execute($array_login);
	
// 	if($result_member){
// 		if($result_member->rowcount() == 1){
// 			$record_member = $result_member->fetch(PDO::FETCH_ASSOC);
// 			if($record_member['id'] != ""){
// 				$_SESSION['memid'] = $record_member['id'];
// 				echo "<script language='javascript'>";
// 					echo "alert('ยินดีต้อนรับ คุณ".$record_member['name']."');";
// 					echo "window.location.href ='".URL."' " ;
// 				echo "</script>";
// 			}else{
// 				echo "<script language='javascript'>";
// 					echo "alert('File Not Found.!');";
// 					echo "window.history.back();";
// 				echo "</script>";
// 			}
// 		}else{
// 			echo "<script language='javascript'>";
// 				echo "alert('File Not Found.!');";
// 				echo "window.history.back();";
// 			echo "</script>";
// 		}
// 	}else{
// 		echo "<script language='javascript'>";
// 			echo "alert('File Not Found.!');";
// 			echo "window.history.back();";
// 		echo "</script>";
// 	}


// }catch(Exception $ex){
// 	echo $ex->getMessage();
// }

?>