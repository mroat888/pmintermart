<script src="lib/js/jquery-1.11.3.min.js"></script>
<script src="lib/js/function.ajax.js"></script>
<script src="lib/js/imagepreview.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/ckeditor/ckeditor.js"></script>
<script src="vendor/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
<script src="lib/js/NumberFormat154.js"></script>

<script>
/*------ menu header --------------*/
	$(document).ready(function(){
	    $("#btn_menu").click(function(){
	    	$('#mydiv-right-sm').toggleClass("div_width");
	    	$('#div_dasboard_detail').toggleClass("div_dasboard_detail");    	
	        $(".mydiv-left-sm").toggle("fast",function(){
    		});   		
	    });

		$(".view_modal").click(function(){
			var uid = $(this).attr('id');
			$('#dataModal').modal('show');
	    	$.ajax({
				url : "payment_select.php",
				method : "post",
				data : {id:uid},
				success : function(data){
					$('#detail').html(data);
					$('#dataModal').modal('show');
				}
			});
	    });

	});
</script>