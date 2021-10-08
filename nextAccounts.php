<?php

include "includes/dbConnect.php";

if(isset($_POST['limitVal'])){
	$lv = $_POST['limitVal'];
	$userQuery = "select * from account limit $lv";
	$resultUser = mysqli_query($conn, $userQuery);
}
else if(isset($_POST['searchVal'])) {
	$sv = $_POST['searchVal'];
	$userQuery = "select * from account where nid like '%$sv%'";
	$resultUser = mysqli_query($conn, $userQuery);
}
else if(isset($_POST['startingVal'])){
	$stv = $_POST['startingVal'];
	$userQuery = "select * from account limit $stv, 4";
	$resultUser = mysqli_query($conn, $userQuery);
}

while($row = mysqli_fetch_assoc($resultUser)){
		$userImage = $row['userImage'];
        $userImageSrc = "upload/userImages/".$userImage;?>
		
	<table>
		<tr>
		<td>
			<?php echo "<img src='$userImageSrc'>"; ?>
		</td>

		<td>
			<?php
				echo "<b>First Name: </b>".$row['fName']. "<br>";
                echo "<b>Last Name: </b>".$row['lName']. "<br>";
                echo "<b>National ID: </b>".$row['nid']. "<br>";
                echo "<b>Phone Number: </b>".$row['phone']. "<br>";
                echo "<b>Email Address: </b>".$row['email']. "<br>";
                echo "<b>Date of Birth: </b>".$row['dob']. "<br>";
                echo "<b>Gender: </b>".$row['gender']. "<br>";
                echo "<b>Address: </b>".$row['userAddress']. "<br>";
                echo "<b>Account Status: </b>".$row['accountStatus']. "<br>";
			?>
		</td>
		</tr>
	</table>
	<?php
		
	}

?>
