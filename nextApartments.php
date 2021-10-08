<?php

include "includes/dbConnect.php";

if(isset($_POST['limitVal'])){
	$lv = $_POST['limitVal'];
	$apartQuery = "select * from apartment limit $lv";
	$resultApart = mysqli_query($conn, $apartQuery);
}
else if(isset($_POST['searchVal'])) {
	$sv = $_POST['searchVal'];
	$apartQuery = "select * from apartment where apartmentAddress like '%$sv%'";
	$resultApart = mysqli_query($conn, $apartQuery);
}
else if(isset($_POST['startingVal'])){
	$stv = $_POST['startingVal'];
	$apartQuery = "select * from apartment limit $stv, 4";
	$resultApart = mysqli_query($conn, $apartQuery);
}

while($row = mysqli_fetch_assoc($resultApart)){
		$apartImage = $row['apartmentImage'];
		$apartImageSrc = "upload/apartmentImages/".$apartImage;?>
		
	<table>
		<tr>
		<td>
			<?php echo "<img src='$apartImageSrc'>"; ?>
		</td>

		<td>
			<?php
				echo "<b>Apartment ID: </b>".$row['apartmentId']. "<br>";
				echo "<b>Building Type: </b>".$row['buildingType']. "<br>";
				echo "<b>Number of Floors: </b>".$row['floorNum']. "<br>";
				echo "<b>Facilities: </b>".$row['facilities']. "<br>";
				echo "<b>Brief Description: </b>".$row['description']. "<br>";
				echo "<b>Rental Cost (in Tk.): </b>".$row['rentalCost']. "<br>";
				echo "<b>Payment Time: </b>".$row['paymentTime']. "<br>";
				echo "<b>Advance Payment: </b>".$row['advancePayment']. "<br>";
				echo "<b>Address: </b>".$row['apartmentAddress']. "<br>";
				echo "<b>Contact Number: </b>".$row['phone']. "<br><br>";
			?>
		</td>
		</tr>
	</table>
	<?php
		
	}

?>
