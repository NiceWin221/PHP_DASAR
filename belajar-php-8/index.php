<?php 

include("./config/database.php");
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
</head>
<body>
  <form action="./controllers/create.php" method="post">
    <label for="username">username</label> <br>
    <input type="text" name="username" id="username"> <br>
    <label for="password">password</label> <br>
    <input type="password" name="password" id="password"> <br>
    <label for="email">email</label> <br>
    <input type="email" name="email" id="email"> <br>
    <button type="submit" name="submit" value="submit">submit</button>
  </form>
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>user_id</th>
      <th>username</th>
      <th>email</th>
      <th>action</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)) : ?>
    <tr>
      <td><?= $row["user_id"]; ?></td>
      <td><?= $row["username"]; ?></td>
      <td><?= $row["email"]; ?></td>
      <td>
        <a 
        href="./controllers/delete.php?id=<?= $row["user_id"] ?>" 
        onclick="return confirm('Are you sure you want to delete this user?');"
        >
        Delete
      </a>
      </td>
    </tr>
    <?php endwhile ?>
  </table>
</body>
</html>
<?php 

mysqli_close($conn);

?>