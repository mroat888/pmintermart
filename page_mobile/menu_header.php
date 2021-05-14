<div class="container-fluid bg_blue" style="margin-bottom: 0.7em;">
	<div class="row">
		<div class="col-2">
			<a href="#" class="menu-toggle" onclick="mobileMegaMenu()"><i class="fa fa-bars" style="color:#FFFFFF"></i></a>
		</div>
		<div class="col-2">
			<a href="<?php echo URL; ?>">
				<img src="<?php echo URL_IMG;?>images/PM-LOGO.jpg" 
				style="max-height: 4em; padding-top: 0.5em; padding-bottom: 0.5em;" ></a>
		</div>
		<div class="col-6" style="margin-top: 1em;">
			<form name="form1" method="get" action="products_search.php">
				<div class="input-group" >
					<input type="text" id="keyword" name="keyword" 
					class="form-control search-input" placeholder ="Search product" required="required" />
					<button type="submit" class="input-group-addon bg_yellow" 
					style="background-color: #5c92e8; color: #FFFFFF;">Search</button>
			    </div>
			</form>
		</div>
		<div class="col-2" style="margin-top: 1.5em; text-align: left;">
			<a href="<?php echo URL;?>shoppingcart_step1.php">
				<span class="badge badge-light" 
				style="position: absolute; top:-0.6em; right:1.8em; background-color: #ffd21d; font-size: 0.9em; padding: 0.5em;">
						<?php 
							if(isset($_SESSION['cart_id']) && $_SESSION['cart_id'] != ""){
								echo count($_SESSION['cart_id']);
							}else{
								echo "0";
							}
						?>
						</span>
				<i class="fas fa-shopping-cart" style="font-size: 1.8em; color: #FFFFFF;"></i>
			</a>
		</div>
	</div>
</div>

<div id="main-menu_mobile" class="main-menu_mobile">
	<div class="container-fluid" 
	style="width: 100%; top: -50px; position: absolute; background-color: #FFFFFF; height: 45px; border-bottom: 1px solid #999999;">
		<div class="row" style="margin-top: 1.5em;">
			<div class="col-3">
				<a href="<?php echo URL?>member_login.php">เข้าสู่ระบบ</a>
			</div>
			<div class="col-3">
				<a href="<?php echo URL?>member.php">สมัครสมาชิก</a>
			</div>
			<div class="col-6" style="font-size: 3em; text-align: right;">
				<div style="margin-top: -0.5em;">
					<a href="#" onclick="mobileMegaMenu()"><i class="fas fa-times"></i></a>
				</div>
			</div>
		</div>
	</div>
	<?php
		$array_type_lv1 = array(":param_status" => "Y");
		$str_producttype_level1 = "select id, name, name_en from producttype_level1 
				where status = :param_status order by ordinal_number";
		$result_producttype_level1 = $conn->prepare($str_producttype_level1);
		$result_producttype_level1->execute($array_type_lv1);
	?>
	<nav>
		<ul class="dropdown-content">
			<?php
				$count=0;
		        while($record_menu_topleft = $result_producttype_level1->fetch(PDO::FETCH_ASSOC)){
		        	$link_product_name = $record_menu_topleft['name'];
		        	$permalink_group = URL."group/".$record_menu_topleft['id']."/".$link_product_name."/"."1/";
		        	$count++;
	      	?>
	      			<li>
	      	<?php
	              	$array_count_level2 = array(':param_type1_id' => $record_menu_topleft['id']);
	              	$count_level2 = "select COUNT(id) AS count_cus_total from producttype_level2 where id_producttype_level1 = :param_type1_id and status = 'Y'";
	              	$result_count_level2 = $conn->prepare($count_level2);
	              	$result_count_level2->execute($array_count_level2);
	              	$record_count_level2 = $result_count_level2->fetch(PDO::FETCH_ASSOC);
	              	if($record_count_level2['count_cus_total'] > 0){ 
		                $array_param_type1 = array(
		                  ':param_type1_id' => $record_menu_topleft['id']
		                );
		                $str_producttype_level2 = "select * from producttype_level2 
		                where id_producttype_level1  = :param_type1_id and status = 'Y' order by id ";
		                $result_producttype_level2 = $conn->prepare($str_producttype_level2);
		                $result_producttype_level2->execute($array_param_type1);
		                $div_name = "menusub".$count;
            ?>
            			<a href="#" id="open_sub" class="open_sub" onclick="open_sub('<?=$div_name;?>');">
            				<?php echo $record_menu_topleft['name'];?>&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-right"></i></a>
		      			<div id="<?=$div_name;?>" class="div-dropdown-content-sub">
							<ul class="dropdown-content-sub">
								<li><a href="#" onclick="close_sub('<?=$div_name;?>')"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;Back</a></li>
							<?php
			                    while($record_producttype_level2 = $result_producttype_level2->fetch(PDO::FETCH_ASSOC)){
			                      $link_product_name = $record_producttype_level2['name'];
			                      $permalink = URL."collection/".$record_producttype_level2['id']."/".$link_product_name."/"."1/";
			                  	?>
			                      <a href="<?php echo $permalink; ?>"><li><?php echo $link_product_name;?></li></a>
			                 <?php
			                    }
			                 ?>
							</ul>
						</div>
	      	<?php
	      			}else{
	      	?>
	      				<a href="<?php echo $permalink_group; ?>"><?php echo $record_menu_topleft['name'];?></a>
	      	<?php
	      			}
	      	?>
	      			</li>
	      	<?php
	      		}
	      	?>
		</ul>
	</nav>
</div>

<style type="text/css">
	
.search-input {
	border-right: 0;
	/*border-radius: 1em;*/
	border-radius: 1em 0px 0px 1em;
}

.input-group-addon {
	border: 0;
	width: 5em;
	border-radius: 0px 1em 1em 0px;
}


.menu-toggle{
	font-size: 3em;
	margin-left: 0.3em;
}
.main-menu_mobile{
	position: absolute;
	display: none;
	width: 100%;
	margin: 0px;
	margin-top: -0.6em;
	padding: 0px;
}

.show {display: block;}
.hide {display: none;}

nav{
	position: relative;
	flex-direction: column;
	height: auto;
}
.dropdown-content{
	background-color: #FFFFFF;
	margin: 0px;
	padding: 0px;
	position: absolute;
	top: 0px;
	width: 100%;
	height: auto;
	z-index: 9;
}

.dropdown-content > li{
	margin-left: -15px;
	background-color: #FFFFFF;
}

.dropdown-content li , .dropdown-content-sub li{
	list-style: none;
	line-height: 45px;
	border-bottom: 1px solid #999999;
	margin-left: -15px;
}

.dropdown-content li{
	padding-left: 4em;
}

.dropdown-content li a , .dropdown-content-sub li a{
	color:#000000;
	/*font-weight: bold;*/
	font-size: 1em;
}

.dropdown-content-sub{
	padding-left: 4em;
}

.dropdown-content-sub{
	list-style-type: none;
	width: 100%;
}

.div-dropdown-content-sub{
	background-color: #FFFFFF;
	display: none;
	position: absolute;
	top: 0px;
	margin-left: -5em;
	width: 100%;
	min-height: 100%;
	height: auto;
	z-index: 999;
}

</style>


<script>
    function mobileMegaMenu() {
      	document.getElementById("main-menu_mobile").classList.toggle("show");
    }

    function open_sub(elediv) {
    	var elediv = elediv;
    	document.getElementById(elediv).style.display = "block";
    }
    function close_sub(elediv) {
    	var elediv = elediv;
    	document.getElementById(elediv).style.display = "none";
    }

    function chkValue(path_url){
		var path_url = path_url;
		var tkey = document.getElementById('tsearch').value;
		var path = path_url+"search/"+tkey+"/1/";
		window.location.href = path;
		alert(path);
	}
</script>
