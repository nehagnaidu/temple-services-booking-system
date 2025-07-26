<?php
session_start();
require_once 'connection.php'; // Include your database connection file

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: signin.html');
    exit;
}

// Retrieve user ID from session
$user_id = $_SESSION['user_id']; 

// Initialize arrays to store booking details for each service
$darshan_bookings = [];
$seva_bookings = [];
$accommodation_bookings = [];

// Queries to fetch booking details from each table
$query_darshan = "SELECT username, selectedDate, selectedTime FROM darshan_booking WHERE user_id = ?";
$query_seva = "SELECT username, selectedDate, selectedTime FROM seva_bookings WHERE user_id = ?";
$query_accommodation = "SELECT username, selectedDate, selectedTime FROM hotel_booking WHERE user_id = ?";

// Fetch Darshan bookings
$stmt = $conn->prepare($query_darshan);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $darshan_bookings[] = $row;
}
$stmt->close();

// Fetch Seva bookings
$stmt = $conn->prepare($query_seva);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $seva_bookings[] = $row;
}
$stmt->close();

// Fetch Accommodation bookings
$stmt = $conn->prepare($query_accommodation);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $accommodation_bookings[] = $row;
}
$stmt->close();

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css?v=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Kapileswara Swamy Temple</title>
</head>
<body>
    <div class="topnav">
        <div class="Logo">
            <div class="l1">
                <i class="fa-solid fa-gopuram fa-2x"></i>
            </div>
            <div class="name"><a href="home.php">Sri Kapileswara Swamy Vari Temple</a></div>
        </div>
        <div class="Logo2">
            <div class="l2">
                <i class="fa-solid fa-drum fa-2x"></i>
            </div>
            <div class="mantra">Om Namo Shivaya</div>
        </div>
    </div>
    <div class="header">
        <nav class="navbar">
            <ul class="nav-links">
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li class="dropdown">
                    <a href="#">Services <i class="fa fa-caret-down"></i></a>
                    <div class="dropdown-content">
                        <a href="darshanbooking.php">Darshan Booking</a>
                        <a href="sevabooking.php">Seva Booking</a>
                        <a href="accom_page1.php">Accommodation Booking</a>
                    </div>
                </li>
                <li><a href="writetous.php">Write to Us</a></li>
                <li class="user-profile">
                    <i class="fas fa-user user-icon"></i>
                    <div class="user-profile-content">
                        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                            <a href="profile.php">Profile</a>
                            <a href="logout.php">Log Out</a>
                        <?php else: ?>
                            <a href="signin.html">Sign In</a>
                            <a href="signup.html">Sign Up</a>
                        <?php endif; ?>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
    <?php
    echo '<div class="welcome-message">Welcome, ' . htmlspecialchars($_SESSION['username']) . '</div>';
    ?>

    <div class="booking-cards">
        <!-- Darshan Bookings Card -->
        <div class="card">
            <h3>Darshan Bookings</h3>
            <?php if (!empty($darshan_bookings)): ?>
                <?php foreach ($darshan_bookings as $booking): ?>
                    <div class="booking-details">
                        <p><b>Name:</b> <?php echo htmlspecialchars($booking['username']); ?></p>
                        <p><b>Booking Date:</b> <?php echo htmlspecialchars($booking['selectedDate']); ?></p>
                        <p><b>Booking Time:</b> <?php echo htmlspecialchars($booking['selectedTime']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No Darshan bookings made.</p>
            <?php endif; ?>
        </div>

        <!-- Seva Bookings Card -->
        <div class="card">
            <h3>Seva Bookings</h3>
            <?php if (!empty($seva_bookings)): ?>
                <?php foreach ($seva_bookings as $booking): ?>
                    <div class="booking-details">
                        <p><b>Name:</b> <?php echo htmlspecialchars($booking['username']); ?></p>
                        <p><b>Booking Date:</b> <?php echo htmlspecialchars($booking['selectedDate']); ?></p>
                        <p><b>Booking Time:</b> <?php echo htmlspecialchars($booking['selectedTime']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No Seva bookings made.</p>
            <?php endif; ?>
        </div>

        <!-- Accommodation Bookings Card -->
        <div class="card">
            <h3>Accommodation Bookings</h3>
            <?php if (!empty($accommodation_bookings)): ?>
                <?php foreach ($accommodation_bookings as $booking): ?>
                    <div class="booking-details">
                        <p><b>Name:</b> <?php echo htmlspecialchars($booking['username']); ?></p>
                        <p><b>Booking Date:</b> <?php echo htmlspecialchars($booking['selectedDate']); ?></p>
                        <p><b>Booking Time:</b> <?php echo htmlspecialchars($booking['selectedTime']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No Accommodation bookings made.</p>
            <?php endif; ?>
        </div>
    </div>

    <footer class="footer">
    <div class="footer-container">
        <div class="footer-about">
        <i class="fa-solid fa-gopuram fa-2x"></i>
            <h4>About the Temple</h4>
            <p>Sri Kapileshwar Swamy Vari Temple, located in Tirupati, is dedicated to Lord Shiva and is the only Shiva temple in the town of Tirupati. The temple is renowned for its serene surroundings and sacred waterfall, known as "Kapila Theertham," which is believed to wash away sins when bathed in.</p>
           
        </div>

        <div class="footer-links">
        <i class="fa-solid fa-link fa-2x"></i>
            <h4>Quick Links</h4>
            <ul>
                <li><a href="darshanbooking.php">Darshan Booking</a></li>
                <li><a href="sevabooking.php">Seva Booking</a></li>
                <li><a href="accom_page1.php">Accommodation Booking</a></li>
                <li><a href="writetous.php">Contact Us</a></li>
            </ul>
        </div> 

        <div class="footer-contact">
        <i class="fa-solid fa-phone fa-2x"></i>
            <h4>Contact Us</h4>
            <p><strong>Address:</strong> Kapila Theertham Road, Tirupati Bazar, Tirupati - 517501 (Ambedhkar Colony)</p><br>
            <p><strong>Phone:</strong> +91 1234567890</p><br>
            <p><strong>Email:</strong> info@templewebsite.com</p>
        </div>

        <div class="footer-social">
        <i class="fa-solid fa-hashtag fa-2x"></i>
            <h4>Follow Us</h4>
            <div class="social-icons">
                <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook fa-2x"></i></a>
                <a href="https://x.com/?lang=en"><i class="fa-brands fa-twitter fa-2x"></i></a>
                <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram fa-2x"></i></a>
                <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube fa-2x"></i></a>
            </div>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p>&copy; Sri Kapileshwar Swamy Vari Temple. All rights reserved.</p>
    </div>
</body>
</html>