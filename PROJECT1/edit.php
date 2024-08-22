<?php
include "connect.php";


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


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="edit.css">
  <title>Edit</title>
</head>

<body>
<button><a href="profile.php">Back</a></button>

  <div class="m">
    <div class="color">
     <p> EDIT </p>
    </div>


    <div class="form">
      <form action="update.php" method="post" id="signup" enctype="multipart/form-data">

        <p>Gym Name</p>
        <input type="text" name="Gym_name" placeholder="name " required value="<?php echo $name; ?>"><br>
        <br>
        <p>Gym Phone number</p>
        <input type="tel" name="Gym_Phone_number" id="phone" placeholder="07xxxxxxxxxx " required
          value="<?php echo $phone; ?>">
        <br>

        <p>Email</p>
        <input type="email" name="Gym_Email_Address" id="email" placeholder=" e@g.com" required
          value="<?php echo $email; ?>"> <br>
        <p>Password</p>
        <input type="password" name="Gym_password" id="password" placeholder="...." required
          value="<?php echo $pass; ?>">
        <br>
        <select name="Gym_location" id="County" required value="<?php echo $location; ?>">
          <option value="">Select your County</option>
          <option value="Mombasa">Mombasa</option>
          <option value="Kwale">Kwale</option>
          <option value="Kilifi">Kwale</option>
          <option value="Tana river">Tana river</option>
          <option value="Lamu">Lamu</option>
          <option value="Taita-taveta">Taita-taveta</option>
          <option value="Garissa">Garissa</option>
          <option value="Wajir">Wajir</option>
          <option value="Mandera">Mandera</option>
          <option value="Marsabit">Marsabit</option>
          <option value="Isiolo">Isiolo</option>
          <option value="Meru">Meru</option>
          <option value="Tharaka-Nithi">Tharaka-Nithi</option>
          <option value="Embu">Embu</option>
          <option value="Kitui">Kitui</option>
          <option value="Machakos">Machakos</option>
          <option value="Makueni">Makueni</option>
          <option value="Nyandarua">Nyandarua</option>
          <option value="Nyeri">Nyeri</option>
          <option value="Kirinyaga">Kirinyaga</option>
          <option value="Muranga">Muranga</option>
          <option value="kiambu">kiambu</option>
          <option value="Turkana ">Turkana</option>
          <option value="West Pokot">West Pokot</option>
          <option value="Samburu">Samburu</option>
          <option value="Trans-Nzoia">Trans-Nzoia</option>
          <option value="Uasin Gishu">Uasin Gishu</option>
          <option value="Elgeyo-marakwet">Elgeyo-marakwet</option>
          <option value="Nandi">Nandi</option>
          <option value="Baringo">Baringo</option>
          <option value="Laikipia">Laikipia</option>
          <option value="Nakuru">Nakuru</option>
          <option value="Narok">Narok</option>
          <option value="Kajiado">Kajiado</option>
          <option value="Kericho">Kericho</option>
          <option value="Bomet">Bomet</option>
          <option value="Kakamega">Kakamega</option>
          <option value="Vihiga">Vihiga</option>
          <option value="Bungoma">Bungoma</option>
          <option value="Busia">Busia</option>
          <option value="Siaya">Siaya</option>
          <option value="Kisumu">Kisumu</option>
          <option value="Homabay">Homabay</option>
          <option value="Migori">Migori</option>
          <option value="Kisii">Kisii</option>
          <option value="Nyamira">Nyamira</option>
          <option value="Nairobi">Nairobi</option>
        </select>
        <br>
        <label for="image">please enter profile photo</label>
        <img src="# " id="img" alt="#"><br>

        <input type="file" name="Gym_Image" id="profile_img" required value="<?php echo $img; ?>"><br>






        <input type="submit" name="edit" value="Save">


      </form>


    </div>
  </div>
</body>

</html>