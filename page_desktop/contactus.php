<?php include_once("page_desktop/header.php"); flush();?>
<script>
    //document.getElementById("myDropdown").classList.toggle("show");
</script>

<div class="container-fluid">
	<div class="row">
		<div class="container">
			<div class="row" style="margin-top: 15px;">
				<div class="col-12">
					<img src="<?php echo URL;?>images/banner-header-page.jpg" style="max-width:100%;" 
					alt="PM Intermart">
					<div style="position: absolute; top:35%; left: 50px;">
						<h2 style="color:white;">ติดต่อเรา</h2>
					</div>
				</div>
			</div>
			<div class="row" style="margin-top: 50px; margin-bottom: 25px;">
				<div class="col-6">
					<h5>กรุณากรอกแบบฟอร์ม เพื่อส่งถึงเรา</h5>
					<div class="card" style="margin-top: 15px;">
						<div class="card-body">
							<form name="formcontact" method="post" enctype="multipart/form-data" action="<?php echo URL; ?>contactus_aed.php" >
								<div class="form-group">
									<label for="tmembername" class="col-form-label">ชื่อ.</label>
									<input type="text" class="form-control" id="tmembername" name="tmembername" 
									required="required">
								</div>
								<div class="form-group">
									<label for="tmemberemail" class="col-form-label">อีเมล.</label>
									<input type="text" class="form-control" id="tmemberemail" name="tmemberemail" 
									required="required">
								</div>
								<div class="form-group">
									<label for="tphone" class="col-form-label">โทรศัพท์.</label>
									<input type="text" class="form-control" id="tphone" name="tphone" 
									required="required">
								</div>
								<div class="form-group">
									<label for="tphone" class="col-form-label">คำแนะนำ.</label>
									<textarea class="form-control" id="tdetail" name="tdetail"></textarea>
								</div>
								<button type="submit" class="btn bg_yellow">ส่งข้อมูล</button>
							</form>
						</div>
					</div>
				</div>

				<div class="col-6">
					<div class="row">
						<div class="col-12">
							<h3>สอบถามข้อมูล</h3>
							<p>สอบถามข้อมูล สินค้า บริการ สาขา โปรโมชั่น ฯลฯ ได้ที่</p>
							<p>
								จันทร์ - ศุกร์ ตั้งแต่เวลา 8.30 น. - 17.00 น.<br>
								<strong>(ยกเว้นวันหยุดนักขัตฤกษ์)</strong>
							</p>
							<p>
								Hotline : 094 889 5001, 094 893 5002<br>
								Office&nbsp; : (02) 149 5471, 083 025 8992<br>							
								<!-- Email : <a href="mailto:contactus.enr@gmail.com">contactus.enr@gmail.com</a> -->
							</p>
						</div>
						<div class="col-12">
							<h5>แผนที่</h5>
							<a href="<?php echo URL;?>images/pm-map.jpg" target="_blank">
								<img src="<?php echo URL;?>images/pm-map.jpg" style="max-width:95%;" alt="Map PM Intermart">
							</a>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<?php include_once("page_desktop/footer.php");?>