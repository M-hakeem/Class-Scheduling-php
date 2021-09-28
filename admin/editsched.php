<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ENTRY | Edit Schedule</title>
<link href="../css/style.css" rel="stylesheet"/>
<link href='../images/favicon.ico' rel='icon' type='images/ico'/>
<link href="../css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../css/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../css/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
	require ("../includes/db.php");
	include ("../session.php");
$schedid =$_REQUEST['SchedID'];

$result =  mysql_query("SELECT * FROM schedule.schedule WHERE SchedID  = '$schedid'");
$row = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: data not found..");
		}
				$schedid = $row['SchedID'];	
				$sem = $row['SemID'];
				$year = $row['YearID'];	
				$course = $row['CourseID'];
				$subject = $row['SubjectID'];
				$teacher = $row['TeacherID'];
				$room = $row['RoomID'];
				$stime = $row['StimeID'];
				$etime = $row['EtimeID'];	
				$day = $row['DayID'];
				
if(isset($_POST['submit'])){
	
	$sem_save = $_POST['sem'];
	$year_save = $_POST['year'];
	$course_save = $_POST['course'];
	$subject_save = $_POST['subject'];
	$teacher_save = $_POST['teacher'];
	$room_save = $_POST['room'];
	$stime_save = $_POST['stime'];
	$etime_save = $_POST['etime'];
	$day_save = $_POST['day'];
	

	mysql_query("UPDATE schedule.schedule SET SemID ='$sem_save', YearID ='$year_save',
				CourseID ='$course_save', SubjectID ='$subject_save', TeacherID ='$teacher_save',
				RoomID ='$room_save', StimeID ='$stime_save', EtimeID ='$etime_save',
				DayID ='$day_save' WHERE SchedID = '$schedid'")or die(mysql_error()); 
	echo "Saved!";
	
	header("Location: scheduleview.php");
				
}

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
			<div class="content-wrap" align="center">
        			<h1>Enter New Schedule</h1><br/><br/>
				<form method="post"> 
				<div class="content"> </div> <table>
				<tr>
					<td><label>Semester:</label></td>
					<td><select name="sem" id="sem" style="width:300px" onfocus="searchfield_focus(this)" value="<?php echo $sem; ?>"/>
						<?php
							$id=mysql_query("SELECT max(SemID)as max_id from semester");
							$row_id = mysql_fetch_array($id);
							$max_id= $row_id ['max_id'];

							$row = mysql_query ("SELECt Semester FROM semester where SemID = 	'$max_id'");

							$result = mysql_query("SELECT * FROM schedule.semester ORDER BY SemID");

						do{
						?>
						<option value="<?php echo $row['SemID'];?>"><?php echo $row['Semester'];?></option>
						<?php } while ($row = mysql_fetch_assoc($result));?>
						</select>
						</td>
				</tr>
				<tr>
					<td><label>School Year:</label></td>
					<td> <select name="year" id ="year" style="width:300px" value="<?php echo $year; ?>"/>
						<?php
							$id=mysql_query("SELECT max(YearID)as max_id from schoolyear");
							$row_id = mysql_fetch_array($id);
							$max_id= $row_id ['max_id'];

							$row = mysql_query ("SELECt Year FROM schoolyear where YearID = 	'$max_id'");

							$result = mysql_query("SELECT * FROM schedule.schoolyear ORDER BY YearID");

						do{
						?>
						<option value="<?php echo $row['YearID'];?>"><?php echo $row['Year'];?></option>
						<?php } while ($row = mysql_fetch_assoc($result));?>
						</select></td>
				</tr>
				<tr>
					<td><label>Course:</label></td>
					<td><select name="course"  id="course" style="width:300px" value="<?php echo $course; ?>"/>
						<?php
							$id=mysql_query("SELECT max(CourseID)as max_id from course");
							$row_id = mysql_fetch_array($id);
							$max_id= $row_id ['max_id'];

							$row = mysql_query ("SELECt CourseYrSection FROM course where CourseID = 	'$max_id'");

							$result = mysql_query("SELECT * FROM schedule.course ORDER BY CourseID");

						do{
						?>
						<option value="<?php echo $row['CourseID'];?>"><?php echo $row['CourseYrSection'];?></option>
						<?php } while ($row = mysql_fetch_assoc($result));?>
						</select></td>
				</tr>
				<tr>
					<td><label>Subject:</label></td>
					<td><select name="subject" id="subject" style="width:300px" value="<?php echo $subject; ?>"/>
						<?php
							$id=mysql_query("SELECT max(SubjectID)as max_id from subject");
							$row_id = mysql_fetch_array($id);
							$max_id= $row_id ['max_id'];

							$row = mysql_query ("SELECt SubjectName FROM subject where SubjectID = 	'$max_id'");

							$result = mysql_query("SELECT * FROM schedule.subject ORDER BY SubjectID");

						do{
						?>
						<option value="<?php echo $row['SubjectID'];?>"><?php echo $row['SubjectName'];?></option>
						<?php } while ($row = mysql_fetch_assoc($result));?>
						</select></td>
				</tr>
				<tr>
					<td><label>Teacher:</label></td>
					<td><select name="teacher" id="teacher" style="width:300px" value="<?php echo $teacher; ?>"/>
						<?php
							$id=mysql_query("SELECT max(TeacherID)as max_id from teacher");
							$row_id = mysql_fetch_array($id);
							$max_id= $row_id ['max_id'];

							$row = mysql_query ("SELECt TeacherName FROM teacher where TeacherID = 	'$max_id'");

							$result = mysql_query("SELECT * FROM schedule.teacher ORDER BY TeacherID");

						do{
						?>
						<option value="<?php echo $row['TeacherID'];?>"><?php echo $row['TeacherName'];?></option>
						<?php } while ($row = mysql_fetch_assoc($result));?>
						</select></td>
				</tr>
				<tr>
					<td><label>Room:</label></td>
					<td><select name="room" id="room" style="width:300px" value="<?php echo $room; ?>"/>
						<?php
							$id=mysql_query("SELECT max(RoomID)as max_id from room");
							$row_id = mysql_fetch_array($id);
							$max_id= $row_id ['max_id'];

							$row = mysql_query ("SELECt RoomName FROM room where RoomID = 	'$max_id'");

							$result = mysql_query("SELECT * FROM schedule.room ORDER BY RoomID");

						do{
						?>
						<option value="<?php echo $row['RoomID'];?>"><?php echo $row['RoomName'];?></option>
						<?php } while ($row = mysql_fetch_assoc($result));?>
						</select></td>
				</tr>
				<tr>
					<td><label>Starting Time:</label></td>
					<td><select name="stime" id="stime"  style="width:300px" value="<?php echo $stime; ?>"/>
						<?php
							$id=mysql_query("SELECT max(StimeID)as max_id from stime");
							$row_id = mysql_fetch_array($id);
							$max_id= $row_id ['max_id'];

							$row = mysql_query ("SELECt Stime FROM stime where StimeID = 	'$max_id'");

							$result = mysql_query("SELECT * FROM schedule.stime ORDER BY StimeID");

						do{
						?>
						<option value="<?php echo $row['StimeID'];?>"><?php echo $row['Stime'];?></option>
						<?php } while ($row = mysql_fetch_assoc($result));?>
						</select></td>
				</tr>
				<tr>
					<td><label>Ending Time:</label></td>
					<td><select name="etime" id="etime" style="width:300px" value="<?php echo $etime; ?>"/>
						<?php
							$id=mysql_query("SELECT max(EtimeID)as max_id from etime");
							$row_id = mysql_fetch_array($id);
							$max_id= $row_id ['max_id'];

							$row = mysql_query ("SELECt Etime FROM etime where EtimeID = 	'$max_id'");

							$result = mysql_query("SELECT * FROM schedule.etime ORDER BY EtimeID");

						do{
						?>
						<option value="<?php echo $row['EtimeID'];?>"><?php echo $row['Etime'];?></option>
						<?php } while ($row = mysql_fetch_assoc($result));?>
						</select></td>
				</tr>
				<tr>
					<td><label>Day:</label></td>
					<td> <select name="day" id="day" style="width:300px" value="<?php echo $day; ?>"/>
						<?php
							$id=mysql_query("SELECT max(DayID)as max_id from day");
							$row_id = mysql_fetch_array($id);
							$max_id= $row_id ['max_id'];

							$row = mysql_query ("SELECt Day FROM day where DayID = 	'$max_id'");

							$result = mysql_query("SELECT * FROM schedule.day ORDER BY DayID");

						do{
						?>
						<option value="<?php echo $row['DayID'];?>"><?php echo $row['Day'];?></option>
						<?php } while ($row = mysql_fetch_assoc($result));?>
						</select></td>	
				</tr>
				<tr>
					<td></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="submit" name="submit" value="" />
						<input type="submit" name="clear" class="clear_button" value="" /></td>
				</tr>
				</table>
               
				</form>				
			</div>						
       	 </div>
    </div> <!-- end #content-->
	<?php
		/*
		* @see includes/footer.php
		* @code for footer and copyrights
		*/	
		include('../includes/footer.php');
?>


</div>

</body>
</html>


 