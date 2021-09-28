<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>s
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADD ENTRY</title>
<link href="css/style.css" rel="stylesheet"/>
<link href="css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
	include ("includes/db.php");
	include ("session.php");
?>
<div id="wrapper">
	<?php
    /*
     * @see includes/header.php
	 * @code for header and navigation
	 */	
		include('includes/header.php');
	?>
	
	
	 <div id="content">
    		<div class="content-nav">
			<div class="content-wrap2" align="center">
            <h1 align="center"><font color="#337033" size="5" face="Arial">Course List</font></h1>
<?php
	require ("includes/db.php");
	
	if (isset($_POST['subteacher'])){
		
		$teacher=$_POST['teacher'];
		$acadrank=$_POST['acadrank'];
		$desig=$_POST['desig'];
		$dept=$_POST['dept'];
	
	mysql_query("INSERT INTO teacher(TeacherName,AcadRank,Designation,DeptID) VALUES ('$teacher','$acadrank','$desig','$dept')");
			//echo "na save ko na !<br>";
	}
	
	$id = mysql_query("SELECT max(TeacherID)as max_id from teacher");
	$row_id = mysql_fetch_array($id);
	$max_id = $row_id['max_id'];
	
	
	$row= mysql_query ("select TeacherName,AcadRank,Designation,DeptID from teacher where TeacherID = '$max_id'");
?>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("schedule", $con);

$result = mysql_query("SELECT * FROM teacher");

echo "<table border='2' align = 'center'>
<tr>
<th>Teacher Name</th>
<th>Academic Rank</th>
<th>Designation</th>
<th>Department</th>
</tr>";
while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['TeacherName'] . "</td>";
  echo "<td>" . $row['AcadRank'] . "</td>";
  echo "<td>" . $row['Designation'] . "</td>";
  echo "<td>" . $row['DeptID'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
mysql_close($con);
?>
</div>
</div>
</div><!-- end #content-->
    
      <?php
    /*
     * @see includes/footer.php
	 * @code for footer and copyrights
	 */	
		include('includes/footer.php');
	?>

</body>
</html>