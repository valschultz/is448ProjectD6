//Author: Valerie Schultz
"use strict";
window.onload = pageLoad;

function pageLoad(){
	document.getElementById("submitButton").onclick=validate;
	document.getElementById("detailsB").onclick = showDetail;
	$("idNum").onblur = checkID;
}

function validate(){
	var idNum = document.getElementById("idNum").value;
	
	if(idNum == ''){		
		alert("Student is empty \n Please enter the required information.\n");
		return false;
	}	
	else{
		return true;
	}
}

function showDetail() {
  var passDetail = document.getElementById("passDetail");  

 if (passDetail.style.visibility == "hidden")
   passDetail.style.visibility = "visible";
 else
   passDetail.style.visibility = "hidden";
}

function checkID(){
	//retrieve value from the 'id' textbox
	var id = $("idNum").value;
	
	new Ajax.Request( "forgetPassword.php", 
	{ 
		method: "get", 
		parameters: {idNum:id},
		onSuccess: displayResult
	} 
	);
}

function displayResult(ajax){
	$("stuID").innerHTML = ajax.responseText;
}