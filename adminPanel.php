
<?php
	
      include "includes/dbConnect.php";

	  session_start();
	  if(!isset($_SESSION['nid'])){
	    header("Location: login.php");
	  }
	  else{  	
	    $temp = $_SESSION['nid'];
	    
	    $sqlNameCheck = "SELECT fName, lName FROM account WHERE nid = $temp";
	    $resultName = mysqli_query($conn, $sqlNameCheck);

	    while($row = mysqli_fetch_assoc($resultName)){
	      $fNameInDb = $row['fName'];
	      $lNameInDb = $row['lName'];
	    }
	  }
?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<style type="text/css">
		.collapsible {
	  background-color: #B7801C;
	  color: white;
	  padding: 12px;
	  width: 98%;
	  border: 1px solid;
	  border-radius: 5px;
	  text-align: left;
	  outline: none;
	  font-size: 16px; 
	}

	.stdImage img{
	background: #fff none repeat scroll 0 0;
	border: 1px solid #9B999A;
	float: left;
	margin-right: 10px;
	padding: 5px;
	width: 200px;
	}
</style>

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
	<div class="navsection template">
		<div class="userPanelLeft template">
			<label class="dropbtn">Admin Dashboard</label>
		</div>
		<div class="userPanelRight template">
			<div class="dropdown">
			  <label class="dropbtn"><?php echo "$fNameInDb"." "."$lNameInDb"; ?></label>
			  <div class="dropdown-content">
			    <label id="about">About</label>
			    <label id="update">Update profile</label>
			    <a style="text-decoration: none; color: black;" href="logout.php"><label>Logout</label></a>			    
			  </div>
			</div>
		</div>
	</div>
	
	<div class="contentsection contemplate clear">
		<div id="outcome" class="singlecontent clear">
			<div class="collapsible">
				<a style="text-decoration: none; color: white;" href="searchAccounts.php"><label style="cursor: pointer;">Search accounts</label></a>
			</div>
			<div class="collapsible">
				<a style="text-decoration: none; color: white;" href="searchApartments.php"><label style="cursor: pointer;">Search apartments</label></a>
			</div>
			<div class="collapsible">
				<a style="text-decoration: none; color: white;" href="showMessages.php"><label style="cursor: pointer;">Show messages</label></a>
			</div>
			<div class="collapsible">Disciplinary actions</div>
			<div>
				<form action="disciplinaryActions.php" method="post">
					<table>
						<tr>
							<td><label>Enter NID: </label></td>
							<td><input type="number" name="uNid" value="" required></td>
						</tr>
						<tr>
							<td><label>Action Type: </label></td>
							<td>
								<input type="radio" name="discAction" value="suspend" required> Suspend
			        			<input type="radio" name="discAction" value="remove"> Remove
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="bSub" value="Go"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>



	<script>
		var newTemp = <?php echo $temp; ?>;

		$(document).ready(function(){
		  $("#about").click(function(){
		    $("#outcome").load("profile.php", {'nidPass': newTemp});
		  });
		});
	</script>
	<script>
		var newTemp = <?php echo $temp; ?>;

		$(document).ready(function(){
		  $("#update").on("click", function(){
		    $("#outcome").load("updateProfile.php", {'nidPass': newTemp, 'bSubmit': '', 'file': ''});
		  });
		});
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