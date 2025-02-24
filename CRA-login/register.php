<?php
session_start();

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format";
    } else {
        // Hash the password before storing
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Initialize the registered_users array if it doesn't exist
        if (!isset($_SESSION['registered_users'])) {
            $_SESSION['registered_users'] = array();
        }
        
        // Store the user's information
        $_SESSION['registered_users'][$email] = $hashed_password;
        $_SESSION['email'] = $email;
        header('Location: profile.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - The Consumer Rights Association</title>
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
        .register-form {
            background: rgba(0, 0, 0, 0.2);
            padding: 2rem;
            border-radius: 8px;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        input {
            width: 100%;
            padding: 0.5rem;
            margin-top: 0.5rem;
        }
        .error {
            color: #e74c3c;
            margin-bottom: 1rem;
        }
        .warning {
            background-color: #e74c3c;
            color: white;
            padding: 1rem;
            border-radius: 4px;
            position: fixed;
            top: 20px;
            right: 20px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="contact.php">Contact</a>
        <a href="register.php">Register</a>
        <a href="login.php">Login</a>
    </div>

    <?php if ($error): ?>
        <div class="warning">
            Warning!<br>
            <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <div class="content">
        <h1 class="title">Register</h1>
        <div class="register-form">
            <form method="post" action="">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Register</button>
            </form>
        </div>
    </div>
</body>
</html> 