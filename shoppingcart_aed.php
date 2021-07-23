<?php session_start() ; ?>
<meta charset="UTF-8">
<?php
	include_once("config/config.php");
	include_once("lib/php/class.dbConnect.php"); 
	$conn = new Database();
?>

<?php
	if(isset($_GET['typ']) && $_GET['typ'] != ""){
		$type = $_GET['typ'];
	}
	if(isset($_GET['delid']) && $_GET['delid'] != ""){
		$key = $_GET['delid'] ;
	}
?>

<?php
	if($type == 'add'){
		$id_sku = $_POST['radio_sku_id'];
		$quantity = $_POST['sel_quantity'];
		
		if($_SESSION['cart_id'] != ""){
			$chack_do = "N" ;
			foreach($_SESSION['cart_id'] as $key => $value){
				if($id_sku == $value){  // ถ้า id ที่ส่งค่ามา มีอยู่ใน session แล้ว
					$num = $_SESSION['cart_num'][$key] ;
					$num = $num+$quantity ;

					$array_sku = array(':param_sku_id' => $value);
					$str_sku = "select instock from product_sku where id = :param_sku_id";
					$result_sku = $conn->prepare($str_sku);
					$result_sku->execute($array_sku);
					$record_sku = $result_sku->fetch(PDO::FETCH_ASSOC);
 
					if($record_sku['instock'] <= $num ){ // สต๊อกมากกว่าเท่ากับที่สั่งให้ทำคำสั่งนี้
						$_SESSION['cart_num'][$key] = $record_sku['instock'] ;		
					}else{
						$_SESSION['cart_num'][$key] = $num ;
					}

					$chack_do = "Y" ;   //-- ให้ใส่ ค่าว่าได้ทำแล้ว
				}
			}
				if($chack_do =="N"){
					$_SESSION['cart_id'][] = $id_sku ;
					$_SESSION['cart_num'][] = $quantity ; 
					//	$chack_do = "Y" ;
				}
		}else{
			$_SESSION['cart_id'][] = $id_sku ;
			$_SESSION['cart_num'][] = $quantity ; 
		}
					
		echo "<script language = javascript>" ;
			//echo "alert('เพิ่มสินค้าในตะกร้าเรียบร้อยแล้ว');" ;
			echo "window.location.href='shoppingcart_step1.php';";
		echo "</script>" ;
	}


	if($type == 'update'){
		$sku_id_update = $_POST['sku_id'];
		$quantity_update = $_POST['quantity'];

		foreach ($sku_id_update as $key => $value) {

			if($_SESSION['cart_id'][$key] == $value){  // ถ้า id ที่ส่งค่ามา มีอยู่ใน session แล้ว
				if($quantity_update[$key] < 1 || $quantity_update[$key] == ""){
					unset($_SESSION['cart_id'][$key]) ;  // ลบ cart_id ใน array ที่ key
					unset($_SESSION['cart_num'][$key]) ;
				}else{

					$array_sku = array(':param_sku_id' => $value);
					$str_sku = "select instock from product_sku where id = :param_sku_id";
					$result_sku = $conn->prepare($str_sku);
					$result_sku->execute($array_sku);
					$record_sku = $result_sku->fetch(PDO::FETCH_ASSOC);
 
					if($record_sku['instock'] <= $quantity_update[$key] ){ // สต๊อกมากกว่าเท่ากับที่สั่งให้ทำคำสั่งนี้
						$_SESSION['cart_num'][$key] = $record_sku['instock'] ;		
					}else{
						$_SESSION['cart_num'][$key] = $quantity_update[$key];
					}
				}
			}
			
		}
		array_splice($_SESSION['cart_id'],0,0) ;        // ฟังก์ชันการจัดเรียงลำดับใน อาร์เรย์ ใหม่  
		array_splice($_SESSION['cart_num'],0,0) ;        // ฟังก์ชันการจัดเรียงลำดับใน อาร์เรย์ ใหม่  

		echo "<script language = javascript>" ;
			//echo "alert('เพิ่มสินค้าในตะกร้าเรียบร้อยแล้ว');" ;
			echo "window.location.href='shoppingcart_step1.php';";
		echo "</script>" ;

	}
?>

<?php
	if($type == 'del'){
		$key = $_GET['delid'] ;
		unset($_SESSION['cart_id'][$key]) ;  // ลบ cart_id ใน array ที่ key
		unset($_SESSION['cart_num'][$key]) ;
		array_splice($_SESSION['cart_id'],0,0) ;        // ฟังก์ชันการจัดเรียงลำดับใน อาร์เรย์ ใหม่  
		array_splice($_SESSION['cart_num'],0,0) ;        // ฟังก์ชันการจัดเรียงลำดับใน อาร์เรย์ ใหม่  

		echo "<script language = javascript>" ;
			//echo "alert('ลบสินค้าในตะกร้าเรียบร้อยแล้ว');" ;
			//echo "window.history.back()" ;
			echo "window.location.href='shoppingcart_step1.php';";
		echo "</script>" ;
	}
?>