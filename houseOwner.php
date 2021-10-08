
<?php
	include "includes/dbConnect.php";
?>

<?php
	  
	  if(isset($_REQUEST['nidPass'])){


	  	if(!empty($_REQUEST['nidPass'])) { 
            $temp = $_REQUEST['nidPass'];

        }
	  

	  $bType = $fNum = $fclts = $desc = $rCost = $pTime = $advPayment = $apartAdd ="";


	  $sqlApartDetails = "SELECT * FROM apartment WHERE nid = $temp";
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

	    $sqlApartImg = "select apartmentImage from images where nid=$temp";
		$resultApartImg = mysqli_query($conn,$sqlApartImg);
		$rowApartImg = mysqli_fetch_array($resultApartImg);

		$apartImg = $rowApartImg['apartmentImage'];
		$apartImgSrc = "upload/apartmentImages/".$apartImg;

    }
	  
?>

<?php
	
	$fName = $lName = $phone = $email = $gender = $tenantAddress = $tenantImgSrc = $showAgreementId = "";
	$showTenantNid="N/A";

	//retrieving tenantNid from the mapper table based on ownerNid
	  $sqlGetTenantNid = "SELECT tenantNid FROM mapper WHERE ownerNid=$temp";
	  $resultGetTenantNid = mysqli_query($conn,$sqlGetTenantNid);
	  $rowGetTenantNid = mysqli_fetch_array($resultGetTenantNid);

	  if($rowGetTenantNid['tenantNid'] != NULL){
	    	$getTenantNid = $rowGetTenantNid['tenantNid'];
	    }
	    else{
	    	$getTenantNid = "NULL";
	    }

	//retrieving agreementId from the mapper table based on owner's nid and tenant's nid
	  $sqlGetAgreementId = "SELECT agreementId FROM mapper WHERE ownerNid = $temp AND tenantNid=$getTenantNid";
	  $resultGetAgreementId = mysqli_query($conn,$sqlGetAgreementId);
	  $rowGetAgreementId = mysqli_fetch_array($resultGetAgreementId);

	  if($rowGetAgreementId['agreementId'] != NULL){
	    	$getAgreementId = $rowGetAgreementId['agreementId'];
	    }
	    else{
	    	$getAgreementId = "NULL";
	    }

	//retrieving agreementStatus from the agreement table based on agreementId
	  $sqlGetAgreementStatus = "SELECT agreementStatus FROM agreement WHERE agreementId = $getAgreementId";
	  $resultGetAgreementStatus = mysqli_query($conn,$sqlGetAgreementStatus);
	  $rowGetAgreementStatus = mysqli_fetch_array($resultGetAgreementStatus);

	  if($rowGetAgreementStatus['agreementStatus'] != NULL){
	    	$agreementStatus = $rowGetAgreementStatus['agreementStatus'];
	    }
	    else{
	    	$agreementStatus = "NULL";
	    }

	if($agreementStatus==1){
  	  $showAgreementId = $getAgreementId;
  	  //fetching data from the account table based on tenantNid
	  $sqlTenantDetails = "SELECT * FROM account WHERE nid = $getTenantNid";
	  $resultTenantDetails = mysqli_query($conn, $sqlTenantDetails);

	  if($rowTenantDetails = mysqli_fetch_assoc($resultTenantDetails)){
	    
	    if($rowTenantDetails['fName'] != NULL){
	    	$fName = $rowTenantDetails['fName'];
	    }
	    else{
	    	$fName = "N/A";
	    }
	    if($rowTenantDetails['lName'] != NULL){
	    	$lName = $rowTenantDetails['lName'];
	    }
	    else{
	    	$lName = "N/A";
	    }
	    if($rowTenantDetails['nid'] != NULL){
	    	$showTenantNid = $rowTenantDetails['nid'];
	    }
	    else{
	    	$showTenantNid = "N/A";
	    }
	    if($rowTenantDetails['phone'] != NULL){
	    	$phone = $rowTenantDetails['phone'];
	    }
	    else{
	    	$phone = "N/A";
	    }
	    if($rowTenantDetails['email'] != NULL){
	    	$email = $rowTenantDetails['email'];
	    }
	    else{
	    	$email = "N/A";
	    }
	    if($rowTenantDetails['gender'] != NULL){
	    	$gender = $rowTenantDetails['gender'];
	    }
	    else{
	    	$gender = "N/A";
	    }
	    if($rowTenantDetails['userAddress'] != NULL){
	    	$tenantAddress = $rowTenantDetails['userAddress'];
	    }
	    else{
	    	$tenantAddress = "N/A";
	    }

	  }
	  else{
	  	$fName = "N/A";
	  	$lName = "N/A";
	  	$phone = "N/A";
	  	$email = "N/A";
	  	$gender = "N/A";
	  	$tenantAddress = "N/A";
	  }

	  //retrieving tenant's photo from the images table based on tenant's nid
	    $sqlTenantImg = "select userImage from images where nid=$getTenantNid";
		$resultTenantImg = mysqli_query($conn,$sqlTenantImg);
		$rowTenantImg = mysqli_fetch_array($resultTenantImg);

		$tenantImg = $rowTenantImg['userImage'];
		$tenantImgSrc = "upload/userImages/".$tenantImg;
	  }
	else{
		$showAgreementId = "N/A";
		$fName = "N/A";
	  	$lName = "N/A";
	  	$phone = "N/A";
	  	$email = "N/A";
	  	$gender = "N/A";
	  	$tenantAddress = "N/A";
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

	<button class="collapsible">Post/Update/Withdraw advertisement</button>
	<div class="content">
	  <form action="houseOwnerAdvertisement.php" method="post" enctype="multipart/form-data">
					<table>
						<tr>
							<td><label for="">Enter Your NID: </label></td>
							<td><input type="number" name="tempNid" value="" required></td>
						</tr>
						<tr>
							<td><label for="">Building Type: </label></td>
							<td><input type="text" name="buildingType" value=""></td>
						</tr>					
						<tr>
							<td><label for="">No. of Floors: </label></td>
							<td><input type="number" name="floorNum" value=""></td>
						</tr>
						<tr>
							<td><label for="">Facilities: </label></td>
							<td><input type="text" name="facilities" value=""></td>
						</tr>
						<tr>
							<td>
								<label for="">Short Description of the Rentable Apartments: </label><br>
								<label><small>(Position, No. of different rooms etc.)</small></label>
							</td>
							<td><textarea name="description" rows="8" cols="80"></textarea></td>
						</tr>
						<tr>
							<td><label for="">Rental Cost (in Tk.): </label></td>
							<td><input type="number" name="rentalCost" value=""></td>
						</tr>
						<tr>
							<td><label>Payment Time: </label></td>
							<td><input type="text" name="paymentTime" value=""></td>
						</tr>
						<tr>
							<td><label>Advance Payment (in Tk.): </label></td>
							<td><input type="number" name="advancePayment" value=""></td>
						</tr>
						<tr>
							<td><label for="">Picture of the Apartment: </label></td>
							<td><input type="file" name="file"></td>
						</tr>
						<tr>
							<td><label for="">Address: </label></td>
							<td><textarea name="apartmentAddress" rows="8" cols="80"></textarea></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type="reset" name="btn_reset" value="Reset">
        						<input type="submit" name="btn_submit" value="Post/Update">
        						<input type="submit" name="btn_submit" value="Withdraw">
							</td>
						</tr>
					</table>
				</form>
	</div>

	<button class="collapsible">Details of the tenants</button>
	<div class="content stdImage">
	  <table>
			<tr>
				<td>Photograph: </td>
				<td><img src='<?php echo $tenantImgSrc; ?>'></td>
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
				<td><label><?php echo $showTenantNid; ?></label></td>
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
				<td><label><?php echo $tenantAddress; ?></label></td>
			</tr>
		</table>
	</div>

	<button class="collapsible">Agreement</button>
	<div class="content stdImage">
	  <form action="houseOwnerAgreement.php" method="post" enctype="multipart/form-data">
	  	<p>I, as the house owner, accept/withdraw <input type="number" name="tenantNid" value="" placeholder="Enter tenant's NID"> with <input type="number" name="agreementId" value="" placeholder="Enter agreement ID"> as my tenant effective from <input type="date" name="date" value=""> on the basis of the insurance of following conditions-</p>
	  	<table>
			<tr>
				<td>Picture of the Apartment: </td>
				<td><img src='<?php echo $apartImgSrc; ?>'></td>
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
				<td>Rental Cost (in Tk.): </td>
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
			<tr>
				<td></td>
				<td>
					<input type="submit" name="agreement_submit" value="Accept">
        			<input type="submit" name="agreement_submit" value="Withdraw">
				</td>
			</tr>
		</table>
	  </form>
	</div>
	
</div>
