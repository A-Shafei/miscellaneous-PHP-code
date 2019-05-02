<?php
session_start();

require_once("pdo.php");

if( !isset($_SESSION["name"]) ){
  die("Not logged in");
}

$contents = $pdo->query("SELECT * FROM autos");
?>

<!DOCTYPE html>
<html>
<head>
  <title>A. Shafey - Autos</title>
</head>
<body>
  <h1>Tracking Autos for <?php echo($_SESSION["name"]); ?></h1>
  <?php
  if ( isset($_SESSION['success']) ) {

  echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");

  unset($_SESSION['success']);

  }
  ?>
  <h1>Automobiles</h1>
  <ul>
  <?php while( $automobile = $contents->fetch(PDO::FETCH_ASSOC) ){
    echo("<li>$automobile[year] $automobile[make] / $automobile[mileage]</li>");
  }
  ?>
  </ul>
  <p><a href="add.php">Add New</a> | <a href="logout.php">Logout</a></p>
</body>
</html>
