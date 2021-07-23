<nav class="sticky-top m-0 p-0" style="background-color: #FFFFFF">
<div class="container-fluid" style="background-color: #FFFFFF">
	<div class="container">
		<div id = "py_rowtop" class="row">
			<div class="col-3">
				<a href="<?php echo URL; ?>">
					<img id = "pm_logo" class="pm_logo" src="<?php echo URL_IMG;?>images/PM-LOGO-1.png" alt="pm intermart">
				</a>
			</div>
			<div class="col-7" style="text-align: center;">
				<div >
					<!-- <form name="form1" method="post" onsubmit="return chkValue('<?=URL?>');"> -->
					<form name="form1" method="get" action="<?=URL?>products_search.php">
					<div class="input-group" >
			          	<input type="text" id="keyword" name="keyword" 
			          	class="form-control search-input" placeholder ="Search product"
			          	style="border-radius: 16px 0px 0px 16px;" required="required" />
			          	<button type="submit" class="input-group-addon bg_yellow" 
			          	style="/*background-color: #5c92e8;*/ color: #222; font-size: 0.9em;">
			            	Search
			          	</button>
			        </div>
			    	</form>
				</div>
			</div>
			<div class="col-2" style="text-align: right;">
				<div>
					<?php
						if(isset($_SESSION['memid']) && $_SESSION['memid'] != ""){
					?>
							<a href="javascript:div_member_menu()">
								<i class="fas fa-user font_blue" style="font-size: 1.8em;"></i></a>
					<?php
						}else{
					?>
							<a href="" data-toggle="modal" data-target="#Modallogin">
								<i class="fas fa-user font_blue" style="font-size: 1.8em;"></i></a>
					<?php
						}
					?>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<?php
						if(isset($_SESSION['cart_id']) && $_SESSION['cart_id'] != "" && $_SESSION['cart_id'] != 0){
							$iscart = count($_SESSION['cart_id']);
							$iscart_url = URL."shoppingcart_step1.php";
						}else{
							$iscart = 0;
							$iscart_url = "javascript:void(0)";
						}
					?>
					<a href="<?php echo $iscart_url;?>">
						<span class="badge badge-light " 
						style="position: absolute; top:-10px; right:15px; background-color: #ffd21d">
						<?php echo $iscart; ?>
						</span>
						<i class="fas fa-shopping-cart font_blue" style="font-size: 1.8em;"></i>
					</a>
				</div>
				<div id="div_member" class="div_member">
					<ul class="menu_dropdown_content">
						<a href="<?php echo URL;?>member.php?id=<?php echo $_SESSION['memid'];?>"><li>ข้อมูลสมาชิก</li></a>
						<a href="<?php echo URL."order_history.php"; ?>"><li>ประวัติการสั่งซื้อ</li></a>
						<a href="<?php echo URL."logoff.php"; ?>"><li>Logoff</li></a>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once("menu_top_v2.php"); ?>

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
		var tkey = document.getElementById('keyword').value;
		var path = "'"+path_url+"search/"+tkey+"/1/'";
		alert(path);
		//var path = "products_search.php?keyword="+tkey+"&nowpage=1";
		window.location.href = path;
	}


</script>

<style>
	.pm_logo{
		max-height: 3em;
		transition:0.5s;
	}

	.pm_logo_scrolling{
		max-height: 2.5em;
		transition:0.5s;
	}

	.py_rowtop{
		padding-top: 1.5em;
		padding-bottom: 1.5em;
		transition:0.5s;
	}

	.py_rowtop_scrolling{
		padding-top: 0.8em;
		padding-bottom: 0.8em;
		transition:0.5s;
	}

	.div_register{
		display: none;
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