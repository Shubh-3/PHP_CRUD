<?php 
	session_start();
	if (!isset($_SESSION['un'])) {
		header("Location: login.php");
	}

	extract($_GET);


	include_once("connection_string.php");


	$sql = "DELETE FROM student WHERE studentID = '$id'";

	mysqli_query($con,$sql);

	if (mysqli_errno($con)) {
		$_SESSION['err'] = "Something is wrong , not perfome task";
		header("Location: index.php");
	}
	else{
		$_SESSION['msg'] = "Delete Successfully...";
		header("Location: index.php");
	}

?>