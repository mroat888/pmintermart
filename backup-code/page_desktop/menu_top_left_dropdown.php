<style>
.dropbtn {
	  /*background-color: #3498DB;
  	background-color: #ffd21d;*/
    background-color: #edca00;
  	color: black;
  	padding: 1em;
  	/*font-size: 0.9375em; /* 15px */
    font-size: 0.9375em; /* 15px */
  	border: none;
  	cursor: pointer;
  	width: 100%;
  	min-width: 16.5em; /*60px*/
    border-radius: 0.375em 0.375em 0px 0px;
}

.dropbtn:hover, .dropbtn:focus {
    /*background-color: #2980B9;*/
}
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #ffffff;
    border:solid 0.125em #ffd21d;
    border-radius: 0px 0px 0.375em 0.375em;
    min-width: 3.75em; /*60px*/
    min-width: 15.5em; /*60px*/
    box-shadow: 0px 0.5em 1em 0px rgba(0,0,0,0.2);
    z-index: 2;
    width: 100%
}

.dropdown-content-sub{
    display: none;
    position: absolute;
    background-color: #ffffff;
    border:solid 0.125em #ffd21d;
    border-left-color: #ffd21d;
    border-radius: 0px 0.375em 0.375em 0px;
    min-width: 3.75em; /*60px*/
    box-shadow: 0px 0.5em 1em 0px rgba(0,0,0,0.2);
    z-index: 2;
    width: 100%
}

.dropdown-content a {
    /*color: black;*/
    color: #222;
    padding: 0.75em 1em;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {
  background-color: #f5f5f5;
  color: #ffd21d;
  /*text-decoration: none;*/
}


.show {display: block;}
.hide {display: none;}

.dropdown-content{
    width: 100%;
    padding: 0px;
    margin: 0px;
}

/*.dropdown li::before {
  content: "\00BB"; 
  position: absolute;
  /*left: 0;*
}

.dropdown-content > li::before {
  margin-left: 1em;
  margin-top: 0em;
}

.dropdown-content-sub > li::before {
  margin-left: -0.5em;
}*/

.dropdown-content > li{
    list-style: none;
    width: 100%;
}

.dropdown-content > li > a{
    color: #222;
}

.dropdown-content > li :hover , .dropdown-content-sub li :hover{
    /*background-color: #ddd;*/ 
}

.dropdown-content > li:hover .dropdown-content-sub , .dropdown-content-sub:hover{
    display: block;
}

.dropdown-content-sub{
    display: none;
    padding: 0px;
    margin: 0px;
    margin-top: -3em; /*-50px;*/
    margin-left: 15.2em;
}

.dropdown-content-sub li{
    list-style: none;
    padding: 0px;
    /*margin-left: 2em;*/
}


</style>

<?php
    $str_producttype_level1 = "select * from producttype_level1 where status = 'Y' order by id ";
    $result_producttype_level1 = $conn->prepare($str_producttype_level1);
    $result_producttype_level1->execute();
?>

<div class="dropdown" style="width: 100%">
    <button onclick="myFunction()" class="dropbtn" style="text-align: left;">
        <i class="fas fa-align-justify"></i>
        &nbsp;&nbsp;&nbsp;&nbsp;Shop By Category&nbsp;&nbsp;&nbsp;&nbsp;
        <i class="fa fa-caret-down"></i>
    </button>
    <ul id="myDropdown" class="dropdown-content">
      	<?php
        while($record_menu_topleft = $result_producttype_level1->fetch(PDO::FETCH_ASSOC)){
          $link_product_name = $record_menu_topleft['name'];
          $permalink_group = URL."group/".$record_menu_topleft['id']."/".$link_product_name."/"."1/";
      	?>
          	<li><a href="<?php echo $permalink_group; ?>"><?php echo $record_menu_topleft['name'];?></a>
            <?php
              	$array_count_level2 = array(':param_type1_id' => $record_menu_topleft['id']);
              	$count_level2 = "select COUNT(id) AS count_cus_total from producttype_level2 where id_producttype_level1 = :param_type1_id and status = 'Y'";
              	$result_count_level2 = $conn->prepare($count_level2);
              	$result_count_level2->execute($array_count_level2);
              	$record_count_level2 = $result_count_level2->fetch(PDO::FETCH_ASSOC);
              	if($record_count_level2['count_cus_total'] > 0){ 
	                $array_param_type1 = array(
	                  ':param_type1_id' => $record_menu_topleft['id']
	                );
	                $str_producttype_level2 = "select * from producttype_level2 
	                where id_producttype_level1  = :param_type1_id and status = 'Y' order by id ";
	                $result_producttype_level2 = $conn->prepare($str_producttype_level2);
	                $result_producttype_level2->execute($array_param_type1);
            ?>
                <ul class="dropdown-content-sub"> 
                  <?php
                    while($record_producttype_level2 = $result_producttype_level2->fetch(PDO::FETCH_ASSOC)){
                      $link_product_name = $record_producttype_level2['name'];
                      $permalink = URL."category/".$record_producttype_level2['id']."/".$link_product_name."/"."1/";
                  ?>
                      <a href="<?php echo $permalink; ?>"><li><?php echo $link_product_name;?></li></a>
                  <?php
                    }
                  ?>
                </ul>
            <?php
              	}
            ?>
          	</li>
      <?php
        }
      ?>

  </ul>
</div> 

<script>
    /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */
    function myFunction() {
      	document.getElementById("myDropdown").classList.toggle("show");
      	/*document.getElementById("myDropdown").classList.toggle("hide");*/
    }

</script>