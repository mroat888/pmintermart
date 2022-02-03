<div class="container-fluid bg_blue">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="menu_top">
					<li class="font_yellow" style="color: #ffd21d;">
						<a href="<?php echo URL."products_hotsale.php"?>"><span class="font_yellow">โปรโมชั่นพิเศษ</span></a>
					</li>
			<?php
				$array_type_lv1 = array(":param_status" => "Y");
				$str_type_lv1 = "select id, name, name_en from producttype_level1 
				where status = :param_status order by ordinal_number";
				$result_type_lv1 = $conn->prepare($str_type_lv1);
				$result_type_lv1->execute($array_type_lv1);
				while($record_type_lv1 = $result_type_lv1->fetch(PDO::FETCH_ASSOC)){
					$lv1_name = $record_type_lv1['name'];
					$permalink_group = URL."group/".$record_type_lv1['id']."/".$lv1_name."/"."1/";	
			?>
					<li>
						<a href="<?php echo $permalink_group; ?>"><?php echo $lv1_name; ?></a>
			<?php
						$array_type_lv2 = array(
							":param_status" => "Y", 
							":param_type_lv1" => $record_type_lv1['id']
						);
								$str_type_lv2 = "select id, name, name_en from producttype_level2 
								where status = :param_status and id_producttype_level1 = :param_type_lv1 
								order by ordinal_number , name";
								$result_type_lv2 = $conn->prepare($str_type_lv2);
								$result_type_lv2->execute($array_type_lv2);
								$count_close = $result_type_lv2->rowCount();
						if($count_close > 0){
							$number_row = floor($count_close/4);
							if($number_row < 2){$number_row = 1;}
			?>
						<div class="div_menu_top_sub">
							<ul class="menu_top_sub">
							<?php
								$check_end_li = "close";
								$rowcheckclose = 0;
								while($record_type_lv2 = $result_type_lv2->fetch(PDO::FETCH_ASSOC)){
									if($rowcheckclose == $number_row){
										$rowcheckclose = 1;
									}else{
										$rowcheckclose++;
									}
									$lv2_name = $record_type_lv2['name'];
									$permalink_collection = URL."collection/".$record_type_lv2['id']."/".$lv2_name."/"."1/";
									if($check_end_li == "close"){
										echo "<li>";
									}
								?>
										<a href="<?php echo $permalink_collection; ?>">
											<span class="font_black" style="font-weight: bold;">
												<?=$lv2_name;?>
											</span>
										</a>
										<?php
											$array_type_lv3 = array(
												":param_status" => "Y", 
												":param_type_lv2" => $record_type_lv2['id']
											);


										$str_type_lv3 = "select id, name, name_en from producttype_level3 
										where status = :param_status and id_producttype_level2 = :param_type_lv2 
										order by name";
										$result_type_lv3 = $conn->prepare($str_type_lv3);
										$result_type_lv3->execute($array_type_lv3);

										
										echo "<ul class='menu_top_sub_lv3'>";
										while($record_type_lv3 = $result_type_lv3->fetch(PDO::FETCH_ASSOC)){
											$lv3_name = $record_type_lv3['name'];
											$permalink_category = URL."category/".$record_type_lv3['id']."/".$lv3_name."/"."1/";
										?>
												<a href="<?php echo $permalink_category; ?>">
													<li class="font_black">
														<span>
															<?php echo $lv3_name; ?>
														</span>
													</li>
												</a>
										<?php
											}
										echo "</ul>";
										echo "<br>";
										?>								
								<?php
									
									if($number_row == $rowcheckclose){									
										echo "</li>";
										$check_end_li = "close";		
									}else{
										
										$check_end_li = "open";
									}
									/*if(($number_close%2) == 0){*/
									// if(($count_close <= 4) || ($count_close >= 8 )){
									// 	echo "</li>";
									// 	$check_end_li = "close";
									// }else if(($count_close >= 5) || ($count_close <= 8 )){
									// 	echo "</li>";
									// 	$check_end_li = "close";
									// }else{
									// 	$check_end_li = "open";
									// }
								?>		
							<?php
								}
							?>
							</ul>
						</div>
					<?php
						} // if($count_close > 0)
					?>
					</li>
			<?php
				}
			?>
					
				</ul>

			</div>
		</div>
	</div>
</div>



<style>
	.menu_top_sub_lv3{
		width: 100%;
		padding: 0px;
		margin:0px;
	}

	.menu_top_sub_lv3 a > li{
		list-style:square;
		margin-left: 1.1em;
	}

	.menu_top_sub{
		width: 100%;
		padding: 0px;
		margin:0px;
	}
	.menu_top_sub > li{
		float: left;
		list-style: none;
		/*padding: 0.8em;*/
		padding-right: 1.4em;
		padding-left: 1.4em;
		margin: 0px;
		width: 25%;
	}
	.menu_top{
		width: 100%;
		padding: 0px;
		margin:0px;
  		/*font-size: 0.9375em;*/
  		font-size: 1em;
	}

	.menu_top > li{
		float: left;
		list-style: none;
		color: #FFFFFF;
		padding: 0.8em;
		padding-right: 1em;
		padding-left: 1em;
		margin: 0px;
	}

	.menu_top > li > a{
		color: #FFFFFF;
		font-weight: 500;
	}

	.menu_top > li > a:hover{
		color: #ffd21d;
		text-decoration: none;
	}

	.menu_top li:hover .div_menu_top_sub{
		display: block;
	}


	.div_menu_top_sub{
		position: absolute;
		display: none;
		margin-top: 0.8em;
		padding: 1em;
		left: 0;
		width: 100%;
		min-height: auto;
		background-color: #FFFFFF;
		color: #333;
		border-radius: 0px 0px 8px 8px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	}


	.font_black{
	  color: #212529;
	  font-size: 1.1em;
	}

	.font_black:hover{
	  color: #ffd21d;
	  text-decoration: none;
	}


</style>