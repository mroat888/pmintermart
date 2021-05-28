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


<script src="<?php echo URL; ?>lib/js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="<?php echo URL; ?>vendor/bootstrap-4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script defer src="<?php echo URL; ?>vendor/fontawesome-free-5.15.1-web/js/all.js" integrity="sha384-L469/ELG4Bg9sDQbl0hvjMq8pOcqFgkSpwhwnslzvVVGpDjYJ6wJJyYjvG3u8XW7" crossorigin="anonymous"></script>

<script src="<?php echo URL;?>lib/js/nosave.js" defer></script>
<script src="<?php echo URL;?>lib/js/function_language.js" defer></script>
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

<script type="text/javascript" defer>
    $(document).ready(function(){
        var stickyNav = function(){
          var scrollTop = $(window).scrollTop();
          if(scrollTop > 140){
            $('.sticky-top').css({"box-shadow": "0px 8px 16px 0px rgba(0,0,0,0.2)"});
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


</body>
</html>