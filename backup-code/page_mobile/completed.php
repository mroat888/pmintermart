<?php include_once("page_mobile/menu_header.php"); flush();?>

<?php
	$id = $_GET['id'];
?>

<div class="container-fluid">
	<div class="row">
		<div class="container">

			<div class="row" style="margin-top: 15px; margin-bottom: 15px;">
				<div class="col-12">
					<div class="box_predetail" style="padding:6px;">
						<div class="col-12">
		                    <font class="text_color_header" style="font-size:36px;">
		                    	เราได้รับคำสั่งซื้อเรียบร้อยแล้วค่ะ
		                	</font>
		                </div>
		                <div class="col-12">
		                    <font style="font-size:23px;">
		                    	เจ้าหน้าที่บริษัท พร้อมดำเนินการติดต่อกลับโดยเร็วที่สุด เพื่อให้คำปรึกษา และแนะนำข้อมูลเพิ่มเติม
		                	</font>
		                </div>

		                <div class="col-12" style="margin-top:20px;">
		                    <div class="">
		                        <div class="col-12">
		                            <font style="font-size:18px;">
		                            	หากมีข้อสงสัยหรือต้องการสอบถามรายละเอียดเพิ่มเติม ได้ตามช่องทางต่อไปนี้
		                            </font>
		                        </div>
		                        <div class="col-12">
		                            <font style="font-size:16px;">1. ทางโทรศัพท์ (076) 540 820-1</font>
		                        </div>
		                        <div class="col-12">
		                            <font style="font-size:16px;">2. สายด่วน 088 874 8720</font>
		                        </div>
		                        <div class="col-12">
		                            <font style="font-size:16px;">3. ทางอีเมล contactus.enr@gmail.com</font>
		                        </div>
		                    </div>
		                </div>
		                <div class="col-md-12" style="margin-top:20px;">
		                    <div class="div_boder_conner div_boder_blue" style="margin-top:20px; margin-bottom:25px;">
		                        <font style="font-size:23px">ตรวจสอบรายการสินค้าได้ที่</font>       
		                        ( * คุณสามารถ Copy Url ด้านล่างนี้เพื่อเก็บรายการสอบถามได้ )<br>
		                        <a href="<?php echo URL; ?>order_display.php?id=<?=$id?>" target="_blank" class="text_link_white"><?php echo URL; ?>order_display.php?id=<?=$id?></a>
		                    </div>
		               </div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<?php include_once("page_mobile/footer.php");?>