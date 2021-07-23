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
							<div class="col-md-6"><h3>รายการใบสั่งซื้อ</h3></div>
							
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
							<div class="col-md-offset-2 col-md-10">
								<div class="row">	
									<div class="col-md-offset-2 col-md-4">

									</div>
									<div class="col-md-2">
										<div class="col-md-12">
											<div class="form-group">
												<input type="text" class="form-control datepicker" id="date_start" 
											    name= "date_start"  placeholder="วันที่เริ่ม">
										  	</div>
										</div>
									</div>
									<div class="col-md-2">
										<div class="col-md-12">
											<div class="form-group">
												<input type="text" class="form-control datepicker" id="date_end" 
											    name= "date_end"  placeholder="วันที่สิ้นสุด">
										  	</div>
										</div>
									</div>
									<div class="col-md-2">
										<div class="col-md-12">
											<button type="button" class="btn btn-warning" style="width:90px;" 
											onclick="searchDate('order_main_table_result.php');">Search</button>
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
						<?php
							// $str_count_order = "SELECT COUNT(id) AS count_order FROM order_main";
							// $result_count_order = $conn->prepare($str_count_order);
							// $result_count_order->execute();

							// $record_count = $result_count_order->fetch(PDO::FETCH_ASSOC);
						?>
								<div class="col-md-3 row">
								<!-- <span class="badge" style="margin-top: 8px;">&nbsp;Record : 
									<?php echo number_format($record_count['count_order']); ?>&nbsp;
								</span> -->
								</div>
							</div>
							<div class="col-md-6" style="text-align:right">

							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
							<span class="glyphicon glyphicon-list-alt btn-sm" aria-hidden="true" style="padding-left:0px;"></span>
							<b>รายการใบสั่งซื้อ / Order</b>
							</div>
						  	<div class="panel-body">
								<div class="table-responsive" id="table_list">
									<?php include_once("order_main_table_result.php"); ?>
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

</body>
</html>