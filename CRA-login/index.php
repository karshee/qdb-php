<?php
session_start();

$loggedIn = isset($_SESSION['email']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Consumer Rights Association</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #2c3e50;
            color: white;
        }
        .navbar {
            background-color: rgba(0, 0, 0, 0.2);
            padding: 1rem;
            text-align: right;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }
        .content {
            padding: 2rem;
            max-width: 800px;
            margin: 0 auto;
        }
        .title {
            font-size: 2rem;
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="contact.php">Contact</a>
        <?php if ($loggedIn): ?>
            <a href="profile.php">View Your Profile</a>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>

    <div class="content">
        <h1 class="title">The Consumer Rights Association</h1>
        <p>Welcome to the Consumer Rights Association. We are dedicated to protecting consumer rights and ensuring fair business practices.</p>
    </div>
</body>
</html>
