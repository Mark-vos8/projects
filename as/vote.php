<?php

function vote()
{
  $age = $_POST["age"];
 
  if ($age >= 18) {
    echo ("You are eligible for voting");
  
  } elseif ($age < 18) {
    
    echo ("You are not eligible for voting");
  }
 
}
vote();
?>