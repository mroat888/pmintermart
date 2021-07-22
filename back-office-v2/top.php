<div class="row" style="background-color:#2b3743; height:50px;">
	<div class="col-6">
		<div class="row">
		<a href="javascript:void(0)" id="btn_menu">
			<svg xmlns="http://www.w3.org/2000/svg" style="color:#FFF;" width="28" height="28" fill="currentColor" class="bi bi-soundwave" viewBox="0 0 16 16">
				<path fill-rule="evenodd" d="M8.5 2a.5.5 0 0 1 .5.5v11a.5.5 0 0 1-1 0v-11a.5.5 0 0 1 .5-.5zm-2 2a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zm4 0a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zm-6 1.5A.5.5 0 0 1 5 6v4a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm8 0a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm-10 1A.5.5 0 0 1 3 7v2a.5.5 0 0 1-1 0V7a.5.5 0 0 1 .5-.5zm12 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0V7a.5.5 0 0 1 .5-.5z"/>
			</svg>
		</a>&nbsp;&nbsp;
			<span style="font-size:23px; color:#fff;">Back Office Web Control</span>
		</div>
	</div>
	<div class="col-6" style ="text-align:right;">
		<div style="padding-top:13px;">
			<span style="font-size:16px;">
				<span class="glyphicon glyphicon-user" style="color: #FFFFFF" aria-hidden="true"></span>
				&nbsp;
				<?php
					$array_admin = array(':param_id_admin' => $_SESSION['ss_accountid']);
					$str_admin = "SELECT name FROM admin WHERE id = :param_id_admin";
					$result_admin = $conn->prepare($str_admin);
					$result_admin->execute($array_admin);
					$record_admin = $result_admin->fetch(PDO::FETCH_ASSOC);
				?>
				<a href="salespersons_add.php?id=<?php echo $_SESSION['ss_accountid']; ?>" title="แก้ไขข้อมูลส่วนตัว">
					<span style="color:#FFFFFF"><?php echo $record_admin['name'];?></span>
				</a>
				&nbsp;&nbsp;&nbsp;
				<a href="javascript:void(0)" id="logoff">ออกจากระบบ</a>
			</span>
		</div>

	</div>
</div>
