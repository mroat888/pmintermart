<?php
    if($lang== "en"){
        $footer_box1 = "We are importer and distributer wine coolers, Small refrigerator under manufacturing 
        standard and environmentally friendly products. Welcome service and consultation for
        hotel, restaurant, entertainment venue, counter bar, wine display of beverage company and wine tasteful drinkers house.";
        
        $footer_box2 = "Contact";
        $footer_box2_com = "PM Intermart Co., Ltd.";
        $footer_box2_1 = "116/3 Nonthaburi Rd. T.Thasai A.Muang, Nonthaburi 11000";
    }else{
        $footer_box1 = "เราคือผู้นำเข้าและจัดจำหน่าย ตู้ไวน์โรงแรม 
        ตู้เย็นขนาดเล็ก ภายใต้มาตราฐานผลิตภัณฑ์
        ที่เป็นมิตรสิ่งแวดล้อม ยินดีบริการ ให้คำปรึกษา 
        ลูกค้าภัตตาคาร สถานบันเทิง เคาเตอร์บาร์ 
        โรงแรม บริษัทผู้ค้าไวน์ ใช้ในการออกร้าน และ 
        บ้านพักอัครสถานผู้ดื่มไวน์ทั่วไป";

        $footer_box2 = "ติดต่อเรา";
        $footer_box2_com = "บริษัท พีเอ็ม อินเตอร์มาร์ท จำกัด";
        $footer_box2_1 = "116/3 ถนนนนทบุรี ตำบลท่าทราย อำเภอเมืองนนทบุรี จังหวัดนนทบุรี 11000";
    }
?>
<!-- <div class="container-fluid bg_yellow">
    <div class="row" style="height:5px;"></div>
</div> -->
<div class="container-fluid bg_blue">
    <div class="row">
        <div class="container" style="margin-top:40px; margin-bottom:20px; color:#FFF;">
            <div class="row">
                <div class="col-8">
                    <h4 class="font_header font_yellow" style="font-size:18px; font-weight: 500;">PM INTERMART</h4>
                    <p style="margin-top:15px;">
                        เราคือ ผู้จัดจำหน่าย ของใช้ในบ้าน ในสไตล์โรงแรม<br>
                        เราได้คัดสรรสินค้าที่มีเอกลักษณ์ ที่มีคุณภาพ และนวัตกรรมที่นำสมัย<br>
                        ในด้วยราคาที่เหมาะสม เพื่อตอบสนองการใช้ชีวิตที่สะดวกสบายขึ้น
                    </p>

                    <p style="margin-top:20px;">
                        <a href="<?php echo URL;?>" class="font_white_yellow">หน้าแรก</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                        <a href="<?php echo URL;?>about.php" class="font_white_yellow">เกี่ยวกับเรา</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                        <a href="javascript:void(0)" class="font_white_yellow">โปรโมชั่น</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                        <a href="javascript:void(0)" class="font_white_yellow">การจัดส่ง</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                        <a href="javascript:void(0)" class="font_white_yellow">บล๊อก</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                        <a href="<?php echo URL;?>contactus.php" class="font_white_yellow">ติดต่อเรา</a>
                    </p>
                </div>
                <div class="col-4">
                    <h4 class="font_header font_yellow" style="font-size:23px; font-weight: 500;">ติดต่อเรา</h4>
                    <!--<p><?php //echo $footer_box2_com ;?></p>-->
                    <p>
                        <?php echo $footer_box2_1 ;?>
                    </p>
                    <p>
                        Phone: (02) 589 6698 , (02) 950 1404-5<br>
                        Hotline : 087 708 0638<br>
                        Email : <a href="mailto:contact.pmintermart@gmail.com" class="font_white_yellow">contact.pmintermart@gmail.com</a>
                    </p>
                    <!-- <div>
                        <script id="dbd-init" src="https://www.trustmarkthai.com/callbackData/initialize.js?t=1d-16-5-964c4c54f8a317652945c91e4aec79118de0aeac22c"></script>
                        <div id="Certificate-banners" style="width: 150px;"></div>
                    </div> -->

                </div>
                <!--
                <div class="col">
                    
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fenrhotelproducts%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1463673790536762" width="340" height="180" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                    
                </div>
                -->
            </div>
            <div class="row">
                <div class="col-3" style="text-align: left;">
                    <!-- <script id="dbd-init" src="https://www.trustmarkthai.com/callbackData/initialize.js?t=1d-16-5-964c4c54f8a317652945c91e4aec79118de0aeac22c"></script>
                    <div id="Certificate-banners"></div> -->
                    <img src="https://www.trustmarkthai.com/trust_banners/bns_registered.jpg" 
                    style="max-width: 5em; cursor: pointer;" onclick="javascript:open_popup();">
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function open_popup() {
        window.open("https://www.trustmarkthai.com/callbackData/popup.php?data=1d-16-5-964c4c54f8a317652945c91e4aec79118de0aeac22c&markID=firstmar", "DBD_certificate", "width=720,height=720,scrollbars=no,location=no,resizable=no");
    }
</script>