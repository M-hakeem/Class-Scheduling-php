<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ENTRY | View Room</title>
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
            <h1 align="center">Room List</h1><br/ >
<?php
	
	if (isset($_POST['subroom'])){
		
		$room=$_POST['room'];
		$des=$_POST['des'];
		
		$trap = mysql_query("SELECT * FROM room WHERE RoomName = '$room'");
		$numrows = MYSQL_NUMROWS($trap);
		
		//if($numrows == 0){
		if (!$trap) {
		die("Query to show fields table failed");
	
	
	mysql_query("INSERT INTO room(RoomName,Description) VALUES ('$room','$des')");
			
		
		//}else{
			//echo "<font color='red'><b>Teacher Name already exist!!!</b></font>";
		//}
		}
		
	 if ($numberOfrows == $numrows);
	 {
	     echo 'bskan anu lg';
	 }
	
	}
	$id = mysql_query("SELECT max(RoomID)as max_id from room");
	$row_id = mysql_fetch_array($id);
	$max_id = $row_id['max_id'];
	
	
	$row= mysql_query ("select RoomName,Description from room where RoomID = '$max_id'");
?>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("schedule", $con);

	$result = mysql_query("SELECT * FROM schedule.room");
	echo "<table class=\"data-table\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
	<tr>
	<th width=\"40%\">Room Name</th>
	<th width=\"40%\">Descrition</th>
	<th width=\"9%\">Edit</th>
	<th width=\"11%\">Delete</th>
	</tr></table><div class=\"data-wrapper\"><table class=\"data-table\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">";
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

				$roomid = $row['RoomID'];	
				$room = $row['RoomName'];
				$des = $row['Description'];
	?>
	<tr class="data-view" bgcolor="<?php echo $bgcolor; ?>">
	<td width=\"40%\"><?php echo $room; ?></td>
	<td width=\"40%\"><?php echo $des; ?></td>
	<td width=\"9%\"><a href="editroom.php?RoomID=<?php echo $roomid; ?>"> <img src='../images/edit.png ' alt="edit" width="16" height="16" border="0" />									</a></td>
	<td width=\"11%\"><a href="deleteroom.php?RoomID=<?php echo $roomid; ?>"> <img src='../images/delete.png' alt="delete" width="16" height="16" onClick="return confirm('Are you sure you want to delete room record of # <?php
echo $roomid;?>?')" /></a></td>
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
</html>

<script type="text/javascript">

function show_alert()
{
alert ("Teacher Name already exist!");
}

</script>