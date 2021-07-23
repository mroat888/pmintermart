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
<!-- <form action="#" method="POST"> 
  <input id="name" type="text" maxlength="250" placeholder="Holder Name" value="Teste"><br/>
  <input id="number" type="text" maxlength="16" placeholder="Card Number" value="5258860689905862"><br/>
  <input id="expirationMonth" type="text" maxlength="2" placeholder="MM" value="02"><br/>
  <input id="expirationYear" type="text" maxlength="2" placeholder="YY (Last Two Digits)" value="25"><br/>
  <input id="securityCode" type="password" maxlength="3" autocomplete="off" placeholder="CVV" value="950"><br/>
  <input id="button" type="submit" value="Pay Now">
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
  document.getElementById("button").addEventListener("click", function(event){
    event.preventDefault();
    var publicKey = "pe5Uc7nyVqmH9sWPh2BVxh2WBHG4ZtqT";
    var name = document.getElementById('name').value;
    var number = document.getElementById('number').value;
    var expirationMonth = document.getElementById('expirationMonth').value;
    var expirationYear = document.getElementById('expirationYear').value;
    var securityCode = document.getElementById('securityCode').value;
    var dataReq = {
      "rememberCard": false,
      "card": {
          "name": name,
          "number": number,
          "expirationMonth": expirationMonth,
          "expirationYear": expirationYear,
          "securityCode": securityCode,
          "amount": "100.00",
          "customerName": "John",
      }
    };
    $.ajax({
        url: "https://api.globalprimepay.com/v1/tokens",       // Test URL: https://api.globalprimepay.com/v1/tokens , Production URL: https://api.gbprimepay.com/v1/tokens
        data: JSON.stringify(dataReq),
        contentType: "application/json",
        dataType: "json",
        headers: {
          "Authorization": "Basic " + btoa(publicKey + ":")
        },
        success: function(dataResp){
          var dataStr = JSON.stringify(dataResp);
          alert(dataStr);
        },
        failure: function(errMsg) {
          alert(errMsg);
        }
    });
  });
</script> -->

</body>
</html>