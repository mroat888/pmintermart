<?php 
    define('OMISE_PUBLIC_KEY', 'pkey_test_5o4c2snkqt35roxoj7b');
    define('OMISE_SECRET_KEY', 'skey_test_5o4c2snksy8q4qc5d5o');

    require_once ("omise-checkout/lib/Omise.php"); 
?>
<?php
    
    $charge = OmiseCharge::create(array(
        'amount' => 10000,
	    'currency' => 'thb',
	    'card'=>$_POST['omiseToken']
    ));

    if($charge['status'] == 'successful'){
        echo "<script>";
            echo "alert('จ่ายเงินเรียบร้อยแล้วค่ะ')";
            echo "window.location='index.php'";
        echo "</script>";
    }else{
        echo "<script>";
            echo "alert('จ่ายเงินไม่สำเร็จค่ะ')";
            echo "window.location='index.php'";
        echo "</script>";
    }
?>