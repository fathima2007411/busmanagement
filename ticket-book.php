<?php
session_start();
$bus_name = isset($_GET['bus']) ? htmlspecialchars($_GET['bus']) : 'Express Luxury';
$price = isset($_GET['price']) ? floatval($_GET['price']) : 45;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BusEazy - Book Ticket</title>
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
        .page-title {
            background: linear-gradient(135deg, #3498db, #2c3e50);
            color: white;
            padding: 2rem 5%;
            text-align: center;
        }
        .booking-form {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
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
        }
        .passenger-box {
            border: 1px solid #ddd;
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1rem;
        }
        .book-btn {
            background-color: #f39c12;
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 5px;
            font-size: 1.1rem;
            cursor: pointer;
            width: 100%;
        }
        .book-btn:hover {
            background-color: #e67e22;
        }
        footer {
            background-color: #2c3e50;
            color: white;
            padding: 2rem 5%;
            text-align: center;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo">BusEazy</div>
            <ul class="nav-links">
                <li><a href="index.php" onclick="window.location.href='index.php'">Home</a></li>
                <li><a href="bus-list.php" onclick="window.location.href='bus-list.php'">Bus List</a></li>
                <li><a href="ticket-book.php" class="active" onclick="window.location.href='ticket-book.php'">Book Ticket</a></li>
                <li><a href="seat-selection.php" onclick="window.location.href='seat-selection.php'">Select Seat</a></li>
                <li><a href="booking-history.php" onclick="window.location.href='booking-history.php'">My Bookings</a></li>
                <li><a href="bus-tracking.php" onclick="window.location.href='bus-tracking.php'">Track Bus</a></li>
                <li><a href="help-contact.php" onclick="window.location.href='help-contact.php'">Help & Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="page-title">
        <h1>Passenger Details</h1>
        <p><?php echo $bus_name; ?></p>
    </section>

    <div class="booking-form">
        <div class="passenger-box">
            <h3 style="margin-bottom: 1rem;">Passenger 1</h3>
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" placeholder="Enter full name" value="John Doe">
            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="number" placeholder="Age" value="28">
            </div>
        </div>
        <div class="passenger-box">
            <h3 style="margin-bottom: 1rem;">Passenger 2</h3>
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" placeholder="Enter full name" value="Jane Doe">
            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="number" placeholder="Age" value="26">
            </div>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" placeholder="Enter email" value="john@example.com">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="tel" placeholder="Enter phone" value="1234567890">
        </div>
        <button class="book-btn" onclick="window.location.href='booking-history.php'">Complete Booking ($<?php echo $price * 2; ?>)</button>
    </div>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> BusEazy. All rights reserved.</p>
    </footer>
</body>
</html>