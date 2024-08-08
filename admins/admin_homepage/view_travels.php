<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travels_and_trains";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to calculate percentage of seats filled
function calculateFillPercentage($totalSeats, $availableSeats) {
    if ($totalSeats > 0) {
        return (($totalSeats - $availableSeats) / $totalSeats) * 100;
    } else {
        return 0;
    }
}

// Current date and time
$currentDateTime = new DateTime();

// SQL query to fetch all trains
$sql = "SELECT * FROM trains";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $train_id = $row["train_id"];
        $train_name = $row["train_name"];
        $destination = $row["destination"];
        $date = $row["date"];
        $leaving_time = $row["leaving_time"];
        $expected_arrival = $row["expected_arrival"];
        $class = $row["class"];
        $train_stops = $row["train_stops"];
        $total_seats = $row["total_seats"];
        $available_seats = $row["available_seats"];

        // Combine date and time into a single DateTime object
        $leavingDateTime = new DateTime("$date $leaving_time");
        $expectedArrivalDateTime = new DateTime("$date $expected_arrival");

        // Determine travel status
        if ($leavingDateTime < $currentDateTime) {
            $status = "past";
        } elseif ($available_seats == 0) {
            $status = "future-full";
        } elseif ($available_seats <= 5) {
            $status = "future-about-to-full";
        } else {
            $status = "future-not-about-to-full";
        }

        // Display each train entry with status class
        echo "<div class='travel-entry $status'>";
        echo "<h3>$train_name</h3>";
        echo "<p>Date: $date</p>";
        echo "<p>Leaving Time: $leaving_time</p>";
        echo "<p>Expected Arrival: $expected_arrival</p>";
        echo "<p>Destination: $destination</p>";
        echo "<p>Total Seats: $total_seats</p>";
        echo "<p>Available Seats: $available_seats</p>";
        echo "<p>Class: $class</p>";
        echo "<p>Train Stops: $train_stops</p>";
        
        // Calculate fill percentage
        $fillPercentage = calculateFillPercentage($total_seats, $available_seats);
        $fillPercentage = number_format($fillPercentage, 2); // Format to 2 decimal places
        echo "<div class='fill-percentage' data-percentage='$fillPercentage'>$fillPercentage%</div>";

        echo "</div>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
