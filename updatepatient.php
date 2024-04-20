<!DOCTYPE html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
</head>
<body>

<?php 

include('connection.php');
if(isset($_POST['update'])){
    $id = $_POST['id'];
      $aadhar = $_POST['aadhar'];
    extract($_POST);

//   $id = $_POST['id'];
//   $old_file = $_POST['old_file'];


//   $myfile = $_FILES["myfile"]["name"];
// $tmpmyfile=$_FILES["myfile"]["tmp_name"];
// $folder = "uploads/".$myfile;

// if( move_uploaded_file ($tmpmyfile,$folder)) {
//     $old_file = $myfile;
// }


 $sql = "UPDATE patients SET `patient`='$patient', `fname`='$fname', `mname`='$mname', `lname`='$lname', `gender`='$gender', `aadhar`='$aadhar', `address`='$address', `contact`='$contact', `dob`='$dob', `age`='$age',`height`='$height',`weight`='$weight',`blood`='$blood',`occupation`='$occupation',`indate`='$indate', `outdate`='$outdate', `roomno`='$roomno', `doctor`='$doctor',`nurse`='$nurse', `company`='$company', `insuranceid`='$insuranceid', `expirydate`='$expirydate', `holder`='$holder', `ephone`='$ephone',`relation`='$relation' WHERE id = '$id'";


$res = mysqli_query($conn, $sql);
    



 
    if ($res) {
        // Prescription details
        $tablet_names = $_POST['tablet_name'];
        $tablet_quantities = $_POST['tablet_quantity'];
        $tab_mornings = $_POST['tab_morning'];
        $tab_afternoons = $_POST['tab_afternoon'];
        $tab_evenings = $_POST['tab_evening'];
        $tab_lunches = $_POST['tab_lunch'];
        $tests = $_POST['test'];
        $medicals = $_POST['medical'];

        // Delete existing prescriptions for the patient
        $sql_delete_prescriptions = "DELETE FROM `prescription` WHERE `aadhar` = '$aadhar'";
        $result_delete_prescriptions = mysqli_query($conn, $sql_delete_prescriptions);

        // Insert new prescription records
        for ($i = 0; $i < count($tablet_names); $i++) {
            $tablet_name = mysqli_real_escape_string($conn, $tablet_names[$i]);
            $tablet_quantity = mysqli_real_escape_string($conn, $tablet_quantities[$i]);
            $tab_morning = mysqli_real_escape_string($conn, $tab_mornings[$i]);
            $tab_afternoon = mysqli_real_escape_string($conn, $tab_afternoons[$i]);
            $tab_evening = mysqli_real_escape_string($conn, $tab_evenings[$i]);
            $tab_lunch = mysqli_real_escape_string($conn, $tab_lunches[$i]);
            $test = mysqli_real_escape_string($conn, $tests[$i]);
            $medical = mysqli_real_escape_string($conn, $medicals[$i]);

            $sql_prescription_update = "INSERT INTO `prescription` (`aadhar`, `tablet_name`, `tablet_quantity`, `tab_morning`, `tab_afternoon`, `tab_evening`, `tab_lunch`, `test`, `medical`) VALUES ('$aadhar', '$tablet_name', '$tablet_quantity', '$tab_morning', '$tab_afternoon', '$tab_evening', '$tab_lunch','$test','$medical')";
            
            $result_prescription_update = mysqli_query($conn, $sql_prescription_update);
            
            if (!$result_prescription_update) {
                echo "Error inserting prescription for medicine $i: " . mysqli_error($conn);
            }
        }

        echo "Update successful";
    
    } else {
        echo "Error updating patient details: " . mysqli_error($conn);
    }
}








?>

</body>
</html>

<!-- <a href="viewprescription.php?aadhar=<?php echo $row['aadhar']; ?>" class="btn btn-primary btn-sm">View</a> -->
