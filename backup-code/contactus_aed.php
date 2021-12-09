<?php
	include_once("config/config.php");
	require_once('plungin/testmail/class.phpmailer.php');
	$today = date("Y-m-d H:i:s") ;
	$tmembername = $_POST['tmembername'];
	$tmemberemail = $_POST['tmemberemail'];
	$tphone = $_POST['tphone'];
	$tdetail = $_POST['tdetail'];

	$Body = "";
	$Body .= "ติดต่อจาก PM Intermart";
	$Body .= "\n";
	$Body .= "ชื่อ : ".$tmembername;
	$Body .= "\n";
	$Body .= "อีเมล : ".$tmemberemail;
	$Body .= "\n";
	$Body .= "โทรศัพท์ : ".$tphone;
	$Body .= "\n";
	$Body .= "รายละเอียด : ".$tdetail;


	$mail = new PHPMailer();
	$mail->IsHTML(true); // กำหนดให้ ส่งเป็น html
	$mail->IsSMTP();
	$mail->SMTPAuth = true; 
	$mail->Host = 'mail.pmintermart.com';  //<xxxx เป็นโดเมนลูกค้า
	$mail->Username = "contactus@pmintermart.com";  //<<แก้ไข User login ตรงนี้ครับ
	$mail->Password = "doZgQpN46f"; //<<แก้ไข Password ตรงนี้ครับ
	$mail->From = "contactus@pmintermart.com";  //<< ตรงนี้เป็นเมลล์จากใคร
	$mail->FromName = "PM Intermart";  //<< ชื่อผู้ส่ง
	$mail->Subject = "Contact by Pm Intermart - ".$today;  //<< หัวข้อ
	$mail->Body = $Body;   //<< ข้อความที่จะส่ง
	$mail->AddAddress("contact.pmintermart@gmail.com");  //<< ส่งหาใคร
	$mail->AddAddress("mroat07@gmail.com");  //<< ส่งหาใคร
	
	if($mail->Send()){
		echo "<script language='javascript'>";
			echo "alert('เราได้รับการติดต่อจากคุณแล้ว ขอบคุณค่ะ');";
			echo "window.history.back();";
		echo "</script>";	
	}else{
		echo "<script language='javascript'>";
			echo "alert('ยังไม่สามารถส่งเมลล์ได้ในขณะนี้');";
			echo "window.history.back();";
		echo "</script>";
	}

?>