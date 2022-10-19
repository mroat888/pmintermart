<?php include_once("page_desktop/header.php"); flush();?>
<script>
    //document.getElementById("myDropdown").classList.toggle("show");
</script>

<div class="container-fluid">
	<div class="row">
		<div class="container">
			<div class="row" style="margin-top: 15px;">
				<div class="col-12">
					<img src="<?php echo URL;?>/images/banner-header-page.jpg" style="max-width:100%;" 
					alt="PM Intermart">
					<div style="position: absolute; top:35%; left: 50px;">
						<h2 style="color:white;">ลูกค้าของเรา</h2>
					</div>
				</div>
			</div>
			<div class="row" style="margin-top:50px; margin-bottom: 25px;">
				<div class="col-12">

					<!-- //* จบแก้ไขส่วน Content ได้ -->


				    <div class="row" style="margin-top:40px; margin-bottom:40px;">
                        <ul class="nav_our nav nav-tabs">
                            <?php
                                    while($record_client_type = $result_client_type->fetch(PDO::FETCH_ASSOC)){

                                        if($lang == "en"){
                                            $client_type_name = $record_client_type['name_en'];
                                            $url_type = URL."client.php?lang=en&ctp=".$record_client_type['id'];
                                        }else{
                                            $client_type_name = $record_client_type['name_th'];
                                            $url_type = URL."client.php?ctp=".$record_client_type['id'];
                                        }
                                        if($client_type == $record_client_type['id']){
                            ?>                       
                                            <li class="nav-item">
                                                <a href="<?=$url_type?>" class="nav-link active">
                                                    <span><?=$client_type_name?></span>
                                                </a>
                                            </li>
                                            
                            <?php		}else{   
                            ?>
                                            <li class="nav-item">
                                                    <a href="<?=$url_type?>" class="nav-link">
                                                        <?=$client_type_name?>
                                                    </a>
                                            </li>
                                            
                            <?php		
                                        }
                                    }		
                            ?>
                        </ul>
				    </div>

<style>
    .nav_our li{
        margin-left : 1.9rem;
    }

</style>

				    <div class="row" style="margin-top:40px; margin-bottom:40px;">
                        <?php  
                                $param_array_client = array(':param_client_type'=>$client_type);
                                $str_client = "select * from client where status='Y' and client_type = :param_client_type order by name_th";
                                $result_client = $conn->prepare($str_client);
                                $result_client->execute($param_array_client);
                                while($record_client = $result_client->fetch(PDO::FETCH_ASSOC)){ 
                                    if($lang == "en"){
                                        $img_title = $record_client['name_en'];
                                    }else{
                                        $img_title = $record_client['name_th'];
                                    }
                        ?>
                                    <div class="col-md-2" style="margin-top:5px;">
                                        <div style="text-align:center;">
                                            <img src="<?php echo URL;?>img_our_customer/<?=$record_client['id']?>-1.jpg" 
                                            style="max-width:100%;" alt="<?=$img_title?>" title="<?=$img_title?>">
                                        </div>
                                        <div style="height:50px; overflow:hidden; text-align:center;">
                                            <span style="font-size:12px;"><?php echo $img_title; ?></span>
                                        </div>
                                    </div>
                        <?php   
                                }       
                        
                        ?>
				    </div>
				    <!-- //* จบแก้ไขส่วน Content ได้ -->

				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once("page_desktop/footer.php");?>