<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "school_sports";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

$sql = "SELECT * FROM achievements ORDER BY event_date DESC";
$result = $conn->query($sql);

$achievements = [];
while ($row = $result->fetch_assoc()) {
    $achievements[] = $row;
}

echo json_encode($achievements);
$conn->close();
?>
