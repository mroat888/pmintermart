<?php session_start() ; ?>
<meta charset="UTF-8">
<?php
    define('OMISE_PUBLIC_KEY', 'pkey_5okdztshaq572mngst1');
    define('OMISE_SECRET_KEY', 'skey_5okq4ej4en4s6ud3wad');

    //require_once ("vendor_payment/omise/omise-checkout/lib/Omise.php"); 
    require_once dirname(__FILE__).'/omise/omise-checkout/lib/Omise.php';
?>

<script src="https://cdn.omise.co/omise.js" charset="utf-8"></script>

<?php 
    if($_GET['tp'] == "credit_card"){
        $charge = OmiseCharge::create(array(
            'amount' => $_SESSION['summary_netprice']*100,
            'currency' => 'thb',
            'card' => $_POST['omiseToken'],
            'type' => 'credit_card',
        ));

        if($charge['status'] == 'successful'){
            echo "<script language='javascript'>";
                echo "window.location.href='http://127.0.0.1:8181/pmintermart/confirm_order.php?paym=credit_card'";
            echo "</script>";
        }else{ 
            echo "<script language='javascript'>";
                echo "alert('ไม่สามารถทำการสั่งซื้อได้ค่ะ');";
                echo "window.history.back();";
            echo "</script>";
        }
    }
?>