<?php
session_start();

// Function to check if the user is logged in
function checkLogin() {
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        // Store the current page URL in session to redirect after login
        $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];

        // Redirect to login page
        header('Location: signin.html');
        exit;
    }
}
?>
