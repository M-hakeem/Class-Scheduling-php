<?php
  require ("../includes/db.php");  

	$courseid =$_REQUEST['CourseID'];
	
	// sending query
	mysql_query("DELETE FROM course WHERE courseid = '$courseid'")
	or die(mysql_error());  	
	
	header("Location: courseview.php");
?>