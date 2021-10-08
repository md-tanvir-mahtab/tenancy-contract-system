<?php
	include "includes/dbConnect.php";
?>
<?php
	
	$buildingType = $floorNum = $facilities = $description = $rentalCost = $paymentTime = $advancePayment = $apartmentAddress = $uNidInAcc = $uNidInApart = "" ;

	
	
  	if($_SERVER["REQUEST_METHOD"]=="POST"){
  		
  		if($_REQUEST['btn_submit']=="Post/Update")
		{
		 //for query to the apartment table
		if(!empty($_POST['tempNid'])){
    	$tempNid = mysqli_real_escape_string($conn, $_POST['tempNid']);
       }


		 if(!empty($_POST['buildingType'])){
    	$tempBuildingType = mysqli_real_escape_string($conn, $_POST['buildingType']);
    	$buildingType = "'".$tempBuildingType."'";
       }
       else{
    	$buildingType = mysqli_real_escape_string($conn, "NULL");
       }
      if(!empty($_POST['floorNum'])){
    	$floorNum = mysqli_real_escape_string($conn, $_POST['floorNum']);
       }
       else{
    	$floorNum = mysqli_real_escape_string($conn, "NULL");
       }
      if(!empty($_POST['facilities'])){
    	$tempFacilities = mysqli_real_escape_string($conn, $_POST['facilities']);
    	$facilities = "'".$tempFacilities."'";
       }
       else{
    	$facilities = mysqli_real_escape_string($conn, "NULL");
       }
      if(!empty($_POST['description'])){
    	$tempDescription = mysqli_real_escape_string($conn, $_POST['description']);
    	$description = "'".$tempDescription."'";
       }
       else{
    	$description = mysqli_real_escape_string($conn, "NULL");
       }
      if(!empty($_POST['rentalCost'])){
    	$rentalCost = mysqli_real_escape_string($conn, $_POST['rentalCost']);
       }
       else{
    	$rentalCost = mysqli_real_escape_string($conn, "NULL");
       }
       if(!empty($_POST['paymentTime'])){
    	$tempPaymentTime = mysqli_real_escape_string($conn, $_POST['paymentTime']);
    	$paymentTime = "'".$tempPaymentTime."'";
       }
       else{
    	$paymentTime = mysqli_real_escape_string($conn, "NULL");
       }
       if(!empty($_POST['advancePayment'])){
    	$advancePayment = mysqli_real_escape_string($conn, $_POST['advancePayment']);
       }
       else{
    	$advancePayment = mysqli_real_escape_string($conn, "NULL");
       }
      if(!empty($_POST['apartmentAddress'])){
    	$tempApartAddress = mysqli_real_escape_string($conn, $_POST['apartmentAddress']);
    	$apartmentAddress = "'".$tempApartAddress."'";
       }
      else{
    	$apartmentAddress = mysqli_real_escape_string($conn, "NULL");
       }



      //fetching nid and phone from account
	  $sqlNidCheckAcc = "SELECT * FROM account WHERE nid = $tempNid";
	  $resultAcc = mysqli_query($conn, $sqlNidCheckAcc);

	  if($rowAcc = mysqli_fetch_assoc($resultAcc)){
	    $uNidInAcc = $rowAcc['nid'];
	    $phone = $rowAcc['phone'];
	  }
	  //fetching nid from apartment
	  $sqlNidCheckApart = "SELECT nid FROM apartment WHERE nid = $tempNid";
	  $resultApart = mysqli_query($conn, $sqlNidCheckApart);

	  if($rowApart = mysqli_fetch_assoc($resultApart)){
	    $uNidInApart = $rowApart['nid'];
	  }

	  //performing query based on checking
	  if($uNidInAcc == $tempNid && $uNidInApart != $tempNid){
	  	$sql = "INSERT INTO apartment (buildingType, floorNum, facilities, description, rentalCost, paymentTime, advancePayment, apartmentAddress, nid, phone) VALUES ($buildingType,$floorNum,$facilities, $description,$rentalCost,$paymentTime,$advancePayment, $apartmentAddress, $tempNid, $phone);";
		mysqli_query($conn, $sql);
	  }
	  else if($uNidInAcc == $tempNid && $uNidInApart == $tempNid){
	  	/*$sql = "INSERT INTO apartment (buildingType, floorNum, facilities, description, rentalCost, apartmentAddress) VALUES ('$buildingType','$floorNum','$facilities', '$description','$rentalCost', '$apartmentAddress') WHERE nid = $temp;";*/
	  	$sql = "UPDATE apartment SET buildingType=$buildingType, floorNum=$floorNum, facilities=$facilities, description=$description, rentalCost=$rentalCost, paymentTime=$paymentTime, advancePayment=$advancePayment, apartmentAddress=$apartmentAddress WHERE nid = $tempNid;";
		mysqli_query($conn, $sql);
	  }


	  //for query to the apartmentImages table
	  $sqlNidCheck = "SELECT nid FROM images WHERE nid = $tempNid";
	    $result = mysqli_query($conn, $sqlNidCheck);

	    while($row = mysqli_fetch_assoc($result)){
	      $uNidInDB = $row['nid'];
	    }

	    if($uNidInDB == $tempNid){
		  $name = $_FILES['file']['name'];
		  $target_dir = "upload/apartmentImages/";
		  $target_file = $target_dir . basename($_FILES["file"]["name"]);

		  // Select file type
		  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		  // Valid file extensions
		  $extensions_arr = array("jpg","jpeg","png","gif");

		  // Check extension
		  if( in_array($imageFileType,$extensions_arr) ){
		 
		     // Insert record
		  	 /*$query = "insert into images(apartmentImage) values('".$name."') where nid = $temp";*/
		  	 $query = "UPDATE images SET apartmentImage = '$name' WHERE nid = $tempNid;";
		     mysqli_query($conn,$query);
		     $nextQuery = "UPDATE apartment SET apartmentImage = '$name' WHERE nid = $tempNid;";
		     mysqli_query($conn,$nextQuery);
		  
		     // Upload file
		     move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
			}
			else{
				/*$query = "insert into images(apartmentImage) values(NULL) where nid = $temp";*/
				$query = "UPDATE images SET apartmentImage = NULL WHERE nid = $tempNid;";
				mysqli_query($conn,$query);
				$nextQuery = "UPDATE apartment SET apartmentImage = NULL WHERE nid = $tempNid;";
		     	mysqli_query($conn,$nextQuery);
			}
	    }

		}
		else if($_REQUEST['btn_submit']=="Withdraw")
		{
		  if(!empty($_POST['tempNid'])){
    	$tempNid = mysqli_real_escape_string($conn, $_POST['tempNid']);
       }

		  $queryWithdrawInfo = "DELETE FROM apartment WHERE nid = $tempNid;";
		  mysqli_query($conn,$queryWithdrawInfo);
		  $queryWithdrawImg = "UPDATE images SET apartmentImage = NULL WHERE nid = $tempNid;";
		  mysqli_query($conn,$queryWithdrawImg);
		}
  	}
  	header("Location: userPanel.php");
?>