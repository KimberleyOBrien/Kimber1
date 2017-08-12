<?php

// student register
require_once('connect.php');
if(isset($_POST) & !empty($_POST)){
	$student_email = mysqli_real_escape_string($connection, $_POST['student_email']);
	$student_firstname = mysqli_real_escape_string($connection, $_POST['student_firstname']);
	$student_lastname = mysqli_real_escape_string($connection, $_POST['student_lastname']);
	$student_password = md5($_POST['student_password']);

	$sql = "INSERT INTO `students` (student_email, student_firstname, student_lastname, student_password) VALUES ('$student_email', '$student_firstname', '$student_lastname', '$student_password')";
	$result = mysqli_query($connection, $sql);
	if($result){
		$smsg = "Registration successful";
	}else{
		$fmsg = "registration failed";
	}
} else{
	if(isset($_POST) & !empty($_POST)){
	$lecturer_email = mysqli_real_escape_string($connection, $_POST['lecturer_email']);
	$lecturer_firstname = mysqli_real_escape_string($connection, $_POST['lecturer_firstname']);
	$lecturer_lastname = mysqli_real_escape_string($connection, $_POST['lecturer_lastname']);
	$lecturer_password = md5($_POST['lecturer_password']);

	$sql = "INSERT INTO `lecturers` (lecturer_email, lecturer_first_name, lecturer_last_name, lecturer_password) VALUES ('$lecturer_email', '$lecturer_firstname', '$lecturer_lastname', '$lecturer_password')";
	$result = mysqli_query($connection, $sql);
	if($result){
		$smsg = "User Registration successful";
	}else{
		$fmsg = "User registration failed";
	}

	}
}
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
</head>
<body>
	<div class="container">
	<form class="form-signin" method="POST">
		<h1 align="center"> GroupMaker </h1>
		<p align="center"><b>Student registration form:</b></p>
		<fieldset align="center">
		<div class="row">
        <label for="inputemail" class="sr-only">Email:</label>
        <input type="email" align="" name="student_email" id="student_email" class="form-control1" required autofocus>
        </div>
		<br>
		<div class="row">
        <label for="inputText" class="sr-only">First name:</label>
        <input type="text" name="student_firstname" id="student_firstname" class="form-control1" required autofocus>
        </div>
		<br>
		<div class="row">
        <label for="inputText" class="sr-only">Last name:</label>
        <input type="text" name="student_lastname" id="student_lastname" class="form-control1" required autofocus>
        </div>
		<br>
		<div class="row">
		<label for="inputPassword" class="sr-only">Password:</label>
        <input type="password" name="student_password" id="student_password" class="form-control1" required>
		</div>
		<br>
        <button class="button" type="submit">Register</button>
        <button class="button" href="login.php">Login</button>
		</br>
      </form>
		<br>
		<form class="form-signin" method="POST">
		<p align="center"><b>Staff registration form:</b></p>
		<fieldset align="center">
		<div class="row">
        <label for="inputEmail" class="sr-only">Email:</label>
        <input type="email" align="" name="lecturer_email" id="lecturer_email" class="form-control" required autofocus>
        </div>
		<br>
		<div class="row">
        <label for="inputText" class="sr-only">First name:</label>
        <input type="text" name="lecturer_firstname" id="lecturer_firstname" class="form-control" required autofocus>
        </div>
		<br>
		<div class="row">
        <label for="inputText" class="sr-only">Last name:</label>
        <input type="text" name="lecturer_lastname" id="lecturer_lastname" class="form-control" required autofocus>
        </div>
		<br>
		<div class="row">
		<label for="inputPassword" class="sr-only">Password:</label>
        <input type="password" name="lecturer_password" id="lecturer_password" class="form-control" required>
		</div>
		<br>
        <button class="button" type="submit">Register</button>
        <button class="button" href="login.php">Login</button>
		</br>
      </form>
     
</div>
</body>
</html>