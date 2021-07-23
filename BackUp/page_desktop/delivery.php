<?php include_once("page_desktop/header.php"); flush();?>
<script>
    //document.getElementById("myDropdown").classList.toggle("show");
</script>

<div class="container-fluid">
	<div class="row">
		<div class="container">
			<div class="row" style="margin-top: 15px;">
				<div class="col-12">
					<!-- <div style="background-image: url('images/banner-header-page.jpg'); height: 150px;">
					</div> -->
					<img src="<?php echo URL;?>/images/banner-header-page.jpg" style="max-width:100%;" 
					alt="PM Intermart">
					<div style="position: absolute; top:35%; left: 50px;">
						<h2 style="color:white;">การจัดส่ง</h2>
					</div>
				</div>
			</div>
			<div class="row" style="margin-top:50px; margin-bottom: 25px;">
				<div class="col-12">

					<!-- //* จบแก้ไขส่วน Content ได้ -->
					<!-- <div class="" style="margin-top:40px;">
				        <div class="col-6">
				            <div style="margin-top:10%;">
								<div>
								    <h2 class="font_header" style="font-size:35px; font-weight: 500;">
								    <?php echo $delivery_free_1; ?></h2>
								</div>
								<div style="margin-top:10px;">
								    <span class="text_color_header" style="font-size:23px;">
								    <?php echo $delivery_free_detial_1; ?></span>
								</div>
							</div>
				        </div>
				        <div class="col-6">
				        	<img src="<?php echo URL_IMG; ?>images/delivery-img1.jpg" style="max-width:100%;">
				        </div>
				    </div>     -->
				    <div class="row" style="margin-top:40px; margin-bottom:40px;">
				        <div class="col-6">
				            <div style="margin-top:10%;">
								<div>
				                    <h2 class="font_header" style="font-size:35px; font-weight: 500;">
								    <?php echo $delivery_free_1; ?></h2>
								</div>
								<div style="margin-top:10px;">
								    <span class="text_color_header" style="font-size:23px;">
								    <?php echo $delivery_free_detial_1; ?></span>
								</div>
							</div>
				        </div>
				        <div class="col-6"><img src="<?php echo URL_IMG; ?>images/delivery-img1.jpg" style="max-width:100%;"></div>
				    </div>
				    <div class="row" style="margin-top:40px;">
				        <div class="col-6"><img src="<?php echo URL_IMG; ?>images/delivery-img2.jpg" style="max-width:100%;"></div>
				        <div class="col-6">
				            <div style="margin-top:10%;">
								<div>
				                    <h2 class="font_header" style="font-size:35px; font-weight: 500;">
								    <?php echo $delivery_free_2; ?></h2>
								</div>
								<div style="margin-top:10px;">
								    <span class="text_color_header" style="font-size:23px;">
								    <?php echo $delivery_free_detial_2; ?></span>
								</div>
							</div>
				        </div>
				    </div> 
				    <div class="row" style="margin-top:40px; margin-bottom:40px;">
				        <div class="col-6">
				            <div style="margin-top:10%;">
								<div>
				                    <h2 class="font_header" style="font-size:35px; font-weight: 500;">
								    <?php echo $delivery_free_3; ?></h2>
								</div>
								<div style="margin-top:10px;">
								    <span class="text_color_header" style="font-size:23px;">
								    <?php echo $delivery_free_detial_3; ?></span>
								</div>
							</div>
				        </div>
				        <div class="col-6"><img src="<?php echo URL_IMG; ?>images/delivery-img3.jpg" style="max-width:100%;"></div>
				    </div>


					<div class="row" style="margin-top:40px; margin-bottom:40px;">
						<div class="col-12 ucontent">
							<?php echo $content_2; ?>
						</div>
					</div>
				    <!-- //* จบแก้ไขส่วน Content ได้ -->


				</div>
			</div>
		</div>
	</div>
</div>

<style>
    .ucontent ul{
        margin:0;
        padding:0;
    }

    .ucontent ul > li{
        margin-left : 2rem;
    }
</style>

<?php include_once("page_desktop/footer.php");?>