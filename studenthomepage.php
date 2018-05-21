<!--Author: Mary Brooks -->
<?php
#checks the session. Will redirect to the login page if there is no session user id.
session_start();
if ($_SESSION['login_user']) {
	$id = htmlspecialchars($_SESSION['login_user']);
}
 else {
    header("location: https://swe.umbc.edu/~schultz4/is448/projectFinal/Registration.html");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title> Student Home Page </title>
<link rel="stylesheet" type="text/css" href="mockUp.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/prototype/1.7.3.0/prototype.js"></script>
<script type="text/javascript" src="studenthomepage.js"></script>

</head>
<body>
<?php
	//connect and check for error
	$db = mysqli_connect("studentdb-maria.gl.umbc.edu","mbrooks3","mbrooks3","mbrooks3");
	
	if (mysqli_connect_errno())	{
		exit("Error - could not connect to MySQL");
	}
?>

<div class = "image">
	<a href="https://styleguide.umbc.edu/umbc-athletics-logo/">
	<img src = "images/UMBCretrievers.jpg"  alt = "UMBC retriever" height="150"/>
	</a>
</div>

<!-- The Heading uses the students log in information to display their name-->
<?php
	$name_query = "SELECT * FROM Student WHERE student_id = '".$id."'";
	$name_result = mysqli_query($db,$name_query);
	if(! $name_result){
		print("Error - query could not be executed");
		$error = mysqli_error();
		print "<p> . $error . </p>";
		exit;
	}
	$name_rows = mysqli_num_rows($name_result);
	echo '<div class = "name" >';
	for($row_num = 1; $row_num <= $name_rows; $row_num++){
		$name_array = mysqli_fetch_array($name_result);
		print("<h1>  $name_array[student_first_name] 's Home Page </h1>");
	}
	echo '</div>';	
?>
<div class = "menu">
	<a class= "menu_link" href = "https://swe.umbc.edu/~mbrooks3/is448/project3/studenthomepage.php">
	<span id = "menu"> My Page </span>
	</a>
	<br /><br />
	<a class= "menu_link" href="https://swe.umbc.edu/~andrewp2/is448/is448ProjectD6/whos_in.php">
	<span id = "in"> See Who's In </span>
	</a>
	<br /><br />
	<a class= "menu_link" href = "https://swe.umbc.edu/~rtsang1/is448/project/daily_schedule_home.php">
	<span id = "schedule"> Today's Schedule </span>
	</a>
	<br /><br />
	<a class= "menu_link" href = "https://swe.umbc.edu/~ix32419/is448/Project/equipment_reservation.php">
	<span id = "reg"> Equipment Registration </span>
	</a>
	<br /><br />
	<a class= "menu_link" href = "https://swe.umbc.edu/~schultz4/is448/projectFinal/logout.php" >
	<span id = "out"> Log-Out </span>
	</a>
</div>

<?php
	//retieve machine data from database
	$last5_query = "SELECT * FROM Machines 
		INNER JOIN Student_Machines on Machines.machine_id = Student_Machines.machine_id 
		WHERE Student_Machines.student_id = '".$id."'
		ORDER BY machine_use_id DESC";
	$last5_result = mysqli_query($db,$last5_query);
	if(! $last5_result){
		print("Error - query could not be executed");
		$error = mysqli_error();
		print "<p> . $error . </p>";
		exit;
	}
	//display last5
	echo '<div class = "last5">';
	print ("<p> Last 5 Machines:</p>");
	$last5_rows = mysqli_num_rows($last5_result);
	for($row_num = 1; $row_num <= $last5_rows && $row_num <= 5; $row_num++){
		$last5_array = mysqli_fetch_array($last5_result);
		
		print("<p>$row_num: $last5_array[machine_name]<br /></p>");
	}
?>
	<!-- This clickable will allow the user to view more of their last used machines-->
	<a class = "menu_link" href="https://swe.umbc.edu/~mbrooks3/is448/project3/seepastmachines.php">
	<span  id = "past" > See More Past Machines </span>
	</a>
<?php
	echo '</div>';
?>

<div class = "tips">
	<!-- This section will include a set of randomized tips -->
	<h2> <span class = "home_page_headings" > Tips: </span> </h2>
	<div class = "displaytips" id = "displaytips">
	<p>
	Tips Display Here!
	<br />
	</p>
	</div>
	<br />
	<button id="newtip">New Tip</button>

</div>	

<div class = "notes_top">
	<h2> <span class = "home_page_headings" > Your Notes: </span> </h2>
</div>
<?php
	//retieve note data from database
	$notes_query = "SELECT * FROM Student_Notes WHERE student_id = '".$id."' ORDER BY note_id DESC";
	$notes_result = mysqli_query($db,$notes_query);
	if(! $notes_result){
		print("Error - query could not be executed");
		$error = mysqli_error();
		print "<p> . $error . </p>";
		exit;
	}
	
	//display notes
	$num_rows = mysqli_num_rows($notes_result);
	for($row_num = 1; $row_num <= $num_rows && $row_num <=5; $row_num++){
		$note_array = mysqli_fetch_array($notes_result);
		echo '<div class = "notes">';
		print ("<p> $note_array[note_date]: $note_array[note_content] <br /></p>");	
		echo '</div>';
	}
	
?>

<div class = "notes">
	<br /> 
	<a class = "menu_link" href="https://swe.umbc.edu/~mbrooks3/is448/project3/createnewnote.html">
	<span  id = "create" > Create a New Note </span>
	</a>
	<br />
	<a  class = "menu_link" href="https://swe.umbc.edu/~mbrooks3/is448/project3/seeallnotes.php">
	<span  id = "notes" > See All Notes </span>
	</a>
</div>
</body>
</html>

