<?php
require_once("pdo.php");
if( !isset($_GET["name"]) ){
  die("Name parameter missing");
}
$message = Null;
$status = Null;
if( isset($_POST["logout"]) ){
  header("location:index.php");
}
if( isset($_POST["make"]) && isset($_POST["year"]) && isset($_POST["mileage"]) ){
  $make = htmlentities($_POST["make"]);
  $year = htmlentities($_POST["year"]);
  $mileage = htmlentities($_POST["mileage"]);
  if( !is_numeric($year) || !is_numeric($mileage) ){
    $message = "<p style='color:Red'>Mileage and year must be numeric</p>";
  }
  if( $make == "" ){
    $message = "<p style='color:Red'>Make is required</p>";
  }
  if( $make != "" && is_numeric($year) && is_numeric($mileage) ){
    $stmt = $pdo->prepare('INSERT INTO autos (make, year, mileage) VALUES ( :mk, :yr, :mi)');
    $status = $stmt->execute(array(':mk' => $make, ':yr' => $year, ':mi' => $mileage));
  }
  if( $status === true ){
    $message = "<p style='color:Green'>Record inserted</p>";
  }
}
$contents = $pdo->query("SELECT * FROM autos");
?>
<!DOCTYPE html>
<html>
<head>
  <title>A. Shafey - Autos</title>
</head>
<body>
  <h1>Tracking Autos for <?php echo($_GET["name"]); ?></h1>
  <?php echo($message); ?>
  <form method="post">
    <p>Make:
    <input type="text" name="make"></p>
    <p>Year:
    <input type="text" name="year"></p>
    <p>Mileage:
    <input type="text" name="mileage"></p>
    <input type="submit" value="Add">
    <input type="submit" name="logout" value="Logout">
  </form>
  <h1>Automobiles</h1>
  <ul>
  <?php while( $automobile = $contents->fetch(PDO::FETCH_ASSOC) ){
    echo("<li>$automobile[year] $automobile[make] / $automobile[mileage]</li>");
  }
  ?>
  </ul>
</body>
</html>
