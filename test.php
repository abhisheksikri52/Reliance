
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "sample_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $empid = $_POST['empid'];
    $phone = $_POST['phone'];
    $room = $_POST['room'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("INSERT INTO users (name, email, phone, room_number, status) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $empid, $phone, $room, $status);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>