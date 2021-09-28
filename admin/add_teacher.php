<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ENTRY | Add Teacher</title>
<link href="../css/style.css" rel="stylesheet"/>
<link href="../css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../css/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../css/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<?php
	include ("../includes/db.php");
	include ("../session.php");
	
if (isset($_POST['subteacher'])) :		
			
	$teacher= $_POST['teacher'];
	$acadrank= $_POST['acadrank'];
	$desig= $_POST['desig'];
	$dept= $_POST['dept'];
	
	if (trim($teacher) == ""){ $flagteacher = 'Required Field.';}	
	if (trim($acadrank) == ""){ $flagacadrank = 'Required Field.';}
	if (trim($desig) == ""){ $flagdesig = 'Required Field.';}
	if (trim($dept) == ""){ $flagdept = 'Required Field.';}
	
    if (($flagteacher == "") &&  ($flagacadrank == "") &&  ($flagdesig == "") && ($flagdept == "")) :
		//check for duplicate records
		$teacher= $_POST['teacher'];
			$acadrank= $_POST['acadrank'];
			$desig= $_POST['desig'];
			$dept= $_POST['dept'];
		
		$trap = mysql_query("SELECT * FROM teacher WHERE TeacherName = '$teacher'");
		$numrows = MYSQL_NUMROWS($trap);
		echo $numrows;
        if ($numrows > 0) :
			?><body onLoad = "show_alert()"><?php
		     //$already_exist = 'Teacher already exist';
	    else:
			mysql_query ("INSERT INTO teacher(TeacherName, AcadRank, Designation, DeptID)
					VALUES('$teacher','$acadrank','$desig','$dept')") or die(mysql_error()); 
					echo "Your file has been saved in the database..";
					 header(
			 	"Location: teacherview.php");
		endif;
				
   endif;
     
endif;
	
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
				<form method="post">
				
                   <div class="content"> </div> <table>
				    
					<tr>
						<td><label>Staff Name:</label></td>
						<td><input type="text" name="teacher" style="width:288px" value="<?php echo ($_POST['teacher']) ? $_POST['teacher'] : " " ?>"/></td>
						 
					</tr>
					<tr>
						<td><label>Academic Rank:</label></td>
						<td><input type="text" name="acadrank" style="width:288px" value="<?php echo ($_POST['acadrank']) ? $_POST['acadrank'] : " " ?>"/></td>
						 
					</tr>
					<tr>
						<td><label>Designation:</label></td>
						<td><input type="text" name="desig" style="width:288px" value="<?php echo ($_POST['desig']) ? $_POST['desig'] : " " ?>"/><br/></td>
						 
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
						</select>
						
						</td>
						
					</tr>
					<tr>
						<td></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="submit" name="subteacher" value="" />
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
alert("Teacher already exist");
}
</script>