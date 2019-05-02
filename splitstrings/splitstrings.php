<?php
$str = 'some longer string';
$listed = str_split($str);
$solution = array();
for( $i = 0; $i < count($listed); $i = $i + 2 ){
  if( isset($listed[$i+1]) ){
    $solution[] = $listed[$i].$listed[$i+1];
  }
  else{
    $solution[] = $listed[$i].'_';
  }
}
print_r($solution);
?>
