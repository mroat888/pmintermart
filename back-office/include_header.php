<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
<link rel="icon" href="../favicon.ico" type="image/x-icon">

<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="vendor/jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet" type="text/css">
<link href="lib/css/style.css" rel="stylesheet" type="text/css">
<link href="lib/css/style_menu_left.css" rel="stylesheet" type="text/css">
<?php 
	include_once("../config/config.php");
	include_once("../lib/php/class.dbConnect.php"); 
	include_once("lib/php/class.uploadFile.php");
	include_once("lib/php/function.categoryLevel2.php");
?>

<?php 
	$conn = new Database();
	$url_base = URL;
?>
