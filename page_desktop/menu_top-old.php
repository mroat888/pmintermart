<nav class="navbar sticky-top navbar-light bg_blue" style="margin:0px; padding: 0px;">
<div class="container-fluid bg_blue">
	<div class="container">
		<div class="row">
			<div class="col-3">
				<?php include_once("menu_top_left_dropdown.php"); ?>
				<?php //include_once("page_desktop/menu_hamburger.php"); ?>
			</div>
			<div class="col-9">
				<ul class="menu_top">
					<li><a href="<?php echo URL; ?>">หน้าแรก</a></li>
					<li><a href="<?php echo URL;?>about.php">เกี่ยวกับเรา</a></li>
					<li><a href="#">โปรโมชั่น</a></li>
					<li><a href="<?php echo URL;?>howtobuying.php">วิธีการสั่งซื้อ</a></li>
					<li><a href="<?php echo URL;?>howtopay.php" class="font_white_yellow">การชำระเงิน</a></li>
					<!-- <li><a href="#">บล๊อก</a></li> -->
					<li><a href="<?php echo URL;?>contactus.php">ติดต่อเรา</a></li>
				</ul>

			</div>
			<!-- <div class="col-3" style="text-align: right;">
				<div style="color: #222; margin-top: 16px;">
				<i class="fas fa-phone font_yellow"></i> Hotline : 087-708-0638</div>
			</div> -->
		</div>
	</div>
</div>
</nav>

<div class="modal fade" id="Modallogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    <div class="modal-content">
	    <div class="modal-header">
	        <ul class="nav nav-tabs" style="width: 100%">
			  	<li class="nav-item">
			    	<a href="javascript:void(0);" id="link_login" class="nav-link active " 
			    	onclick="div_show('div_login','link_regis','link_login')" >เข้าสู่ระบบ</a>
			  	</li>
			  	<li class="nav-item">
			    	<a href="javascript:void(0)" id="link_regis" class="nav-link" 
			    	onclick="div_show('div_register','link_login','link_regis')">สมัครสมาชิก</a>
			  	</li>
			</ul>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          	<span aria-hidden="true">&times;</span>
	        </button>
	    </div>
	    <div class="modal-body">
	    	<div id="div_login" class="div_login">
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
	    	<div id="div_register" class="div_register">
	    		<div style="width: 100%; text-align: center;"><h3>สมัครสมาชิก</h3></div>
		        <form name="form2" method="post" enctype="multipart/form-data" 
		        	action="<?php echo URL; ?>register_aed.php?typ=add" 
		        	oninput='tmemberconfirmpassword.setCustomValidity(tmemberconfirmpassword.value != tmemberpassword.value ? "Passwords do not match." : "")'>
		        	<div class="form-group">
		            	<label for="tmembername" class="col-form-label">Name - Lastname.</label>
		            	<input type="text" class="form-control" id="tmembername" name="tmembername" 
		            	required="required">
		          	</div>
		          	<div class="form-group">
		            	<label for="tmemberemail" class="col-form-label">Email.</label>
		            	<input type="text" class="form-control" id="tmemberemail" name="tmemberemail" 
		            	required="required">
		          	</div>
		          	<div class="form-group">
		            	<label for="tmemberpassword" class="col-form-label">Password.</label>
		            	<input type="Password" class="form-control" id="tmemberpassword" name="tmemberpassword" 
		            	required="required">
		          	</div>
		          	<div class="form-group">
		            	<label for="tmemberconfirmpassword" class="col-form-label">Confirm password.</label>
		            	<input type="Password" class="form-control" id="tmemberconfirmpassword" required="required">
		          	</div>
		          	<button type="submit" class="btn btn-primary">สมัครสมาชิก</button>
		        </form>
	    	</div>
	    </div>
	    <div class="modal-footer">
	        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Send message</button> -->
	      </div>
	    </div>
  	</div>
</div>


<script>
	function div_show(obj,removeclass,addclass){	
		document.getElementById('div_login').style.display = "none";
		document.getElementById('div_register').style.display = "none";
		document.getElementById(obj).style.display = "block";

		var element = document.getElementById(removeclass);
  		element.classList.remove("active");

  		var element = document.getElementById(addclass);
  		element.classList.add("active");

	}

	function div_member_menu(){
		document.getElementById("div_member").classList.toggle("show");

	}

	function chkValue(path_url){
		var path_url = path_url;
		var tkey = document.getElementById('tsearch').value;
		/*var path = path_url+"search/"+tkey+"/1/";*/
		var path = "products_search.php?keyword="+tkey+"&nowpage=1";
		window.location.href = path;
		//alert(path);
	}


</script>

<style>
	.div_register{
		display: none;
	}

	.menu_top{
		width: 100%;
		padding: 0px;
		margin:0px;
  		font-size: 0.9375em;
	}
	.menu_top > li{
		float: left;
		list-style: none;
		color: #FFFFFF;
		/*color: #333;*/
		padding: 1em;
		/*padding-right: 0.8em;
		padding-left: 0.8em;*/
		padding-right: 2em;
		padding-left: 2em;
		margin: 0px;
	}
	.menu_top > li a{
		color: #FFFFFF;
		/*color: #222;*/
		font-weight: 500;
	}
	.menu_top > li a:hover{
		color: #ffd21d;
		/*color:#FFFFFF;*/
		text-decoration: none;
	}

	.search-input {
		border-right: 0;
		border-radius: 1em;
	}

	.input-group-addon {
		border: 0;
		width: 80px;
		border-radius: 0px 16px 16px 0px;
	}

	.div_member{
		position: absolute;
		padding: 0px;
		margin-top: 0.3em;
		right: 20px;
		display: none;
		z-index: 9999;
		background-color: #FFFFFF;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		
	}
	.show {display: block;}

	.menu_dropdown_content{
		padding: 0px;
		margin: 0px;
		width: 100%;
		padding-top: 0.5em;
		padding-bottom: 0.5em;
	}

	.menu_dropdown_content li{
		text-align: left;
		list-style: none;
		padding: 1em;
		padding-top: 0.2em;
		padding-bottom: 0.2em;
	}

	.menu_dropdown_content li:hover{
		background-color: #CCC;
	}

</style>

