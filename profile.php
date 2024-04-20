<?php
session_start();


include('connection.php');
$id =$_GET['id'];

$sql="SELECT * FROM hospital WHERE id=$id";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/6ee00b2260.js" crossorigin="anonymous"></script>

    <style>
        *{
            margin: 0px;
            padding: 0px;
            font-family: Sabon;
        }
        .profile{
            padding: 5% 4%;
            padding-right: 36%;
        }
        #container{
            box-shadow: 0px 30px 30px black;
            /* border-radius: 15px; */
        }
        #prof{
            height: 550px;
        }
        h6{
            color:  #80b3ff;
        }
    </style>
</head>
<body>
    <div class="fluid-container" style="background-image: url('images/_doctor.jpg'); background-size: cover;background-repeat: no-repeat;height:100vh;">
    <div class="profile">
    <div class="row" style="background-color: #403c3c;" id="container" style="flote:right">
            
            <div class="col-sm-7">
                <img src="uploads/<?php echo $row['Profile']; ?>" class="img-fluid" alt="profile"id="prof">
                

            </div>
            <div class="col-sm-5 p-4" style="background-color: #403c3c; color: white; heiht:500px;">

                        <img src="images/1600w-hbl5vlZh180.webp" style="height: 80Px; float: right;" alt="logo">

                        <h3>Dr.<?php echo $row['Name'] ?></h3>
                        <h5><i class="fa-solid fa-user-graduate"></i>&nbsp;&nbsp;&nbsp;<?php echo $row['Qualification'] ?></h5><br>
                    
                        <h6><i class="fa-solid fa-user-doctor"></i>&nbsp;&nbsp;&nbsp;Speciality :-</h6>
                        <p><?php echo $row['Department'] ?></p><br>

                        <h6><i class="fa-solid fa-book-atlas"></i>&nbsp;&nbsp;&nbsp;Experience :-</h6>
                        <p><?php echo $row['Experience'] ?></p><br>
                    
                        <h6><i class="fa-solid fa-square-phone"></i>&nbsp;&nbsp;&nbsp;Contact :-</h6>
                        <p><?php echo $row['Contact'] ?></p><br>

                        <h6><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;&nbsp;Address :-</h6>
                        <p><?php echo $row['Address'] ?><br><br>
                        <button  class="btn btn-primary">
                        <a href="#" onclick="history.back(); return false;" class="p-2 fs-5 text-decoration-none" style="color:White"><i class="fas fa-arrow-left"></i> Back</a>
                        </button>
            </div>
            </div>

        </div>
    </div>
</body>
</html>