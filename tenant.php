
<?php
	include "includes/dbConnect.php";
	//session_start();
?>

<?php
	  
	  if(isset($_REQUEST['nidPass'])){


	  	if(!empty($_REQUEST['nidPass'])) {
            $temp = $_REQUEST['nidPass'];

        }
	  

	  $bType = $fNum = $fclts = $desc = $rCost = $pTime = $advPayment = $apartAdd = $apartImgSrc ="";

	  //retrieving agreementId from the mapper table based on tenantNid
	  $sqlGetAgreementId = "SELECT agreementId FROM mapper WHERE tenantNid=$temp";
	  $resultGetAgreementId = mysqli_query($conn,$sqlGetAgreementId);
	  $rowGetAgreementId = mysqli_fetch_array($resultGetAgreementId);

	  if($rowGetAgreementId['agreementId'] != NULL){
	    	$getAgreementId = $rowGetAgreementId['agreementId'];
	    }
	    else{
	    	$getAgreementId = "NULL";
	    }


	  //fetching data from the agreement table based on agreementId
	  $sqlApartDetails = "SELECT * FROM agreement WHERE agreementId = $getAgreementId AND tenantStatus =1";
	  $resultApartDetails = mysqli_query($conn, $sqlApartDetails);

	  if($rowApartDetails = mysqli_fetch_assoc($resultApartDetails)){
	    
	    if($rowApartDetails['buildingType'] != NULL){
	    	$bType = $rowApartDetails['buildingType'];
	    }
	    else{
	    	$bType = "N/A";
	    }
	    if($rowApartDetails['floorNum'] != NULL){
	    	$fNum = $rowApartDetails['floorNum'];
	    }
	    else{
	    	$fNum = "N/A";
	    }
	    if($rowApartDetails['facilities'] != NULL){
	    	$fclts = $rowApartDetails['facilities'];
	    }
	    else{
	    	$fclts = "N/A";
	    }
	    if($rowApartDetails['description'] != NULL){
	    	$desc = $rowApartDetails['description'];
	    }
	    else{
	    	$desc = "N/A";
	    }
	    if($rowApartDetails['rentalCost'] != NULL){
	    	$rCost = $rowApartDetails['rentalCost'];
	    }
	    else{
	    	$rCost = "N/A";
	    }
	    if($rowApartDetails['paymentTime'] != NULL){
	    	$pTime = $rowApartDetails['paymentTime'];
	    }
	    else{
	    	$pTime = "N/A";
	    }
	    if($rowApartDetails['advancePayment'] != NULL){
	    	$advPayment = $rowApartDetails['advancePayment'];
	    }
	    else{
	    	$advPayment = "N/A";
	    }
	    if($rowApartDetails['apartmentImage'] != NULL){
	    	$apartImg = $rowApartDetails['apartmentImage'];
	    	$apartImgSrc = "upload/apartmentImages/".$apartImg;
	    }
	    
	    if($rowApartDetails['apartmentAddress'] != NULL){
	    	$apartAdd = $rowApartDetails['apartmentAddress'];
	    }
	    else{
	    	$apartAdd = "N/A";
	    }

	  }
	  else{
	  	$bType = "N/A";
	  	$fNum = "N/A";
	  	$fclts = "N/A";
	  	$desc = "N/A";
	  	$rCost = "N/A";
	  	$pTime = "N/A";
	  	$advPayment = "N/A";
	  	$apartAdd = "N/A";
	  }

    }
	  
?>

<?php
	
	$fName = $lName = $phone = $email = $gender = $ownerAddress = $ownerImgSrc = $showAgreementId = "";
	$showOwnerNid = "N/A";

	//retrieving ownerNid from the mapper table based on tenantNid
	  $sqlGetOwnerNid = "SELECT ownerNid FROM mapper WHERE tenantNid=$temp";
	  $resultGetOwnerNid = mysqli_query($conn,$sqlGetOwnerNid);
	  $rowGetOwnerNid = mysqli_fetch_array($resultGetOwnerNid);

	  if($rowGetOwnerNid['ownerNid'] != NULL){
	    	$getOwnerNid = $rowGetOwnerNid['ownerNid'];
	    }
	    else{
	    	$getOwnerNid = "NULL";
	    }

	//retrieving agreementId from the mapper table based on owner's nid and tenant's nid
	  $sqlFindAgreementId = "SELECT agreementId FROM mapper WHERE ownerNid = $getOwnerNid AND tenantNid = $temp";
	  $resultFindAgreementId = mysqli_query($conn,$sqlFindAgreementId);
	  $rowFindAgreementId = mysqli_fetch_array($resultFindAgreementId);

	  if($rowFindAgreementId['agreementId'] != NULL){
	    	$findAgreementId = $rowFindAgreementId['agreementId'];
	    }
	    else{
	    	$findAgreementId = "NULL";
	    }

	//retrieving agreementStatus from the agreement table based on agreementId
	  $sqlGetAgreementStatus = "SELECT agreementStatus FROM agreement WHERE agreementId = $findAgreementId";
	  $resultGetAgreementStatus = mysqli_query($conn,$sqlGetAgreementStatus);
	  $rowGetAgreementStatus = mysqli_fetch_array($resultGetAgreementStatus);

	  if($rowGetAgreementStatus['agreementStatus'] != NULL){
	    	$agreementStatus = $rowGetAgreementStatus['agreementStatus'];
	    }
	    else{
	    	$agreementStatus = "NULL";
	    }


	if($agreementStatus == 1){
	  	$showAgreementId = $findAgreementId;
	  	//fetching data from the account table based on ownerNid
	  $sqlOwnerDetails = "SELECT * FROM account WHERE nid = $getOwnerNid";
	  $resultOwnerDetails = mysqli_query($conn, $sqlOwnerDetails);

	  if($rowOwnerDetails = mysqli_fetch_assoc($resultOwnerDetails)){
	    
	    if($rowOwnerDetails['fName'] != NULL){
	    	$fName = $rowOwnerDetails['fName'];
	    }
	    else{
	    	$fName = "N/A";
	    }
	    if($rowOwnerDetails['lName'] != NULL){
	    	$lName = $rowOwnerDetails['lName'];
	    }
	    else{
	    	$lName = "N/A";
	    }

	    if($rowOwnerDetails['nid'] != NULL){
	    	$showOwnerNid = $rowOwnerDetails['nid'];
	    }
	    else{
	    	$showOwnerNid = "N/A";
	    }

	    if($rowOwnerDetails['phone'] != NULL){
	    	$phone = $rowOwnerDetails['phone'];
	    }
	    else{
	    	$phone = "N/A";
	    }
	    if($rowOwnerDetails['email'] != NULL){
	    	$email = $rowOwnerDetails['email'];
	    }
	    else{
	    	$email = "N/A";
	    }
	    if($rowOwnerDetails['gender'] != NULL){
	    	$gender = $rowOwnerDetails['gender'];
	    }
	    else{
	    	$gender = "N/A";
	    }
	    if($rowOwnerDetails['userAddress'] != NULL){
	    	$ownerAddress = $rowOwnerDetails['userAddress'];
	    }
	    else{
	    	$ownerAddress = "N/A";
	    }

	  }
	  else{
	  	$fName = "N/A";
	  	$lName = "N/A";
	  	$phone = "N/A";
	  	$email = "N/A";
	  	$gender = "N/A";
	  	$ownerAddress = "N/A";
	  }

	  //retrieving owner's photo from the images table based on owner's nid
	    $sqlOwnerImg = "select userImage from images where nid=$getOwnerNid";
		$resultOwnerImg = mysqli_query($conn,$sqlOwnerImg);
		$rowOwnerImg = mysqli_fetch_array($resultOwnerImg);

		$ownerImg = $rowOwnerImg['userImage'];
		$ownerImgSrc = "upload/userImages/".$ownerImg;
	  }
	else{
		$showAgreementId = "N/A";
		$fName = "N/A";
	  	$lName = "N/A";
	  	$phone = "N/A";
	  	$email = "N/A";
	  	$gender = "N/A";
	  	$ownerAddress = "N/A";
	  }
	  
?>

<style type="text/css">
		.collapsible {
	  background-color: #B7801C;
	  color: white;
	  cursor: pointer;
	  padding: 12px;
	  width: 100%;
	  border: 1px solid;
	  border-radius: 5px;
	  text-align: left;
	  outline: none;
	  font-size: 16px; 
	}

	.active, .collapsible:hover {
	  background-color: #E6AF4B;
	}

	.collapsible:after {
	  content: '\002B';
	  color: white;
	  font-weight: bold;
	  float: right;
	  margin-left: 5px;
	}

	.active:after {
	  content: "\2212";
	}

	.content {
	  padding: 0 18px;
	  max-height: 0;
	  overflow: hidden;
	  transition: max-height 0.2s ease-out;
	  background-color: #f1f1f1;
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

<div>
	
	<button class="collapsible">Details of the apartment and rental policy</button>
	<div class="content stdImage">
		 <table>
			<tr>
				<td>Picture of the Apartment: </td>
				<td><img src='<?php echo $apartImgSrc; ?>'></td>
			</tr>
			<tr>
				<td><label>Agreement ID: </label></td>
				<td><label><?php echo $getAgreementId; ?></label></td>
			</tr>
			<tr>
				<td><label>Building Type: </label></td>
				<td><label><?php echo $bType; ?></label></td>
			</tr>
			<tr>
				<td><label>No. of Floors: </label></td>
				<td><label><?php echo $fNum; ?></label></td>
			</tr>
			<tr>
				<td><label>Facilities: </label></td>
				<td><label><?php echo $fclts; ?></label></td>
			</tr>
			<tr>
				<td><label>Short Description of the Rentable Apartments: </label></td>
				<td><label><?php echo $desc; ?></label></td>
			</tr>
			
			<tr>
				<td><label>Rental Cost (in Tk.): </label></td>
				<td><label><?php echo $rCost; ?></label></td>
			</tr>
			<tr>
				<td><label>Payment Time: </label></td>
				<td><label><?php echo $pTime; ?></label></td>
			</tr>
			<tr>
				<td><label>Advance Payment (in Tk.): </label></td>
				<td><label><?php echo $advPayment; ?></label></td>
			</tr>
			
			<tr>
				<td>Address: </td>
				<td><label><?php echo $apartAdd; ?></label></td>
			</tr>
		</table>
	</div>

	<button class="collapsible">Details of the house owner</button>
	<div class="content stdImage">
	  <table>
			<tr>
				<td>Photograph: </td>
				<td><img src='<?php echo $ownerImgSrc; ?>'></td>
			</tr>
			<tr>
				<td><label>Agreement ID: </label></td>
				<td><label><?php echo $showAgreementId; ?></label></td>
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
				<td><label><?php echo $showOwnerNid; ?></label></td>
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
				<td><label>gender: </label></td>
				<td><label><?php echo $gender; ?></label></td>
			</tr>
			<tr>
				<td><label>Address: </label></td>
				<td><label><?php echo $ownerAddress; ?></label></td>
			</tr>
		</table>
	</div>

	<button class="collapsible">Agreement</button>
	<div class="content stdImage">
	  <form action="tenantAgreement.php" method="post" enctype="multipart/form-data">
	  	<p>I,<input type="number" name="tenantNid" value="" placeholder="Enter your NID">,as the tenant, accept/withdraw <input type="number" name="ownerNid" value="" placeholder="Enter house owner's NID"> as my house owner effective from <input type="date" name="date" value=""> on the basis of the insurance of conditions associated with <input type="number" name="agreementApartId" value="" placeholder="Enter (only when to accept) apartment ID"> and <input type="number" name="agreementId" value="" placeholder="Enter (only when to withdraw) agreement ID"></p>
	  	
		<input type="submit" name="ag_submit" value="Accept">
		<input type="submit" name="ag_submit" value="Withdraw">
		
	  </form>
	</div>
	
</div>
