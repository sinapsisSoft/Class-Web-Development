<?php
// start a session
session_start();

// initialize session variables
$_SESSION['logged_in_user_id'] = '1';
$_SESSION['logged_in_user_name'] = 'diego@gmail.com';
$_SESSION['logged_in_pass'] = '123456';

// access session variables
echo $_SESSION['logged_in_user_id'];
echo $_SESSION['logged_in_user_name'];
echo $_SESSION['logged_in_pass'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
   <a href="home.php" target="_blank"> Otras vista</a> 
</body>
</html>
