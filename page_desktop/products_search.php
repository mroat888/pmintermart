<?php include_once("page_desktop/header.php"); flush();?>
<script>
    document.getElementById("myDropdown").classList.toggle("show");
</script>

<div class="container-fluid">
	<div class="row">
		<div class="container">
			<div class="row">
				<!-- <div class="col-3">
					
				</div> -->
				<div class="col-12" style="min-height: 500px;">
					<div class="row" style="margin-top: 25px;">
						<div class="col-12">
							<h1><?php echo $keyword; ?></h1>
						</div>
					</div>
					<div class="row">
                        <?php 
                            // $result_product_name มาจากหน้ารวม products_search  (ใช้รวมกัน)
                            while($record_product_name = $result_product_name->fetch(PDO::FETCH_ASSOC)){ 
                        ?>
                                <div class="col-3" style="margin-bottom:0.1em; padding: 0.5em; ">
                                    <?php include("page_desktop/products_predetail.php");?>
                                </div>
                        <?php 
                            } 
                            flush();
                        ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once("page_desktop/footer.php");?>