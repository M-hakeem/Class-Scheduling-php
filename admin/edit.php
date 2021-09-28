<?php
require ("includes/db.php");
$teacherid =$_REQUEST['TeacherID'];

$result =  mysql_query("SELECT * FROM teacher WHERE TeacherID  = '$teacherid'");
$row = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: data not found..");
		}
				$teacherid = $row['TeacherID'];
				$teacher = $row['TeacherName'];
				$acadrank = $row['AcadRank'];
				$desig = $row['Designation'];
				$deptid = $row['DeptID'];

if(isset($_POST['submit'])){
	
	$teacher_save = $_POST['teacher'];
	$acadrank_save = $_POST['acadrank'];
	$desig_save = $_POST['desig'];
	$deptid_save = $_POST['dept'];

	mysql_query("UPDATE teacher SET TeacherName ='$teacher_save', AcadRank ='$acadrank_save',
				Designation ='$desig_save', DeptID ='$deptid_save' WHERE TeacherID = '$teacherid'")or die(mysql_error()); 
	echo "Saved!";
	
	header("Location: teacherview.php");
				
}

?>

<html>
	<head>
		<title>Forms
		</title>
	</head>
		<body bgcolor="green">
		<form name="forms" method="post">
			<table>
				<tr>
					<td>Update Teacher Record</td>
				</tr>
				<tr>
					<td><br>Teacher:</td>
					<td><br><input type="textbox" name="teacher" value="<?php echo $teacher; ?>"></td>
				</tr>
				<tr>
					<td><br>Academic Rank:</td>
					<td><br><input type="textbox" name="acadrank" value="<?php echo $acadrank; ?>"></td>
				</tr>
				<tr>
					<td><br>Designation:</td>
					<td><br><input type="textbox" name="desig" value="<?php echo $desig; ?>"></td>
				</tr>
				<tr>
					<td><br>Department:</td>
					<td><br><input type="textbox" name="dept" value="<?php echo $deptid; ?>"></td>
				</tr>
				
					<td><br><input type="submit" value="submit" name="submit" id = "submit" >
				</tr>


				</form>
			</table>
		
</body>
</html>