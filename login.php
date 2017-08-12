<?php
session_start();
require_once('connect.php');
if(isset($_POST) & !empty($_POST)){
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM `users` WHERE email='$email' AND password='$password'";
	$result = mysqli_query($connection, $sql);
	$count = mysqli_num_rows($result);
	if($count == 1){
		$_SESSION['email'] = $email;
		header("Location: homepage.php");
	}else{
		$fmsg = "Invalid Email/Password combination";
	}
}
// not sure about this code - review
if(isset($_SESSION['email'])){
	$smsg = "User already logged in";
}
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<div class="container">
      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
      <form class="form-signin" method="POST">
		<h1 align="center">GroupMaker</h1>
		<hr>
		<h2> Log in below</h2>
		<fieldset align="center">
        <div class="row">
		  <span class="input-group-addon" id="basic-addon1">Email: </span>
		  <br>
		  <input type="email" name="email" class="form-control" required>
			</div>
			</br>
		<div class="row">
        <label for="inputPassword" class="sr-only">Password: </label>
        <br>
		<input type="password" name="password" id="password" class="form-control"  required>
        </br>
		<br>
		<button class="button" type="submit">Login</button>
      </fieldset>
	  </form>

</div>
</body>
</html>