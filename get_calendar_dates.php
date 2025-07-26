<?php
include('connection.php');

$year = $_GET['year'];
$month = $_GET['month'];

$query = "SELECT date, status FROM calendar_dates WHERE YEAR(date) = ? AND MONTH(date) = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $year, $month);
$stmt->execute();
$result = $stmt->get_result();

$dates = [];
while ($row = $result->fetch_assoc()) {
    $dates[] = $row;
}

echo json_encode($dates);
?>

