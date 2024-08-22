<?php

session_start();

if (isset($_SESSION['Gym_Email_Address'])) {
 session_destroy();
}

header("Location:home.html");
exit;

?>