<?php
session_start();
include_once("include_header.php");
try{

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
		
		echo "<script language='javascript'>";
			echo "window.location.href='dashboard.php'";
		echo "</script>";
	}else{
		echo "<script language='javascript'>";
			echo "alert('File Not Found !!!');";
			echo "window.history.back()";
		echo "</script>";
	}
	
}catch(Excaption $ex){
	echo $ex->getMessage();
}
?>