<?php session_start() ; ?>
<meta charset="UTF-8">
<?php 

include_once("config/config.php");
include_once("lib/php/class.dbConnect.php"); 
$conn = new Database();

$acode = $_GET['acode'];
$array_member =array(
	":param_activate" => "Y", 
	":param_activatecode" => $acode 
);
$str_member = "UPDATE member set activate = :param_activate WHERE activatecode = :param_activatecode";
$result_activate =  $conn->prepare($str_member);
$result_activate->execute($array_member);

	if($result_activate->rowCount()) {
		echo "<script language='javascript'>";
			echo "alert('ยืนยันอีเมลสมาชิกเรียบร้อยแล้วค่ะ');";
			echo "window.location.href='".URL."'";
		echo "</script>";
	}else{
		echo "<script language='javascript'>";
			echo "alert('ไม่สามารถยืนยันอีเมลได้ค่ะ');";
			echo "window.history.back();";
		echo "</script>";
	}

?>