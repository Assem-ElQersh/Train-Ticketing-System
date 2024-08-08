<?php
include 'config.php';

header('Content-Type: application/json');

$trainId = $_GET['trainId'];

$sql = "SELECT * FROM trains WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $trainId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $train = $result->fetch_assoc();
    echo json_encode($train);
} else {
    echo json_encode(array('error' => 'Train not found'));
}

$stmt->close();
$conn->close();
?>
