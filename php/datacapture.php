<!DOCTYPE html>
<head>
	<title>NHS PHP Script</title>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
</head>
<body>
	<?php

	//Retrieving the form info and storing in PHP Variables
	$forename=$_POST["forename"];
	$surname=$_POST["surname"];
	$address=$_POST["address"];
	$email=$_POST["email"];
	$dateofbirth=$_POST["dateofbirth"];
	$assessmentdate=$_POST["assessmentdate"];
	$weight=$_POST["weight"];
	$height=$_POST["height"];
	$systolic=$_POST["systolic"];
	$diastolic=$_POST["diastolic"];
	$sex=$_POST["sex"];
	$smoker=$_POST["smoker"];
	$nhsnumber=$_POST["nhsnumber"];
	
	//Print the entered information to check it is correct
			  echo "<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>Thankyou for submitting your form.</p><br>
			  		<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>The information recieved is:</p><br><br />
					<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>Forename:</p>$forename<br> 
					<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>Surname:</p>$surname<br> 
					<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>Address:</p> $address<br>
					<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>Email:</p> $email <br>
					<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>D.O.B:</p> $dateofbirth <br>
					<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>Assessment Date:</p>$assessmentdate <br>
					<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>Weight:</p> $weight <br>
					<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>Height:</p> $height <br>
					<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>Systolic Blood Pressure:</p>$systolic<br>
					<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>Diastolic Blood Pressure:</p>$diastolic<br>
					<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>Sex:</p> $sex <br>
					<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>Smoker?:</p> $smoker <br>
					<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>NHS Number:</p> $nhsnumber\n";
	
	//Calculate the persons BMI Value
	$heightm = $height / 100; //convert cm to m
	$BMI=(($weight / $heightm) / ($heightm));
	
	echo "<br /><br /><p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>Your BMI Is:</p>";
	echo number_format($BMI, 1);
	echo "<br><p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>You are: </p>";
	
	if ($BMI <= 15) {
		echo "Very Severely Underweight. We recommend you consult your GP.";
	} elseif ($BMI > 15 && $BMI <= 16) {
		echo "Severly Underweight. We recommend you consult your GP.";
	} elseif ($BMI > 16 && $BMI <= 18.5) {
		echo "Underweight. You are within the considered 'healthy region'.";
	} elseif ($BMI > 18.5 && $BMI <= 25) {
		echo "Normal (Healthy Weight). You do not need to see your GP.";
	} elseif ($BMI > 25 && $BMI<= 30) {
		echo "Overweight. You are within the considered 'healthy region'.";
	} elseif ($BMI > 30 && $BMI  <= 35) {
		echo "Obese Class I (Moderately Obese). We recommend you consult your GP.";
	} elseif ($BMI > 35 && $BMI<= 40) {
		echo "Obese Class II (Severly Obese). We recommend you consult your GP.";
	} else {
		echo "Obese Class III (Very Severly Obese). We recommend you consult your GP.";
	}
	
	//Calculate bloodpressure category
	echo "<br /><br /><p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>Your Blood Presure Is:</p>$systolic / $diastolic mm/Hg<br>";
	echo "<p style='font-family: Verdana; display: inline; color: rgb(0,114,198);'>You have: </p>";
	
	if ($systolic <= 120 && $diastolic < 80) {
		echo "Normal Blood Pressure. We recommend you maintain or adopt a healthy lifestyle.";
	} else if ($systolic > 120 && $systolic <= 139 || $diastolic >= 80 && $diastolic <= 89) {
		echo "Prehypertension. We recommend you maintain or adopt a healthy lifestyle.";
	} else if ($systolic >= 140 && $systolic <= 159 || $diastolic >= 90 && $diastolic <= 99) {
		echo "Stage 1 Hypertension. We recommend you maintain or adopt a healthy lifestyle. If your blood pressure goal isn't reached in about a month, talk to your doctor about taking one or more medications.";
	} else if ($systolic >= 160 || $diastolic >= 100) {
		echo "Stage 2 Hypertension. We recommend you maintain or adopt a healthy lifestyle. Talk to your doctor about taking more than one medication.";
	}
	
	//Establish a connection to the database
	$dbserver="localhost";
	$dbusername="tp2amt";
	$dbpassword="1500936";
	$dbname="tp2amt_db";

	//Creating a new varible called '$con' which is used to establish a connection to the database.
	$con = new mysqli($dbserver, $dbusername, $dbpassword, $dbname) or die("Cannot Connect To Database.");

	$sqlstatement = "INSERT INTO classlist VALUES
		('$forename','$surname','$address','$email','$dateofbirth','$assessmentdate','$weight','$height',
		'$systolic', '$diastolic','$sex','$smoker','$nhsnumber')";
		
	$result = $con->query($sqlstatement) or die ("Couldn't Issue SQL INSERT Query");
	
	$result->close();
	
	$con->close();
	?>
</body>