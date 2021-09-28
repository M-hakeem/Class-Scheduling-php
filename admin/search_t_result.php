<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Schedule</title>
<link href="css/style.css" rel="stylesheet"/>
<link href='images/favicon.ico' rel='icon' type='images/ico'/>
<link href="css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<?php
	include ("includes/db.php");
	require ("session.php");

			$pT =$_REQUEST['pT'];
			$pSy =$_REQUEST['pSy'];
			$psem=$_REQUEST['psem'];

			if (isset($_POST['cmdSubmit'])) 
  	{ 		
		
			 header(
			 		"Location: teacher_result.php?pT=". $pT
					."&pSy=". $pSy 
					."&psem=". $psem					
		 		   );				   				   
			}
			
?>
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
</html>