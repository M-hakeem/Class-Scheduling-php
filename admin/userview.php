<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ENTRY | View User</title>
<link href="../css/style.css" rel="stylesheet"/>
<link href="../css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../css/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../css/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
	require ("../includes/db.php");
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
            <h1 align="center"><font color="#337033" size="5" face="Arial">Users List</font></h1><br/>
<?php
	require ("../includes/db.php");
	
	if (isset($_POST['subuser'])){
		
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$vp=$_POST['vp'];
		$trap = mysql_query("SELECT * FROM login WHERE UserName = '$user'");
		$numrows = MYSQL_NUMROWS($trap);
	
		if($numrows == 0){
	
	mysql_query("INSERT INTO login(UserName,UserPass) VALUES ('$user','$pass')");
			//echo "na save ko na !<br>";
			}else{
			echo "<font color='red'><b>Username already exist!!!</b></font>";
		}
	}
	
	$id = mysql_query("SELECT max(UserID)as max_id from login");
	$row_id = mysql_fetch_array($id);
	$max_id = $row_id['max_id'];
	
	
	$row= mysql_query ("SELECT UserName,UserPass from login where UserID = '$max_id'");
?>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("schedule", $con);

$result = mysql_query("SELECT * FROM schedule.login");
/*$result = mysql_query("SELECT login.UserID, department.Depart, course.CourseYrSection, course.Major
FROM department RIGHT JOIN course ON department.DeptID = course.DeptID");*/
	echo "<table class=\"data-table\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
	<tr>
	<th>UserName</th>
	<th>User Password</th>
	<th>Edit</th>
	<th>Delete</th>
	</tr>";
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
				
				
				$userid = $row['UserID'];	
				$user = $row['UserName'];
				$pass = $row['UserPass'];

?>
<tr class="data-view" bgcolor="<?php echo $bgcolor; ?>">
<td><?php echo $user; ?></td>
<td><?php echo $pass; ?></td>
<td><a href="editcourse.php?UserID=<?php echo $userid; ?>"> <img src='images/edit.png ' alt="edit" width="16" height="16" border="0" /></a></td>
<td><a href="deletecourse.php?UserID=<?php echo $userid; ?>"> <img src='images/delete.png' alt="delete" width="16" height="16" onClick="return confirm('Are you sure you want to delete teacher record of # <?php
echo $userid;?>?')" /></a></td>
</tr>
<?php } ?>	
</table>
<?php
mysql_close($con);
?>
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
  
   </div>

</body>
</html>