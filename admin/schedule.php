<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SCHEDULE | Add Schedule</title>
<link href="../css/style.css" rel="stylesheet"/>
<link href="../css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../css/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../css/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<?php
	require ("../includes/db.php");
	include ("../session.php");	

	$flagsem = "";
	$flagyear = "";
	$flagcourse = "";
	$flagsubject = "";
	$flagteacher = "";
	$flagroom = "";
	$flagstime = "";
	$flagetime = "";
	$flagday = "";
	
if (isset($_POST['subsched'])) :		
			
		$sem=$_POST['sem'];
		$year=$_POST['year'];
		$course=$_POST['course'];
		$subject=$_POST['subject'];
		$teacher=$_POST['teacher'];
		$room=$_POST['room'];
		$stime=$_POST['stime'];
		$etime=$_POST['etime'];
		$day=$_POST['day'];
	
	if (trim($sem) == ""){ $flagsem = 'Required Field.';}	
	if (trim($year) == ""){ $flagyear = 'Required Field.';}
	if (trim($course) == ""){ $flagcourse = 'Required Field.';}
	if (trim($subject) == ""){ $flagsubject = 'Required Field.';}
	if (trim($teacher) == ""){ $flagteacher = 'Required Field.';}	
	if (trim($room) == ""){ $flagroom = 'Required Field.';}
	if (trim($stime) == ""){ $flagstime = 'Required Field.';}
	if (trim($etime) == ""){ $flagetime = 'Required Field.';}
	if (trim($day) == ""){ $flagday = 'Required Field.';}
	
    if (($flagsem == "") &&  ($flagyear == "") &&  ($flagcourse == "") && ($flagsubject == "") && 
		($flagteacher == "") &&  ($flagroom == "") &&  ($flagstime == "") && ($flagetime == "") && ($flagday == "")) :
		//check for duplicate records
		
		$sem=$_POST['sem'];
		$year=$_POST['year'];
		$course=$_POST['course'];
		$subject=$_POST['subject'];
		$teacher=$_POST['teacher'];
		$room=$_POST['room'];
		$stime=$_POST['stime'];
		$etime=$_POST['etime'];
		$day=$_POST['day'];
		
		$trap = mysql_query("SELECT * FROM schedule.schedule WHERE StimeID = '$stime' AND EtimeID = '$etime' AND RoomID = '$room' AND DayID = '$day'");
		$numrows = MYSQL_NUMROWS($trap);
		echo $numrows;
        if ($numrows > 0) :
			?><body onLoad = "show_alert()"><?php
		     //$already_exist = '<font color="red">Room is already occupied at the choosen date and time, please check your schedule.</font>';
	    else:
			mysql_query("INSERT INTO schedule.schedule(SemID,YearID,CourseID,SubjectID,TeacherID,RoomID,StimeID,EtimeID,DayID) 
			VALUES ('$sem','$year','$course','$subject','$teacher','$room','$stime','$etime','$day')") or die(mysql_error());

					//echo "Your file has been saved in the database..";
					 header(
			 	"Location: scheduleview.php");
		endif;
				
   endif;
     
endif;
?>
<body>
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
			<form method="post" >
        			<h1>Enter New Schedule</h1><br/>
				<form action="scheduleview.php" method="post"> 
				<div class="content"> </div> <table>
				     
				<tr>
					<td><label>Semester:</label></td>
					<td><select name="sem" id="sem" style="width:300px" onchange="javascript: return optionList_SelectedIndex()"/>
						<?php
							$id=mysql_query("SELECT max(SemID)as max_id from semester");
							$row_id = mysql_fetch_array($id);
							$max_id= $row_id ['max_id'];

							$row = mysql_query ("SELECt Semester FROM semester where SemID = '$max_id'");

							$result = mysql_query("SELECT * FROM schedule.semester ORDER BY SemID");

						do{
						?>
						<option value="<?php echo $row['SemID'];?>"><?php echo $row['Semester'];?></option>
						<?php } while ($row = mysql_fetch_assoc($result));?>
						</select>
						</td>
						<td><?php echo ($flagsem) ? $flagsem : " " ?></td>
						<input type="hidden" id="hidden_SemID" name="hidden_SemID"  value="<?php echo $row['SemID'];?>" />
						<input type="hidden" id="hidden_Semester" name="hidden_Semester" value="<?php echo $row['Semester'];?>"/>
				</tr>
				<tr>
					<td><label>School Year:</label></td>
					<td> <select name="year" id ="year" style="width:300px" onchange="javascript: return optionList_SelectedIndex2()"/>
						<?php
							$id=mysql_query("SELECT max(YearID)as max_id from schoolyear");
							$row_id = mysql_fetch_array($id);
							$max_id= $row_id ['max_id'];

							$row = mysql_query ("SELECt Year FROM schoolyear where YearID = '$max_id'");

							$result = mysql_query("SELECT * FROM schedule.schoolyear ORDER BY YearID");

						do{
						?>
						<option value="<?php echo $row['YearID'];?>"><?php echo $row['Year'];?></option>
						<?php } while ($row = mysql_fetch_assoc($result));?>
						</select></td>
						<td><?php echo ($flagyear) ? $flagyear : " " ?></td>
						<input type="hidden" id="hidden_YearID" name="hidden_YearID"  value="<?php echo $row['YearID'];?>" />
						<input type="hidden" id="hidden_Year" name="hidden_Year" value="<?php echo $row['Year'];?>"/>
				</tr>
				<tr>
					<td><label>Course:</label></td>
					<td><select name="course"  id="course" style="width:300px" onchange="javascript: return optionList_SelectedIndex3()"/>
						<?php
							$id=mysql_query("SELECT max(CourseID)as max_id from course");
							$row_id = mysql_fetch_array($id);
							$max_id= $row_id ['max_id'];

							$row = mysql_query ("SELECt CourseYrSection FROM course where CourseID = '$max_id'");

							$result = mysql_query("SELECT * FROM schedule.course ORDER BY CourseID");

						do{
						?>
						<option value="<?php echo $row['CourseID'];?>"><?php echo $row['CourseYrSection'];?></option>
						<?php } while ($row = mysql_fetch_assoc($result));?>
						</select></td>
						<td><?php echo ($flagcourse) ? $flagcourse : " " ?></td>
						<input type="hidden" id="hidden_CourseID" name="hidden_CourseID"  value="<?php echo $row['CourseID'];?>" />
						<input type="hidden" id="hidden_CourseYrSection" name="hidden_CourseYrSection" value="<?php echo $row['CourseYrSection'];?>"/>
				</tr>
				<tr>
					<td><label>Subject:</label></td>
					<td><select name="subject" id="subject" style="width:300px" onchange="javascript: return optionList_SelectedIndex4()"/>
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
						<td><?php echo ($flagsubject) ? $flagsubject : " " ?></td>
						<input type="hidden" id="hidden_SubjectID" name="hidden_SubjectID"  value="<?php echo $row['SubjectID'];?>" />
						<input type="hidden" id="hidden_SubjectName" name="hidden_SubjectName" value="<?php echo $row['SubjectName'];?>"/>
				</tr>
				<tr>
					<td><label>Teacher:</label></td>
					<td><select name="teacher" id="teacher" style="width:300px" onchange="javascript: return optionList_SelectedIndex5()"/>
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
						<td><?php echo ($flagteacher) ? $flagteacher : " " ?></td>
						<input type="hidden" id="hidden_TeacherID" name="hidden_TeacherID"  value="<?php echo $row['TeacherID'];?>" />
						<input type="hidden" id="hidden_TeacherName" name="hidden_TeacherName" value="<?php echo $row['TeacherName'];?>"/>
				</tr>
				<tr>
					<td><label>Room:</label></td>
					<td><select name="room" id="room" style="width:300px" onchange="javascript: return optionList_SelectedIndex6()"/>
						<?php
							$id=mysql_query("SELECT max(RoomID)as max_id from room");
							$row_id = mysql_fetch_array($id);
							$max_id= $row_id ['max_id'];

							$row = mysql_query ("SELECt RoomName FROM room where RoomID = '$max_id'");

							$result = mysql_query("SELECT * FROM schedule.room ORDER BY RoomID");

						do{
						?>
						<option value="<?php echo $row['RoomID'];?>"><?php echo $row['RoomName'];?></option>
						<?php } while ($row = mysql_fetch_assoc($result));?>
						</select></td>
						<td><?php echo ($flagroom) ? $flagroom : " " ?></td>
						<input type="hidden" id="hidden_RoomID" name="hidden_RoomID"  value="<?php echo $row['RoomID'];?>" />
						<input type="hidden" id="hidden_RoomName" name="hidden_RoomName" value="<?php echo $row['RoomName'];?>"/>
				</tr>
				<tr>
					<td><label>Starting Time:</label></td>
					<td><select name="stime" id="stime"  style="width:300px" onchange="javascript: return optionList_SelectedIndex7()"/>
						<?php
							$id=mysql_query("SELECT max(StimeID)as max_id from stime");
							$row_id = mysql_fetch_array($id);
							$max_id= $row_id ['max_id'];

							$row = mysql_query ("SELECt Stime FROM stime where StimeID = '$max_id'");

							$result = mysql_query("SELECT * FROM schedule.stime ORDER BY StimeID");

						do{
						?>
						<option value="<?php echo $row['StimeID'];?>"><?php echo $row['Stime'];?></option>
						<?php } while ($row = mysql_fetch_assoc($result));?>
						</select></td>
						<td><?php echo ($flagstime) ? $flagstime : " " ?></td>
						<input type="hidden" id="hidden_StimeID" name="hidden_StimeID"  value="<?php echo $row['StimeID'];?>" />
						<input type="hidden" id="hidden_Stime" name="hidden_Stime" value="<?php echo $row['Stime'];?>"/>
				</tr>
				<tr>
					<td><label>Ending Time:</label></td>
					<td><select name="etime" id="etime" style="width:300px" onchange="javascript: return optionList_SelectedIndex8()"/>
						<?php
							$id=mysql_query("SELECT max(EtimeID)as max_id from etime");
							$row_id = mysql_fetch_array($id);
							$max_id= $row_id ['max_id'];

							$row = mysql_query ("SELECt Etime FROM etime where EtimeID = '$max_id'");

							$result = mysql_query("SELECT * FROM schedule.etime ORDER BY EtimeID");

						do{
						?>
						<option value="<?php echo $row['EtimeID'];?>"><?php echo $row['Etime'];?></option>
						<?php } while ($row = mysql_fetch_assoc($result));?>
						</select></td>
						<td><?php echo ($flagetime) ? $flagetime : " " ?></td>
						<input type="hidden" id="hidden_EtimeID" name="hidden_EtimeID"  value="<?php echo $row['EtimeID'];?>" />
						<input type="hidden" id="hidden_Etime" name="hidden_Etime" value="<?php echo $row['Etime'];?>"/>
				</tr>
				<tr>
					<td><label>Day:</label></td>
					<td> <select name="day" id="day" style="width:300px" onchange="javascript: return optionList_SelectedIndex9()"/>
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
						<td><?php echo ($flagday) ? $flagday : " " ?></td>
						<input type="hidden" id="hidden_DayID" name="hidden_DayID"  value="<?php echo $row['DayID'];?>" />
						<input type="hidden" id="hidden_Day" name="hidden_Day" value="<?php echo $row['Day'];?>"/>
				</tr>
				<tr>
					<td></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="submit" name="subsched" value="" />
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

<script language="javascript" >
/*		function SubmitForm(form)
		{			
			var form = document.forms[0];		
			if ((form.pLName.value.length <1) ||
				(form.pFName.value.length <1) ||
				(form.pMIName.value.length <1)) 
				{						
				 return false; 		
				}				 									
			else
				{	
				  return true;
				}
		}
*/		
		function optionList_SelectedIndex()
		{

			var selObj = document.getElementById('sem');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_SemID_ValueObj = document.getElementById('hidden_SemID');
			var hidden_Semester_TextObj = document.getElementById('hidden_Semester');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_SemID_ValueObj.value = selObj.options[selIndex].value;
			hidden_Semester_TextObj.value = selObj.options[selIndex].text;
		
		}
		
		function optionList_SelectedIndex2()
		{

			var selObj = document.getElementById('year');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_YearID_ValueObj = document.getElementById('hidden_YearID');
			var hidden_Year_TextObj = document.getElementById('hidden_Year');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_YearID_ValueObj.value = selObj.options[selIndex].value;
			hidden_Year_TextObj.value = selObj.options[selIndex].text;
		
		}
		
		function optionList_SelectedIndex3()
		{

			var selObj = document.getElementById('course');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_CourseID_ValueObj = document.getElementById('hidden_CourseID');
			var hidden_CourseYrSection_TextObj = document.getElementById('hidden_CourseYrSection');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_CourseID_ValueObj.value = selObj.options[selIndex].value;
			hidden_CourseYrSection_TextObj.value = selObj.options[selIndex].text;
		
		}
		
		function optionList_SelectedIndex4()
		{

			var selObj = document.getElementById('subject');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_SubjectID_ValueObj = document.getElementById('hidden_SubjectID');
			var hidden_SubjectName_TextObj = document.getElementById('hidden_SubjectName');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_SubjectID_ValueObj.value = selObj.options[selIndex].value;
			hidden_SubjectName_TextObj.value = selObj.options[selIndex].text;
		
		}
		
		function optionList_SelectedIndex5()
		{

			var selObj = document.getElementById('teacher');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_TeacherID_ValueObj = document.getElementById('hidden_TeacherID');
			var hidden_TeacherName_TextObj = document.getElementById('hidden_TeacherName');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_TeacherID_ValueObj.value = selObj.options[selIndex].value;
			hidden_TeacherName_TextObj.value = selObj.options[selIndex].text;
		
		}
		
		function optionList_SelectedIndex6()
		{

			var selObj = document.getElementById('room');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_RoomID_ValueObj = document.getElementById('hidden_RoomID');
			var hidden_RoonName_TextObj = document.getElementById('hidden_RoonName');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_RoomID_ValueObj.value = selObj.options[selIndex].value;
			hidden_RoonName_TextObj.value = selObj.options[selIndex].text;
		
		}
		
		function optionList_SelectedIndex7()
		{

			var selObj = document.getElementById('stime');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_StimeID_ValueObj = document.getElementById('hidden_StimeID');
			var hidden_Stime_TextObj = document.getElementById('hidden_Stime');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_StimeID_ValueObj.value = selObj.options[selIndex].value;
			hidden_Stime_TextObj.value = selObj.options[selIndex].text;
		
		}
		
		function optionList_SelectedIndex8()
		{

			var selObj = document.getElementById('etime');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_EtimeID_ValueObj = document.getElementById('hidden_EtimeID');
			var hidden_Etime_TextObj = document.getElementById('hidden_Etime');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_EtimeID_ValueObj.value = selObj.options[selIndex].value;
			hidden_Etime_TextObj.value = selObj.options[selIndex].text;
		
		}
		
		function optionList_SelectedIndex9()
		{

			var selObj = document.getElementById('day');
			//var txtIndexObj = document.getElementById('txtIndex');
			var hidden_DayID_ValueObj = document.getElementById('hidden_DayID');
			var hidden_Day_TextObj = document.getElementById('hidden_Day');
			
			var selIndex = selObj.selectedIndex;
			//txtIndexObj.value = selIndex;
			hidden_DayID_ValueObj.value = selObj.options[selIndex].value;
			hidden_Day_TextObj.value = selObj.options[selIndex].text;
		
		}
		
		</script>

<script language="javascript" >
	var form = document.forms[0];
	//purpose?: to retrieve what users last input on the field..
	form.sem.value = ("<?PHP echo $_POST['hidden_Semester']; ?>");
	form.year.value = ("<?PHP echo $_POST['hidden_Year']; ?>");
	form.course.value = ("<?PHP echo $_POST['hidden_CourseYrSection']; ?>");
	form.subject.value = ("<?PHP echo $_POST['hidden_SubjectName']; ?>");
	form.teacher.value = ("<?PHP echo $_POST['hidden_TeacherName']; ?>");
	form.room.value = ("<?PHP echo $_POST['hidden_RoomName']; ?>");
	form.stime.value = ("<?PHP echo $_POST['hidden_Stime']; ?>");
	form.etime.value = ("<?PHP echo $_POST['hidden_Etime']; ?>");
	form.day.value = ("<?PHP echo $_POST['hidden_Day']; ?>");
	
	//alert (form.cboCategoryName.value);				
</script>

<script type="text/javascript">
function show_alert()
{
alert("Venue is already occupied at the choosen date and time, please check your schedule.");
}
</script>

