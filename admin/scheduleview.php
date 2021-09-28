<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ENTRY | View Schedule</title>
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
            <h1 align="center"><font color="#337033" size="5" face="Arial">Schedule List</font></h1>
<?php
	require ("../includes/db.php");
	
	if (isset($_POST['subsched'])){
		
		$sem=$_POST['sem'];
		$year=$_POST['year'];
		$course=$_POST['course'];
		$subject=$_POST['subject'];
		$teacher=$_POST['teacher'];
		$room=$_POST['room'];
		$stime=$_POST['stime'];
		$etime=$_POST['etime'];
		$day=$_POST['day'];
	
	mysql_query("INSERT INTO schedule.schedule(SemID,YearID,CourseID,SubjectID,TeacherID,RoomID,StimeID,EtimeID,DayID) 
	VALUES ('$sem','$year','$course','$subject','$teacher','$room','$stime','$etime','$day')");
			//echo "na save ko na !<br>";

	}
	
	$id = mysql_query("SELECT max(SchedID)as max_id from schedule.schedule");
	$row_id = mysql_fetch_array($id);
	$max_id = $row_id['max_id'];
	
	
	$row= mysql_query ("SELECT SemID,YearID,CourseID,SubjectID,TeacherID,RoomID,StimeID,EtimeID,DayID FROM schedule.schedule
	WHERE SchedID = '$max_id'");
?>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("schedule", $con);

$result = mysql_query("SELECT schedule.SchedID, semester.Semester, course.CourseYrSection, subject.SubjectName, 
teacher.TeacherName, room.RoomName, stime.Stime, etime.Etime, day.Day, schoolyear.Year
FROM semester RIGHT JOIN (course RIGHT JOIN (subject RIGHT JOIN (teacher RIGHT JOIN (room RIGHT JOIN (stime RIGHT JOIN (etime RIGHT JOIN 
(day RIGHT JOIN (schoolyear RIGHT JOIN schedule 
ON schoolyear.YearID = schedule.YearID) ON day.DayID = schedule.DayID) ON etime.EtimeID = schedule.EtimeID) 
ON stime.StimeID = schedule.StimeID) ON room.roomID=schedule.RoomID) ON teacher.TeacherID=schedule.TeacherID)
ON subject.SubjectID=schedule.SubjectID) ON course.CourseID=schedule.CourseID) ON semester.SemID=schedule.SemID");

	echo "<table class=\"data-table\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
	<tr>
	<th width=\"10%\">Semester</th>
	<th width=\"10%\" >School Year</th>
	<th width=\"10%\">Course</th>
	<th width=\"10%\">Subject</th>
	<th width=\"10%\">Teacher</th>
	<th width=\"10%\">Room</th>
	<th width=\"10%\">Starting Time</th>
	<th width=\"10%\">Ending Time</th>
	<th width=\"10%\">Day</th>
	<th width=\"5%\">Edit</th>
	<th width=\"5%\">Delete</th>
	</tr></table><div class=\"data-wrapper\"><table class=\"data-table\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">";
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
				
				
				$schedid = $row['SchedID'];	
				
				$sem = $row['Semester'];
				$year = $row['Year'];
				$course = $row['CourseYrSection'];
				$subject = $row['SubjectName'];
				$teacher = $row['TeacherName'];	
				$room = $row['RoomName'];
				$stime = $row['Stime'];
				$etime = $row['Etime'];
				$day = $row['Day'];	
				
				
	?>
	<tr class="data-view" bgcolor="<?php echo $bgcolor; ?>">
	<td width="10%"><?php echo $sem; ?></td>
	<td width="10%"><?php echo $year; ?></td>
	<td width="10%"><?php echo $course; ?></td>
	<td width="10%"><?php echo $subject; ?></td>
	<td width="10%"><?php echo $teacher; ?></td>
	<td width="10%"><?php echo $room; ?></td>
    <td width="10%"><?php echo $stime; ?></td>
	<td width="10%"><?php echo $etime; ?></td>
	<td width="10%"><?php echo $day; ?></td>
	<td width="5%"><a href="editsched.php?SchedID=<?php echo $schedid; ?>"> <img src='../images/edit.png ' alt="edit" width="16" height="16" border="0" /></a></td>
	<td width="5%"><a href="deletesched.php?SchedID=<?php echo $schedid; ?>"> <img src='../images/delete.png' alt="delete" width="16" height="16" onClick="return confirm('Are you sure you want to delete Schedule record of # <?php
echo $schedid;?>?')" /></a></td>
</tr>
<?php } ?>	
</div></table>

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