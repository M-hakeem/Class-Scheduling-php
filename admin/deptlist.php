<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADD ENTRY</title>
<link href="css/style.css" rel="stylesheet"/>
<link href="css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
	include ("includes/db.php");
	include ("session.php");
?>
<div id="wrapper">
	<?php
    /*
     * @see includes/header.php
	 * @code for header and navigation
	 */	
		include('includes/header.php');
	?>
	
	
	 <div id="content">
    		<div class="content-nav">
			<div class="content-wrap2" align="center">
            <h1 align="center"><font color="#337033" size="5" face="Arial">Department List</font></h1>
<?php
	require ("includes/db.php");
	
	if (isset($_POST['subdept'])){
		
		$dept=$_POST['dept'];
		$personin=$_POST['personin'];
		$title=$_POST['title'];
	
	mysql_query("INSERT INTO department(Depart,DeptPerson,Title) VALUES ('$dept','$personin','$title')");
			//echo "na save ko na !<br>";
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

$result = mysql_query("SELECT * FROM department");

echo "<table border='2' align = 'center'>
<tr>
<th>Department</th>
<th>Person Incharge</th>
<th>Title</th>
</tr>";
while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['Depart'] . "</td>";
  echo "<td>" . $row['DeptPerson'] . "</td>";
  echo "<td>" . $row['Title'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
mysql_close($con);
?>
</div>
</div>
</div><!-- end #content-->
    
     <?php
    /*
     * @see includes/footer.php
	 * @code for footer and copyrights
	 */	
		include('includes/footer.php');
	?>

</body>
</html>