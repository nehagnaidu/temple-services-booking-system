<?php
// Include your database connection file
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $date = $_POST['date'];
    $status = $_POST['status'];

    // Check if the date already exists in the table
    $query = "SELECT * FROM calendar_dates WHERE date = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $date);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update the status if the date exists
        $updateQuery = "UPDATE calendar_dates SET status = ? WHERE date = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("ss", $status, $date);
        $updateStmt->execute();
    } else {
        // Insert the new date with status
        $insertQuery = "INSERT INTO calendar_dates (date, status) VALUES (?, ?)";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bind_param("ss", $date, $status);
        $insertStmt->execute();
    }

    // Redirect back to the admin panel with a success message
    echo "<script>
    alert('Calendar Updated.');
     window.location.href = 'adminPanel.php';
  </script>";
exit();
    exit();
}
?>
