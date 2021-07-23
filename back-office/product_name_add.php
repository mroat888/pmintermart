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

<?php 
	include("include_header.php"); 
	if(isset($_GET['id']) && $_GET['id'] != ""){
		$id = $_GET['id'];
		$param_array_product_id = array('param_id' => $_GET['id']);
		$str_product= "SELECT * FROM product_name WHERE id = :param_id";
		$result_product= $conn->prepare($str_product);
		$result_product->execute($param_array_product_id);
		$record_product= $result_product->fetch(PDO::FETCH_ASSOC);

		if($record_product['isdraft'] == "Y"){
			$action = "property_company_aed.php?typ=edit&id=$id&isdraft=N";
			$button_save_value = "Save & Send";
		}else{
			$action = "property_company_aed.php?typ=edit&id=$id";
			$button_save_value = "Save";
		}
		
	}else{
		$action = "property_company_aed.php?typ=add";
		$action_draft = $action."&isdraft=Y";
		$button_save_value = "Save & Send";
	}
?>

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
				<form name="fproduct" id="fproduct" class="form-horizontal" method="post" 
				enctype="multipart/form-data" data-toggle="validator" role="form">
					
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6"><h3>เพิ่มทรัพย์บริษัท / NEW</h3></div>
						</div>
					</div>

					<div class="col-md-12" style="padding-top:0px; padding-bottom:10px;">
						<div style="float:left: width:100%; height:1px; background-color:#ccc"></div>
					</div>

					<div class="col-md-12">
						<div class="row">
							<div class="col-md-offset-6 col-md-6" style="text-align:right; margin-bottom:10px;">
								<button type="submit" class="btn btn-success" <?php //echo $add_disabled?> style="width:90px;">Save</button>
								<span>&nbsp;&nbsp;&nbsp;or</span>
								<button type="button" class="btn btn-link" <?php //echo $add_disabled?> 
								onclick="window.history.back();">
									Discard
								</button>
							</div>
					</div>

					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
							<span class="glyphicon glyphicon-inbox btn-sm" aria-hidden="true" style="padding-left:0px;"></span>
							<b>เพิ่มทรัพย์บริษัท / NEW</b>
							</div>
						  	<div class="panel-body">
						  		<div class="col-md-6" style="margin-top:15px; margin-bottom:10px;">
									<div class="form-group">
										<label for="tname" class="control-label">กลุ่มสินค้า</label>
										<select class="form-control" id="selproducttype_level1" name="selproducttype_level1" onchange="choose_producttype_level2(this);">
										    	<option value="0" selected="selected">-เลือกกลุ่มสินค้า-</option>
										<?php
												$str_producttype_level1 = "SELECT * FROM producttype_level1 WHERE status = 'Y' order by id";
												$result_producttype_level1 = $conn->prepare($str_producttype_level1);
												$result_producttype_level1->execute();
												while($record_producttype_level1 = $result_producttype_level1->fetch(PDO::FETCH_ASSOC)){
													if($record_product['id_producttype_level1'] == $record_producttype_level1['id']){
										?>	
													<option value="<?php echo $record_producttype_level1['id']; ?>" selected><?php echo $record_producttype_level1['name']; ?></option>
										<?php       }else{    ?>
													<option value="<?php echo $record_producttype_level1['id']; ?>"><?php echo $record_producttype_level1['name']; ?></option>
										<?php   
													}
												} 	
										?>
										</select>
									</div>
									<div class="form-group">
										<label for="tname" class="control-label">หมวดสินค้า</label>
										<select class="form-control" id="selproducttype_level2" name="selproducttype_level2">
										    <option value="0" selected="selected">-กรุณาเลือก-</option>
										<?php
												$str_producttype_level2 = "SELECT * FROM producttype_level2 WHERE status = 'Y' order by id";
												$result_producttype_level2 = $conn->prepare($str_producttype_level2);
												$result_producttype_level2->execute();
												while($record_producttype_level2 = $result_producttype_level2->fetch(PDO::FETCH_ASSOC)){
													if($record_product['id_producttype_level2'] == $record_producttype_level2['id']){
										?>	
													<option value="<?php echo $record_producttype_level2['id']; ?>" selected><?php echo $record_producttype_level2['name']; ?></option>
										<?php       }else{    ?>
													<option value="<?php echo $record_producttype_level2['id']; ?>"><?php echo $record_producttype_level2['name']; ?></option>
										<?php   
													}
												} 	
										?>
										</select>
									</div>
									<div class="form-group">
										<label for="tname" class="control-label">รหัสสินค้า</label>
										<input type="text" class="form-control" id="tname_en" name="tname_en" 
										value = "<?php echo $record_product['product_code']; ?>" placeholder="ระเภททรัพย์ (En)">
									</div>
									<div class="form-group">
										<label for="tname" class="control-label">ชื่อสินค้า</label>
										<input type="text" class="form-control" id="tname_en" name="tname_en" 
										value = "<?php echo $record_product['name']; ?>" placeholder="ระเภททรัพย์ (En)">
									</div>
								</div>
								<div class="col-md-12">
										<div class="col-md-12">
										  	<div class="form-group">
										  		<label for="tdetailth" class="control-label">รายละเอียด (ไทย)</label>
										  		<textarea class="form-control ckeditor" id="tdetailth" name="tdetailth" rows="7"
										  		placeholder="รายละเอียดเพิ่มเติม"><?php echo $record_product['detail']?></textarea>
										  	</div>
										</div>
								</div>
							</div>
						</div>
					</div>
					
				</form>
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

		$("#fproject").validator();

	  });
</script>


<script type="text/javascript">
//<![CDATA[
	CKEDITOR.replace( 'tdetailth',
		{
			filebrowserBrowseUrl : 'vendor/kcfinder/browse.php?opener=ckeditor&type=files',
			filebrowserImageBrowseUrl : 'vendor/kcfinder/browse.php?opener=ckeditor&type=images',
			filebrowserFlashBrowseUrl : 'vendor/kcfinder/browse.php?opener=ckeditor&type=flash',
			filebrowserUploadUrl : 'vendor/kcfinder/upload.php?opener=ckeditor&type=files',
			filebrowserImageUploadUrl : 'vendor/kcfinder/upload.php?opener=ckeditor&type=images',
			filebrowserFlashUploadUrl : 'vendor/kcfinder/upload.php?opener=ckeditor&type=flash',
		} 
	);
//]]>
</script>
