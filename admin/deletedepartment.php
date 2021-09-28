<?php
  require ("../includes/db.php");  

	$deptid =$_REQUEST['DeptID'];
	
	// sending query
	mysql_query("DELETE FROM department WHERE deptid = '$deptid'")
	or die(mysql_error());  	
	
	header("Location: deptview.php");
?>