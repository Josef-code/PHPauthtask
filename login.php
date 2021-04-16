<?php

	//This code stores the user database files
	$database = "datafile.json";
	$usersarray = file($database);
//This code checks if the submit button was clicked and then collects the user input details and stores in a variable.
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['psw'];

	// This opens the database file in .json format
	$fh = fopen($database, 'r');
	$fileoutput = fread($fh, filesize($database));
	$assoc_array = array();
	$usersarray = explode("\n", $fileoutput);

	// This code checks if the records is available through a loop
	foreach($usersarray as $users)
	{
	    $tmp = explode(" ", $users);
	    $assoc_array[$tmp[0]] = $tmp[1];
	}

	// close the file
	fclose($fh);

	$authenticate = $assoc_array;

	$username= $authenticate['Username'];
	$password = $authenticate['Password'];

	// This code compares the user data against the database records and log them in
	if (($username == $username) && ($password == $password)) {
    	// If the credentials match, the user is assigned a session and redirected to the dashboard
			session_start();
			$_SESSION['loggedin'] = true;
			// $_SESSION['username'] = $data[2];
			header('location: dashboard.php');
	}
	else {
	    $errormsg = '<div class="alert alert-danger" role="alert">Username or Password not correct!</div>';
	}

	// //This variable accesses the database txt file that stores users credentials
	// $users = file('database.txt');
	// //This code loops through the database file and checks if the user input matches the one in the database file
	// foreach ($users as $user) {
	// 	$data = explode(',', $user);
	// 	if ($data[0] == $email && $data[1] == $password) {

	// 		// If the credentials match, the user is assigned a session and redirected to the dashboard
	// 		session_start();
	// 		$_SESSION['loggedin'] = true;
	// 		// $_SESSION['username'] = $data[2];
	// 		header('location: dashboard.php');
	// 	} else {

	// 		// If the credentials doesn't match, an error message is displayed to the user.
	// 		$errormsg = '<div class="alert alert-danger" role="alert">Username or Password not correct!</div>';
	// 	}
 //    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
   <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  
    <form action="" method="POST">
      <div class="container">
        <h1>Login</h1>
        <h3>Use the credentials you used for registeration to login</h3>

        <?php
        	if (isset($errormsg)) {
        		echo $errormsg;
        	}

        ?>
       <!--  <hr> -->

        <label for="email"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" id="username" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

        <!-- <hr>
   -->
        <button type="submit" name="submit" class="registerbtn">Login</button>
      </div>

      <div class="container signin">
        <p>Don't have an account? <a href="index.php">Register Here</a>.</p>
        <p>Fogot password? <a href="resetpassword.php">Recover password</a>.</p>
      </div>
  </form>

</body>
</html>