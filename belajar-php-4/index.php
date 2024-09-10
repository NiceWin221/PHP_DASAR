<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    form{
      display: flex;
      flex-direction: column;
      width: 300px;
    }
  </style>
</head>
<body>
  <form action="#" method="post">
    <label for="username">username</label>
    <input type="text" id="username" name="username">
    <label for="password">password</label>
    <input type="text" id="password" name="password">
    <button type="submit" name="login">Log In</button><br>
  </form>
</body>
</html>

<?php 

if(isset($_POST['login'])){

  $username = $_POST["username"];
  $password = $_POST["password"];

  if(empty($username) || empty($password)){
    echo "username or password is required";
  } else {
    echo "Hello {$username}";
  }

};

?>