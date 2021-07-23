<?php include_once("page_desktop/header.php"); flush();?>
<script>
    /*document.getElementById("myDropdown").classList.toggle("show");*/
</script>

<div class="container-fluid">
	<div class="row">
		<div class="container">
			<div class="row" style="margin-top: 25px;">
				<div class="col-12">
					<h2>แจ้งชำระเงิน</h2>
				</div>
				<div class="col-12">
					<h5>กรุณากรอกแบบฟอร์ม เพื่อส่งถึงเรา</h3>
					<div class="card" style="margin-top: 15px;">
						<div class="card-body">
					<form name="formpayment" method="post" enctype="multipart/form-data" action="<?php echo URL; ?>payment_aed.php" >
						<div class="row">
						  	<div class="col">
						    	<div class="form-group">
					            	<label for="tmembername" class="col-form-label">เลขที่คำสั่งซื้อ *</label>
					            	<input type="text" class="form-control" id="tid_order" name="tid_order" value="<?php echo $_GET['id']?>" required="required" readonly>
			          			</div>
						  	</div>
						  	<div class="col">
						    	<div class="form-group">
			            			<label for="tmembername" class="col-form-label">ชื่อ - นามสกุล.</label>
			            			<input type="text" class="form-control" id="tname" name="tname" 
			            			required="required">
			          			</div>
						  </div>
						</div>
						<div class="row">
						  	<div class="col">
					          	<div class="form-group">
					            	<label for="tmemberemail" class="col-form-label">อีเมล.</label>
					            	<input type="email" class="form-control" id="temail" name="temail" 
					            	required="required">
					          	</div>
					        </div>
					        <div class="col">
					          	<div class="form-group">
					            	<label for="tphone" class="col-form-label">โทรศัพท์.</label>
					            	<input type="text" class="form-control" id="tphone" name="tphone" 
					            	required="required">
					          	</div>
					        </div>
					    </div>
					    <div class="row">
						  	<div class="col">
					          	<div class="form-group">
					            	<label for="tmemberemail" class="col-form-label">ชำระเงินเข้าบัญชี.</label>
					            	<input type="hidden" class="form-control" id="tid_bank" name="tid_bank" 
					            	required="required" value="1">
					            	<div>
					            		<span>
					            			<img src="<?php echo URL;?>/images/kbank.png" style="max-height:2em;" alt="บัญชีธนาคาร PM Intermart">
					            		</span>
					            		<span>ธนาคารกสิกรไทย เลขที่บัญชี : 050-1-55687-4 ชื่อบัญชี : บจก.พีเอ็ม อินเตอร์มาร์ท</span>
					            	</div>
					          	</div>
					        </div>
					    </div>
					    <div class="row">
						  	<div class="col">
					          	<div class="form-group">
					            	<label for="tmemberemail" class="col-form-label">จำนวนเงินที่โอน.</label>
					            	<input type="text" class="form-control" id="ttransfer_amount" name="ttransfer_amount" 
					            	required="required">
					          	</div>
					        </div>
					        <div class="col">

					        </div>
					    </div>
					    <div class="row">
						  	<div class="col">
					          	<div class="form-group">
					            	<label for="tmemberemail" class="col-form-label">วันที่โอน (mm/dd/yyyy)</label>
					            	<input type="date" class="form-control" id="tpayment_date" name="tpayment_date" 
					            	required="required">
					          	</div>
					        </div>
					        <div class="col">
					          	<div class="form-group">
					            	<label for="tphone" class="col-form-label">เวลาที่โอนโดบประมาณ. (10:05 AM)</label>
					            	<input type="time" class="form-control" id="tpayment_time" name="tpayment_time" 
					            	required="required">
					          	</div>
					        </div>
					    </div>
					     <div class="row">
						  	<div class="col">
					          	<div class="form-group">
					            	<label for="tmemberemail" class="col-form-label">สลิปการโอนเงิน.</label>
					            	<input type="file" class="form-control" id="tpayment_slip" name="tpayment_slip" 
					            	required="required">
					          	</div>
					        </div>
					        <div class="col">

					        </div>
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
			</div>

		</div>
	</div>
</div>

<?php include_once("page_desktop/footer.php");?>

