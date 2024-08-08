<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travels_and_trains";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $train_id = $_POST['train_id'];
    $train_name = $_POST['train_name'];
    $destination = $_POST['destination'];
    $date = $_POST['date'];
    $leaving_time = $_POST['leaving_time'];
    $expected_arrival = $_POST['expected_arrival'];
    $class = $_POST['class'];
    $train_stops = $_POST['train_stops'];
    $total_seats = $_POST['total_seats'];
    $available_seats = $_POST['available_seats'];

    $sql = "INSERT INTO trains (train_id, train_name, destination, date, leaving_time, expected_arrival, class, train_stops, total_seats, available_seats)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssssssii", $train_id, $train_name, $destination, $date,  $leaving_time, $expected_arrival, $class, $train_stops, $total_seats, $available_seats);

    if ($stmt->execute()) {
        header("Location: ../admin_home.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
