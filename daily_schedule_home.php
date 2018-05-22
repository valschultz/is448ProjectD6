<!--Author: Raymond Tsang -->
<?php
session_start();
if ($_SESSION['login_user']) {
} else {
    header("location: https://swe.umbc.edu/~schultz4/is448/projectFinal/Registration.html");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title> Daily Schedule </title>
	<script type="text/javascript" src="daily_schedule.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/prototype/1.7.3.0/prototype.js"></script>
	<link rel="stylesheet" type="text/css" href="mockup.css" />
</head>

<body>
<div class = "image">
	<a href="https://styleguide.umbc.edu/umbc-athletics-logo/">
	<img src = "images/UMBCretrievers.jpg"  alt = "UMBC retriever" height="150"/>
	</a>
</div>

<h1 class = "equ_center"> Daily Schedule </h1>

<div class = "menu">
	<a class= "menu_link" href = "https://swe.umbc.edu/~mbrooks3/is448/project3/studenthomepage.php">
	<span id= "menuPage"> My Page</span>
	</a>
	<br /><br />
	<a class= "menu_link" href ="https://swe.umbc.edu/~andrewp2/is448/is448ProjectD6/whos_in.php">
	See Who's In
	</a>
	<br /><br />
	<a class= "menu_link" href = "https://swe.umbc.edu/~rtsang1/is448/project/daily_schedule_home.php">
	Today's Schedule
	</a>
	<br /><br />
	<a class= "menu_link" href = "https://swe.umbc.edu/~ix32419/is448/Project/equipment_reservation.html">
	Equipment Registration
	</a>
	<br /><br />
	<a class= "menu_link" href = "https://swe.umbc.edu/~schultz4/is448/projectFinal/Registration.html" >
	<span id= "logout"> Log-Out </span>
	</a>
</div>


<form method="POST" action="daily_schedule.php">
	<p>
		<h2> Which equipment would you like to view? </h2>
	</p>
<div class = "schedule_form" id= "schedule"> </div>
<select name="machine" id="machine" size="1">
	<option value="1">Treadmill #1</option>
	<option value="2">Treadmill #2</option>
	<option value="3">Treadmill #3</option>
	<option value="4">Treadmill #4</option>
	<option value="5">Elliptical #1</option>
	<option value="6">Elliptical #2</option>
	<option value="7">Elliptical #3</option>
	<option value="8">Elliptical #4</option>
	<option value="9">Squat Rack #1</option>
	<option value="10">Squat Rack #2</option>
	<option value="11">Bench Press #1</option>
	<option value="12">Bench Press #2</option>
</select>

	<p>
		<h2> Please select the time to view its availability: </h2>
	</p>

<select name="machine_times" id="machine_times" size="1">
	<option value="7">7:00 am</option>
	<option value="7.5">7:30 am</option>
	<option value="8">8:00 am</option>
	<option value="8.5">8:30 am</option>
	<option value="9">9:00 am</option>
	<option value="9.5">9:30 am</option>
	<option value="10">10:00 am</option>
	<option value="10.5">10:30 am</option>
	<option value="11">11:00 am</option>
	<option value="11.5">11:30 am</option>
	<option value="12">12:00 pm</option>
	<option value="12.5">12:30 pm</option>
	<option value="13">1:00 pm</option>
	<option value="13.5">1:30 pm</option>
	<option value="14">2:00 pm</option>
	<option value="14.5">2:30 pm</option>
	<option value="15">3:00 pm</option>
	<option value="15.5">3:30 pm</option>
	<option value="16">4:00 pm</option>
	<option value="16.5">4:30 pm</option>
	<option value="17">5:00 pm</option>
	<option value="17.5">5:30 pm</option>
	<option value="18">6:00 pm</option>
	<option value="18.5">6:30 pm</option>
	<option value="19">7:00 pm</option>
	<option value="19.5">7:30 pm</option>
	<option value="20">8:00 pm</option>
	<option value="20.5">8:30 pm</option>
	<option value="21">9:00 pm</option>
	<option value="21.5">9:30 pm</option>
	<option value="22">10:00 pm</option>
</select>

<input type="Submit" name="Submit" value="Submit" id="SubmitButton"/>
</form>

</body>
</html>