<?php

// Registration for students/staff members
require_once('connect.php');
if(isset($_POST) & !empty($_POST)){
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
	$last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
	$password = md5($_POST['password']);
	$user_type = mysqli_real_escape_string($connection, $_POST['user_type']);
	
	$sql = "INSERT INTO `users` (email, first_name, last_name, password, user_type) VALUES ('$email', '$first_name', '$last_name', '$password', '$user_type')";
	$result = mysqli_query($connection, $sql);
	if($result){
		$smsg = "Registration successful";
	}else{
		$fmsg = "registration failed";
	}
}
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
<?php if(isset($smsg)){ ?><div class="alert alert-success" align="center" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
</head>
<body>
	<div class="container">
	<form class="form-signin" method="POST">
		<h1 align="center"> GROUPMAKER </h1>
		<p align="center"><b>Registration form:</b></p>
		<fieldset>
		<div class="row">
        <label for="inputemail" class="sr-only">Email:</label>
        <input type="email" align="right" placeholder="Email address" name="email" id="email" class="form-control1" required autofocus>
        </div>
		<br>
		<div class="row">
        <label for="inputText" class="sr-only">First name:</label>
        <input type="text" align="right" placeholder="First name" name="first_name" id="first_name" class="form-control1" required autofocus>
        </div>
		<br>
		<div class="row">
        <label for="inputText" class="sr-only">Last name:</label>
        <input type="text" align="right" placeholder="Last name "name="last_name" id="last_name" class="form-control1" required autofocus>
        </div>
		<br>
		<div class="row">
		<label for="inputPassword" class="sr-only">Password:</label>
        <input type="password" align="right" placeholder="Password" name="password" id="password" class="form-control1" required>
		</div>
		<br>
		<input type="radio" name="user_type" id="user_type" value="student"> Student<br>
		<input type="radio" name="user_type" id="user_type" value="staff"> Staff <br>
        <button class="button" type="submit">Register</button>
		</br>
      </form>
	  </br>
		<a href="login.php">Already registered with Groupmaker? Log in here</a>
</div>
</body>
</html>