<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ENTRY | Edit Teacher</title>
<link href="../css/style.css" rel="stylesheet"/>
<link href='../images/favicon.ico' rel='icon' type='images/ico'/>
<link href="../css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../css/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../css/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<?php
	require ("../includes/db.php");
	include ("../session.php");
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
			<div class="content-wrap2" align="center">
        			<h1><font color="#337033" size="5" face="Arial">Add New Teacher</font></h1><br/><br/>
				<form method="post"> <table>
				<tr>
					<td><label>Faculty Name:</label></td>
					<td><input type="text" name="teacher" style="width:288px" value="<?php echo $teacher; ?>"/></td>
				</tr>
				<tr>
					<td><label>Academic Rank:</label></td>
					<td><input type="text" name="acadrank" style="width:288px" value="<?php echo $acadrank; ?>"/></td>
				</tr>
				<tr>
					<td><label>Designation:</label></td>
					<td><input type="text" name="desig" style="width:288px" value="<?php echo $desig; ?>"/></td>
				</tr>
				<tr>
					<td><label>Department:</label></td>
					<td><select name="dept" style="width:300px" value="<?php echo $deptid; ?>"/>
					<?php
						$id=mysql_query("SELECT max(TeacherID)as max_id from teacher");
						$row_id = mysql_fetch_array($id);
						$max_id= $row_id ['max_id'];

						$row = mysql_query ("SELECT TeacherName FROM teacher where TeacherID = 	'$max_id'");	
												
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


</div>

</body>
</html>


 