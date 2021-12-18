<?php 
	session_start();
	if (!isset($_SESSION['un'])) {
		header("Location: login.php");
	}

	extract($_GET);
	include_once("connection_string.php");

	$sql = "SELECT * FROM student WHERE studentID = '$id'";

	$result = mysqli_query($con,$sql);

	$row = mysqli_fetch_assoc($result);
	if (!$row) {
		$_SESSION['err'] = "No record Found to edit";
		header("Location: index.php");
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="con_editStudent.php" method="post">
		<input type="hidden" name="studentID" value="<?php echo($row['studentID']) ?>">
		<input type="text" name="StudentRoll" value="<?php echo($row['StudentRoll']) ?>"><br/>
		<input type="text" name="StudentName" value="<?php echo($row['StudentName']) ?>"><br/>
		<input type="text" name="EnroomentNo" value="<?php echo($row['EnroomentNo']) ?>"><br/>
		
		<input type="submit" value="Edit"><br/>
	</form>
</body>
</html>
