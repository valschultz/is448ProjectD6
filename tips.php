<!--Author: Mary Brooks -->
<?php

//connect to the databse
$db = mysqli_connect("studentdb-maria.gl.umbc.edu","mbrooks3","mbrooks3","mbrooks3");
	
	if (mysqli_connect_errno())	{
		exit("Error - could not connect to MySQL");
	}
//get random tip from the databse table "Tips"
$number = floor(rand(1,10));
$tip_query = "SELECT tip_content FROM Tips WHERE tip_id = '".$number."'";
$tip_result = mysqli_query($db,$tip_query);
	/*if(! $tip_result){
		print("Error - query could not be executed");
		$error = mysqli_error();
		print "<p> . $error . </p>";
		exit;
	}
	*/
$tip_rows = mysqli_num_rows($tip_result);
for($row_num = 1; $row_num <= $tip_rows; $row_num++){
		$tip_array = mysqli_fetch_array($tip_result);
		$result = "$tip_array[tip_content]";
	}
echo $result;
?>
