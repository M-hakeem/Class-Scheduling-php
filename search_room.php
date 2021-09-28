<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SEARCH | Room Schedule</title>
<link href="css/style.css" rel="stylesheet"/>
<link href="css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
	include ("includes/db.php");
?>
<div id="wrapper">
	<?php	include('includes/header2.php');?>
    
    <div id="content">
    		<div class="content-nav">
			<div class="content-wrap2" align="center">
        			<h1><font color="#337033" size="5" face="Arial">Search Room Schedule</font></h1><br/><br/>
				<form action="roomnext.php" method="post">
                   <div class="content"></div>		<table>
						<tr>
						<td><label>Room:</label></td>
						<td> <select name="room" style="width:300px"/>
						<?php
							$id=mysql_query("SELECT max(RoomID)as max_id from room");
							$row_id = mysql_fetch_array($id);
							$max_id= $row_id ['max_id'];

							$row = mysql_query ("SELECt RoomName FROM room where RoomID = 	'$max_id'");

							$result = mysql_query("SELECT * FROM schedule.room ORDER BY RoomID");

						do{
						?>
						<option value="<?php echo $row['RoomID'];?>"><?php echo $row['RoomName'];?></option>
						<?php } while ($row = mysql_fetch_assoc($result));?>
						</select></td>
						</tr>
						<tr>
						<td><label>School Year:</label></td>
						<td><select name="year" style="width:300px" />
						<?php
							$id=mysql_query("SELECT max(YearID)as max_id from schoolyear");
							$row_id = mysql_fetch_array($id);
							$max_id= $row_id ['max_id'];

							$row = mysql_query ("SELECt Year FROM schoolyear where YearID = 	'$max_id'");

							$result = mysql_query("SELECT * FROM schedule.schoolyear ORDER BY YearID");

						do{
						?>
						<option value="<?php echo $row['YearID'];?>"><?php echo $row['Year'];?></option>
						<?php } while ($row = mysql_fetch_assoc($result));?>
						</select></td>
						</tr>
						<tr>
						<td><label>Semester:</font></td>
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
						<td></td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="submit" name="next" value="" /></td>
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
		include('includes/footer.php');
	?>

</body>
</html>
