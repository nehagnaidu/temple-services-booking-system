<?php
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $phoneno = $_POST['phoneno'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $security_question = $_POST['security_question'];
    $security_answer = $_POST['security_answer'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo 'Passwords do not match.';
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL query
    $query = "INSERT INTO users (username, phoneno, email, password, security_question, security_answer) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    // Bind the parameters (6 parameters to bind)
    $stmt->bind_param('ssssss', $username, $phoneno, $email, $hashed_password, $security_question, $security_answer);

    // Execute the query and check if successful
    if ($stmt->execute()) {
        header('Location: signin.html');
        exit;
    } else {
        echo 'Error: ' . $conn->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo 'Invalid request method.';
}
?>
