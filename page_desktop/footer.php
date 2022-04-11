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
                <div class="col-md-3">
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
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="font_header" style="font-size:20px; font-weight: 500; color: #333;">ข้อมูลเพิ่มเติม</h4>
                            <a href="<?php echo URL;?>about.php" class="font_gray">เกี่ยวกับเรา</a><br>
                            <a href="<?php echo URL;?>client.php" class="font_gray">ลูกค้าของเรา</a><br>
                            <a href="<?php echo URL;?>content.php" class="font_gray">บล๊อก</a><br>
                            <a href="<?php echo URL;?>contactus.php" class="font_gray">ติดต่อเรา</a><br>
                        </div>
                        <div class="col-12" style="margin-top:2em;">
                            <h4 class="font_header" style="font-size:20px; font-weight: 500; color: #333;">ช่วยเหลือและสนับสนุน</h4>
                            <!-- <a href="<?php echo URL."products_hotsale.php"?>" class="font_gray">โปรโมชั่น</a><br> -->
                            <!-- <a href="<?php echo URL;?>howtopay.php" class="font_gray">วิธีการชำระเงิน</a><br> -->
                            <a href="<?php echo URL;?>delivery.php" class="font_gray">การจัดส่งและเงื่อนไข</a><br>
                            <a href="<?php echo URL;?>terms_and_condition.php"class="font_gray">ข้อตกลงและเงื่อนไข</a><br>
                            <!-- <a href="<?php echo URL;?>return_and_refund.php"class="font_gray">การคืนสินค้า/การคืนเงิน/ยกเลิกการซื้อ</a><br> -->
                            <a href="<?php echo URL;?>privacy_policies.php" class="font_gray">นโยบายความเป็นส่วนตัว</a><br>
                            <a href="<?php echo URL;?>cookie_policy.php" class="font_gray">นโยบายการใช้คุกกี้</a><br>
                        </div>
                    </div> 
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-12" style="font-size: 1.5em;">
                            <!-- Linke icon https://icons8.com/icons/set/youtube -->
                            <h4 class="font_header font_blue" style="font-size:20px; font-weight: 500; color: #333;">ติดตามเราได้ที่</h4>
                            <a href="https://www.facebook.com/PM-INTERMART-106806074049943"  target="_blank" class="font_gray">
                                <!-- <i class="fab fa-facebook-square" style="background-color:#3c5a99"></i> -->
                                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="40" height="40"><linearGradient id="awSgIinfw5_FS5MLHI~A9a" x1="6.228" x2="42.077" y1="4.896" y2="43.432" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#0d61a9"/><stop offset="1" stop-color="#16528c"/></linearGradient><path fill="url(#awSgIinfw5_FS5MLHI~A9a)" d="M42,40c0,1.105-0.895,2-2,2H8c-1.105,0-2-0.895-2-2V8c0-1.105,0.895-2,2-2h32	c1.105,0,2,0.895,2,2V40z"/><path d="M25,38V27h-4v-6h4v-2.138c0-5.042,2.666-7.818,7.505-7.818c1.995,0,3.077,0.14,3.598,0.208	l0.858,0.111L37,12.224L37,17h-3.635C32.237,17,32,18.378,32,19.535V21h4.723l-0.928,6H32v11H25z" opacity=".05"/><path d="M25.5,37.5v-11h-4v-5h4v-2.638c0-4.788,2.422-7.318,7.005-7.318c1.971,0,3.03,0.138,3.54,0.204	l0.436,0.057l0.02,0.442V16.5h-3.135c-1.623,0-1.865,1.901-1.865,3.035V21.5h4.64l-0.773,5H31.5v11H25.5z" opacity=".07"/><path fill="#fff" d="M33.365,16H36v-3.754c-0.492-0.064-1.531-0.203-3.495-0.203c-4.101,0-6.505,2.08-6.505,6.819V22h-4v4	h4v11h5V26h3.938l0.618-4H31v-2.465C31,17.661,31.612,16,33.365,16z"/></svg></a>
                            &nbsp;
                            <a href="https://www.youtube.com/channel/UCBXT2FuvV-YFfTjpI41BlDA" target="_blank" class="font_gray">
                                <!-- <i class="fab fa-youtube"></i> -->
                                <svg xmlns="http://www.w3.org/2000/svg" style="margin-left:-15px;"  viewBox="0 0 48 48" width="40" height="40"><linearGradient id="PgB_UHa29h0TpFV_moJI9a" x1="9.816" x2="41.246" y1="9.871" y2="41.301" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#f44f5a"/><stop offset=".443" stop-color="#ee3d4a"/><stop offset="1" stop-color="#e52030"/></linearGradient><path fill="url(#PgB_UHa29h0TpFV_moJI9a)" d="M45.012,34.56c-0.439,2.24-2.304,3.947-4.608,4.267C36.783,39.36,30.748,40,23.945,40	c-6.693,0-12.728-0.64-16.459-1.173c-2.304-0.32-4.17-2.027-4.608-4.267C2.439,32.107,2,28.48,2,24s0.439-8.107,0.878-10.56	c0.439-2.24,2.304-3.947,4.608-4.267C11.107,8.64,17.142,8,23.945,8s12.728,0.64,16.459,1.173c2.304,0.32,4.17,2.027,4.608,4.267	C45.451,15.893,46,19.52,46,24C45.89,28.48,45.451,32.107,45.012,34.56z"/><path d="M32.352,22.44l-11.436-7.624c-0.577-0.385-1.314-0.421-1.925-0.093C18.38,15.05,18,15.683,18,16.376	v15.248c0,0.693,0.38,1.327,0.991,1.654c0.278,0.149,0.581,0.222,0.884,0.222c0.364,0,0.726-0.106,1.04-0.315l11.436-7.624	c0.523-0.349,0.835-0.932,0.835-1.56C33.187,23.372,32.874,22.789,32.352,22.44z" opacity=".05"/><path d="M20.681,15.237l10.79,7.194c0.689,0.495,1.153,0.938,1.153,1.513c0,0.575-0.224,0.976-0.715,1.334	c-0.371,0.27-11.045,7.364-11.045,7.364c-0.901,0.604-2.364,0.476-2.364-1.499V16.744C18.5,14.739,20.084,14.839,20.681,15.237z" opacity=".07"/><path fill="#fff" d="M19,31.568V16.433c0-0.743,0.828-1.187,1.447-0.774l11.352,7.568c0.553,0.368,0.553,1.18,0,1.549	l-11.352,7.568C19.828,32.755,19,32.312,19,31.568z"/></svg></a>
                            &nbsp;
                            <!-- <a href="javascript:void(0)" class="font_gray">
                                <svg xmlns="http://www.w3.org/2000/svg" style="margin-left:-15px;"  viewBox="0 0 48 48" width="40" height="40"><linearGradient id="_osn9zIN2f6RhTsY8WhY4a" x1="10.341" x2="40.798" y1="8.312" y2="38.769" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#2aa4f4"/><stop offset="1" stop-color="#007ad9"/></linearGradient><path fill="url(#_osn9zIN2f6RhTsY8WhY4a)" d="M46.105,11.02c-1.551,0.687-3.219,1.145-4.979,1.362c1.789-1.062,3.166-2.756,3.812-4.758	c-1.674,0.981-3.529,1.702-5.502,2.082C37.86,8.036,35.612,7,33.122,7c-4.783,0-8.661,3.843-8.661,8.582	c0,0.671,0.079,1.324,0.226,1.958c-7.196-0.361-13.579-3.782-17.849-8.974c-0.75,1.269-1.172,2.754-1.172,4.322	c0,2.979,1.525,5.602,3.851,7.147c-1.42-0.043-2.756-0.438-3.926-1.072c0,0.026,0,0.064,0,0.101c0,4.163,2.986,7.63,6.944,8.419	c-0.723,0.198-1.488,0.308-2.276,0.308c-0.559,0-1.104-0.063-1.632-0.158c1.102,3.402,4.299,5.889,8.087,5.963	c-2.964,2.298-6.697,3.674-10.756,3.674c-0.701,0-1.387-0.04-2.065-0.122C7.73,39.577,12.283,41,17.171,41	c15.927,0,24.641-13.079,24.641-24.426c0-0.372-0.012-0.742-0.029-1.108C43.483,14.265,44.948,12.751,46.105,11.02"/></svg></a>
                            &nbsp; -->
                            <a href="https://www.instagram.com/pmintermartofficial/" target="_blank"class="font_gray">
                                <!-- <i class="fab fa-instagram"></i> -->
                                <svg xmlns="http://www.w3.org/2000/svg" style="margin-left:-15px;"  viewBox="0 0 48 48" width="40" height="40"><radialGradient id="yOrnnhliCrdS2gy~4tD8ma" cx="19.38" cy="42.035" r="44.899" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#fd5"/><stop offset=".328" stop-color="#ff543f"/><stop offset=".348" stop-color="#fc5245"/><stop offset=".504" stop-color="#e64771"/><stop offset=".643" stop-color="#d53e91"/><stop offset=".761" stop-color="#cc39a4"/><stop offset=".841" stop-color="#c837ab"/></radialGradient><path fill="url(#yOrnnhliCrdS2gy~4tD8ma)" d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20	c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20	C42.014,38.383,38.417,41.986,34.017,41.99z"/><radialGradient id="yOrnnhliCrdS2gy~4tD8mb" cx="11.786" cy="5.54" r="29.813" gradientTransform="matrix(1 0 0 .6663 0 1.849)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#4168c9"/><stop offset=".999" stop-color="#4168c9" stop-opacity="0"/></radialGradient><path fill="url(#yOrnnhliCrdS2gy~4tD8mb)" d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20	c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20	C42.014,38.383,38.417,41.986,34.017,41.99z"/><path fill="#fff" d="M24,31c-3.859,0-7-3.14-7-7s3.141-7,7-7s7,3.14,7,7S27.859,31,24,31z M24,19c-2.757,0-5,2.243-5,5	s2.243,5,5,5s5-2.243,5-5S26.757,19,24,19z"/><circle cx="31.5" cy="16.5" r="1.5" fill="#fff"/><path fill="#fff" d="M30,37H18c-3.859,0-7-3.14-7-7V18c0-3.86,3.141-7,7-7h12c3.859,0,7,3.14,7,7v12	C37,33.86,33.859,37,30,37z M18,13c-2.757,0-5,2.243-5,5v12c0,2.757,2.243,5,5,5h12c2.757,0,5-2.243,5-5V18c0-2.757-2.243-5-5-5H18z"/></svg></a>
                            &nbsp;
                            <a href="https://lin.ee/7ueYKjj" target="_blank" class="font_gray">
                                <!-- <i class="fab fa-line"></i> -->
                                <svg xmlns="http://www.w3.org/2000/svg" style="margin-left:-18px;" viewBox="0 0 48 48" width="40" height="40"><path fill="#00c300" d="M12.5,42h23c3.59,0,6.5-2.91,6.5-6.5v-23C42,8.91,39.09,6,35.5,6h-23C8.91,6,6,8.91,6,12.5v23C6,39.09,8.91,42,12.5,42z"/><path fill="#fff" d="M37.113,22.417c0-5.865-5.88-10.637-13.107-10.637s-13.108,4.772-13.108,10.637c0,5.258,4.663,9.662,10.962,10.495c0.427,0.092,1.008,0.282,1.155,0.646c0.132,0.331,0.086,0.85,0.042,1.185c0,0-0.153,0.925-0.187,1.122c-0.057,0.331-0.263,1.296,1.135,0.707c1.399-0.589,7.548-4.445,10.298-7.611h-0.001C36.203,26.879,37.113,24.764,37.113,22.417z M18.875,25.907h-2.604c-0.379,0-0.687-0.308-0.687-0.688V20.01c0-0.379,0.308-0.687,0.687-0.687c0.379,0,0.687,0.308,0.687,0.687v4.521h1.917c0.379,0,0.687,0.308,0.687,0.687C19.562,25.598,19.254,25.907,18.875,25.907z M21.568,25.219c0,0.379-0.308,0.688-0.687,0.688s-0.687-0.308-0.687-0.688V20.01c0-0.379,0.308-0.687,0.687-0.687s0.687,0.308,0.687,0.687V25.219z M27.838,25.219c0,0.297-0.188,0.559-0.47,0.652c-0.071,0.024-0.145,0.036-0.218,0.036c-0.215,0-0.42-0.103-0.549-0.275l-2.669-3.635v3.222c0,0.379-0.308,0.688-0.688,0.688c-0.379,0-0.688-0.308-0.688-0.688V20.01c0-0.296,0.189-0.558,0.47-0.652c0.071-0.024,0.144-0.035,0.218-0.035c0.214,0,0.42,0.103,0.549,0.275l2.67,3.635V20.01c0-0.379,0.309-0.687,0.688-0.687c0.379,0,0.687,0.308,0.687,0.687V25.219z M32.052,21.927c0.379,0,0.688,0.308,0.688,0.688c0,0.379-0.308,0.687-0.688,0.687h-1.917v1.23h1.917c0.379,0,0.688,0.308,0.688,0.687c0,0.379-0.309,0.688-0.688,0.688h-2.604c-0.378,0-0.687-0.308-0.687-0.688v-2.603c0-0.001,0-0.001,0-0.001c0,0,0-0.001,0-0.001v-2.601c0-0.001,0-0.001,0-0.002c0-0.379,0.308-0.687,0.687-0.687h2.604c0.379,0,0.688,0.308,0.688,0.687s-0.308,0.687-0.688,0.687h-1.917v1.23H32.052z"/></svg></a>
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
                <div class="col-md-3">
                    <div class = "row">
                        <div class="col-12" style="text-align:center;">
                            <!-- <h4 class="font_header font_blue" style="font-size:20px; font-weight: 500; color: #333;">จดหมายข่าว</h4>
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
                            </form> -->

                            <img src="<?php echo URL_IMG;?>images/PM-LOGO.jpg" style="max-height: 50%;" >
                            <div style="margin-top: 1em;">
                                <p style="font-size: 1.2em;">	
                                    "นวัตกรรมผลิตภัณฑ์นำสมัย<br>เพื่อชีวิตที่สะดวกสบายขึ้น"
                                </p>
                            </div>

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