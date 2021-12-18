<?php
	include("include_header.php"); 
	if(isset($_POST['tsearch'])){
		$tsearch = $_POST['tsearch'];
	}else{
		$tsearch = "";
	}

	$str = "SELECT id, product_code, name, is_drop FROM product_name WHERE ";

	 if($tsearch !=""){
	 	$param_search_array['tkeyword'] = "%".$tsearch."%";
	 	$where[] = "(product_code LIKE :tkeyword or name LIKE :tkeyword or detail LIKE :tkeyword) and ";
	 }

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


	// $pagesize = 20 ;
	// $pagestart = ($nowpage-1)*$pagesize;
	// $str_final = $_SESSION['ss_str']." LIMIT ".$pagestart.", ".$pagesize;
	$str_1 = "SELECT id, product_code, name, is_drop FROM product_name";
	$_SESSION['ss_str'] = $str;
	$str_final = $_SESSION['ss_str'];

	//echo $str_final;

	$result = $conn->prepare($str_1);
	$result->execute($_SESSION['ss_param']);

?>

<div class="col-md-3 row" style="margin-bottom:15px; margin-top:-5px;">
	<span class="badge" style="margin-top: 8px;">&nbsp;Record : 
	<?php echo number_format($result->rowCount()); ?>&nbsp;
	</span>
</div>

<table class="table table-bordered table-hover">
	<thead>
	<tr class="bg-default">
		<th scope="col" style="width: 10%; text-align: center;">#</th>	
    	<th scope="col" style="width: 25%;" class="text-nowrap">รหัสสินค้า</th>
		<th scope="col" style="width: 50%;">ชื่อสินค้า</th>
		<th scope="col" style="width: 5%; text-align: center;">Drop</th>
		<th scope="col" style="width: 5%; text-align: center;"></th>
		<th scope="col" style="width: 5%; text-align: center;"></th>
	</tr>
	</thead>
	<tbody>
<?php 
	$countNo = 0;
	$i = ($nowpage * $pagesize)-$pagesize;
	while($record = $result->fetch(PDO::FETCH_ASSOC)){
?>
	<tr>
		<th scope="row" style="text-align: center;">
	    	<?php echo ++$countNo; ?>
		</th>	
		<td><?php echo $record['product_code']; ?></td>
		<td><?php echo $record['name']; ?></td>
		<td style="text-align: center;"><?php echo $record['is_drop']; ?></td>
		<td style="text-align: center;">
			<a href="product_name_add.php?id=<?php echo $record['id']; ?>">
				<span class="glyphicon glyphicon-wrench btn-sm" aria-hidden="true" style="padding-left:0px;"></span>
			</a>
		</td>
		<td style="text-align: center;">
			<a href="javascript:void(0)">
				<span class="glyphicon glyphicon-trash btn-sm" aria-hidden="true" style="padding-left:0px;"></span>
			</a>
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
		$url_pagination = "product.php?";
		//include_once("pagination.php"); 
	?>
</div>