<?php
	include "includes/dbConnect.php";
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
	<title>Home</title>
	<meta name="description" content="This website is about house/flat renting and tenancy contract">
	<meta name="keywords" content="apartment, flat, house, rooms, house owner, tenant, contract">
	<meta name="author" content="Mahtab Md. Tanvir">


<!--<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />-->
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
	<div class="navsection template clear">
		<div class="leftsection">
			<ul>
			<li><a id="active" href="index.php">Home</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="privacy.php">Privacy</a></li>
			</ul>
		</div>
		<div class="midsection template">
			<input type="text" name="search" id="searchBox" value="" placeholder="Search apartments by location...">
		</div>
		<div class="rightsection">
			<ul>
			<li><a href="login.php">Login</a></li>
			<li><a href="register.php">Register</a></li>
			</ul>
		</div>
		
	</div>
	<div class="slidersection template clear">
		<div id="slider">
            <a href="#"><img src="images/slideshow/slider1.jpg" alt="nature 1" /></a>
        </div>
	</div>
	<div class="contentsection contemplate clear">
		<div class="maincontent clear">
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
		<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Latest posts</h2>
				<ul>
					<li><a href="post1.php">Stay home, Stay safe</a></li>
					<li><a href="post2.php">Notice for the employees</a></li>
					<li><a href="#">A special request to all the members</a></li>
					<li><a href="#">About legal aspects of agreement</a></li>
					<li><a href="#">Notice for the suspended accounts</a></li>
					<li><a href="#">General instructions for the members</a></li>
				</ul>
			</div>
			<div class="samesidebar clear">
				<h2>Useful links</h2>
				<ul>
					<li><a href="https://mohpw.gov.bd/">Ministry of housing and public works</a></li>
					<li><a href="https://mha.gov.bd/">Ministry of home affairs</a></li>
					<li><a href="#">Ministry of land</a></li>
					<li><a href="#">Ministry of disaster management and relief</a></li>
				</ul>
			</div>
		</div>
	</div>
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

<script type="text/javascript" src="js/scrollToTop.js"></script>


</body>
</html>