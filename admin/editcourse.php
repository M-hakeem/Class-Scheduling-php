<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ENTRY | Edit Course</title>
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
$courseid =$_REQUEST['CourseID'];

$result =  mysql_query("SELECT * FROM course WHERE CourseID  = '$courseid'");
$row = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: data not found..");
		}
				$courseid = $row['CourseID'];	
				$courseyrsec = $row['CourseYrSection'];
				$deptid = $row['DeptID'];	
				$major = $row['Major'];
				
if(isset($_POST['submit'])){
	
	$courseyrsec_save = $_POST['courseyrsec'];
	$deptid_save = $_POST['dept'];
	$major_save = $_POST['major'];

	mysql_query("UPDATE course SET CourseYrSection ='$courseyrsec_save', DeptID ='$deptid_save',
				Major ='$major_save' WHERE CourseID = '$courseid'")or die(mysql_error()); 
	echo "Saved!";
	
	header("Location: courseview.php");
				
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
			<div class="content-wrap2" align="center">
        			<h1><font color="#337033" size="5" face="Arial">Add New Course</font></h1><br/><br/>
				<form method="post">
                   <div class="content"> <table>
				   <tr>
						<td><label>Course Year&amp;Section:</label></td>
						<td><input type="text" name="courseyrsec" style="width:288px" value="<?php echo $courseyrsec; ?>"/></td>
				   </tr>
				   <tr>
						<td><label>Major:</label></td>
						<td><input type="text" name="major" style="width:288px" value="<?php echo $major; ?>"/></td>
				   </tr>
				   <tr>
						<td><label>Department:</label></td>
						<td><select name="dept" style="width:300px" value="<?php echo $deptid; ?>"/>
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

</body>
</html>

    
