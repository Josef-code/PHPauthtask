<?php

session_start();

if(!isset($_SESSION['loggedin'])) {
    header('location: login.php');
} 


?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
       
       <div class="container">
            <div class="card">
                  <div class="card-header">
                    Dashboard
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Welcome to your zuri auth Task</h5>
                    <p class="card-text">This is a super cool and fast login system developed without a database system</p>
                    <a href="logout.php" class="btn btn-primary">Log out</a>
                  </div>
            </div>
        </div>
    </body>
</html>
