<?php
	session_start();
	if(!isset($_SESSION['menucolor']))
	{
		$_SESSION['menucolor'] = 'menucoloron';
		$_SESSION['enrolledcolor'] = 'enrolledcoloron';
		$_SESSION['darkmode'] = 'darkmodeoff';
	}
	if(isset($_POST["Colors"]))
	{
		if($_SESSION['menucolor'] == 'menucoloron')
			$_SESSION['menucolor'] = 'menucoloroff';
		else
			$_SESSION['menucolor'] = 'menucoloron';
		if($_SESSION['enrolledcolor'] == 'enrolledcoloron')
			$_SESSION['enrolledcolor'] = 'enrolledcoloroff';
		else
			$_SESSION['enrolledcolor'] = 'enrolledcoloron';
	}
	if(isset($_POST["DarkMode"]))
	{
		if($_SESSION['darkmode'] == 'darkmodeon')
			$_SESSION['darkmode'] = 'darkmodeoff';
		else
			$_SESSION['darkmode'] = 'darkmodeon';
	}	
?>

<?php
$darkmode = $_SESSION['darkmode'];
echo "<html lang='en-US' class='$darkmode'>";
?>
<head>
	<title>
	        Assignment 5
	</title>
	<style> <?php include_once "css/main.css"; ?> </style>
</head>
<body>
	<div class="autooverflow">
		<div class="img1container">
			<img src="images/University-of-Texas-San-Antonio-400x400.jpg" class="img1" width="150px">
		</div>
		<h1>Kelsey Maine</h1>
		<p class="subheading">Software Engineer</p>
	</div>
	<hr class="headbodylinebreak">
	<table>
		<tr>
			<?php
				$menucolor = $_SESSION['menucolor'];
				echo "<td class='$menucolor'>";
			?>
				<p align="center">Menu</p>
				<hr class="whitelinebreak">
				<ul>
					<li><a href="https://github.com/kelsey-maine">GitHub</a></li>
					<li><a href="courses.php">Courses</a></li>
					<li><a href="https://www.utsa.edu/">UTSA</a></li>
				</ul>
			</td>
			<td class="aboutme">
				<h2>About Me</h2>
				<img src="images/University-of-Texas-San-Antonio-400x400.jpg" class="img2" width="200px" height="200px">
				<p>vitae justo eget magna fermentum iaculis eu non diam phasellus vestibulum lorem sed risus ultricies tristique nulla aliquet enim tortor at auctor urna nunc id cursus metus aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper eget duis at tellus at urna condimentum mattis pellentesque id nibh tortor id aliquet lectus proin nibh nisl condimentum id venenatis a condimentum vitae sapien pellentesque habitant morbi tristique senectus eet malesuada fames ac turpis egestas sed tempus urna et pharetra pharetra massa massa ultricies mi quis hendrerimagna eget est lorem ipsum dolor sit morbi tristique senectus eet malesuada fames ac turpis egestas sed tempus urna et pharetra pharetra massa massa ultricies mi quis hendrerimagna eget est lorem ipsum dolor sit fore nsdifso condimentu matti lorem ipsum dolor sit</p>
				<p>convallis aenean et tortor at risus viverra ag at in tellus integer feugiat scelerisque varius morbi enim nunc faucibus a pellentesque sit amet porttitor eget dolor morbi non arcu risus quis varius quam quisque id diam vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus interdum posuere lorem ipsum dolor sit amet consectetur adipiscing elit duis tristique sollicitudin nibh sit amet commodo nulla facilisi nullam vehicula ipsum a arcu cursus vitae congue mauris rhoncus aenean vel elit scelerisque maurisesque pulvinar pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas maecenas pharetra convallis posuere morbi</p>
			</td>
			<?php
				$enrolledcolor = $_SESSION['enrolledcolor'];
				echo "<td class='$enrolledcolor'>";
			?>
				<p align="center">Enrolled Courses</p>
				<hr class="whitelinebreak">
				<ol>
					<li>CS4413</li>
					<li>CS4633</li>
					<li>CS4743</li>
					<li>IS4523</li>
				</ol>
				<p align="center">Theme Toggles</p>
				<hr class="whitelinebreak">
				<div align="center">
					<form action="index.php" method="post">
						<input type="submit" name="Colors" value="Colors">
						<br><br>
						<input type="submit" name="DarkMode" value="Dark Mode">
					</form>
				</div>
			</td>
		</tr>
	</table>
	<div class="footer">
		Copyright 2022 Kelsey Maine
	</div>
</body>
</html>
