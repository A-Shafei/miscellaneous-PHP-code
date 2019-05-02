<?php
session_start();

require_once("pdo.php");

if( !isset($_SESSION["name"]) ){
  die("Not logged in");
}

$status = Null;
if( isset($_POST["cancel"]) ){

  header("Location: view.php");

  return;
}
if( isset($_POST["make"]) && isset($_POST["year"]) && isset($_POST["mileage"]) ){
  $make = htmlentities($_POST["make"]);
  $year = htmlentities($_POST["year"]);
  $mileage = htmlentities($_POST["mileage"]);
  if( !is_numeric($year) || !is_numeric($mileage) ){
    $_SESSION['error'] = "Mileage and year must be numeric";

    header("Location: add.php");

    return;
  }
  if( $make == "" ){
    $_SESSION['error'] = "Make is required";

    header("Location: add.php");

    return;
  }
  if( $make != "" && is_numeric($year) && is_numeric($mileage) ){
    $stmt = $pdo->prepare('INSERT INTO autos (make, year, mileage) VALUES ( :mk, :yr, :mi)');
    $status = $stmt->execute(array(':mk' => $make, ':yr' => $year, ':mi' => $mileage));
  }
  if( $status === true ){
    $_SESSION['success'] = "Record inserted";

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
  <h1>Tracking Autos for <?php echo($_SESSION["name"]); ?></h1>
  <?php
  if ( isset($_SESSION['error']) ) {

  echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");

  unset($_SESSION['error']);

  }
  ?>
  <form method="post">
    <p>Make:
    <input type="text" name="make"></p>
    <p>Year:
    <input type="text" name="year"></p>
    <p>Mileage:
    <input type="text" name="mileage"></p>
    <input type="submit" value="Add">
    <input type="submit" name="cancel" value="Cancel">
  </form>
</body>
</html>
