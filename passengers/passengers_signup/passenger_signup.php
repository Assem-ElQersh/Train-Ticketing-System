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
    $name = $_POST['name'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $location = $_POST['location'];

    if ($password !== $password_confirm) {
        echo "Passwords do not match";
        exit();
    }

    $password_hashed = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO passengers (email, name, password, location) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $email, $name, $password_hashed, $location);

    if ($stmt->execute()) {
      echo "<script>alert('New passenger registered successfully');</script>";
      header('Location: passenger_login.html');
      exit(); // Always call exit after header redirection to prevent further script execution
  } else {
      echo "<script>alert('Error');</script>";
      header('Location: passenger_signup.html');
      exit(); // Always call exit after header redirection to prevent further script execution
  }

    $stmt->close();
}

$conn->close();
?>
