<?php 
include_once("../config/config.php");
include_once("../lib/php/class.dbConnect.php"); 
$conn = new Database();

$str_categoryL1 = "SELECT id FROM producttype_level1 ORDER BY id";
$res = $conn->prepare($str_categoryL1);
$res->execute();

echo "<script language='javascript'>";
echo "function choose_producttype_level2(obj){";
echo "var theForm = obj.form;";
//---  founction remove ---
echo "var i;" ;
echo "for(i=theForm.selproducttype_level2.options.length-1;i>=0;i--)" ;
		echo"{
		theForm.selproducttype_level2.remove(i);
		} " ;
echo "theForm.selproducttype_level2.options[0] = new Option('-- กรุณาเลือก --','0');";

//----------------------------------

echo "switch(obj.value){";
while($row = $res->fetch(PDO::FETCH_ASSOC)){
	echo "case '".$row["id"]."': {";
		$category_param = array(
			'param_id' => $row["id"]
		);
		$str_categoryL2 = "SELECT * FROM producttype_level2 WHERE id_producttype_level1 = :param_id ORDER BY id";
		$result = $conn->prepare($str_categoryL2);
		$result->execute($category_param);
		$row_g = $result->rowcount();
		echo "theForm.selproducttype_level2.options[0] = new Option('-- กรุณาเลือก --','0');";
		for($i=0; $i<$row_g; $i++){
			$a = $i+1 ;
			$record = $result->fetch(PDO::FETCH_ASSOC);
			echo "theForm.selproducttype_level2.options[".$a."] = new Option('".$record["name"]."','".$record["id"]."');";
		}
		
	echo "} break;";
}
echo "}"; /*----- switch */


echo "};"; /*--- function choose_amphur */
echo "</script>";
 

?>