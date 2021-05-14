<div class="" style="margin-top:15px; margin-bottom:5px;">
<nav>
  <ul class="pagination">
    <?php
        $url_pagination = $url_pagination;
        $result_pagination  = $conn->prepare($_SESSION['ss_str']); 
        $result_pagination ->execute($_SESSION['ss_param']);        
        $total_record = $result_pagination ->rowCount();
        $total_page = ceil($total_record/$pagesize) ;  // หาจำนวนหน้า
    ?>
    
    <?php
        /*---- Credit -- การทำ pagination จากเว็บ
            http://www.byperth.com/2015/02/01/wordpress-custom-pagination/?>
        */     
        $range = 3;
        $showitems = ($range * 2)+1; 
        //if($nowpage > 1){
    ?> 
    <?php   if($nowpage > 2 && $nowpage > $range+1 && $showitems < $total_page){   ?>
                <li>
                    <a href="<?php echo $url_pagination; ?>&nowpage=<?php echo 1; ?>" aria-label="Previous">
                        <span aria-hidden="true"><<</span>
                    </a>
                </li>
    <?php   }    ?> 
    <?php   if($nowpage > 1 && $showitems < $total_page){   ?>
                <li>
                    <a href="<?php echo $url_pagination; ?>&nowpage=<?php echo $nowpage-1; ?>" aria-label="Previous">
                        <!--<span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span>-->
                        <span aria-hidden="true"><</span>
                    </a>
                </li>
    <?php   }    ?>

    <?php
        for($i=1;$i<=$total_page;$i++) { 
            if(( !($i >= $nowpage+$range+1 || $i <= $nowpage-$range-1) || $total_page <= $showitems )){
            //if (( ($i < $nowpage+$range+1 && $i > $nowpage-$range-1) && $total_page > $showitems )){
                if($nowpage == $i){   
    ?>
                    <li class="active">
                        <a href="<?php echo $url_pagination; ?>&nowpage=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
    <?php       }else{    ?>
                    <li>
                        <a href="<?php echo $url_pagination; ?>&nowpage=<?php echo $i; ?>"><?php echo $i?></a>
                    </li>
    <?php
                }
            }
        }	
     ?>

    <?php   if($nowpage < $total_page && $showitems < $total_page){    ?>
                <li>
                    <a href="<?php echo $url_pagination; ?>&nowpage=<?php echo $nowpage + 1; ?>" aria-label="Next">
                        <span aria-hidden="true">></span>
                    </a>
                </li>
    <?php   }   ?>
    <?php   if($nowpage < $total_page-1 &&  $nowpage+$range-1 < $total_page && $showitems < $total_page){  ?>
                <li>
                    <a href="<?php echo $url_pagination; ?>&nowpage=<?php echo $total_page; ?>" aria-label="Next">
                        <span aria-hidden="true">>></span>
                    </a>
                </li>
    <?php   }   ?>
    <?php  
        //}   
    ?>
    </ul>
</nav>
</div>