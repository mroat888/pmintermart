<?php
    header('Content-Type: application/json');
    include_once("../../config/config.php");
    include_once("../../lib/php/class.dbConnect.php"); 
    $conn = new Database();

    try{
        if($_SERVER['REQUEST_METHOD'] === "GET"){
            $tget = $_GET['tget'];

            if($tget == "getamphur"){
                $pvid = $_GET['pvid'];
                $param_amphur = array(':param_province_id' => $pvid);
                $str_amphur = "SELECT * FROM amphures WHERE province_id = :param_province_id ORDER BY name_th";
                $result_amphur = $conn->prepare($str_amphur);
                $result_amphur->execute($param_amphur);
                $record_amphur = $result_amphur->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($record_amphur);
            }

            if($tget == "getdistrict"){
                $amid = $_GET['amid'];
                $param_district = array(':param_amphur_id' => $amid);
                $str_district = "SELECT * FROM districts WHERE amphure_id = :param_amphur_id ORDER BY name_th";
                $result_district = $conn->prepare($str_district);
                $result_district->execute($param_district);
                $record_district = $result_district->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($record_district);
            }

            if($tget == "gettzipcode"){
                $dtid = $_GET['dtid'];
                $param_district = array(':param_districts_id' => $dtid);
                $str_district = "SELECT zip_code FROM districts WHERE id = :param_districts_id ORDER BY name_th";
                $result_district = $conn->prepare($str_district);
                $result_district->execute($param_district);
                $record_district = $result_district->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($record_district);
            }

        }
    }catch(Excaption $ex){
        echo $ex->getMessage();
    }

?>