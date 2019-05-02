<?php
function expanded_form(int $n): string {
  $lenght = strlen($n);
  $expanded = "";
  foreach( str_split($n) as $index=>$value ){
      $place_value = $lenght-$index;
      if( $value != 0 && $index != 0 && $index < $lenght-1 ){
          $expanded = $expanded." + "."$value";
          foreach( range(0, $place_value-2) as $i ){
            $expanded = $expanded."0";
          }
      }
      if( $index == 0 ){
          $expanded = $expanded."$value";
          foreach( range(0, $place_value-2) as $i ){
            $expanded = $expanded."0";
          }
      if( $index == $lenght-1 ){
        $expanded = $expanded."$value";
      }
      }
  }
  return $expanded;
}

echo expanded_form(1000979077092);
