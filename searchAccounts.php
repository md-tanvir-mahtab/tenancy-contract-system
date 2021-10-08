
<?php
    
      include "includes/dbConnect.php";
?>

<?php
  $perPage = 4;
  $a = 1;

  $userQuery = "select * from account limit $perPage";
  $resultUser = mysqli_query($conn, $userQuery);

  $totalUserQuery = "SELECT COUNT(*) as t_c FROM account";
  $resultTotalUser = mysqli_query($conn, $totalUserQuery);
  $rowTotalUser = mysqli_fetch_assoc($resultTotalUser);
  $tC = $rowTotalUser['t_c'];

  $np = ceil($tC/$perPage);

?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>

      $(document).ready(function(){
          var i = 4;
      var j = 0;
          $('#ldBtn').click(function(){
              i = i+4;
             $('#user').load('nextAccounts.php',{limitVal: i});
          });

      $('#searchBox').on('keyup',function(){
        $('#user').load('nextAccounts.php',{searchVal: document.getElementById('searchBox').value});
      })

      $('#prevBtn').click(function(){
        j = j - 4;
        if(j<0){
        j=0;
       }
       $('#user').load('nextAccounts.php',{startingVal: j});
       
          });

      $('#nextBtn').click(function(){
        j = j + 4;

             $('#user').load('nextAccounts.php',{startingVal: j});
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
            <input type="text" name="search" id="searchBox" value="" placeholder="Search accounts by NID...">
        </div>
    </div>
    
    <div class="contentsection contemplate clear">
        <div id="outcome" class="singlecontent clear">
            <div class="about">

                <div id="user">
                    <?php

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