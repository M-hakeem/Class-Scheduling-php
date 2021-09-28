<?php
  require ("../includes/db.php");  

	$teacherid =$_REQUEST['TeacherID'];
	
	// sending query
	mysql_query("DELETE FROM teacher WHERE teacherid = '$teacherid'")
	or die(mysql_error());  	
	
	header("Location: teacherview.php");
?>