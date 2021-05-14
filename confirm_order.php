<?php session_start() ; ?>
<meta charset="UTF-8">
<?php 

include_once("config/config.php");
include_once("lib/php/class.dbConnect.php"); 
require_once('plungin/testmail/class.phpmailer.php');
include_once("lib/php/class.shippingRates.php");

$conn = new Database();
$shippingrates = new shippingRates();

?>

<?php
	//$type = $_GET['typ'];
	$today = date("Y-m-d H:i:s") ;

	//echo $today;

	if($_SESSION['memid'] != ""){
		$member_id = $_SESSION['memid'];
	}else{
		$member_id = 0;
	}

	// $summary_price = 0;

	// foreach($_SESSION['cart_id'] as $key=>$value){
	// 	$array_sku = array(':param_sku_id' => $value);
	// 	$str_sku = "SELECT * FROM product_sku WHERE id = :param_sku_id";
	// 	$result_sku = $conn->prepare($str_sku);
	// 	$result_sku->execute($array_sku);
	// 	$record_sku = $result_sku->fetch(PDO::FETCH_ASSOC);

	// 	$array_product = array(':param_product_id' => $record_sku['id_products_name']);
	// 	$str_product = "SELECT name FROM product_name WHERE id = :param_product_id";
	// 	$result_product = $conn->prepare($str_product);
	// 	$result_product->execute($array_product);
	// 	$record_product = $result_product->fetch(PDO::FETCH_ASSOC);
	// 	$product_name = $record_product['name']." ".$record_sku['name'];

	// 	$total_price = $_SESSION['cart_num'][$key]*$record_sku['price'];
	// 	$summary_price = $summary_price+$total_price;
	// }
	$summary_price = 0;
	$box_weight = 0;
	$box_w = 0;
	$box_l = 0;
	$box_h = 0;
	foreach($_SESSION['cart_id'] as $key=>$value){
		$array_sku = array(':param_sku_id' => $value);
		$str_sku = "select * from product_sku where id = :param_sku_id";
		$result_sku = $conn->prepare($str_sku);
		$result_sku->execute($array_sku);
		$record_sku = $result_sku->fetch(PDO::FETCH_ASSOC);

		$array_product = array(':param_product_id' => $record_sku['id_products_name']);
		$str_product = "select id, name, box_weight, box_width, box_long, box_height from product_name where id = :param_product_id";
		$result_product = $conn->prepare($str_product);
		$result_product->execute($array_product);
		$record_product = $result_product->fetch(PDO::FETCH_ASSOC);
		$product_name = $record_product['name']." ".$record_sku['name'];

		$total_price = $_SESSION['cart_num'][$key]*$record_sku['price'];
		$summary_price = $summary_price+$total_price;

		$weight = $_SESSION['cart_num'][$key]*$record_product['box_weight'];
		$bw = $_SESSION['cart_num'][$key]*$record_product['box_width'];
		$bl = $_SESSION['cart_num'][$key]*$record_product['box_long'];
		$bh = $_SESSION['cart_num'][$key]*$record_product['box_height'];

		$box_weight = $box_weight+$weight;
		$box_w = $box_w+$bw;
		$box_l = $box_l+$bl;
		$box_h = $box_h+$bh;
	}
		$shipprice = $shippingrates->shippingPrice($box_w,$box_l,$box_h,$box_weight,$_SESSION['tprovince']);
		$summary_netprice = $summary_price+$shipprice;


		$array_insert_order = array(
			':param_id_member' => $member_id, 
			':param_today' => $today,
			':param_order_discount' => '', 
			':param_order_shipping' => $shipprice, 
			':param_summary_price' => $summary_netprice
		);
	$insert_order = "INSERT INTO order_main 
	(id_member, order_datetime, order_discount, order_shipping, order_sum_price) 
	VALUES (:param_id_member, :param_today, :param_order_discount, :param_order_shipping, 
	:param_summary_price)";

	try{
		$result_order = $conn->prepare($insert_order);
		$result_order->execute($array_insert_order);
		if($result_order->rowCount()) {
			$str_order = "SELECT id FROM order_main ORDER BY id DESC";
			$result_order = $conn->prepare($str_order);
			$result_order->execute();
			$record_order = $result_order->fetch(PDO::FETCH_ASSOC);

			$array_order_address = array(
				':param_id_order' => $record_order['id'], 
				':param_name' => $_SESSION['tname'], 
				':param_address' => $_SESSION['taddress'], 
				':param_phone' => $_SESSION['tphone'], 
				':param_email' => $_SESSION['temail'], 
				':param_province' => $_SESSION['tprovince'], 
				':param_amphur' => $_SESSION['tamphur'], 
				':param_district' => $_SESSION['tdistrict'], 
				':param_zipcode' => $_SESSION['tzipcode']
			);

			$insert_order_address = "INSERT INTO order_address (id_order, name, address, phone, email, 
			province, amphur, district, zipcode) VALUES (:param_id_order, :param_name, :param_address, 
			:param_phone, :param_email, :param_province, :param_amphur, :param_district, :param_zipcode)";

			$result_order_address = $conn->prepare($insert_order_address);
			$result_order_address->execute($array_order_address);

			foreach($_SESSION['cart_id'] as $key=>$value){
				$array_sku = array(':param_sku_id' => $value);
				$str_sku = "SELECT * FROM product_sku WHERE id = :param_sku_id";
				$result_sku = $conn->prepare($str_sku);
				$result_sku->execute($array_sku);
				$record_sku = $result_sku->fetch(PDO::FETCH_ASSOC);

				$array_product = array(':param_product_id' => $record_sku['id_products_name']);
				$str_product = "SELECT name FROM product_name WHERE id = :param_product_id";
				$result_product = $conn->prepare($str_product);
				$result_product->execute($array_product);
				$record_product = $result_product->fetch(PDO::FETCH_ASSOC);
				$product_name = $record_product['name']." ".$record_sku['name'];

				$total_price = $_SESSION['cart_num'][$key]*$record_sku['price'];

				$array_order_detail = array(
					':param_id_order' => $record_order['id'], 
					':param_id_product_sku' => $_SESSION['cart_id'][$key], 
					':param_product_sku_price' => $record_sku['price'], 
					':param_quantity' => $_SESSION['cart_num'][$key],
					':param_sum_price' => $total_price
				);

				$insert_order_detail = "INSERT INTO order_detail (id_order, id_product_sku, product_sku_price, quantity, sum_price) VALUES 
				(:param_id_order, :param_id_product_sku, :param_product_sku_price, 
				:param_quantity, :param_sum_price)";

				$result_order_detail = $conn->prepare($insert_order_detail);
				$result_order_detail->execute($array_order_detail);

				/* ------ update stock ---------- */
				$array_update_stock_sku = array(
					':param_quantity' => $_SESSION['cart_num'][$key], 
					':param_id_product_sku' => $_SESSION['cart_id'][$key]
				);
				$update_stock_sku = "update product_sku SET 
				instock = instock-:param_quantity where id = :param_id_product_sku";
				$result_update_stock_sku = $conn->prepare($update_stock_sku);
				$result_update_stock_sku->execute($array_update_stock_sku);
				/* ---------------- */
			}

			$mail = new PHPMailer();
			$Body = URL."completed.php?id=".$record_order['id'];
			$mail->IsHTML(true); // กำหนดให้ ส่งเป็น html
			$mail->IsSMTP();
			$mail->SMTPAuth = true; 
			$mail->Host = 'mail.pmintermart.com';  //<xxxx เป็นโดเมนลูกค้า
			$mail->Username = "contactus@pmintermart.com";  //<<แก้ไข User login ตรงนี้ครับ
			$mail->Password = "doZgQpN46f"; //<<แก้ไข Password ตรงนี้ครับ
			$mail->From = "contactus@pmintermart.com";  //<< ตรงนี้เป็นเมลล์จากใคร
			$mail->FromName = "PM Intermart";  //<< ชื่อผู้ส่ง
			$mail->Subject = "Order by Pm Intermart - ".$today;  //<< หัวข้อ
			$mail->Body = $Body;   //<< ข้อความที่จะส่ง
			$mail->AddAddress("contact.pmintermart@gmail.com");  //<< ส่งหาใคร
			$mail->AddAddress("mroat07@gmail.com");  //<< ส่งหาใคร
			
			$mail->Send();

			unset($_SESSION['cart_id']); 
			unset($_SESSION['cart_num']); 
			unset($_SESSION['tname']);
			unset($_SESSION['tphone']);
			unset($_SESSION['temail']);
			unset($_SESSION['taddress']);
			unset($_SESSION['tprovince']);
			unset($_SESSION['tamphur']);
			unset($_SESSION['tdistrict']);
			unset($_SESSION['tzipcode']);

			echo "<script language='javascript'>";
				echo "alert('สั่งซื้อเรียบร้อยแล้วค่ะ');";
				echo "window.location.href='".URL."completed.php?id=".$record_order['id']."'";
			echo "</script>";
		}else{
			echo "<script language='javascript'>";
				echo "alert('ไม่สามารถทำการสั่งซื้อได้ค่ะ');";
				echo "window.history.back();";
			echo "</script>";
		}
	}catch(Exception $ex){
		echo $ex->getMessage();
	}

?>