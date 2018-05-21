//Author: Valerie Schultz
"use strict";
window.onload = pageLoad;

function pageLoad(){
	document.getElementById("submitButton").onclick=validate;
	document.getElementById("textchange").onmouseover = changeColor;
	document.getElementById("textchange").onmouseout = changeColor;
}

function validate(){
	var idNum = document.getElementById("idNum").value;
	
	var pattern1 = /^[A-z]{2}\d{5}\$/;
	var result1 = pattern1.test(idNum);	
	if(idNum == ''){		
		alert("Student is empty \n Please enter the required information.\n");
		return false;
	}	
	if(result1 == false){		
		alert("Student ID is not in correct form \n Please enter the required information.\n");
		return false;
	}
		
	var password = document.getElementById("pass").value;
	if(password == ''){		
		alert("Password is empty \n Please enter the required information.\n");
		return false;
	}
	
	else{
		return true;
	}
}

function changeColor()
{
  var dom=document.getElementById("textchange");
  if(event.type == "mouseover"){
     dom.style.color='yellow';
     dom.style.font='Georgia 25pt Times';
  }
  else {
     dom.style.color='black';
     dom.style.font='Georgia 25pt Times';
  }
}