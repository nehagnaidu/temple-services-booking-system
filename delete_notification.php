<?php
include('connection.php');

$id = $_POST['id'];

$query = "DELETE FROM notifications WHERE id=$id";
$query = "UPDATE notifications SET title='$title', link_text='$link_text', link='$link' WHERE id=$id";
if (mysqli_query($conn, $query)) {
    echo "<script>
            alert('Notification deleted successfully.');
            window.location.href = 'adminPanel.php'; 
          </script>";
} else {
    $error = mysqli_error($conn);
    echo "<script>
            alert('Error: $error');
          </script>";
}
?>
