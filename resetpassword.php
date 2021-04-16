<?php

if (isset($_POST['email'])) {
	$successmsg = '<div class="alert alert-success" role="alert">Please check your email for more details</div>';
}




?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Reset Password</title>
</head>
<body>
	<div class="container">
		<h1>Reset Password</h1>
		<p>Please use the form below to recover your forgotten password</p>
		<?php 
			if (isset($successmsg)) {
			 echo $successmsg;
		 }
		?>
		<form action="" method="POST" >
			<label for="Username"><b>Email</b></label>
      		<input type="text" placeholder="Your Email address" name="name" id="name" required>
      		<button type="submit" class="registerbtn" name="email">Recover password</button>
		</form>
	</div>
</body>
</html>