<?php 
	session_start();
	if (!isset($_SESSION['un'])) {
		header("Location: login.php");
	}

	extract($_POST);


	include_once("connection_string.php");


	$sql = "UPDATE student SET StudentRoll  = '$StudentRoll', StudentName  = '$StudentName', EnroomentNo = '$EnroomentNo' WHERE studentID = $studentID";

	mysqli_query($con,$sql);

	if (mysqli_errno($con)) {
		$_SESSION['err'] = "Something is wrong , not perfome task";
		header("Location: index.php");
	}
	else{
		$_SESSION['msg'] = "EDIT Successfully...";
		header("Location: index.php");
	}

?>