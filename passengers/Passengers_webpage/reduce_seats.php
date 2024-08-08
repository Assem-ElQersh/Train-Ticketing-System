<?php
include 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $trainId = $data['trainId'];

    error_log("Received trainId: $trainId");

    try {
        $sql = "UPDATE trains SET available_seats = available_seats - 1 WHERE id = ? AND available_seats > 0";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            throw new Exception("Failed to prepare statement: " . $conn->error);
        }

        $stmt->bind_param("i", $trainId);

        if (!$stmt->execute()) {
            throw new Exception("Failed to execute statement: " . $stmt->error);
        }

        if ($stmt->affected_rows === 0) {
            throw new Exception("No seats available or invalid train ID");
        }

        echo json_encode(array('message' => 'Seats reduced successfully'));

        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        error_log("Error: " . $e->getMessage());
        echo json_encode(array('error' => $e->getMessage()));
    }
} else {
    http_response_code(405);
    echo json_encode(array('error' => 'Method not allowed'));
}
?>
