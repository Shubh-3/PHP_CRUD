<?php 
	session_start();
	if (!isset($_SESSION['un'])) {
		header("Location: login.php");
	}	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Crud Operation (Insert/update/delete/view)</title>
	

</head>
<body>
	<a href="StudentInsert.php">
		<input type="button" value="Add Record">
	</a>
	<form action="index.php">
		<input type="text" name="StudentName">
		<input type="submit" value="search">
	</form>
	<a href=""></a>
	<label>
		<?php
			if (isset($_SESSION['err'])) {
				?><span style="color: red"><?php  echo ($_SESSION['err']); ?></span>
				<?php  unset($_SESSION['err']);
			}
			else if(isset($_SESSION['msg'])) {
				?><span style="color: green"><?php echo ($_SESSION['msg']); ?></span>
				<?php
				unset($_SESSION['msg']);
			}
		?>
	</label>
	<table border="2px">
		<tr>
			<td>StudentRoll</td>
			<td>StudentRoll</td>
			<td>EnrollmentNo.</td>
			<td>Delete</td>
			<td>Edit</td>
		</tr>
	<?php

		include_once("connection_string.php");

		if (isset($_GET['StudentName'])) {
			$u = $_GET['StudentName'];
			$sql = "select * from student where StudentName like '%$u%'";
		}
		else{
			$sql = "select * from student";
		}

		$result = mysqli_query($con,$sql);
		while ($row = mysqli_fetch_assoc($result)) {
			?>
			<tr>
				<td><?php echo($row['studentID']); ?></td>
				<td><?php echo($row['StudentName']); ?></td>
				<td><?php echo($row['EnroomentNo']); ?></td>
				<td>
					<a href="con_StudentDelete.php?id=<?php echo($row['studentID']); ?>"  onclick="return confirm('Are you sure for this record delete')"><input type="button" value="delete"></a>
				</td>

				<td>
					<a href="editStudent.php?id=<?php echo($row['studentID']); ?>" ><input type="button" value="edit"></a>
				</td>

			</tr>
		<?php
			}
		?>
		</table>
</body>
</html>