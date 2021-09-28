<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ENTRY | Edit Year</title>
<link href="../css/style.css" rel="stylesheet"/>
<link href='../images/favicon.ico' rel='icon' type='images/ico'/>
<link href="../css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../css/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../css/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
	require ("../includes/db.php");
	include ("../session.php");
$yearid =$_REQUEST['YearID'];

$result =  mysql_query("SELECT * FROM schoolyear WHERE YearID  = '$yearid'");
$row = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: data not found..");
		}
				$yearid = $row['YearID'];
				$year = $row['Year'];
			
if(isset($_POST['submit'])){
	
	$year_save = $_POST['year'];
	
	mysql_query("UPDATE schoolyear SET Year ='$year_save' WHERE YearID = '$yearid'")or die(mysql_error()); 
	echo "Saved!";
	
	header("Location: yearview.php");
				
}

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
			<div class="content-wrap2" align="center">
        			<h1><font color="#337033" size="5" face="Arial">Add New School Year</font></h1><br/><br/>
				<form method="post">
                   <div class="content"> <table>
				   <tr>
						<td><label>School Year:</label></td>
						<td><input type="text" name="year" value="<?php echo $year; ?>"/><td>
				   </tr>
				   <tr>
						<td></td>
						<td><input type="submit" name="submit" value="" />
						<input type="submit" name="clear" class="clear_button" value=""/><td>
				   </tr>
				</table>	
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

</div>

</body>
</html>