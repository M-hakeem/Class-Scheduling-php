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
            <h1 align="center"><font color="#337033" size="5" face="Arial">Schedule List</font></h1>
<?php
	require ("../includes/db.php");
	
	if (isset($_POST['subsched'])){
		
		$sem=$_POST['sem'];
		$course=$_POST['course'];
		$subject=$_POST['subject'];
		$teacher=$_POST['teacher'];
		$room=$_POST['room'];
		$stime=$_POST['stime'];
		$etime=$_POST['etime'];
		$day=$_POST['day'];
		$year=$_POST['year'];z
	
	mysql_query("INSERT INTO schedule(SemID,CourseID,SubjectID,TeacherID,RoomID,StimeID,EtimeID,DayID,YearID) VALUES ('$sem','$course','$subject','$teacher','$room','$stime','$etime','$day',$year)");
			//echo "na save ko na !<br>";
	}
	
	$id = mysql_query("SELECT max(SchedID)as max_id from schedule");
	$row_id = mysql_fetch_array($id);
	$max_id = $row_id['max_id'];
	
	
	$row= mysql_query ("select SemID,CourseID,SubjectID,TeacherID,RoomID,StimeID,EtimeID,DayID,YearID from schedule WHERE SchedID = '$max_id'");
?>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("schedule", $con);

$result = mysql_query("SELECT * FROM schedule.schedule");
	echo "<table class=\"data-table\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
	<tr>
	<th>Semester</th>
	<th>Course</th>
	<th>Subject</th>
	<th>Teacher</th>
	<th>Room</th>
	<th>Starting Time</th>
	<th>Ending Time</th>
	<th>Day</th>
	<th>Year</th>
	<th>Edit</th>
	<th>Delete</th>
	</tr>";
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
				
				$schedID = $row['SchedID'];
				$sem = $row['SemID'];	
				$course = $row['CourseID'];
				$subject = $row['SubjectID'];
				$teacher = $row['TeacherID'];
				$room = $row['SubjectLabhrprday'];	
				$stime = $row['StimeID'];
				$etime = $row['EtimeID'];
				$day = $row['DayID'];
				$year = $row['YearID'];			
	?>
	<tr class="data-view" bgcolor="<?php echo $bgcolor; ?>">
	<td><?php echo $sem ?></td>
	<td><?php echo $course; ?></td>
	<td><?php echo $subject; ?></td>
	<td><?php echo $teacher; ?></td>
	<td><?php echo $room; ?></td>
    <td><?php echo $stime; ?></td>
	<td><?php echo $etime; ?></td>
	<td><?php echo $day; ?></td>
	<td><?php echo $year; ?></td>
	<td><a href="editsubject.php?SchedID=<?php echo $schedID; ?>"> <img src='images/edit.png ' alt="edit" width="16" height="16" border="0" />									</a></td>
	<td><a href="deletesubject.php?SchedID=<?php echo $schedID; ?>"> <img src='images/delete.png' alt="delete" width="16" height="16" onClick="return confirm('Are you sure you want to delete subject record of # <?php
echo $schedID;?>?')" /></a></td>
</tr>
<?php } ?>	
</table>
<?php
mysql_close($con);
?>
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