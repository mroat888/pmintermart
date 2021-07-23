<!-- <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav> -->

<div class="" style="margin-top:15px; margin-bottom:5px;">
<nav>
  <ul class="pagination">
    <?php
       // $get_pagination = "lang=$lang&search=$search&typ1=$typ1&typ2=$typ2&typ3=$typ3";
        

        $result_product = $conn->prepare($str_product_name);
        $result_product->execute($array_param_product_name);        
        $total_record = $result_product->rowCount();
        $total_page = ceil($total_record/$pagesize) ;  // หาจำนวนหน้า
        //echo $total_record ."->". $total_page.$pagesize;
        $url_pagination = URL.$get_pagination;

    ?>
    
    <?php
        /*---- Credit -- การทำ pagination จากเว็บ
            http://www.byperth.com/2015/02/01/wordpress-custom-pagination/?>
        */     
        $range = 2;
        $showitems = ($range * 2)+1; 
        //if($nowpage > 1){
    ?> 
    <?php   if($nowpage > 2 && $nowpage > $range+1 && $showitems < $total_page){   ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo $url_pagination; ?><?php echo 1; ?>/" aria-label="Previous">
                        <span aria-hidden="true"><<</span>
                    </a>
                </li>
    <?php   }    ?> 
    <?php   if($nowpage > 1 && $showitems < $total_page){   ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo $url_pagination; ?><?php echo $nowpage-1; ?>/" aria-label="Previous">
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
                    <li class="page-item active">
                        <a class="page-link" href="<?php echo $url_pagination; ?><?php echo $i; ?>/"><?php echo $i; ?></a>
                    </li>
    <?php       }else{    ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo $url_pagination; ?><?php echo $i; ?>/"><?php echo $i?></a>
                    </li>
    <?php
                }
            }
        }	
     ?>

    <?php   if($nowpage < $total_page && $showitems < $total_page){    ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo $url_pagination; ?><?php echo $nowpage + 1; ?>/" aria-label="Next">
                        <span aria-hidden="true">></span>
                    </a>
                </li>
    <?php   }   ?>
    <?php   if($nowpage < $total_page-1 &&  $nowpage+$range-1 < $total_page && $showitems < $total_page){  ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo $url_pagination; ?><?php echo $total_page; ?>/" aria-label="Next">
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