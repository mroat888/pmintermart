<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="vendor/bootstrap-4.6.0-dist/css/bootstrap.min.css" 
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="lib/css/style.css?v2021-06-21-3">
    <link rel="stylesheet" href="lib/css/style_menu_left.css">
    
<?php 
	include_once("../config/config.php");
	include_once("../lib/php/class.dbConnect.php"); 
?>

<?php
    $conn = new Database();
?>

<title>Login Back Office</title>
</head>
<body style="background-color:#ccc;"> 

<div class="div_status"></div>

<div class="container">
    <div class="row">
        <div class="col-12" style="display: flex; justify-content: center; margin-top:15%;">
            <div class="card border-primary shadow-lg" style="width:500px;">
                <div class="card-header bg-primary">
                    <span style="color:#FFF; font-size:20px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" 
                        class="bi bi-door-closed-fill" viewBox="0 0 16 16">
                        <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 
                        1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/></svg>&nbsp;&nbsp;PM Intermart System</span>
                </div>
                <div class="card-body">
                    <form id="flogin" name="flogin">
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" 
                                    class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg>
                                </div>
                                </div>
                                <input type="text" class="form-control" id="tUsername" name="tUsername" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" 
                                    fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                    <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 
                                    1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/></svg>
                                </div>
                                </div>
                                <input type="password" class="form-control" id="tPassword" name="tPassword" placeholder="Password" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" 
                            class="bi bi-unlock-fill" viewBox="0 0 16 16">
                            <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 
                            2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z"/></svg>&nbsp; เข้าสู่ระบบ
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once("include_footer.php"); ?>

<script>
	$(function() {
		$("#flogin").submit(function(e){
			e.preventDefault();
			$.ajax({
				type: "POST",
				url: "service/login.php",
				data: $(this).serialize()
			}).done(function(resp){
				$(".div_status").toggle();
				$(".div_status").css("background-color","green");
				$(".div_status").text("ยินดีต้อนรับเข้าสู่ระบบ");
				setTimeout(() => {
					location.href='dashboard.php'
				}, 600);
			}).fail(function(resp){
				$(".div_status").toggle();
				$(".div_status").css("background-color","#FF0000");
				$(".div_status").text("คุณไม่สามารถเข้าระบบได้");
				setTimeout(() => {
					$(".div_status").toggle();
				}, 1500);
			})
		});
	 });
</script>


<?php require_once("footer.php"); ?>