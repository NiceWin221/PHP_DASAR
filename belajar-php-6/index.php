<?php 

include("database.php");

$username = "Iman";
$password = "123";
$email = "iman@gmail.com";

$hashed_pwd = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$$hashed_pwd', '$email')";

try{
  mysqli_query($conn, $sql);
  echo "User has been registered";

} catch (mysqli_sql_exception) {
  echo "Username, password and email are required";
}

mysqli_close($conn);

?>