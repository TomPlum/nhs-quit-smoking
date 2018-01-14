<?php
	//Start a session
	session_start();
	
	//Call inputted data
	$username = $_POST['username']; //Storing the typed username as a PHP Variable
	$password = $_POST['password']; //Storing the typed password as a PHP Variable
	
	//Store session data
	$_SESSION["username"] = $username; //Assigning the stored PHP Username as Session Data
	$_SESSION["password"] = $password; //Assigning the stored PHP Password as Session Data
	
	if (isset($_SESSION['use'])) { //Checks if the user has already logged in during this session.
		header("Location: ../search2.php");
	}
	
	if (isset($_POST['login'])) { //Checks if the user has clicked the login button.
		if ($username == "TP2AMT" && $password == "1500936") { //Checks if the username and password match.
			$_SESSION['use']=$username;
			echo '<script type="text/javascript"> window.open("../search2.php","_self");</script>';
		} else {
			header ("Location: ../loginerror.html"); //If authentication fails, loads invalid login page.
		}
	}
			
	//Establish a connection to the database
	$dbserver="localhost";
	$dbusername="tp2amt";
	$dbpassword="1500936";
	$dbname="tp2amt_db";
	
	//Creating a new varible called '$con' which is used to establish a connection to the database.
	$con = new mysqli($dbserver, $dbusername, $dbpassword, $dbname) or die("Cannot Connect To Database.");

	$sqlstatement = "INSERT INTO login_attempts VALUES ('$username','$password')"; //Inserting the values into the DB
	
	$result = $con->query($sqlstatement) or die ("Couldn't Issue SQL INSERT Query"); //Verify if completed
	
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP Login Script</title>
        <link rel="shortcut icon" href="images/favicon.png">
        <link rel="stylesheet" type="text/css" href="../css/stylesheet.css" media="screen"/> 
		<script type="text/javascript" src="filename.js"></script>
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
        <link href="http://fonts.googleapis.com/css?family=Oswald|Open+Sans" rel="stylesheet" type="text/css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    </head>
    
    <body>
    <div id="nav">
        	<ul id="navul">
            	<li class="navli"><a class="nava-active" href="../index.html">HOME</a></li>
                <li class="navli"><a class="nava" href="../gallery.html">GALLERY</a></li>
                <li class="navli"><a class="nava" href="../stats.html">STATISTICS</a></li>
                <li class="navli"><a class="nava" href="../datacapture.html">DATA CAPTURE</a></li>
                <li class="navli"><a class="nava" href="login.php">DATA SEARCH</a></li>
            </ul>
        </div>
    	<div id="content">
        	<h1 class="header1">Login To Access Data Search</h1>
            <div id="login-container">
           	 	<form id="loginform" method="post" action="">
                	<p class="FieldHeading">Username:</p><br>
            		<input type="text" class="loginfield" name="username" placeholder="E.g. MY1CRT" required><br>
                    <p class="FieldHeading">Password:</p><br>
                    <input type="password" class="loginfield" name="password" placeholder="E.g. 1506548" required><br>
                    <button id="loginbutton" type="submit" name="login">Login</button>
            	</form>
            </div>
        </div>
    </body>
</html>