<script src="lib/js/jquery-3.1.1.min.js"></script>
<script src="vendor/bootstrap-4.6.0-dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

<script>
	$(document).ready(function(){
		$("#logoff").click(function(){
	    	$.ajax({
				url : "service/logoff.php",
				method : "post",
				data : {logoff:'logoff'},
			}).done(function(resp){
				$(".div_status").toggle();
				$(".div_status").css("background-color","green");
				$(".div_status").text("ออกจากระบบเรียบร้อยแล้วค่ะ");
				setTimeout(() => {
					location.href='index.php'
				}, 600);
			}).fail(function(resp){
				$(".div_status").toggle();
				$(".div_status").css("background-color","#FF0000");
				$(".div_status").text("คุณไม่สามารถออกจากระบบได้");
				setTimeout(() => {
					$(".div_status").toggle();
				}, 1500);
			})
		});
	});
</script>