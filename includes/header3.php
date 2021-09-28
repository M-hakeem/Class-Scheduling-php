<div id="header">
    	<div class="wrapper-logo">
		
        	<div><img src="../images/index_03.png"></div>
        </div>
</div> <!-- end #header-->

 <div class="nav-wrapper">
 <div class="wrapper-nav">
		<ul id="nav" class="dropdown dropdown-horizontal">
				<li class="first"><a href="../index.php">Home</a></li>
				<li class="dir">View Schedules
					<ul>
						<li class="first"><a href="../search_teacher.php">Staff Schedule</a></li>
						<li class="dir2"><a href="../search_student.php">Student Schedule</a></li>
						<li class="last"> <a href="../search_room.php">Room Schedule</a></li>
					</ul>
				</li>

				<li><a href="#" class="dir">About Us</a>
					<ul>
						<li class="first"><a href="../schedsys.php">Scheduling System</a></li>
						<li class="last"><a href="../aboutdev.php">Developer</a></li>
					</ul>
				</li>
				<li><a href="Users Manual.pdf" class="last">Help</a></li>

		</ul>
         <div id="search">
                <form method="get" name="searchform" action="http://www.google.com.ph/search" target="_blank">
                <table cellpadding="0" cellspacing="0" border="0"><tr>
                <td></td>
                <td><input  onfocus="searchfield_focus(this)" alt="search" type="text" name="as_q" width="20" height="2" value="Powered by Google"  onfocus="if (this.value == 'Google') this.value = '';" onblur="if (this.value == '') this.value = 'Powered by Google';" maxlength="255" onClick="value=''" style="font-style:italic" /></td>
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