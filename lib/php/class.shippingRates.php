<?php

class shippingRates{

	function __construct(){
        $this->conn = new Database();
    }

    function shippingPrice($width,$long,$height,$weight,$zone){
    	$box_dimension = $width+$long+$height;

        if($box_dimension != 0){

            $str_shipping_rates = "SELECT * FROM shipping_rates";
            $result_shipping_rates = $this->conn->prepare($str_shipping_rates);
            $result_shipping_rates->execute();

            if($zone != 1){ //-- ถ้าไม่ใช้กรุงเทพ
                $zone_rate = "price_upcountry";
            }else{
                $zone_rate = "price_bkk";
            }

            $size_min = 0;
            while($record_shipping_rates = $result_shipping_rates->fetch(PDO::FETCH_ASSOC)){

            	if($box_dimension < $record_shipping_rates['size']){
            	 	$shipprice_size = $record_shipping_rates[$zone_rate];
            	 	break;
            	}else{
            		$size_min = $record_shipping_rates['size'];
            		$shipprice_size = $record_shipping_rates[$zone_rate];
            	}
            }

            while($record_shipping_rates = $result_shipping_rates->fetch(PDO::FETCH_ASSOC)){

            	if($weight == $record_shipping_rates['weight']){
            		$shipprice_weight = $record_shipping_rates[$zone_rate];
            	}else{
            		$shipprice_weight = 0;
            	}

            }

            if($shipprice_weight >= $shipprice_size){
             	$shipprice = $shipprice_weight;
            }else{
            	$shipprice =  $shipprice_size;
            }

            return $shipprice;
        }else{
            return 0;
        }
    }

}

?>