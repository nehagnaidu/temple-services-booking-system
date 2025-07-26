<?php
session_start();

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if all required fields are set
    if (!isset($_POST['username']) || !isset($_POST['phone']) || !isset($_POST['email']) || 
        !isset($_POST['photoId']) || !isset($_POST['photoIdNo']) || 
        !isset($_POST['sevaName']) || !isset($_POST['selectedTime']) || !isset($_POST['selectedDate'])) {
        echo "Missing form data. Please check if all required fields are filled.";
        exit;
    }

    // Store form data in variables
    $name = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $photo_id_type = $_POST['photoId']; 
    $photo_id_no = $_POST['photoIdNo'];
    $sevaName = $_POST['sevaName'];
    $selectedTime = $_POST['selectedTime'];
    $selectedDate = $_POST['selectedDate'];
    $serviceName = "Seva";

    // Connect to the database
    include 'connection.php';  // Assume you have this file for DB connection

    // Insert booking details into the seva_bookings table
    $query = "INSERT INTO seva_bookings (username, phone, email, photo_id, photo_id_no, sevaName, selectedTime, selectedDate) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    
    $stmt->bind_param("ssssssss", $name, $phone, $email, $photo_id_type, $photo_id_no, $sevaName, $selectedTime, $selectedDate);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Redirect to profile.php with user details
        header("Location: profile.php?name=" . urlencode($name) . "&date=" . urlencode($selectedDate) . "&time=" . urlencode($selectedTime) . "&service=" . urlencode($serviceName));

        exit();
    } else {
        // Redirect to booking page with an error message
        header("Location: booking.php?error=1");
        exit();
    }

    $stmt->close();
    $conn->close();
    exit;
} else {
    echo "Invalid request method.";
    exit;
}
?>
