<?php
class QueryFunction{

    function __construct(){
        include_once("../../lib/php/class.dbConnect.php");         
        $this->conn = $conn;
    }

    function setRecordQuery($fieldname,$datatable,$wherwfield, $id){
        $param_array = array(':id'=>$id);
        $str = "select ".$fieldname." from ".$datatable." where ".$wherwfield." = :id";
        $result = $this->conn->prepare($str);
        $result->execute($param_array);
        $record = $result->fetch(PDO::FETCH_ASSOC);	
        return $record[$fieldname];
    }

}


?>