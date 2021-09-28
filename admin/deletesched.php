<?php
  require ("../includes/db.php");  

	$schedID =$_REQUEST['SchedID'];
	
	// sending query
	mysql_query("DELETE FROM schedule WHERE schedID = '$schedID'")
	or die(mysql_error());  	
	
	header("Location: scheduleview.php");
?>