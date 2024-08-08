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
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM passengers WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        // Redirect to the homepage on successful login
        header("Location: ../Passengers_webpage/reservation.html");
        exit();
    } else {
        // Show an alert for invalid login
        echo "<script>
                alert('Invalid email or password');
                window.location.href = 'passenger_login.html';
              </script>";
        exit();
    }

    $stmt->close();
}

$conn->close();
?>
