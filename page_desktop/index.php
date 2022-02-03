<?php   //if($devices == "mobile"){   ?>
            <div><?php //include_once("page_mobile/menu_header.php"); ?></div>
<?php  // }else{     ?>
            <div><?php //include_once("page_desktop/header.php"); flush();; ?></div>
<?php   //}   ?>

<?php include_once("page_desktop/header.php"); flush();?>

<div class="container-fluid" style="margin-top:1.5em; margin-bottom:1em;">
  <div class="row">
      <div class="container">
            <div class="row">
            	  <div class="col-md-8 col-12">
            		  <?php include_once("page_desktop/banner_slide_isonline.php");?>
                </div>
                <?php   if($devices == "desktop"){   ?>
                <div class="col-md-4 col-12">
                  <div class="flex-banner">
                    <div class="row">
                      <div class="col-sm-4 col-md-12" >
                        <div class="container_overlay">
                          <?php
                            $permalink_bestseller = URL."tags/bestseller/1/";
                          ?>
                          <a href="<?php echo $permalink_bestseller;?>">
                          <img src="<?php echo URL;?>images/aa1-01.jpg" style="max-height: 100%;">
                            <div class="overlay_slideleft" style="background-color: #ffc54e;">
                              <div class="overlay_text">สินค้าขายดี</div>
                            </div>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="row" style="margin-top: 1.48em;">
                      <div class="col-sm-4 col-md-12" style="height: 11em; overflow: hidden;">
                        <div class="container_overlay">
                          <?php
                            $permalink_arrival = URL."tags/arrival/1/";
                          ?>
                          <a href="<?php echo $permalink_arrival;?>">
                            <img src="<?php echo URL;?>images/aa1-02.jpg" style="max-height: 100%;">
                            <div class="overlay_slideleft" style="background-color: #008CBA;">
                              <div class="overlay_text">สินค้ามาใหม่</div>
                            </div>
                          </a>
                        </div>
                      </div>
                  </div>
                  <div class="row" style="margin-top: 1.48em;">
                		<div class="col-sm-4 col-md-12">
                      <div class="container_overlay">
                        <?php
                          $permalink_hotsale = URL."products_hotsale.php";
                        ?>
                        <a href="<?php echo $permalink_hotsale;?>">
                          <img src="<?php echo URL;?>images/aa1-03.jpg" style="max-height: 100%;">
                          <div class="overlay_slideleft" style="background-color: #e82324;">
                              <div class="overlay_text">สินค้าจัดรายการ</div>
                            </div>
                        </a>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
                <?php   }  ?>
            </div>
      </div>
  </div>
</div>
<!-- <div class="container-fluid" style="margin-top:3em; margin-bottom:3em;">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-12">
          <a href="<?php echo URL;?>delivery.php">
					 <img src="<?php echo URL;?>images/banner-shipping.jpg" style="max-width: 100%;">
          </a>
				</div>
			</div>
		</div>
	</div>
</div> -->

<div class="container-fluid" style="margin-top:5em; margin-bottom:5em;">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2>หมวดเฟอร์นิเจอร์และของแต่งบ้าน</h2>
				</div>
			</div>
			<div class="row">
          <div class="col-12">
            <?php include_once("page_desktop/index_group_products.php"); ?>
          </div>
      </div>
		</div>
	</div>
</div>

<?php include_once("index_content.php");?>

<div class="container-fluid">
	<div class="row">
		<div class="container mb-5">
      <?php include_once("reference_logo.php");?>
    </div>
  </div>
</div>

<?php include_once("page_desktop/footer.php"); ?>

<style type="text/css">
.flex-banner{
    height: 98%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.container_overlay {
    position: relative;
    width: 100%;
    height: 11em; 
    overflow: hidden;
}
.overlay_slideleft{
    position: absolute;
    bottom: 0;
    left: 100%;
    right: 0;
    overflow: hidden;
    width: 0;
    height: 100%;
    transition: .5s ease;
    background: rgba(0, 0, 0, 0.5);
}
.overlay_slideright{
    position: absolute;
    bottom: 0;
    right: 100%;
    left: 0;
    overflow: hidden;
    width: 0;
    height: 100%;
    transition: .5s ease;
}
.container_overlay:hover .overlay_slideleft {
    width: 100%;
    opacity: 0.5;
    left: 0;
}

.container_overlay:hover .overlay_slideright {
    width: 100%;
    opacity: 0.5;
    right: 0;
}

.overlay_text {
    color: white;
    /*color: #000000;*/
    font-size: 20px;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    white-space: nowrap;
    opacity: 1;
}

</style>