<?php>
session_start();

<?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HOME</title>
<link href="css/style.css" rel="stylesheet"/>
<link href="css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">

<?php
	include ('../includes/header3.php');
?>
    </div>
	
    <div id="content">
    		<div class="content-nav">
				<div class="left-content">
            	<h1>Login To Access</h1><br/>

				</div>
			<div class="side-wrap">
					<h1>Administrator Login</h1><br/>
					<form action="" method="post">
					<div class="response"></div>					<table>
						<tr>
							<td><label><font face="arial">Username:</font></label></td>
							<td><input type="text" name="user" value="Access Denied!!!" onclick="value=''"/></td>
						</tr>
						<tr>
							<td><label><font face="arial">Password:</font></label></td>
							<td><input type="password" name="pass" value="Access Denied!!!" onclick="value=''"/></td>
						</tr>
						<tr>
							<td></td>
							<td ><input type="submit" name="submit" value=""/></td>
						</tr>
					</table>
					</form>
<p align="center"><?php
  		include ("../includes/db.php");

		$error = "";
		// require ("Includes/StrFunctions.php");

 
			if (isset($_POST['submit'])) 
			{ 			
				$user_name = $_POST['user'];			
				$user_pass = $_POST['pass'];	
				$numberOfRows="";
					
					// sending query		
				$result = mysql_query("SELECT `login`.`UserName`, `login`.`UserPass` FROM login
					WHERE ((`login`.`UserName` = '$user_name') AND (`login`.`UserPass` = '$user_pass'))");
				
					
						if (!$result) 
						{
						die("Query to show fields from table failed");
						}
						echo $numberOfRows;
						$numberOfRows = MYSQL_NUMROWS($result);				
						If ($numberOfRows == 0) 
							{
							
							?><body onLoad = "show_alert()"><?php
						
							} 
				 	else if ($numberOfRows > 0) 
							{
							$usersession=$_SESSION['isa'];
						
					
							header("location:../admin/home.php");				 	
					}
				}
		?></p>
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
alert("Invalid Username and Password Combination!");
}
</script>