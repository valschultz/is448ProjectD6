<!--Author: Raymond Tsang -->
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
	My Page
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
	Log-Out
	</a>
</div>

	<?php
	session_start();
	if ($_SESSION['login_user']) {
	} else {
    header("location: https://swe.umbc.edu/~schultz4/is448/projectFinal/Registration.html");
	}
	
	$db = mysqli_connect("studentdb-maria.gl.umbc.edu","mbrooks3","mbrooks3", "mbrooks3");
	
	if(mysqli_connect_errno()){
		exit("Error, could not connect to MySQL");
	}

	if(isset($_POST['machine']) && !empty($_POST['machine']) && 
	   isset($_POST['machine_times']) && !empty($_POST['machine_times']))
	{
		$machine = $_POST['machine'];
		$machine_times = $_POST['machine_times'];
	

	$checkSchedule_query = "SELECT * FROM Schedule WHERE machine_id = '$machine' AND time_block = '$machine_times'";

	$result = mysqli_query($db, $checkSchedule_query);

	if(!$result){
		print("Error, query could not be executed");
		$error = mysqli_error($db);
		print "<p> . $error . </p>";
		exit;
	}
	
	$num_rows = mysqli_num_rows($result);
	if($num_rows != 0){	
		print ("Sorry, this machine is not available at this time. Please check again later.");
		?>
		<div>
		<p> Click <a href="https://swe.umbc.edu/~rtsang1/is448/project/daily_schedule_home.php"> <span id= "textColor"> HERE </span></a> to go back
		</p>
		</div>
		<?php
	}
	else{
		print ("This machine is available now!");
		?>
		<div>
		<p> Click <a href="https://swe.umbc.edu/~rtsang1/is448/project/daily_schedule_home.php"> <span id= "textColor"> HERE </span></a> to go back
		</p>
		<p> Click <a href="https://swe.umbc.edu/~ix32419/is448/Project/equipment_reservation.php"> <span id= "textColor"> HERE </span></a> to reserve it now!
		</p>
		</div>
		<?php
	}
	}
	?>
</body>
</html>	