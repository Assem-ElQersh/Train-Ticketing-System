<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="main-content">
        <div class="company__info">
            <h2 class="company_title">Train Ticket Details</h2>
        </div>
        <div class="ticket_details">
            <?php
            include 'config.php';

            $trainId = $_GET['trainId'];

            $sql = "SELECT * FROM trains WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $trainId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $train = $result->fetch_assoc();
                echo "<h3>Train Name: " . htmlspecialchars($train['train_name']) . "</h3>";
                echo "<p>Destination: " . htmlspecialchars($train['destination']) . "</p>";
                echo "<p>Date: " . htmlspecialchars($train['date']) . "</p>";
                echo "<p>Leaving Time: " . htmlspecialchars($train['leaving_time']) . "</p>";
                echo "<p>Expected Arrival: " . htmlspecialchars($train['expected_arrival']) . "</p>";
                echo "<p>Class: " . htmlspecialchars($train['class']) . "</p>";
                echo "<p>Train Stops: " . htmlspecialchars($train['train_stops']) . "</p>";
                echo "<p>Total Seats: " . htmlspecialchars($train['total_seats']) . "</p>";
                echo "<p>Available Seats: " . htmlspecialchars($train['available_seats']) . "</p>";
            } else {
                echo "<p>Error: Invalid Train ID " . htmlspecialchars($trainId) . "</p>";
            }

            $stmt->close();
            $conn->close();
            ?>
            <button onclick="window.print()">Print Ticket</button>
            <button onclick="redirectToHomePage()">Back to Home</button>
        </div>
    </div>

    <script>
        function redirectToHomePage() {
            window.location.href = 'reservation.html';
        }
    </script>
</body>
</html>