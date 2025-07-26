<?php
include 'auth.php'; // Include the login check
checkLogin(); // Restrict access to logged-in users
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dbook.css?v=<?php echo time(); ?>">
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
                <li><a href="write.php">Write to Us</a></li>
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
   
    <div class="darshan-container">
    <form id="bookingForm" action="darshan_payment.php" method="post" onsubmit="return validateForm()">
        <label for="name">Enter your Name: </label>
        <input type="text" id="username" name="name" required>

        <label for="phone">Enter your Phone Number: </label>
        <input type="text" id="phone" name="phone" pattern="\d{10}" title="Please enter exactly 10 digits" required>

        <label for="gender">Choose Gender: </label>
        <select id="gender" name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <label for="photoId">Select a valid photoId proof: </label>
        <select id="photoId" name="photoId" required onchange="updatePhotoIdInput()">
            <option value="Aadhaar">Aadhaar Card</option>
            <option value="PAN">PAN Card</option>
        </select>

        <label for="photoIdNo">Enter selected PhotoId proof Number: </label>
        <input type="text" id="photoIdNo" name="photoIdNo" required>

        <label for="date">Select preferred date and time: </label>
        <input type="hidden" id="selectedDate" name="selectedDate" required>
        <input type="hidden" id="selectedTime" name="selectedTime" required> 

        <div class="calendar-container">
            <div class="month-nav">
                <span class="arrow" id="prevMonth">&#9664;</span>
                <h2 id="monthYear"></h2>
                <span class="arrow" id="nextMonth">&#9654;</span>  
            </div>
            <div class="calendar-container" id="calendar">
                <!-- Calendar will be populated by JavaScript -->
            </div>
 
                <div class="time-slots" id="timeSlots">
                    <h3>Available Time Slots</h3>
                    <div class="time-slot">05:00 AM - 08:00 AM</div>
                    <div class="time-slot">10:00 AM - 01:00 AM</div>
                    <div class="time-slot">03:00 AM- 06:00 PM</div>
                </div>
            </div>
            <button class="Btn" type="submit">Next</button>
        </form>
    </div>
        <script src="calendar.js">
        </script>
         <div class="img-container">
            <img src="images/img1.jpeg" alt="image">
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
</footer>
    </body>
    </html>
    