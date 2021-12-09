<?php
	include_once("config/config.php");
	include_once("lib/php/class.dbConnect.php"); 
	$conn = new Database();

	$tid_order = $_POST['tid_order'];
	$tname = $_POST['tname'];
	$temail = $_POST['temail'];
	$tphone = $_POST['tphone'];
	$tid_bank = $_POST['tid_bank'];
	$ttransfer_amount = $_POST['ttransfer_amount'];
	$tpayment_date = $_POST['tpayment_date'];
	$tpayment_time = $_POST['tpayment_time'];
	$tpayment_datetime = $tpayment_date." ".$tpayment_time;
	$tpayment_slip = $_FILES["tpayment_slip"]["name"];
	$slipFileType = pathinfo($_FILES["tpayment_slip"]["name"],PATHINFO_EXTENSION);
	$tdetail = $_POST['tdetail'];

	$folder = "payment_slip";
	$payment_slipname = $tid_order.".".$slipFileType;

	if($slipFileType == "jpg" or $slipFileType == "jpeg" or $slipFileType == "JPG" or $slipFileType == "pdf" or $slipFileType == "PDF"){
		if(move_uploaded_file($_FILES["tpayment_slip"]['tmp_name'],"$folder/$payment_slipname") ){
				$status = true;
			}else{
				$status = false;
		}
	}

	if($status == true){
		$order_payment_array = array(
			":param_id_order" => $tid_order, 
			":param_name" => $tname, 
			":param_email" => $temail, 
			":param_phone" => $tphone, 
			":param_id_bank" => $tid_bank, 
			":param_transfer_amount" => $ttransfer_amount, 
			":param_payment_datetime" => $tpayment_datetime, 
			":payment_slip" => $payment_slipname, 
			":param_detail" => $tdetail
		);

		$insert_order_payment = "insert into order_payment (id_order, name, email, phone, id_bank, transfer_amount, payment_datetime, payment_slip, detail) values (:param_id_order, :param_name, :param_email, :param_phone, :param_id_bank, :param_transfer_amount, :param_payment_datetime, :payment_slip, :param_detail)";

		$insert_result = $conn->prepare($insert_order_payment);
		$insert_result->execute($order_payment_array);

		if($insert_result->rowCount()) {
			$order_main_array = array(
				":param_id_order" => $tid_order, 
				":param_id_order_process" => "2" 
			);
			$update_order_main = "update order_main set id_order_process = :param_id_order_process where id = :param_id_order";
			$result_ordder_main = $conn->prepare($update_order_main);
			$result_ordder_main->execute($order_main_array);
			if($result_ordder_main->rowCount()) {
				echo "<script language='javascript'>";
					echo "alert('บันทึกเรียร้อยแล้วค่ะ');";
					echo "window.location.href='".URL."order_history.php';";
				echo "</script>";
			}
		}
	}else{
		echo "<script language='javascript'>";
			echo "alert('ไม่สามารถทำการบันทึกได้ค่ะ');";
			echo "window.history.back();";
		echo "</script>";
	}

	//$path = URL.$folder."/".$payment_slipname;
?>
<!-- <br>
<a href="<?php echo $path;?>" target="_blank"><?php echo $tpayment_slip;?></a> -->