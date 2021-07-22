<?php require("include_header.php"); ?>

<script language="javascript">
    function delid(keyid){
        if(confirm("คุณต้องการลบใช่หรือไม่")){
            window.location.href="shoppingcart_aed.php?typ=del&delid="+keyid;
       	}
    }
</script>	

    <title>ตระกร้าสินค้า</title>
    <meta name="description" content="<?php echo $mata_description; ?>" />
    <link rel="canonical" href="<?php echo $canonical_page;?>" />

</head>
<body itemscope itemtype="http://schema.org/WebPage">   
<?php
    if(empty($_SESSION['memid'])){
        echo "<script>";
            echo "window.location.href='login.php'";
        echo "</script>";
    }
?>
<?php   if($devices == "mobile"){   ?>
            <div><?php include_once("page_mobile/shoppingcart_step2.php"); ?></div>
<?php   
        }else{     
?>
            <div><?php include_once("page_desktop/shoppingcart_step2.php"); ?></div>
<?php   }   ?>


<?php //include_once("lib/php/function.provinceAmphurDistrict.php"); ?>

<script>
	$(document).on('change','#tprovince',function(){
		let pvid = $(this).val();
		//console.log(pvid);
		$.ajax({
			type: 'get',
			dataType: 'json',
			url: 'lib/php/ajax.provinceAmphurDistrict.php',
			data : {tget:'getamphur',pvid:pvid},
		}).done(function(data){
			$('#tamphur').children().remove().end();
			$('#tdistrict').children().remove().end();
			$('#tzipcode').val('');
		    console.log(data);
			$('#tamphur').append('<option selected value="0">-- อำเภอ/เขต --</option>');
			for(i=0;i<data.length;i++){
				//console.log(data[i].id);
				$('#tamphur').append('<option value='+data[i].id+'>'+data[i].name_th+'</option>')	;
			}
		})
	});

	$(document).on('change','#tamphur',function(){
		let amid = $(this).val();
		//console.log(amid);
		$.ajax({
			type: 'get',
			dataType: 'json',
			url: 'lib/php/ajax.provinceAmphurDistrict.php',
			data : {tget:'getdistrict',amid:amid},
		}).done(function(data){
			$('#tdistrict').children().remove().end();
			$('#tzipcode').val('');
		   // console.log(data);
			$('#tdistrict').append('<option selected value="0">-- ตำบล/แขวง --</option>');
			for(i=0;i<data.length;i++){
				//console.log(data[i].id);
				$('#tdistrict').append('<option value='+data[i].id+'>'+data[i].name_th+'</option>')	;
			}
		})
	});

	$(document).on('change','#tdistrict',function(){
		let dtid = $(this).val();
		//console.log(amid);
		$.ajax({
			type: 'get',
			dataType: 'json',
			url: 'lib/php/ajax.provinceAmphurDistrict.php',
			data : {tget:'gettzipcode',dtid:dtid},
		}).done(function(data){
		    //console.log(data);
			$('#tzipcode').val('');
			$('#tzipcode').val(data[0].zip_code);
		})
	});
</script>


<script>
	function backpage_step1(){
		window.location.href="<?php echo URL?>shoppingcart_step1.php";
	}
</script>

<?php require("include_footer.php"); ?>
