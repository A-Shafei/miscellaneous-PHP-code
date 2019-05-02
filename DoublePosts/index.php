<?php

session_start();

if( isset($_POST['whatever']) ){
  $_SESSION['message'] = $_POST['whatever'];
  header('Location:index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Double Posting</title>
<head>
<body>
  <p><?php echo $_SESSION['message']; ?></p>
  <form method="post">
    <input type="text" name="whatever">
    <input type="submit">
</body>
</html>
