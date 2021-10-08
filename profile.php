<?php
	include "includes/dbConnect.php";
?>

<?php
	if(isset($_REQUEST['nidPass'])){

	  if(!empty($_REQUEST['nidPass'])) { 
	      $temp = $_REQUEST['nidPass'];
	  }
	}

	$fName = $lName = $phone = $email = $gender = $address = $userImgSrc = "";

	$sqlUserDetails = "SELECT * FROM account WHERE nid = $temp";
	  $resultUserDetails = mysqli_query($conn, $sqlUserDetails);

	  if($rowUserDetails = mysqli_fetch_assoc($resultUserDetails)){
	    
	    if($rowUserDetails['fName'] != NULL){
	    	$fName = $rowUserDetails['fName'];
	    }
	    else{
	    	$fName = "N/A";
	    }
	    if($rowUserDetails['lName'] != NULL){
	    	$lName = $rowUserDetails['lName'];
	    }
	    else{
	    	$lName = "N/A";
	    }
	    
	    if($rowUserDetails['nid'] != NULL){
	    	$nid = $rowUserDetails['nid'];
	    }
	    else{
	    	$nid = "N/A";
	    }
	    if($rowUserDetails['phone'] != NULL){
	    	$phone = $rowUserDetails['phone'];
	    }
	    else{
	    	$phone = "N/A";
	    }
	    if($rowUserDetails['email'] != NULL){
	    	$email = $rowUserDetails['email'];
	    }
	    else{
	    	$email = "N/A";
	    }
	    if($rowUserDetails['dob'] != NULL){
	    	$dob = $rowUserDetails['dob'];
	    }
	    else{
	    	$dob = "N/A";
	    }
	    if($rowUserDetails['gender'] != NULL){
	    	$gender = $rowUserDetails['gender'];
	    }
	    else{
	    	$gender = "N/A";
	    }
	    if($rowUserDetails['userAddress'] != NULL){
	    	$address = $rowUserDetails['userAddress'];
	    }
	    else{
	    	$address = "N/A";
	    }

	  }
	  else{
	  	$fName = "N/A";
	  	$lName = "N/A";
	  	$pwd = "N/A";
	  	$nid = "N/A";
	  	$phone = "N/A";
	  	$email = "N/A";
	  	$dob = "N/A";
	  	$gender = "N/A";
	  	$address = "N/A";
	  }

	  //retrieving user's photo from the images table based on user's nid
	    $sqlUserImg = "select userImage from images where nid=$temp";
		$resultUserImg = mysqli_query($conn,$sqlUserImg);
		$rowUserImg = mysqli_fetch_array($resultUserImg);

		$userImg = $rowUserImg['userImage'];
		$userImgSrc = "upload/userImages/".$userImg;
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

	.stdImage img{
	background: #fff none repeat scroll 0 0;
	border: 1px solid #9B999A;
	float: left;
	margin-right: 10px;
	padding: 5px;
	width: 200px;
	}
</style>

<div class="collapsible">Profile</div>
<div class="content stdImage">
  <table>
		<tr>
			<td>Photograph: </td>
			<td><img src='<?php echo $userImgSrc; ?>'></td>
		</tr>
		<tr>
			<td><label>First Name: </label></td>
			<td><label><?php echo $fName; ?></label></td>
		</tr>
		<tr>
			<td><label>Last Name: </label></td>
			<td><label><?php echo $lName; ?></label></td>
		</tr>
		
		<tr>
			<td><label>National ID: </label></td>
			<td><label><?php echo $nid; ?></label></td>
		</tr>
		<tr>
			<td><label>Phone Number: </label></td>
			<td><label><?php echo $phone; ?></label></td>
		</tr>
		<tr>
			<td><label>Email Address: </label></td>
			<td><label><?php echo $email; ?></label></td>
		</tr>
		<tr>
			<td><label>Date of Birth: </label></td>
			<td><label><?php echo $dob; ?></label></td>
		</tr>
		
		<tr>
			<td><label>gender: </label></td>
			<td><label><?php echo $gender; ?></label></td>
		</tr>
		<tr>
			<td><label>Address: </label></td>
			<td><label><?php echo $address; ?></label></td>
		</tr>
	</table>
</div>