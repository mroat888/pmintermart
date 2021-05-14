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
	<div class="container">
		<div class="row" style="margin-top:100px;">
			<div class="col-md-6 col-md-offset-3">

				<div class="panel panel-primary" style="margin: auto;">
					<div class="panel-heading">Administator</div>
				  	<div class="panel-body">
				    	
								<form id="flogin" name="flogin" class="form-horizontal" action="login_aed.php" method="post" data-toggle="validator" role="form">
							
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
											<!--<button type="button" class="btn btn-primary"style="width:130px;" onClick="this.form.action='login_aed.php'; submit();">Login-</button>-->
									</div>
								</div>
							</form>
				  	</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php include_once("include_footer.php"); ?>

<script type="text/javascript">
	$(document).ready(function () {
		$('#flogin').validator();
	}
</script>