<?php
  require ("../includes/db.php");  

	$yearid =$_REQUEST['YearID'];
	
	// sending query
	mysql_query("DELETE FROM schoolyear WHERE yearid = '$yearid'")
	or die(mysql_error());  	
	
	header("Location: yearview.php");
?>