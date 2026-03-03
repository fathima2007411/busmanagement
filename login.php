<?php
session_start();

// If already logged in, redirect to homepage
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$error = '';

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (empty($email) || empty($password)) {
        $error = 'Please enter both email and password';
    } else {
        // Demo credentials
        if ($email == 'user@example.com' && $password == 'password123') {
            $_SESSION['user_id'] = 1;
            $_SESSION['user_name'] = 'John Doe';
            $_SESSION['user_email'] = $email;
            header("Location: index.php");
            exit();
        } else {
            $error = 'Invalid email or password';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BusEazy - Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
        }
        .logo {
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            color: #f39c12;
            margin-bottom: 1rem;
        }
        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 1.5rem;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #333;
            font-weight: 600;
        }
        .form-group input {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }
        .form-group input:focus {
            outline: none;
            border-color: #f39c12;
        }
        .login-btn {
            width: 100%;
            padding: 1rem;
            background: #f39c12;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }
        .login-btn:hover {
            background: #e67e22;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 0.8rem;
            border-radius: 5px;
            margin-bottom: 1rem;
            text-align: center;
        }
        .register-link {
            text-align: center;
            margin-top: 1rem;
        }
        .register-link a {
            color: #f39c12;
            text-decoration: none;
            font-weight: 600;
        }
        .back-home {
            text-align: center;
            margin-top: 1rem;
        }
        .back-home a {
            color: #666;
            text-decoration: none;
        }
        .demo-credentials {
            background: #e9ecef;
            padding: 0.8rem;
            border-radius: 5px;
            margin-top: 1rem;
            font-size: 0.9rem;
            color: #666;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">BusEazy</div>
        <h2>Login to Your Account</h2>
        
        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST" action="login.php">
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form>
        
        <div class="register-link">
            Don't have an account? <a href="register.php">Register here</a>
        </div>
        <div class="back-home">
            <a href="index.php">← Back to Home</a>
        </div>
        
        <div class="demo-credentials">
            <strong>Demo:</strong> user@example.com / password123
        </div>
    </div>
</body>
</html>