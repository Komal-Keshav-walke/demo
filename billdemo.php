<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Billing System</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Hospital Billing System</h2>
        <form method="POST">
            <div class="form-group">
                <label for="aadhar">Aadhar Card Number:</label>
                <input type="text" class="form-control" id="aadhar" name="aadhar">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="reportsCheckbox" name="reportsCheckbox">
                <label class="form-check-label" for="reportsCheckbox">Include Reports</label>
            </div>
            <button type="button" class="btn btn-primary mt-3" id="addBillBtn">Add Bill</button>
            <div id="billDetails"></div> <!-- Container to hold dynamically added bill details -->
            <button type="submit" class="btn btn-primary mt-3" name="submit">Submit</button>
        </form>
        <script>
            document.getElementById("addBillBtn").addEventListener("click", function() {
                // Create HTML elements for bill description and amount input fields
                var billSection = document.createElement("div");
                billSection.classList.add("bill-section");

                var billDescriptionInput = document.createElement("input");
                billDescriptionInput.setAttribute("type", "text");
                billDescriptionInput.setAttribute("class", "form-control mt-3 bill-description");
                billDescriptionInput.setAttribute("name", "billDescriptions[]");
                billDescriptionInput.setAttribute("placeholder", "Bill Description");
                
                var billAmountInput = document.createElement("input");
                billAmountInput.setAttribute("type", "text");
                billAmountInput.setAttribute("class", "form-control mt-3 bill-amount");
                billAmountInput.setAttribute("name", "billAmounts[]");
                billAmountInput.setAttribute("placeholder", "Bill Amount");

                // Append the input fields to the billDetails container
                billSection.appendChild(billDescriptionInput);
                billSection.appendChild(billAmountInput);
                document.getElementById("billDetails").appendChild(billSection);
            });
        </script>

<?php
// Database connection parameters
include('../connection.php');

// Function to sanitize input
function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Function to validate numeric input
function isValidNumber($number) {
    return is_numeric($number) && $number >= 0;
}

// Assuming you have submitted Aadhar Card number through a form
if(isset($_POST['submit']) && isset($_POST['aadhar'])) {
    $aadhar = sanitizeInput($_POST['aadhar']);

    // Fetching patient data from the database
    $sql = "SELECT fname, address, gender, indate, outdate FROM patients WHERE aadhar = '$aadhar'";
    $result = $conn->query($sql);

    if ($result === false) {
        // Display SQL error, if any
        echo "<p>Debug: SQL Error: " . $conn->error . "</p>";
    } elseif ($result->num_rows > 0) {
        // Output patient profile information
        $row = $result->fetch_assoc();
        echo "<h3>Patient Profile</h3>";
        echo "<p>Name: " . $row["fname"] . "</p>";
        echo "<p>Address: " . $row["address"] . "</p>";
        echo "<p>Gender: " . $row["gender"] . "</p>";

        // Calculate the number of days
        $indate = new DateTime($row["indate"]);
        $outdate = new DateTime($row["outdate"]);
        $interval = $indate->diff($outdate);
        $days = $interval->days;

        // Display number of days
        echo "<p>Number of days: " . $days . "</p>";

        // Calculate charges and display breakdown
        $dayCharges = $days * 500; // Assuming 500 Rs per day charges
        echo "<p>Day Charges (Rs 500 per day): Rs " . $dayCharges . "</p>";
        
        $doctorFee = 1000; // Example doctor's fee
        echo "<p>Doctor's Fee: Rs " . $doctorFee . "</p>";
        
        $nurseFee = 500; // Example nurse's fee
        echo "<p>Nurse's Fee: Rs " . $nurseFee . "</p>";
        
        $reportsFee = isset($_POST['reportsCheckbox']) ? 200 : 0; // Assuming 200 Rs for reports if checked
        echo "<p>Reports Fee: Rs " . $reportsFee . "</p>";

        // Additional bill charges
        $additionalBillCharges = 0;
        if(isset($_POST['billAmounts']) && isset($_POST['billDescriptions'])) {
            $billAmounts = $_POST['billAmounts'];
            $billDescriptions = $_POST['billDescriptions'];
            foreach($billAmounts as $index => $amount) {
                $amount = sanitizeInput($amount);
                if(isValidNumber($amount)) {
                    $additionalBillCharges += floatval($amount);
                    // Display bill details
                    echo "<p>Additional Bill: " . sanitizeInput($billDescriptions[$index]) . " - Rs " . $amount . "</p>";
                }
            }
        }

        // Calculate total charges
        $totalCharges = $dayCharges + $doctorFee + $nurseFee + $reportsFee + $additionalBillCharges;
        echo "<p><strong>Total Charges: Rs " . $totalCharges . "</strong></p>";
    } else {
        echo "<p>No patient found with the provided Aadhar Card number.</p>";
    }
}

$conn->close();
?>


    </div>
</body>
</html>
