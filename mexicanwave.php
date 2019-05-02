<?php
$string = 'st rr  ing';
$listed = array();
$pulse = Null;
foreach (str_split($string) as $key => $value) {
  if( $value != ' ' ){
    $listed[] = substr_replace($string, strtoupper($string[$key]), $key, 1);
    $pulse = substr_replace($string, strtoupper($string[$key]), $key, 1);
    var_dump($pulse);
    $listed[] = $pulse;
    echo "<br>";
    var_dump($listed);
    echo "<br>";
    echo "<br>";
  }

// foreach ($listed as $key => $value) {
//   echo $value;
//   echo "<br>";
// }

}
?>
