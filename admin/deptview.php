<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ENTRY | View Department</title>
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
            <h1 align="center"><font color="#337033" size="5" face="Arial">Department List</font></h1>
<?php
	
	if (isset($_POST['subdept'])){
		
		$dept=$_POST['dept'];
		$personin=$_POST['personin'];
		$title=$_POST['title'];
		
		$trap = mysql_query("SELECT * FROM department WHERE Depart = '$dept'");
		$numrows = MYSQL_NUMROWS($trap);
		
		//if($numrows == 0){
		if (!$trap) {
		die("Query to show fields table failed");
	
	mysql_query("INSERT INTO department(Depart,DeptPerson,Title) VALUES ('$dept','$personin','$title')");
			//echo "na save ko na !<br>";
				//}else{
			//echo "<font color='red'><b>Teacher Name already exist!!!</b></font>";
		//}
		}
		 if ($numberOfrows == $numrows);
	 {
	     echo 'bskan anu lg';
	 }
	}
	
	$id = mysql_query("SELECT max(DeptID)as max_id from department");
	$row_id = mysql_fetch_array($id);
	$max_id = $row_id['max_id'];
	
	
	$row= mysql_query ("select Depart,DeptPerson,Title from department where DeptID = '$max_id'");
?>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("schedule", $con);

	$result = mysql_query("SELECT * FROM schedule.department");
	echo "<table class=\"data-table\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
	<br>
	<tr>
	<th width=\"30%\">Department</th>
	<th width=\"30%\">Person Incharge</th>
	<th width=\"20%\">Title</th>
	<th width=\"10%\">Edit</th>
	<th width=\"10%\">Delete</th>
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
				
				
				$deptid = $row['DeptID'];	
				$dept = $row['Depart'];
				$personin = $row['DeptPerson'];
				$title = $row['Title'];

	?>
	<tr class="data-view" bgcolor="<?php echo $bgcolor; ?>">
	<td width=\"30%\"><?php echo $dept; ?></td>
	<td  width=\"30%\"><?php echo $personin; ?></td>
	<td width=\"20%\"><?php echo $title; ?></td>
	<td width=\"10%\"><a href="editdepartment.php?DeptID=<?php echo $deptid; ?>"> <img src='../images/edit.png ' alt="edit" width="16" height="16" border="0" />                            </a></td>
	<td width=\"10%\"><a href="deletedepartment.php?DeptID=<?php echo $deptid; ?>"> <img src='../images/delete.png' alt="delete" width="16" height="16" onClick="return confirm('Are you sure you want to delete Department record of <?php
echo $dept;?>?')" /></a></td>
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