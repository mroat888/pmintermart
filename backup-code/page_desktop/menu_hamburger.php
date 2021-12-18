<style>
.sidenav {
    height: 100%;
    width: 0;
    padding: 0px;
    position: fixed;
    z-index: 1000;
    top: 0;
    left: 0;
    /*background-color: #111;*/
    background-color: #2959c2;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    text-decoration: none;
    /*font-size: 1.3em;*/
    /*color: #818181;*/
    color: #ffd21d;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #FFFFFF;
    /*color: #ffd21d;*/
    text-decoration: none;
}   

.sidenav .closebtn {
    position: absolute;
    font-size: 2.8em;
}

.closebtn {
    position: absolute;
    top: 0em;
    right: 0.5em;
}

.backbtn{
    position: absolute;
    top: 2.2em;
    left: 1.3em;
    font-size: 1.5em;
}

.closebtn:hover {
    color: #ffd21d;
}

.sidenav_sub{
    padding: 2em 2em 2em 2em;
}

.sidenav2{
    left: 250px;
    width: 0;
}

.dropdown-content-sub{
    display: none;
    position: fixed;
    color: #ffd21d;
    width: 250px;
    left:275px;
    top: 93px;
    font-weight:200;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}

.hamburgermenu .hamburgermenu_group{
    margin: 0px;
    padding: 0px;
    /*margin-left: -2.5em;*/
}

.hamburgermenu a li , .hamburgermenu li{
    list-style: none;
    font-size: 1.3em;
    padding-top:0.2em;
    padding-bottom: 0.2em;
}

.hamburgermenu_group a li , .hamburgermenu_group li {
    list-style: none;
    font-size: 1em;
    padding-top:0.2em;
    padding-bottom: 0.2em;
}

.arrow {
    border: solid #ffffff;
    border-width: 0 2px 2px 0;
    display: inline-block;
    padding: 3px;
    margin-left: 10px;
}

.right {
    transform: rotate(-45deg);
    -webkit-transform: rotate(-45deg);
}

.arrow:hover{
    border: solid #FFFFFF;
    border-width: 0 2px 2px 0;
    transform: rotate(-45deg);
    -webkit-transform: rotate(-45deg);
    cursor: pointer;
}

.hamburgermenu_group > li:first-child, .hamburgermenu_group > li:last-child{
    font-weight: bold;
    font-size: 1em;
}


</style>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <div id="mySidenav" class="sidenav">
        <div class="sidenav_sub">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <ul class="hamburgermenu">
            <a href="javascript:void(0);" onclick="openNavSub()"><li>สินค้าทั้งหมด</li></a>
            <a href="<?php echo URL;?>about.php"><li>เกี่ยวกับเรา</li></a>
            <a href="<?php echo URL;?>howtobuying.php"><li>วิธีการสั่งซื้อ</li></a>
            <a href="<?php echo URL;?>howtopay.php" class="font_white_yellow"><li>การชำระเงิน</li></a>
            <a href="<?php echo URL;?>delivery.php"><li>การจัดส่ง</li></a>
            <a href="<?php echo URL;?>content.php"><li>บล๊อก</li></a>
            <a href="<?php echo URL;?>contactus.php"><li>ติดต่อเรา</li></a>
        </ul>
    </div>
      
    </div>
    <div id="mySidenav_sub2" class="sidenav sidenav2">
    <div id="mySidenav_sub" class="sidenav">
        <div class="sidenav_sub">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNavSub()">&times;</a>
        <a href="javascript:void(0)" class="backbtn" onclick="closeandOpenNav()"><i class="fas fa-arrow-left"></i></a>
        <?php
            $str_producttype_level1 = "select * from producttype_level1 where status = 'Y' order by ordinal_number, id ";
            $result_producttype_level1 = $conn->prepare($str_producttype_level1);
            $result_producttype_level1->execute();
        ?>
        <ul class="hamburgermenu_group">
        <?php
            while($record_menu_topleft = $result_producttype_level1->fetch(PDO::FETCH_ASSOC)){
            $link_product_name = $record_menu_topleft['name'];
            $permalink_group = URL."group/".$record_menu_topleft['id']."/".$link_product_name."/"."1/";
        ?>
            <!--<a href="<?php //echo $permalink_group; ?>">-->
                <li>
                    <span style="display:inline;">
                        <a href="<?php echo $permalink_group; ?>" style="display:inline">
                            <?php echo $record_menu_topleft['name'];?>
                        </a>
                    </span>
   
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
                            where id_producttype_level1  = :param_type1_id and status = 'Y' order by name, ordinal_number, id ";
                            $result_producttype_level2 = $conn->prepare($str_producttype_level2);
                            $result_producttype_level2->execute($array_param_type1);
                    ?>
                        <span style="display:inline; top:0px; right:0px;">
                            <i class="arrow right" onclick="openNavSub2(<?php echo $record_menu_topleft['id'];?>);"></i>
                        </span>
                    <ul id="dropdown-content-sub_<?=$record_menu_topleft['id'];?>" class="dropdown-content-sub"> 
                        <?php
                            while($record_producttype_level2 = $result_producttype_level2->fetch(PDO::FETCH_ASSOC)){
                            $link_product_name = $record_producttype_level2['name'];
                            $permalink = URL."collection/".$record_producttype_level2['id']."/".$link_product_name."/"."1/";
                        ?>
                            <a href="<?php echo $permalink; ?>"><li><?php echo $link_product_name;?></li></a>
                        <?php
                            }
                        ?>
                        <!-- <img src="<?php //echo URL;?>images-test/stock-photo-modern-iron-and-shirt-on-board-578035165.jpg" 
                        style="max-width: 100%; padding-right:40px; padding-top:40px;"> -->
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
    </div>
    </div>

    

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("mySidenav_sub").style.width = "0";
    document.getElementById("mySidenav_sub2").style.width = "0";
    closeDropdownContentSub();
}

function openNavSub() {
    document.getElementById("mySidenav_sub").style.width = "260px";
    document.getElementById("mySidenav").style.width = "0";
}

function closeNavSub() {
    document.getElementById("mySidenav_sub").style.width = "0";
    document.getElementById("mySidenav_sub2").style.width = "0";
    closeDropdownContentSub();
}

function closeandOpenNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("mySidenav_sub").style.width = "0";
    document.getElementById("mySidenav_sub2").style.width = "0";
    closeDropdownContentSub();
}

function openNavSub2(id) {
    closeDropdownContentSub();
    document.getElementById("mySidenav_sub2").style.width = "260px";  
    var x = document.getElementById("dropdown-content-sub_"+id);

    if (x.style.display === "none" || x.style.display == "") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function closeDropdownContentSub(){
    var y = document.getElementsByClassName("dropdown-content-sub");
    var i;
    for (i = 0; i < y.length; i++) {
        y[i].style.display = "none";
    }
}

</script>