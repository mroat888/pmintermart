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
    var token = document.getElementById('token').value;
    var dataReq = {
      "rememberCard": false,
      "card": {
          "name": name,
          "number": number,
          "token": token,
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
  
</script>