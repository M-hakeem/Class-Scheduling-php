<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ENTRY | Add Subject</title>
<link href="../css/style.css" rel="stylesheet"/>
<link href="../css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../css/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../css/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<?php
	include ("../includes/db.php");
	include ("../session.php");
	
if (isset($_POST['subsubject'])) :
		
		$subjectcod=$_POST['subjectcod'];
		$subjectname=$_POST['subjectname'];
		$labhr=$_POST['labhr'];
		$lechr=$_POST['lechr'];
		$subcat=$_POST['subcat'];
		$courseyrsec=$_POST['courseyrsec'];
		$sem=$_POST['sem'];
		$dept=$_POST['dept'];
		
	if (trim($subjectcod) == ""){ $flagsubjectcod = 'Required Field.';}	
	if (trim($subjectname) == ""){ $flagsubjectname = 'Required Field.';}
	if (trim($labhr) == ""){ $flaglabhr = 'Required Field.';}
	if (trim($lechr) == ""){ $flaglechr = 'Required Field.';}
	if (trim($subcat) == ""){ $flagsubcat = 'Required Field.';}	
	if (trim($courseyrsec) == ""){ $flagcourseyrsec = 'Required Field.';}
	if (trim($sem) == ""){ $flagsem = 'Required Field.';}
	if (trim($dept) == ""){ $flagdept = 'Required Field.';}
	
	if (($flagsubjectcod == "") &&  ($flagsubjectname == "") &&  ($flaglabhr == "") && ($flaglechr == "") && ($flagsubcat == "") && ($flagcourseyrsec == "") && ($flagsem == "") && ($flagdept == "")) :
	//check for duplicate records
	$trap = mysql_query("SELECT * FROM subject WHERE SubjectCode = '$subjectcod' AND CourseYrSection='$courseyrsec'");
	$numrows = MYSQL_NUMROWS($trap);
	echo $numrows;
        if ($numrows > 0) :
		     //$already_exist = 'Subject already exist';
			 ?><body onLoad = "show_alert()"><?php
	else:
		mysql_query("INSERT INTO subject(SubjectCode,SubjectName,SubjectLabhrprday,SubjectLechrprday,SubjectCatID,CourseID,SemID,DeptID) 
		VALUES ('$subjectcod','$subjectname','$lechr','$labhr','$subcat','$courseyrsec','$sem','$dept')")or die(mysql_error());
		echo "Your file has been saved in the database..";
					 header(
			 	"Location: subjectview.php");
				
		endif;
				
   endif;
     
endif;
	
	
	
	
?>
<div id="wrapper">
<body>
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
                   <div class="content"> </div> 
				   <table>
				     
				   <tr>
						<td><label>Course Code:</label></td>
						<td><input type="text" name="subjectcod" style="width:288px" value="<?php echo ($_POST['subjectcod']) ? $_POST['subjectcod'] : " " ?>"/></td>
						<?php
						//echo ($flagsubjectcod) ? $flagsubjectcod : " " 
						?>
				   </tr>
				   <tr>
						<td><label>Course Title:</label></td>
						<td><input type="text" name="subjectname"  style="width:288px" value="<?php echo ($_POST['subjectname']) ? $_POST['subjectname'] : " " ?>"/></td>
						<<?php
						//echo ($flagsubjectname) ? $flagsubjectname : " " 
						?>
				   </tr>
				   <tr>
						<td><label>Lecture Hours:</label></td>
						<td><input type="text" name="labhr"  style="width:288px" value="<?php echo ($_POST['labhr']) ? $_POST['labhr'] : " " ?>"/></td>
						<?php
						//echo ($flaglabhr) ? $flaglabhr : " " 
						?>
				   </tr>
				   <tr>
						<td><label>Laboratory Hours:</label></td>
						<td><input type="text" name="lechr"  style="width:288px" value="<?php echo ($_POST['lechr']) ? $_POST['lechr'] : " " ?>"/></td>
						<?php
						//echo ($flaglechr) ? $flaglechr : " " 
						?>
				   </tr>
				   <tr>
						<td><label>Subject Category:</label></td>
						<td><select name="subcat" style="width:300px" />
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
						<td><label>Lecture or Lab Group:</label></td>
						<td><select name="courseyrsec" style="width:300px"/>
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
						<td><select name="sem" style="width:300px" />
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
						<td><select name="dept" style="width:300px" />
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
						<input type="submit" name="subsubject" value="" />
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

<script type="text/javascript">
function show_alert()
{
alert("Subject already exist");
}
</script>