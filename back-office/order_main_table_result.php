<?php
	//session_start();
	include("include_header.php"); 

	$tsearch = @$_POST['tsearch'];
	$date_start = @$_POST['date_start'];
	$date_end = @$_POST['date_end'];

	$str = "SELECT * FROM order_main WHERE ";

	if($date_start != ""){
		$param_search_array['date_start'] = $date_start;
		$where[] = "order_datetime  >= :date_start and ";
	}
	if($date_end != ""){
		$param_search_array['date_end'] = $date_end;
		$where[] = "order_datetime  <= :date_end and ";
	}

	// if($tsearch !=""){
	// 	$param_search_array['tkeyword'] = "%".$tsearch."%";;
	// 	$where[] = "(pCode LIKE :tkeyword or topicth LIKE :tkeyword or 
	// 	detailth LIKE :tkeyword) and ";
	// }

	if(@count($where) > 0){
		foreach ($where as $key => $value) {
			$str = $str.$value ;
		}
	}

	$str_orderby = "(id != '') order by id desc";
	$str = $str.$str_orderby;

	if(isset($_GET['nowpage'])){ ///--
		$nowpage = $_GET['nowpage'];
	}else{
		$nowpage = 1;
		$_SESSION['ss_str'] = $str;
		$_SESSION['ss_param'] = @$param_search_array;
	}


	$pagesize = 20 ;
	$pagestart = ($nowpage-1)*$pagesize;
	$str_final = $_SESSION['ss_str']." LIMIT ".$pagestart.", ".$pagesize;

	//echo $str_final;

	$result_order_main = $conn->prepare($str_final);
	$result_order_main->execute($_SESSION['ss_param']);

?>

<div class="col-md-3 row" style="margin-bottom:15px; margin-top:-5px;">
	<span class="badge" style="margin-top: 8px;">&nbsp;Record : 
	<?php echo number_format($result_order_main->rowCount()); ?>&nbsp;
	</span>
</div>

<table class="table table-bordered table-hover">
	<thead>
	<tr class="bg-default">
		<th scope="col" style="width: 10%; text-align: center;">#</th>	
    	<th scope="col" style="width: 25%;" class="text-nowrap">วันที่สั่งซื้อ</th>
		<th scope="col" style="width: 15%; text-align: right;">ส่วนลด</th>
		<th scope="col" style="width: 15%; text-align: right;">ราคาสุทธิ</th>
		<th scope="col" style="width: 25%; text-align: center;">สถานะ</th>
		<th scope="col" style="width: 10%; text-align: center;">เอกสาร</th>
	</tr>
	</thead>
	<tbody>
<?php 
	$countNo = 0;
	$i = ($nowpage * $pagesize)-$pagesize;
	while($record_order_main = $result_order_main->fetch(PDO::FETCH_ASSOC)){
		//$order_date = explode(" ", $record_order_main['order_datetime']);

?>
	<tr>
		<th scope="row" style="text-align: center;">
	    	<?php echo ++$countNo; ?>
		</th>	
		<td><?php echo $record_order_main['order_datetime']; ?></td>
		<td style="text-align: right;">
			<?php echo number_format($record_order_main['order_discount']); ?>
		</td>
		<td style="text-align: right;">
			<?php echo number_format($record_order_main['order_sum_price']); ?>
		</td>
		
		<?php
			switch ($record_order_main['id_order_process']) {
				case '2':
					$bg_color_status = "background-color: #ffd21d;";
					break;
				case '3':
					$bg_color_status = "background-color: #37be07;";
					break;
				
				default:
					$bg_color_status = "";
					break;
			}
		?>
		<td style="text-align: center; <?php echo $bg_color_status?>">
			<!-- <?php echo $record_order_process['name'];?>&nbsp;&nbsp;
			<a href="javascript:void(0)">
				<span class="glyphicon glyphicon-wrench btn-sm" aria-hidden="true" style="padding-left:0px;"></span>
			</a> -->
			<?php
				$selorder = "selorder_process".$record_order_main['id'];
				$div_output_status = "div_output_status".$record_order_main['id'];
			?>
			<select  id="<?php echo $selorder; ?>" name="<?php echo $selorder; ?>" 
			onchange="saveOnchange_orderprocess('<?php echo $selorder; ?>',<?php echo $record_order_main['id']?>,'order_process_aed.php','<?=$div_output_status;?>');" style="width: 50%;">
					<?php
						$str_order_process = "SELECT * FROM order_process ORDER BY id";
						$result_order_process = $conn->prepare($str_order_process);
						$result_order_process->execute();
						while($record_order_process = $result_order_process->fetch(PDO::FETCH_ASSOC)){
							if($record_order_process['id'] == $record_order_main['id_order_process']){	
					?>
								<option value="<?php echo $record_order_process['id']; ?>" selected><?php echo $record_order_process['name']; ?></option>
					<?php   }else{    ?>
								<option value="<?php echo $record_order_process['id']; ?>"><?php echo $record_order_process['name']; ?></option>
					<?php
							}
						}
					?>	
			</select>
			&nbsp;&nbsp;
			<span id="<?php echo $div_output_status; ?>" style="position: absolute; margin-top:0px; margin-right: 10px;">...</span>
		</td>
		<td style="text-align: center;">
			<?php
				$array_order_payment = array(":param_id_order" => $record_order_main['id']);
				$str_order_payment = "SELECT * FROM order_payment WHERE id_order = :param_id_order";
				$result_order_payment = $conn->prepare($str_order_payment);
				$result_order_payment->execute($array_order_payment);
				$count_check = $result_order_payment->rowcount();
				if($count_check){
			?>
					<a href="javascript:void(0)" class="text_link_white view_modal" data-dismiss="modal" 
					id ="<?=$record_order_main['id']?>"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span></a>&nbsp;&nbsp;
			<?php
				}
			?>
			<!-- <button type="button" name="view_modal" class="btn btn-primary view_modal" data-dismiss="modal" id ="<?=$record_order_main['id']?>">View</button> -->
			<a href="<?php echo URL; ?>order_display.php?id=<?=$record_order_main['id']?>" target="_blank" class="text_link_white"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a>
		</td>
	</tr>
<?php  }    ?>
	</tbody>
</table>
<?php
	//$process->_end();
	//echo $process->get() , ' sec.';
?>
<div class="col-md-12">
	<?php
		$url_pagination = "order_main.php?";
		include_once("pagination.php"); 
	?>
</div>
