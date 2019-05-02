<?php
session_start();

$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';

if( isset($_POST["email"]) && isset($_POST["pass"]) ) {

  $who = htmlentities($_POST["email"]);
  $pass = htmlentities($_POST["pass"]);
  $check = hash("md5", $salt.$pass);

  if( $who == "" || $pass == "" ){
    $_SESSION['error'] = "User name and password are required";

    header("Location: login.php");

    return;
  }
  if( $who != "" && $pass != "" && $check !== $stored_hash ){
    $_SESSION['error'] = "Incorrect password";
    error_log("Login fail ".$who." $check");

    header("Location: login.php");

    return;
  }
  if( $who != "" && $pass != "" && strpos($who, "@") == false ) {
    $_SESSION['error'] = "Email must have an at-sign (@)";

    header("Location: login.php");

    return;
  }
  if( $who != "" && hash("md5", $salt.$pass) === $stored_hash && strpos($who, "@") !== false ){
    $_SESSION["name"] = $who;
    error_log("Login success ".$who);

    header("Location: view.php");

    return;
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>A. Shafey - Autos</title>
</head>
<body>
  <h1>Please Log In</h1>
  <?php
  if ( isset($_SESSION['error']) ) {
    echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");

    unset($_SESSION['error']);
  }
  ?>
  <form method="post">
    <p>User Name
    <input type="text" name="email"></p>
    <p>Password
    <input type="text" name="pass"></p>
    <input type="submit" value="Log In" name="Submit">
</body
</html>
