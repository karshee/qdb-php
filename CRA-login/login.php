<?php
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    
    // In a real application, you would verify against a database
    // For this demo, we'll check against session stored data
    if (isset($_SESSION['registered_users'][$email])) {
        if (password_verify($password, $_SESSION['registered_users'][$email])) {
            $_SESSION['email'] = $email;
            header('Location: profile.php');
            exit;
        } else {
            $error = "Incorrect username or password";
        }
    } else {
        $error = "Incorrect username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - The Consumer Rights Association</title>
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
        .login-form {
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
            background-color: #e74c3c;
            color: white;
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 4px;
            position: fixed;
            top: 20px;
            right: 20px;
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
        button {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            cursor: pointer;
            margin-right: 10px;
        }
        .register-button {
            background-color: #e67e22;
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
        <h1 class="title">Login</h1>
        <div class="login-form">
            <form method="post" action="">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Login</button>
                <button type="button" class="register-button" onclick="window.location.href='register.php'">Register</button>
            </form>
        </div>
    </div>
</body>
</html> 