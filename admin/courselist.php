<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADD ENTRY</title>
<link href="../css/style.css" rel="stylesheet"/>
<link href="../css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../css/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../css/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
	require ("../includes/db.php");
	include ("../session.php");
?>
<div id="wrapper">
	<?php
    /*
     * @see includes/header.php
	 * @code for header and navigation
	 */	
		include('../includes/header.php');
	?>
	
	 <div id="content">
    		<div class="content-nav">
			<div class="content-wrap2" align="center">
            <h1 align="center"><font color="#337033" size="5" face="Arial">Course List</font></h1>
<?php
	require ("../includes/db.php");
	
	if (isset($_POST['subcourse'])){
		
		$courseyrsec=$_POST['courseyrsec'];
		$major=$_POST['major'];
		$dept=$_POST['dept'];
	
	mysql_query("INSERT INTO course(CourseYrSection,Major,DeptID) VALUES ('$courseyrsec','$major','$dept')");
			//echo "na save ko na !<br>";
	}
	
	$id = mysql_query("SELECT max(CourseID)as max_id from course");
	$row_id = mysql_fetch_array($id);
	$max_id = $row_id['max_id'];
	
	
	$row= mysql_query ("SELECT CourseYrSection,Major,DeptID from course where CourseID = '$max_id'");
?>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("schedule", $con);

$result = mysql_query("SELECT * FROM course");

echo "<table border='2' align = 'center'>
<tr>
<th>Course Year Section</th>
<th>Major</th>
<th>Department</th>
</tr>";
while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['CourseYrSection'] . "</td>";
  echo "<td>" . $row['Major'] . "</td>";
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
		include('../includes/footer.php');
	?>
   

</body>
</html>