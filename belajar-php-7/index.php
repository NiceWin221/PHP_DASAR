<?php

include("database.php");

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
      echo $row["username"] . "<br>";
      echo $row["password"] . "<br>";
      echo $row["email"] . "<br>";
    }
  } else {
    echo "User not found";
  }


mysqli_close($conn);

?>