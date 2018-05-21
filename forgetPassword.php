<!--Author: Valerie Schultz
	This page will ask the student for their ID and will show them their password.
-->
<!DOCTYPE html>
<html lang="en">
  <head>
		<title> RAC MockUp Froget Password Page </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
			<!--Linking this page to the CSS style sheet: mockUp.css-->
		<link rel="stylesheet" type="text/css" href="mockup.css" />
		<body>
			<p>
				<img src = "images/UMBCretrievers.jpg"  alt = "UMBC retriever" height="150"/>			
			</p>
			<?php
	#connect to mysql database
	$db = mysqli_connect("studentdb-maria.gl.umbc.edu","mbrooks3","mbrooks3","mbrooks3");

	if (mysqli_connect_errno())	exit("Error - could not connect to MySQL");

	if (isset($_GET['idNum'])  && !empty($_GET['idNum']))
	{
		$id = $_GET['idNum'];
		$id = htmlspecialchars($_GET['idNum']);
		$id = mysqli_real_escape_string($db,$id);
	}
	if(preg_match("/^[A-z]{2}\d{5}\$/", $id))
		{
			#This is where you check the database to ensure that the student id and password match to a row in the database
			#This requires JavaScript onclic, but logic is here
		$checkLogIn_query = "Select student_id, student_password FROM Student WHERE student_id = '$id'";

		#Execute query
		$result = mysqli_query($db, $checkLogIn_query);

		if(!$result){
			print("Error - query could not be executed");
			$error = mysqli_error($db);
			print "<p> . $error . </p>";
			exit;
		}
		if($result){
			$num_rows = mysqli_num_rows($result);
	
			if($num_rows != 0){
				for($row_num = 0; $row_num < $num_rows; $row_num++){
					$row_array = mysqli_fetch_array($result);
					echo("Password is $row_array[student_password]");
				}
	}
			?>
			<div class = "center">
				<p>
					<a href="https://swe.umbc.edu/~schultz4/is448/projectFinal/Registration.html"> Next</a>
				</p>
			</div>
		<?php
		}
	//If query returned 0 rows, display error message
	}
		else{
	?>	
		<div class = "center">
				<p>
					Invalid student id. Must be 2 letters followed by 5 numbers. <br />
					<a href="https://swe.umbc.edu/~schultz4/is448/projectFinal/forgetPassword.html"> Retry</a>
				</p>
			</div>
		<?php
			}
	?>
		</body>
</html>