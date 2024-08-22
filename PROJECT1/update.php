<?php
include ("connect.php");


session_start();

$new = $_SESSION['Gym_Email_Address'];

if (isset($_POST['edit'])) {


  $name = filter_input(INPUT_POST, "Gym_name", FILTER_SANITIZE_SPECIAL_CHARS);
  $location = filter_input(INPUT_POST, "Gym_location", FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, "Gym_Email_Address", FILTER_SANITIZE_SPECIAL_CHARS);
  $pass = filter_input(INPUT_POST, "Gym_password", FILTER_SANITIZE_SPECIAL_CHARS);
  $number = filter_input(INPUT_POST, "Gym_Phone_number", FILTER_SANITIZE_SPECIAL_CHARS);
  $img = $_FILES["Gym_Image"];

  $uploadok = 1;
  $type = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
  if ($type != "jpg" && $type != "jpeg" && $type != "png") {
    echo "Only jpg , jpeg and png files  are allowed.";
    $uploadok = 0;
  }


  // verify that it is an actual image 

  $verify = getimagesize($img['tmp_name']);
  if ($verify === false) {
    echo "you've entered a valid image";
    $uploadok = 0;
  }
  
  // upload the image 

  if ($uploadok = 1) {
    $dir = "pic/ ";
    $dirfile = $dir . basename($img['name']);

    if (move_uploaded_file($img['tmp_name'], $dirfile)) {
      $newdir = $dirfile;
    } else {
      echo "upload failed";
    }
  }
  $pass = password_hash($pass, PASSWORD_DEFAULT);
  $sql2 = "SELECT * FROM gym WHERE  Gym_Email_Address = ?";
  $astmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($astmt, $sql2)) {

    echo "Error";
  } else {
    mysqli_stmt_bind_param($astmt, "s", $email);
    mysqli_stmt_execute($astmt);
    $res = mysqli_stmt_get_result($astmt);

    if (mysqli_num_rows($res) > 0) {
   
      $sql =
        "UPDATE gym
  SET Gym_name = ? , Gym_Phone_number = ? , Gym_Email_Address = ? , Gym_password =  ?, Gym_location = ?  , Gym_Image =  ? 
  WHERE Gym_Email_Address = ? "
      ;

      $stmt = mysqli_stmt_init($conn);

      if (!mysqli_stmt_prepare($stmt, $sql)) {

        echo "Wrong username and password";
      } else {
        mysqli_stmt_bind_param($stmt, "sssssss", $name, $number, $email, $pass, $location, $newdir, $new);
        mysqli_stmt_execute($stmt);

        header("location:profile.php");
        exit;
      }

    }
  }
}
?>