<?php
session_start();

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="about.css?v=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>About Page</title>

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
                    <a>Services <i class="fa fa-caret-down"></i></a>
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
    <div class="title"><u> About Kapileswara Swamy Temple</u></div>
    <div class="temple">
    <div class="container">
        <img src="images/temple.jpg" alt="sri kapileshwar Swamy utasavam picture">
    </div>
    <div class="subhead">Temple Legend</div>
    <div class="content">
        <p1>Sri Kapileshwara Swamy Vari Temple located at the foot of  Tirumala Hills is the<br>
            Lord Shiva temple in  the vicinity of Tirupati.According to the temple legend, the<br>
             temple was named after the great Saint Maharishi Kapila ,an ardent devotee of<br>  Lord
            Shiva.It is said that Kapila Muni had worshipped and meditated in the cave<br>  in front of the idol of Lord  
            Blissed by Kapila Muni's penance Lord Shiva blessed<br> him wih a vision of himself and his consort Goddess Parvati. The Swamy Lingam <br>
            is believed to be installed by Kapila Muni and hence Lord Shiva  here is known as<br>  "Kapileshwara".
            It is also believed Kapila Muni emerged the Cavity(Bilam) in<br>that the Pushkarini on earth.<br>
    </p1>
    </div>
    </div>
    <div class="container2">
        <img src="images/kapilatheertam.jpg" alt="sri kapileshwar Swamy utasavam picture">
    </div>
    <div class="subheadL">Temple Significance</div>
    <div class="contentL1">
    This temple is home to the famous waterfall Kapila Theertham which is said to be one<br>  of the
            108 sacred teerthas(springs) present in Tirupati.This is a unique waterfall where the  <br> water of mountain stream 
            drop from the height of over 100 feet into a large pond <br>i.e Pushkarini known as "Kapila Theertham" and also known as "Alwar Theertham" <br> 
            in the temple premises.<br>       
    </div>
    <div class="contentL2">
        During "kartika" month on the occasion of its "mukkoti" on the "Purnima" day, all <br>the theerthas situated in
        the three worlds are believed to merge into the holy water of<br>   Kapilatheertham at the noon for about 24 Ghatikas
         (1 Ghatika is equal to 24 minutes).<br>There is a belief that when  devotees take bath in holy theertham during this  
         time they will <br>attain the Brahmlokha or salvation from the cycle of births and deaths will get rid. <br>
         Moreover, those who have never offered Pindam(thida) to their<br> departed ancestor souls can do it here
        and wash off your sins.<br>Hence devotees from  across the country travel here to offer their prayers to Lord Shiva.</p2>
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