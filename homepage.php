



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
<?php if(isset($smsg)){ ?><div class="alert alert-success" align="center" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
</head>
<body>

<button class="button" href="logout.php" type="submit">Logout</button>



</body>
</html>