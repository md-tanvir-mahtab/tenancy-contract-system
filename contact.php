<?php
	include "includes/dbConnect.php";
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		if(!empty($_POST['fName'])){
	      $fNameTemp = mysqli_real_escape_string($conn, $_POST['fName']);
    	  $fName = "'".$fNameTemp."'";
	    }
	    else{
	    	$fName = mysqli_real_escape_string($conn, "NULL");
	    }
	    if(!empty($_POST['lName'])){
	      $lNameTemp = mysqli_real_escape_string($conn, $_POST['lName']);
    	  $lName = "'".$lNameTemp."'";
	    }
	    else{
	    	$lName = mysqli_real_escape_string($conn, "NULL");
	    }
	    if(!empty($_POST['email'])){
	    	$tempEmail = mysqli_real_escape_string($conn, $_POST['email']);
	    	$email = "'".$tempEmail."'";
	    }
	    else{
	    	$email = mysqli_real_escape_string($conn, "NULL");
	    }
	    if(!empty($_POST['message'])){
	      $tempMessage = mysqli_real_escape_string($conn, $_POST['message']);
    	  $message = "'".$tempMessage."'";
	    }
	    else{
	    	$message = mysqli_real_escape_string($conn, "NULL");
	    }

	    $sql = "INSERT INTO contact (fName, lName, email, message) VALUES ($fName, $lName, $email, $message);";

        mysqli_query($conn, $sql);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Contact</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="headersection template clear">
		<div class="logo">
			<a href="index.php"><img src="images/logo.png" alt="Logo"/></a>
			<h2>Tenancy Contract System</h2>
			<p>Your partner for better life</p>
		</div>
		<div class="social">
			<a href="#"><img src="images/social/facebook.png" alt="Facebook"/></a>
			<a href="#"><img src="images/social/twitter.png" alt="Twitter"/></a>
			<a href="#"><img src="images/social/linkedIn.png" alt="LinkedIn"/></a>
			<a href="#"><img src="images/social/googlePlus.png" alt="GooglePlus"/></a>
		</div>
	</div>
	<div class="navsection template clear">
		<div class="leftsection">
			<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="about.php">About</a></li>
			<li><a id="active" href="contact.php">Contact</a></li>
			<li><a href="privacy.php">Privacy</a></li>
			</ul>
		</div>
		<div class="rightsection">
			<ul>
			<li><a href="login.php">Login</a></li>
			<li><a href="register.php">Register</a></li>
			</ul>
		</div>
	</div>
	
	<div class="contentsection contemplate clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
				<form action="" method="post">
					<table>
						<tr>
							<td>First Name:</td>
							<td>
								<input type="text" name="fName" placeholder="Enter first name"/>
							</td>
						</tr>
						<tr>
							<td>Last Name:</td>
							<td>
								<input type="text" name="lName" placeholder="Enter last name"/>
							</td>
						</tr>
						<tr>
							<td>Email Address:</td>
							<td>
								<input type="email" name="email" placeholder="Enter email address" required/>
							</td>
						</tr>
						<tr>
							<td>Message:</td>
							<td>
								<textarea name="message" rows="8" cols="80" required></textarea>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type="submit" name="contactSubmit" value="Submit"/>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Latest posts</h2>
				<ul>
					<li><a href="post1.php">Stay home, Stay safe</a></li>
					<li><a href="post2.php">Notice for the employees</a></li>
					<li><a href="#">A special request to all the members</a></li>
					<li><a href="#">About legal aspects of agreement</a></li>
					<li><a href="#">Notice for the suspended accounts</a></li>
					<li><a href="#">General instructions for the members</a></li>
				</ul>
			</div>
			<div class="samesidebar clear">
				<h2>Useful links</h2>
				<ul>
					<li><a href="https://mohpw.gov.bd/">Ministry of housing and public works</a></li>
					<li><a href="https://mha.gov.bd/">Ministry of home affairs</a></li>
					<li><a href="#">Ministry of land</a></li>
					<li><a href="#">Ministry of disaster management and relief</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="footersection template clear">
		<div class="footermenu clear">
			<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="privacy.php">Privacy</a></li>
		</ul>
		</div>
		<p>&copy; Tenancy Contract System</p>
	</div>

</body>
</html>