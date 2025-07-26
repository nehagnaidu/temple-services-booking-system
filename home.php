<?php
session_start();

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
?>
<?php
include('connection.php');

// Fetch notifications
$query = "SELECT * FROM notifications ORDER BY display_order ASC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css?v=<?php echo time(); ?>">
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
            <?php if ($isLoggedIn): ?>
                <a href="profile.php" id="profile">Profile</a>
                <a href="logout.php" id="logout">Log Out</a>
            <?php else: ?>
                <a href="signin.html" id="signin">Sign In</a>
                <a href="signup.html" id="signup">Sign Up</a>
            <?php endif; ?>
        </div>
    </li>
            </ul>
        </nav>
    </div>
    <div class="img-section">
        <img src="images/Swamyy.jpg">
    </div>
    <div class="text">
        Lord Kapileshwar Swamy with his consort.
    </div>
    <section class="services-section">
        <div class="partition">
            --- Devotee Services ---
        </div>
        <div class="service-container">
            <div class="darshan-container">
                <a href="darshanbooking.php" class="service-link">
                    <i class="fa-solid fa-gopuram fa-3x"></i>
                    <p>Darshan Booking</p>
                </a>
            </div>
            <div class="seva-container">
                <a href="sevabooking.php" class="service-link">
                    <i class="fas fa-praying-hands fa-3x"></i>
                    <p>Seva Booking</p>
                </a>
            </div>
            <div class="accom-container">
                <a href="accomodation.php" class="service-link">
                    <i class="fa-solid fa-hotel fa-3x"></i>
                    <p>Accommodation</p>
                </a>
            </div>
        </div>
    </section>

    <section class="places-section">
        <div class="head"><u>--- Nearby Places to Visit ---</u></div>
        <div class="places-grid">
            <div class="place-box">
                <div class="image-container">
                    <img src="images/p1.jpg" alt="Sri Venkateswara Temple">
                    <div class="hover-content">
                        <ul>
                            <li><strong>Location:</strong> Tirumala, Andhra Pradesh, India</li>
                            <li><strong>Significance:</strong> One of the richest and most visited temples in the world</li>
                            <li><strong>Deity:</strong> Lord Venkateswara</li>
                            <li><strong>Festivals:</strong> Brahmotsavam and other important festivals</li>
                        </ul>
                    </div>
                    <div class="place-name">Sri Venkateswara Temple</div>
                </div>
            </div>
            <div class="place-box">
                <div class="image-container">
                    <img src="images/p6.jpg" alt="Srikalahasti Temple">
                    <div class="hover-content">
                        <ul>
                            <li><strong>Location:</strong> Srikalahasti, Andhra Pradesh, India</li>
                            <li><strong>Significance:</strong> One of the Panchabhoota Sthalams, representing the element of air (Vayu)</li>
                            <li><strong>Deity:</strong> Lord Shiva as Kalahasteeswara</li>                        
                            <li><strong>Festivals:</strong> Maha Shivaratri, Brahmotsavam</li>
                        </ul>
                    </div>
                    <div class="place-name">Srikalahasti Temple</div>
                </div>
            </div>
            <div class="place-box">
                <div class="image-container">
                    <img src="images/p3.jpg" alt="Iskon Tirupati">
                    <div class="hover-content">
                        <ul>
                            <li><strong>Location:</strong> Tirupati, Andhra Pradesh, India</li>
                            <li><strong>Significance:</strong> Promotes the teachings of Bhagavad Gita</li>
                            <li><strong>Deity:</strong> Lord Krishna</li>
                            <li><strong>Established:</strong> 1982</li>
                        </ul>
                    </div>
                    <div class="place-name">Iskon Tirupati</div>
                </div>
            </div>
            <div class="place-box">
                    <div class="image-container">
                        <img src="images/p4.jpg" alt="Sri Govindarajaswamy Temple">
                        <div class="hover-content">
                            <ul>
                                <li>Location:</strong> Tirupati, Andhra Pradesh, India</li>
                                <li>Deity:</strong> Lord Govindarajaswamy</li>
                                <li>Significance:</strong> One of the most important temples in Tirupati</li>
                                <li>Festivals:</strong> Annual Brahmotsavam</li>
                            </ul>
                        </div>
                    </div>
                    <div class="place-name">Sri Govindarajaswamy Temple</div>
                </div>
                <div class="place-box">
                    <div class="image-container">
                        <img src="images/p5.jpg" alt="Sri Padmavati Ammavaari Temple">
                        <div class="hover-content">
                            <ul>
                                <li>Location:</strong> Tiruchanur, Andhra Pradesh,<br>India</li>
                                <li>Deity:</strong> Goddess Padmavati</li>
                                <li>Significance:</strong> Consort of Lord Venkateswara</li>
                                <li>Festivals:</strong> Kartheeka Brahmotsavam, Panchami Teertham</li>
                            </ul>
                        </div>
                    </div>
                    <div class="place-name">Sri Padmavati Ammavaari Temple</div>
                </div>
                <div class="place-box">
                    <div class="image-container">
                        <img src="images/p2.jpg" alt="Sri Venkateswara Zoological Park">
                        <div class="hover-content">
                            <ul>
                                <li>Location:</strong> Tirupati, Andhra Pradesh,<br>India</li>
                                <li>Significance:</strong> Largest zoological park in Asia</li>
                                <li>Flora and Fauna:</strong> Home to a wide variety of species</li>
                                <li>Conservation Efforts:</strong> Focus on endangered species</li>
                                <li>Established:</strong> 1987</li>
                            </ul>
                        </div>
                    </div>
                    <div class="place-name">Sri Venkateswara Zoological Park</div>
                </div>
            </div>
        </div>
        </section>
    
    <script src="dem.js"></script>

    <div class="scroll-notification">
    <div class="scroll-header">
        <h3>Notifications</h3>
        <p>Get the latest updates here</p>
    </div>
    <div class="scroll-content">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="schedule-item">
                <strong>
                    <?php echo $row['title']; ?>
                    <?php if ($row['link']) { ?>
                        <a href="<?php echo $row['link']; ?>"><?php echo $row['link_text']; ?></a>
                    <?php } ?>
                </strong>
            </div>
        <?php } ?>
    </div>
</div>

<script>
    window.onload = function() {
    let scrollContainer = document.querySelector('.scroll-content');
    let scrollAmount = 1;

    setInterval(function() {
        scrollContainer.scrollTop += scrollAmount;

        // Reset to top when reaching the bottom
        if (scrollContainer.scrollTop >= scrollContainer.scrollHeight - scrollContainer.clientHeight) {
            scrollContainer.scrollTop = 0;
        }
    }, 50);
}
</script>
    
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
            <p><strong>Address:</strong>Kapila Theertham Road, Tirupati Bazar, Tirupati - 517501 (Ambedhkar Colony)

</p><br>
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
