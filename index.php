<?php
session_start();
?>
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
</head>
<body>


	
<div id="wrapper">
<div id="header">
    	<div class="wrapper-logo">
        	<div><img src="images/chmsclogo_02.png"></div>
        </div>
    </div>
 
					

                   	<?php if ($_SESSION['is']['UserName']):?>
					<li><a href="logout.php">Logout</a></li>
					<?php endif;?>
                </ul>
			<!--<div id="search" align="right">
                <form method="get" name="searchform" action="http://www.google.com.ph/search" target="_blank">
                <table cellpadding="0" cellspacing="0" border="0"><tr>
                <td></td>
                <td><input  onfocus="searchfield_focus(this)" alt="search" type="text" name="as_q" width="15" height="2" value="Google"  onfocus="if (this.value == 'Powered by Google') this.value = '';" onblur="if (this.value == '') this.value = 'Powered by Google';" maxlength="255" onClick="value=''" style="font-style:italic" /></td>
				<td><input type="submit" name="searchbutton" value="" title="Search" width="10" height="5"/></td>
                </tr></table>
                </form>
			</div>  -->
           
    </div>
	
    
    <div id="content">
    		<div class="content-nav">
            	<div class="left-content">
				<h1>Welcome to ICICT Online Class Scheduling System</h1><br/>
		
			<h2>WELCOME TO INSTITUTE OF COMPUTING AND ICT ONLINE SCHEDULING SYSTEM <br> FROM HERE ADMIN CAN  LOG IN AND ADD AND EDIT STAFF AND STUDENT CLASS SCHEDULE......</h2>
<img src="images/chmsc logo.jpg" aling="center" width="400" height="250"/>
			   </div>
			   
			<div class="side-wrap">
        			<h1>Administrator Login</h1><br/>
					<form action="" method="post">
					<div class="response"></div>					<table>
						<tr>
							<td><label><font face="arial">Username:</font></label></td>
							<td><input type="text" name="user" /></td>
						</tr>
						<tr>
							<td><label><font face="arial">Password:</font></label></td>
							<td><input type="password" name="pass" /></td>
						</tr>
						<tr>
							<td></td>
							<td ><input type="submit" name="submit" value=""/></td>
						</tr>
					</table>
					</form>
<p align="center"><?php
	include ("includes/db.php");
?>
<?php	
$error = "";

if (isset($_POST['submit'])) 
{ 			
	$user_name = $_POST['user'];			
	$user_pass = $_POST['pass'];	
	$numberOfRows="";
	
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
			echo " <font color= 'red'><b>Invalid Username and Password Combination!</b></font>";
				} 
		else if ($numberOfRows > 0) 
				{
				session_start('is');
				$_SESSION['is']['submit']    = TRUE;
				$_SESSION['is']['UserName'] = $_POST['user'];
				$session = "1";	
		
				header("location:admin/home.php");				 	
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
		include('includes/footer.php');
	?>

</body>
</html>
