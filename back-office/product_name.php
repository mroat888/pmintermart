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
	<script>
		function confirm_delete(id){
			if(confirm('คุณต้องการลบใช่หรือไม่ ?')){
				window.location.href = 'property_company_aed.php?typ=delete&id='+id;
			}
		}
	</script>
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
						<div class="row">
							<div class="col-md-6"><h3>รายการสินค้า</h3></div>
							
							<div class="col-md-6" style="text-align:right; margin-top:12px; margin-bottom:12px;">
								<div class="row">	
									<div class="col-md-12">			
										<div class="form-group">
											<div class="input-group">
											<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
											<input type="text" class="form-control" id="tsearch" name="tsearch" 
											placeholder="Search..." onkeypress="searchKeyPress(event,'order_main_table_result.php');">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-12" style="padding-top:0px; padding-bottom:10px;">
						<div style="float:left: width:100%; height:1px; background-color:#ccc"></div>
					</div>

					<div class="col-md-12">
						<div class="row" style="margin-bottom:10px;">
							<div class="col-md-6">

							</div>
							<div class="col-md-6" style="text-align:right">
								<button type="button" class="btn btn-info" 
								onclick="window.location.href='product_name_add.php';" style="margin-bottom:0px; width:90px;">
									<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>&nbsp;New
								</button>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
							<span class="glyphicon glyphicon-inbox btn-sm" aria-hidden="true" style="padding-left:0px;"></span>
							<b>รายการสินค้า / Products</b>
							</div>
						  	<div class="panel-body">
								<div class="table-responsive" id="table_list">
									<?php include_once("product_name_table_result.php"); ?>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid"><?php include_once("footer.php"); ?></div>

</body>
</html>
<?php include("include_footer.php"); ?>

<script>
	$(function() {
	    $( ".datepicker" ).datepicker({
	    	dateFormat: 'yy-mm-dd',
	    	changeMonth: true,
      		changeYear: true
	    });
	});
</script>