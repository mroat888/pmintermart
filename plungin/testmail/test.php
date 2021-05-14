<?php

require_once('class.phpmailer.php');
$mail = new PHPMailer();
$mail->IsHTML(true); // กำหนดให้ ส่งเป็น html
$mail->IsSMTP();
$mail->SMTPAuth = true; 
$mail->Host = 'mail.xxxxx.com';  //<xxxx เป็นโดเมนลูกค้า
$mail->Username = "test@xxxxx";  //<<แก้ไข User login ตรงนี้ครับ
$mail->Password = "testpass"; //<<แก้ไข Password ตรงนี้ครับ
$mail->From = "admin@dragonhispeed.com";  //<< ตรงนี้เป็นเมลล์จากใคร
$mail->FromName = "Dragonhispeed";  //<< ชื่อผู้ส่ง
$mail->Subject = "Test PHP Mailler";  //<< หัวข้อ
$mail->Body = "ข้อความที่จะส่ง เป็น html ก็ได้";   //<< ข้อความที่จะส่ง
$mail->AddAddress("admin@dragonhispeed.com");  //<< ส่งหาใคร
$mail->Send(); 
?>