<div class="container-fluid top-header-widget" style="border-bottom: 1px solid #e0e0e0; ">
    <div class="row">
        <div class="container">
            <div class="row" style="padding-top: 0.5em; padding-bottom: 0.5em; color: #222; font-size: 0.8em;">
                <div class="col-md-6">
                    <?php
                        $check_url = $_SERVER['REQUEST_URI'];
                        if($check_url == "/"){
                    ?>
                            <h1 style="font-size: 1em; margin:0px; padding:0px; margin-top:3px;">
                                สินค้าในโรงแรม ของใช้ในบ้าน สไตล์โรงแรม นวัตกรรมผลิตภัณฑ์นำสมัย เพื่อชีวิตที่สะดวกสบายขึ้น
                            </h1>
                    <?php
                        }else{
                    ?>
                            <span>ของใช้ในบ้าน สไตล์โรงแรม นวัตกรรมผลิตภัณฑ์นำสมัย เพื่อชีวิตที่สะดวกสบายขึ้น</span>
                    <?php
                        }
                    ?>
                </div>
                <div class="col-md-6" style="text-align:right;">
                    <div class="row">
                        <div class="col">
                            <i class="fa fa-phone"></i>&nbsp;&nbsp;<strong>Hotline : 094 889 5001, 094 893 5002</strong>
                        </div>
                        <div class="col-3">
                            <div id="google_translate_element" style="margin:0px;"></div>  
                        </div>
                    </div>
                    <!-- <i class="fa fa-phone"></i>&nbsp;&nbsp;Hotline : 083-025-8992&nbsp;&nbsp; -->
                    <!-- <i class="fa fa-envelope"></i>&nbsp;&nbsp;Email: contactus.enr@gmail.com -->
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'th', includedLanguages: 'de,en,es,fr,id,it,ja,ko,lo,ms,pt,ru,sv,th,vi,zh-CN', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
