<?php
include 'config.php';

$sql = "SELECT DISTINCT destination FROM trains";
$result = $conn->query($sql);

$destinations = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $destinations[] = $row['destination'];
    }
}
echo json_encode($destinations);

$conn->close();
?>
