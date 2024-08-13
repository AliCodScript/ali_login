
<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $email = $_POST["email"];

    $send = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $send->execute([$username]);
    if ($send->rowCount() > 0) {
        echo "dont sign up";
    }else{
        $send = $pdo->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
        $send->execute([$username, $password, $email]);
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form method="post" action="register.php">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
</body>
</html>
