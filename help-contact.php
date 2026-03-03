<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BusEazy - Help & Contact</title>
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
        .help-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 5%;
        }
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-bottom: 3rem;
        }
        .contact-info, .contact-form {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        .contact-info h2, .contact-form h2 {
            color: #2c3e50;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #f39c12;
        }
        .info-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 8px;
        }
        .info-icon {
            width: 50px;
            height: 50px;
            background: #f39c12;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        .info-text h3 {
            color: #2c3e50;
            margin-bottom: 0.3rem;
        }
        .info-text p {
            color: #666;
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
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group textarea {
            height: 120px;
        }
        .submit-btn {
            background: #f39c12;
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
        }
        .faq-section {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            margin-bottom: 3rem;
        }
        .faq-section h2 {
            color: #2c3e50;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #f39c12;
        }
        .faq-item {
            border-bottom: 1px solid #eee;
            margin-bottom: 1rem;
        }
        .faq-question {
            padding: 1rem 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            color: #2c3e50;
            font-weight: 600;
        }
        .faq-answer {
            padding: 0 0 1rem 0;
            color: #666;
            line-height: 1.6;
            display: none;
        }
        .faq-answer.show {
            display: block;
        }
        .faq-toggle {
            font-size: 1.2rem;
            color: #f39c12;
        }
        .office-section {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        .office-section h2 {
            color: #2c3e50;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #f39c12;
        }
        .office-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }
        .office-card {
            padding: 1.5rem;
            background: #f8f9fa;
            border-radius: 8px;
        }
        .office-card h3 {
            color: #2c3e50;
            margin-bottom: 1rem;
        }
        .office-card p {
            color: #666;
            margin-bottom: 0.5rem;
        }
        footer {
            background-color: #2c3e50;
            color: white;
            padding: 2rem 5%;
            text-align: center;
            margin-top: 3rem;
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
                <li><a href="bus-tracking.php" onclick="window.location.href='bus-tracking.php'">Track Bus</a></li>
                <li><a href="help-contact.php" class="active" onclick="window.location.href='help-contact.php'">Help & Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="page-title">
        <h1>Help & Contact</h1>
        <p>We're here to help 24/7</p>
    </section>

    <div class="help-container">
        <div class="contact-grid">
            <div class="contact-info">
                <h2>Get in Touch</h2>
                <div class="info-item"><div class="info-icon">📞</div><div class="info-text"><h3>Call Us</h3><p>+1 234 567 8900</p></div></div>
                <div class="info-item"><div class="info-icon">✉️</div><div class="info-text"><h3>Email Us</h3><p>support@buseazy.com</p></div></div>
                <div class="info-item"><div class="info-icon">💬</div><div class="info-text"><h3>Live Chat</h3><p>Available 24/7</p></div></div>
                <div class="info-item"><div class="info-icon">📍</div><div class="info-text"><h3>Head Office</h3><p>123 Bus Street, New York</p></div></div>
            </div>
            <div class="contact-form">
                <h2>Send Message</h2>
                <form onsubmit="event.preventDefault(); alert('Thank you! We will contact you soon.');">
                    <div class="form-group"><label>Your Name</label><input type="text" placeholder="Enter your name" required></div>
                    <div class="form-group"><label>Email</label><input type="email" placeholder="Enter your email" required></div>
                    <div class="form-group"><label>Message</label><textarea placeholder="Write your message..." required></textarea></div>
                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>
        </div>
        <div class="faq-section">
            <h2>FAQs</h2>
            <div class="faq-item"><div class="faq-question" onclick="toggleFaq(this)"><span>How to book?</span><span class="faq-toggle">+</span></div><div class="faq-answer">Enter source/destination, select bus, choose seats, add details, pay.</div></div>
            <div class="faq-item"><div class="faq-question" onclick="toggleFaq(this)"><span>Cancellation policy?</span><span class="faq-toggle">+</span></div><div class="faq-answer">Cancel up to 2hrs before. Refund depends on time.</div></div>
        </div>
        <div class="office-section">
            <h2>Our Offices</h2>
            <div class="office-grid">
                <div class="office-card"><h3>New York</h3><p>123 Bus Street</p><p>📞 +1 212 555 0123</p></div>
                <div class="office-card"><h3>Boston</h3><p>456 Travel Avenue</p><p>📞 +1 617 555 0456</p></div>
                <div class="office-card"><h3>Chicago</h3><p>789 Transit Blvd</p><p>📞 +1 312 555 0789</p></div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> BusEazy. All rights reserved.</p>
    </footer>

    <script>
        function toggleFaq(element) {
            const answer = element.nextElementSibling;
            const toggle = element.querySelector('.faq-toggle');
            answer.classList.toggle('show');
            toggle.textContent = answer.classList.contains('show') ? '−' : '+';
        }
    </script>
</body>
</html>