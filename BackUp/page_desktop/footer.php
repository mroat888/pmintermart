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
        $footer_box2_1 = "116/3 ถ.นนทบุรี ต.ท่าทราย อ.เมืองนนทบุรี จ.นนทบุรี 11000";
    }
?>
<!-- <div class="container-fluid bg_yellow">
    <div class="row" style="height:5px;"></div>
</div> -->
<div class="container-fluid" style="background-color: #eeeeee;">
    <div class="row">
        <div class="container" style="margin-top:2em; margin-bottom:2em; color:#666; letter-spacing: 0.07em; ">
            <div class="row" style="padding-bottom: 1em;">
                <div class="col-12">
                    <a href="<?php echo URL; ?>">
                        <img src="<?php echo URL_IMG;?>images/PM-LOGO-1.png" style="max-height: 3em;" >
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <p><i class="fas fa-map-marker-alt"></i>&nbsp;<?php echo $footer_box2_1 ;?></p>
                    <p>
                        <i class="fas fa-clock"></i>&nbsp;เวลาทำการ วันจันทร์ - ศุกร์<br>
                        เวลา 8:30 - 17:00 น.<br>
                        <span style="font-size: 0.7em;">(ยกเว้นหยุดนักขัตฤกษ์)</span>
                    </p>
                    <p>
                        <i class="fas fa-phone-alt"></i>&nbsp;(02) 149 5471
                    </p>
                    <p>
                        <i class="fas fa-mobile-alt"></i>&nbsp;083 025 8992
                    </p>
                    <p>
                        <i class="fab fa-line"></i>&nbsp;@PMINTERMART
                    </p>
                    <p>
                        <i class="fas fa-envelope"></i>&nbsp;<a href="mailto:contact.pmintermart@gmail.com" class="font_gray">contact.pmintermart@gmail.com</a>
                    </p>
                </div>
                <div class="col-3">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="font_header" style="font-size:20px; font-weight: 500; color: #333;">ข้อมูลเพิ่มเติม</h4>
                            <a href="<?php echo URL;?>about.php" class="font_gray">เกี่ยวกับเรา</a><br>
                            <a href="<?php echo URL;?>content.php" class="font_gray">บล๊อก</a><br>
                        </div>
                        <div class="col-12" style="margin-top:2em;">
                            <h4 class="font_header" style="font-size:20px; font-weight: 500; color: #333;">ช่วยเหลือและสนับสนุน</h4>
                            <!-- <a href="<?php echo URL."products_hotsale.php"?>" class="font_gray">โปรโมชั่น</a><br> -->
                            <a href="<?php echo URL;?>howtopay.php" class="font_gray">วิธีการชำระเงิน</a><br>
                            <a href="<?php echo URL;?>delivery.php" class="font_gray">การจัดส่งและเงื่อนไข</a><br>
                            <a href="<?php echo URL;?>terms_and_condition.php"class="font_gray">ข้อตกลงและเงื่อนไข</a><br>
                            <a href="<?php echo URL;?>return_and_refund.php"class="font_gray">การคืนสินค้า/การคืนเงิน/ยกเลิกการซื้อ</a><br>
                            <a href="<?php echo URL;?>privacy_policies.php" class="font_gray">นโยบายความเป็นส่วนตัว</a><br>
                            <a href="<?php echo URL;?>cookie_policy.php" class="font_gray">นโยบายการใช้คุกกี้</a><br>
                        </div>
                    </div> 
                </div>
                <div class="col-3">
                    <div class="row">
                        <div class="col-12" style="font-size: 1.5em;">
                            <h4 class="font_header font_blue" style="font-size:20px; font-weight: 500; color: #333;">ติดตามเราได้ที่</h4>
                            <a href="https://www.facebook.com/PM-INTERMART-106806074049943"  target="_blank" class="font_gray">
                            <i class="fab fa-facebook-square"></i></a>&nbsp;
                            <a href="https://www.youtube.com/channel/UCBXT2FuvV-YFfTjpI41BlDA" target="_blank" class="font_gray"><i class="fab fa-youtube"></i></a>&nbsp;
                            <a href="javascript:void(0)" class="font_gray"><i class="fab fa-twitter"></i></a>&nbsp;
                            <a href="https://www.instagram.com/pm_intermart/" target="_blank"class="font_gray"><i class="fab fa-instagram"></i></a>&nbsp;
                            <a href="https://page.line.me/pmintermart" target="_blank" class="font_gray"><i class="fab fa-line"></i></a>
                        </div>
                        <div class="col-12" style="margin-top:2em;">
                            <h4 class="font_header font_blue" style="font-size:20px; font-weight: 500; color: #333;">วิธีการชำระเงิน</h4>
                            <div>
                                <img src="https://nocnoc.com/static/images/payment-method-footer-725e94b7.svg">
                            </div>
                            <div style="margin-top: 2em;">
                                <!-- <script id="dbd-init" src="https://www.trustmarkthai.com/callbackData/initialize.js?t=1d-16-5-964c4c54f8a317652945c91e4aec79118de0aeac22c"></script>
                                <div id="Certificate-banners"></div> -->
                                <img src="https://www.trustmarkthai.com/trust_banners/bns_registered.jpg" 
                            style="max-width: 5em; cursor: pointer;" onclick="javascript:open_popup();">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class = "row">
                        <div class="col-12">
                            <h4 class="font_header font_blue" style="font-size:20px; font-weight: 500; color: #333;">จดหมายข่าว</h4>
                            <p>สมัครรับข่าวสารและโปรโมชั่นสุดพิเศษทางอีเมล์ได้จาก PM INTERMART ได้แล้ววันนี้</p>
                            <form name="form1" method="get" action="<?=URL?>products_search.php">
                                <div class="input-group" >
                                    <input type="text" id="keyword" name="keyword" 
                                    class="form-control search-input" placeholder ="กรอกอีเมลของคุณ"
                                    style="border-radius: 16px 0px 0px 16px;" required="required" />
                                    <button type="submit" class="input-group-addon bg_yellow" 
                                    style="/*background-color: #5c92e8;*/ color: #222; font-size: 0.9em;">
                                        สมัคร
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>        
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg_blue">
    <div class="row">
        <div class="container" style="padding-top:0.5em; padding-bottom: 0.5em; color: #FFFFFF;">
            <div class="row" style="font-size: 0.8em; line-height: 2.3em;">
                <div class="col-6" style="text-align: left;">
                    Copyright
                    <!-- <span class="glyphicon glyphicon-copyright-mark btn-sm" aria-hidden="true" style="margin-left:-10px; margin-right:-10px;"></span> -->
                    <!-- <i class="fas fa-copyright"></i> -->
                    <svg width="12" height="12" aria-hidden="true" focusable="false" data-prefix="far" data-icon="copyright" class="svg-inline--fa fa-copyright fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 448c-110.532 0-200-89.451-200-200 0-110.531 89.451-200 200-200 110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200zm107.351-101.064c-9.614 9.712-45.53 41.396-104.065 41.396-82.43 0-140.484-61.425-140.484-141.567 0-79.152 60.275-139.401 139.762-139.401 55.531 0 88.738 26.62 97.593 34.779a11.965 11.965 0 0 1 1.936 15.322l-18.155 28.113c-3.841 5.95-11.966 7.282-17.499 2.921-8.595-6.776-31.814-22.538-61.708-22.538-48.303 0-77.916 35.33-77.916 80.082 0 41.589 26.888 83.692 78.277 83.692 32.657 0 56.843-19.039 65.726-27.225 5.27-4.857 13.596-4.039 17.82 1.738l19.865 27.17a11.947 11.947 0 0 1-1.152 15.518z"></path></svg>
                    <span>2021 PM INTERMART CO.,LTD. All Rights Reserved.</span>
                </div>
                <div class="col-6" style="text-align: right;">
                     
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