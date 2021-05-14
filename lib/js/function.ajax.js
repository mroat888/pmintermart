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

function searchfrom(pageResult){
    var HttPRequest=createAjax(); 
	var tsearch = document.getElementById('tsearch').value;
	var tproperty_formart = document.getElementById('tproperty_formart').value;
	var date_start = document.getElementById('date_start').value;
	var date_end = document.getElementById('date_end').value;
	var sel_property_grade = document.getElementById('sel_property_grade').value;
    var pageResult = pageResult;
          
    HttPRequest.open('POST',pageResult);
     HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	HttPRequest.send("tsearch="+tsearch+"&tproperty_formart="+tproperty_formart+"&date_start="+date_start+"&date_end="+
	date_end+"&sel_property_grade="+sel_property_grade);

	HttPRequest.onreadystatechange = function(){
		if(HttPRequest.readyState == 3)  {// Loading Request
			document.getElementById("table_list").innerHTML = "Now is Loading...";
		}

		if(HttPRequest.readyState == 4)  {// Return Request
			document.getElementById("table_list").innerHTML = HttPRequest.responseText;
		}
	}

}



function searchValue(obj,pageResult,divResult){
    	var HttPRequest=createAjax(); 
        var obj = document.getElementById('tproperty_title').value;
        var pageResult = pageResult;
        var divResult = divResult;
          
        HttPRequest.open('POST',pageResult);
        HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		HttPRequest.send("tsearch="+obj);

		HttPRequest.onreadystatechange = function(){
			if(HttPRequest.readyState == 3)  {// Loading Request
				document.getElementById('div_check_title').innerHTML = "Now is Loading...";
			}

			if(HttPRequest.readyState == 4)  {// Return Request
				document.getElementById('div_check_title').innerHTML = HttPRequest.responseText;
			}
		}
}

function selectData(divResult,obj,pageResult){
    	var HttPRequest=createAjax(); 
        var tsearch = document.getElementById(obj).value;
        var pageResult = pageResult;
        var divResult = divResult;
          
        HttPRequest.open('POST',pageResult);
        HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		HttPRequest.send("sel_searchtext="+tsearch);

		HttPRequest.onreadystatechange = function(){

			if(HttPRequest.readyState == 3)  {// Loading Request
				document.getElementById(divResult).innerHTML = "Now is Loading...";
			}

			if(HttPRequest.readyState == 4)  {// Return Request
				document.getElementById(divResult).innerHTML = HttPRequest.responseText;
			}
		}

}