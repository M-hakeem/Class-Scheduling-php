<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ENTRY | Edit Subject</title>
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
$subjectid =$_REQUEST['SubjectID'];

$result =  mysql_query("SELECT * FROM subject WHERE SubjectID = '$subjectid'");
$row = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: data not found..");
		}
				$subjectid = $row['SubjectID'];	
				$subjectcod = $row['SubjectCode'];
				$subjectname = $row['SubjectName'];
				$lechr = $row['SubjectLechrprday'];
				$labhr = $row['SubjectLabhrprday'];	
				$subcat = $row['SubjectCatID'];
				$courseyrsec = $row['CourseID'];
				$sem = $row['SemID'];
				$dept = $row['DeptID'];

if(isset($_POST['submit'])){
	
	$subjectcod_save = $_POST['subjectcod'];
	$subjectname_save = $_POST['subjectname'];
	$lechr_save = $_POST['lechr'];
	$labhr_save = $_POST['labhr'];
	$subcat_save = $_POST['subcat'];
	$courseyrsec_save = $_POST['courseyrsec'];
	$sem_save = $_POST['sem'];
	$dept_save = $_POST['dept'];

	mysql_query("UPDATE subject SET SubjectCode ='$subjectcod_save', SubjectName ='$subjectname_save',
	SubjectLechrprday ='$lechr_save', SubjectLabhrprday ='$labhr_save',SubjectCatID ='$subcat_save',
	CourseID ='$courseyrsec_save',SemID 	='$sem_save',DeptID ='$dept_save' WHERE SubjectID = '$subjectid'")or die(mysql_error()); 
	echo "Saved!";
	
	header("Location: subjectview.php");
				
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
        			<h1><font color="#337033" size="5" face="Arial">Add New Subject</font></h1><br/><br/>
				<form method="post">
                   <div class="content"> </div> <table>
				   <tr>
						<td><label>Course Code:</label></td>
						<td><input type="text" name="subjectcod" style="width:288px" value="<?php echo $subjectcod; ?>" /></td>
						
				   </tr>
				   <tr>
						<td><label>Course Name:</label></td>
						<td><input type="text" name="subjectname" style="width:288px" value="<?php echo $subjectname; ?>" /></td>
						
				   </tr>
				   <tr>
						<td><label>Laboratory Hours:</label></td>
						<td><input type="text" name="lechr" style="width:288px" value="<?php echo $lechr; ?>" /></td>
						
				   </tr>
				   <tr>
						<td><label>Lecture Hours:</label></td>
						<td><input type="text" name="labhr" style="width:288px" value="<?php echo $labhr; ?>" /></td>
						
				   </tr>
				   <tr>
						<td><label>Subject Category:</label></td>
						<td><select name="subcat" style="width:300px" value="<?php echo $subcat; ?>" />
						<?php
							$id=mysql_query("SELECT max(SubjectCatID)as max_id from subjectcat");
							$row_id = mysql_fetch_array($id);
							$max_id= $row_id ['max_id'];

							$row = mysql_query ("SELECt SubCat FROM subjectcat where SubjectCatID = 	'$max_id'");

							$result = mysql_query("SELECT * FROM schedule.subjectcat ORDER BY SubjectCatID");

						do{
						?>
						<option value="<?php echo $row['SubjectCatID'];?>"><?php echo $row['SubCat'];?></option>
						<?php } while ($row = mysql_fetch_assoc($result));?>                        
                        </select></td>
						
				   </tr>
				   <tr>
						<td><label>Course Year&amp;Section:</label></td>
						<td><select name="courseyrsec" style="width:300px" value="<?php echo $courseyrsec; ?>"/>
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
						<td><label>Semester:</label></td>
						<td><select name="sem" style="width:300px" value="<?php echo $sem; ?>" />
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
                        
                        </select></td>
						
				   </tr>
				    <tr>
						<td><label>Department:</label></td>
						<td><select name="dept" style="width:300px" value="<?php echo $dept; ?>" />
						<?php
							$id=mysql_query("SELECT max(DeptID)as max_id from department");
							$row_id = mysql_fetch_array($id);
							$max_id= $row_id ['max_id'];

							$row = mysql_query ("SELECt Depart FROM department where DeptID = 	'$max_id'");

							$result = mysql_query("SELECT * FROM schedule.department ORDER BY DeptID");

						do{
						?>
						<option value="<?php echo $row['DeptID'];?>"><?php echo $row['Depart'];?></option>
						<?php } while ($row = mysql_fetch_assoc($result));?>
                        </select></td>
						
				   </tr>
				  
				   <tr>
						<td></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="submit" name="submit" value=""/>
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

</body>
</html>
