<?php
	include "includes/dbConnect.php";
?>
<?php
	
	$buildingType = $floorNum = $facilities = $description = $rentalCost = $paymentTime = $advancePayment = $apartmentAddress = "" ;
	
	
  	if($_SERVER["REQUEST_METHOD"]=="POST"){
  		
  		if($_REQUEST['ag_submit']=="Accept")
		{
		 //for query to the agreement table
      if(!empty($_POST['tenantNid'])){
    	$tenantNid = mysqli_real_escape_string($conn, $_POST['tenantNid']);
       }
       else{
    	$tenantNid = mysqli_real_escape_string($conn, "NULL");
       }
      if(!empty($_POST['ownerNid'])){
    	$ownerNid = mysqli_real_escape_string($conn, $_POST['ownerNid']);
       }
       else{
    	$ownerNid = mysqli_real_escape_string($conn, "NULL");
       }

       if(!empty($_POST['date'])){
    	$tempDate = mysqli_real_escape_string($conn, $_POST['date']);
    	$date = "'".$tempDate."'";
       }
      else{
    	$date = mysqli_real_escape_string($conn, "NULL");
       }

       if(!empty($_POST['agreementApartId'])){
    	$agreementApartId = mysqli_real_escape_string($conn, $_POST['agreementApartId']);
       }
       else{
    	$agreementApartId = mysqli_real_escape_string($conn, "NULL");
       }

       //fetching data from apartment table based on apartment ID

      $sqlApartDetails = "SELECT * FROM apartment WHERE apartmentId = $agreementApartId AND nid = $ownerNid";
	  $resultApartDetails = mysqli_query($conn, $sqlApartDetails);

	  if($rowApartDetails = mysqli_fetch_assoc($resultApartDetails)){

	    if($rowApartDetails['buildingType'] != NULL){
	    	$tempBuildingType = $rowApartDetails['buildingType'];
	    	$buildingType = "'".$tempBuildingType."'";
	    }
	    else{
	    	$buildingType = "NULL";
	    }
	    if($rowApartDetails['floorNum'] != NULL){
	    	$floorNum = $rowApartDetails['floorNum'];
	    }
	    else{
	    	$floorNum = "NULL";
	    }
	    if($rowApartDetails['facilities'] != NULL){
	    	$tempFacilities = $rowApartDetails['facilities'];
	    	$facilities = "'".$tempFacilities."'";
	    }
	    else{
	    	$facilities = "NULL";
	    }
	    if($rowApartDetails['description'] != NULL){
	    	$tempDescription = $rowApartDetails['description'];
	    	$description = "'".$tempDescription."'";
	    }
	    else{
	    	$description = "NULL";
	    }
	    if($rowApartDetails['rentalCost'] != NULL){
	    	$rentalCost = $rowApartDetails['rentalCost'];
	    }
	    else{
	    	$rentalCost = "NULL";
	    }
	    if($rowApartDetails['paymentTime'] != NULL){
	    	$tempPaymentTime = $rowApartDetails['paymentTime'];
	    	$paymentTime = "'".$tempPaymentTime."'";
	    }
	    else{
	    	$paymentTime = "NULL";
	    }
	    if($rowApartDetails['advancePayment'] != NULL){
	    	$advancePayment = $rowApartDetails['advancePayment'];
	    }
	    else{
	    	$advancePayment = 'NULL';
	    }
	    if($rowApartDetails['apartmentAddress'] != NULL){
	    	$tempApartmentAddress = $rowApartDetails['apartmentAddress'];
	    	$apartmentAddress = "'".$tempApartmentAddress."'";
	    }
	    else{
	    	$apartmentAddress = "NULL";
	    }
	    if($rowApartDetails['nid'] != NULL){
	    	$ownerNid = $rowApartDetails['nid'];
	    }
	    else{
	    	$ownerNid = 'NULL';
	    }

	  }
	  else{
	  	$buildingType = "NULL";
	  	$floorNum = "NULL";
	  	$facilities = "NULL";
	  	$description = "NULL";
	  	$rentalCost = "NULL";
	  	$paymentTime = "NULL";
	  	$advancePayment = 'NULL';
	  	$apartmentAddress = "NULL";
	  	$ownerNid = "NULL";
	  }

	  //fetching apartment's image name from images table based on house owner's nid
	  $sqlApartImg = "SELECT apartmentImage FROM images WHERE nid=$ownerNid";
	  $resultApartImg = mysqli_query($conn,$sqlApartImg);
	  $rowApartImg = mysqli_fetch_array($resultApartImg);

	  if($rowApartImg['apartmentImage'] != NULL){
	    	$tempApartImg = $rowApartImg['apartmentImage'];
	    	$apartImg = "'".$tempApartImg."'";
	    }
	    else{
	    	$apartImg = "NULL";
	    }


       //inserting data into the agreement table

       $sql = "INSERT INTO agreement (apartmentId, buildingType, floorNum, facilities, description, rentalCost, paymentTime, advancePayment, apartmentImage, apartmentAddress, startDate, tenantStatus, agreementStatus) VALUES ($agreementApartId, $buildingType, $floorNum, $facilities, $description, $rentalCost, $paymentTime, $advancePayment, $apartImg, $apartmentAddress, $date, 1, 0);";
		mysqli_query($conn, $sql);

		//for query to the mapper table
	  $sqlAgreementId = "SELECT agreementId FROM agreement WHERE apartmentId = $agreementApartId";
	  $resultAgreementId = mysqli_query($conn,$sqlAgreementId);
	  $rowAgreementId = mysqli_fetch_array($resultAgreementId);

	  if($rowAgreementId['agreementId'] != NULL){
	    	$tempAgreementId = $rowAgreementId['agreementId'];
	    }
	    else{
	    	$tempAgreementId = "NULL";
	    }

	  $sqlMapper = "INSERT INTO mapper (ownerNid, tenantNid, agreementId) VALUES ($ownerNid, $tenantNid, $tempAgreementId);";
	  mysqli_query($conn, $sqlMapper);

		
		}
		else if($_REQUEST['ag_submit']=="Withdraw")
		{
		  
           if(!empty($_POST['agreementId'])){
	    	$agreementId = mysqli_real_escape_string($conn, $_POST['agreementId']);
	       }
	       if(!empty($_POST['date'])){
	    	$tempDate = mysqli_real_escape_string($conn, $_POST['date']);
	    	$date = "'".$tempDate."'";
	       }
	      else{
	    	$date = mysqli_real_escape_string($conn, "NULL");
	       }
	       
	       $sqlStatusCheck = "SELECT ownerStatus FROM agreement WHERE agreementId = $agreementId";
	       $resultStatusCheck = mysqli_query($conn,$sqlStatusCheck);
	       $rowStatusCheck = mysqli_fetch_array($resultStatusCheck);

	       if($rowStatusCheck['ownerStatus'] == 0){
	    	$agreementStatus = 0;
	       }
	       else{
	    	$agreementStatus = 1;
	       }

	       $sqlStatusUpdate = "UPDATE agreement SET endDate = $date, tenantStatus = 0, agreementStatus = $agreementStatus WHERE agreementId = $agreementId";
	       mysqli_query($conn, $sqlStatusUpdate);
		}
  	}
  	header("Location: userPanel.php");
?>