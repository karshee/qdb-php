<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - The Consumer Rights Association</title>
    <style>
        /* Same styles as index.php */
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
        .contact-form {
            background: rgba(0, 0, 0, 0.2);
            padding: 2rem;
            border-radius: 8px;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        input, textarea {
            width: 100%;
            padding: 0.5rem;
            margin-top: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="contact.php">Contact</a>
        <?php if (isset($_SESSION['email'])): ?>
            <a href="profile.php">View Your Profile</a>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="register.php">Register</a>
        <?php endif; ?>
    </div>

    <div class="content">
        <h1 class="title">Contact Us</h1>
        <div class="contact-form">
            <form method="post" action="#">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit">Send Message</button>
            </form>
        </div>
    </div>
</body>
</html> 