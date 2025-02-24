<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile - The Consumer Rights Association</title>
    <style>
        /* Same base styles as before */
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
        .profile-image {
            width: 200px;
            height: 200px;
            background-color: #3498db;
            border-radius: 8px;
            margin-bottom: 2rem;
        }
        .connect-button {
            background-color: #e67e22;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="contact.php">Contact</a>
        <a href="profile.php">View Your Profile</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="content">
        <h1 class="title">Your Information</h1>
        <div class="profile-image">
            <!-- Profile icon placeholder -->
        </div>
        <div>
            <h2>Email</h2>
            <p><?php echo htmlspecialchars($_SESSION['email']); ?></p>
        </div>
        <div>
            <h2>Connect to other providers</h2>
            <p>Link your Consumer Rights Association account with your Authorization Security Ltd account!</p>
            <a href="#" class="connect-button">Connect to Authorization Security Ltd</a>
        </div>
    </div>
</body>
</html> 