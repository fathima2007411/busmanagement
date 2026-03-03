<?php
session_start();
$from = isset($_GET['from']) ? htmlspecialchars($_GET['from']) : 'New York';
$to = isset($_GET['to']) ? htmlspecialchars($_GET['to']) : 'Boston';
$date = isset($_GET['date']) ? htmlspecialchars($_GET['date']) : date('Y-m-d');
$formatted_date = date('D, M d, Y', strtotime($date));

$buses = [
    ['name' => 'Express Luxury', 'type' => 'AC Sleeper', 'departure' => '08:00', 'arrival' => '12:30', 'duration' => '4h 30m', 'price' => 45, 'seats' => 24],
    ['name' => 'City Connect', 'type' => 'AC Seater', 'departure' => '09:30', 'arrival' => '14:45', 'duration' => '5h 15m', 'price' => 35, 'seats' => 5],
    ['name' => 'Royal Travels', 'type' => 'Non-AC Sleeper', 'departure' => '22:00', 'arrival' => '04:00', 'duration' => '6h 00m', 'price' => 25, 'seats' => 32],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BusEazy - Bus List</title>
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
        .bus-list-container {
            padding: 2rem 5%;
            max-width: 1200px;
            margin: 0 auto;
        }
        .bus-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .bus-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 1rem;
        }
        .bus-name {
            font-size: 1.3rem;
            font-weight: bold;
            color: #2c3e50;
        }
        .bus-type {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
        }
        .bus-schedule {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 1.5rem 0;
            padding: 1rem 0;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }
        .time {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2c3e50;
        }
        .bus-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .price {
            font-size: 1.8rem;
            font-weight: bold;
            color: #f39c12;
        }
        .book-btn {
            background-color: #f39c12;
            color: white;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 5px;
            cursor: pointer;
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
                <li><a href="bus-list.php" class="active" onclick="window.location.href='bus-list.php'">Bus List</a></li>
                <li><a href="ticket-book.php" onclick="window.location.href='ticket-book.php'">Book Ticket</a></li>
                <li><a href="seat-selection.php" onclick="window.location.href='seat-selection.php'">Select Seat</a></li>
                <li><a href="booking-history.php" onclick="window.location.href='booking-history.php'">My Bookings</a></li>
                <li><a href="bus-tracking.php" onclick="window.location.href='bus-tracking.php'">Track Bus</a></li>
                <li><a href="help-contact.php" onclick="window.location.href='help-contact.php'">Help & Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="page-title">
        <h1>Available Buses</h1>
        <p><?php echo $from; ?> → <?php echo $to; ?> | <?php echo $formatted_date; ?></p>
    </section>

    <div class="bus-list-container">
        <?php foreach ($buses as $bus): ?>
        <div class="bus-card">
            <div class="bus-header">
                <span class="bus-name"><?php echo $bus['name']; ?></span>
                <span class="bus-type"><?php echo $bus['type']; ?></span>
            </div>
            <div class="bus-schedule">
                <div>
                    <div class="time"><?php echo $bus['departure']; ?></div>
                    <div>Departure</div>
                </div>
                <div>→ <?php echo $bus['duration']; ?> →</div>
                <div>
                    <div class="time"><?php echo $bus['arrival']; ?></div>
                    <div>Arrival</div>
                </div>
            </div>
            <div class="bus-footer">
                <div>
                    <div class="price">$<?php echo $bus['price']; ?></div>
                    <div>per seat</div>
                </div>
                <button class="book-btn" onclick="window.location.href='seat-selection.php?bus=<?php echo urlencode($bus['name']); ?>&price=<?php echo $bus['price']; ?>'">Select Seats</button>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> BusEazy. All rights reserved.</p>
    </footer>
</body>
</html>