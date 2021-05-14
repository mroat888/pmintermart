function createAjax(){
	var HttPRequest = false;
	   if (window.XMLHttpRequest) { // Mozilla, Safari,...
			 HttPRequest = new XMLHttpRequest();
			 if (HttPRequest.overrideMimeType) {
				HttPRequest.overrideMimeType('text/html');
			 }
		 } else if (window.ActiveXObject) { // IE
			 try {
				HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
				try {
				   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			 }
		  } 
		  
		if (!HttPRequest) {
			 alert('Cannot create XMLHTTP instance');
			 return false;
		}
	return HttPRequest;
}


function searchKeyPress(e,pageResult){
	e = e || window.event;
	if (e.keyCode == 13) {
    	var HttPRequest=createAjax(); 
        var tsearch = document.getElementById('tsearch').value;
        var pageResult = pageResult;
          
        HttPRequest.open('POST',pageResult);
        HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		HttPRequest.send("tsearch="+tsearch);

		HttPRequest.onreadystatechange = function(){
			if(HttPRequest.readyState == 3)  {// Loading Request
				document.getElementById("table_list").innerHTML = "Now is Loading...";
			}

			if(HttPRequest.readyState == 4)  {// Return Request
				document.getElementById("table_list").innerHTML = HttPRequest.responseText;
			}
		}
    }
}

function searchDate(pageResult){
    var HttPRequest=createAjax(); 
	var tsearch = document.getElementById('tsearch').value;
	var date_start = document.getElementById('date_start').value;
	var date_end = document.getElementById('date_end').value;
    var pageResult = pageResult;
          
    HttPRequest.open('POST',pageResult);
    HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	HttPRequest.send("tsearch="+tsearch+"&date_start="+date_start+"&date_end="+date_end);

	HttPRequest.onreadystatechange = function(){
		if(HttPRequest.readyState == 3)  {// Loading Request
			document.getElementById("table_list").innerHTML = "Now is Loading...";
		}

		if(HttPRequest.readyState == 4)  {// Return Request
			document.getElementById("table_list").innerHTML = HttPRequest.responseText;
		}
	}

}
function saveOnchange_orderprocess(obj,orderid,pageResult,divoutput){

	var HttPRequest=createAjax(); 
	var tobj = document.getElementById(obj).value;
	var torderid = orderid;
	HttPRequest.open('POST',pageResult);
    HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	HttPRequest.send("orderid="+torderid+"&selid="+tobj);

	HttPRequest.onreadystatechange = function(){
		if(HttPRequest.readyState == 3)  {// Loading Request
			document.getElementById(divoutput).innerHTML = "Now is Loading...";
		}

		if(HttPRequest.readyState == 4)  {// Return Request
			document.getElementById(divoutput).innerHTML = HttPRequest.responseText;
		}
	}
}
