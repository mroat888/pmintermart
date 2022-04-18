<?php include_once("page_desktop/header.php"); flush();?>
<script>
    /*document.getElementById("myDropdown").classList.toggle("show");*/
</script>

<?php
	$product_name = $record_products['name']." ".$record_sku['name'];
?>

<div class="container-fluid">
	<div class="row">
		<div class="container">
			<div class="col-12">
				<?php include_once("breadcrumb_wigget.php"); ?>
			</div>
			<div class="row" style="margin-top: 1em; margin-bottom: 1em;">
				<div class="col-6">
					<?php include_once("page_desktop/products_display_image.php"); ?>
				</div>
				<div class="col-6" style="min-height: 31.25em;">
					<div class="row">
						<div class="col-12">
							<h1><?php echo $product_name; ?></h1>
						</div>
					</div>
					<div class="row mt-4 mx-3">
						<div class="col-12 head_properties">
							<?php echo $record_products['head_properties']; ?>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="col-md-12 mt-10" style="margin-top:35px;">
								สนใจสินค้า ติดต่อได้เลย..!
							</div>
							<div class="col-md-12 my-3" style="margin-top:0px;">
								<a href="่tel:0830258992" class="btn btn-warning" style="background-color:#FFF; color:#2959c2; 
									padding:10px 30px 10px 30px; font-size:25px;  border: 1.5px solid;" title="ขอใบเสนอราคา">
									<strong>โทร : 083-025-8992</strong>
								</a>
							</div>
							<div class="col-md-12" style="margin-top:10px;">
								<a href="https://lin.ee/7ueYKjj" target="_blank">
									<img src="https://scdn.line-apps.com/n/line_add_friends/btn/th.png" alt="เพิ่มเพื่อน" height="36" border="0">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="margin-top: 1.5625em; margin-bottom: 1.5625em;">
				<div class="col-12">
					<button class="dropbtn bg_yellow" style="text-align: center; width: 150px; margin: 0px;">
						Description
					</button>
					<hr class="bg_yellow" style="height: 2px; margin: 0px;">
				</div>
				<div class="col-9" style="margin-top: 1.5625em margin-bottom: 1.5625em; padding-top: 1.5625em;">
					<div id = "div_content" class="span_content content_detail" style="height: 20em;">
						<article><?php echo $record_products['detail']; ?></article>
					</div>
					<div id="div_more_botton_detail">
                        <a href="javascript:void(0)" onclick="show_detail('div_content','div_more_botton_detail');" 
                          class="btn btn-outline-primary btn_more" role="button">++ ดูรายละเอียดเพิ่มเติม ++</a>
                    </div>
				</div>
				<div class="col-3" style="margin-top: 1.5625em; margin-bottom: 1.5625em;"></div>
			</div>
		</div>
	</div>
</div>

<?php include_once("page_desktop/footer.php");?>
<style>
	#div_content ul li{
		margin-left: 1.5em;
	}
	.content_detail{
		/*height: 20em; */
		overflow: hidden;
		background: -webkit-linear-gradient(#212529, #212529,#eee);
  		-webkit-background-clip: text;
  		-webkit-text-fill-color: transparent;
	}
	.btn_more{
		margin-top:0.5em; 
		margin-bottom:1.5em;
		margin-left: 3em;
		width: 15em;	
	}

	.head_properties{
		padding-left:3em;
		padding-right:3em;
	}

	.head_properties ul li{
		margin-left: 1.5em;
		list-style:square;
	}

</style>
<script>

    function show_detail(id_div_detail,id_div_botton_detail){
        document.getElementById(id_div_detail).style = "overflow:display;";
        document.getElementById(id_div_botton_detail).style = "display:none";

        var element = document.getElementById(id_div_detail);
 		element.classList.remove("content_detail");
    }

	function openpage(urlpath){
		var urlpath = urlpath;
		window.location.href = urlpath;
	}

	function setStock(instock){
		var stk = parseInt(instock);
		var qty = document.getElementsByName('sel_quantity');
		var val = parseInt($(qty).val());
		if(val>stk){
			$(qty).val(stk);
		}	
		if(stk > 0){
			document.getElementById('choiceLabel').innerText = "เหลือเพียง "+instock;
		}else{
			document.getElementById('choiceLabel').innerText = "สินค้าหมด";
		}
	}

	$('.qty-minus').click(function(){
		var pkg = parseInt($(this).data('package'));
		var qty = $(this).parent().find('.span1').eq(0);
		var val = parseInt($(qty).val());
		if(val<=pkg){
			$(qty).val(1);
		}else{
			$(qty).val(val - pkg);
		}
	});

	$('.qty-plus').click(function(){
		var radios = document.getElementsByName('radio_sku_id');
		for(var i = 0; i < radios.length; i++){
		    if (radios[i].checked) {
		        //document.getElementById('choiceLabel').innerText = radios[i].getAttribute('data-stock');
		       	var stk = parseInt(radios[i].getAttribute('data-stock'));
		    }
		}
		//var stk = parseInt($(this).data('stock'));
		var pkg = parseInt($(this).data('package'));
		var qty = $(this).parent().find('.span1').eq(0);
		
		$(document).ready(function(){
			var val = parseInt($(qty).val());
			if(val<stk){
				$(qty).val(val + pkg);
			}else{
				$(qty).val(stk);
			}	
		});
	});

</script>