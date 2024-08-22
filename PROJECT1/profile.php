<?php
include ("connect.php");


session_start();



$sql = "SELECT * FROM gym WHERE Gym_Email_Address = ? ";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {

  echo "Wrong username and password";
} else {
  mysqli_stmt_bind_param($stmt, "s", $_SESSION['Gym_Email_Address']);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  while ($row = mysqli_fetch_assoc($res)) {

    $name = $row['Gym_name'];
    $email = $row['Gym_Email_Address'];
    $img = $row['Gym_Image'];
    $location = $row['Gym_Location'];
    $phone = $row['Gym_Phone_number'];
    $pass = $row['Gym_Password'];
  }
}

mysqli_close($conn);

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="profile.css">
  <title>Document</title>
</head>

<body>
  <div class="l">


    <div class="i">
      <img src="<?php echo $img; ?>" alt="" id="photo">
    </div>
    <div class="mid">
      <div class="mid1">
        <h1> Name of Gym</h1>
        <p id="Name"> <?php echo $name; ?></p>
        <h1> Phone Number </h1>
        <p id="number"> <?php echo $phone; ?></p>

      </div>
      <div class="mid2">
        <h1> Email Address </h1>
        <p id="email"> <?php echo $email; ?></p>
        <h1> Gym Location</h1>
        <p id="location"> <?php echo $location; ?></p>
      </div>
    </div>
    <div class="btn">

      <button><a href="edit.php">Edit</a> </button>
      <button><a href="logout.php">Log Out</a></button>
      <button><a href="delete.php">Delete</a></button>
    </div>
  </div>

</body>

</html>