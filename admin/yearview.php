<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ENTRY | View Year</title>
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
            <h1 align="center"><font color="#337033" size="5" face="Arial">Year List</font></h1>
<?php
	
	if (isset($_POST['subyear'])){
		
		$year=$_POST['year'];
		
		$trap = mysql_query("SELECT * FROM schoolyear WHERE Year = '$year'");
		$numrows = MYSQL_NUMROWS($trap);
		
		//if($numrows == 0){
		if (!$trap) {
		die("Query to show fields table failed");
	
	
	mysql_query("INSERT INTO schoolyear(Year) VALUES ('$year')");
			//}else{
			//echo "<font color='red'><b>Year Name already exist!!!</b></font>";
		//}
		}
	 if ($numberOfrows == $numrows);
	 {
	     echo 'bskan anu lg';
	 }
	}
	
	$id = mysql_query("SELECT max(YearID)as max_id from schoolyear");
	$row_id = mysql_fetch_array($id);
	$max_id = $row_id['max_id'];
	
	
	$row= mysql_query ("select Year from schoolyear where YearID = '$max_id'");
?>
<?php

$result = mysql_query("SELECT * FROM schedule.schoolyear");
	echo "<table class=\"data-table\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
	<tr>
	<br>
	<th width=\"40%\">Year</th>
	<th width=\"40%\">Edit</th>
	<th width=\"20%\">Delete</th>
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
				
				
				$yearid = $row['YearID'];				
				$year = $row['Year'];
			
	?>
	<tr class="data-view" bgcolor="<?php echo $bgcolor; ?>">
	<td width=\"40%\"><?php echo $year; ?></td>
	<td width=\"40%\"><a href="edityear.php?YearID=<?php echo $yearid; ?>"> <img src='../images/edit.png ' alt="edit" width="16" height="16" border="0" />									</a></td>
	<td width=\"20%\"><a href="deleteyear.php?YearID=<?php echo $yearid; ?>"> <img src='../images/delete.png' alt="delete" width="16" height="16" onClick="return confirm('Are you sure you want to delete School Year record of <?php
	echo $year;?>?')" /></a></td>
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