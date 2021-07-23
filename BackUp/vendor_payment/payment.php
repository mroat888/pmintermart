
<script src="https://cdn.omise.co/omise.js" charset="utf-8"></script>


<form id="checkoutForm" method="POST" action="vendor_payment/checkout.php?tp=credit_card">
    <script type="text/javascript" src="https://cdn.omise.co/omise.js"
            data-key="pkey_test_5o4c2snkqt35roxoj7b"
            data-image="https://www.pmintermart.com/images/PM-LOGO.jpg"
            data-frame-label="PM Intermart"
            data-amount="<?php echo $_SESSION['summary_netprice']*100;?>"
            data-currency="THB"
            data-button-label="<i class='fas fa-save'></i> ชำระเงินผ่านบัตรเคดิต"
            data-default-payment-method="credit_card">
    </script>
</form>

<style>
    #checkoutForm button{
        background-color: #ffd21d;
        border:none;
        border-radius: 6px;
        padding: 10px;
    }
</style>