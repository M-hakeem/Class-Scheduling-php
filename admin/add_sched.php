<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SCHEDULE | Add Schedule</title>
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
			<div class="content-wrap" align="center">
        			<h1><font color="#337033" size="5" face="Arial">Add New Schedule</font></h1><br/><br/>
				<form action="">
                   <div class="content">
						<font color="#337033" face="Arial">Semester:</font>
						<br/><br/>
						<font color="#337033" face="Arial">Course:</font>
						<br/><br/>
						<font color="#337033" face="Arial">Subject:</font>
						<br/><br/>
						<font color="#337033" face="Arial">Teacher:</font>
						<br/><br/>
						<font color="#337033" face="Arial">Room:</font>
						<br/><br/>
						<font color="#337033" face="Arial">Time:</font>
						<br/><br/>
						<font color="#337033" face="Arial">Day:</font>
                        <br/><br/>
						<font color="#337033" face="Arial">School Year:</font>
                        <br/><br/>
						<font color="#337033" face="Arial">Department:</font>
                    </div>
                    <div class="content2">
                        <input type="text" name="sem" /><br/><br/>
                        <input type="text" name="course" /><br/><br/>
                        <input type="text" name="subject" /><br/><br/>
                        <input type="text" name="teacher" /><br/><br/>
                        <input type="text" name="room" /><br/><br/>
                        <input type="text" name="time" /><br/><br/>
                        <input type="text" name="day" /><br/><br/>
                        <input type="text" name="year" /><br/><br/>
                        <select name="dept" style="width:150px" />
					</div>
                    <div class="content3">
                        <input type="submit" name="submit" value="Submit" />
						<input type="submit" name="submit" value="Clear" />
                    </div>
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

</body>
</html>
