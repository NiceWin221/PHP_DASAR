<?php 

  $db_server = "localhost";
  $db_user = "root";
  $db_password = "";
  $db_name = "businessdb";

  $conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);

  if($conn){
    echo "Connected to database";
  } else {
    echo "Failed to connect to database" . mysqli_connect_error();
  }

?>