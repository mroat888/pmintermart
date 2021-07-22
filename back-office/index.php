<?php
	if(!isset($_SESSION)){
		session_start();
	}
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once("include_header.php"); ?>
<title>Back-office</title>
</head>
<body>
	<div class="div_status"></div>
	<div class="container">
		<div class="row" style="margin-top:100px;">
			<div class="col-12">
				
				<div class="panel panel-primary" style="margin: auto; width:500px;">
					<div class="panel-heading">Administator</div>
				  	<div class="panel-body">
				    	
								<form id="flogin" name="flogin" class="form-horizontal" role="form">
							
								<div class="form-group">
									<label for="tuser" class="col-sm-2 control-label">username</label>
									<div class="col-sm-10">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
											<input type="text" class="form-control" id="tuser" name="tuser" 
											placeholder="user" autofocus required>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="tpass" class="col-sm-2 control-label">Password</label>
									<div class="col-sm-10">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
											<input type="password" class="form-control" id="tpass" name="tpass" 
											placeholder="Password" required>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" class="btn btn-primary">Login</button>
									</div>
								</div>
							</form>
				  	</div>
				</div>
			</div>
		</div>
	</div>

	<?php include_once("include_footer.php"); ?>

<script>
	$(function() {
		$("#flogin").submit(function(e){
			e.preventDefault();
			$.ajax({
				type: "POST",
				url: "login_aed.php",
				data: $(this).serialize()
			}).done(function(resp){
				// alert('ยินดีตอนรับเข้าสู่ระบบ');
				$(".div_status").toggle();
				$(".div_status").css("background-color","green");
				$(".div_status").text("ยินดีตอนรับเข้าสู่ระบบ");
				setTimeout(() => {
					location.href='dashboard.php'
				}, 600);
			}).fail(function(resp){
				//alert('คุณไม่สามารถเข้าระบบได้')
				$(".div_status").toggle();
				$(".div_status").css("background-color","#FF0000");
				$(".div_status").text("คุณไม่สามารถเข้าระบบได้");
				setTimeout(() => {
					$(".div_status").toggle();
				}, 1500);
			})
		});
	});
</script>


<style>
	.div_status{
		display:none;
		position:absolute;
		background-color:green;
		height:50px;
		width:200px;
		right:0;
		margin-top:3em;
		padding:15px;
		border-radius:5px 0 0 5px;
		color:#FFF;
	}
</style>

</body>
</html>