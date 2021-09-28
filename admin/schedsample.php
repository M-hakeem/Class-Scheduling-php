		$sem=$_POST['sem'];
		$course=$_POST['course'];
		$subject=$_POST['subject'];
		$teacher=$_POST['teacher'];
		$room=$_POST['room'];
		$stime=$_POST['stime'];
		$etime=$_POST['etime'];
		$day=$_POST['day'];
		$year=$_POST['year'];
		
	mysql_query("INSERT INTO schedule.schedule(SemID,RoomID,CourseID,SubjectID,TeacherID,StimeID,EtimeID,DayID,YearID) 
	VALUES ('$sem','$course','$subject','$teacher','$room','$stime','$etime','$day','$year')");
			//echo "na save ko na !<br>";
			
	}
	
	$id = mysql_query("SELECT max(SchedID)as max_id from schedule");
	$row_id = mysql_fetch_array($id);
	$max_id = $row_id['max_id'];
	
	
	$row= mysql_query ("select SemID,CourseID from schedule where SchedID = '$max_id'");
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
	<br>
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
				$room = $row['RoomID'];	
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
	<td><a href="deletesched.php?SchedID=<?php echo $schedID; ?>"> <img src='images/delete.png' alt="delete" width="16" height="16" onClick="return confirm('Are you sure you want to delete subject record of # <?php
echo $schedID;?>?')" /></a></td>
</tr>
<?php } ?>	
</table>
<?php
mysql_close($con);
?>

$result = mysql_query("SELECT   `schedule`.*, `semester`.`Semester`, `course`.`CourseYrSection`, `subject`.`SubjectName`, `teacher`.`TeacherName`, `room`.`RoomName`,
 `time`.`Stime`, `time`.`Etime`, `day`.`Day`, `schoolyear`.`Year` 
 FROM `schedule`, `course`,`subject`,`teacher`, `room`,`time.Stime`, `time.Etime`,`day`,`schoolyear`  
 WHERE schedule.SemID=semester.SemID and schedule.courseID=course.courseID and schedule.SubjectID=subject.SubjectID and schedule.TeacherID=teacher.TeacherID and schedule.RoomID=room.RoomID  and schedule.TimeID=time.Stime.TimeID and schedule.TimeID=time.Etime.TimeID and schedule.DayID=day.DayID 
 and schedule.YearID=schoolyear.YearID ORDER BY `schedule`.`YearID` DESC;