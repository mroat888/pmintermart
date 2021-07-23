<?php include_once("page_desktop/header.php"); flush();?>
<script>
    /*document.getElementById("myDropdown").classList.toggle("show");*/
</script>

<?php
	if(isset($_GET['id']) && $_GET['id'] > 0){
		$action_save = URL."register_aed.php?typ=edit";
	}else{
		$action_save = URL."register_aed.php?typ=add";
	}
	//echo $action_save;
?>
<div class="container-fluid">
	<div class="row">
		<div class="container">
			<div class="row" style="margin-top: 25px; margin-bottom: 25px;">
				<div class="col-12" style="margin-top: 25px;">
					<div class="card">
						<div class="card-header">
							<h2>บัญชีของฉัน</h2>
						</div>
						<div class="card-body">
							<form name="form2" method="post" enctype="multipart/form-data" 
							action="<?php echo $action_save; ?>" 
							oninput='tmemberconfirmpassword.setCustomValidity(tmemberconfirmpassword.value != tmemberpassword.value ? "Passwords do not match." : "")' 
							onsubmit="return chkValue();">
							
								<div class="form-group">
									<label for="tmembername" class="col-form-label">Name - Lastname.</label>
									<input type="text" class="form-control" id="tmembername" name="tmembername" 
									required="required" value="<?php echo $record_member['name']; ?>">
								</div>
								<div class="form-group">
									<label for="tmemberemail" class="col-form-label">Email.</label>
									<input type="text" class="form-control" id="tmemberemail" name="tmemberemail" 
									required="required" value="<?php echo $record_member['uemail']; ?>">
								</div>
								<div class="form-group">
									<label for="tmemberpassword" class="col-form-label">Password.</label>
									<input type="Password" class="form-control" id="tmemberpassword" name="tmemberpassword" 
									required="required" value="<?php echo $record_member['upassword']; ?>">
								</div>
								<div class="form-group">
									<label for="tmemberconfirmpassword" class="col-form-label">Confirm password.</label>
									<input type="Password" class="form-control" id="tmemberconfirmpassword" required="required">
								</div>
								<button type="submit" class="btn btn-primary">สมัครสมาชิก</button>
							</form>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<?php include_once("page_desktop/footer.php");?>