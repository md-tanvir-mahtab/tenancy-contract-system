<?php
	include "includes/dbConnect.php";
?>

<?php
	if(isset($_REQUEST['nidPass'])){

	  if(!empty($_REQUEST['nidPass'])) {
	      $temp = $_REQUEST['nidPass'];
	  }
	}
?>

<?php

  $fName = $lName = $pwd = $phone = $email = $userAddress = $userImage = "" ;
  $fNamePrev = $lNamePrev = $pwdPrev = $phonePrev = $emailPrev = $userAddressPrev = $userImagePrev = "" ;	
  	
  	if($_REQUEST['bSubmit']=="Update"){
  	  
  	  if(!empty($_POST['nid'])){
		$nid = mysqli_real_escape_string($conn, $_POST['nid']);
	}
	if(!empty($_POST['pwd'])){
		$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	}

	$sqlUserCheck = "SELECT nid, pwd FROM account WHERE nid = '$nid'";
	$result = mysqli_query($conn, $sqlUserCheck);
	$rowCount = mysqli_num_rows($result);

	if($rowCount < 1){
		header("Location: userPanel.php");
	}
	else{
		if($row = mysqli_fetch_assoc($result)){
			$uPassInDB = $row['pwd'];

			if(password_verify($pwd, $uPassInDB)){
				$sqlUserDetails = "SELECT * FROM account WHERE nid = $nid";
	  $resultUserDetails = mysqli_query($conn, $sqlUserDetails);

	  if($rowUserDetails = mysqli_fetch_assoc($resultUserDetails)){
	    
	    if($rowUserDetails['fName'] != NULL){
	    	$fNamePrev = $rowUserDetails['fName'];
	    }
	    else{
	    	$fNamePrev = "NULL";
	    }
	    if($rowUserDetails['lName'] != NULL){
	    	$lNamePrev = $rowUserDetails['lName'];
	    }
	    else{
	    	$lNamePrev = "NULL";
	    }
	    if($rowUserDetails['pwd'] != NULL){
	    	$pwdPrev = $rowUserDetails['pwd'];
	    }
	    else{
	    	$pwdPrev = "NULL";
	    }
	    
	    if($rowUserDetails['phone'] != NULL){
	    	$phonePrev = $rowUserDetails['phone'];
	    }
	    else{
	    	$phonePrev = "NULL";
	    }
	    if($rowUserDetails['email'] != NULL){
	    	$tempEmailPrev = $rowUserDetails['email'];
	    	$emailPrev = "'".$tempEmailPrev."'";
	    }
	    else{
	    	$emailPrev = "NULL";
	    }
	    if($rowUserDetails['userAddress'] != NULL){
	    	$userAddressPrev = $rowUserDetails['userAddress'];
	    }
	    else{
	    	$userAddressPrev = "NULL";
	    }
	    if($rowUserDetails['userImage'] != NULL){
	    	$userImagePrev = $rowUserDetails['userImage'];
	    }
	    else{
	    	$userImagePrev = "NULL";
	    }

	  }

	
    if(!empty($_POST['fName'])){
      $fName = mysqli_real_escape_string($conn, $_POST['fName']);
    }
    else{
    	$fName = $fNamePrev;
    }
    if(!empty($_POST['lName'])){
      $lName = mysqli_real_escape_string($conn, $_POST['lName']);
    }
    else{
    	$lName = $lNamePrev;
    }
    if(!empty($_POST['phone'])){
      $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    }
    else{
    	$phone = $phonePrev;
    }
    if(!empty($_POST['email'])){
    	$tempEmail = mysqli_real_escape_string($conn, $_POST['email']);
    	$email = "'".$tempEmail."'";
    }
    else{
    	$email = $emailPrev;
    }
    if(!empty($_POST['userAddress'])){
      $userAddress = mysqli_real_escape_string($conn, $_POST['userAddress']);
    }
    else{
    	$userAddress = $userAddressPrev;
    }

    $sql = "UPDATE account SET fName='$fName', lName='$lName', phone=$phone, email=$email, userAddress='$userAddress' WHERE nid=$nid;";

    mysqli_query($conn, $sql);


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
	  	 $query = "UPDATE images SET userImage = '".$name."' WHERE nid= $nid;";
	     mysqli_query($conn,$query);

	     $queryImg = "UPDATE account SET userImage = '".$name."' WHERE nid= $nid;";
	     mysqli_query($conn,$queryImg);
	  
	     // Upload file
	     move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
	     //header("Location: userPanel.php");
		}

	header("Location: userPanel.php");
    
  	}
  	header("Location: userPanel.php");
			}
			else{
				header("Location: userPanel.php");
			}
		}
	}

?>

<style type="text/css">
		.collapsible {
	  background-color: #B7801C;
	  color: white;
	  padding: 12px;
	  width: 97%;
	  border: 1px solid;
	  border-radius: 5px;
	  text-align: left;
	  outline: none;
	  font-size: 16px; 
	}
</style>

<div class="collapsible">Update Profile</div>
<div>
	<form action="updateProfile.php" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td><label for="">National ID: </label></td>
				<td><input type="number" name="nid" value="" placeholder="Enter your NID" required></td>
			</tr>
			<tr>
				<td><label for="">Password: </label></td>
				<td><input type="password" name="pwd" value="" placeholder="Enter your password" required></td>
			</tr>
			<tr>
				<td><label for="">First Name: </label></td>
				<td><input type="text" name="fName" value=""></td>
			</tr>
			<tr>
				<td><label for="">Last Name: </label></td>
				<td><input type="text" name="lName" value=""></td>
			</tr>
			<tr>
				<td><label for="">Phone Number: </label></td>
				<td><input type="number" name="phone" value=""></td>
			</tr>
			<tr>
				<td><label for="">Email Address: </label></td>
				<td><input type="email" name="email" value=""></td>
			</tr>
			<tr>
				<td><label for="">Photo: </label></td>
				<td><input type="file" name="file"></td>
			</tr>
			<tr>
				<td><label for="">Address: </label></td>
				<td><textarea name="userAddress" rows="8" cols="80"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="reset" name="btn_reset" value="Reset">
					<input type="submit" name="bSubmit" value="Update">
				</td>
			</tr>
		</table>
	</form>
</div>