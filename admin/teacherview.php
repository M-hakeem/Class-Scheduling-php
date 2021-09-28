<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ENTRY | View Teacher</title>
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
            <h1 align="center">Teacher List</h1> <br/>
<?php	

if (isset($_POST['subteacher'])){
		
		$teacher=$_POST['teacher'];
		$acadrank=$_POST['acadrank'];
		$desig=$_POST['desig'];
		$dept=$_POST['dept'];
		
		$trap = mysql_query("SELECT * FROM teacher WHERE TeacherName = '$teacher'");
		$numrows = MYSQL_NUMROWS($trap);
	
		//if($numrows == 0){
		if (!$trap) {
		die("Query to show fields table failed");
	
		
	mysql_query("INSERT INTO teacher(TeacherName,AcadRank,Designation,DeptID) VALUES ('$teacher','$acadrank','$desig','$dept')");

		//}else{
			//echo "<font color='red'><b>Teacher Name already exist!!!</b></font>";
		//}
		}
	 if ($numberOfrows == $numrows);
	 {
	     echo 'bskan anu lg';
	 }
	}
	
	$id = mysql_query("SELECT max(TeacherID)as max_id from teacher");
	$row_id = mysql_fetch_array($id);
	$max_id = $row_id['max_id'];
	
	
	$row= mysql_query ("select TeacherName,AcadRank,Designation,DeptID from teacher where TeacherID = '$max_id'");
?>
<?php

//$result = mysql_query("SELECT * FROM teacher");
$result = mysql_query("SELECT teacher.TeacherID, department.Depart, teacher.TeacherName, teacher.AcadRank, teacher.Designation
FROM department RIGHT JOIN teacher ON department.DeptID = teacher.DeptID");

	echo "<table class=\"data-table\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
	<tr>
	<th width=\"25%\">Teacher Name</th>
	<th width=\"20%\">Academic Rank</th>
	<th width=\"20%\">Designation</th>
	<th width=\"25%\">Department</th>
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
				
				
				$teacherid = $row['TeacherID'];	
				
				$teacher = $row['TeacherName'];
				$acadrank = $row['AcadRank'];
				$desig = $row['Designation'];
				$depart = $row['Depart'];		

	?>
	<tr class="data-view" bgcolor="<?php echo $bgcolor; ?>">
	<td width="25%"><?php echo $teacher; ?></td>
	<td width="20%"><?php echo $acadrank; ?></td>
	<td width="20%"><?php echo $desig; ?></td>
	<td width="25%"><?php echo $depart; ?></td>
	<td width="5%"><a href="editteacher.php?TeacherID=<?php echo $teacherid; ?>"> <img src='../images/edit.png ' alt="edit" width="16" height="16" border="0" />									</a></td>
	<td width="5%"><a href="deleteteacher.php?TeacherID=<?php echo $teacherid; ?>"> <img src='../images/delete.png' alt="delete" width="16" height="16" onClick="return confirm('Are you sure you want to delete Teacher record of <?php
echo $teacher;?>?')" /></a></td>
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