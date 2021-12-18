<?php include_once("page_mobile/menu_header.php"); flush();?>
<script>
    /*document.getElementById("myDropdown").classList.toggle("show");*/
</script>
<?php
	if(!empty($_SESSION['memid']) && isset($_SESSION['memid']) && $_SESSION['memid'] !=""){
		$home_url = URL;
		// header('Location: $home_url');
		//exit;
		echo "<script>
			window.location.href='$home_url';
		</script>";
	}
?>
<div class="container-fluid">
	<div class="row">
		<div class="container">
			<div class="row" style="margin-top: 25px; margin-bottom: 25px;">
				<div class="col-12" style="margin-top: 25px;">
					<div style="width: 100%; text-align: center;"><h3>เข้าสู่ระบบ</h3></div>
					<!-- <form name="form1" method="post" enctype="multipart/form-data" 
		        	action="<?php echo URL; ?>login_aed.php"> -->
					<form id="flogin" name="form1" >
		          	<div class="form-group">
		            	<label for="tloginemail" class="col-form-label">Email.</label>
		            	<input type="text" class="form-control" id="tloginemail" name="tloginemail" required="required">
		          	</div>
		          	<div class="form-group">
		            	<label for="tloginpassword" class="col-form-label">Password.</label>
		            	<input type="Password" class="form-control" id="tloginpassword" name="tloginpassword" required="required">
		          	</div>
		          	<button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
		        </form>
				</div>
			</div>

		</div>
	</div>
</div>

<?php include_once("page_mobile/footer.php");?>