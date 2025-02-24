<?php
ini_set('display_errors', '0');
error_reporting(E_ALL);

session_start();

// Rate limiting
define('MAX_UPLOADS_PER_HOUR', 30);
define('RATE_LIMIT_WINDOW', 3600); // 1 hour in seconds

if (!isset($_SESSION['upload_history'])) {
    $_SESSION['upload_history'] = [];
}

// Clean up old entries from upload history
$_SESSION['upload_history'] = array_filter($_SESSION['upload_history'], function($timestamp) {
    return $timestamp > (time() - RATE_LIMIT_WINDOW);
});

// Generate CSRF token if not exists
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Handle file upload
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check rate limit
    if (count($_SESSION['upload_history']) >= MAX_UPLOADS_PER_HOUR) {
        $message = 'Too many uploads. Please try again later.';
        http_response_code(429); // Too Many Requests
    } elseif (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $message = 'Invalid request';
    } elseif (!isset($_FILES['contact_file'])) {
        $message = 'No file uploaded';
    } elseif ($_FILES['contact_file']['error'] !== UPLOAD_ERR_OK) {
        $message = 'File upload failed';
    } elseif ($_FILES['contact_file']['size'] > 5 * 1024 * 1024) { // 5MB limit
        $message = 'File too large (max 5MB)';
    } else {
        // Add timestamp to upload history
        $_SESSION['upload_history'][] = time();
        
        $file = $_FILES['contact_file'];
        $handle = fopen($file['tmp_name'], 'r');
        
        if ($handle) {
            $validNumbers = 0;
            $invalidNumbers = 0;
            
            // Add MIME type validation
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimeType = finfo_file($finfo, $file['tmp_name']);
            finfo_close($finfo);
            
            if (!in_array($mimeType, ['text/csv', 'text/plain'])) {
                $message = 'Invalid file type';
            } else {
                // Limit number of lines
                $lineCount = 0;
                $maxLines = 1000; // Adjust as needed
                
                while (($line = fgets($handle)) !== false && $lineCount < $maxLines) {
                    $lineCount++;
                    $number = trim($line);
                    if (empty($number)) continue;
                    
                    if (preg_match('/^\d{3}-\d{3}$/', $number)) {
                        $validNumbers++;
                    } else {
                        $invalidNumbers++;
                    }
                }
                fclose($handle);
                
                $message = "Upload complete! Valid numbers: $validNumbers, Invalid numbers: $invalidNumbers";
            }
        } else {
            $message = 'Error reading file';
        }
    }
}

// Security headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');

// Add rate limit information to the page
$uploadsRemaining = MAX_UPLOADS_PER_HOUR - count($_SESSION['upload_history']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personbook Contact Uploader</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .navbar { background-color: #00a3cc; padding: 15px; color: white; }
        .navbar a { color: white; text-decoration: none; margin-right: 15px; }
        .logo { font-size: 20px; font-weight: bold; margin-right: 20px; }
        .container { max-width: 800px; margin: 40px auto; padding: 0 20px; }
        .message { margin: 20px 0; padding: 10px; background-color: #f0f0f0; }
        .rate-limit-info { font-size: 0.9em; color: #666; margin-top: 10px; }
    </style>
</head>
<body>
    <nav class="navbar">
        <span class="logo">Personbook</span>
        <a href="/">Home</a>
        <a href="/contact_import.php">Contact Import</a>
    </nav>

    <div class="container">
        <h1>Personbook Contact Uploader</h1>
        <p>Click the button to upload a csv of phone numbers (###-###) to find your friends on our service! Make sure your csv is ASCII only, not UTF-8.</p>

        <?php if ($message): ?>
            <div class="message"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>

        <form action="contact_import.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <input type="file" name="contact_file" accept=".csv" required>
            <input type="submit" value="Submit">
        </form>
        
        <div class="rate-limit-info">
            You have <?php echo $uploadsRemaining; ?> uploads remaining this hour.
        </div>
    </div>
</body>
</html>
