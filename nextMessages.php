<?php

include "includes/dbConnect.php";

if(isset($_POST['limitVal'])){
	$lv = $_POST['limitVal'];
	$messageQuery = "select * from contact limit $lv";
	$resultMessage = mysqli_query($conn, $messageQuery);
}
else if(isset($_POST['searchVal'])) {
	$sv = $_POST['searchVal'];
	$messageQuery = "select * from contact where email like '%$sv%'";
	$resultMessage = mysqli_query($conn, $messageQuery);
}
else if(isset($_POST['startingVal'])){
	$stv = $_POST['startingVal'];
	$messageQuery = "select * from contact limit $stv, 4";
	$resultMessage = mysqli_query($conn, $messageQuery);
}

while($row = mysqli_fetch_assoc($resultMessage)){
		?>
		
	<table>
		<tr>
		<td>
			<?php
				echo "<b>First Name: </b>".$row['fName']. "<br>";
                echo "<b>Last Name: </b>".$row['lName']. "<br>";
                echo "<b>Email Address: </b>".$row['email']. "<br>";
                echo "<b>Message: </b>".$row['message']. "<br><br>";
			?>
		</td>
		</tr>
	</table>
	<?php
		
	}

?>
