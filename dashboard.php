<?php
require_once 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: bus_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Bus Management System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }
        .navbar {
            background: #3498db;
            padding: 15px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar h2 {
            margin: 0;
        }
        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .nav-links a:hover {
            background: rgba(255,255,255,0.1);
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
        }
        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .welcome {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
        .user-info {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .user-info p {
            margin: 10px 0;
            font-size: 16px;
        }
        .label {
            font-weight: bold;
            color: #555;
        }
        .bus-icon {
            text-align: center;
            margin-bottom: 20px;
        }
        .bus-icon img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h2>Bus Management System</h2>
        <div class="nav-links">
            <a href="bus_logout.php">Logout</a>
        </div>
    </div>
    
    <div class="container">
        <div class="card">
            <div class="bus-icon">
                🚌
            </div>
            <div class="welcome">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</div>
            <p>You have successfully logged in to the Bus Management System.</p>
            
            <div class="user-info">
                <h3>Your Information:</h3>
                <p><span class="label">Username:</span> <?php echo htmlspecialchars($_SESSION['username']); ?></p>
                <p><span class="label">Email:</span> <?php echo htmlspecialchars($_SESSION['email']); ?></p>
                <p><span class="label">User ID:</span> <?php echo $_SESSION['user_id']; ?></p>
            </div>
        </div>
    </div>
</body>
</html>