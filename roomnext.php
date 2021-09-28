<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PRINT SCHEDULE</title>
<link href="css/style.css" rel="stylesheet"/>
<link href="css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="wrapper">
	<div class="wrapper-logo">
        	<div><img src="images/chmsclogo_02.png"></div>
    </div>
	
	 <div id="content">
    		<div class="content-nav">
			<div class="content-wrap2" align="center">
            <h1 align="center"><font color="#337033" size="5" face="Arial">Room Class Schedule</font></h1>

			<?php require "includes/db.php"; ?>
			  <?php
			  
				$result = "";
			
				if(isset($_POST['next'])){
				
					$room = $_POST['room'];
					$year= $_POST['year'];
					$sem = $_POST['sem'];

				$search = mysql_query("SELECT * FROM schedule.schedule WHERE RoomID LIKE '%$room%' AND YearID LIKE '%$year%' AND SemID LIKE '%$sem%' HAVING DayID = 1") 
				or die (mysql_error());
				
				$con = mysql_connect("localhost","root","");
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }

					mysql_select_db("schedule", $con);
					if($_POST['room'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
					}elseif($_POST['year'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
					}elseif($_POST['sem'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
						}else{
						
						$roomq = mysql_query("SELECT * FROM room WHERE RoomID = '$room'");
						$rooma = mysql_fetch_array($roomq);
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
					<b>Room:</b> '.$rooma['RoomName'].'
					<br />
					Monday
					</div>';	
					echo "<table class=\"data-table\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
					<tr>
					<br>
					<th>Course</th>
					<th>Instructor</th>
					<th>Subject</th>
					<th>Starting Time</th>
					<th>Ending Time</th>
					
					
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
						<td>".$teachera['TeacherName']."</td>
						<td>".$subjecta['SubjectCode']."</td>
						<td>".$Stimea['Stime']."</td>
						<td>".$Etimea['Etime']."</td>
						
						";
						echo "</tr>";
				}
			?>
			<?php
			
			$search = mysql_query("SELECT * FROM schedule.schedule WHERE RoomID LIKE '%$room%' AND YearID LIKE '%$year%' AND SemID LIKE '%$sem%' HAVING DayID = 2") 
				or die (mysql_error());
				
				$con = mysql_connect("localhost","root","");
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }

					mysql_select_db("schedule", $con);
					if($_POST['room'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
					}elseif($_POST['year'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
					}elseif($_POST['sem'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
						}else{
						
						$roomq = mysql_query("SELECT * FROM room WHERE RoomID = '$room'");
						$rooma = mysql_fetch_array($roomq);
						$yearq = mysql_query("SELECT * FROM schoolyear WHERE YearID = '$year'");
						$yeara = mysql_fetch_array($yearq);
						$semq = mysql_query("SELECT * FROM semester WHERE SemID = '$sem'");
						$sema = mysql_fetch_array($semq);
						
					
						
					echo "<table class=\"data-table\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
					<tr>
					<br>
					<th>Course</th>
					<th>Instructor</th>
					<th>Subject</th>
					<th>Starting Time</th>
					<th>Ending Time</th>
					
					
					</tr>";
						
					echo'<div class="name">
					Tuesday 
					</div>';
					
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
						<td>".$teachera['TeacherName']."</td>
						<td>".$rooma['RoomName']."</td>
						<td>".$Stimea['Stime']."</td>
						<td>".$Etimea['Etime']."</td>
						
						";
						echo "</tr>";
				}
			
}
?>
			<?php
			
			$search = mysql_query("SELECT * FROM schedule.schedule WHERE RoomID LIKE '%$room%' AND YearID LIKE '%$year%' AND SemID LIKE '%$sem%' HAVING DayID = 3") 
				or die (mysql_error());
				
				$con = mysql_connect("localhost","root","");
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }

					mysql_select_db("schedule", $con);
					if($_POST['room'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
					}elseif($_POST['year'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
					}elseif($_POST['sem'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
						}else{
						
						$roomq = mysql_query("SELECT * FROM room WHERE RoomID = '$room'");
						$rooma = mysql_fetch_array($roomq);
						$yearq = mysql_query("SELECT * FROM schoolyear WHERE YearID = '$year'");
						$yeara = mysql_fetch_array($yearq);
						$semq = mysql_query("SELECT * FROM semester WHERE SemID = '$sem'");
						$sema = mysql_fetch_array($semq);
						
					
						
					echo "<table class=\"data-table\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
					<tr>
					<br>
					<th>Course</th>
					<th>Instructor</th>
					<th>Subject</th>
					<th>Starting Time</th>
					<th>Ending Time</th>
					
					
					</tr>";
						
					echo'<div class="name">
					Wednesday
					</div>';
					
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
						<td>".$teachera['TeacherName']."</td>
						<td>".$rooma['RoomName']."</td>
						<td>".$Stimea['Stime']."</td>
						<td>".$Etimea['Etime']."</td>
						
						";
						echo "</tr>";
				}
			
}
?>
<?php
			
			$search = mysql_query("SELECT * FROM schedule.schedule WHERE RoomID LIKE '%$room%' AND YearID LIKE '%$year%' AND SemID LIKE '%$sem%' HAVING DayID = 4") 
				or die (mysql_error());
				
				$con = mysql_connect("localhost","root","");
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }

					mysql_select_db("schedule", $con);
					if($_POST['room'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
					}elseif($_POST['year'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
					}elseif($_POST['sem'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
						}else{
						
						$roomq = mysql_query("SELECT * FROM room WHERE RoomID = '$room'");
						$rooma = mysql_fetch_array($roomq);
						$yearq = mysql_query("SELECT * FROM schoolyear WHERE YearID = '$year'");
						$yeara = mysql_fetch_array($yearq);
						$semq = mysql_query("SELECT * FROM semester WHERE SemID = '$sem'");
						$sema = mysql_fetch_array($semq);
						
					
						
					echo "<table class=\"data-table\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
					<tr>
					<br>
					<th>Course</th>
					<th>Instructor</th>
					<th>Subject</th>
					<th>Starting Time</th>
					<th>Ending Time</th>
					
					
					</tr>";
						
					echo'<div class="name">
					Thursday
					</div>';
					
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
						<td>".$teachera['TeacherName']."</td>
						<td>".$rooma['RoomName']."</td>
						<td>".$Stimea['Stime']."</td>
						<td>".$Etimea['Etime']."</td>
						
						";
						echo "</tr>";
				}
			
}
?>
<?php
			
			$search = mysql_query("SELECT * FROM schedule.schedule WHERE RoomID LIKE '%$room%' AND YearID LIKE '%$year%' AND SemID LIKE '%$sem%' HAVING DayID = 5") 
				or die (mysql_error());
				
				$con = mysql_connect("localhost","root","");
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }

					mysql_select_db("schedule", $con);
					if($_POST['room'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
					}elseif($_POST['year'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
					}elseif($_POST['sem'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
						}else{
						
						$roomq = mysql_query("SELECT * FROM room WHERE RoomID = '$room'");
						$rooma = mysql_fetch_array($roomq);
						$yearq = mysql_query("SELECT * FROM schoolyear WHERE YearID = '$year'");
						$yeara = mysql_fetch_array($yearq);
						$semq = mysql_query("SELECT * FROM semester WHERE SemID = '$sem'");
						$sema = mysql_fetch_array($semq);
						
					echo "<table class=\"data-table\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
					<tr>
					<br>
					<th>Course</th>
					<th>Instructor</th>
					<th>Subject</th>
					<th>Starting Time</th>
					<th>Ending Time</th>
					
					
					</tr>";
					
					echo'<div class="name">
					Friday
					</div>';
					
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
						<td>".$teachera['TeacherName']."</td>
						<td>".$rooma['RoomName']."</td>
						<td>".$Stimea['Stime']."</td>
						<td>".$Etimea['Etime']."</td>
						
						";
						echo "</tr>";
				}
			
}
?>
<?php			
			}
			echo "</table>";
		}
		echo '<br />';
		echo '<button onclick="window.print()">Print this Schedule</button>';
?>
<br />
<br />
		</div>
</div>
</div><!-- end #content-->
<?php
	include ('includes/footer.php');
?>
</body>   
</html>