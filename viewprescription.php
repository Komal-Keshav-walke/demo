<?php
// Include database connection
include('../connection.php');

// Initialize variables
$prescriptions = [];
$patient_info = [];
$aadhar = $_GET['aadhar'] ?? null;

if ($aadhar) {
    // Sanitize the Aadhar input
    $aadhar = mysqli_real_escape_string($conn, $aadhar);

    // Query to fetch patient and prescription details
  

$sql = "SELECT pr.tablet_name, pr.tablet_quantity, pr.tab_morning, pr.tab_afternoon, pr.tab_evening, pr.tab_lunch, pr.test, pr.medical, pr.created_at, pat.fname, pat.age, pat.gender
FROM prescription AS pr
JOIN patients AS pat ON pr.aadhar = pat.aadhar
WHERE pr.aadhar = '$aadhar'";


    $result = mysqli_query($conn, $sql);

    // Fetch results
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $prescriptions[] = $row;
        }
        // Assume patient info is the same across prescriptions
        $patient_info = [
            'name' => $prescriptions[0]['fname'],
            'age' => $prescriptions[0]['age'],
            'gender' => $prescriptions[0]['gender'],
        ];
    }
}

// Close the database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Prescription View</title>
</head>

<body>
    <div class="container mt-4">
        <?php if ($aadhar && !empty($prescriptions)): ?>
            <!-- Display patient information -->
            <div class="card mb-4">
                <div class="card-header">Patient Information</div>
                <div class="card-body">
                    <p><strong>Name:</strong> <?= htmlspecialchars($patient_info['name']) ?></p>
                    <p><strong>Age:</strong> <?= htmlspecialchars($patient_info['age']) ?></p>
                    <p><strong>Gender:</strong> <?= htmlspecialchars($patient_info['gender']) ?></p>
                </div>
            </div>

            <!-- Display prescription details -->
            <h2 class='mb-4'>Prescription Details for Aadhar: <?= htmlspecialchars($aadhar) ?></h2>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tablet Name</th>
                        <th>Quantity</th>
                        <th>Morning</th>
                        <th>Afternoon</th>
                        <th>Evening</th>
                        <th>Lunch</th>
                        <th>Test</th>
                        <th>Medical</th>
                        <th>Date Issued</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($prescriptions as $prescription): ?>
                        <tr>
                            <td><?= htmlspecialchars($prescription['tablet_name']) ?></td>
                            <td><?= htmlspecialchars($prescription['tablet_quantity']) ?></td>
                            <td><?= htmlspecialchars($prescription['tab_morning']) ?></td>
                            <td><?= htmlspecialchars($prescription['tab_afternoon']) ?></td>
                            <td><?= htmlspecialchars($prescription['tab_evening']) ?></td>
                            <td><?= htmlspecialchars($prescription['tab_lunch']) ?></td>
                            <td><?= htmlspecialchars($prescription['test']) ?></td>
                            <td><?= htmlspecialchars($prescription['medical']) ?></td>
                            <td><?= htmlspecialchars($prescription['created_at']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No prescription found for the provided Aadhar number.</p>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
            