<?php include_once("page_desktop/header.php"); flush();?>

<div class="container-fluid" style="margin-top:2em; margin-bottom:2em;">
    <div class="row">
        <!-- //* แก้ไขส่วน Content ได้ -->
 <div class="container">
    <div class="row">
        
        <div class="col-9">
            <div class="row">
                <div class="col-12" style="margin-top:15px; margin-bottom:15px;">
                    <h1 style="padding-top:30px; padding-bottom:30px;">
                        <?php echo $record_wp_posts['post_title']; ?>
                    </h1>
                </div>
                <div class="col-12" style="margin-top:15px; margin-bottom:15px;">
                    <img src="<?php echo $image_path; ?>" 
                    alt="<?php echo $record_wp_posts['post_title']; ?>" 
                    style="max-width: 100%;">
                </div>
                <div class="col-12" style="margin-top:15px; margin-bottom:55px;">
                    <div class="span_content wp_content" style="font-size:1.2em;">
                        <?php echo $record_wp_posts['post_content']; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="row">
                <div class="col-12 sidebar-banner desktop_only" style="text-align:right; margin-top:10px; margin-left:10px;">
                    <div style="text-align:right; padding:0px; width:325px; border:0px #548e9b solid">
                        <?php //include_once("content_menu_right.php"); ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- //* จบแก้ไขส่วน Content ได้ -->
    </div>
</div>

<style>
    .wp_content img{
        max-width:100%;
        max-height:100%;
    }
</style>

	
<?php include_once("page_desktop/footer.php"); ?>