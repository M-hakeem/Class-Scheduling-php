<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HOME</title>
<link href="../css/style.css" rel="stylesheet"/>
<link href="../css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../css/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../css/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />

<!--[if lt IE 7]>
<style type="text/css" media="screen">
#menuh{float:none;}
body{behavior:url(csshover.htc); font-size:100%;}
#menuh ul li{float:left; width: 100%;}
#menuh a{height:1%;font:bold 0.7em/1.4em arial, sans-serif;}
</style>
<![endif]-->

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
        			<h1><font face="lucida-handwritting" color="#337c33">WELCOME TO ICICT ONLINE CLASS SCHEDULING SYSTEM ADMINISTRATOR PAGE!!</font></h1><br/>
<h2><font face="lucida-handwritting" color="#337c33">From Here Admin Can Add And Delete Class Schedule For Staff And Student</font></h2><br/>
<img src="../images/chmsc logo.jpg" aling="center" width="400" height="250"/>
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
