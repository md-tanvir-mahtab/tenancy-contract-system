
<?php
	include "includes/dbConnect.php";
	session_start();
?>

<?php

  $nid = $pwd = $message = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	if(!empty($_POST['nid'])){
		$nid = mysqli_real_escape_string($conn, $_POST['nid']);
	}
	if(!empty($_POST['pwd'])){
		$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	}

	$sqlUserCheck = "SELECT nid, pwd, accountType, accountStatus FROM account WHERE nid = '$nid'";
	$result = mysqli_query($conn, $sqlUserCheck);
	$rowCount = mysqli_num_rows($result);

	if($rowCount < 1){
		$message = "User does not exist!";
	}
	else{
		while($row = mysqli_fetch_assoc($result)){
			$uPassInDB = $row['pwd'];
			$accountType = $row['accountType'];
			$accountStatus = $row['accountStatus'];

			if(password_verify($pwd, $uPassInDB)){
				if($accountType == "admin"){
					$_SESSION['nid'] = $nid;
					header("Location: adminPanel.php");
				}
				else{
					if($accountStatus != NULL){
						$message = "This account is suspended";
					}
					else{
						
						$_SESSION['nid'] = $nid;
						header("Location: userPanel.php");
					}
					
				}				
			}
			else{
				$message = "Wrong Password!";
			}
		}
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="privacy.php">Privacy</a></li>
		</ul>
	</div>
	
	<div class="contentsection contemplate clear">
		<div class="singlecontent clear">
			<div class="about">
				<h2>Login</h2>
				<p>Please provide following information to login.</p>
				<form action="login.php" method="post">
					<table>
						<tr>
							<td><label for="">National ID: </label></td>
							<td><input type="number" name="nid" value="" required></td>
						</tr>
						<tr>
							<td><label for="">Password: </label></td>
							<td>
								<input id="pwd" type="password" name="pwd" value="" required>
								<input type="checkbox" onclick="myFunction()">Show Password
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type="reset" name="btn_reset" value="Reset">
        						<input type="submit" name="login" value="Login">
        						<span style="color:red"><?php echo $message; ?></span> <br>
        						<span><b>Or Register <a href="register.php">here</a></b></span>
							</td>
						</tr>
					</table>
				</form>		
			</div>
		</div>
		
	</div>

	<script>
		function myFunction() {
		  var x = document.getElementById("pwd");
		  if (x.type === "password") {
		    x.type = "text";
		  } else {
		    x.type = "password";
		  }
		}
	</script>

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