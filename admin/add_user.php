<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ENTRY | Add User</title>
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
        			<h1><font color="#337033" size="5" face="Arial">Edit Password</font></h1><br/><br/>
				<form action="userview.php" method="post">
                   <div class="content"> </div> <table>
				   <tr>
						<td><label>Username:</label></td>
						<td><input type="text" style="width:288px" name="user" /></td>
					</tr>
					<tr>
						<td><label>Password:</label></td>
						<td><input type="password" style="width:288px" name="pass" /></td>
					</tr>
					<tr>
						<td><label>Verify Password:</label></td>
						<td><input type="password" style="width:288px" name="vp" /></td>
					</tr>
					<tr>
						<td></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="submit" name="subuser" value="" />
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
