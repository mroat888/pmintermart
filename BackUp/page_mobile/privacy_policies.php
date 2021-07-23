<?php include_once("page_mobile/menu_header.php"); flush();?>

<div class="container-fluid">
	<div class="row">
		<div class="container">

            <div class="row" style="margin-top: 15px; margin-bottom: 15px;">
				<div class="col-12" style="margin :2rem 0 2rem 0;">
					<?php echo $header; ?>
				</div>
                <div class="col-12 ucontent">
					<?php echo $content; ?>
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

<?php include_once("page_mobile/footer.php");?>