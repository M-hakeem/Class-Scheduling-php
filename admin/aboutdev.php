<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ABOUT US | Developer</title>
<link href="../css/style.css" rel="stylesheet"/>
<link href="../css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../css/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../css/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
     /*
     * @require include database connection
	 * @include include session  
	 */	
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
        			<h1 align="left"><font face="Arial" color="#337c33">About The Developer</font></h1><br/>
<p align="center">
The developers of the Online Schedule System For Institute of Computing And ICT ABU-Zaria.</p><br/>
			<div class="pics">
                <div class="pic">
                	<font face="Arial" color="#337c33" size="5">Project Leader</font><br/><br/>
                    <a href="https://www.facebook.com/#!/profile.php?id=1403444063"><img src="../images/chmsc logo.jpg" width="200" height="200" border="2"></a>
                </div>
                <div class="pic-content">
                	<font face="Arial" color="#337c33" size="3"><b>Mohammed Abdulhakeem</b></font><br/>
                    <font face="Arial" color="#337c33" size="3">Email: mohammedabdulhakeem5@gmail.com</font><br/>
                    <font face="Arial" color="#337c33" size="3">Iya Abubakar Computer Center</font>
                </div>
            </div>
            <div class="pics2">
                <div class="pic3">
                	<font face="Arial" color="#337c33" size="5">System Analyst</font><br/><br/>
                    <a href=""><img src="../images/chmsc logo.jpg" width="200" height="200" border="2"></a>
                </div>
                <div class="pic-content3">
                	<font face="Arial" color="#337c33" size="3"><b>Mohammed Abdulhakeem</b></font><br/>
                    <font face="Arial" color="#337c33" size="3">Email: mohammedabdulhakeem5@gmail.com</font><br/>
                    <font face="Arial" color="#337c33" size="3">Programmer</font>
                </div>
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
