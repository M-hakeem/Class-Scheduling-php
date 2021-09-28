<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ENTRY | Add Year</title>
<link href="../css/style.css" rel="stylesheet"/>
<link href="../css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../css/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../css/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
	include ("../includes/db.php");
	include ("../session.php");

if (isset($_POST['subyear'])) :
		
		$year=$_POST['year'];
		
		if (trim($year) == ""){ $flagyear = 'Required Field.';}	
		
		if (($flagyear == "")) :
		//check for duplicate records
		
		$trap = mysql_query("SELECT * FROM schoolyear WHERE Year = '$year'");
		$numrows = MYSQL_NUMROWS($trap);
		 if ($numrows > 0) :
		     //$already_exist = 'Year already exist';
			 ?><body onLoad = "show_alert()"><?php
	    else:
			mysql_query("INSERT INTO schoolyear(Year) VALUES ('$year')") or die(mysql_error());
			echo "Your file has been saved in the database..";
					 header(
			 	"Location: yearview.php");
		endif;
				
   endif;
     
endif;
	
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
                   <div class="content"> </div>   <table>
				   <p><?php echo ($already_exist) ? $already_exist : " " ?></p>
				   <tr>
						<td><label>School Year:</label></td>
						<td><input type="text" name="year" style="width:288px" value="<?php echo ($_POST['teacher']) ? $_POST['teacher'] : " " ?>"/></td>
						<td><?php echo ($flagyear) ? $flagyear : " " ?></td>
				   </tr>
				   <tr>
						<td></td>
						<td><input type="submit" name="subyear" value="" />
						<input type="submit" name="clear" class="clear_button" value="" /></td>
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

<script type="text/javascript">
function show_alert()
{
alert("School Year already exist");
}
</script>