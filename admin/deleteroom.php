<?php
  require ("../includes/db.php");  

	$roomid =$_REQUEST['RoomID'];
	
	// sending query
	mysql_query("DELETE FROM room WHERE roomid = '$roomid'")
	or die(mysql_error());  	
	
	header("Location: roomview.php");
?>