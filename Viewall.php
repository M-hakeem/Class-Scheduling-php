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
            <h1 align="center"><font color="#337033" size="5" face="Arial">Student Class Schedule Time-table</font></h1>
			<?php require "includes/db.php"; ?>
			  <?php
			  
				$result = "";
			
				if(isset($_POST['next'])){
				
					$course = $_POST['course'];
					$year= $_POST['year'];
					$sem = $_POST['sem'];

				$search = mysql_query("SELECT * FROM schedule.schedule WHERE CourseID LIKE '%$course%' AND YearID LIKE '%$year%' AND SemID LIKE '%$sem%' HAVING DayID = 1") 
				or die (mysql_error());
				
				$con = mysql_connect("localhost","root","");
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }

					mysql_select_db("schedule", $con);
					if($_POST['course'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
					}elseif($_POST['year'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
					}elseif($_POST['sem'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
						}else{
						
						$courseq = mysql_query("SELECT * FROM course WHERE CourseID = '$course'");
						$coursea = mysql_fetch_array($courseq);
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
					<b>Course:</b> '.$coursea['CourseYrSection'].'
					<br />
					Monday
					</div>';	
					echo "<table class=\"data-table\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
					<tr>
					<br>
					<th>Instructor</th>
					<th>Subject</th>
					<th>Room</th>
					<th>Starting Time</th>
					<th>Ending Time</th>
					<th>Day</th>
					
					
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
						$dayq = mysql_query("SELECT * FROM day WHERE DayID =1'");
						$daya = mysql_fetch_array($dayq);

						echo "<tr>
						<td>".$teachera['TeacherName']."</td>
						<td>".$subjecta['SubjectCode']."</td>
						<td>".$rooma['RoomName']."</td>
						<td>".$Stimea['Stime']."</td>
						<td>".$Etimea['Etime']."</td>
						<td>".$daya['Day']."</td>
						
						";
						echo "</tr>";
				}
			?>

			<?php
			
			$search = mysql_query("SELECT * FROM schedule.schedule WHERE CourseID LIKE '%$course%' AND YearID LIKE '%$year%' AND SemID LIKE '%$sem%' HAVING DayID = 2") 
				or die (mysql_error());
				
				$con = mysql_connect("localhost","root","");
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }

					mysql_select_db("schedule", $con);
					if($_POST['course'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
					}elseif($_POST['year'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
					}elseif($_POST['sem'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
						}else{
						
						$courseq = mysql_query("SELECT * FROM course WHERE CourseID = '$course'");
						$coursea = mysql_fetch_array($courseq);
						$yearq = mysql_query("SELECT * FROM schoolyear WHERE YearID = '$year'");
						$yeara = mysql_fetch_array($yearq);
						$semq = mysql_query("SELECT * FROM semester WHERE SemID = '$sem'");
						$sema = mysql_fetch_array($semq);
						
					
						
					echo "<table class=\"data-table\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
					<tr>
					<br>
					<th>Instructor</th>
					<th>Subject</th>
					<th>Room</th>
					<th>Starting Time</th>
					<th>Ending Time</th>
					<th>Day</th>
					
					
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
						<td>".$teachera['TeacherName']."</td>
						<td>".$subjecta['SubjectCode']."</td>
						<td>".$rooma['RoomName']."</td>
						<td>".$Stimea['Stime']."</td>
						<td>".$Etimea['Etime']."</td>
						<td>".$daya['Day']."</td>
						
						";
						echo "</tr>";
				}
			
}
?>
<?php
			
			$search = mysql_query("SELECT * FROM schedule.schedule WHERE CourseID LIKE '%$course%' AND YearID LIKE '%$year%' AND SemID LIKE '%$sem%' HAVING DayID = 3") 
				or die (mysql_error());
				
				$con = mysql_connect("localhost","root","");
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }

					mysql_select_db("schedule", $con);
					if($_POST['course'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
					}elseif($_POST['year'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
					}elseif($_POST['sem'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
						}else{
						
						$courseq = mysql_query("SELECT * FROM course WHERE CourseID = '$course'");
						$coursea = mysql_fetch_array($courseq);
						$yearq = mysql_query("SELECT * FROM schoolyear WHERE YearID = '$year'");
						$yeara = mysql_fetch_array($yearq);
						$semq = mysql_query("SELECT * FROM semester WHERE SemID = '$sem'");
						$sema = mysql_fetch_array($semq);
					echo "<table class=\"data-table\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
					<tr>
					<br>
					<th>Instructor</th>
					<th>Subject</th>
					<th>Room</th>
					<th>Starting Time</th>
					<th>Ending Time</th>
					<th>Day</th>
					
					
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
						<td>".$teachera['TeacherName']."</td>
						<td>".$subjecta['SubjectCode']."</td>
						<td>".$rooma['RoomName']."</td>
						<td>".$Stimea['Stime']."</td>
						<td>".$Etimea['Etime']."</td>
						<td>".$daya['Day']."</td>
						
						";
						echo "</tr>";
				}
			
}
?>
<?php
			
		$search = mysql_query("SELECT * FROM schedule.schedule WHERE CourseID LIKE '%$course%' AND YearID LIKE '%$year%' AND SemID LIKE '%$sem%' HAVING DayID = 4") 
				or die (mysql_error());
				
				$con = mysql_connect("localhost","root","");
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }

					mysql_select_db("schedule", $con);
					if($_POST['course'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
					}elseif($_POST['year'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
					}elseif($_POST['sem'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
						}else{
						
						$courseq = mysql_query("SELECT * FROM course WHERE CourseID = '$course'");
						$coursea = mysql_fetch_array($courseq);
						$yearq = mysql_query("SELECT * FROM schoolyear WHERE YearID = '$year'");
						$yeara = mysql_fetch_array($yearq);
						$semq = mysql_query("SELECT * FROM semester WHERE SemID = '$sem'");
						$sema = mysql_fetch_array($semq);
						
					echo "<table class=\"data-table\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
							
					<tr>
					<br>
					<th>Instructor</th>
					<th>Subject</th>
					<th>Room</th>
					<th>Starting Time</th>
					<th>Ending Time</th>
					<th>Day</th>
					
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
						<td>".$teachera['TeacherName']."</td>
						<td>".$subjecta['SubjectCode']."</td>
						<td>".$rooma['RoomName']."</td>
						<td>".$Stimea['Stime']."</td>
						<td>".$Etimea['Etime']."</td>
						<td>".$daya['Day']."</td>
						";
						echo "</tr>";
				}
			
}
?>
<?php
			
			$search = mysql_query("SELECT * FROM schedule.schedule WHERE CourseID LIKE '%$course%' AND YearID LIKE '%$year%' AND SemID LIKE '%$sem%' HAVING DayID = 5") 
				or die (mysql_error());
				
				$con = mysql_connect("localhost","root","");
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }

					mysql_select_db("schedule", $con);
					if($_POST['course'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
					}elseif($_POST['year'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
					}elseif($_POST['sem'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
						}else{
						
						$courseq = mysql_query("SELECT * FROM course WHERE CourseID = '$course'");
						$coursea = mysql_fetch_array($courseq);
						$yearq = mysql_query("SELECT * FROM schoolyear WHERE YearID = '$year'");
						$yeara = mysql_fetch_array($yearq);
						$semq = mysql_query("SELECT * FROM semester WHERE SemID = '$sem'");
						$sema = mysql_fetch_array($semq);
						
						echo "<table class=\"data-table\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
							
					<tr>
					<br>
					<th>Instructor</th>
					<th>Subject</th>
					<th>Room</th>
					<th>Starting Time</th>
					<th>Ending Time</th>
					<th>Day</th>
					
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
						<td>".$teachera['TeacherName']."</td>
						<td>".$subjecta['SubjectCode']."</td>
						<td>".$rooma['RoomName']."</td>
						<td>".$Stimea['Stime']."</td>
						<td>".$Etimea['Etime']."</td>
						<td>".$daya['Day']."</td>
						";
						echo "</tr>";
				}
			
}
?>
<?php		
			$search = mysql_query("SELECT * FROM schedule.schedule WHERE CourseID LIKE '%$course%' AND YearID LIKE '%$year%' AND SemID LIKE '%$sem%' HAVING DayID = 6") 
				or die (mysql_error());
				
				$con = mysql_connect("localhost","root","");
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }

					mysql_select_db("schedule", $con);
					if($_POST['course'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
					}elseif($_POST['year'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
					}elseif($_POST['sem'] == "") {
						echo "<font color ='red'><strong>Specify!</strong></font>";
						}else{
						
						$courseq = mysql_query("SELECT * FROM course WHERE CourseID = '$course'");
						$coursea = mysql_fetch_array($courseq);
						$yearq = mysql_query("SELECT * FROM schoolyear WHERE YearID = '$year'");
						$yeara = mysql_fetch_array($yearq);
						$semq = mysql_query("SELECT * FROM semester WHERE SemID = '$sem'");
						$sema = mysql_fetch_array($semq);
						
						
					
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
						<td>".$teachera['TeacherName']."</td>
						<td>".$subjecta['SubjectCode']."</td>
						<td>".$rooma['RoomName']."</td>
						<td>".$Stimea['Stime']."</td>
						<td>".$Etimea['Etime']."</td>
						<td>".$daya['Day']."</td>
						";
						echo "</tr>";
				}
			
}
			/*echo "<table class=\"data-table2\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
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
			
			$formon = mysql_query("SELECT * FROM schedule.schedule WHERE CourseID LIKE '%$course%' AND YearID LIKE '%$year%' AND SemID LIKE '%$sem%' AND DayID = '1' ORDER BY STimeID ")or die (mysql_error());
			while($formonl=mysql_fetch_array($formon)){
			
			$teacher  = $formonl['TeacherID'];
			$subject = $formonl['SubjectID'];
			$room = $formonl['RoomID'];
			$Stime  = $formonl['StimeID'];
			$Etime = $formonl['EtimeID'];
			$day = $formonl['DayID'];
			$teacherq = mysql_query("SELECT * FROM teacher WHERE TeacherID = '$teacher'");
			$teachera = mysql_fetch_array($teacherq);
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
				'.$teachera['TeacherName'].'<br />
				'.$subjecta['SubjectCode'].'<br />
				'.$rooma['RoomName'].'<br />
				'.$Stimea['Stime'].' -
				'.$Etimea['Etime'].'
				</div>';
			}
			echo '</div>';
			
			
			echo '
			<div id="forwed">';
			
				$forwed = mysql_query("SELECT * FROM schedule.schedule WHERE CourseID LIKE '%$course%' AND YearID LIKE '%$year%' AND SemID LIKE '%$sem%' AND DayID = '3' ORDER BY STimeID ")or die (mysql_error());
			while($forwedl=mysql_fetch_array($forwed)){
	       		
			$teacher = $forwedl['TeacherID'];
			$subject = $forwedl['SubjectID'];
			$room = $forwedl['RoomID'];
			$Stime  = $forwedl['StimeID'];
			$Etime = $forwedl['EtimeID'];
			$day = $forwedl['DayID'];
			$teacherq = mysql_query("SELECT * FROM teacher WHERE TeacherID = '$teacher'");
			$teachera = mysql_fetch_array($teacherq);
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
				'.$teachera['TeacherName'].'<br />
				'.$subjecta['SubjectCode'].'<br />
				'.$rooma['RoomName'].'<br />
				'.$Stimea['Stime'].' -
				'.$Etimea['Etime'].'
				</div>';
			}
			echo '</div>';
			
			echo '
			<div id="forfri">';
				
			$forfri = mysql_query("SELECT * FROM schedule.schedule WHERE CourseID LIKE '%$course%' AND YearID LIKE '%$year%' AND SemID LIKE '%$sem%' AND DayID = '5' ORDER BY STimeID ")or die (mysql_error());
			while($forfril=mysql_fetch_array($forfri)){
			
			$teacher  = $forfril['TeacherID'];
			$subject = $forfril['SubjectID'];
			$room = $forfril['RoomID'];
			$Stime  = $forfril['StimeID'];
			$Etime = $forfril['EtimeID'];
			$day = $forfril['DayID'];
			$teacherq = mysql_query("SELECT * FROM teacher WHERE TeacherID = '$teacher'");
			$teachera = mysql_fetch_array($teacherq);
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
				'.$teachera['TeacherName'].'<br />
				'.$subjecta['SubjectCode'].'<br />
				'.$rooma['RoomName'].'<br />
				'.$Stimea['Stime'].' -
				'.$Etimea['Etime'].'
				</div>';
			}
			
			echo '</div>';
			
			echo' 
			<div id="fortue">';
				
				$fortue = mysql_query("SELECT * FROM schedule.schedule WHERE CourseID LIKE '%$course%' AND YearID LIKE '%$year%' AND SemID LIKE '%$sem%' AND DayID = '2' ORDER BY STimeID ")or die (mysql_error());
			while($fortuel=mysql_fetch_array($fortue)){
			
			$teacher  = $fortuel['TeacherID'];
			$subject = $fortuel['SubjectID'];
			$room = $fortuel['RoomID'];
			$Stime  = $fortuel['StimeID'];
			$Etime = $fortuel['EtimeID'];
			$day = $fortuel['DayID'];
			$teacherq = mysql_query("SELECT * FROM teacher WHERE TeacherID = '$teacher'");
			$teachera = mysql_fetch_array($teacherq);
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
				'.$teachera['TeacherName'].'<br />
				'.$subjecta['SubjectCode'].'<br />
				'.$rooma['RoomName'].'<br />
				'.$Stimea['Stime'].' -
				'.$Etimea['Etime'].'
				</div>';
			}
			
			echo '</div>';
			
			echo'
			<div id="forthur">';
				
			$forthur = mysql_query("SELECT * FROM schedule.schedule WHERE CourseID LIKE '%$course%' AND YearID LIKE '%$year%' AND SemID LIKE '%$sem%' AND DayID = '4' ORDER BY STimeID ")or die (mysql_error());
			while($forthurl=mysql_fetch_array($forthur)){
			
			$teacher  = $forthurl['TeacherID'];
			$subject = $forthurl['SubjectID'];
			$room = $forthurl['RoomID'];
			$Stime  = $forthurl['StimeID'];
			$Etime = $forthurl['EtimeID'];
			$day = $forthurl['DayID'];
			$teacherq = mysql_query("SELECT * FROM teacher WHERE TeacherID = '$teacher'");
			$teachera = mysql_fetch_array($teacherq);
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
				'.$teachera['TeacherName'].'<br />
				'.$subjecta['SubjectCode'].'<br />
				'.$rooma['RoomName'].'<br />
				'.$Stimea['Stime'].' -
				'.$Etimea['Etime'].'
				</div>';
			}
			echo'</div>';		
			
			echo'
			<div id="forsat">';
				
			$forsat = mysql_query("SELECT * FROM schedule.schedule WHERE CourseID LIKE '%$course%' AND YearID LIKE '%$year%' AND SemID LIKE '%$sem%' AND DayID = '6' ORDER BY STimeID ")or die (mysql_error());
			while($forsatl=mysql_fetch_array($forsat)){
			
			$teacher  = $forsatl['TeacherID'];
			$subject = $forsatl['SubjectID'];
			$room = $forsatl['RoomID'];
			$Stime  = $forsatl['StimeID'];
			$Etime = $forsatl['EtimeID'];
			$day = $forsatl['DayID'];
			$teacherq = mysql_query("SELECT * FROM teacher WHERE TeacherID = '$teacher'");
			$teachera = mysql_fetch_array($teacherq);
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
				'.$teachera['TeacherName'].'<br />
				'.$subjecta['SubjectCode'].'<br />
				'.$rooma['RoomName'].'<br />
				'.$Stimea['Stime'].' -
				'.$Etimea['Etime'].'
				</div>';
			}
			echo'</div>';*/
			
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