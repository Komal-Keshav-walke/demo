<?php
// Include database connection
include('../connection.php');

// Check if aadhar is provided via GET request
if (isset($_GET['aadhar'])) {
    // Sanitize the aadhar input and assign it to $aadhar variable
    $aadhar = mysqli_real_escape_string($conn, $_GET['aadhar']);

    // Query to get patient's prescription history for dates before today
    $sql = "SELECT date, tablet_name, quantity, morning_dosage, afternoon_dosage, evening_dosage, lunch_dosage, test, medical, notes
            FROM prescription
            WHERE aadhar = '$aadhar'
            AND date < CURDATE()  -- Only include records with dates before today
            ORDER BY date DESC";
    $result = mysqli_query($conn, $sql);

    // Start HTML output
    echo '<!DOCTYPE html>';
    echo '<html lang="en">';
    echo '<head>';
    echo '    <!-- Meta tags -->';
    echo '    <meta charset="UTF-8">';
    echo '    <meta http-equiv="X-UA-Compatible" content="IE=edge">';
    echo '    <meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '    <!-- Bootstrap CSS -->';
    echo '    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">';
    echo '    <title>Prescription View</title>';
    echo '</head>';
    echo '<body>';
    echo '    <div class="container mt-4">';

    // Check if the query returned any results
    if ($result && mysqli_num_rows($result) > 0) {
        // Display the prescription history with a heading
        echo "<h2 class='mb-4'>Prescription History for Aadhar: $aadhar</h2>";

        // Create a table to display each prescription record
        echo '<table class="table table-bordered">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Date</th>';
        echo '<th>Tablet Name</th>';
        echo '<th>Quantity</th>';
        echo '<th>Morning</th>';
        echo '<th>Afternoon</th>';
        echo '<th>Evening</th>';
        echo '<th>Lunch</th>';
        echo '<th>Test</th>';
        echo '<th>Medical</th>';
        echo '<th>Notes</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Loop through each prescription record and display it as a table row
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['date']) . '</td>';
            echo '<td>' . htmlspecialchars($row['tablet_name']) . '</td>';
            echo '<td>' . htmlspecialchars($row['quantity']) . '</td>';
            echo '<td>' . htmlspecialchars($row['morning_dosage']) . '</td>';
            echo '<td>' . htmlspecialchars($row['afternoon_dosage']) . '</td>';
            echo '<td>' . htmlspecialchars($row['evening_dosage']) . '</td>';
            echo '<td>' . htmlspecialchars($row['lunch_dosage']) . '</td>';
            echo '<td>' . htmlspecialchars($row['test']) . '</td>';
            echo '<td>' . htmlspecialchars($row['medical']) . '</td>';
            echo '<td>' . htmlspecialchars($row['notes']) . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        // No prescription history found for the given Aadhar number
        echo "<p>No prescription history found for the provided Aadhar number.</p>";
    }

    echo '    </div>';
    echo '    <!-- Bootstrap JS and dependencies -->';
    echo '    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>';
    echo '    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>';
    echo '    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>';
    echo '</body>';
    echo '</html>';

    // Close the database connection
    mysqli_close($conn);
} else {
    // If no Aadhar number is provided in the GET request
    echo "<p>Please provide a valid Aadhar number.</p>";
}
?>
