<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get data from the form
    $title = $_POST['title'];
    $link_text = $_POST['link_text'];
    $link = isset($_POST['link']) ? $_POST['link'] : '';

    // Insert into the database
    $query = "INSERT INTO notifications (title, link_text, link) VALUES ('$title', '$link_text', '$link')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Notification added successfully.'); 
                window.location.href = 'adminPanel.php'; 
              </script>";
    } else {
        $error = mysqli_error($conn);
        echo "<script>
                alert('Error: $error');
              </script>";
    }
}
?>
