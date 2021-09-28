
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-typfile:///C:/wamp/www/Online_Scheduling_System/images/chmsclogo_02.pnge" content="text/html; charset=utf-8" />
<title>Online Scheduling System</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<script type="text/javascript" src="lib/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="lib/jquery.tools.js"></script>	
		<script type="text/javascript" src="lib/jquery.custom.js"></script>
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href="css2/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css2/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css2/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
<link href='images/favicon.ico' rel='icon' type='images/ico'/>
<link href="css/style2.css" rel="stylesheet"/>
</head>
<?php
	include ("includes/db.php");
?>
<body>


<div id="main">
<!-- header begins -->
<div id="header">
	<div id="logo">
    	<img src="images/chmsclogo_02.png">
    </div>
    
</div>
<!-- header ends -->

<!-- content begins -->       
<div id="content">
	<div id="buttons">
	 <ul id="nav" class="dropdown dropdown-horizontal">
		<li><a href="webhome.html">Home</a></li>
		<li class=""><a href="">Search</a>
			<ul>
				<li class=""><a href="searcht.php">Teacher Schedule</a></li>
				<li class=""><a href="search_student.php">Student Schedule</a></li>
				<li class=""> <a href="search_room.php">Room Schedule</a></li>
			</ul>
		</li>
		  <a href="blog.html" class="but" title="">Blog</a>
		  <a href="about_us.html"  class="but" title="">About us</a>
		  <a href="contact_us.html" class="but" title="">Contact us</a>
		 </ul>
	</div>
	<div class="top_img">
			<div class="scrollable">
				<div class="items">
					<div class="item">
						<div class="header1"></div>                                    
					</div> <!-- item -->
					<div class="item">
					    <div class="header2"></div>						
					</div> <!-- item -->
					<div class="item">
					    <div class="header3"></div>						
					</div> <!-- item -->
					<div class="item">
					    <div class="header4"></div>						
					</div> <!-- item -->											
					
				</div> <!-- items -->
			</div> <!-- scrollable -->
	</div>
	<div class="circl_all">
    	<div class="navi"></div> <!-- create automatically the point dor the navigation depending on the numbers of items -->	
    </div>
    
    <div class="yellow_top">
    <div class="yellow_bot">
    
        <div class="box_home_bg">
          <div class="box_home bg_grad">
            <img src="images/img11.gif" class="img_l"  alt="" />
            <div style="height:4px"></div>
                <h1>Search Schedule</h1>
            	<div style="height:3px; clear:both"></div>
              	<b><u><a href="search_teacher.php" class="teacher">Teacher Schedule</a> </u></b><br /><br />
				<b><u><a href="search_student.php" class="student">Student Schedule</a> </u></b><br /><br />
				<b><u><a href="search_room.php" class="room">Room Schedule</a> </u></b><br /><br />
              
                <div style="height:25px">
                    <a href="#" class="read">read more</a>
                </div>
          </div>
            <div class="float_left" style="width: 15px; height: 10px;"></div>
          <div class=" box_home bg_grad">
              <img src="images/img12.gif" class="img_l"   alt="" />
              <div style="height:4px"></div>
              <h1>Vestibulum vel lacus. </h1>
              <div style="height:3px; clear:both"></div>
              <b>Interdum non id massa.</b><br />
                Nulla mollis, magna quis feugiat faucibus, risus lorem lacinia justo, et adipiscing tortor lacus in nunc. Duis in tellus vel ipsum bibendum gravida. Nunc eget mi id risus tempor rhoncus. 
            <div style="height:25px">
                    <a href="#" class="read">read more</a>
            </div>
            </div>
            <div class="float_left" style="width: 15px; height: 10px;"></div>
            <div class=" box_home bg_grad">
              <img src="images/img13.gif" class="img_l"  alt="" />
              <div style="height:4px"></div>
                <h1>Cras aliquam quam. </h1>
              <div style="height:3px; clear:both"></div>
                <b>Accumsan eu lobortis urna mollis.</b><br />
                Sed a tellus orci, a luctus enim. Aliquam congue nisi quis felis porttitor vestibulum. Nam eget metus dui, eu consectetur urna. Donec sed mauris quis nisl iaculis ullamcorper.
                <div style="height:25px">
                    <a href="#" class="read">read more</a>
                </div>
            </div>
            <div style="clear: both"></div>
        </div>
        
        <div style=" height: 30px;"></div>
        
        <div class="bg_grad">
            <div class="content-nav">
			<div class="content-wrap2" align="center">
        			<h1><font color="#ffffff" size="5" face="Arial">Search Room Schedule</font></h1><br/><br/>
				<form action="roomnext.php" method="post">
                   <div class="content"></div>		<table>
						<tr>
						<td><label>Room:</label></td>
						<td> <select name="room" style="width:300px"/>
						<?php
							$id=mysql_query("SELECT max(RoomID)as max_id from room");
							$row_id = mysql_fetch_array($id);
							$max_id= $row_id ['max_id'];

							$row = mysql_query ("SELECt RoomName FROM room where RoomID = 	'$max_id'");

							$result = mysql_query("SELECT * FROM schedule.room ORDER BY RoomID");

						do{
						?>
						<option value="<?php echo $row['RoomID'];?>"><?php echo $row['RoomName'];?></option>
						<?php } while ($row = mysql_fetch_assoc($result));?>
						</select></td>
						</tr>
						<tr>
						<td><label>School Year:</label></td>
						<td><select name="year" style="width:300px" />
						<?php
							$id=mysql_query("SELECT max(YearID)as max_id from schoolyear");
							$row_id = mysql_fetch_array($id);
							$max_id= $row_id ['max_id'];

							$row = mysql_query ("SELECt Year FROM schoolyear where YearID = 	'$max_id'");

							$result = mysql_query("SELECT * FROM schedule.schoolyear ORDER BY YearID");

						do{
						?>
						<option value="<?php echo $row['YearID'];?>"><?php echo $row['Year'];?></option>
						<?php } while ($row = mysql_fetch_assoc($result));?>
						</select></td>
						</tr>
						<tr>
						<td><label>Semester:</font></td>
						<td><select name="sem" style="width:300px" />
						<?php
							$id=mysql_query("SELECT max(SemID)as max_id from semester");
							$row_id = mysql_fetch_array($id);
							$max_id= $row_id ['max_id'];

							$row = mysql_query ("SELECt Semester FROM semester where SemID = 	'$max_id'");

							$result = mysql_query("SELECT * FROM schedule.semester ORDER BY SemID");

						do{
						?>
						<option value="<?php echo $row['SemID'];?>"><?php echo $row['Semester'];?></option>
						<?php } while ($row = mysql_fetch_assoc($result));?>
						</select></td>
						</tr>
						<tr>
						<td></td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="submit" name="next" value="" /></td>
						</tr>
						</table>
				</form>				
			</div>						
       	 </div>
        </div>
        <div style=" height: 30px;"></div>
      <!-- bottom begin -->    
        <div id="bottom">
          <div class="b_col1 col_bg">
            <h2>Services</h2>
                <ul>
                  <li><a href="#">Service Number 1</a></li>
                    <li><a href="#">Service Number 2</a></li>
                    <li><a href="#">Service Number 3</a></li>
                    <li><a href="#">Service Number 4</a></li>
                  <li><a href="#">Service Number 5</a></li>
                    <li><a href="#">Service Number 6</a></li>
                </ul>
            </div>
            <div class="b_col2 col_bg">
              <h2>Contact Information</h2>
                1234 SomeStreet<br />
                Brooklyn, NY 11201<br />
                Phone:  1(234) 567 8910<br />
                Fax: 1(234) 567 8910<br />
                E-mail: companyname@yahoo.com     
          </div>
            <div class="b_col3 col_bg">
                <h2>Follow Us</h2>
                <ul>
                    <li><img src="images/fu_i1.png" class=" fu_i" alt="" /><a href="#">Subscribe to Blog</a></li>
                    <li><img src="images/fu_i2.png" class=" fu_i" alt="" /><a href="#">Be a fan on Facebook</a></li>
                    <li><img src="images/fu_i3.png" class=" fu_i" alt="" /><a href="#">RSS Feed</a></li>
                    <li><img src="images/fu_i4.png" class=" fu_i" alt="" /><a href="#">Follow us on Twitter</a></li>
                </ul>
          </div>
            
          <div style="clear: both; height:40px"></div>
        </div>   
    <!-- bottom end -->   
    
    
    </div>
    </div>
 
   	<div style="clear: both; height: 1px;"></div>                  
</div>
<!-- content ends --> 

<!-- footer begins -->
        <?php
			include ('includes/footer2.php');
		?>
<!-- footer ends -->
</div>
</body>
</html>
