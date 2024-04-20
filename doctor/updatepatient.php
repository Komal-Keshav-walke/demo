<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Patient</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
</head>
<body>

<?php

include('../connection.php');


if (isset($_POST['update'])) {
   
    $id = $_POST['id'];
    $aadhar = $_POST['aadhar'];
    
   
    extract($_POST);

   
     $sql_update_patient = "UPDATE patients SET `patient`='$patient', `fname`='$fname', `mname`='$mname', `lname`='$lname', `gender`='$gender', `aadhar`='$aadhar', `address`='$address', `contact`='$contact', `dob`='$dob', `age`='$age',`height`='$height',`weight`='$weight',`blood`='$blood',`occupation`='$occupation',`indate`='$indate', `outdate`='$outdate', `roomno`='$roomno', `doctor`='$doctor',`nurse`='$nurse', `company`='$company', `insuranceid`='$insuranceid', `expirydate`='$expirydate', `holder`='$holder', `ephone`='$ephone',`relation`='$relation'  WHERE id = '$id'"; 

    $result_update_patient = mysqli_query($conn, $sql_update_patient);

    if ($result_update_patient) {
       
        $tablet_names = $_POST['tablet_name'];
        $tablet_quantities = $_POST['tablet_quantity'];
        $tab_mornings = $_POST['tab_morning'];
        $tab_afternoons = $_POST['tab_afternoon'];
        $tab_evenings = $_POST['tab_evening'];
        $tab_lunches = $_POST['tab_lunch'];
        $tests = $_POST['test'];
        $medicals = $_POST['medical'];

        
        $test_list = implode(",", $tests);
        
        
        // $sql_delete_prescriptions = "DELETE FROM `prescription` WHERE `aadhar` = '$aadhar'";
        // mysqli_query($conn, $sql_delete_prescriptions);

       
        for ($i = 0; $i < count($tablet_names); $i++) {
           
            $tablet_name = mysqli_real_escape_string($conn, $tablet_names[$i]);
            $tablet_quantity = mysqli_real_escape_string($conn, $tablet_quantities[$i]);
            $tab_morning = mysqli_real_escape_string($conn, $tab_mornings[$i]);
            $tab_afternoon = mysqli_real_escape_string($conn, $tab_afternoons[$i]);
            $tab_evening = mysqli_real_escape_string($conn, $tab_evenings[$i]);
            $tab_lunch = mysqli_real_escape_string($conn, $tab_lunches[$i]);
            $medical = mysqli_real_escape_string($conn, $medicals[$i]);

          
            $sql_insert_prescription = "INSERT INTO `prescription` (`aadhar`, `tablet_name`, `tablet_quantity`, `tab_morning`, `tab_afternoon`, `tab_evening`, `tab_lunch`, `test`, `medical`) VALUES ('$aadhar', '$tablet_name', '$tablet_quantity', '$tab_morning', '$tab_afternoon', '$tab_evening', '$tab_lunch', '$test_list', '$medical')";
            
            $result_insert_prescription = mysqli_query($conn, $sql_insert_prescription);

            if (!$result_insert_prescription) {
                echo "Error inserting prescription for medicine $i: " . mysqli_error($conn);
            }
        }

      
        echo '<script>
        $(document).ready(function(){
            Swal.fire({
                title: "Good job!",
                text: "Data updated successfully!",
                icon: "success",
                confirmButtonText: "OK"
            }).then(function() {
                window.history.go(-2); // Redirect to view2.php after user clicks OK
            });
        });
    </script>';
    } else {
       
        echo "Error updating patient details: " . mysqli_error($conn);
    }
}
?>

</body>
</html>
