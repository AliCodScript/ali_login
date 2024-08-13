<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    session_destroy();
    echo "Account deleted!";
    header("Location: register.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Delete Account</title>
</head>
<body>
    <h2>Are you sure you want to delete your account?</h2>
    <form method="post" action="delete.php">
        <button type="submit">Yes, Delete My Account</button>
    </form>
    <a href="profile.php">Cancel</a>
</body>
</html>
