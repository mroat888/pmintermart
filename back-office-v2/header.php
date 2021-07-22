<?php
    session_start();

    if(!isset($_SESSION['ss_accountid']) || $_SESSION['ss_accountid'] =="" || $_SESSION['ss_id'] != session_id()){
        echo "<script language='javascript'>";
            echo "window.location.href='index.php'";
        echo "</script>";
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="vendor/bootstrap-4.6.0-dist/css/bootstrap.min.css" 
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="lib/css/style.css?v2021-06-21-3">
    <link rel="stylesheet" href="lib/css/style_menu_left.css">
    
<?php 
	include_once("../config/config.php");
	include_once("../lib/php/class.dbConnect.php"); 
?>

<?php
    $conn = new Database();
?>