<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
		<title>Data Search PHP Script</title>
	</head>

	<body>
    	<?php
			//Retrieving the form info and storing in PHP Variables
			$surname=$_POST["surname"];
			$dateofbirth=$_POST["dateofbirth"];
		
			//Establish a connection to the database
			$dbserver="localhost";
			$dbusername="tp2amt";
			$dbpassword="1500936";
			$dbname="tp2amt_db";
		
			//Creating a new varible called '$con' which is used to establish a connection to the database.
			$con = new mysqli($dbserver, $dbusername, $dbpassword, $dbname) or die("Cannot Connect To Database.");
			
			$sqlstatement = "SELECT * FROM classlist WHERE surname = '$surname' AND dateofbirth = '$dateofbirth'";
		
			$result = $con->query($sqlstatement) or die ("Couldn't Issue SQL SELECT Query");
			
			//Queries The Database And Returns Records
			while ($row = $result->fetch_array(MYSQLI_ASSOC))
			{
				$forename=$row["forename"];
				$surname=$row["surname"];
				$address=$row["address"];
				$email=$row["email"];
				$dateofbirth=$row["dateofbirth"];
				$assessmentdate=$row["assessmentdate"];
				$weight=$row["weight"];
				$height=$row["height"];
				$systolic=$row["systolic"];
				$diastolic=$row["diastolic"];
				$sex=$row["sex"];
				$smoker=$row["smoker"];
				$nhsnumber=$row["nhsnumber"];
				
				echo "<h1 style='font-family: Verdana; display: inline; text-decoration: underline; color: blue; font-weight: bold;'>Search Results For '</h1>$surname
					<h1 style='font-family: Verdana; display: inline; text-decoration: underline; color: blue; font-weight: bold;'>'...</h1><br>
					<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>Forename:</p>$forename<br> 
					<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>Surname:</p>$surname<br> 
					<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>Address:</p> $address<br>
					<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>Email:</p> $email <br>
					<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>D.O.B:</p> $dateofbirth <br>
					<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>Assessment Date:</p> $assessmentdate <br>
					<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>Weight:</p> $weight <br>
					<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>Height:</p> $height <br>
					<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>Systolic Blood Pressure:</p>                    $systolic<br>
					<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>Diastolic Blood Pressure:</p>                    $diastolic<br>
					<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>Sex:</p> $sex <br>
					<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>Smoker?:</p> $smoker <br>
					<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>NHS Number:</p> $nhsnumber\n";
			}
			
			$result->close();
			
			$con->close();
		?>
	</body>
</html>