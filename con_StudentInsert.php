<?php 
	session_start();
	if (!isset($_SESSION['un'])) {
		header("Location: login.php");
	}
	extract($_POST);
	include_once("connection_string.php");


	$sql = "INSERT INTO student (studentID, StudentRoll, StudentName, EnroomentNo) VALUES (NULL, '$StudentRoll', '$StudentName', '$EnroomentNo')";

	mysqli_query($con,$sql);

	if (mysqli_errno($con)) {
		$_SESSION['err'] = "Something is wrong , not perfome task";
		header("Location: index.php");
	}
	else{
		$_SESSION['msg'] = "Insert Successfully...";
		header("Location: index.php");
	}

?>