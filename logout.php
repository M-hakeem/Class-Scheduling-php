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
        	
        </div>
    </div>
<div id="nav">
    		<ul id="nav" class="dropdown dropdown-horizontal">
	<li class="first"><a href="home.php">Home</a></li>
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
			<div class="content-wrap" align="center">	
<?php
session_start();

  
  
		@session_unregister('is');
		@session_unset();

  
 echo '<meta http-equiv="refresh" content="2;url=index.php">';
 echo'<span class="itext"><font size="5" color="#337033">Logging out please wait...............</font></span>';
 
 ?>
		</div>						
       	 </div>
 			   </div>
  <?php
    /*
     * @see includes/footer.php
	 * @code for footer and copyrights
	 */	
		include('includes/footer.php');
	?>

</div>
</html>
</body>