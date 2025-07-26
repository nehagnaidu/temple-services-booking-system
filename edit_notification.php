<?php
include('connection.php');

$id = $_POST['id'];
$title = $_POST['title'];
$link_text = $_POST['link_text'];
$link = $_POST['link'];

$query = "UPDATE notifications SET title='$title', link_text='$link_text', link='$link' WHERE id=$id";
if (mysqli_query($conn, $query)) {
    echo "<script>
            alert('Notification updated successfully.'); 
             window.location.href = 'adminPanel.php'; 
          </script>";
} else {
    $error = mysqli_error($conn);
    echo "<script>
            alert('Error: $error');
          </script>";
}
?>