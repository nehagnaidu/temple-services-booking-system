<?php
session_start();

// Assume you have database connection logic here
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if required fields are set
    if (!isset($_POST['username']) || !isset($_POST['phone']) || !isset($_POST['email']) || 
        !isset($_POST['photoId']) || !isset($_POST['photoIdNo']) ||
        !isset($_POST['room']) || !isset($_POST['persons']) || 
        !isset($_POST['selectedDate']) || !isset($_POST['selectedTime'])) {
        die("Missing form data. Please check if all required fields are filled.");
    }

    // Retrieve data from the second form
    $name = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $photo_id = $_POST['photoId'];
    $photo_id_no = $_POST['photoIdNo'];

    // Retrieve data from the first form
    $room = $_POST['room'];
    $persons = $_POST['persons'];
    $selectedDate = $_POST['selectedDate'];
    $selectedTime = $_POST['selectedTime']; 
    $serviceName = "Accomodation";

    // Prepare the SQL statement
    $sql = "INSERT INTO hotel_booking (username, phone, email, photo_id, photo_id_no, room_type, no_of_persons, selectedDate, selectedTime) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind the parameters to the statement
        mysqli_stmt_bind_param($stmt, "ssssssiss", $name, $phone, $email, $photo_id, $photo_id_no, $room, $persons, $selectedDate, $selectedTime);
        
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

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Handle errors with statement preparation
        echo "Error preparing the SQL statement.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
