<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "school_sports";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$student_name = $_POST['student_name'];
$class = $_POST['class'];
$achievement = $_POST['achievement'];
$event_date = $_POST['event_date'];
$photo_url = $_POST['photo_url'];

$sql = "INSERT INTO achievements (student_name, class, achievement, event_date, photo_url) 
        VALUES ('$student_name', '$class', '$achievement', '$event_date', '$photo_url')";

if ($conn->query($sql) === TRUE) {
    echo "Úspěch byl přidán!";
    echo "<br><a href='index.html'>Zpět</a>";
} else {
    echo "Chyba: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>