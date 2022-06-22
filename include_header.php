<?php include_once("config/config.php"); ?>
<?php include_once("lib/php/class.dbConnect.php"); ?>
<?php include_once("lib/php/class.UserAgent.php"); ?>
<?php include_once("lib/php/class.pageTitle.php"); ?>
<?php include_once("lib/php/class.shippingRates.php"); ?>
<?php
    $conn = new Database();
    $conn_wp = new Database_WP();
    $pagetitle = new PageTitle();
    $useragent = new UserAgent();
    $shippingrates = new shippingRates();

    $devices = $useragent->useragent_check();
    //$href_url = "http://www.enrhotelproducts.co.th/";

    if(isset($_GET['lang'])){
        if($_GET['lang']== "en"){
            $lang = "en";
        }else{
            $lang = "th";
        }
    }else{
        $lang = "th";
    }
    
?>
<?php
	if(!isset($_SESSION)){
		session_start();
	}
?> 
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="google-site-verification" content="3o2UESxKdrqZ-92NRPBWsDPajfA5bhQZCcDqi4_zSP0">
<meta name="facebook-domain-verification" content="trasrzx1aerzs2krbfc1b2u0lmh3pe" />
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<!-- Owl Stylesheets -->
<?php
    $url_link = URL."vendor/OwlCarousel2-2.3.4/docs"; 
?>

    <!-- Owl Stylesheets -->
   
    <link rel="stylesheet" href="<?php echo $url_link; ?>/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $url_link; ?>/assets/owlcarousel/assets/owl.theme.default.min.css">
    <!-- javascript -->
    <script src="<?php echo $url_link; ?>/assets/vendors/jquery.min.js"></script>
    <script src="<?php echo $url_link; ?>/assets/owlcarousel/owl.carousel.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
