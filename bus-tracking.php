<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BusEazy - Track Bus</title>
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
        .tracking-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        .search-box {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }
        .search-box input {
            flex: 1;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .track-btn {
            background: #f39c12;
            color: white;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 5px;
            cursor: pointer;
        }
        .map-placeholder {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 300px;
            border-radius: 10px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }
        .bus-info {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 8px;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #ddd;
        }
        .label {
            color: #666;
        }
        .value {
            font-weight: bold;
            color: #2c3e50;
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
                <li><a href="booking-history.php" onclick="window.location.href='booking-history.php'">My Bookings</a></li>
                <li><a href="bus-tracking.php" class="active" onclick="window.location.href='bus-tracking.php'">Track Bus</a></li>
                <li><a href="help-contact.php" onclick="window.location.href='help-contact.php'">Help & Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="page-title">
        <h1>Track Your Bus</h1>
        <p>Real-time GPS tracking</p>
    </section>

    <div class="tracking-container">
        <div class="search-box">
            <input type="text" placeholder="Enter Booking ID" value="BOK234567">
            <button class="track-btn" onclick="alert('Tracking bus...')">Track</button>
        </div>
        <div class="map-placeholder">
            🗺️ Live Map - Bus Location: I-95, near Stamford, CT
        </div>
        <div class="bus-info">
            <div class="info-row"><span class="label">Bus:</span><span class="value">Express Luxury</span></div>
            <div class="info-row"><span class="label">Route:</span><span class="value">New York → Boston</span></div>
            <div class="info-row"><span class="label">Departure:</span><span class="value">08:00 AM</span></div>
            <div class="info-row"><span class="label">Arrival:</span><span class="value">12:30 PM (On Time)</span></div>
            <div class="info-row"><span class="label">Current Location:</span><span class="value">I-95, Stamford, CT</span></div>
        </div>
    </div>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> BusEazy. All rights reserved.</p>
    </footer>
</body>
</html>