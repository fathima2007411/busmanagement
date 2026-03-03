<?php
session_start();

// Check if user is logged in (you would set this in login.php)
$is_logged_in = isset($_SESSION['user_id']);
$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BusEazy - Home</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        header {
            background-color: #2c3e50;
            color: white;
            padding: 1rem 5%;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: #f39c12;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 1.1rem;
            cursor: pointer;
        }

        .nav-links a:hover {
            color: #f39c12;
        }

        .nav-links a.active {
            color: #f39c12;
            font-weight: bold;
        }

        /* Auth Section */
        .auth-section {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: white;
        }

        .user-icon {
            width: 35px;
            height: 35px;
            background: #f39c12;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #2c3e50;
        }

        .auth-btn {
            padding: 0.5rem 1.2rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-block;
        }

        .login-btn {
            background: transparent;
            border: 2px solid #f39c12;
            color: #f39c12;
        }

        .login-btn:hover {
            background: #f39c12;
            color: white;
        }

        .register-btn {
            background: #3498db;
            color: white;
            border: 2px solid #3498db;
        }

        .register-btn:hover {
            background: #2980b9;
        }

        .logout-btn {
            background: #e74c3c;
            color: white;
            border: 2px solid #e74c3c;
        }

        .logout-btn:hover {
            background: #c0392b;
        }

        .hero {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .hero-content h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .search-section {
            background-color: #f8f9fa;
            padding: 3rem 5%;
        }

        .search-container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .search-container h2 {
            margin-bottom: 2rem;
            text-align: center;
            color: #2c3e50;
        }

        .search-form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #333;
        }

        .form-group input {
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .form-group input:focus {
            outline: none;
            border-color: #f39c12;
        }

        .search-btn {
            background-color: #f39c12;
            color: white;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            align-self: flex-end;
            transition: background-color 0.3s;
        }

        .search-btn:hover {
            background-color: #e67e22;
        }

        footer {
            background-color: #2c3e50;
            color: white;
            padding: 2rem 5%;
            text-align: center;
            margin-top: 2rem;
        }

        @media (max-width: 768px) {
            nav {
                flex-direction: column;
                gap: 1rem;
            }
            
            .nav-links {
                justify-content: center;
            }
            
            .hero-content h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo">BusEazy</div>
            <ul class="nav-links">
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="bus-list.php">Bus List</a></li>
                <li><a href="ticket-book.php">Book Ticket</a></li>
                <li><a href="seat-selection.php">Select Seat</a></li>
                <li><a href="booking-history.php">My Bookings</a></li>
                <li><a href="bus-tracking.php">Track Bus</a></li>
                <li><a href="help-contact.php">Help & Contact</a></li>
            </ul>
            
            <!-- Login/Logout/Register Section - FIXED -->
            <div class="auth-section">
                <?php if ($is_logged_in): ?>
                    <!-- Show when user is logged in -->
                    <div class="user-info">
                        <div class="user-icon"><?php echo strtoupper(substr($user_name, 0, 1)); ?></div>
                        <span>Hi, <?php echo htmlspecialchars($user_name); ?>!</span>
                    </div>
                    <a href="?logout=1" class="auth-btn logout-btn">Logout</a>
                <?php else: ?>
                    <!-- Show when user is NOT logged in -->
                    <a href="login.php" class="auth-btn login-btn">Login</a>
                    <a href="register.php" class="auth-btn register-btn">Register</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1>Travel Safely with BusEazy</h1>
            <p>Book your bus tickets online with ease and comfort</p>
        </div>
    </section>

    <section class="search-section">
        <div class="search-container">
            <h2>Find Your Bus</h2>
            
            <?php
            // Handle search form submission
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $from = $_POST['from'] ?? '';
                $to = $_POST['to'] ?? '';
                $date = $_POST['date'] ?? '';
                
                if (!empty($from) && !empty($to) && !empty($date)) {
                    header("Location: bus-list.php?from=" . urlencode($from) . "&to=" . urlencode($to) . "&date=" . urlencode($date));
                    exit();
                }
            }
            ?>
            
            <form class="search-form" method="POST" action="index.php">
                <div class="form-group">
                    <label>From</label>
                    <input type="text" name="from" placeholder="Enter city" value="New York" required>
                </div>
                <div class="form-group">
                    <label>To</label>
                    <input type="text" name="to" placeholder="Enter city" value="Boston" required>
                </div>
                <div class="form-group">
                    <label>Journey Date</label>
                    <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" required>
                </div>
                <button type="submit" class="search-btn">Search Buses</button>
            </form>
        </div>
    </section>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> BusEazy. All rights reserved.</p>
    </footer>

    <!-- JavaScript to ensure links work every time -->
    <script>
        // This ensures all links work properly when clicked multiple times
        document.addEventListener('click', function(e) {
            if (e.target.tagName === 'A' && e.target.getAttribute('href')) {
                const href = e.target.getAttribute('href');
                // Don't interfere with external links or logout
                if (!href.startsWith('http') && !href.startsWith('#') && !href.includes('logout')) {
                    e.preventDefault();
                    window.location.href = href;
                }
            }
        });
    </script>
</body>
</html>