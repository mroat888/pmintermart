<?php session_start() ; ?>
<meta charset="UTF-8">
<?php

    define('OMISE_PUBLIC_KEY', 'pkey_test_5o4c2snkqt35roxoj7b');
    define('OMISE_SECRET_KEY', 'skey_test_5o4c2snksy8q4qc5d5o');

    require_once ("omise-checkout/lib/Omise.php"); 
?>

<script src="https://cdn.omise.co/omise.js" charset="utf-8"></script>

<?php 
    if($_GET['tp'] == "credit_card"){
        $charge = OmiseCharge::create(array(
            'amount' => $_SESSION['summary_netprice'],
            'currency' => 'thb',
            'card' => $_POST['omiseToken'],
            'type' => 'credit_card'
        ));

        if($charge['status'] == 'successful'){
             echo "<script language='javascript'>";
                echo "window.location.href='confirm_order.php'";
            echo "</script>";
        }else{ 
            echo "<script language='javascript'>";
                 echo "alert('ไม่สามารถทำการสั่งซื้อได้ค่ะ');";
                echo "window.history.back();";
            echo "</script>";
        }
    }

    if($_GET['tp'] == "truemoney"){
        echo $_GET['tp'];

        $charge = OmiseCharge::create(array(
            'amount' => '400000',
            'currency' => 'thb',
            'card' => $_POST['omiseToken'],
            'phone_number'=> '0812345678',
            'type' => 'truemoney'
        ));

        if($charge['status'] == 'successful'){
             echo "<script language='javascript'>";
                echo "window.location.href='confirm_order.php'";
            echo "</script>";
        }else{ 
            echo "<script language='javascript'>";
                 echo "alert('ไม่สามารถทำการสั่งซื้อได้ค่ะ');";
                echo "window.history.back();";
            echo "</script>";
        }

        // Omise.setPublicKey(omise_public_key);

        // Omise.createSource('truemoney', {
        //   "amount": 400000,
        //   "currency": "THB",
        //   "phone_number": "0812345678"
        // }, function(statusCode, response) {
        //   console.log(response)
        // });

        /*
        $data = "OMISE_SECRET_KEY=skey_test_5o4c2snksy8q4qc5d5o";

        $curlResource = curl_init();
        curl_setopt($curlResource, CURLOPT_URL, "https://api.omise.co/charges");
        curl_setopt($curlResource, CURLOPT_POSTFIELDS , $data);
        $content = curl_exec($curlResource);
        curl_close($curlResource);
        print_r($content);
        */
    }

?>

