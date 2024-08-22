
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
  <title>Document</title>
  <style>
    table{
      border-collapse: collapse;
      border:2px solid black;
    }
    tr td{
      padding:10px;
      width:100px;
      font-size:20px;
      border:2px solid black;
    }
  </style>
</head>
<body>

  <?php
  while ($row = mysqli_fetch_assoc($res)) {
    ?>

  
   <table border="1">
     <tr>
      <td>
        <?php echo $row['Gym_name']; ?>
      </td>
      <td>
        <?php echo $row['Gym_Email_Address']; ?>
      </td>
      <td>
        <?php echo $row['Gym_Phone_number']; ?>
      </td>
     </tr>
    
     <?php
    }
    ?>   
   </table>
</body>
</html>