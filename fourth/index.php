<!DOCTYPE html>
<head>
  <title>MD5 cracker</title>
</head>

<body>
  <?php
  $start_time=microtime(true);
  if (isset($_GET['md5'])) {
    $mystery = $_GET['md5'];
    $pin = 'DIDN\'T WORK?';
    $answer = NULL;

    for ($i = 0; $i < 10000; $i++) {
        if ($i < 10) {
            $pin = "000".$i;
          }
          if ($i >= 10 && $i < 100) {
            $pin = "00".$i;
          }
          if ($i >= 100 && $i < 1000) {
            $pin = "0".$i;
          }
          if ($i >= 1000) {
            $pin = (string) $i;
          }
          if (hash('md5', $pin) == $mystery) {
            $answer = $pin;
          }
          if ($i >= 0 && $i < 15 && !isset($answer)) {
            echo "<span style='font-family: monospace'>".hash('md5', $pin)." $pin<span><br>";
          }
        }
  }
  $end_time=microtime(true);
  $elapsed_time = $end_time-$start_time;
  if (isset($answer)) {
    echo "Elapsed time: ".$elapsed_time;
    echo "<br>PIN: $answer";
  }
  else {
    echo "PIN: Not found";
  }
  ?>
  <br>
  <form>
    <input type="text" name="md5" size="40">
    <input type="submit" value="Crack md5">
  </form>
</body>
