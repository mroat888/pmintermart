<!-- <link rel="stylesheet" href="<?php echo $url_link; ?>/assets/css/docs.theme.min.css"> -->

<link rel="stylesheet" href="<?php echo URL; ?>vendor/OwlCarousel2-2.3.4/dist/assets/owl.carousel.css">

<link rel="stylesheet" href="<?php echo URL; ?>vendor/bootstrap-4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css?family=Maitree:500|Prompt:300,400,500" rel="stylesheet" defer>

<!-- Owl Stylesheets -->

<!-- reference your copy Font Awesome here (from our CDN or by hosting yourself) -->
<link href="<?php echo URL; ?>vendor/fontawesome-free-5.15.1-web/css/fontawesome.css" rel="stylesheet">
<link href="<?php echo URL; ?>vendor/fontawesome-free-5.15.1-web/css/brands.css" rel="stylesheet">
<link href="<?php echo URL; ?>vendor/fontawesome-free-5.15.1-web/css/solid.css" rel="stylesheet">

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sarabun|Prompt">

<!-- My Style -->
<link rel="stylesheet" href="<?php echo URL; ?>lib/css/style_menutop_desktop.css" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo URL; ?>lib/css/style.css" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo URL; ?>lib/css/style_owl_carousel.css?20210304-2" crossorigin="anonymous">


<script src="<?php echo URL; ?>lib/js/popper.min.js" crossorigin="anonymous"></script>
<script src="<?php echo URL; ?>vendor/bootstrap-4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script defer src="<?php echo URL; ?>vendor/fontawesome-free-5.15.1-web/js/all.js" crossorigin="anonymous"></script>

<!-- <script src="<?php //echo URL;?>lib/js/nosave.js" defer></script>
<script src="<?php //echo URL;?>lib/js/function_language.js" defer></script> -->
<script src="<?php echo URL;?>lib/js/function.ajax.js"></script>
<!-- <?php
    if($devices == "mobile"){   
        include_once("page_mobile/include_function_mobile.php");
    }
?>

<?php
    if($devices == "desktop"){   
        include_once("page_desktop/include_function_desktop.php");
    }
?> -->



<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-LV1SYF6MR0"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-LV1SYF6MR0');

</script>

<!-- Global site tag (gtag.js) - Google Analytics     อันใหม่   --> 
<script async src="https://www.googletagmanager.com/gtag/js?id=G-GQWWDK1ZDR"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-GQWWDK1ZDR');
</script>



<script type="text/javascript" defer>
    $(document).ready(function(){
        var stickyNav = function(){
          var scrollTop = $(window).scrollTop();
          // if(scrollTop > 189){
          if(scrollTop > 0){
            $('.sticky-top').css({"box-shadow": "0px 8px 16px 0px rgba(0,0,0,0.2); mt-10"});
            $('#py_rowtop').addClass("py_rowtop_scrolling");
            $('#pm_logo').addClass("pm_logo_scrolling");

            $('#py_rowtop').removeClass("py_rowtop");
            $('#pm_logo').removeClass("pm_logo");
          }else{
            $('.sticky-top').css({"box-shadow": "0px 0px 0px 0px rgba(0,0,0,0)"});
            $('#py_rowtop').removeClass("py_rowtop_scrolling");
            $('#pm_logo').removeClass("pm_logo_scrolling");

            $('#py_rowtop').addClass("py_rowtop");
            $('#pm_logo').addClass("pm_logo");
          }
        }
      stickyNav();
      $(window).scroll(function(){
        stickyNav();
      });

      $("#flogin").submit(function(e){
        e.preventDefault();
        //let data = $(this).serialize();
        //console.log(data);
        //alert('ยินดีตอนรับเข้าสู่ระบบ');
        $.ajax({
          type: "POST",
          url: "<?php echo URL; ?>login_aed.php",
          data: $(this).serialize()
        }).done(function(resp){
          console.log(resp) 
          //alert('ยินดีต้อนรับเข้าสู่ระบบ done');
          // location.reload();
          //location.reload();
          if(resp.status == 200){
            //alert('ยินดีต้อนรับเข้าสู่ระบบ');
            $(".div_status").toggle();
            $(".div_status").css("color","green");
            $(".div_status").html('<i class="fas fa-check"></i> ยินดีต้อนรับเข้าสู่ระบบ');
            setTimeout(() => {
              location.reload();
            }, 500);
          }else{
            $(".div_status").toggle();
            $(".div_status").css("color","red");
            $(".div_status").html('<i class="fas fa-times"></i> ชื่อผู้ใช้หรือรหัสผ่านผิดค่ะ');
            //alert('คุณไม่สามารถเข้าระบบได้');
            setTimeout(() => {
              $(".div_status").toggle();
            }, 1000);;
          } 
        }).fail(function(resp){
          // alert('คุณไม่สามารถเข้าระบบได้');
          console.log(resp)  
          if(resp.status == 200){
            //alert('ยินดีต้อนรับเข้าสู่ระบบ');
            $(".div_status").toggle();
            $(".div_status").css("color","green");
            $(".div_status").html('<i class="fas fa-check"></i> ยินดีต้อนรับเข้าสู่ระบบ');
            setTimeout(() => {
              location.reload();
            }, 500);
          }else{
            $(".div_status").toggle();
            $(".div_status").css("color","red");
            $(".div_status").html('<i class="fas fa-times"></i> ชื่อผู้ใช้หรือรหัสผ่านผิดค่ะ');
            //alert('คุณไม่สามารถเข้าระบบได้');
            setTimeout(() => {
              $(".div_status").toggle();
            }, 1000);
          }  
        })
      });

    });  
</script>




<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '159040122759800',
      cookie     : true,
      xfbml      : true,
      version    : 'v10.0'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>


<!-- Messenger ปลั๊กอินแชท Code -->
<div id="fb-root"></div>

<!-- Your ปลั๊กอินแชท code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "106806074049943");
  chatbox.setAttribute("attribution", "biz_inbox");

  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v11.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>

</body>
</html>