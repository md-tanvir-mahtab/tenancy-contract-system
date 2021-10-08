
<?php
	
      include "includes/dbConnect.php";

	  session_start();
	  if(!isset($_SESSION['nid'])){
	    header("Location: login.php");
	  }
	  else{  	
	    $temp = $_SESSION['nid'];
	    
	    $sqlNameCheck = "SELECT fName, lName FROM account WHERE nid = $temp";
	    $resultName = mysqli_query($conn, $sqlNameCheck);

	    while($row = mysqli_fetch_assoc($resultName)){
	      $fNameInDb = $row['fName'];
	      $lNameInDb = $row['lName'];
	    }
	  }
?>

<?php
  $perPage = 4;
  $a = 1;

  $apartQuery = "select * from apartment limit $perPage";
  $resultApart = mysqli_query($conn, $apartQuery);

  $totalApartQuery = "SELECT COUNT(*) as t_c FROM apartment";
  $resultTotalApart = mysqli_query($conn, $totalApartQuery);
  $rowTotalApart = mysqli_fetch_assoc($resultTotalApart);
  $tC = $rowTotalApart['t_c'];

  $np = ceil($tC/$perPage);

?>


<!DOCTYPE html>
<html>
<head>
	<title>User</title>
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script>

      $(document).ready(function(){
		  var i = 4;
      var j = 0;
		  $('#ldBtn').click(function(){
			  i = i+4;
			 $('#apartment').load('nextApartments.php',{limitVal: i});
		  });

      $('#searchBox').on('keyup',function(){
        $('#apartment').load('nextApartments.php',{searchVal: document.getElementById('searchBox').value});
      })

      $('#prevBtn').click(function(){
        j = j - 4;
		if(j<0){
        j=0;
       }
       $('#apartment').load('nextApartments.php',{startingVal: j});
       
		  });

      $('#nextBtn').click(function(){
        j = j + 4;

			 $('#apartment').load('nextApartments.php',{startingVal: j});
		  });

	  });

    </script>

</head>
<body>
	<div class="headersection template clear">
		<div class="logo">
			<a href="index.php"><img src="images/logo.png" alt="Logo"/></a>
			<h2>Tenancy Contract System</h2>
			<p>Your partner for better life</p>
		</div>
		<div class="social">
			<a href="#"><img src="images/social/facebook.png" alt="Facebook"/></a>
			<a href="#"><img src="images/social/twitter.png" alt="Twitter"/></a>
			<a href="#"><img src="images/social/linkedIn.png" alt="LinkedIn"/></a>
			<a href="#"><img src="images/social/googlePlus.png" alt="GooglePlus"/></a>
		</div>
	</div>
	<div class="navsection template">
		<div class="userPanelLeft template">
			<input type="text" name="search" id="searchBox" value="" placeholder="Search apartments by location...">
		</div>
		<div class="userPanelRight template">
			<div class="dropdown">
			  <label class="dropbtn"><?php echo "$fNameInDb"." "."$lNameInDb"; ?></label>
			  <div class="dropdown-content">
			    <label id="about">About</label>
			    <label id="update">Update profile</label>
			    <a style="text-decoration: none; color: black;" href="logout.php"><label>Logout</label></a>			    
			  </div>
			</div>

			<select id="role" name="role">
	          <option value="nothing" disabled selected>Role</option>
	          <option value="houseOwner">House owner</option>
	          <option value="tenant">Tenant</option>
        	</select>
		</div>
	</div>
	
	<div class="contentsection contemplate clear">
		<div id="outcome" class="singlecontent clear">
			<div class="about">

			    <div id="apartment">
					<?php

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

			    </div>
			    <div style="text-align: center;">	    	
    				<button class="btnpg" type="button" name="btnPrev" id="prevBtn">Previous</button>
					<button class="btnpg" type="button" name="btnNext" id="nextBtn">Next</button>			    	
			    </div>
			    
		
			</div>

		</div>
	</div>

	<script>
		var newTemp = <?php echo $temp; ?>;

		$(document).ready(function(){
		  $("#about").click(function(){
		    $("#outcome").load("profile.php", {'nidPass': newTemp});
		  });
		});
	</script>
	<script>
		var newTemp = <?php echo $temp; ?>;

		$(document).ready(function(){
		  $("#update").on("click", function(){
		    $("#outcome").load("updateProfile.php", {'nidPass': newTemp, 'bSubmit': '', 'file': ''});
		  });
		});
	</script>

	<script type="text/javascript">

		var newTemp = <?php echo $temp; ?>;
 
		$(document).ready(function(){
  			$("#role").on("change", function(){
    			if ($("#role").val() == "houseOwner") {
				    $("#outcome").load("houseOwner.php", {'nidPass': newTemp, 'buildingType': '', 'floorNum': '', 'facilities': '', 'description': '', 'rentalCost': '', 'apartmentImage': '', 'apartmentAddress': '', 'btn_submit': '', 'agreement_submit': ''}, myFunc);
				}
				else {
				    $("#outcome").load("tenant.php", {'nidPass': newTemp, 'buildingType': '', 'floorNum': '', 'facilities': '', 'description': '', 'rentalCost': '', 'apartmentImage': '', 'apartmentAddress': '', 'btn_submit': '', 'bType': '', 'ag_submit': ''}, myFunc);
				}
  			});
		});

	</script>

	<script>

		function myFunc(){
			var coll = document.getElementsByClassName("collapsible");
		var i;

		for (i = 0; i < coll.length; i++) {
		  coll[i].addEventListener("click", function() {
		    this.classList.toggle("active");
		    var content = this.nextElementSibling;
		    if (content.style.maxHeight){
		      content.style.maxHeight = null;
		    } else {
		      content.style.maxHeight = content.scrollHeight + "px";
		    }
		  });
		}

			}

	</script>

	<div class="footersection template clear">
		<div class="footermenu clear">
			<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="privacy.php">Privacy</a></li>
		</ul>
		</div>
		<p>&copy; Tenancy Contract System</p>
	</div>

</body>
</html>