<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>OPAC CHMSC</title>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" href="menu_style.css" type="text/css" />
<style type="text/css">
<!--
.style13 {
	font-size: 30px;
	font-weight: bold;
}
.style18 {font-size: 18px; font-weight: bold; }
.style21 {font-size: 24px}
.style22 {font-size: 18px}
-->
</style>
</head>
<body>
<?php include "db.php"; ?>
		<div id="body">
			<div id="header">
			</div>
		
			<div id="content">
			<div class="menu">
		
				<ul>
				<li><a href="index.php">Home</a></li>
				<ul>
					<li><a href="aboutus.php"  >About Us</a></li>
				<ul>
					<li><a href="search.php" >Search</a>
				</li>
			   </ul>
			</div>
			<div id="separator">
			</div>
			<br>
			<br>
			<?php include "db.php"; ?>
			  <?php
			  
				$result = "";
			
				if(isset($_POST['s'])){
				
					$title = $_POST['title'];
					$author= $_POST['title'];
					$place = $_POST['title'];
					$isbn = $_POST['title'];
					$publisher = $_POST['title'];
					$copyright = $_POST['title'];
					$totalt = "";
					$totala = "";
					$totalp = "";
					$totali = "";
					$total = "";
					$totalu = "";
					$totalc = "";
				
				$s = mysql_query("SELECT * FROM book WHERE Title LIKE '%$title%' OR Author LIKE '%$author%' OR Place_Publication LIKE '%$place%' 
				OR ISBN_Number LIKE '%$isbn%' OR copyright LIKE '%$copyright%' OR Publisher LIKE '%$publisher%'  ") or die (mysq_error());
					if($_POST['title'] == "") {
						echo "Key in Valid keyword";
						}else{
					While($row = mysql_fetch_array($s)){
						$title  = $row['Title'];
						$author1 = $row['Author'];
						$place = $row['Place_Publication'];
						$isbn = $row['ISBN_Number'];
						
						echo"<div align='center'><div id='resultbox'><table align='center' width='800' height='150' > 
						<tr><td width='284' height='83'><a href='sample.php'>
						$totalt$title
						$totalt</a></td></tr>
						<tr><td>$totala$author1
						$totala</td></tr>
						<tr><td>
						$totalp$place
						$totalp</td></tr>
						<tr><td>
						$isbn$isbn
						$totali</td></tr>
						
						</table>
						</div></div>";
						
				}
			}}
			
			?>
		</div>

 </div>	

</div>
	<div id="footer">
	</div>
			
		


</body>
</html>
