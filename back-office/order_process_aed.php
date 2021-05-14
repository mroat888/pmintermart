<?php
session_start();
include_once("include_header.php");

try{
	$orderid = $_POST['orderid'];
	$selid = $_POST['selid'];

	$array_order_process = array(
		':param_id' => $orderid, 
		':param_id_order_process' => $selid
	);
	$update_order_process = "UPDATE order_main SET id_order_process = :param_id_order_process WHERE id = :param_id";
	$result_order_process = $conn->prepare($update_order_process);
	$result_order_process->execute($array_order_process);
	if($result_order_process->rowCount()) {
		echo "<font style='font-size:14px; color:#FF0000'>Update.!</font>";
	}else{
		echo "No";
	}

}catch(Excaption $ex){
	echo $ex->getMessage();
}

?>