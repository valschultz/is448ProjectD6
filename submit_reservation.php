<?php
$db = mysqli_connect("studentdb-maria.gl.umbc.edu","mbrooks3","mbrooks3","mbrooks3");
if (mysqli_connect_errno())	{
		exit("Error - could not connect to MySQL");
	}
	
session_start();
if ($_SESSION['login_user']) {
	$id = htmlspecialchars($_SESSION['login_user']);
}
 else {
    header("location: https://swe.umbc.edu/~schultz4/is448/projectFinal/Registration.html");
}	
	
$time_block = mysqli_real_escape_string($db, $_GET['time_block']);
$machine_id = mysqli_real_escape_string($db, $_GET['machine_id']);
$student_id = mysqli_real_escape_string($db, $id);
$result = mysqli_query($db,
	"SELECT * FROM Schedule WHERE 
		time_block='$time_block' AND 
		machine_id='$machine_id' AND 
		student_id='$student_id'
	");
	
	
	
	
$num_rows = mysqli_num_rows($result);
$already_reserved = $num_rows > 0;
if ($already_reserved) {
//	header('Location: error.html');
	echo 'false';
	die();
	
} else {
	mysqli_query($db, "
		INSERT INTO Schedule 
			(time_block, student_id, machine_id) VALUES 
			('$time_block', '$student_id', '$machine_id');
	");

	mysqli_query($db, "
		INSERT INTO Student_Machines
			(student_id, machine_id) VALUES 
			('$student_id', '$machine_id');
	");
	
		
	// $results = mysqli_query($db, 'select * from Schedule JOIN Machines on Schedule.machine_id = Machines.machine_id');
//	header('Location: confirmation.html');
	echo 'true';
	die();
}