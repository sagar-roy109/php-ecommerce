<?php

// short string 

function shortString($string)
{
  if (strlen($string) >= 20) {
    echo substr($string, 0, 10) . " ... " . substr($string, -5);
  } else {
    echo $string;
  }
}
function small($string)
{
  if (strlen($string) >= 40) {
    return substr($string, 0, 40) . " ... " . substr($string, -5);
  } else {
    return $string;
  }
}
