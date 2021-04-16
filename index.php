<?php

session_start();

// This code works when the user submitted the register form

if (isset($_POST['submit'])) {
  //This section stores the user details in a variable
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['psw-repeat'];
  // $details = $email . "," . $name . "," . $password . "\n";

// This code checks if the database file exits and input the data into the file
  if (file_exists('database.json'))
    {
      $database = file_get_contents('database.json');
      $data = json_decode($database, true);
      $formdata = array(
        'name' => $name,
        'email' => $email,
        'password' => $password
        ); 

      $data[] = $formdata;
      $userdata = json_encode($data);
        
      if( file_put_contents('datafile.json', $userdata ) ){
        $sucessmsg = '<div class="alert alert-success" role="alert">Account created successfully! <a href="login.php" class="alert-link">Click here to Login</a></div>';
      }
           
   }


  // //This code opens a database file (database.txt)
  // $fp = fopen('database.txt', 'a+');

  // //This code stores the user details in the database file and checks if the operation was successful
  // if(fwrite($fp, $details))  {
  //      $sucessmsg = '<div class="alert alert-success" role="alert">Account created successfully! <a href="login.php" class="alert-link">Click here to Login</a></div>';
  // } else {
  //     echo "something went wrong";
  // }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zuri Auth Task</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  
  <form action="" method="POST">
    <div class="container">
      <h1>Register</h1>
      <h4>Please fill this form to create an account.</h4>

     <!--  This php code checks if the success message has been created and shows it to the user, if not errors are closed -->
      <?php 

        if (isset($sucessmsg)) {
            echo $sucessmsg;
        } else {
          # code...
        }
        

       ?>
     <!--  <hr> -->

      <label for="Username"><b>Username</b></label>
      <input type="text" placeholder="Enter a name" name="name" id="name" required>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" id="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
      <!-- <hr>
 -->
      <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
      <button type="submit" class="registerbtn" name="submit">Register</button>
    </div>

    <div class="container signin">
      <p>Already have an account? <a href="login.php">Sign in</a>.</p>
    </div>
</form>

</body>
</html>