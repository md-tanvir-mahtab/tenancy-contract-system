<?php
	include "includes/dbConnect.php";
?>

<?php
		
  	if($_SERVER["REQUEST_METHOD"]=="POST"){
  		
  		if($_REQUEST['agreement_submit']=="Accept")
		{
		 //for query to the agreement table
      if(!empty($_POST['tenantNid'])){
    	$tenantNid = mysqli_real_escape_string($conn, $_POST['tenantNid']);
       }
       else{
    	$tenantNid = mysqli_real_escape_string($conn, "NULL");
       }

       if(!empty($_POST['agreementId'])){
    	$agreementId = mysqli_real_escape_string($conn, $_POST['agreementId']);
       }
       else{
    	$agreementId = mysqli_real_escape_string($conn, "NULL");
       }

       if(!empty($_POST['date'])){
    	$tempDate = mysqli_real_escape_string($conn, $_POST['date']);
    	$date = "'".$tempDate."'";
       }
      else{
    	$date = mysqli_real_escape_string($conn, "NULL");
       }

       //determining agreementStatus based on the existing value of the tenantStatus
      $sqlStatusCheck = "SELECT tenantStatus FROM agreement WHERE agreementId = $agreementId";
	  $resultStatusCheck = mysqli_query($conn, $sqlStatusCheck);

	  if($rowStatusCheck = mysqli_fetch_assoc($resultStatusCheck)){
	  	if($rowStatusCheck['tenantStatus'] == 1){
	  		$agreementStatus = 1;
	  	}
	  	else{
	  		$agreementStatus = 0;
	  	}
	  }

	  //inserting data into the agreement table
	  $sqlAgreementUpdate = "UPDATE agreement SET startDate = $date, ownerStatus = 1, agreementStatus = $agreementStatus WHERE agreementId = $agreementId;";
		mysqli_query($conn, $sqlAgreementUpdate);

	  //for update query to the mapper table
	    $sqlMapperUpdate = "UPDATE mapper SET tenantNid = $tenantNid WHERE agreementId = $agreementId;";
		mysqli_query($conn, $sqlMapperUpdate);
		
		}
		else if($_REQUEST['agreement_submit']=="Withdraw")
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
	       
	       $sqlStatusCheck = "SELECT tenantStatus FROM agreement WHERE agreementId = $agreementId";
	       $resultStatusCheck = mysqli_query($conn,$sqlStatusCheck);
	       $rowStatusCheck = mysqli_fetch_array($resultStatusCheck);

	       if($rowStatusCheck['tenantStatus'] == 0){
	    	$agreementStatus = 0;
	       }
	       else{
	    	$agreementStatus = 1;
	       }

	       $sqlStatusUpdate = "UPDATE agreement SET endDate = $date, ownerStatus = 0, agreementStatus = $agreementStatus WHERE agreementId = $agreementId";
	       mysqli_query($conn, $sqlStatusUpdate);
		}
  	}
  	header("Location: userPanel.php");
?>