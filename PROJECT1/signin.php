<?php

include ("connect.php");

session_start();

$email = $_POST['Gym_Email_Address'];
$pass = $_POST['Gym_password'];


if (empty($email) || empty($pass)) {
  echo "All input fields require to be filled";

} else {
 
  $sql = "SELECT * FROM gym WHERE Gym_Email_Address = ? ";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {

    echo "Wrong username and password";
  } else {
    mysqli_stmt_bind_param($stmt, "s", $email );
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    $_SESSION["Gym_Email_Address"] = $email;
    
    if( $res -> num_rows > 0){
      $row = $res -> fetch_assoc();

      $hash = $row['Gym_Password'];

     if(password_verify($pass , $hash)){
    header("location:profile.php");
    exit;
     }else{
      echo "invalid password.";
     }
   }
  }

}

?>