<?php

    function setRecordQuery($fieldname,$datatable,$wherwfield,$id){
        $param_array_setRecordQuery = array(':id'=>$id);
        $str_setRecordQuery = "select ".$fieldname." from ".$datatable." where ".$wherwfield." = :id";
        $result_setRecordQuery = $conn->prepare($str_setRecordQuery);
        $result_setRecordQuery->execute($param_array_setRecordQuery);
        $record_setRecordQuery = $result_setRecordQuery->fetch(PDO::FETCH_ASSOC);	
        return $record_setRecordQuery[$fieldname];
    }


?>