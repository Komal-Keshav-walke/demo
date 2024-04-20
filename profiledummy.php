
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
    <title>Doctor Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/6ee00b2260.js" crossorigin="anonymous"></script>

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>
        #img {
            padding-left: 10px;
        }

        .butt:hover {
            background-color: purple;
            color: aliceblue;
        }

        /* .home:hover{
            background-color: black;
            color: black;

        } */

        #content {
            /* background-image: url('http://getwallpapers.com/wallpaper/full/b/7/5/302286.jpg'); */
            background-color: lavender;
            background-size: cover;
            height: 90%;
            width: auto;
        }

        .patient:hover {
            color: black;
        }

        .text {
            color: black;
            font-weight: 900;
        }

        .cardsize {
          height:125px;
          width:auto;
        }

        .card {
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        
        .geeks { 
                /* width: 20%;*/ 
                top: 20%;  
                position: absolute; 
                /* left: 40%;  */
                /* border-bottom: 5px solid black;  */
                overflow: hidden; 
                animation: animate 3s linear forwards; 
            } 
  
            .geeks h6 { 
                color: purple; 
            } 

         /* Custom CSS for animation */
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    @keyframes fadeOut {
      from { opacity: 1; }
      to { opacity: 0; }
    }

  /* Doctor name */


    @keyframes animate { 
                0% { 
                    width: 0px; 
                    height: 0px; 
                } 
  
                30% { 
                    width: 50px; 
                    height: 0px; 
                } 
  
                60% { 
                    width: 50px; 
                    height: 80px; 
                } 
              }

              /* doctor name */

    .fade-in {
      animation: fadeIn 0.5s ease forwards;
    }

    .fade-out {
      animation: fadeOut 0.5s ease forwards;
    }
    .scale:hover{
    transform: scale(1.1,1.1);
}

/* profile style */

.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: purple;
}

.v1 {
  border-left: 2px solid purple;
  
  
 
}
    </style>

</head>
<body class="animate__animated animate__fadeIn">

<div class="fluid-container">
    <div class="row">
        <div class="col-sm-2 " style="outline: 2px solid gray;">
            <center>
                <img width="100" align="center" src="../images/1600w-hbl5vlZh180.webp">
                <br>
                <font color="PURPLE" style="font-size: 20px;font-family: Arial, Helvetica, sans-serif;font-weight: bold;">Health Care</font>
            </center>
            <hr style="margin: 7px; ">
            <img src="../images/profile.jpg" style="height:100px;width:100px;border-radius: 50%;margin-left: 65px;">
            <h3 style="text-align:center;margin:5px" class="animate__animated animate__fadeInDown">Doctor</h3>
            <hr style="margin: 7px; ">
            <div class="dropdown butt animate__animated animate__fadeInLeft" style="width:100%;margin-left:7px">
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="doctor.php">patient1 details</a></li>
                    <li><a class="dropdown-item" href="drview.php">patient1 details</a></li>
                </ul>
            </div>
            <br>

            <div>
            <div class="dropdown butt" style="width:100%;margin-left:7px">
                    <!-- <button class="btn dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width:100%;padding-left:7px;"><i class="fa-solid fa-user-doctor"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Appointment
                  </button> -->
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="doctor.php">patient1 details</a></li>
                        <li><a class="dropdown-item" href="drview.php">patient1 details</a></li>
                    </ul>
                </div>
                <br>

                

                <div >
               
                <a href="imppatientlist.php" class="btn butt" style="width:100%;padding-left:7px;"> <i class="fa-solid fa-users"></i>&nbsp;&nbsp;Patient List   
               </a>
                    <ul class="dropdown-menu">
                    
                     <a class="dropdown-item" href="doctorpatientlist.html">IPD Patient Records</a>
                     <a class="dropdown-item" href="">OPD Patient Records</a>
                     <a class="dropdown-item" href="#">Emergency Patient Records</a>
                    
                 </ul>
                </div><br>

                <div >
               
               <a href="doctorappointmentlist.php" class="btn butt" style="width:100%;padding-left:7px;"> <i class="fa-solid fa-users"></i>&nbsp;&nbsp;Appointments 
              </a>
                   
                   
                </ul>
    </div><br>
                

                <div class="dropdown butt" style="width:100%;margin-left:7px">
                    <button class="btn dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width:100%;padding-left:7px;"><i class="fa-solid fa-user-nurse"></i>&nbsp;  
                    Nurse
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="doctornurseview.php">Nurse Records</a></li>
                    </ul>
                </div>
                <br>

                <div class="dropdown butt" style="width:100%;margin-left:7px">
                    <button class="btn dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width:100%;padding-left:7px;"><i class="fa-solid fa-droplet"></i>&nbsp;
                    Blood Bank
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="dbloodbank.php">Available Blood</a></li>
                        <li><a class="dropdown-item" href="donarlist.php">Donar list</a></li>
                    </ul>
                </div>
                <br>

                <a href="../logout.php" style="text-decoration: none;"><button class="form-control butt" style="text-decoration: none;" id="butt"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;Log Out</button></a>
                <br><br><br><br>

                <hr style="margin: 7px;">
            </div>
        </div>

        <div class="col-sm-10 ">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid" style="background-color:purple">
                    <a class="navbar-brand" href="#">
                        <img src="../images/1600w-hbl5vlZh180.webp" alt="Bootstrap" width="55" height="54" style="border-radius: 50%;">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active home" aria-current="page" href="#" style="color: aliceblue;">Doctor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" style="color: aliceblue;"></a>
                            </li>
                        </ul>
                        <div class="input-group mb-3" width=50% style="margin-left:55%;margin-top:15px">
                            <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-primary" type="button" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </div>
                </div>
            </nav>



            <div class="container emp-profile " style="height:600px; overflow: auto;">
              <form method="post">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="profile-img">
                              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                              <div class="file btn btn-lg btn-primary">
                                  Change Photo
                                  <input type="file" name="file"/>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="profile-head">
                                      <h5>
                                        Patient Profile
                                      </h5>
                                      <!-- <h6>
                                          Web Developer and Designer
                                      </h6>
                                      <p class="proile-rating">RANKINGS : <span>8/10</span></p> -->
                              <ul class="nav nav-tabs" id="myTab" role="tablist">
                                  <li class="nav-item">
                                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="" role="tab" aria-controls="home" aria-selected="true">About</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Reports</a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                      <div class="col-md-2">
                          <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
  <!-- 
                          <a href="editpatient.php?id=<?php echo $row['id'];?>" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a> -->
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                          <div class="profile-work ">
                              
                              <h3>Personal Details<h3><br>
                              <h6>Name:-&nbsp;&nbsp;<?php echo $row['fname']; ?></h6><hr>
                              <h6>Gender:-&nbsp;&nbsp;<?php echo $row['gender']; ?></h6><hr>
                              
                              <h6>Contact:-&nbsp;&nbsp;<?php echo $row['contact']; ?></h6><hr>
                              <h6>DOB:-&nbsp;&nbsp;<?php echo $row['dob']; ?></h6><hr>
                              <h6>Age:-&nbsp;&nbsp;<?php echo $row['age']; ?></h6><hr>
                              <h6>Height:-&nbsp;&nbsp;<?php echo $row['height']; ?></h6><hr>
                              <h6>Weight:-&nbsp;&nbsp;<?php echo $row['weight']; ?></h6><hr>
                              <h6>Address:-&nbsp;&nbsp;<?php echo $row['address']; ?></h6><hr>
                              
                              
                              
                          </div>
                      </div>
                      <div class="col-md-8 v1">
                          <div class="tab-content profile-tab" id="myTabContent">
                              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                  <h4>Details</h4>
                                          <div class="row">
                                              <div class="col-md-3">
                                                  <label>Patient Type:-</label>
                                              </div>
                                              <div class="col-md-3">
                                                  <p><?php echo $row['patient']; ?></p>
                                              </div>
  
                                              <!-- <div class="col-md-3">
                                                  <label>Name:-</label>
                                              </div> -->
                                              <!-- <div class="col-md-3">
                                                  <p> <?php echo $row['fname']; ?></p>
                                              </div> -->
  
                                              <div class="col-md-3">
                                                  <label>aadhar:-</label>
                                              </div>
                                              <div class="col-md-3">
                                              <p> <?php echo $row['aadhar']; ?></p>
                                              </div>
                                          </div><hr>
  
  
  
                                         
  
                                          
  
                                          <div class="row">
                                              <div class="col-md-3">
                                                  <label>blood:-</label>
                                              </div>
                                              <div class="col-md-3">
                                              <p> <?php echo $row['blood']; ?></p>
                                              </div>
  
                                              <div class="col-md-3">
                                                  <label>Occupation:-</label>
                                              </div>
                                              <div class="col-md-3">
                                              <p> <?php echo $row['occupation']; ?></p>
                                              </div>
                                          </div><hr>
  
                                          <div class="row">
                                              <div class="col-md-3">
                                                  <label>Medical:-</label>
                                              </div>
                                              <div class="col-md-3">
                                              <p> <?php echo $row['medical']; ?></p>
                                              </div>
  
                                              <div class="col-md-3">
                                                  <label>indate:-</label>
                                              </div>
                                              <div class="col-md-3">
                                              <p> <?php echo $row['indate']; ?></p>
                                              </div>
  </div><hr>
  
  
                                              <div class="row">
                                              <div class="col-md-3">
                                                  <label>Outdate:-</label>
                                              </div>
                                              <div class="col-md-3">
                                              <p> <?php echo $row['outdate']; ?></p>
                                              </div>
  
                                              <div class="col-md-3">
                                                  <label>Room NO:-</label>
                                              </div>
                                              <div class="col-md-3">
                                              <p> <?php echo $row['roomno']; ?></p>
                                              </div>
                                          </div><hr>
  
                                          
  
  
                                          <div class="row">
                                              <div class="col-md-3">
                                                  <label>Doctor:-</label>
                                              </div>
                                              <div class="col-md-3">
                                              <p> <?php echo $row['doctor']; ?></p>
                                              </div>
  
                                              <div class="col-md-3">
                                                  <label>Nurse:-</label>
                                              </div>
                                              <div class="col-md-3">
                                              <p> <?php echo $row['nurse']; ?></p>
                                              </div>
                                          </div><hr>
  
  
  
  
  
                                          <div class="row">
                                              <div class="col-md-3">
                                                  <label>Company:-</label>
                                              </div>
                                              <div class="col-md-3">
                                              <p> <?php echo $row['company']; ?></p>
                                              </div>
  
                                              <div class="col-md-3">
                                                  <label>insurance Id:-</label>
                                              </div>
                                              <div class="col-md-3">
                                              <p> <?php echo $row['insuranceid']; ?></p>
                                              </div>
  </div><hr>
  
                                              <div class="row">
                                              <div class="col-md-3">
                                                  <label>Expiry Date:-</label>
                                              </div>
                                              <div class="col-md-3">
                                              <p> <?php echo $row['expirydate']; ?></p>
                                              </div>
  
                                              <div class="col-md-3">
                                                  <label>Holder:-</label>
                                              </div>
                                              <div class="col-md-3">
                                              <p> <?php echo $row['holder']; ?></p>
                                              </div>
                                          </div><hr>
  
                                          <div class="row">
                                              <div class="col-md-3">
                                                  <label>Emergency No:-</label>
                                              </div>
                                              <div class="col-md-3">
                                              <p> <?php echo $row['ephone']; ?></p>
                                              </div>
  
                                              <div class="col-md-3">
                                                  <label>Relation:-</label>
                                              </div>
                                              <div class="col-md-3">
                                              <p> <?php echo $row['relation']; ?></p>
                                              </div>
                                          </div><hr>
                                          </div>
                                          
                              </div>
                              <!-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <label>Experience</label>
                                              </div>
                                              <div class="col-md-6">
                                                  <p>Expert</p>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <label>Hourly Rate</label>
                                              </div>
                                              <div class="col-md-6">
                                                  <p>10$/hr</p>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <label>Total Projects</label>
                                              </div>
                                              <div class="col-md-6">
                                                  <p>230</p>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <label>English Level</label>
                                              </div>
                                              <div class="col-md-6">
                                                  <p>Expert</p>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <label>Availability</label>
                                              </div>
                                              <div class="col-md-6">
                                                  <p>6 months</p>
                                              </div>
                                          </div>
                                  <div class="row">
                                      <div class="col-md-12">
                                          <label>Your Bio</label><br/>
                                          <p>Your detail description</p>
                                      </div>
                                  </div>
                              </div>
                          </div> -->
                      </div>
                  </div>
              </form>           
          </div>


            <!-- <div class="container" id="content" style="background-image:url('')">
    <div class="row">
    
      <div class="col-md-6 mb-4 mt-4 animate__animated animate__fadeInUp">
        <div class="card w-75 border-primary">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-md-4">
                <img src="https://cdn2.iconfinder.com/data/icons/medical-services-set-4/256/Male_Doctor-1024.png" class="img-fluid" alt="Doctor Icon" style="height: 130px; width: 150px;">
              </div>
              <div class="col-md-8">
                <h3 class="card-title" style="color: #5e69a9;">Hello, Dr.<?php echo $row['Name'] ?></h3>
                <p class="card-text">Have A Nice Day At Work..!!</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      
      <div class="col-md-3 mb-4 mt-4 animate__animated animate__fadeInUp">
        <div class="card fade-in" style="height: 150px; width: 200px; ">
          <div class="card" style="background-color:#8B008B">
            <h5 style=" text-align: center; padding-top: 10px;">Total Patients</h5>
            <p class="card-text" style="font-size: 36px; color: black; text-align: center;">
</div>
<div class="card"  style="height:105px;text-align:center;font-size:40px; background-color:">
              <a href="imppatientlist.php" style="color: black;">
                <i class="fas fa-user"></i>  <?php echo $total_records; ?>
              </a>
            </p>
          </div>
        </div>
      </div>

       Appointment Card 
      <div class="col-md-3 mb-4 mt-4 animate__animated animate__fadeInUp">
        <div class="card fade-in" style="height: 150px; width: 200px; ;">
          
            <div class="card" style="background-color:#8B008B">
            <h5 style=" text-align: center; padding-top: 10px;"> Total Appointments</h5>
            <p class="card-text" style="font-size: 36px; color: black; text-align: center;">
</div>
<div class="card" style="height:105px;align-items:center;font-size:40px">
              <a href="appointments.php" style="color: black;">
                <i class="fas fa-calendar-alt"></i>    <?php echo $total_record; ?>
          
              </a>
            </p>
</div>

        
        </div>
      </div>
    </div>
  </div> -->


            <!-- <div class="container" id="content">
    <div class="row">
        <div class="col-md-6 mb-4 mt-4">
            <div class="card w-75 border-primary animate__animated animate__fadeInUp">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <img src="https://cdn2.iconfinder.com/data/icons/medical-services-set-4/256/Male_Doctor-1024.png" class="img-fluid" alt="Doctor Icon" style="height: 130px; width: 150px;">
                        </div>
                        <div class="col-md-8">
                            <h3 class="card-title" style="color: #5e69a9;">Hello, Dr. Rohan</h3>
                            <p class="card-text">Have A Nice Day At Work..!!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4 mt-4">
            <div class="card animate__animated animate__fadeInUp" style="height: 150px; width: 200px; background-color: purple;">
                <div class="card-body">
                    <h5 style="color: white; text-align: center; padding-top: 10px;">Total Patients</h5>
                    <p class="card-text" style="font-size: 36px; color: black; text-align: center;">
                        <a href="imppatientlist.php" style="color: black;">
                            <i class="fas fa-user"></i> <?php echo $total_records; ?>
                        </a>
                    </p>
                </div>
            </div>
        </div>


        

        <div class="col-md-3 mb-4 mt-4">
            <div class="card animate__animated animate__fadeInUp" style="height: 150px; width: 200px; background-color: #007bff;">
                <div class="card-body">
                    <h5 style="color: white; text-align: center; padding-top: 10px;">Appointments</h5>
                    <p class="card-text" style="font-size: 36px; color: black; text-align: center;">
                        <a href="appointments.php" style="color: black;">
                            <i class="fas fa-calendar-alt"></i> <?php echo $total_appointments; ?>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div> -->

                    
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

