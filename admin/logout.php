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
</head>
</head>
<body>
<div id="wrapper">
<?php include('../includes/header.php')?>
<div id="content">
    		<div class="content-nav">
			<div class="content-wrap" align="center">	
<?php

  
		@session_unregister('is');
		@session_unset();

  
 echo '<meta http-equiv="refresh" content="2;url=../index.php">';
 echo'<span class="itext"><font size="5" color="#337033">Logging out please wait...............</font></span>';
 echo '<br />';
 echo '<img src="../images/ajax-loader4.gif">';
 ?>
		</div>						
       	 </div>
    </div>
  <?php
    /*
     * @see includes/footer.php
	 * @code for footer and copyrights
	 */	
		include('../includes/footer.php');
	?>

</div>
</html>
</body>