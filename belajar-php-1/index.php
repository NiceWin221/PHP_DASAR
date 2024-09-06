<?php
session_start();

// Initialize or reset the counter
if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
}

// Handle button click
if (isset($_POST['increment'])) {
    if ($_SESSION['counter'] < 10) {
        $_SESSION['counter']++;
    } else {
        $_SESSION['counter'] = 0; // Reset after reaching 10
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Counter Button</title>
</head>
<body>
    <h1>Counter: <?php echo $_SESSION['counter']; ?></h1>
    <form method="post">
        <button type="submit" name="increment">Increment</button>
    </form>
</body>
</html>
