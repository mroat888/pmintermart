
<?php include_once("page_desktop/header.php"); flush();?>


<script>
    //document.getElementById("myDropdown").classList.toggle("show");
</script>

<?php include_once("banner_slide.php"); ?>

<div class="container-fluid">
	<div class="row">
        <div class="container">
            <?php include_once("index_widget_section1.php"); ?>
        </div>
  </div>

</div>

<div class="container-fluid" style="margin-top:3em; margin-bottom:3em;">
  <div class="row">
      <div class="container">
            <div class="row" style="text-align:center; margin-top:1em; margin-bottom:1em;">
              <div class="col-12">
                  <img src="<?php echo URL;?>images/banner-hot-sale.jpg" style="max-width: 100%;">
              </div>
            </div>
            <div class="row">
                <div class="col-12">
                  <?php include_once("index_hotdeal.php"); ?>
                </div>
            </div>
      </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
        <div class="container">
            <div class="row" style="margin-top:1em; margin-bottom:1em;">
                <div class="col-6">
                  <a href="<?php URL?>category/5/ไดร์เป่าผม/1/">
                  <img src="<?php echo URL;?>images/banner-wall-mounted-hair-dryer.jpg" style="max-width:100%; border:solid 1px #ece8e5; border-radius: 6px;" alt="ไดร์เป่าผมติดผนัง Elegance">
                  </a>
                </div>
                <div class="col-6">
                  <a href="<?php URL?>category/4/ตู้เย็น มินิบาร์/1/">
                  <img src="<?php echo URL;?>images/banner-minibar.jpg" style="max-width:100%; border:solid 1px #ece8e5; border-radius: 6px;" alt="Minibar"></a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row" style="text-align:center; margin-top:3em; ">
              <div class="col-12">
                <img src="<?php echo URL;?>images/banner-best-seller.jpg" style="max-width: 100%;">
              </div>
            </div>
            <div class="row" style="margin-top:3em; margin-bottom:3em;">
                <div class="col-12">
                  <div>
                    <?php include_once("index_topview.php"); ?>
                  </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row" style="text-align:center; margin-top:1em; ">
              <div class="col-12">
                <img src="<?php echo URL;?>images/banner-arrival.jpg" style="max-width: 100%;">
              </div>
            </div>
            <div class="row" style="margin-top:1em; margin-bottom:3em;">
                <div class="col-12">
                    <?php include_once("index_products_update.php"); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include_once("page_desktop/footer.php");?>