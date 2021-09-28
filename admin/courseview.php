<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ENTRY | View Course</title>
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
            <h1 align="center"><font color="#337033" size="5" face="Arial">Course List</font></h1><br/>
<?php

	if (isset($_POST['subcourse'])){
		
		$courseyrsec=$_POST['courseyrsec'];
		$major=$_POST['major'];
		$dept=$_POST['dept'];
		
		$trap = mysql_query("SELECT * FROM course WHERE CourseYrSection = '$courseyrsec'");
		$numrows = MYSQL_NUMROWS($trap);
	
		//($numrows == 0){
		if (!$trap) {
		die("Query to show fields table failed");
	
	mysql_query("INSERT INTO course(CourseYrSection,Major,DeptID) VALUES ('$courseyrsec','$major','$dept')");
	
			//}else{
				//echo "<font color='red'><b>Course already exist!!!</b></font>";
			//}
			}
	 if ($numberOfrows == $numrows);
	 {
	     echo 'bskan anu lg';
	 }
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

//$result = mysql_query("SELECT * FROM schedule.course");
$result = mysql_query("SELECT course.CourseID, department.Depart, course.CourseYrSection, course.Major
FROM department RIGHT JOIN course ON department.DeptID = course.DeptID");
	echo "<table class=\"data-table \" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
	<tr>
	<th width=\"30%\">Course Year Section</th>
	<th width=\"30%\">Major</th>
	<th width=\"30%\">Department</th>
	<th width=\"5%\">Edit</th>
	<th width=\"5%\">Delete</th>
	</tr></table><div class=\"data-wrapper\"><table class=\"data-table data-content\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">";
	$i=0;
	while($row = mysql_fetch_array($result))
  {
	$i=$i+1;
		if(($i%2)==0) 
				{
					$bgcolor ='#ffffff';
				}
			else
				{
					$bgcolor ='#fbf2d9';
				}  
				
				
				$courseid = $row['CourseID'];	
				$courseyrsec = $row['CourseYrSection'];
				$major = $row['Major'];
				$depart = $row['Depart'];

?>
<tr class="data-view" bgcolor="<?php echo $bgcolor; ?>">
<td width="30%"><?php echo $courseyrsec; ?></td>
<td width="30"><?php echo $major; ?></td>
<td width="30"><?php echo $depart; ?></td>
<td width="5%"><a href="editcourse.php?CourseID=<?php echo $courseid; ?>"> <img src='../images/edit.png ' alt="edit" width="16" height="16" border="0" /></a></td>
<td width="5%"><a href="deletecourse.php?CourseID=<?php echo $courseid; ?>"> <img src='../images/delete.png' alt="delete" width="16" height="16" onClick="return confirm('Are you sure you want to delete Course record of <?php
echo $courseyrsec;?>?')" /></a></td>
</tr>
<?php } ?>	
</table></div>

<br />
<br />
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

<script type="text/javascript">

function show_alert()
{
alert ("Teacher Name already exist!");
}

</script>