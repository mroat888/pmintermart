<div class="row" style="background-color:#2b3743; height:50px;">
	<div class="col-md-6">
		<div class="row">
		<a href="javascript:void(0)" id="btn_menu">
			<span class="glyphicon glyphicon-menu-hamburger btn-lg" style="color:#fff" aria-hidden="true"></span>
		</a>
			<span style="font-size:23px; color:#fff;">Back Office Web Control</span>
		</div>
	</div>
	<div class="col-md-6" style ="text-align:right;">
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
				<a href="logoff.php" title="ออกจากระบบ">
					<span class="glyphicon glyphicon-log-out" style="color: #FFFFFF" aria-hidden="true"></span>
				</a>
				&nbsp;&nbsp;
			</span>
		</div>

	</div>
</div>