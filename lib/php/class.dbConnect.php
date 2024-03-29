<?php

class Database extends PDO{

    public function __construct(){
        parent::__construct(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS, 
			array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }

}

class Database_WP extends PDO{

    public function __construct(){
        parent::__construct(DB_TYPE_WP.":host=".DB_HOST_WP.";dbname=".DB_NAME_WP, DB_USER_WP, DB_PASS_WP, 
			array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }

}

?>