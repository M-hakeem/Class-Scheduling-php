<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ENTRY | Add Department</title>
<link href="../css/style.css" rel="stylesheet"/>
<link href="../css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../css/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../css/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
</head>


<?php
	include ("../includes/db.php");
	include ("../session.php");
	
if (isset($_POST['subdept'])) :
		
		$dept=$_POST['dept'];
		$personin=$_POST['personin'];
		$title=$_POST['title'];
		
		if (trim($dept) == ""){ $flagdept = 'Required Field.';}	
		if (trim($personin) == ""){ $flagpersonin = 'Required Field.';}
		if (trim($title) == ""){ $flagtitle = 'Required Field.';}
		
	   if (($flagdept == "") &&  ($flagpersonin == "")&& ($flagdept == "")) :
		//check for duplicate records
		
		$trap = mysql_query("SELECT * FROM department WHERE Depart = '$dept'");
		$numrows = MYSQL_NUMROWS($trap);
		echo $numrows;
        if ($numrows > 0) :
		     //$already_exist = 'Department already exist';
			 ?><body onLoad = "show_alert()"><?php
	    else:
		mysql_query("INSERT INTO department(Depart,DeptPerson,Title) VALUES ('$dept','$personin','$title')") or die(mysql_error()); 
					echo "Your file has been saved in the database..";
					 header(
			 	"Location: deptview.php");
		endif;
				
   endif;
     
endif;
	?>	
<div id="wrapper">
<body>
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
        			<h1><font color="#337033" size="5" face="Arial">Add New Department</font></h1><br/><br/>
				<form method="post">
                   <div class="content"> <table>
				   <p><?php echo ($already_exist) ? $already_exist : " " ?></p>
				   <tr>
						<td><label>Department:</label></td>
						<td><input type="text" name="dept"style="width:288px" value="<?php echo ($_POST['dept']) ? $_POST['dept'] : " " ?>"/></td>
						<td><?php echo ($flagdept) ? $flagdept : " " ?></td>
				   </tr>
				   <tr>
						<td><label>Person Incharge:</label></td>
						<td><input type="text" name="personin"style="width:288px" value="<?php echo ($_POST['personin']) ? $_POST['personin'] : " " ?>"/></td>
						<td><?php echo ($flagpersonin) ? $flagpersonin : " " ?></td>
				   </tr>
				   <tr>
						<td><label>Title:</label></td>
						<td><input type="text" name="title" style="width:288px" value="<?php echo ($_POST['title']) ? $_POST['title'] : " " ?>"/></td>
						<td><?php echo ($flagtitle) ? $flagtitle : " " ?></td>
				   <tr>
						<td></td>
						<td><input type="submit" name="subdept" value="" />
						<input type="submit" name="clear" class="clear_button" value="" /></td>
				   </tr>
					</table>
				</form>				
			</div>						
       	 </div>
    </div> <!-- end #content-->
   
	  </div> 
    
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
alert("Department already exist");
}
</script>