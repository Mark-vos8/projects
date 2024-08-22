<?php

include ("connect.php");

session_start();

if (isset($_POST['signup'])) {
  //post data
  //filter through the data just incase they contain a malisious code

  $name = filter_input(INPUT_POST, "Gym_name", FILTER_SANITIZE_SPECIAL_CHARS);
  $location = filter_input(INPUT_POST, "Gym_Location", FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, "Gym_Email_Address", FILTER_SANITIZE_SPECIAL_CHARS);
  $pass = filter_input(INPUT_POST, "Gym_password", FILTER_SANITIZE_SPECIAL_CHARS);
  $number = filter_input(INPUT_POST, "Gym_Phone_number", FILTER_SANITIZE_SPECIAL_CHARS);
  $img = $_FILES["Gym_Image"];



  if (empty($name) || empty($location) || empty($email) || empty($img) || empty($pass) || empty($number) || !is_numeric($number)) {
    echo "please enter all data required in the correct formart!!";


  } else {
    //validate the image

    $uploadok = 1;
    $type = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
    if ($type != "jpg" && $type != "jpeg" && $type != "png") {
      echo "Only jpg , jpeg and png files  are allowed.";
      $uploadok = 0;
    }


    // verify that it i an actual image 

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
    $new = password_hash($pass, PASSWORD_DEFAULT);

    $sql2 = "SELECT * FROM gym WHERE  Gym_Email_Address = ?";
    $astmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($astmt, $sql2)) {

      echo "Error";
    } else {

      mysqli_stmt_bind_param($astmt, "s", $email);
      mysqli_stmt_execute($astmt);
      $res = mysqli_stmt_get_result($astmt);

      if (mysqli_num_rows($res) > 0) {
        echo "Gym already listed";
      } else {
        $sql = "INSERT INTO gym (Gym_name,Gym_Phone_number,Gym_Email_Address, Gym_password,Gym_Location,Gym_Image ) VALUES(?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {

          echo "Error";
        } else {
          mysqli_stmt_bind_param($stmt, "ssssss", $name, $number, $email, $new, $location, $newdir);
          mysqli_stmt_execute($stmt);


          echo "registration successful";
          header("location:signin.html");
          exit;
        }


      }


      mysqli_close($conn);

    }
  }
}
?>