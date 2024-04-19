<?php
session_start();
 //$id = $_SESSION['id'];
include('connection.php');
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

    
</head>
<body>



<section style="background-color: #eee;">
  <div class="container py-5">


    <!-- <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4" style="background-color:purple">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"> <a href="doctordashboard.php" class="btn btn-primary">Home</a></li>
          
           <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>-
      </div>
    </div> -->

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4"style="border-radius:30px; ">
          <div class="card-body text-center" >
            <img src="https://icon-library.com/images/patient-icon-png/patient-icon-png-25.jpg" alt="avatar"
              class="rounded-circle img-fluid" style="width:125px; border:3px solid purple">
            <h5 class="my-3">Patient Name</h5>
            <p class="text-muted mb-1"><b>Name:</b> <?php echo $row['fname']; ?></p>
            <p class="text-muted mb-4"><b>Address:</b><?php echo $row['address']; ?></p>
            <div class="d-flex justify-content-center mb-2">
              <button type="button" class="btn btn-primary">Reports</button>
              <a href="#" onclick="history.back(); return false;">
              <button href="" type="button" class="btn btn-outline-primary ms-1">Back</button></a>
            </div>
          </div>
        </div>

        <div class="card mb-4 mb-lg-0" >
          <div class="card-body p-0">
          <img src="https://cdn.dribbble.com/users/259723/screenshots/2851172/medical_app.gif" height="320px" width="415px">
          
         
            <!-- <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0">https://mdbootstrap.com</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                <p class="mb-0">mdbootstrap</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                <p class="mb-0">@mdbootstrap</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                <p class="mb-0">mdbootstrap</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                <p class="mb-0">mdbootstrap</p>
              </li>
            </ul> -->
          </div>
        </div>
      </div>

      <div class="col-lg-8">
    <div class="card mb-4" style="border-radius:30px;">
        <div class="card-body">
            <div class="row">
               
                    <p class="mb-0"><b>Patient Type:</b>&nbsp;&nbsp;<?php echo $row['patient']; ?></p><br><br><hr>
                
                
                <div class="col-sm-4">
                    <p class="mb-0"><b> Name:</b>&nbsp;&nbsp;<?php echo $row['fname']; ?></p>
                </div><br><br>
                
                <!-- <div class="col-sm-4">
                    <p class="mb-0"><b>Middle Name:</b>&nbsp;&nbsp;<?php echo $row['mname']; ?></p>
                </div>
                
                <div class="col-sm-4">
                    <p class="mb-0"><b>Last Name:</b>&nbsp;&nbsp;<?php echo $row['lname']; ?></p> -->
                <!-- </div><br><br><hr> -->

                <div class="col-sm-4">
                    <p class="mb-0"><b>Gender:</b>&nbsp;&nbsp;<?php echo $row['gender']; ?></p>
                </div>

                <div class="col-sm-4">
                    <p class="mb-0"><b>aadhar</b>&nbsp;&nbsp;<?php echo $row['aadhar']; ?></p>
                </div>

                <div class="col-sm-4">
                    <p class="mb-0"><b>Address</b>&nbsp;&nbsp;<?php echo $row['address']; ?></p>
                </div><br><br><hr>

                <div class="col-sm-4">
                    <p class="mb-0"><b>Contact:</b>&nbsp;&nbsp;<?php echo $row['contact']; ?></p>
                </div>

                <div class="col-sm-4">
                    <p class="mb-0"><b>DOB:</b>&nbsp;&nbsp;<?php echo $row['dob']; ?></p>
                </div>

                <div class="col-sm-4">
                    <p class="mb-0"><b>Age:</b>&nbsp;&nbsp;<?php echo $row['age']; ?></p>
                </div><br><br><hr>

                <div class="col-sm-4">
                    <p class="mb-0"><b>Height:</b>&nbsp;&nbsp;<?php echo $row['height']; ?></p>
                </div>

                <div class="col-sm-4">
                    <p class="mb-0"><b>Weight:</b>&nbsp;&nbsp;<?php echo $row['weight']; ?></p>
                </div>

                <div class="col-sm-4">
                    <p class="mb-0"><b>Blood:</b>&nbsp;&nbsp;<?php echo $row['blood']; ?></p>
                </div><br><br><hr>

                <div class="col-sm-4">
                    <p class="mb-0"><b>Occupation:</b>&nbsp;&nbsp;<?php echo $row['occupation']; ?></p>
                </div>

                <div class="col-sm-4">
                    <p class="mb-0"><b>Medical History:</b>&nbsp;&nbsp;<?php echo $row['medical']; ?></p>
                </div>

                <div class="col-sm-4">
                    <p class="mb-0"><b>Indate:</b>&nbsp;&nbsp;<?php echo $row['indate']; ?></p>
                </div><br><br><hr>

                <div class="col-sm-4">
                    <p class="mb-0"><b>Outdate:</b>&nbsp;&nbsp;<?php echo $row['outdate']; ?></p>
                </div>

                <div class="col-sm-4">
                    <p class="mb-0"><b>Room No:</b>&nbsp;&nbsp;<?php echo $row['roomno']; ?></p>
                </div>

                <div class="col-sm-4">
                    <p class="mb-0"><b>Doctor:</b>&nbsp;&nbsp;<?php echo $row['doctor']; ?></p>
                </div><br><br><hr> 

                <div class="col-sm-4">
                    <p class="mb-0"><b>Nurse:</b>&nbsp;&nbsp;<?php echo $row['nurse']; ?></p>
                </div>

                <div class="col-sm-4">
                    <p class="mb-0"><b>Insurance Company:</b>&nbsp;&nbsp;<?php echo $row['company']; ?></p>
                </div>

                <div class="col-sm-4">
                    <p class="mb-0"><b>Insurance Id:</b>&nbsp;&nbsp;<?php echo $row['insuranceid']; ?></p>
                </div><br><br><hr>

                <div class="col-sm-4">
                    <p class="mb-0"><b>Holder Name:</b>&nbsp;&nbsp;<?php echo $row['holder']; ?></p>
                </div>

                <div class="col-sm-4">
                    <p class="mb-0"><b>Emergency No:</b>&nbsp;&nbsp;<?php echo $row['ephone']; ?></p>
                </div>

                <div class="col-sm-4">
                    <p class="mb-0"><b>Relation:</b>&nbsp;&nbsp;<?php echo $row['relation']; ?></p>
                </div><br><br><br>

                <div style="text-align:center">
                <a href="editpatient.php?id=<?php echo $row['id'];?>" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
<!-- <a href="deletepatient.php?id=<?php echo $row['id'];?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a> -->

              </div>


                

               
            </div>
            <hr>
        </div>
    </div>
</div>





        <!-- <div class="row">
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                </p>
                <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                <div class="progress rounded mb-2" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div> -->


          <!-- <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                </p>
                <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                <div class="progress rounded mb-2" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div> 
          </div>-->
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>