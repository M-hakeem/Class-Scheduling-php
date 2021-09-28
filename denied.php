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
	include ('includes/header2.php');
?>
    </div>
<div id="nav">
    		<ul id="nav" class="dropdown dropdown-horizontal">
	<li class="first"><a href="index.php">Home</a></li>
	<li class="dir">Search
		<ul>
			<li class="first"><a href="search_teacher.php">Teacher Schedule</a></li>
			<li class="dir2"><a href="search_student.php">Student Schedule</a></li>
			<li class="last"> <a href="search_room.php">Room Schedule</a></li>
		</ul>
	</li>

               <li><a href="" class="dir">About Us</a>
		<ul>
			<li class="first"><a href="schedsys.php">Scheduling System</a></li>
			<li class="last"><a href="aboutdev.php">Developer</a></li>
		</ul>
	</li>
	<li><a href="help.php" class="last">Help</a></li> 
					

                   	<?php /*if ($_SESSION['is']['UserName']):?>
					<li><a href="logout.php">Logout</a></li>
					<?php endif;*/?>
                </ul>
			<div id="search" align="right">
                <form method="get" name="searchform" action="http://www.google.com.ph/search" target="_blank">
                <table cellpadding="0" cellspacing="0" border="0"><tr>
                <td></td>
                <td><input  onfocus="searchfield_focus(this)" alt="search" type="text" name="as_q" width="20" height="2" value="Powered by Google"  onfocus="if (this.value == 'Powered by Google') this.value = '';" onblur="if (this.value == '') this.value = 'Powered by Google';" maxlength="255" onClick="value=''" style="font-style:italic" /></td>
				<td><input type="submit" name="searchbutton" value="" title="Search" width="10" height="5"/></td>
                </tr></table>
                </form>
			</div> 
    </div>
	
    
    <div id="content">
    		<div class="content-nav">
				<div class="left-content">
            	<h1>Welcome to Online Scheduling</h1><br/>
			
<p>
			ntore veritatis et  quasi architecto  beatae vitae dicta sunt e xplicabo.<br/> Nemo enim ips am volupta
			tem  quia voluptas sit aspernatur aut odit aut fugit, sed quia conse quuntur maut  fugit, sed quia 
			conse quuntur m aut fugit, sed quia c,ntore veritatis et  quasi architecto  beatae vitae dicta sunt e xplicabo.<br/> Nemo enim ips am voluptatem  quia voluptas sit aspernatur aut odit aut fugit,sed quia conse quuntur maut  fugit, sed quia 
			conse quuntur m aut fugit, sed quia c,</p><br/>
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
  		include ("includes/db.php");

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
							
							echo " <font color= 'red'><b>Invalid Username and Password Combination!</b></font>";
						
							} 
				 	else if ($numberOfRows > 0) 
							{
							//session_register('is');
							//$_SESSION['is']['submit']    = TRUE;
							$_SESSION['UserNames'] = $_POST['user'];
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
