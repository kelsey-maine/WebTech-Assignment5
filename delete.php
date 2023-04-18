<?php
	$id = $_GET['id'];
	//open connection
	include_once ".env.php";
	$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
	if(!$con)
		exit("<p>Connection Error: " . mysqli_connect_error() . "</p>");
	//initialize statement
	$stmt = mysqli_stmt_init($con);
	if(!$stmt)
		exit("<p>Failed to initialize statement</p>");
	//prepare statement
	$query = "DELETE FROM Courses WHERE courseName = ?";
	if(!mysqli_stmt_prepare($stmt,$query))
		exit("<p>Failed to prepare statement</p>");
	//bind?
	mysqli_stmt_bind_param($stmt,"s",$id);
	//execute
	if(!mysqli_stmt_execute($stmt))
		exit("<p>Failed to execute statement</p>");
	header('Location: courses.php');