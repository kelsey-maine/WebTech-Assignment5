<?php
	include_once ".env.php";
	if(isset($_POST["submit"]))
	{
		//open connection
		$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
		if(!$con)
			exit("<p>Connection Error: " . mysqli_connect_error() . "</p>");
		//initialize statement
		$stmt = mysqli_stmt_init($con);
		if(!$stmt)
			exit("<p>Failed to initialize statement</p>");
		//prepare statement
		$query = "INSERT INTO Courses (courseName, courseNumber, description, finalGrade, enrolled) VALUES (?, ?, ?, ?, ?)";
		if(!mysqli_stmt_prepare($stmt,$query))
			exit("<p>Failed to prepare statement</p>");
		//bind?
		if($_POST["curr_enrolled"] == 1)
			$enrolled = 1;
		else
			$enrolled = 0;
		mysqli_stmt_bind_param($stmt,"ssssi",$_POST["course_name"], $_POST["course_number"], $_POST["description"], $_POST["final_grade"], $enrolled);
		//execute
		if(!mysqli_stmt_execute($stmt))
			exit("<p>Failed to execute statement</p>");
		mysqli_stmt_close($stmt);
		mysqli_close($con);					   
	}
?>
<html lang="en-US">
	<head>
		<title>Courses</title>
		<link rel="stylesheet" type="text/css" href="css/courses.css">
	</head>
	<body>
		<div class="autooverflow">
			<div class="img1container">
				<img src="images/University-of-Texas-San-Antonio-400x400.jpg" width="150px">
			</div>
			<h1><a href="index.php">Kelsey Maine</a> -- Courses Taken</h1>
			<p class="subheading">Software Engineer</p>
		</div>
		<hr class="headbodylinebreak">
		<?php
		//open connection
		$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
		if(!$con)
			exit("<p>Connection Error: " . mysqli_connect_error() . "</p>");
		//initialize statement
		$stmt = mysqli_stmt_init($con);
		if(!$stmt)
			exit("<p>Failed to initialize statement</p>");
		//prepare statement
		$query = "SELECT courseName, courseNumber, description, finalGrade, enrolled FROM Courses WHERE autoId > ?";
		if(!mysqli_stmt_prepare($stmt,$query))
			exit("<p>Failed to prepare statement</p>");
		//bind?
		$param = 0;
		mysqli_stmt_bind_param($stmt,"i",$param);
		//execute
		if(!mysqli_stmt_execute($stmt))
			exit("<p>Failed to execute statement</p>");
		//bind result
		mysqli_stmt_bind_result($stmt, $name, $number, $desc, $grade, $enrolled);
		
		echo "<div>
				<table>
					<tr align='center'>
						<th>Course Name</th>
						<th>Course Number</th>
						<th>Description</th>
						<th>Final Grade</th>
						<th>Delete</th>
					</tr>";
		
		//fetch result
		while(mysqli_stmt_fetch($stmt) != NULL)
		{
			if($enrolled)
				$enrolledclass = 'enrolled';
			else
				$enrolledclass = 'notenrolled';

			echo "<tr class=$enrolledclass><td>$name</td><td>$number</td><td>$desc</td><td>$grade</td><td><a href='delete.php?id=$name'>DELETE</a></td></tr>";
		}
		echo "</table></div>";
		mysqli_stmt_close($stmt);
		mysqli_close($con);
		?>
			
		<hr>
		<h2>Add a Course</h2>
		<form action="courses.php" method="post">
			<div>
				<label for="course_name">Course Name</label>
				<input type="text" id="course_name" name="course_name">
			</div>
			<br>
			<div>
				<label for="course_number">Course Number</label>
				<input type="text" id="course_number" name="course_number">     
			</div>
			<br>
			<div>
				<label for="description">Description</label>
				<textarea id="description" name="description" rows="5" cols="30"></textarea>
			</div>
			<br>
			<div>
				<label for="final_grade">Final Grade</label>
				<input type="text" id="final_grade" name="final_grade">
			</div>
			<br>
			<div>
				<label for="curr_enrolled">Currently Enrolled?</label>
				<input type="checkbox" id="curr_enrolled" name="curr_enrolled" value="1">
			</div>
			<br>
			<div>
				<input type="submit" name="submit" value="Add Course">
			</div>
		</form>
		
		<div class="footer">
			Copyright 2022 Kelsey Maine
		</div>
	</body>
</html>
