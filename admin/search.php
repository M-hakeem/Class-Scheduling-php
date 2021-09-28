<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SEARCH</title>
<link href="../css/style.css" rel="stylesheet"/>
<link href='../images/favicon.ico' rel='icon' type='images/ico'/>
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
        			<h1 align="left"><font face="Arial" color="#337c33">Welcome to Online Scheduling</font></h1><br/>
<p align="left">
ntore veritatis et  quasi architecto  beatae vitae dicta sunt e xplicabo.<br/> Nemo enim ips am volupta
tem  quia voluptas sit aspernatur aut odit aut fugit, <br/>sed quia conse quuntur maut  fugit, sed quia 
conse quuntur m aut fugit, sed quia c</p><br/>
			<div class="side-wrap">
				<p><font color="#337033" size="5" face="Arial"><u>What do you want to do?</u></font></p><br/>
			    <div align="justify"><img src="images/1_03.png"><a href=""><font color="#68571b"><u>Search your schedule</u></font></a></div><br/>
				<div align="justify"><img src="images/2_07.png"><a href=""><font color="#68571b"><u>Search the teacher schedule</u></font></a></div><br/>
				<div align="justify"><img src="images/3_10.png"><a href=""><font color="#68571b"><u>Search the room schedule</u></font></a></div><br/>
				<p><font color="#337033" size="5" face="Arial"><u>Let me help you!</u></font></p><br/>
				<div align="justify"><img src="images/check_03.png"><a href=""><font color="#68571b"><u>How to add new schedule</u></font></a></div><br/>
				<div align="justify"><img src="images/check_03.png"><a href=""><font color="#68571b"><u>How to update the schedule</u></font></a></div><br/>
				<div align="justify"><img src="images/check_03.png"><a href=""><font color="#68571b"><u>How to delete schedule</u></font></a></div><br/>
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
