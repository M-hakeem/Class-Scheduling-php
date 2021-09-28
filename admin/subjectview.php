<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ENTRY | View Subject</title>
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
            <h1 align="center">Subject List</h1><br />
<?php
	
if (isset($_POST['subsubject'])){
		
		$subjectcod=$_POST['subjectcod'];
		$subjectname=$_POST['subjectname'];
		$labhr=$_POST['labhr'];
		$lechr=$_POST['lechr'];
		$subcat=$_POST['subcat'];
		$courseyrsec=$_POST['courseyrsec'];
		$sem=$_POST['sem'];
		$dept=$_POST['dept'];
		
		$trap = mysql_query("SELECT * FROM subject WHERE SubjectCode = '$subjectcod'");
		$numrows = MYSQL_NUMROWS($trap);
		
		//if($numrows == 0){
		if (!$trap) {
		die("Query to show fields table failed");
	
	mysql_query("INSERT INTO subject(SubjectCode,SubjectName,SubjectLabhrprday,SubjectLechrprday,SubjectCatID,CourseID,SemID,DeptID) 
	VALUES ('$subjectcod','$subjectname','$lechr','$labhr','$subcat','$courseyrsec','$sem','$dept')");
	
			//}else{
			//echo "<font color='red'><b>Teacher Name already exist!!!</b></font>";
		//}
		}
		 if ($numberOfrows == $numrows);
	 {
	     echo 'bskan anu lg';
	 }
	}
	
	$id = mysql_query("SELECT max(SubjectID)as max_id from subject");
	$row_id = mysql_fetch_array($id);
	$max_id = $row_id['max_id'];
	
	
	$row= mysql_query ("SELECT SubjectCode,SubjectName,SubjectLabhrprday,SubjectLechrprday,SubjectCatID,CourseID,SemID,DeptID FROM subject 
	WHERE SubjectID = '$max_id'");
?>
<?php

$result = mysql_query("SELECT subject.SubjectID, department.Depart, semester.Semester, course.CourseYrSection, subjectcat.SubCat, 
subject.SubjectCode, subject.SubjectName, subject.SubjectLabhrprday, subject.SubjectLechrprday
FROM subjectcat RIGHT JOIN (course RIGHT JOIN (semester RIGHT JOIN (department RIGHT JOIN subject 
ON department.DeptID = subject.DeptID) ON semester.SemID = subject.SemID) ON course.CourseID = subject.CourseID) 
ON subjectcat.SubjectCatID = subject.SubjectCatID");

	echo "<table class=\"data-table\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
	<tr>
	<th width=\"10%\">Course Code</th>
	<th width=\"10%\">Course Title</th>
	<th width=\"10%\">Laboratory Hour/Day</th>
	<th width=\"10%\">Lecture Hour/Day</th>
	<th width=\"10%\">Subject Category</th>
	<th width=\"10%\">Course Year&amp;Section</th>
	<th width=\"10%\">Semester</th>
	<th width=\"10%\">Department</th>
	<th width=\"10%\">Edit</th>
	<th width=\"10%\">Delete</th>
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
				
				
				$subjectid = $row['SubjectID'];	
				
				$subjectcod = $row['SubjectCode'];
				$subjectname = $row['SubjectName'];
				$labhr = $row['SubjectLabhrprday'];	
				$lechr = $row['SubjectLechrprday'];
				$subcat = $row['SubCat'];
				$courseyrsec = $row['CourseYrSection'];
				$sem = $row['Semester'];
				$dept = $row['Depart'];	


				
				
	?>
	<tr class="data-view" bgcolor="<?php echo $bgcolor; ?>">
	<td width="10%"><?php echo $subjectcod; ?></td>
	<td width="10%"><?php echo $subjectname; ?></td>
	<td width="10%"><?php echo $labhr; ?></td>
	<td width="10%"><?php echo $lechr; ?></td>
	<td width="10%"><?php echo $subcat; ?></td>
    <td width="10%"><?php echo $courseyrsec; ?></td>
	<td width="10%"><?php echo $sem; ?></td>
	<td width="10%"><?php echo $dept; ?></td>
	<td width="10%"><a href="editsubject.php?SubjectID=<?php echo $subjectid; ?>"> <img src='../images/edit.png ' alt="edit" width="16" height="16" border="0" />                          </a></td>
	<td width="10%"><a href="deletesubject.php?SubjectID=<?php echo $subjectid; ?>"> <img src='../images/delete.png' alt="delete" width="16" height="16" onClick="return confirm('Are you sure you want to delete Subject record of <?php
echo $subjectcod;?>?')" /></a></td>
</tr>
<?php } ?>	
</table></div>


<br />
<br />
			</div>
		</div>
<	/div><!-- end #content-->
    
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