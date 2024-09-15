<?php 

include("database.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
</head>
<body>
  <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <label for="username">username</label> <br>
    <input type="text" name="username" id="username"> <br>
    <label for="password">password</label> <br>
    <input type="password" name="password" id="password"> <br>
    <label for="email">email</label> <br>
    <input type="email" name="email" id="email"> <br>
    <button type="submit" name="submit" value="submit">submit</button>
  </form>
</body>
</html>
<?php 

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
      echo "User has been registered";
    } catch (mysqli_sql_exception) {
      echo "Username is taken";
    }
  }
}

mysqli_close($conn);

?>