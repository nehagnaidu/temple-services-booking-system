<?php
// Include your database connection file
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $conn->real_escape_string($_POST['name']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert the data into the database
    $sql = "INSERT INTO feedback_form (username, phone, email, message) VALUES ('$name', '$phone', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Output JavaScript to display a success popup
        echo "<script type='text/javascript'>
                alert('Your message has been submitted successfully.');
                window.location.href = 'writetous.php'; // Optional: Redirect after popup
              </script>";
    } else {
        // Output JavaScript to display an error popup
        echo "<script type='text/javascript'>
                alert('Error: " . $conn->error . "');
                window.location.href = 'your_redirect_page.php'; // Optional: Redirect after popup
              </script>";
    }
}
?>
