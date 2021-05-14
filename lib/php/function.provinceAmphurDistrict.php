<?php 

$str_province = "select id from provinces order by name_th";
$res = $conn->prepare($str_province);
$res->execute();

echo "<script language='javascript'>";
echo "function choose_amphur(obj){";
echo "var theForm = obj.form;";
//---  founction remove ---
echo "var i;" ;
echo "for(i=theForm.tamphur.options.length-1;i>=0;i--)" ;
		echo"{
		theForm.tamphur.remove(i);
		} " ;
echo "theForm.tamphur.options[0] = new Option('-- อำเภอ/เขต --','0');";

echo "for(i=theForm.tdistrict.options.length-1;i>=0;i--)" ;
		echo"{
		theForm.tdistrict.remove(i);
		} " ;
echo "theForm.tdistrict.options[0] = new Option('-- ตำบล/แขวง --','0');";
echo "theForm.tzipcode.value = '';";

//----------------------------------

echo "switch(obj.value){";
while($row = $res->fetch(PDO::FETCH_ASSOC)){
	echo "case '".$row["id"]."': {";
		$province_param = array(
			'param_province_id' => $row["id"]
		);
		$str_amphur = "select * from amphures where province_id = :param_province_id order by name_th";
		$result = $conn->prepare($str_amphur);
		$result->execute($province_param);
		$row_g = $result->rowcount();
		echo "theForm.tamphur.options[0] = new Option('-- อำเภอ/เขต --','0');";
		for($i=0; $i<$row_g; $i++){
			$a = $i+1 ;
			$record = $result->fetch(PDO::FETCH_ASSOC);
			echo "theForm.tamphur.options[".$a."] = new Option('".$record["name_th"]."','".$record["id"]."');";
		}
		
	echo "} break;";
}
echo "}"; /*----- switch */


echo "};"; /*--- function choose_amphur */
echo "</script>";
 

 //--------------- choose_district -------------------

$str_amphur = "select * from amphures";
$res = $conn->prepare($str_amphur);
$res->execute();

echo "<script language='javascript'>";
echo "function choose_district(obj){";
echo "var theForm = obj.form;";
//---  founction remove ---
echo "var i;" ;
echo "for(i=theForm.tdistrict.options.length-1;i>=0;i--)" ;
		echo"{
		theForm.tdistrict.remove(i);
		} " ;
echo "theForm.tdistrict.options[0] = new Option('-- ตำบล/แขวง --','0');";
echo "theForm.tzipcode.value = '';";

//----------------------------------
echo "switch(obj.value){";
while($row = $res->fetch(PDO::FETCH_ASSOC)){
	echo "case '".$row["id"]."': {";
		$amphur_param = array(
			'param_amphur_id' => $row["id"]
		);
		$str_district = "select * from districts where amphure_id = :param_amphur_id order by name_th";
		$result = $conn->prepare($str_district);
		$result->execute($amphur_param);
		$row_g = $result->rowcount();
		echo "theForm.tdistrict.options[0] = new Option('-- ตำบล/แขวง --','0');";
		for($i=0; $i<$row_g; $i++){
			$a = $i+1 ;
			$record = $result->fetch(PDO::FETCH_ASSOC);
			echo "theForm.tdistrict.options[".$a."] = new Option('".$record["name_th"]."','".$record["id"]."');";
		}
		
	echo "} break;";
}
echo "}"; /*----- switch */


echo "};"; /*--- function choose_district */
echo "</script>";



//--------------- choose_zipcode -------------------

$str_districts = "select * from districts";
$res = $conn->prepare($str_districts);
$res->execute();

echo "<script language='javascript'>";
echo "function choose_zipcode(obj){";
echo "var theForm = obj.form;";
//---  founction remove ---
echo "theForm.tzipcode.value = '';";

//----------------------------------
echo "switch(obj.value){";
while($row = $res->fetch(PDO::FETCH_ASSOC)){
	echo "case '".$row["id"]."': {";
		$amphur_param = array(
			'param_districts_id' => $row["id"]
		);
		$str_district = "select zip_code from districts where id = :param_districts_id order by name_th";
		$result = $conn->prepare($str_district);
		$result->execute($amphur_param);
		$row_g = $result->rowcount();
		$record = $result->fetch(PDO::FETCH_ASSOC);
		echo "theForm.tzipcode.value = '".$record["zip_code"]."'";
	echo "} break;";
}
echo "}"; /*----- switch */


echo "};"; /*--- function choose_zipcode */
echo "</script>";

?>