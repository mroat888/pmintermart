<?php

class PageTitle{

    function __construct(){
        $this->conn = new Database();
    }

    function setMetaTitle($record_title){
        $title_link = str_replace("/", "-",$record_title);
        $title_link = str_replace("%", "-",$title_link);
        $title_link = str_replace("?", "!",$title_link);
        $title_link = str_replace('"', "!",$title_link);
        $title_link = str_replace("<b>", "",$title_link);
        $title_link = str_replace("</b>", "",$title_link);
        $title_link = str_replace("<br>", " ",$title_link);
        $title_link = str_replace("<-b>", "",$title_link);
        //$title_link = str_replace(":", " ",$title_link);
        $title_link = trim($title_link);
        return $title_link;
    }

    function setLinkReplace($record_title){
        $title_link = $this->setMetaTitle($record_title);
        $title_link = str_replace(" ", "-",$title_link);  
        $title_link = trim($title_link);
        return $title_link;
    }

    function setTypeName($datatable,$id){
        $param_array_type = array(':param_type'=>$id);
        $str_typ = "select * from ".$datatable." where id = :param_type";
        $result_typ = $this->conn->prepare($str_typ);
        $result_typ->execute($param_array_type);
        $record_typ = $result_typ->fetch(PDO::FETCH_ASSOC);	
        return $record_typ;
    }

}

?>