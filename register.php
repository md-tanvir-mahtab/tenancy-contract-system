
<?php
	include "includes/dbConnect.php";
	session_start();
?>

<?php

  $fName = $lName = $pwd = $nid = $phone = $email = $dob = $gender = $userAddress = $err = $uNidInDB = "" ;
	
	
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    if(!empty($_POST['fName'])){
      $fName = mysqli_real_escape_string($conn, $_POST['fName']);
    }
    if(!empty($_POST['lName'])){
      $lName = mysqli_real_escape_string($conn, $_POST['lName']);
    }
    if(!empty($_POST['pwd'])){
      $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
      $uPassToDB = password_hash($pwd, PASSWORD_DEFAULT);
    }
    if(!empty($_POST['nid'])){
      $nid = mysqli_real_escape_string($conn, $_POST['nid']);
    }
    if(!empty($_POST['phone'])){
      $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    }
    if(!empty($_POST['email'])){
      //$email = mysqli_real_escape_string($conn, $_POST['email']);
    	$tempEmail = mysqli_real_escape_string($conn, $_POST['email']);
    	$email = "'".$tempEmail."'";
    }
    else{
    	$email = mysqli_real_escape_string($conn, "NULL");
    }
    if(!empty($_POST['dob'])){
      //$dob = mysqli_real_escape_string($conn, $_POST['dob']);
    	$tempDob = mysqli_real_escape_string($conn, $_POST['dob']);
    	$dob = "'".$tempDob."'";
    }
    else{
    	$dob = mysqli_real_escape_string($conn, "NULL");
    }
    if(!empty($_POST['gender'])){
      $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    }
    if(!empty($_POST['userAddress'])){
      $userAddress = mysqli_real_escape_string($conn, $_POST['userAddress']);
    }
    

    $sqlNidCheck = "SELECT nid FROM account WHERE nid = '$nid'";
    $result = mysqli_query($conn, $sqlNidCheck);

    while($row = mysqli_fetch_assoc($result)){
      $uNidInDB = $row['nid'];
    }

    if($uNidInDB == $nid){
      $err = "This NID already exists!";
    }
    else{
      $sql = "INSERT INTO account (fName, lName, pwd, nid, phone, email, dob, gender, userAddress) VALUES ('$fName','$lName','$uPassToDB', $nid,$phone, $email, $dob,'$gender', '$userAddress');";

      mysqli_query($conn, $sql);


    //redirection to the userPanel after successful query
  	$_SESSION['nid'] = $nid;
	header("Location: userPanel.php");

    }
  }

?>

<?php
  
  if(isset($_POST['btn_submit'])){
 
	  if(!empty($_POST['nid'])){
	      $nid = mysqli_real_escape_string($conn, $_POST['nid']);
	    }

	  $sqlNidCheck = "SELECT nid FROM images WHERE nid = '$nid'";
	    $result = mysqli_query($conn, $sqlNidCheck);

	    while($row = mysqli_fetch_assoc($result)){
	      $uNidInDB = $row['nid'];
	    }

	    if($uNidInDB != $nid){
		  $name = $_FILES['file']['name'];
		  $target_dir = "upload/userImages/";
		  $target_file = $target_dir . basename($_FILES["file"]["name"]);

		  // Select file type
		  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		  // Valid file extensions
		  $extensions_arr = array("jpg","jpeg","png","gif");

		  // Check extension
		  if( in_array($imageFileType,$extensions_arr) ){
		 
		     // Insert record
		  	 $query = "insert into images(userImage, nid) values('".$name."', $nid)";
		     mysqli_query($conn,$query);

		     $queryImage = "UPDATE account SET userImage = '".$name."' WHERE nid = $nid";
		     mysqli_query($conn,$queryImage);
		  
		     // Upload file
		     move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
			}
			else{
				$query = "insert into images(userImage, nid) values(NULL, $nid)";
				mysqli_query($conn,$query);
			}
	    }
 
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
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
				<h2>Register</h2>
				<p>Please fill in this form to create an account (<span style="color:red;">*</span> indicates the required field).</p>
				<form action="register.php" method="post" enctype="multipart/form-data">
					<table>
						<tr>
							<td><label for="">First Name: <span style="color:red;">*</span> </label></td>
							<td><input type="text" name="fName" value="" required></td>
						</tr>
						<tr>
							<td><label for="">Last Name: <span style="color:red;">*</span> </label></td>
							<td><input type="text" name="lName" value="" required></td>
						</tr>
						<tr>
							<td><label for="">Password: <span style="color:red;">*</span> </label></td>
							<td><input type="password" name="pwd" value="" required></td>
						</tr>
						<tr>
							<td><label for="">National ID: <span style="color:red;">*</span> </label></td>
							<td><input type="number" name="nid" value="" required></td>
						</tr>
						<tr>
							<td><label for="">Phone Number: <span style="color:red;">*</span> </label></td>
							<td><input type="number" name="phone" value="" required></td>
						</tr>
						<tr>
							<td><label for="">Email Address: </label></td>
							<td><input type="email" name="email" value=""></td>
						</tr>
						<tr>
							<td><label for="">Date of Birth: </label></td>
							<td><input type="date" name="dob" value=""></td>
						</tr>
						<tr>
							<td><label for="">Gender: <span style="color:red;">*</span> </label></td>
							<td>
								<input type="radio" name="gender" value="male" required> Male
						        <input type="radio" name="gender" value="female"> Female
						        <input type="radio" name="gender" value="other"> Other
							</td>
						</tr>
						<tr>
							<td><label for="">Photo: </label></td>
							<td><input type="file" name="file"></td>
						</tr>
						<tr>
							<td><label for="">Address: <span style="color:red;">*</span> </label></td>
							<td><textarea name="userAddress" rows="8" cols="80" required></textarea></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type="reset" name="btn_reset" value="Reset">
        						<input type="submit" name="btn_submit" value="Register"> <br>
        						<span style="color:red;"><?php echo $err; ?></span>
							</td>
						</tr>
					</table>
				</form>		
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