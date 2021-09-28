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
	include ("../includes/db.php");
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
            <h1 align="center"><font color="#337033" size="5" face="Arial">Subject List</font></h1>
<?php
	require ("includes/db.php");
	
	if (isset($_POST['subsubject'])){
		
		$subjectcod=$_POST['subjectcod'];
		$subjectname=$_POST['subjectname'];
		$lechr=$_POST['lechr'];
		$labhr=$_POST['labhr'];
		$courseyrsec=$_POST['courseyrsec'];
		$subcat=$_POST['subcat'];
		$sem=$_POST['sem'];
		$dept=$_POST['dept'];
	
	mysql_query("INSERT INTO subject(SubjectCode,SubjectName,SubjectLabhrprday,SubjectLechrprday,SubjectCatID,CourseYrSec,SemID,Dept) VALUES ('$subjectcod','$subjectname','$lechr','$labhr','$courseyrsec','$subcat','$sem','$dept')");
			//echo "na save ko na !<br>";
	}
	
	$id = mysql_query("SELECT max(SubjectID)as max_id from subject");
	$row_id = mysql_fetch_array($id);
	$max_id = $row_id['max_id'];
	
	
	$row= mysql_query ("select SubjectCode,SubjectName,SubjectLabhrprday,SubjectLechrprday,SubjectCatID,CourseYrSec,SemID,Dept from subject WHERE SubjectID = '$max_id'");
?>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("schedule", $con);

$result = mysql_query("SELECT * FROM subject");

echo "<table border='2' align = 'center'>
<tr>
<th>Subject Code</th>
<th>Subject Name</th>
<th>Laboratory Hour/Day</th>
<th>Lecture Hour/Day</th>
<th>Subject Category</th>
<th>Course Year&amp;Section</th>
<th>Semester</th>
<th>Department</th>
</tr>";
while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['SubjectCode'] . "</td>";
  echo "<td>" . $row['SubjectName'] . "</td>";
  echo "<td>" . $row['SubjectLabhrprday'] . "</td>";
  echo "<td>" . $row['SubjectLechrprday'] . "</td>";
  echo "<td>" . $row['SubjectCatID'] . "</td>";
  echo "<td>" . $row['CourseYrSec'] . "</td>";
  echo "<td>" . $row['SemID'] . "</td>";
  echo "<td>" . $row['Dept'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
mysql_close($con);
?>
</div>
</div>
</div><!-- end #content-->
    
      <div<?php
    /*
     * @see includes/footer.php
	 * @code for footer and copyrights
	 */	
		include('../includes/footer.php');
	?>

</body>
</html>