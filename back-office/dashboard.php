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
<html>
<head>
	<?php include("include_header.php");  ?>
	<title>Back-office</title>
</head>
<body>

<div class="container-fluid"><?php include_once("header.php"); ?></div>

<div class="container-fluid">
	<div class="row">

		<div class="mydiv-left-sm" id="mydiv-left-sm" style="height:100%;">
			<div><?php include_once("menu_left.php"); ?></div>
		</div>

		<div class="mydiv-right-sm" id="mydiv-right-sm">
			<div class="my-col-right" >
				<div id="div_dasboard_detail" class="div_dasboard_detail">

				<div class="col-md-12">
					<h3>แผงควบคุม</h3>
				</div>

				<div class="col-md-12" style="padding-top:5px; padding-bottom:25px;">
					<div style="float:left: width:100%; height:1px; background-color:#ccc"></div>
				</div>

				<div class="col-md-12">
					<div class="col-md-6">
						<?php include_once("dashboard_property.php"); ?>
					</div>
					<div class="col-md-6">
						<?php include_once("dashboard_contract_warning.php"); ?>
					</div>
				</div>
				</div>
			</div>
		</div>

	</div>
</div>

<?php include("include_footer.php"); ?>

<div class="container-fluid"><?php include_once("footer.php"); ?></div>

