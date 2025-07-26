<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminPanel.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Admin Panel</title>
</head>
<body>
    <div class="topnav">
        <div class="Logo">
            <div class="l1">
                <i class="fa-solid fa-gopuram fa-2x"></i>
            </div>
            <div class="name"><a href="home.php">Sri Kapileswara Swamy Vari Temple</a></div>
        </div>
        <div class="Logo2">
            <div class="l2">
                <i class="fa-solid fa-drum fa-2x"></i>
            </div>
            <div class="mantra">Om Namo Shivaya</div>
        </div>
    </div>
  <div class="admin-container">
    <div class="sidebar">
    <ul>
    <li onclick="showSection('devotees')">Devotee Details</li>
    <li onclick="showSection('darshan')">Darshan</li>
    <li onclick="showSection('accommodation')">Accommodation</li>
    <li onclick="showSection('seva')">Seva</li>
    <li onclick="showSection('feedback')">Feedback</li>
    <li onclick="showSection('notifications')">Notifications</li>
</ul>

    </div>
    
    <div id="devotees" class="section" style="display: none;">
    <h4>Devotee Details</h4>
    <?php
include('connection.php');

$query = "SELECT id, username, phoneno,email,security_question, security_answer FROM users";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
} else {
    echo '<table border="1" cellpadding="10" cellspacing="0">';
    echo '<tr><th>ID</th><th>Username</th><th>Phone Number</th><th>Email</th><th>Security Question</th><th>Security Answer</th></tr>'; // Table headers
    
    // Fetch and display rows
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['username'] . '</td>';
        echo '<td>' . $row['phoneno'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['security_question'] . '</td>';
        echo '<td>' . $row['security_answer'] . '</td>';
        echo '</tr>';
    }
    
    echo '</table>';
}
?>
</div>

<div id="darshan" class="section" style="display: none;">
<h4>Details of Users Who Have Booked Darshan</h4>
    <?php
include('connection.php');

$query = "SELECT user_id, username, phone, gender,photo_id,photo_id_no, selectedDate, selectedTime FROM darshan_booking";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
} else {
    echo '<table border="1" cellpadding="10" cellspacing="0">';
    echo '<tr><th>ID</th><th>Name</th><th>Phone Number</th><th>Gender</th><th>Type of Photo Id</th><th>Photo Id No</th><th> Selected Date</th><th>Selected Time-Slot</th></tr>'; // Table headers
    
    // Fetch and display rows
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['user_id'] . '</td>';
        echo '<td>' . $row['username'] . '</td>';
        echo '<td>' . $row['phone'] . '</td>';
        echo '<td>' . $row['gender'] . '</td>';
        echo '<td>' . $row['photo_id'] . '</td>';
        echo '<td>' . $row['photo_id_no'] . '</td>';
        echo '<td>' . $row['selectedDate'] . '</td>';
        echo '<td>' . $row['selectedTime'] . '</td>';
        echo '</tr>';
    }
    
    echo '</table>';
}
?>
<br>
<h4> Update Calendar </h4>
<form id="updateCalendarForm" method="POST" action="update_calendar.php">
    <label for="date">Select Date:</label>
    <input type="date" id="date" name="date" required><br><br>

    <label for="status">Status:</label>
    <input type="radio" id="available" name="status" value="available" required>
    <label for="available">Available</label>
    <input type="radio" id="booked" name="status" value="booked">
    <label for="booked">Booked</label>
    <input type="radio" id="not_released" name="status" value="not_released">
    <label for="not_released">Not Released</label><br><br>

    <button type="submit" class="update">Update</button>
</form>
</div>

<div id="accommodation" class="section" style="display: none;">
      <h4>Details of Users Who Have Booked Accommodation</h4> 
      <?php
include('connection.php');

$query = "SELECT user_id, username, phone, email,photo_id,photo_id_no,room_type,no_of_persons, selectedDate, selectedTime FROM hotel_booking";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
} else {
    echo '<table border="1" cellpadding="10" cellspacing="0">';
    echo '<tr><th>ID</th><th>Name</th><th>Phone Number</th><th>Email</th><th>Type of Photo Id</th><th>Photo Id No</th><th>Type of Room Selected</th><th>No. of Persons</th><th> Selected Date</th><th>Selected Time-Slot</th></tr>'; // Table headers
    
    // Fetch and display rows
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['user_id'] . '</td>';
        echo '<td>' . $row['username'] . '</td>';
        echo '<td>' . $row['phone'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['photo_id'] . '</td>';
        echo '<td>' . $row['photo_id_no'] . '</td>';
        echo '<td>' . $row['room_type'] . '</td>';
        echo '<td>' . $row['no_of_persons'] . '</td>';
        echo '<td>' . $row['selectedDate'] . '</td>';
        echo '<td>' . $row['selectedTime'] . '</td>';
        echo '</tr>';
    }
    
    echo '</table>';
}
?>
<br>
<h4> Update Calendar </h4>
<form id="updateCalendarForm" method="POST" action="update_calendar.php">
    <label for="date">Select Date:</label>
    <input type="date" id="date" name="date" required><br><br>

    <label for="status">Status:</label>
    <input type="radio" id="available" name="status" value="available" required>
    <label for="available">Available</label>
    <input type="radio" id="booked" name="status" value="booked">
    <label for="booked">Booked</label>
    <input type="radio" id="not_released" name="status" value="not_released">
    <label for="not_released">Not Released</label><br><br>

    <button type="submit" class="update">Update</button>
</form> 
      </div>
    
      <div id="seva" class="section" style="display: none;">
  <h4>Details of Users Who Have Booked Seva</h4>
  <?php
  include('connection.php');

  $query = "SELECT user_id, username, phone, email, photo_id, photo_id_no, sevaName, selectedTime, selectedDate FROM seva_bookings";
  $result = mysqli_query($conn, $query);

  if (!$result) {
      die("Query failed: " . mysqli_error($conn));
  } else {
      echo '<table border="1" cellpadding="10" cellspacing="0">';
      echo '<tr><th>ID</th><th>Name</th><th>Phone Number</th><th>Email</th><th>Type of Photo Id</th><th>Photo Id No</th><th>Type of Seva Selected</th><th>Time Slot of Selected Seva</th><th> Selected Date</th></tr>'; // Table headers
      
      // Fetch and display rows
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['user_id'] . '</td>';
        echo '<td>' . $row['username'] . '</td>';
        echo '<td>' . $row['phone'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['photo_id'] . '</td>';
        echo '<td>' . $row['photo_id_no'] . '</td>';
        echo '<td>' . $row['sevaName'] . '</td>';
        echo '<td>' . $row['selectedTime'] . '</td>';
        echo '<td>' . $row['selectedDate'] . '</td>';
        echo '</tr>';
      }
      
      echo '</table>';
  }
  ?>
</div>

<div id="feedback" class="section" style="display: none;">
<h4>Feedback from Users</h4>
  <?php
  include('connection.php');

  $query = "SELECT user_id, username, phone, email, message FROM feedback_form";
  $result = mysqli_query($conn, $query);

  if (!$result) {
      die("Query failed: " . mysqli_error($conn));
  } else {
      echo '<table border="1" cellpadding="10" cellspacing="0">';
      echo '<tr><th>ID</th><th>Name</th><th>Phone Number</th><th>Email</th><th>Message</th></tr>'; // Table headers
      
      // Fetch and display rows
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['user_id'] . '</td>';
        echo '<td>' . $row['username'] . '</td>';
        echo '<td>' . $row['phone'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['message'] . '</td>';
        echo '</tr>';
      }
      
      echo '</table>';
  }
  ?>
</div>

<div id="notifications" class="section" style="display: none;">  
<?php
include('connection.php');

// Fetch notifications from the database
$query = "SELECT id, title, link, link_text FROM notifications";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<div class="notification-table">
    <div class="table-header">
        <h3>Manage Notifications</h3>
        <p>Get the latest updates here</p>
    </div>

    <!-- Display Notifications in Table -->
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Title</th>
                <th>Link Text</th>
                <th>Link</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['link_text']; ?></td>
                    <td>
                        <?php if ($row['link']) { ?>
                            <a href="<?php echo $row['link']; ?>" target="_blank"><?php echo $row['link']; ?></a>
                        <?php } ?>
                    </td>
                    <td>
                        <!-- Edit Notification Form -->
                        <form method="post" action="edit_notification.php" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="text" name="title" value="<?php echo $row['title']; ?>" required>
                            <input type="text" name="link_text" value="<?php echo $row['link_text']; ?>" required>
                            <input type="text" name="link" value="<?php echo $row['link']; ?>"><br>
                            <button type="submit" class="update">Update</button>
                        </form>

                        <!-- Delete Button -->
                        <form method="post" action="delete_notification.php" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="delete" onclick="return confirm('Are you sure you want to delete this notification?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- Add New Notification -->
<div class="add-notification">
    <h4>Add New Notification</h4>
    <form method="post" action="add_notification.php">
        <input type="text" name="title" placeholder="Notification Title" required>
        <input type="text" name="link_text" placeholder="Link Text" required>
        <input type="text" name="link" placeholder="Link (optional)">
        <button type="submit">Add Notification</button>
    </form>
</div>
</div>
    </div>

  <script src="adminPanel.js"></script>
</body>
</html>
