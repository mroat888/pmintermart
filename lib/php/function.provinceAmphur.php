<?php 
$str_province = "select PROVINCE_ID from province order by PROVINCE_NAME";
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

//----------------------------------

echo "switch(obj.value){";
while($row = $res->fetch(PDO::FETCH_ASSOC)){
	echo "case '".$row["PROVINCE_ID"]."': {";
		$province_param = array(
			'param_province_id' => $row["PROVINCE_ID"]
		);
		$str_amphur = "select * from amphur where PROVINCE_ID = :param_province_id order by AMPHUR_NAME";
		$result = $conn->prepare($str_amphur);
		$result->execute($province_param);
		$row_g = $result->rowcount();
		echo "theForm.tamphur.options[0] = new Option('-- อำเภอ/เขต --','0');";
		for($i=0; $i<$row_g; $i++){
			$a = $i+1 ;
			$record = $result->fetch(PDO::FETCH_ASSOC);
			echo "theForm.tamphur.options[".$a."] = new Option('".$record["AMPHUR_NAME"]."','".$record["AMPHUR_ID"]."');";
		}
		
	echo "} break;";
}
echo "}"; /*----- switch */


echo "};"; /*--- function choose_amphur */
echo "</script>";
 

?>