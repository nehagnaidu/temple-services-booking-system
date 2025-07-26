<?php
session_start();

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
// Retrieve the form data from the booking page
$name = $_POST['name'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$photoId = $_POST['photoId'];
$photoIdNo = $_POST['photoIdNo'];
$selectedDate = $_POST['selectedDate'];
$selectedTime = $_POST['selectedTime'];  
$price = 500; // Example price in INR 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="darshan_payment.css?v=<?php echo time(); ?>">
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
    <div class="container">
    <div class="payment-summary">
        <h4>Booking Summary</h4>
        <p>Service: Darshan</p>
        <p>Name: <?php echo $name; ?></p>
       <p>Price: ₹<?php echo $price; ?></p>
        <p>Selected Date: <?php echo $selectedDate; ?></p>
        <p>Selected Time Slot:<?php echo $selectedTime; ?></p>
                        
    </div>
        <!-- Payment Form -->
        <form action="dbooking.php" method="post">
            <!-- Pass the booking details to the payment processing page -->
            <input type="hidden" name="username" value="<?php echo $name; ?>">
            <input type="hidden" name="phone" value="<?php echo $phone; ?>">
            <input type="hidden" name="gender" value="<?php echo $gender; ?>">
            <input type="hidden" name="photoId" value="<?php echo $photoId; ?>">
            <input type="hidden" name="photoIdNo" value="<?php echo $photoIdNo; ?>">
            <input type="hidden" name="selectedDate" value="<?php echo $selectedDate; ?>">
            <input type="hidden" name="selectedTime" value="<?php echo $selectedTime; ?>">
            <input type="hidden" name="price" value="<?php echo $price; ?>">

            <div class="payment-container">
            <h4>Choose a Payment Method:</h4>
            <form action="process_payment.php" method="post" id="payment-form">
        <!-- Initial Payment Method Selection -->
        <div class="payment-methods">
            <br><label>
                <input type="radio" name="payment-type" value="debit" onclick="showOptions('card-options')">
                Debit Card
            </label><br>
            <br><label>
                <input type="radio" name="payment-type" value="credit" onclick="showOptions('card-options')">
                Credit Card
            </label>
        </div>

        <!-- Card Options -->
        <div id="card-options" class="options" style="display:none;">
            <br><label>
                <input type="radio" name="payment-method" value="visa" onclick="showForm('card-form')">
                <img src="visa.jpg" alt="Visa" class="logo">
            </label><br>
            <br><label>
                <input type="radio" name="payment-method" value="mastercard" onclick="showForm('card-form')">
                <img src="mastercard.jpg" alt="MasterCard" class="logo">
            </label><br>
        </div>

        <!-- Card Details Form -->
        <div id="card-form" class="card-details" style="display:none;">
            <div class="input-group">
                <input type="text" name="first-name" placeholder="First Name" required>
                <input type="text" name="last-name" placeholder="Last Name" required>
            </div>
            <div class="input-group">
            <input type="text" name="card-number" placeholder="Credit Card Number" minlength="16" maxlength="16" required>
            <input type="password" name="cvc" placeholder="CVC" maxlength="3" required>
            </div>
            <div class="input-group">
                <input type="text" name="expirydate" placeholder="MM / YY" required>
            </div>
        </div>

        <!-- Pay Now Button -->
        <button type="submit" class="submit-button" id="submit-button" style="display:none;">Pay Now</button>
    </form>
</div>
<script src="script.js"></script>
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
</footer>


</body>
</html>
