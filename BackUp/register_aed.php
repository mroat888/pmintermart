<?php session_start() ; ?>
<meta charset="UTF-8">
<?php 

include_once("config/config.php");
include_once("lib/php/class.dbConnect.php"); 
$conn = new Database();


$today = date("Y-m-d H:i:s") ;
$type = $_GET['typ'];
$tmembername = Trim($_POST['tmembername']);
$tmemberemail = Trim($_POST['tmemberemail']);
$tmemberpassword = Trim($_POST['tmemberpassword']);

try{

	if($type == "add"){

		$str = 'abcdefghijklmnopqrstuvwzyz';
		$str1= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$str2= '0123456789';
		$shuffled = str_shuffle($str);
		$shuffled1 = str_shuffle($str1);
		$shuffled2 = str_shuffle($str2);
		$total = $shuffled.$shuffled1.$shuffled2;
		$shuffled3 = str_shuffle($total);
		$activecode = substr($shuffled3, 0, 10);

		$array_member = array(
		 	':param_name' => $tmembername, 
		 	':param_uemail' => $tmemberemail, 
		 	':param_upassword' => $tmemberpassword, 
		 	':param_activatecode' => $activecode, 
		 	':param_regis_datetime' => $today
		);

		$insert_member = "INSERT INTO member (name, uemail, upassword, regis_datetime, activatecode) 
		VALUES (:param_name, :param_uemail, :param_upassword, :param_regis_datetime, :param_activatecode)";

			$result_member = $conn->prepare($insert_member);
			$result_member->execute($array_member);
		 	if($result_member->rowCount()) {

			 	$link_activecode = URL."verify_email.php?acode=".$activecode;
			 	$tsubject = "Please confirm your email address for PM INTERMART";
			 	$Body = "";
			 	$Body .= "<strong>";
			 	$Body .= "กรุณากดยืนยันอีเมลที่สมัครของคุณด้วย";
			 	$Body .= "</strong><br>";
			 	$Body .= "ขอบคุณ สำหรับการสมัครสมาชิก เพื่อใช้ในเว็บไซต์เรา <br>";
			 	$Body .= "ก่อนที่จะเริ่มใช้งาน เราขอให้ท่านยืนยันว่าที่คือคุณ กรุณาคลิกลิงค์ด้านล่างเพื่อยืนยันที่อยู่อีเมลของคุณ";
			 	$Body .= "<br>";
			 	$Body .= "<a href = '".$link_activecode."'>Verify</a>";
			 	$Body .= "<br><br>";
			 	$Body .= "หากไม่สามารถคลิกได้ กรุณาก๊อปปี้ลิงค์ด้านล่าง แล้วไปวางที่บราวเซอร์เพื่อเปิดยืนยัน";
			 	$Body .= "<br>";
			 	$Body .= $link_activecode;
				$Body .= "<br><br>";
			 	$Body .= "หากคุณคิดว่าคุณได้รับอีเมลนี้โดยไม่ได้ตั้งใจหรือไม่ได้อนุมัติคำขอโปรดติดต่อฝ่ายสนับสนุน";
				$Body .= "<br><br>";
				$Body .= "<br><br>";
				$Body .= "PM Intermart Team.";
				$Body .= "<br><br>";
				$Body .= "---------------------------------------------------";
				$Body .= "<br><br>";
			 	$Body .= "<strong>";
			 	$Body .= "Please confirm your email address";
			 	$Body .= "</strong><br>";
			 	$Body .= "Thanks for registering for an account on PM INTERMART<br>";
			 	$Body .= "Before we get started, we just need to confirm that this is you. Click below to verify your email address";
			 	$Body .= "<br>";
			 	$Body .= "<a href = '".$link_activecode."'>Verify</a>";
			 	$Body .= "<br><br>";
			 	$Body .= "Or copy/paste this link into your browser:";
			 	$Body .= "<br>";
			 	$Body .= $link_activecode;
				$Body .= "<br><br>";
			 	$Body .= "If you think you've received this email by mistake or did not authorize the request, please contact support";
				$Body .= "<br><br>";
				$Body .= "<br><br>";
				$Body .= "PM Intermart Team.";

				date_default_timezone_set('Asia/Bangkok');
				require_once('plungin/testmail/class.phpmailer.php');
				$mail = new PHPMailer();
				$mail->IsHTML(true); // กำหนดให้ ส่งเป็น html
				$mail->IsSMTP();
				$mail->SMTPAuth = true; 
				$mail->Host = 'mail.pmintermart.com';  //<xxxx เป็นโดเมนลูกค้า
				$mail->Username = "contactus@pmintermart.com";  //<<แก้ไข User login ตรงนี้ครับ
				$mail->Password = "doZgQpN46f"; //<<แก้ไข Password ตรงนี้ครับ
				$mail->From = "contactus@pmintermart.com";  //<< ตรงนี้เป็นเมลล์จากใคร
				$mail->FromName = "PM Intermart";  //<< ชื่อผู้ส่ง
				$mail->Subject = "ยืนยันอีเมลของคุณ / Verify your email - Pm Intermart";  //<< หัวข้อ
				$mail->Body = $Body;   //<< ข้อความที่จะส่ง

				$mail->addAddress($tmemberemail);
				$mail->addAddress("mroat07@gmail.com");

				if (!$mail->send()) {
				    $error = "Mailer Error: " . $mail->ErrorInfo;
				    echo "<script language='javascript'>";
				        echo "alert('$error')";
				        echo "window.history.back();";
				    echo "</script>";
				    echo $error;
				} else {
				    echo "<script language='javascript'>";
				        echo "alert('สมัครสมาชิกเรียบร้อยแล้ว กรุณายืนยันอีเมลที่สมัคร')";
				    echo "</script>";
				    echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
				}

				// echo "<script language='javascript'>";
				//     echo "alert('สมัครสมาชิกเรียบร้อยแล้ว กรุณายืนยันอีเมลที่สมัคร')";
				// echo "</script>";
				// echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
		 	}else{
		 		echo "<script language='javascript'>";
					echo "alert('ไม่สามารถสมัครสมาชิกได้ค่ะ');";
					echo "window.history.back();";
				echo "</script>";
		 	}

	}

	if($type == "edit"){
		$array_member = array(
			':param_member_id' => $_SESSION['memid'], 
		 	':param_name' => $tmembername, 
		 	':param_uemail' => $tmemberemail, 
		 	':param_upassword' => $tmemberpassword
		);

		$update_member = "UPDATE member SET name = :param_name, uemail = :param_uemail, upassword = :param_upassword WHERE id = :param_member_id";
		$result_member = $conn->prepare($update_member);
		$result_member->execute($array_member);
		 if($result_member->rowCount()) {
		 	echo "<script language='javascript'>";
				echo "alert('อัพเดทข้อมูลสมาชิกเรียบร้อยแล้วค่ะ');";
				echo "window.location.href='".URL."'";
			echo "</script>";
		 }else{
		 	echo "<script language='javascript'>";
				echo "alert('ไม่สามารถแก้ไขข้อมูลสมาชิกได้ค่ะ');";
				echo "window.history.back();";
			echo "</script>";
		 }
	}

}catch(Exception $ex){
	echo $ex->getMessage();
}

?>