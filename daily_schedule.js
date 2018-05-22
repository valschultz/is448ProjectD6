//Author: Raymond Tsang
window.onload=pageLoad;

function pageLoad(){
	document.getElementById("SubmitButton").onclick = machineResult;
	document.getElementById("menuPage").onmouseover = colorChange1;
	document.getElementById("menuPage").onmouseout = colorChange1;
	document.getElementById("logout").onmouseover = colorChange2;
	document.getElementById("logout").onmouseout = colorChange2;
}

function machineResult(){
	var machineValue = document.getElementById("machine").value;
	var machine_timesValue = document.getElementById("machine_times").value;

	new Ajax.Request("daily_schedule.php",
	{
		method: "post",
		parameters: {machine_1:machineValue,machine_times_1:machine_timesValue},
		onSuccess: displayResult,
		onFailure: displayFailure
	} );
}

function displayResult(ajax){
	var r = alert("Thank you! We hope to see you again soon!") + ajax.responseText;
	document.getElementById("schedule").innerHTML = r;
}

function displayFailure(ajax){
	alert("Failure, Ajax request failed");
}

function colorChange1(){
	var menuPage1 = document.getElementById("menuPage");
	if(event.type == "mouseover"){
		menuPage1.style.color = 'blue';
		menuPage1.style.fontSize = '20px'
	}
	else{
		menuPage1.style.color = 'black';
		menuPage1.style.fontSize = '15px'
	}
	}

function colorChange2(){
	var logout1 = document.getElementById("logout");
	if(event.type == "mouseover"){
		logout1.style.color = 'blue';
		logout1.style.fontSize = '20px'
	}
	else{
		logout1.style.color = 'black';
		logout1.style.fontSize = '15px'
	}
}	
	
