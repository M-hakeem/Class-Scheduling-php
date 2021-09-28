<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ENTRY | Add Course</title>
<link href="../css/style.css" rel="stylesheet"/>
<link href="../css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../css/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../css/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<?php
	include ("../includes/db.php");
	include ("../session.php");

if (isset($_POST['subcourse'])) :
		
	$courseyrsec=$_POST['courseyrsec'];
	$major=$_POST['major'];
	$dept=$_POST['dept'];
		
	if (trim($courseyrsec) == ""){ $flagcourseyrsec = 'Required Field.';}	
	if (trim($dept) == ""){ $flagdept = 'Required Field.';}
	
	 if (($flagcourseyrsec == "") &&  ($flagmajor == "") &&  ($flagdept == "")) :
	//check for duplicate records
	
	$trap = mysql_query("SELECT * FROM course WHERE CourseYrSection = '$courseyrsec'");
	$numrows = MYSQL_NUMROWS($trap);
	echo $numrows;
    if ($numrows > 0) :
		 //$already_exist = 'course already exist';
		 ?><body onLoad = "show_alert()"><?php
	else:
		mysql_query("INSERT INTO course(CourseYrSection,Major,DeptID)
			VALUES ('$courseyrsec','$major','$dept')") or die(mysql_error());
			echo "Your file has been saved in the database..";
					 header(
			 	"Location: courseview.php");
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
		<div class="content-wrap2" align="center">
        		<h1><font color="#337033" size="5" face="Arial">Add New Course</font></h1><br/><br/>
			<form method="post">
                  <div class="content"> </div> <table>
				  <?php 
				  //echo ($already_exist) ? $already_exist : " " 
				  ?>
				  <tr>
						<td><label>Course &amp;Group:</label></td>
						<td><input type="text" name="courseyrsec" style="width:288px" value="<?php echo ($_POST['courseyrsec']) ? $_POST['courseyrsec'] : " " ?>"/></td>
						<?php
						//echo ($flagcourseyrsec) ? $flagcourseyrsec : " " 
						?>
					</tr>
					<tr>
						<td><label>Major:</label></td>
						<td><input type="text" name="major" style="width:288px"/></td>
						
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
						<input type="submit" name="subcourse" value="" />
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

<script type="text/javascript">
function show_alert()
{
alert("Course already exist");
}
</script>