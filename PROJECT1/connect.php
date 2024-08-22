<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "gym_db";




try {

  $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
 

} catch (mysqli_sql_exception) {
  echo "errror, no connection made!";
}



?>