<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BusEazy - My Bookings</title>
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
        .bookings-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 5%;
        }
        .booking-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .booking-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #eee;
        }
        .booking-id {
            font-weight: bold;
            color: #f39c12;
        }
        .status {
            padding: 0.3rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
        }
        .status.confirmed {
            background: #d4edda;
            color: #155724;
        }
        .status.completed {
            background: #cce5ff;
            color: #004085;
        }
        .booking-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        .route {
            font-size: 1.2rem;
            font-weight: bold;
            color: #2c3e50;
        }
        .date {
            color: #666;
        }
        .view-btn {
            background: #f39c12;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            cursor: pointer;
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
                <li><a href="ticket-book.php" onclick="window.location.href='ticket-book.php'">Book Ticket</a></li>
                <li><a href="seat-selection.php" onclick="window.location.href='seat-selection.php'">Select Seat</a></li>
                <li><a href="booking-history.php" class="active" onclick="window.location.href='booking-history.php'">My Bookings</a></li>
                <li><a href="bus-tracking.php" onclick="window.location.href='bus-tracking.php'">Track Bus</a></li>
                <li><a href="help-contact.php" onclick="window.location.href='help-contact.php'">Help & Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="page-title">
        <h1>My Bookings</h1>
        <p>View and manage your bookings</p>
    </section>

    <div class="bookings-container">
        <div class="booking-card">
            <div class="booking-header">
                <span class="booking-id">Booking #BOK234567</span>
                <span class="status confirmed">Confirmed</span>
            </div>
            <div class="booking-details">
                <div>
                    <div class="route">New York → Boston</div>
                    <div class="date">Fri, Jan 20, 2024 • 08:00 AM</div>
                </div>
                <button class="view-btn" onclick="window.location.href='bus-tracking.php'">Track Bus</button>
            </div>
        </div>
        <div class="booking-card">
            <div class="booking-header">
                <span class="booking-id">Booking #BOK123456</span>
                <span class="status completed">Completed</span>
            </div>
            <div class="booking-details">
                <div>
                    <div class="route">Los Angeles → San Francisco</div>
                    <div class="date">Mon, Jan 10, 2024 • 09:30 AM</div>
                </div>
                <button class="view-btn" onclick="alert('Viewing booking details')">View Details</button>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> BusEazy. All rights reserved.</p>
    </footer>
</body>
</html>