<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'connection.php'; // Database connection

    session_start(); // Start session to manage login

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the credentials match for admin
    if ($username === 'admin' && $password === 'root') {
        // Set session to mark the admin as logged in
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        // Redirect to adminPanel.php
        header('Location: adminPanel.php');
        exit; // Always exit after a header redirect
    } else {
        // Check if the user exists in the users table
        $query = "SELECT id, password FROM users WHERE username = ?";
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            die('Prepare failed: ' . $conn->error);
        }

        $stmt->bind_param('s', $username);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Verify the password
                if (password_verify($password, $row['password'])) {
                    // Store user details in session
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['user_id'] = $row['id']; // Use the id from the result

                    // On successful login, redirect to the stored page, if available
                    if (isset($_SESSION['redirect_url'])) {
                        $redirect_url = $_SESSION['redirect_url'];
                        unset($_SESSION['redirect_url']); // Remove the redirect URL from session
                        header('Location: ' . $redirect_url);
                        exit;
                    } else {
                        // Default redirect if no redirect URL is set
                        header('Location: home.php');
                        exit;
                    }
                } else {
                    // Incorrect password
                    echo 'Invalid username or password.';
                }
            } else {
                // Username does not exist in the database
                echo 'No user found with this username.';
            }
        } else {
            echo 'Execute failed: ' . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();

} else {
    echo 'Invalid request method.';
}
?>
