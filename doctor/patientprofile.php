<?php
session_start();
 //$id = $_SESSION['id'];
include('../connection.php');
$id =$_GET['id'];
//$id = $_SESSION['id'];


$sql = "SELECT * FROM `patients` WHERE id = '$id'";
$res = mysqli_query($conn, $sql);
$cn = 1;
$row = mysqli_fetch_assoc($res);
// print_r(empty($res)).die;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/6ee00b2260.js" crossorigin="anonymous"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Sabon, serif;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 900px;
            margin: 50px auto;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .profile {
            display: flex;
            align-items: center;
        }
        .profile-image {
            flex: 0 0 40%;
        }
        .profile-image img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
        .profile-details {
            flex: 2;
            padding: 30px;
        }
        .profile-details h3 {
            color: #007bff;
            margin-bottom: 15px;
        }
        .profile-details p {
            margin-bottom: 10px;
        }
        .edit-delete-icons {
            display: flex;
            justify-content: flex-end;
        }
        .edit-delete-icons a {
            margin-left: 10px;
            color: #000;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile">
            <div class="profile-image">
                <img src="your_image_url.jpg" alt="Student Image">
            </div>
            <div class="profile-details">


            



                <h3>Patient Profile</h3>
                <p><strong>Patient Type:</strong> <?php echo $row['patient']; ?></p>
                <p><strong>First Name:</strong> <?php echo $row['fname']; ?></p>
                <p><strong>Middle Name:</strong> <?php echo $row['mname']; ?></p>
                <p><strong>Last Name:</strong> <?php echo $row['lname']; ?></p>
                <p><strong>Gender:</strong> <?php echo $row['gender']; ?></p>
                <p><strong>Aadhar:</strong> <?php echo $row['aadhar']; ?></p>
                <p><strong>Address:</strong> <?php echo $row['address']; ?></p>
                <p><strong>Contact:</strong> <?php echo $row['contact']; ?></p>

                <p><strong>DOB:</strong> <?php echo $row['dob']; ?></p>
                <p><strong>Age:</strong> <?php echo $row['age']; ?></p>
                <p><strong>Height:</strong> <?php echo $row['height']; ?></p>
                <p><strong>weight:</strong> <?php echo $row['weight']; ?></p>
                <p><strong>blood Group:</strong> <?php echo $row['blood']; ?></p>
                <p><strong>Occupation:</strong> <?php echo $row['occupation']; ?></p>
                <p><strong>medical History:</strong> <?php echo $row['medical']; ?></p>
                <p><strong>Indate:</strong> <?php echo $row['indate']; ?></p>
                <p><strong>Outdate:</strong> <?php echo $row['outdate']; ?></p>
                <p><strong>Room No:</strong> <?php echo $row['roomno']; ?></p>
                <p><strong>Dr. Assigned:</strong> <?php echo $row['doctor']; ?></p>
                <p><strong>Nurs Assigned:</strong> <?php echo $row['nurse']; ?></p>
                <p><strong>insurance Company:</strong> <?php echo $row['company']; ?></p>
                <p><strong>insurance ID:</strong> <?php echo $row['insuranceid']; ?></p>
                <p><strong>Expiry Date:</strong> <?php echo $row['expirydate']; ?></p>
                <p><strong>Holder Name:</strong> <?php echo $row['holder']; ?></p>
                <p><strong>Emergency Contact:</strong> <?php echo $row['ephone']; ?></p>
                <p><strong>Relation:</strong> <?php echo $row['relation']; ?></p>
              
                <div class="edit-delete-icons">
                    <a href="editpatient.php?id=<?php echo $row['id']; ?>" class="fa fa-pencil" style="font-size: 20px;"></a>
                    <a href="deletepatient.php?id=<?php echo $row['id']; ?>" class="fa fa-trash" style="font-size: 20px;"></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>






                