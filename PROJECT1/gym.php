<?php

include ("connect.php");

$sql2 = "SELECT * FROM gym ";
  $astmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($astmt, $sql2)) {

    echo "Error";
  } else {

    mysqli_stmt_execute($astmt);
    $res = mysqli_stmt_get_result($astmt);}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="gym.css">
  <title>Document</title>
</head>

<body>
  <div class="header">
    <div class="logo"> G.W</div>
    <div class="nav">
      <nav>
        <a href="home.html">Home</a>
        <a href="gym.html">Gym</a>
      </nav>
    </div>
    <div class="btn">
      <button><a href="sign-up.html">Add Your Button</a></button>
    </div>
  </div>
  <!--Section 2-->
  <main>

    <!--section 3-->
    <?php
    while ($row = mysqli_fetch_assoc($res)) {
      ?>

      <div id="profile_card">
        <div class="part1 ">
          <div class="profile_img">
            <img src="<?php echo $row['Gym_Image']; ?>" alt="#">
          </div>
        </div>
        <div class="part2">
          <div class="infoname">
            <p> <b> Gym Name:</b> <?php echo $row['Gym_name']; ?></p>
          </div>
          <div class="infoemail">
            <p> <b> email:</b> <?php echo $row['Gym_Email_Address']; ?></p>
          </div>
          <div class="infophone">
            <p> <b> phone number: </b> <?php echo $row['Gym_Phone_number']; ?></p>
          </div>
          <div class="infolocation">
            <p> <b>location:</b> <?php echo $row['Gym_Location']; ?></p>
          </div>
        </div>

      </div>
      <?php
    }
    ?>
  </main>
  <!--section footer-->

  <div class="footer">
    <div>
      <a href="https://facebook.com">
        <img src="fb.png" alt="#">
      </a>
    </div>
    <div>
      <a href="https://instagram.com">
        <img src="ig.png" alt="#">
      </a>
    </div>
    <div>
      <a href="https://linkedin.com">
        <img src="lk.png" alt="#">
      </a>
    </div>



  </div>
  <script src="sign.js">

  </script>
</body>

</html>