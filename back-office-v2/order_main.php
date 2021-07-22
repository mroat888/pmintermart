<?php require_once("header.php"); ?>
    <title>Document</title>
</head>
<body onload="getAllOrder();">
    
<div class="div_status"></div>

<div class="container-fluid">
    <?php require_once("top.php"); ?>
    <div class="row">
        <div class="col-2">
            <div class="row"><?php include_once("menu_left.php"); ?></div>
        </div>
        <div class="col-10">
            <div class="row">
				<div class="col-6">
					<h3 class="mt-3">รายการใบสั่งซื้อ</h3>
				</div>
				<div class="col-6">

				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<button onclick="getAllOrder();">GET</button>
					<table class="table table-sm table-bordered table-hover">
						<thead class="thead-dark">
							<tr>
								<th scope="col" style="width: 10%; text-align: center;">ใบสั่งซื้อ</th>	
								<th scope="col" style="width: 25%;" class="text-nowrap">วันที่สั่งซื้อ</th>
								<th scope="col" style="width: 15%; text-align: right;">ส่วนลด</th>
								<th scope="col" style="width: 15%; text-align: right;">ราคาสุทธิ</th>
								<th scope="col" style="width: 25%; text-align: center;">สถานะ</th>
								<th scope="col" style="width: 10%; text-align: center;">เอกสาร</th>
							</tr>
						</thead>
						<tbody id="tbody-result">
							
						</tbody>
					</table>
				</div>
			</div>
        </div>
    </div>
</div>


    
<?php require_once("include_footer.php"); ?>

<script>
	function getAllOrder(){
		$.ajax({
			type: 'GET',
			url: 'service/order_main.php',
		}).done(function(data){
			$('#tbody-result').html(data);
		})
	}
</script>

<?php require_once("footer.php"); ?>