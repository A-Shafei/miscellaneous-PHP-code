<!DOCTYPE html>
<head>
  <title>A. Shafey</title>
</head>
<body>
  <?php
  $answer = 36;
  $guess = $_GET['guess'];

  if ($guess === null) {
      echo "Missing guess parameter";
      return;
  }
  if ($guess == "") {
      echo "Your guess is too short";
      return;
  }
  if (!is_numeric ($guess)) {
      echo "Your guess is not a number";
      return;
  }
  if ($guess < $answer) {
      echo "Your guess is too low";
      return;
  }
  if ($guess > $answer) {
      echo "Your guess is too high";
      return;
  }
  if ($guess == $answer) {
      echo "Congratulations - You are right";
      return;
  }
  ?>
