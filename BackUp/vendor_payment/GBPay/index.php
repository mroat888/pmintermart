<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>QR Payment</h1>

<form action="https://api.globalprimepay.com/gbp/gateway/qrcode" method="POST"> 
    <input type="hidden" name="token" value="sDw7gsZPhc+LXnT3MUQyhxG+Bic05amXuV40A6HAJWZ2cpzccJXcZEge458G9levBxoBxW+okefh2er/1hXITbAVzlwtASDnQfUoon/Dr7LIuG3SY7KkMvCaJF/EVgrlbgun8biSububbKxkxazNw+F3icw=">
    <input type="hidden" name="referenceNo" value="202106070001">
    <input type="hidden" name="backgroundUrl" value="www.pmintermart.com">
    <input type="number" name="amount" maxlength="13" placeholder="Amount" value="1.00"><br/>
    <input id="button" type="submit" value="Pay Now">
</form>

<br><br>

<form action="checkout.php" method="POST"> 
    <input type="hidden" name="token" value="sDw7gsZPhc+LXnT3MUQyhxG+Bic05amXuV40A6HAJWZ2cpzccJXcZEge458G9levBxoBxW+okefh2er/1hXITbAVzlwtASDnQfUoon/Dr7LIuG3SY7KkMvCaJF/EVgrlbgun8biSububbKxkxazNw+F3icw=">
    <input id="name" type="text" maxlength="250" placeholder="Holder Name" value="Teste"><br/>
    <input id="number" type="text" maxlength="16" placeholder="Card Number" value="4535017710535741"><br/>
    <input id="expirationMonth" type="text" maxlength="2" placeholder="MM" value="05"><br/>
    <input id="expirationYear" type="text" maxlength="2" placeholder="YY (Last Two Digits)" value="28"><br/>
    <input id="securityCode" type="password" maxlength="3" autocomplete="off" placeholder="CVV" value="184"><br/>
    <input id="button" type="submit" value="Pay Now">
</form>

</body>
</html>