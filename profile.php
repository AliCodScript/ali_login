<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Profile</title>
</head>
<body class="body">
    <h2>Profile</h2>
    <p>Username: <?= htmlspecialchars($user['username']) ?></p>
    <br>
    <p>Email: <?= htmlspecialchars($user['email']) ?></p>
    <br>
    <a href="update.php">Update Account</a>
    <br>
    <a href="delete.php">Delete Account</a>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
