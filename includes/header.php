<div id="header">
    	<div class="wrapper-logo">
		
        	<div><img src="../images/index_03.png"></div>
        </div>
</div> <!-- end #header-->

 <div class="nav-wrapper">
 <div class="wrapper-nav">
		<ul id="nav" class="dropdown dropdown-horizontal">
				<li class="first"><a href="../admin/home.php">Home</a></li>
				<li class="dir">View Schedules
					<ul>
						<li class="first"><a href="search_teacher.php">Staff Schedule</a></li>
						<li class="dir2"><a href="search_student.php">Student Schedule</a></li>
						<li class="last"> <a href="search_room.php">Room Schedule</a></li>
					</ul>
				</li>

				<li class="dir">Schedule
							<ul>
								<li class="first"><a href="schedule.php">Add</a></li>
								<li class="last"><a href="scheduleview.php">View</a></li>
							</ul>
						</li>
				<li class="dir">Entry
					<ul>
						<li class="first"><a href="" class="dir">Staff</a>
							<ul>
								<li class="first"><a href="add_teacher.php">Add</a></li>
								<li class="last"><a href="teacherview.php">View</a></li>
							</ul>
						</li>
						<li class="mid"><a href="">Course</a>
							<ul>
								<li class="first"><a href="add_course.php">Add</a></li>
								<li class="last"><a href="courseview.php">View</a></li>
							</ul>
						</li>
						<li class="mid"><a href="" >Subject</a>
						<ul>
								<li class="first"><a href="add_subject.php">Add</a></li>
								<li class="last"><a href="subjectview.php">View</a></li>
							</ul>
						</li>
						<li class="mid"><a href="">Room</a>
						<ul>
								<li class="first"><a href="add_room.php">Add</a></li>
								<li class="last"><a href="roomview.php">View</a></li>
							</ul>
						</li>
						<li class="mid"><a href="">Department</a>
						<ul>
								<li class="first"><a href="add_dept.php">Add</a></li>
								<li class="last"><a href="deptview.php">View</a></li>
							</ul>
						</li>
						<li class="last"><a href="" class="dir">School Year</a>
						<ul>
								<li class="first"><a href="add_year.php">Add</a></li>
								<li class="last"><a href="yearview.php">View</a></li>
							</ul>
						</li>
					</ul>
				</li>

	<li><a href="#" class="dir">About Us</a>
		<ul>
			<li class="first"><a href="schedsys.php">ICICT Online Scheduling System</a></li>
			<li class="last"><a href="aboutdev.php">Developer</a></li>
		</ul>
	</li>
	<li><a href="Users Manual.pdf" class="last">Help</a></li>

	<li><a href="logout.php">Logout</a></li>

		</ul>
         <div id="search">
                <form method="get" name="searchform" action="http://www.google.com.ph/search" target="_blank">
                <table cellpadding="0" cellspacing="0" border="0"><tr>
                <td></td>
                <td><input  onfocus="searchfield_focus(this)" alt="search" type="text" name="as_q" width="20" height="2" value="Powered by Google"  onfocus="if (this.value == 'Powered by Google') this.value = '';" onblur="if (this.value == '') this.value = 'Powered by Google';" maxlength="255" onClick="value=''" style="font-style:italic" /></td>
								<td><a href="javascript: submitform();" class="submit-form">Search</a>
								<script type="text/javascript">
								function submitform()
								{
								  document.searchform.submit();
								}
								</script>
								</td>
                </tr></table>
                </form>
			</div>  
			<div class="clear_b"></div>
</div> <!-- end #nav-->     
</div>