<html>
<head>
<title>Teacher Schedule | Print</title>
<link href="css/style2.css" rel="stylesheet">
</head>
<body>
<br />
<h1 align="center"><font color="#337033" size="5" face="Arial">Teacher Class Schedule</font></h1>
			<?php require "includes/db.php"; ?>
			  <?php
			  
				$result = "";
			
				if(isset($_POST['submit'])){
				
					$teacher = $_POST['teacher'];
					$year= $_POST['year'];
					$sem = $_POST['sem'];

				$search = mysql_query("SELECT * FROM schedule.schedule WHERE TeacherID LIKE '%$teacher%' AND YearID LIKE '%$year%' AND SemID LIKE '%$sem%' ") 
				or die (mysql_error());
				
				$con = mysql_connect("localhost","root","");
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }

					mysql_select_db("schedule.schedule", $con);
					{
						
						$teacherq = mysql_query("SELECT * FROM teacher WHERE TeacherID = '$teacher'");
						$teachera = mysql_fetch_array($teacherq);
						$yearq = mysql_query("SELECT * FROM schoolyear WHERE YearID = '$year'");
						$yeara = mysql_fetch_array($yearq);
						$semq = mysql_query("SELECT * FROM semester WHERE SemID = '$sem'");
						$sema = mysql_fetch_array($semq);
						
						echo'
					<div class="header">
					'.$sema['Semester'].' <br />
					School Year '.$yeara['Year'].' <br />
					</div>';
					echo'
					<div class="name">
					<b>Instructor:</b> '.$teachera['TeacherName'].' <br />
					<b>Load:</b>
					</div>';
						
					/*echo "<table class=\"data-table\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
					<tr>
					<br>
					<th>Course</th>
					<th>Subject</th>
					<th>Description</th>
					<th>Room</th>
					<th>Starting Time</th>
					<th>Ending Time</th>
					<th>Days</th>
					
					</tr>";
					$i=0;
					//while($row = mysql_fetch_array($search)){
					
					while($row = mysql_fetch_array($search))
						{
						if(($i%2)==0) 
								{
									$bgcolor ='#ffffff';
								}
							else
								{
									$bgcolor ='#fbf2d9';
								}
									
						$teacher  = $row['TeacherID'];
						$year = $row['YearID'];
						$sem = $row['SemID'];
						$course  = $row['CourseID'];
						$subject = $row['SubjectID'];
						$room = $row['RoomID'];
						$Stime  = $row['StimeID'];
						$Etime = $row['EtimeID'];
						$day = $row['DayID'];

						$teacherq = mysql_query("SELECT * FROM teacher WHERE TeacherID = '$teacher'");
						$teachera = mysql_fetch_array($teacherq);
						$yearq = mysql_query("SELECT * FROM schoolyear WHERE YearID = '$year'");
						$yeara = mysql_fetch_array($yearq);
						$semq = mysql_query("SELECT * FROM semester WHERE SemID = '$sem'");
						$sema = mysql_fetch_array($semq);
						$courseq = mysql_query("SELECT * FROM course WHERE CourseID = '$course'");
						$coursea = mysql_fetch_array($courseq);
						$subjectq = mysql_query("SELECT * FROM subject WHERE SubjectID = '$subject'");
						$subjecta = mysql_fetch_array($subjectq);
						$roomq = mysql_query("SELECT * FROM room WHERE RoomID = '$room'");
						$rooma = mysql_fetch_array($roomq);
						$Stimeq = mysql_query("SELECT * FROM stime WHERE StimeID = '$Stime'");
						$Stimea = mysql_fetch_array($Stimeq);
						$Etimeq = mysql_query("SELECT * FROM etime WHERE EtimeID = '$Etime'");
						$Etimea = mysql_fetch_array($Etimeq);
						$dayq = mysql_query("SELECT * FROM day WHERE DayID = '$day'");
						$daya = mysql_fetch_array($dayq);

						echo "<tr>
						<td>".$coursea['CourseYrSection']."</td>
						<td>".$subjecta['SubjectCode']."</td>
						<td>".$subjecta['SubjectName']."</td>
						<td>".$rooma['RoomName']."</td>
						<td>".$Stimea['Stime']."</td>
						<td>".$Etimea['Etime']."</td>
						<td>".$daya['Day']."</td>
						";
						echo "</tr>";
				}*/
			

			echo "<table class=\"data-table2\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
			<tr>
			<br>
			<th>Monday</th>
			<th>Wednesday</th>
			<th>Friday</th>
			<th>Tuesday</th>
			<th>Thursday</th>
			<th>Saturday</th>
			</tr>";
				echo "</table>";

			
			echo "<table class=\"data-table2\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
			<tr>
			<th>Monday</th>
			<th>Wednesday</th>
			<th>Friday</th>
			<th>Tuesday</th>
			<th>Thursday</th>
			<th>Saturday</th>
			</tr>";

			echo '
			<div id="formonday">';
			
			$formon = mysql_query("SELECT * FROM schedule.schedule WHERE TeacherID LIKE '%$teacher%' AND YearID LIKE '%$year%' AND SemID LIKE '%$sem%' AND DayID = '1' ORDER BY STimeID ")or die (mysql_error());
			while($formonl=mysql_fetch_array($formon)){
			
			$course  = $formonl['CourseID'];
			$subject = $formonl['SubjectID'];
			$room = $formonl['RoomID'];
			$Stime  = $formonl['StimeID'];
			$Etime = $formonl['EtimeID'];
			$day = $formonl['DayID'];
			$courseq = mysql_query("SELECT * FROM course WHERE CourseID = '$course'");
			$coursea = mysql_fetch_array($courseq);
			$subjectq = mysql_query("SELECT * FROM subject WHERE SubjectID = '$subject'");
			$subjecta = mysql_fetch_array($subjectq);
			$roomq = mysql_query("SELECT * FROM room WHERE RoomID = '$room'");
			$rooma = mysql_fetch_array($roomq);
			$Stimeq = mysql_query("SELECT * FROM stime WHERE StimeID = '$Stime'");
			$Stimea = mysql_fetch_array($Stimeq);
			$Etimeq = mysql_query("SELECT * FROM etime WHERE EtimeID = '$Etime'");
			$Etimea = mysql_fetch_array($Etimeq);
			$dayq = mysql_query("SELECT * FROM day WHERE DayID = '$day'");
			$daya = mysql_fetch_array($dayq);
			echo'
				<div class="schedcon">
				'.$coursea['CourseYrSection'].'<br />
				'.$subjecta['SubjectCode'].'<br />
				'.$rooma['RoomName'].'<br />
				'.$Stimea['Stime'].' -
				'.$Etimea['Etime'].'
				</div>';
			}
			echo '</div>';
			
			
			echo '
			<div id="forwed">';
			
				$forwed = mysql_query("SELECT * FROM schedule.schedule WHERE TeacherID LIKE '%$teacher%' AND YearID LIKE '%$year%' AND SemID LIKE '%$sem%' AND DayID = '3' ORDER BY STimeID ")or die (mysql_error());
			while($forwedl=mysql_fetch_array($forwed)){
	       		
			$course  = $forwedl['CourseID'];
			$subject = $forwedl['SubjectID'];
			$room = $forwedl['RoomID'];
			$Stime  = $forwedl['StimeID'];
			$Etime = $forwedl['EtimeID'];
			$day = $forwedl['DayID'];
			$courseq = mysql_query("SELECT * FROM course WHERE CourseID = '$course'");
			$coursea = mysql_fetch_array($courseq);
			$subjectq = mysql_query("SELECT * FROM subject WHERE SubjectID = '$subject'");
			$subjecta = mysql_fetch_array($subjectq);
			$roomq = mysql_query("SELECT * FROM room WHERE RoomID = '$room'");
			$rooma = mysql_fetch_array($roomq);
			$Stimeq = mysql_query("SELECT * FROM stime WHERE StimeID = '$Stime'");
			$Stimea = mysql_fetch_array($Stimeq);
			$Etimeq = mysql_query("SELECT * FROM etime WHERE EtimeID = '$Etime'");
			$Etimea = mysql_fetch_array($Etimeq);
			$dayq = mysql_query("SELECT * FROM day WHERE DayID = '$day'");
			$daya = mysql_fetch_array($dayq);
			echo'
				<div class="schedcon">
				'.$coursea['CourseYrSection'].'<br />
				'.$subjecta['SubjectCode'].'<br />
				'.$rooma['RoomName'].'<br />
				'.$Stimea['Stime'].' -
				'.$Etimea['Etime'].'
				</div>';
			}
			echo '</div>';
			
			echo '
			<div id="forfri">';
				
			$forfri = mysql_query("SELECT * FROM schedule.schedule WHERE TeacherID LIKE '%$teacher%' AND YearID LIKE '%$year%' AND SemID LIKE '%$sem%' AND DayID = '5' ORDER BY STimeID ")or die (mysql_error());
			while($forfril=mysql_fetch_array($forfri)){
			
			$course  = $forfril['CourseID'];
			$subject = $forfril['SubjectID'];
			$room = $forfril['RoomID'];
			$Stime  = $forfril['StimeID'];
			$Etime = $forfril['EtimeID'];
			$day = $forfril['DayID'];
			$courseq = mysql_query("SELECT * FROM course WHERE CourseID = '$course'");
			$coursea = mysql_fetch_array($courseq);
			$subjectq = mysql_query("SELECT * FROM subject WHERE SubjectID = '$subject'");
			$subjecta = mysql_fetch_array($subjectq);
			$roomq = mysql_query("SELECT * FROM room WHERE RoomID = '$room'");
			$rooma = mysql_fetch_array($roomq);
			$Stimeq = mysql_query("SELECT * FROM stime WHERE StimeID = '$Stime'");
			$Stimea = mysql_fetch_array($Stimeq);
			$Etimeq = mysql_query("SELECT * FROM etime WHERE EtimeID = '$Etime'");
			$Etimea = mysql_fetch_array($Etimeq);
			$dayq = mysql_query("SELECT * FROM day WHERE DayID = '$day'");
			$daya = mysql_fetch_array($dayq);
			echo'
				<div class="schedcon">
				'.$coursea['CourseYrSection'].'<br />
				'.$subjecta['SubjectCode'].'<br />
				'.$rooma['RoomName'].'<br />
				'.$Stimea['Stime'].' -
				'.$Etimea['Etime'].'
				</div>';
			}
			
			echo '</div>';
			
			echo' 
			<div id="fortue">';
				
				$fortue = mysql_query("SELECT * FROM schedule.schedule WHERE TeacherID LIKE '%$teacher%' AND YearID LIKE '%$year%' AND SemID LIKE '%$sem%' AND DayID = '2' ORDER BY STimeID ")or die (mysql_error());
			while($fortuel=mysql_fetch_array($fortue)){
			
			$course  = $fortuel['CourseID'];
			$subject = $fortuel['SubjectID'];
			$room = $fortuel['RoomID'];
			$Stime  = $fortuel['StimeID'];
			$Etime = $fortuel['EtimeID'];
			$day = $fortuel['DayID'];
			$courseq = mysql_query("SELECT * FROM course WHERE CourseID = '$course'");
			$coursea = mysql_fetch_array($courseq);
			$subjectq = mysql_query("SELECT * FROM subject WHERE SubjectID = '$subject'");
			$subjecta = mysql_fetch_array($subjectq);
			$roomq = mysql_query("SELECT * FROM room WHERE RoomID = '$room'");
			$rooma = mysql_fetch_array($roomq);
			$Stimeq = mysql_query("SELECT * FROM stime WHERE StimeID = '$Stime'");
			$Stimea = mysql_fetch_array($Stimeq);
			$Etimeq = mysql_query("SELECT * FROM etime WHERE EtimeID = '$Etime'");
			$Etimea = mysql_fetch_array($Etimeq);
			$dayq = mysql_query("SELECT * FROM day WHERE DayID = '$day'");
			$daya = mysql_fetch_array($dayq);
			echo'
				<div class="schedcon">
				'.$coursea['CourseYrSection'].'<br />
				'.$subjecta['SubjectCode'].'<br />
				'.$rooma['RoomName'].'<br />
				'.$Stimea['Stime'].' -
				'.$Etimea['Etime'].'
				</div>';
			}
			
			echo '</div>';
			
			echo'
			<div id="forthur">';
				
			$forthur = mysql_query("SELECT * FROM schedule.schedule WHERE TeacherID LIKE '%$teacher%' AND YearID LIKE '%$year%' AND SemID LIKE '%$sem%' AND DayID = '4' ORDER BY STimeID ")or die (mysql_error());
			while($forthurl=mysql_fetch_array($forthur)){
			
			$course  = $forthurl['CourseID'];
			$subject = $forthurl['SubjectID'];
			$room = $forthurl['RoomID'];
			$Stime  = $forthurl['StimeID'];
			$Etime = $forthurl['EtimeID'];
			$day = $forthurl['DayID'];
			$courseq = mysql_query("SELECT * FROM course WHERE CourseID = '$course'");
			$coursea = mysql_fetch_array($courseq);
			$subjectq = mysql_query("SELECT * FROM subject WHERE SubjectID = '$subject'");
			$subjecta = mysql_fetch_array($subjectq);
			$roomq = mysql_query("SELECT * FROM room WHERE RoomID = '$room'");
			$rooma = mysql_fetch_array($roomq);
			$Stimeq = mysql_query("SELECT * FROM stime WHERE StimeID = '$Stime'");
			$Stimea = mysql_fetch_array($Stimeq);
			$Etimeq = mysql_query("SELECT * FROM etime WHERE EtimeID = '$Etime'");
			$Etimea = mysql_fetch_array($Etimeq);
			$dayq = mysql_query("SELECT * FROM day WHERE DayID = '$day'");
			$daya = mysql_fetch_array($dayq);
			echo'
				<div class="schedcon">
				'.$coursea['CourseYrSection'].'<br />
				'.$subjecta['SubjectCode'].'<br />
				'.$rooma['RoomName'].'<br />
				'.$Stimea['Stime'].' -
				'.$Etimea['Etime'].'
				</div>';
			}
			echo'</div>';		
			
			echo'
			<div id="forsat">';
				
			$forsat = mysql_query("SELECT * FROM schedule.schedule WHERE TeacherID LIKE '%$teacher%' AND YearID LIKE '%$year%' AND SemID LIKE '%$sem%' AND DayID = '6' ORDER BY STimeID ")or die (mysql_error());
			while($forsatl=mysql_fetch_array($forsat)){
			
			$course  = $forsatl['CourseID'];
			$subject = $forsatl['SubjectID'];
			$room = $forsatl['RoomID'];
			$Stime  = $forsatl['StimeID'];
			$Etime = $forsatl['EtimeID'];
			$day = $forsatl['DayID'];
			$courseq = mysql_query("SELECT * FROM course WHERE CourseID = '$course'");
			$coursea = mysql_fetch_array($courseq);
			$subjectq = mysql_query("SELECT * FROM subject WHERE SubjectID = '$subject'");
			$subjecta = mysql_fetch_array($subjectq);
			$roomq = mysql_query("SELECT * FROM room WHERE RoomID = '$room'");
			$rooma = mysql_fetch_array($roomq);
			$Stimeq = mysql_query("SELECT * FROM stime WHERE StimeID = '$Stime'");
			$Stimea = mysql_fetch_array($Stimeq);
			$Etimeq = mysql_query("SELECT * FROM etime WHERE EtimeID = '$Etime'");
			$Etimea = mysql_fetch_array($Etimeq);
			$dayq = mysql_query("SELECT * FROM day WHERE DayID = '$day'");
			$daya = mysql_fetch_array($dayq);
			echo'
				<div class="schedcon">
				'.$coursea['CourseYrSection'].'<br />
				'.$subjecta['SubjectCode'].'<br />
				'.$rooma['RoomName'].'<br />
				'.$Stimea['Stime'].' -
				'.$Etimea['Etime'].'
				</div>';
			}
			echo'</div>';
			
			}
			echo "</table>";
		}
		echo '<br />';
		echo '<p align="center"><button onclick="window.print()">Print this Schedule</button></p>';
?>

<?php
mysql_close($con);
?>
</body>
</html>