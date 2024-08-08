<?php

include 'config.php';

// Get parameters
$destination = $_GET['destination'];
$date = $_GET['date'];

// Debugging: print received parameters
error_log("Received destination: $destination, date: $date");

try {
    // Prepare the SQL query to fetch trains based on destination and date
    $sql = "SELECT * FROM trains WHERE destination = ? AND date = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        throw new Exception("Failed to prepare statement: " . $conn->error);
    }

    // Bind the parameters
    $stmt->bind_param("ss", $destination, $date);

    // Execute statement
    if (!$stmt->execute()) {
        throw new Exception("Failed to execute statement: " . $stmt->error);
    }

    // Get result
    $result = $stmt->get_result();

    // Fetch trains
    $trains = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $trains[] = $row;
        }
    }

    // Return JSON response
    echo json_encode($trains);

    // Close statement and connection
    $stmt->close();
    $conn->close();
} catch (Exception $e) {
    // Handle exception
    error_log("Error: " . $e->getMessage());
    echo json_encode(["error" => $e->getMessage()]);
}
?>
