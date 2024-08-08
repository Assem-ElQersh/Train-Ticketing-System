<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travels_and_trains";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["upload"])) {
    $fileName = $_FILES["file"]["tmp_name"];

    if ($_FILES["file"]["size"] > 0) {
        $file = fopen($fileName, "r");

        // Skip the first row if it contains headers
        fgetcsv($file);

        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $sql = "INSERT INTO trains (train_id, train_name, destination, date, leaving_time, expected_arrival, class, train_stops, total_seats, available_seats)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("isssssssii", $column[0], $column[1], $column[2], $column[3], $column[4], $column[5], $column[6], $column[7], $column[8], $column[9]);

            if (!$stmt->execute()) {
                echo "Error: " . $stmt->error . "<br>";
            }
        }
        fclose($file);
        header("Location: ../admin_home.html");
        exit();
    } else {
        echo "Invalid file size.";
    }
}

$conn->close();
?>
