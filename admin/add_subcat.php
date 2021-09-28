<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Entry</title>
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
        			<h1><font face="arial">Add Subject Category</font></h1><br/><br/>
					<form action="">
					<font face="arial">Subject Category:</font>
					<input type="text" name="subjectcat" /><br/><br/>
					<input type="submit" name="submit" value="Submit"/>
					</form>
       	 </div>
    </div> <!-- end #content-->
    
      <div id="footer">
    		<div class="footer-nav">
        			<ul>
                    <li><a href="">Home</a>|</li> 
                    <li><a href="">Developer</a>|</li> 
                    <li><a href="">Contact us</a>|</li> 
                    <li><a href="">Scheduling System</a></li>
                </ul> 
                <p>Copyright 2011</p>
       	 </div>
    </div> <!-- end #content-->
    

</div>

</body>
</html>
