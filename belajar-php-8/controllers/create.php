<?php

include("../config/database.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
  $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);

  if(empty($username)){
    echo "Username needed";
  } else if(empty($password)){
    echo "Password needed";
  } else if(empty($email)){
    echo "Email needed";
  } else {
    $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashed_pwd', '$email')";
    try{
      mysqli_query($conn, $sql);
      echo "<script>alert('User has been created'); document.location.href = '../index.php'</script>";
      exit;
    } catch (mysqli_sql_exception) {
      echo "<script>alert('Failed to create new user/username taken')</script>";
    }
  }
}

?>