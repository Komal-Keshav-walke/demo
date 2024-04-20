
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
$aadhar=$row['aadhar'];

$prescriptions = [];
$patient_info = [];


if ($aadhar) {
    
    $aadhar = mysqli_real_escape_string($conn, $aadhar);

  

$sql1 = "SELECT pr.tablet_name, pr.tablet_quantity, pr.tab_morning, pr.tab_afternoon, pr.tab_evening, pr.tab_lunch, pr.test, pr.medical, pr.created_at, pat.fname, pat.age, pat.gender, pat.doctor
FROM prescription AS pr
JOIN patients AS pat ON pr.aadhar = pat.aadhar
WHERE pr.aadhar = '$aadhar'";



    $result = mysqli_query($conn, $sql1); 

 
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row1 = mysqli_fetch_assoc($result)) {
            $prescriptions[] = $row1;
        }
       
        $patient_info = [
            'name' => $prescriptions[0]['fname'],
            'age' => $prescriptions[0]['age'],
            'gender' => $prescriptions[0]['gender'],
        ];
    }

}


mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IPD List Department Dashboard</title>
  <link rel="stylesheet" href="admin.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css" />


  <script src="https://kit.fontawesome.com/6ee00b2260.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="app/deptmain.css" media="screen" >
</head>
<style>
   .table th {
          background-color: purple;
          color: White;
          text-align: center;
        }
        
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
<body>



  <div class="sidebar">

    <div class="top">
      <!-- <div class="logo">
                  <img src="img/logo.webp" alt="img"  class="user-img">
                  <span class="logo_name">Health Care</span>
              </div> -->
      <i class='bx bx-menu' id="btn"></i>
    </div>

    <div class="user">
      <img src="https://www.shutterstock.com/image-photo/medical-concept-indian-beautiful-female-600nw-1635029716.jpg"
        alt="img" width="50px" height="50px" class="user-img" style="border-radius: 50%;">
      <div>
        <p class="bold">Health Care</h4>
        <p>Admin</p>


      </div>
    </div>

    <div class="accordion" style="background-color: purple;">
      <!-- Admin -->
      <div class="accordion-item" style="border: none;">
        <h2 class="accordion-header" id="headingDoctor">
          <button class="accordion-button shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseDashboard" aria-expanded="true" aria-controls="collapseDoctor"
            style="background-color: purple;color:white;">


            <!-- <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse"data-bs-target="#dashboard" aria-expanded="false" aria-controls="dashboard" style="color: white;"> -->
            <i class='bx bx-grid-alt'></i>

            <i class="fa-solid fa-user-crown fs-5 " style="color:white;"></i>&nbsp;&nbsp;&nbsp;&nbsp;
            <span class="fs-6 ms-3 d-none d-sm-inline" style="padding-bottom: 3px;">Dashboard</span>
          </button>
        </h2>
        <div id="collapseDashboard" class="accordion-collapse collapse" aria-labelledby="headingDoctor"
          data-bs-parent="#accordionExample">
          <div class="accordion-body" style="background-color: purple;color: white;">
            <a href="AdminDashboard.php" class="list-group-item list-group-item-action">Admin</a>
            <a href="doctorplatform.php" class="list-group-item list-group-item-action">Doctor</a>
            <a href="#" class="list-group-item list-group-item-action">Nurse</a>
            <a href="receptionistd.php" class="list-group-item list-group-item-action">Receptionist</a>
            <a href="Accountant.php" class="list-group-item list-group-item-action">Accountant</a>

            <!-- <a href="#" class="list-group-item list-group-item-action">Link 3</a> -->
          </div>

        </div>
      </div>
      <!-- Doctors -->


      <div class="accordion" style="background-color: purple;">
        <!-- Admin -->
        <div class="accordion-item" style="border: none;">
          <h2 class="accordion-header" id="headingDoctor">
            <button class="accordion-button shadow-none" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseDoctor" aria-expanded="true" aria-controls="collapseDoctor"
              style="background-color: purple;color: white;">

              <!-- 
                      <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse"data-bs-target="#dashboard" aria-expanded="false" aria-controls="dashboard" style="color: white;"> -->
              <i class="fa-solid fa-user-doctor"></i>

              <i class="fa-solid fa-user-crown fs-5 " style="color:purple;"></i>&nbsp;&nbsp;&nbsp;&nbsp;
              <span class="fs-6 ms-3 d-none d-sm-inline" style="padding-bottom: 3px;">Doctor</span>
            </button>
          </h2>
          <div id="collapseDoctor" class="accordion-collapse collapse" aria-labelledby="headingDoctor"
            data-bs-parent="#accordionExample">
            <div class="accordion-body" style="background-color: purple;color: white;">
              <a href="doctorlist.php" class="list-group-item list-group-item-action">Doctor list</a>
              <!-- <a href="#" class="list-group-item list-group-item-action">Add Doctor</a> -->
              <!-- <a href="#" class="list-group-item list-group-item-action">Link 3</a> -->
            </div>
          </div>
        </div>
        <!-- Doctors -->
        <div class="accordion-item" style="border: none;">
          <h2 class="accordion-header" id="headingPatients">
            <button class="accordion-button shadow-none" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapsePatients" aria-expanded="true" aria-controls="collapsePatients"
              style="background-color: purple;color: white;">

              <!-- <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse"data-bs-target="#dashboard" aria-expanded="false" aria-controls="dashboard" style="color: white;" > -->
              <i class="fa-solid fa-users"></i>

              <i class="fa-solid fa-user-crown fs-5 " style="color:purple;"></i>&nbsp;&nbsp;&nbsp;&nbsp;
              <span class="fs-6 ms-3 d-none d-sm-inline" style="padding-bottom: 3px;">Patient</span>

            </button>
          </h2>
          <div id="collapsePatients" class="accordion-collapse collapse" aria-labelledby="headingPatients"
            data-bs-parent="#accordionExample">
            <div class="accordion-body" style="background-color: purple;color: white;">
              <a href="ipdview.php" class="list-group-item list-group-item-action">IPD Records</a>
              <a href="oopdview.php" class="list-group-item list-group-item-action">OPD Records</a>
              <a href="emergencyview.php" class="list-group-item list-group-item-action">Emergency Records</a>

            </div>
          </div>
        </div>
        <!-- Patients -->
        <div class="accordion-item" style="border: none;">
          <h2 class="accordion-header" id="headingNurse">
            <button class="accordion-button shadow-none" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseNurse" aria-expanded="true" aria-controls="collapseNurse"
              style="background-color: purple;color: white;">

              <!-- <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse"data-bs-target="#dashboard" aria-expanded="false" aria-controls="dashboard" style="color: white;"> -->
              <i class="fa-solid fa-user-nurse"></i>

              <i class="fa-solid fa-user-crown fs-5 " style="color:purple;"></i>&nbsp;&nbsp;&nbsp;&nbsp;
              <span class="fs-6 ms-3 d-none d-sm-inline" style="padding-bottom: 3px;">Nurse</span>
            </button>
          </h2>
          <div id="collapseNurse" class="accordion-collapse collapse" aria-labelledby="headingNurse"
            data-bs-parent="#accordionExample">
            <div class="accordion-body" style="background-color: purple;color: white;">
              <a href="nurselist.php" class="list-group-item list-group-item-action">Nurse Records</a>

            </div>
          </div>
        </div>
        <!-- Accountant -->
        <div class="accordion-item" style="border: none;">
          <h2 class="accordion-header" id="headingAccountant">
            <button class="accordion-button shadow-none" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseAccountant" aria-expanded="true" aria-controls="collapseAccountant"
              style="background-color: purple;color: white;">

              <!-- <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse"data-bs-target="#dashboard" aria-expanded="false" aria-controls="dashboard" style="color: white;"> -->
              <i class="fa-solid fa-money-bill-transfer"></i>

              <i class="fa-solid fa-user-crown fs-5 " style="color:purple;"></i>&nbsp;&nbsp;&nbsp;&nbsp;
              <span class="fs-6 ms-3 d-none d-sm-inline" style="padding-bottom: 3px;">Accountant</span>
            </button>
          </h2>
          <div id="collapseAccountant" class="accordion-collapse collapse" aria-labelledby="headingAccountant"
            data-bs-parent="#accordionExample">
            <div class="accordion-body" style="background-color: purple;color: white;">
              <a href="#" class="list-group-item list-group-item-action">Billing</a>
              <!-- <a href="#" class="list-group-item list-group-item-action">Donar list</a> -->
            </div>
          </div>
        </div>
        <!-- Blood Bank -->
        <div class="accordion-item" style="border: none;">
          <h2 class="accordion-header" id="headingBloodbank">
            <button class="accordion-button shadow-none" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseBloodbank" aria-expanded="true" aria-controls="collapseBloodbank"
              style="background-color: purple;color: white;">

              <!-- <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse"data-bs-target="#dashboard" aria-expanded="false" aria-controls="dashboard" style="color: white;"> -->
              <i class="fa-solid fa-droplet"></i>

              <i class="fa-solid fa-user-crown fs-6 " style="color:purple;"></i>&nbsp;&nbsp;&nbsp;&nbsp;
              <span class="fs-6 ms-3 d-none d-sm-inline" style="padding-bottom: 3px;">Blood Bank</span>
            </button>
          </h2>
          <div id="collapseBloodbank" class="accordion-collapse collapse" aria-labelledby="headingBloodbank"
            data-bs-parent="#accordionExample">
            <div class="accordion-body" style="background-color: purple;color: white;">
              <a href="abloodbank.php" class="list-group-item list-group-item-action">Available Blood</a>
              <a href="donarlist.php" class="list-group-item list-group-item-action">Donar list</a>
            </div>
          </div>
        </div>
      
        <!-- Inventory -->
        <div class="accordion-item" style="border: none;">
          <h2 class="accordion-header" id="headingInventory">
            <button class="accordion-button shadow-none" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseInventory" aria-expanded="true" aria-controls="collapseInventory"
              style="background-color: purple;color: white;">

              <!-- <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse"data-bs-target="#dashboard" aria-expanded="false" aria-controls="dashboard" style="color: white;"> -->
              <i class="fa-solid fa-warehouse"></i>

              <i class="fa-solid fa-user-crown fs-5 " style="color:purple;"></i>&nbsp;&nbsp;&nbsp;&nbsp;
              <span class="fs-6 ms-3 d-none d-sm-inline" style="padding-bottom: 3px;"> Inventory System</span>
            </button>
          </h2>
          <div id="collapseInventory" class="accordion-collapse collapse" aria-labelledby="headingInventory"
            data-bs-parent="#accordionExample">
            <div class="accordion-body" style="background-color: purple;color: white;">
              <a href="" class="list-group-item list-group-item-action">Medical Supplies</a>
              <a href="#" class="list-group-item list-group-item-action">Pharmaceuticals</a>
              <a href="#" class="list-group-item list-group-item-action">Equipments</a>
              <a href="#" class="list-group-item list-group-item-action">Laboratory & Diagnostics Equipments</a>
              <a href="#" class="list-group-item list-group-item-action">Maintenance & Repair Part</a>
            </div>
          </div>



        </div>
      </div>
      <!-- New Register -->

    </div>

    <ul class="menu" style="padding-left: 0rem;" id="accordion">



          
        <li class="sidebar-item">
        <a href="register.php" class="sidebar-link has-dropdown collapsed">
        <i class="fa-solid fa-boxes-stacked"></i></i>&nbsp;&nbsp;&nbsp;
  <span href="" class="fs-6">Departments</span>


  <i class="lni lni-protection"></i>


</a>

<a href="register.php" class="sidebar-link has-dropdown collapsed">
  <i class="fa-solid fa-address-card"></i>&nbsp;&nbsp;&nbsp;
  <span href="register.php" class="fs-6">Register</span>


  <i class="lni lni-protection"></i>


</a>

<a href="logout.php" class="sidebar-link has-dropdown collapsed">
<i class="fa-solid fa-right-from-bracket"></i>&nbsp;&nbsp;&nbsp;
<span class="fs-6">Logout</span>


<i class="lni lni-protection"></i>


</a>



</li>

    </ul>
  </div>


  <script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
          dropdownContent.style.display = "none";
        } else {
          dropdownContent.style.display = "block";
        }
      });
    }
  </script>


  <div class="main-content" style="padding: 0;background-color:#f4f4f4;">


    <nav class="navbar navbar-expand-lg bg-body-tertiary" id="navbar">
      <div class="container-fluid ">


        <img src="https://marketplace.canva.com/EAFBb6P4OLs/1/0/1600w/canva-red-blue-simple-logo-hbl5vlZh180.jpg
      " alt="Bootstrap" width="55" height="54" style="border-radius: 50%; margin: 4px; float: right;">

        <a class="navbar-brand" href="doctordashboard.php" id="b">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">



          </ul>

          <svg xmlns="http://www.w3.org/2000/svg" href="logout.php" width="16" height="16" fill="currentColor"
            class="bi bi-box-arrow-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
              d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
            <path fill-rule="evenodd"
              d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
          </svg>

        </div>
      </div>
    </nav>
    
   
   
    <div class="container emp-profile " style="height:auto; overflow: auto;">
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
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="reportdepartment.php?id=<?php echo $row['id']; ?>" role="tab" aria-controls="profile" aria-selected="false">Reports</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <!-- <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/> -->
<!-- 
                <a href="editpatient.php?id=<?php echo $row['id'];?>" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a> -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="">
                    
                    <h4>Personal Details<h4><hr>
                    <h6>Name :-&nbsp;&nbsp;<?php echo $row['fname']; ?></h6><hr>
                    <h6>Gender :-&nbsp;&nbsp;<?php echo $row['gender']; ?></h6><hr>
                    
                    <h6>Contact :-&nbsp;&nbsp;<?php echo $row['contact']; ?></h6><hr>
                    <h6>DOB :-&nbsp;&nbsp;<?php echo $row['dob']; ?></h6><hr>
                    <h6>Age :-&nbsp;&nbsp;<?php echo $row['age']; ?></h6><hr>
                    <h6>Height :-&nbsp;&nbsp;<?php echo $row['height']; ?></h6><hr>
                    <h6>Weight :-&nbsp;&nbsp;<?php echo $row['weight']; ?></h6><hr>
                    <h6>Address :-&nbsp;&nbsp;<?php echo $row['address']; ?></h6><hr>
                    
                    
                    
                </div>
            </div>
            <div class="col-md-8 ">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h4>Details</h4>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Patient Type :-</label>
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
                                        <label>Aadhar :-</label>
                                    </div>
                                    <div class="col-md-3">
                                    <p> <?php echo $row['aadhar']; ?></p>
                                    </div>
                                </div><hr>



  

                                

                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Blood :-</label>
                                    </div>

                                    <div class="col-md-3">
                                    <p> <?php echo $row['blood']; ?></p>
                                    </div>


                                    <div class="col-md-3">
                                        <label>Occupation :-</label>
                                    </div>

                                    <div class="col-md-3">
                                    <p> <?php echo $row['occupation']; ?></p>
                                    </div>

                                </div><hr>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Medical :-</label>
                                    </div>
                                    <div class="col-md-3">
                                    <p> <?php echo $row['medical']; ?></p>
                                    </div>

                                    <div class="col-md-3">
                                        <label>Indate :-</label>
                                    </div>
                                    <div class="col-md-3">
                                    <p> <?php echo $row['indate']; ?></p>
                                    </div>
</div><hr>


                                    <div class="row">
                                    <div class="col-md-3">
                                        <label>Outdate :-</label>
                                    </div>
                                    <div class="col-md-3">
                                    <p> <?php echo $row['outdate']; ?></p>
                                    </div>

                                    <div class="col-md-3">
                                        <label>Room NO :-</label>
                                    </div>
                                    <div class="col-md-3">
                                    <p> <?php echo $row['roomno']; ?></p>
                                    </div>
                                </div><hr>

                                


                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Doctor :-</label>
                                    </div>
                                    <div class="col-md-3">
                                    <p> <?php echo $row['doctor']; ?></p>
                                    </div>

                                    <div class="col-md-3">
                                        <label>Nurse :-</label>
                                    </div>
                                    <div class="col-md-3">
                                    <p> <?php echo $row['nurse']; ?></p>
                                    </div>
                                </div><hr>





                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Company :-</label>
                                    </div>
                                    <div class="col-md-3">
                                    <p> <?php echo $row['company']; ?></p>
                                    </div>

                                    <div class="col-md-3">
                                        <label>Insurance Id :-</label>
                                    </div>
                                    <div class="col-md-3">
                                    <p> <?php echo $row['insuranceid']; ?></p>
                                    </div>
</div><hr>

                                    <div class="row">
                                    <div class="col-md-3">
                                        <label>Expiry Date :-</label>
                                    </div>
                                    <div class="col-md-3">
                                    <p> <?php echo $row['expirydate']; ?></p>
                                    </div>

                                    <div class="col-md-3">
                                        <label>Holder :-</label>
                                    </div>
                                    <div class="col-md-3">
                                    <p> <?php echo $row['holder']; ?></p>
                                    </div>
                                </div><hr>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Emergency No :-</label>
                                    </div>
                                    <div class="col-md-3">
                                    <p> <?php echo $row['ephone']; ?></p>
                                    </div>

                                    <div class="col-md-3">
                                        <label>Relation :-</label>
                                    </div>
                                    <div class="col-md-3">
                                    <p> <?php echo $row['relation']; ?></p>
                                    </div>
                                </div><hr>
                                </div>
                                
  </div><br> <br> 
  </div>  <hr>               




                    
<div class="container">

    <?php if ($aadhar && !empty($prescriptions)): ?>
      
       <div class="row">
        <div class="col-md-4">
                <p><strong>Name:</strong> <?= htmlspecialchars($patient_info['name']) ?></p>
    </div>
    <div class="col-md-4">
                <p><strong>Age:</strong> <?= htmlspecialchars($patient_info['age']) ?></p>
    </div>

    <div class="col-md-4">
                <p><strong>Gender:</strong> <?= htmlspecialchars($patient_info['gender']) ?></p>
    </div>
    
    </div>

    <div class="row">
        <div class="col-sm-4">
        <p><strong>Aadhar:</strong> <?= htmlspecialchars($aadhar) ?></p>
    </div>
    </div>
    <br><br>

  
          

 
        <h5><u><b>Prescription Details for:-</b></u>  <?= htmlspecialchars($patient_info['name']) ?></h5>

        

        <table class="table table-bordered  table table-striped ">
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
    <h6>Prescription by  Dr:- <b><?php echo $row['doctor']; ?></h6>
   
    </div>

</body>

<script>
  let btn = document.querySelector("#btn");
  let sidebar = document.querySelector(".sidebar");
  let searchBtn = document.querySelector(".bx-search");

  btn.onclick = function () {
    sidebar.classList.toggle("active");
  };
</script>

</html>