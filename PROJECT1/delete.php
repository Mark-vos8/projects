<?php
include ("connect.php");
session_start();




$sql = "DELETE  FROM gym WHERE Gym_Email_Address = ?";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {

  echo "Failed to prepare statement";
} else if (mysqli_stmt_prepare($stmt, $sql)) {
  mysqli_stmt_bind_param($stmt, "s",  $_SESSION['Gym_Email_Address']);
  mysqli_stmt_execute($stmt);
  header("Location:home.html");
  exit;

} else {
  echo "Failed to delete account.  Please try again.";
}


?>