
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receptionist Dashboard</title>
    <link rel="stylesheet" href="admin.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    
    <script src="https://kit.fontawesome.com/6ee00b2260.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    <style>
      * {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color:purple;

 
}

.topnav a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* .topnav a.active {
  background-color: #2196F3;
  color: white;
} */

.topnav .search-container {
  float: right;
  
  /* padding-right: 20px; */
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}

.sidebar {
      position: fixed; /* Change from sticky to fixed */
      top: 0;
      left: 0;
      width: 80px;
      height: 100vh;
      background-color: purple;
      padding: 0.4rem 0.8rem;
      transition: all 0.5s ease;
      overflow-y: auto;
      overflow-x: hidden;
    }

.accordion{
    font-family: Arial, Helvetica, sans-serif ;
    background-color: purple;
    color: white;
    
    text-decoration: none;
    
    display: block;
    border: none;
    
    
    
    cursor: pointer;
    outline: none;

}

.accordion-button:hover {
    background-color: whitesmoke !important;
    color: purple  !important;
}

.accordion-body a:hover {
    background-color: whitesmoke;
    color: purple;
}

.accordion-body a {
    padding: 6px 8px 6px 30px;
    text-decoration: none;
    font-size: 16px;
    color: white;
    display: block;
    border: none;
    background: none;
    width: 100%;
    text-align: left;
    cursor: pointer;
    outline: none;
}

.sidebar.active ~ .main-content {
    left: 250px;
    width: calc(100% - 250px);
}

.sidebar.active {
    width: 250px;
}

.sidebar #btn {
    position: absolute;
    color: #fff;
    top: .2rem;
    left: 50%;
    font-size: 1.2rem;
    line-height: 40px;
    cursor: pointer;
    transform: translateX(-50%);
}

.sidebar.active #btn {
    left: 90%;
}

.sidebar.top.logo {
    display: flex;
    color: #fff;
    height: 50px;
    width: 100%;
    align-items: center;
    pointer-events: none;
    opacity: 0;
}

.sidebar.active.top.logo {
    opacity: 1;
}

.top.logo i {
    font-size: 2rem;
    margin-right: 5px;
}

.user {
    display: flex;
    align-items: center;
    margin: 1rem 0;
}

.user p {
    color: #fff;
    opacity: 1;
    margin-left: 1rem;
}

.bold {
    font-weight: 600;
}

.sidebar p {
    opacity: 0;
}

.sidebar.active p {
    opacity: 1;
}

.sidebar ul li {
    position: relative;
    list-style-type: none;
    height: 50px;
    width: 90%;
    margin: 0.8rem auto;
    line-height: 50px;
}

.sidebar ul li a {
    color: #fff;
    text-decoration: none;
    display: flex;
    align-items: center;
    text-decoration: none;
    border-radius: 0.8rem;
}

.sidebar ul li a:hover {
    background-color: #fff;
    color: purple;
}

.sidebar ul li a i {
    min-width: 50px;
    text-align: center;
    height: 50px;
    border-radius: 12px;
    line-height: 50px;
}

.sidebar .nav-item {
    opacity: 1;
    margin-left: 13px;
}

.sidebar ul li .tooltip {
    position: absolute;
    left: 125px;
    top: 50%;
    transform: translateY(-50%, -50%);
    box-shadow: 0 0.5rem 0.8rem rgba(0, 0, 0, 0.2);
    border-radius: .6rem;
    padding: 0.4rem 1.2rem;
    line-height: 1.8rem;
    z-index: 20;
    opacity: 0;
}

.sidebar ul li a:hover .tooltip {
    opacity: 1;
}

.sidebar.active ul li .tooltip {
    display:none;  /*display text size normal to bold  display:auto;*/
}


/* .sidebar.accordian#k#kk:hover{
   background-color: black;
   color: white;

} */

.sidebar.active ul li .tooltip {
    display: none;
}

/* .accordion:hover {
    background-color: black;
    color: white;
} */

.main-content {
    position: absolute;
    min-height: 100vh;
    top: 0;
    left: 80px;
    width: calc(100% - 80px);
    height: 100vh;
    background-color: #f4f4f4;
    transition: all 0.5s ease;
    padding: 1rem;
}
/* Change color of scrollbar in WebKit browsers */
.sidebar::-webkit-scrollbar {
    width: 10px; /* Set the width of the scrollbar */
}

/* Change color of scrollbar thumb */
.sidebar::-webkit-scrollbar-thumb {
     /* Set the color of the thumb */
    border-radius: 5px; /* Set the border radius of the thumb */
    height: 10px
}

/* Change color of scrollbar track */
.sidebar::-webkit-scrollbar-track {
    background: #f1f1f1; /* Set the background color of the track */
}


/* #navbar{
    font-size: 12px;
    position:sticky;
} */

#navbar {
      font-size: 12px;
      position: -webkit-sticky;
      position: sticky;
      top: 0;
      z-index: 2;
    }
.container-fluid {
  background-color:purple;
  color: white;
  position:sticky;
  
}


.container-fluid a {
  float: left;
  display: block;
  background-color: purple;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  
}

.container-fluid a:hover {
  background-color: white;
  color: purple;
}


 .dropdown-menu {
  background-color: purple;
  color: white;
}

.dropdown-menu:hover {
  background-color: white;
  color: purple;
}

.container-fluid .search-container {
  float: right;
  
  /* padding-right: 20px; */
}

.container-fluid input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.container-fluid .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  height: 37px;
  background: white;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.container-fluid .search-container button:hover {
  background: white;
  
}
#hiddenDiv {
      display: none;
    }

/* {$prefix}accordion-btn-focus-box-shadow: #{$accordion-button-focus-box-shadow}; */


    </style>

</head>

<?php 

session_start();
include('connection.php');
if(isset($_POST['submit'])){

    $patient = $_POST['patient'];
    $fname = $_POST['fname'];
    // $mname = $_POST['mname'];
    // $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $aadhar = $_POST['aadhar'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $blood = $_POST['blood'];
    $occupation = $_POST['occupation'];
    $medical = $_POST['medical'];

    $indate = $_POST['indate'];

    $outdate = $_POST['outdate'];
    $roomno = $_POST['roomno'];
    $doctor = $_POST['doctor'];
    $nurse = $_POST['nurse'];
    $company = $_POST['company'];
    $insuranceid = $_POST['insuranceid'];
    $expirydate = $_POST['expirydate'];
    $holder = $_POST['holder'];
    $ephone = $_POST['ephone'];
    $relation = $_POST['relation'];


    //remove content from query
    // mname, lname, 


      $sql = "INSERT INTO patients( patient, fname,gender, aadhar, address, contact, dob, age,height,weight,blood,occupation,medical,indate, outdate, roomno, doctor,nurse, company, insuranceid, expirydate, holder, ephone,relation) VALUES ('$patient','$fname','$gender','$aadhar','$address','$contact','$dob','$age','$height','$weight','$blood','$occupation','$medical','$indate','$outdate','$roomno','$doctor','$nurse','$company','$insuranceid','$expirydate','$holder','$ephone','$relation')";

     $a = mysqli_query($conn, $sql);

     if($a){
      echo '<script>
      $(document).ready(function(){
          Swal.fire({
              title: "Register!",
              text: "Patient Registered successfully!",
              icon: "success",
              confirmButtonText: "OK"
          }).then(function() {
              window.history.go(-2);
          });
      });
    </script>';
    }

    
}


?>

<body>
   
    
    <div class="sidebar"  >
        
        <div class="top">
              <!-- <div class="logo">
                  <img src="img/logo.webp" alt="img"  class="user-img">
                  <span class="logo_name">Health Care</span>
              </div> -->
              <i class='bx bx-menu' id="btn"></i>
        </div>

        <div class="user">
            <img src="https://www.shutterstock.com/image-photo/medical-concept-indian-beautiful-female-600nw-1635029716.jpg" alt="img" width="50px" height="50px" class="user-img" style="border-radius: 50%;">
            <div>
                <p class="bold">Health Care</h4>
                  <p>Receptionist</p>
                    
               
            </div>
        </div>

        <div class="accordion" style="background-color: purple;">
          <!-- receptionist -->
          <div class="accordion-item" style="border: none;">
              <h2 class="accordion-header" id="headingDoctor" >
                <button class="accordion-button shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseDashboard" aria-expanded="true" aria-controls="collapseDoctor" style="background-color: purple;color:white;">


                
                <i class="fa-solid fa-calendar-check"></i>

                <i class="fa-solid fa-user-crown fs-5 " style="color:white;"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="fs-6 ms-3 d-none d-sm-inline"  style="padding-bottom: 3px;">Appointment</span>
            </button>
              </h2>
              <div id="collapseDashboard" class="accordion-collapse collapse" aria-labelledby="headingDoctor"
                  data-bs-parent="#accordionExample">
                  <div class="accordion-body" style="background-color: purple;color: white;">
                      <a href="bookappointment.php" class="list-group-item list-group-item-action">New Appointment</a>
                      <a href="appointment.php" class="list-group-item list-group-item-action">View Appointment</a>
                      <a href="appointmentlist.php" class="list-group-item list-group-item-action">Appointment History</a>

                    
                  </div>

              </div>
          </div>
          <!-- Doctors -->


        <div class="accordion" style="background-color: purple;">
          <!-- Admin -->
          <div class="accordion-item" style="border: none;">
              <h2 class="accordion-header" id="headingDoctor" >
                  <button class="accordion-button shadow-none" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseDoctor" aria-expanded="true" aria-controls="collapseDoctor" style="background-color: purple;color: white;">

                        <i class="fa-solid fa-user-doctor"></i>

                      <i class="fa-solid fa-user-crown fs-5 " style="color:purple;"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                      <span class="fs-6 ms-3 d-none d-sm-inline"  style="padding-bottom: 3px;">Doctor</span>
                  </button>
              </h2>
              <div id="collapseDoctor" class="accordion-collapse collapse" aria-labelledby="headingDoctor"
                  data-bs-parent="#accordionExample">
                  <div class="accordion-body" style="background-color: purple;color: white;">
                      <a href="rdoctorlist.php" class="list-group-item list-group-item-action">Doctor list</a>
                   
                  </div>
              </div>
          </div>


          <div class="accordion-item" style="border: none;">
            <h2 class="accordion-header" id="headingNurse">
                <button class="accordion-button shadow-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseNurse" aria-expanded="true" aria-controls="collapseNurse" style="background-color: purple;color: white;">

                    <!-- <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse"data-bs-target="#dashboard" aria-expanded="false" aria-controls="dashboard" style="color: white;"> -->
                      <i class="fa-solid fa-user-nurse"></i>

                    <i class="fa-solid fa-user-crown fs-5 " style="color:purple;"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                    <span class="fs-6 ms-3 d-none d-sm-inline"  style="padding-bottom: 3px;">Nurse</span>
                </button>
            </h2>
            <div id="collapseNurse" class="accordion-collapse collapse" aria-labelledby="headingNurse"
                data-bs-parent="#accordionExample">
                <div class="accordion-body" style="background-color: purple;color: white;">
                    <a href="rnurselist.php" class="list-group-item list-group-item-action">Nurse Records</a>

                </div>
            </div>
        </div>
          <!-- Doctors -->
          <div class="accordion-item" style="border: none;">
              <h2 class="accordion-header" id="headingPatients">
                  <button class="accordion-button shadow-none" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapsePatients" aria-expanded="true"aria-controls="collapsePatients" style="background-color: purple;color: white;">
                      
                      <!-- <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse"data-bs-target="#dashboard" aria-expanded="false" aria-controls="dashboard" style="color: white;" > -->
                        <i class="fa-solid fa-users"></i>

                      <i class="fa-solid fa-user-crown fs-5 " style="color:purple;"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                      <span class="fs-6 ms-3 d-none d-sm-inline"  style="padding-bottom: 3px;">Patient</span>

                  </button>
              </h2>
              <div id="collapsePatients" class="accordion-collapse collapse" aria-labelledby="headingPatients"
                  data-bs-parent="#accordionExample">
                  <div class="accordion-body" style="background-color: purple;color: white;">
                      <a href="rpatient.php" class="list-group-item list-group-item-action">Patient Details</a>
                      <a href="rpregistration.php" class="list-group-item list-group-item-action">Patient Register</a>
                      

                  </div>
              </div>
          </div>
          <!-- Patients -->
         
          <!-- Blood Bank -->
          <div class="accordion-item" style="border: none;">
              <h2 class="accordion-header" id="headingBloodbank">
                  <button class="accordion-button shadow-none" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseBloodbank" aria-expanded="true"
                      aria-controls="collapseBloodbank" style="background-color: purple;color: white;">
                      
                      <!-- <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse"data-bs-target="#dashboard" aria-expanded="false" aria-controls="dashboard" style="color: white;"> -->
                        <i class="fa-solid fa-droplet"></i>

                      <i class="fa-solid fa-user-crown fs-6 " style="color:purple;"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                      <span class="fs-6 ms-3 d-none d-sm-inline"  style="padding-bottom: 3px;">Blood Bank</span>
                  </button>
              </h2>
              <div id="collapseBloodbank" class="accordion-collapse collapse"
                  aria-labelledby="headingBloodbank" data-bs-parent="#accordionExample">
                  <div class="accordion-body" style="background-color: purple;color: white;"> 
                      <a href="rbloodbank.php" class="list-group-item list-group-item-action">Available Blood</a>
                      <a href="rdonarlist.php" class="list-group-item list-group-item-action">Donar list</a>
                      <a href="rdonation.php" class="list-group-item list-group-item-action">New Donar</a>

                  </div>
              </div>
          </div>
          

              
              
          </div>
      </div>
      <!-- New Register -->
      
      <ul class="menu" style="padding-left: 0rem;" id="accordion">



          
<li class="sidebar-item">


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
    dropdown[i].addEventListener("click", function() {
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
   

<div class="main-content" style="padding: 0;">


  <nav class="navbar navbar-expand-lg bg-body-tertiary" id="navbar">
    <div class="container-fluid">


      <img src="https://marketplace.canva.com/EAFBb6P4OLs/1/0/1600w/canva-red-blue-simple-logo-hbl5vlZh180.jpg
      " alt="Bootstrap" width="55" height="54" style="border-radius: 50%; margin: 4px; float: right;">

      <a class="navbar-brand" href="receptionistd.php" id="b">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Dashboards
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Doctor</a></li>
              <li><a class="dropdown-item" href="#">Nurse</a></li>
              <li><a class="dropdown-item" href="#">Receptionist</a></li>
              <li><a class="dropdown-item" href="#">Accountant</a></li>
              <li><hr class="dropdown-divider"></li>
              
            </ul>
          </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
          
        </ul>
        <!-- <div class="search-container" style=" margin-bottom: 10px;">
            <form action="/action_page.php">
              <input type="text" placeholder="Search" name="search">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div> -->

          <svg xmlns="http://www.w3.org/2000/svg" href="logout.php" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
          </svg>

      </div>
    </div>
  </nav>


<!-- <div class="topnav" height="">
  <a class="" href="#home">Home</a>

  <img src="img/dr.jpg" alt="Bootstrap" width="55" height="54" style="border-radius: 50%;">
 
  <div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div> -->

<!-- <div style="padding-left:16px">



  <h2>Hello Good Morning!</h2>

  
</div> -->

<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="card ">

            <!-- <div class="header" style="background-color:purple;color:white;height:50px;"> -->
            <div class="header p-3" style="height:50px;">

                
                    <h3 class="card-title text-center"> <i class="fa-solid fa-hospital-user" style="color:purple;"></i>&nbsp;&nbsp;Patient Registration</h3>
                  </div>
                  <hr>
                <div class="card-body bg-light">
                    
                    <form method="post" action ="#" enctype="multipart/form-data">

                       
                        <div class="row ">
                           
                            <div class="form-group col-md-4">
                            <label for="patient">Patient Type<span class="text-danger">*</span></label>
                                <select class="form-select"  id="patient"  name="patient" required>
                               
                                <option value="" disabled selected hidden>Patient Types</option>
                                  <option value="OPD">OPD</option>
                                  <option value="IPD">IPD</option>
                                  <option value="Emergency">Emergency</option>
                                 </select>
                            </div>

                            <div class="form-group col-md-4">
                               <label for="fname">Name<span class="text-danger">*</span></label>
                         <input type="text" class="form-control" placeholder="Enter First Name" name="fname" id="fname"required>
                         <small id="fnameValidation" style="color: red"></small>
                        </div>


                            <div class="form-group col-md-4">
                                <label for="gender">Gender<span class="text-danger">*</span></label>
                                <select class="form-select"  id="gender"  name="gender" required>
                            <option value="" disabled selected hidden>Select Gender</option>
                           
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Other">Other</option>
                             
                            </select>
                            </div>

</div><br>


                        
                        <div class="row">
                           
                            <div class="form-group col-md-4">
                                <label for="aadhar">Aadhar No<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter Adhar No" name="aadhar" id="aadhar"
                                oninput="this.value=this.value.replace(/[^0-9]/g,'')"|size="12" minlength="12" maxlength="12"placeholder="123-899-783-123"required>
                            </div>
                        

                    <div class="form-group col-md-4">
                         <label for="address">Address</label>
                            <input type="text" textarea class="form-control" name="address" id=address rows="3" placeholder="Enter Patient's Address" ></textarea>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="contact">Contact</label>
                        <input type="text" class="form-control" placeholder="Enter Contact Number" name="contact" id="contact"oninput="this.value=this.value.replace(/[^0-9]/g,'')"
                        size="10"
                        minlength="10"
                        maxlength="10"
                        placeholder="0123456789" >
                    </div>
                  </div><br>


                  <div class="row">
                    <div class="form-group col-md-4">
                        <label for="aadhar">Emergency Contact</label>
                            <input type="text" class="form-control" placeholder="Enter econtact" name="econtacts" id="econtacts"
                            oninput="this.value=this.value.replace(/[^0-9]/g,'')"
                            size="10"
                            minlength="10"
                            maxlength="10"
                            placeholder="0123456789">
                    </div>
                       

                          <div class="form-group col-md-4">
                                <label for="dob">DOB</label>
                                <input type="date" class="form-control"  name="dob"  id="dob" placeholder="">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" placeholder="Age" name="age" id="age" >
                            </div>
</div><br>

                           
                    <div class="row">
                            <div class="form-group col-md-4">
                                <label for="height">Height</label>
                                <input type="height" class="form-control" placeholder="Height" name="height" id="height" >
                            </div>
                       
                  
                            <div class="form-group col-md-4">
                                <label for="weight">Weight</label>
                                <input type="text" class="form-control" placeholder="Weight" name="weight" id="weight" >
                            </div>

                 <div class="form-group col-md-4">
                 <label for="blood">Blood Group</label><br>
                    <select class="form-select"  name="blood" id="blood" >
                    <option value="" disabled selected hidden>Blood Group</option>
                    <!-- <option value= "disabled">Select Blood Group</option> -->
                      <option value="A+">A+</option>
                      <option value="A-">A-</option>
                      <option value="B+">B+</option>
                      <option value="B-">B-</option>
                      <option value="AB+">AB+</option>
                      <option value="AB-">AB-</option>
                      <option value="O+">O+</option>
                      <option value="O-">O-</option>
                    </select>
        </div>

</div><br>

                            <div class="row">

                            <div class="form-group col-md-4">
                                <label for="occupation">Occupation</label>
                            <input type="text" class="form-control" placeholder="Occupation" name="occupation" id="occupation">
                            <small id="occupationValidation" style="color: red"></small>
                            </div>

                       
                              <div class="form-group col-md-4">
                              <label for="medical">Medical History</label>
                            <input type="text" class="form-control" placeholder="Medical History" name="medical" id="medical" >
                            <small id="medicalValidation" style="color: red"></small>
                            </div>

                              
                            <div class="form-group col-md-4">
                                <label for="indate">Indate<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" placeholder="Enter Indate" name="indate" id="indate">
                               
                              </div>
</div><br>

                            

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="outdate">Outdate</label>
                                <input type="date" class="form-control"  name="outdate" id="outdate">
                              </div>
                         
                           
                                <div class="form-group col-md-4">
                                    <label for="roomno">Room No</label>
                                    <input type="text" class="form-control" placeholder="Enter Room Number" name="roomno" id="roomno">
                                </div>
    
                                  
                                <div class="form-group col-md-4">
                                    <label for="doctor">Doctor Assigned<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder=" Dr. Name" name="doctor" id="doctor"required>
                                   
                                  </div>
</div><br>

    
                               
             <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="nurse">Nurse Assigned<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Nurse Name" name="nurse" id="nurse"required >
                                  </div>
</div><br>
                               

                                <div>
                                    <button  onclick="preventsubmit(event);toggleDiv();" class="btn btn-danger">Insurance</button>   
                                </div> 

                                <p>Insurance Details</p>

                                <div id="hiddenDiv">

                            
                                
                           
                                <div class="row">

<div class="form-group col-md-4">
                 <label for="holder"> Insurance Company</label>
                 <input type="text" class="form-control" id="company" name="company" placeholder="Holder">
             </div>

             
     <div class="form-group col-md-4">
                 <label for="holder">Holder Name</label>
                 <input type="text" class="form-control" id="holder" name="holder" placeholder="Holder">
             </div>



               
             <div class="form-group col-md-4">
             <label for="insuranceid">Insurance Id</label>
<input type="text" class="form-control" id="insuranceid" name="insuranceid" placeholder="Insurance ID">
</div>
</div><br>
<div class="row">

   <div class="form-group col-md-4">
                 <label for="holder">Expiry Date</label>
                 <input type="date" class="form-control" id="expirydate" name="expirydate" placeholder="Holder">
             </div>


             
<div class="form-group col-md-4">
                 <label for="ephone">Emergency Contact</label>
                 <input type="text" class="form-control" id="ephone" name="ephone" placeholder="Emergency Contact"
                 name="contacts" id="contacts"
                 oninput="this.value=this.value.replace(/[^0-9]/g,'')"
                 size="10"
                 minlength="10"
                 maxlength="10"
                 placeholder="0123456789" >
                
               </div>
</div><br>


            <div class="row">     
             <div class="form-group col-md-4">
                 <label for="relation">Relation</label>
                 <input type="text" class="form-control" id="relation" name="relation" placeholder="Relation">
             
               </div>
</div><br>


                                            <script>
                                                function toggleDiv() {
                                                 var div = document.getElementById('hiddenDiv');
                                                if (div.style.display === 'none') {
                                                 div.style.display = 'block';
                                                } else {
                                                div.style.display = 'none';
                                              }
                                            }
                                                </script>


                                </div>




                                <div class="card-footer footer" >

                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="check"> 
                                       <label class="form-check-label" for="check">By submitting this form, I hereby declare that the information provided above is accurate and true to the best of my knowledge.</label>
                                       </div>

                            <div style="text-align:center">
                                <button type="submit" name="submit"  id="newbtn" class="btn btn-primary button">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="reset" name="reset"  id="newbtn" class="btn btn-dark button">Reset</button>
                                </div>
                        <div>
                        </div>
                                        </div>

                       
                    </form>
                </div>
            </div>
        </div>
    </div>

           
<script>
    // let hideshow=document.getElementByClass('emergency')

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
function preventsubmit(event)
{
    event.preventDefault();
}
</script>
<script>
    //validation for firstname.
      document
        .getElementById("fname")
        .addEventListener("input", function (event) {
          var fnameInput = event.target.value;
          var fnameRegex = /^[A-Za-z\s]+$/;
          var fnameValidation = document.getElementById("fnameValidation");

          if (!fnameRegex.test(fnameInput)) {
            fnameValidation.textContent =
              "Name must contain only letters and spaces.";
          } else {
            fnameValidation.textContent = "";
          }
        });
        //Validation for Middlename.
        document
        .getElementById("mname")
        .addEventListener("input", function (event) {
          var mnameInput = event.target.value;
          var mnameRegex = /^[A-Za-z\s]+$/;
          var mnameValidation = document.getElementById("mnameValidation");

          if (!mnameRegex.test(mnameInput)) {
            mnameValidation.textContent =
              "Name must contain only letters and spaces.";
          } else {
            mnameValidation.textContent = "";
          }
        });

        //Valiadtion for lastname.
        document
        .getElementById("lname")
        .addEventListener("input", function (event) {
          var lnameInput = event.target.value;
          var lnameRegex = /^[A-Za-z\s]+$/;
          var lnameValidation = document.getElementById("lnameValidation");

          if (!lnameRegex.test(lnameInput)) {
            lnameValidation.textContent =
              "Name must contain only letters and spaces.";
          } else {
            lnameValidation.textContent = "";
          }
        });

        //Validations for occupation filed.
        document
        .getElementById("occupation")
        .addEventListener("input", function (event) {
          var occupationInput = event.target.value;
          var occupationRegex = /^[A-Za-z\s]+$/;
          var occupationValidation = document.getElementById("occupationValidation");

          if (!occupationRegex.test(mnameInput)) {
            occupationValidation.textContent =
              "Name must contain only letters and spaces.";
          } else {
            occupationValidation.textContent = "";
          }
        });
    
        //Validations for submit filed.
      document
        .getElementById("registrationForm")
        .addEventListener("submit", function (event) {
          var inputs = document.querySelectorAll("input");
          var isValid = true;

          inputs.forEach(function (input) {
            if (!input.checkValidity()) {
              isValid = false;
            }
          });

          if (!isValid) {
            event.preventDefault();
          }
        });
</script>

</div>

</body>

<script>
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");
    let searchBtn = document.querySelector(".bx-search");

    btn.onclick = function(){
        sidebar.classList.toggle("active");
    };
</script>
</html>