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
    <title>BusEazy - Select Seats</title>
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
        .seat-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        .bus-layout {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            margin: 2rem 0;
        }
        .seat-row {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }
        .seat {
            width: 50px;
            height: 50px;
            border: 2px solid #ddd;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            background: white;
        }
        .seat.selected {
            background: #f39c12;
            color: white;
            border-color: #e67e22;
        }
        .seat.booked {
            background: #e74c3c;
            color: white;
            border-color: #c0392b;
            cursor: not-allowed;
        }
        .legend {
            display: flex;
            gap: 2rem;
            justify-content: center;
            margin: 2rem 0;
        }
        .legend-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .legend-box {
            width: 20px;
            height: 20px;
            border: 2px solid #ddd;
            border-radius: 4px;
        }
        .legend-box.available { background: white; }
        .legend-box.selected { background: #f39c12; }
        .legend-box.booked { background: #e74c3c; }
        .book-btn {
            background-color: #f39c12;
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 5px;
            font-size: 1.1rem;
            cursor: pointer;
            width: 100%;
            margin-top: 2rem;
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
                <li><a href="ticket-book.php" onclick="window.location.href='ticket-book.php'">Book Ticket</a></li>
                <li><a href="seat-selection.php" class="active" onclick="window.location.href='seat-selection.php'">Select Seat</a></li>
                <li><a href="booking-history.php" onclick="window.location.href='booking-history.php'">My Bookings</a></li>
                <li><a href="bus-tracking.php" onclick="window.location.href='bus-tracking.php'">Track Bus</a></li>
                <li><a href="help-contact.php" onclick="window.location.href='help-contact.php'">Help & Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="page-title">
        <h1>Select Your Seats</h1>
        <p><?php echo $bus_name; ?></p>
    </section>

    <div class="seat-container">
        <div class="legend">
            <div class="legend-item"><div class="legend-box available"></div><span>Available</span></div>
            <div class="legend-item"><div class="legend-box selected"></div><span>Selected</span></div>
            <div class="legend-item"><div class="legend-box booked"></div><span>Booked</span></div>
        </div>

        <div class="bus-layout">
            <div class="seat-row">
                <div class="seat" onclick="selectSeat(this)">1</div>
                <div class="seat" onclick="selectSeat(this)">2</div>
                <div class="seat" onclick="selectSeat(this)">3</div>
                <div class="seat" onclick="selectSeat(this)">4</div>
            </div>
            <div class="seat-row">
                <div class="seat" onclick="selectSeat(this)">5</div>
                <div class="seat" onclick="selectSeat(this)">6</div>
                <div class="seat booked">7</div>
                <div class="seat booked">8</div>
            </div>
            <div class="seat-row">
                <div class="seat" onclick="selectSeat(this)">9</div>
                <div class="seat" onclick="selectSeat(this)">10</div>
                <div class="seat" onclick="selectSeat(this)">11</div>
                <div class="seat" onclick="selectSeat(this)">12</div>
            </div>
        </div>

        <button class="book-btn" onclick="proceedToBook()">Proceed to Book ($<?php echo $price; ?>)</button>
    </div>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> BusEazy. All rights reserved.</p>
    </footer>

    <script>
        function selectSeat(seat) {
            if (!seat.classList.contains('booked')) {
                seat.classList.toggle('selected');
            }
        }
        function proceedToBook() {
            window.location.href = 'ticket-book.php?bus=<?php echo urlencode($bus_name); ?>&price=<?php echo $price; ?>';
        }
    </script>
</body>
</html>