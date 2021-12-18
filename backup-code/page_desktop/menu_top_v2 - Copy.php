<div class="container-fluid bg_blue">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="menu_top">
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
					<li><a href="<?php echo $permalink_group; ?>"><?php echo $lv1_name; ?></a>
						<div class="div_menu_top_sub">
						<div class="row">
							<div class="flex-container">
			<?php       
						$array_type_lv2 = array(
							":param_status" => "Y", 
							":param_type_lv1" => $record_type_lv1['id']
						);
						$str_type_lv2 = "select id, name, name_en from producttype_level2 
						where status = :param_status and id_producttype_level1 = :param_type_lv1 
						order by name";
						$result_type_lv2 = $conn->prepare($str_type_lv2);
						$result_type_lv2->execute($array_type_lv2);
						while($record_type_lv2 = $result_type_lv2->fetch(PDO::FETCH_ASSOC)){
							$lv2_name = $record_type_lv2['name'];
							$permalink_collection = URL."collection/".$record_type_lv2['id']."/".$lv2_name."/"."1/";

							$array_type_lv3 = array(
								":param_status" => "Y", 
								":param_type_lv2" => $record_type_lv2['id']
							);
			?>					
								<div>	
									<a href="<?php echo $permalink_collection; ?>">
										<span class="font_black" 
										style="font-weight: bold;">
										<?=$lv2_name;?>
										</span>
									</a>
								<ul style="list-style: none;" class=" ml-2" >
			<?php
							$str_type_lv3 = "select id, name, name_en from producttype_level3 
							where status = :param_status and id_producttype_level2 = :param_type_lv2 
							order by name";
							$result_type_lv3 = $conn->prepare($str_type_lv3);
							$result_type_lv3->execute($array_type_lv3);
							while($record_type_lv3 = $result_type_lv3->fetch(PDO::FETCH_ASSOC)){
								$lv3_name = $record_type_lv3['name'];
								$permalink_category = URL."category/".$record_type_lv3['id']."/".$lv3_name."/"."1/";
			?>
								<li>
									<a href="<?php echo $permalink_category; ?>">
										<span class="font_black"><?php echo $lv3_name; ?></span>
									</a>
								</li>
			<?php
							}
			?>	
								</ul>
								</div>
			<?php
						}
			?>
							</div>
						</div>
						</div>
			<?php
				}
			?>
						</ul>
					</li>
				</ul>

			</div>
		</div>
	</div>
</div>



<style>

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
		padding: 0.8em;
		padding-right: 1.4em;
		padding-left: 1.4em;
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

	.flex-container{
		width: 100%;
		height: : 100%;
    	display: flex;
    	flex-direction: row;
    	flex-wrap: wrap;
    	justify-content: space-between;
		align-content: flex-start;
		align-items: baseline;
	}

	.flex-container > div{
		flex: auto ;
		/*flex: 1 1 auto;*/
		width: 25%;
		padding: 15px;
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