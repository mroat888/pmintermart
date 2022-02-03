
<?php   if($devices == "mobile"){   ?>
            <div><?php include_once("page_mobile/menu_header.php"); ?></div>
<?php   }else{     ?>
        <?php include_once("page_desktop/header_widget.php"); ?>
        <!-- เมนูเก่า -->
        <?php //include_once("page_desktop/menu_top.php"); ?>
        <?php //include_once("page_desktop/header_search_widget.php"); ?>

        <?php include_once("page_desktop/header_search_widget_v2.php"); ?>
<?php   }   ?>