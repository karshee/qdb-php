<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personbook</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #00a3cc;
            padding: 15px;
            color: white;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin-right: 15px;
        }
        .logo {
            font-size: 20px;
            font-weight: bold;
            margin-right: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
            text-align: center;
        }
        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .description {
            margin-bottom: 40px;
            color: #666;
        }
        .features {
            display: flex;
            justify-content: space-around;
            margin-top: 50px;
        }
        .feature {
            flex: 1;
            margin: 0 20px;
            max-width: 300px;
        }
        .feature h2 {
            color: #333;
        }
        .feature p {
            color: #666;
        }
        .cta-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #00a3cc;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <span class="logo">Personbook</span>
        <a href="/">Home</a>
        <a href="/contact_import.php">Contact Import</a>
    </nav>

    <div class="container">
        <h1>Personbook</h1>
        <p class="description">We're still writing the code for the rest of our social media platform, but for now we have our contact import page up and running!</p>
        
        <a href="/contact_import.php" class="cta-button">Import your contacts</a>

        <div class="features">
            <div class="feature">
                <h2>Friendly</h2>
                <p>Connect with your friends on Personbook, no matter where they are</p>
            </div>
            <div class="feature">
                <h2>Community</h2>
                <p>Talk with other people who have similar hobbies and interests</p>
            </div>
            <div class="feature">
                <h2>Convenient</h2>
                <p>With our upcoming mobile app, you'll be able to use Personbook anywhere</p>
            </div>
        </div>
    </div>
</body>
</html>
