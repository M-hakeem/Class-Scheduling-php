<?php
  require ("../includes/db.php");  

	$subjectid =$_REQUEST['SubjectID'];
	
	// sending query
	mysql_query("DELETE FROM subject WHERE subjectid = '$subjectid'")
	or die(mysql_error());  	
	
	header("Location: subjectview.php");
?>