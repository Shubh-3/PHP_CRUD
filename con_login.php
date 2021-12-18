<?php 
	session_start();
	extract($_POST);
	include_once("connection_string.php");

	$sql = "select * from user where UserName='$UserName' and Password='$Password'";

	$result = mysqli_query($con,$sql);

	$row = mysqli_fetch_assoc($result);

	if ($row) {
		$_SESSION['un'] = $row['UserName'];
		header("Location: index.php");
	}
	else{
		header("Location: login.php?msg=invalid");
	}
?>