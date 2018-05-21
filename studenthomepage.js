"use strict";
/*Author: Mary Brooks */
/*THIS JAVASCRIPT PAGE WILL NOT WORK IN FIREFOX*/
window.onload = pageLoad;
function pageLoad(){
	
	//load css change elements
	document.getElementById("menu").onmouseover = menucolor;
	document.getElementById("menu").onmouseout = menucolor;
	document.getElementById("in").onmouseover = incolor;
	document.getElementById("in").onmouseout = incolor;
	document.getElementById("schedule").onmouseover = schedulecolor;
	document.getElementById("schedule").onmouseout = schedulecolor;
	document.getElementById("reg").onmouseover = regcolor;
	document.getElementById("reg").onmouseout = regcolor;
	document.getElementById("out").onmouseover = outcolor;
	document.getElementById("out").onmouseout = outcolor;
	document.getElementById("create").onmouseover = createcolor;
	document.getElementById("create").onmouseout = createcolor;
	document.getElementById("notes").onmouseover = notescolor;
	document.getElementById("notes").onmouseout = notescolor;
	document.getElementById("past").onmouseover = pastcolor;
	document.getElementById("past").onmouseout = pastcolor; 
	
	//load ajax elements
	document.getElementById("newtip").onclick = newtip;
}

//functions for changing link colors
function menucolor(){
	var menuspan = document.getElementById("menu");
	if(event.type == "mouseover"){
		menuspan.style.color = '#ffc20e';
		menuspan.style.fontSize = '25px'
	}
	else {
		menuspan.style.color = 'black';
		menuspan.style.fontSize = '15px'
	}
}
function incolor(){
	var inspan = document.getElementById("in");
	if(event.type == "mouseover"){
		inspan.style.color = '#ffc20e';
		inspan.style.fontSize = '25px'
	}
	else {
		inspan.style.color = 'black';
		inspan.style.fontSize = '15px'
	}
}
function schedulecolor(){
	var schedulespan = document.getElementById("schedule");
	if(event.type == "mouseover"){
		schedulespan.style.color = '#ffc20e';
		schedulespan.style.fontSize = '25px'
	}
	else {
		schedulespan.style.color = 'black';
		schedulespan.style.fontSize = '15px'
	}
}
function regcolor(){
	var regspan = document.getElementById("reg");
	if(event.type == "mouseover"){
		regspan.style.color = '#ffc20e';
		regspan.style.fontSize = '25px'
	}
	else {
		regspan.style.color = 'black';
		regspan.style.fontSize = '15px'
	}
}
function outcolor(){
	var outspan = document.getElementById("out");
	if(event.type == "mouseover"){
		outspan.style.color = '#ffc20e';
		outspan.style.fontSize = '25px'
	}
	else {
		outspan.style.color = 'black';
		outspan.style.fontSize = '15px'
	}
}
function createcolor(){
	var createspan = document.getElementById("create");
	if(event.type == "mouseover"){
		createspan.style.color = '#ffc20e';
		createspan.style.fontSize = '25px';
	}
	else {
		createspan.style.color = 'black';
		createspan.style.fontSize = '15px';
	}
}
function notescolor(){
	var notesspan = document.getElementById("notes");
	if(event.type == "mouseover"){
		notesspan.style.color = '#ffc20e';
		notesspan.style.fontSize = '25px'
	}
	else {
		notesspan.style.color = 'black';
		notesspan.style.fontSize = '15px'
	}
}
function pastcolor(){
	var pastspan = document.getElementById("past");
	if(event.type == "mouseover"){
		pastspan.style.color = '#ffc20e';
		pastspan.style.fontSize = '25px'
	}
	else {
		pastspan.style.color = 'black';
		pastspan.style.fontSize = '15px'
	}
}

//ajax request
function newtip(){
	new Ajax.Request( "tips.php", 
	{ 
		method: "get", 
		parameters: {},
		onSuccess: ajaxSuccess,
		onFailure: ajaxFailure
	} 
	);
}

function ajaxSuccess(ajax){
	document.getElementById("displaytips").innerHTML = ajax.responseText;
	
}
//function to execute when ajax request is unsuccessful
function ajaxFailure(){
	alert("Ajax request failed");
}
