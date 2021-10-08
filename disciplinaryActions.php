<?php
	include "includes/dbConnect.php";

	if($_REQUEST['bSub']=="Go"){
		if(!empty($_POST['uNid'])){
	      $nid = mysqli_real_escape_string($conn, $_POST['uNid']);
	    }
	    if(!empty($_POST['discAction'])){
      	$discAction = mysqli_real_escape_string($conn, $_POST['discAction']);
    }

    if($discAction=="suspend"){
    	$sql = "UPDATE account SET accountStatus = 0 WHERE nid=$nid;";//account status 0 means suspended while default null means ok
		mysqli_query($conn, $sql);
    }
    else if($discAction=="remove"){
    	$sql = "DELETE FROM account WHERE nid=$nid;";
		mysqli_query($conn, $sql);

		$sql = "DELETE FROM apartment WHERE nid=$nid;";
		mysqli_query($conn, $sql);

		$sql = "DELETE FROM images WHERE nid=$nid;";
		mysqli_query($conn, $sql);
    }

    header("Location: adminPanel.php");
	}
?>
