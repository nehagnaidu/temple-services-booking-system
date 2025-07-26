<?php
// Include your database connection file
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['username'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $photoId = $_POST['photoId'];
    $photoIdNo = $_POST['photoIdNo'];
    $selectedDate = $_POST['selectedDate'];
    $selectedTime = $_POST['selectedTime'];
    $serviceName = "Darshan Booking";

    // Prepare the SQL statement
    $sql = "INSERT INTO darshan_booking (username, phone, gender, photo_id, photo_id_no, selectedDate, selectedTime) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssssss", $name, $phone, $gender, $photoId, $photoIdNo, $selectedDate, $selectedTime);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Redirect to profile.php with user details
        header("Location: profile.php?name=" . urlencode($name) . "&date=" . urlencode($selectedDate) . "&time=" . urlencode($selectedTimeSlot) . "&service=" . urlencode($serviceName));
        exit();
    } else {
        // Redirect to booking page with an error message
        header("Location: booking.php?error=1");
        exit();
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
