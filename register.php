<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="admin.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


  <script src="https://kit.fontawesome.com/6ee00b2260.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css" />
  <script src="https://kit.fontawesome.com/6ee00b2260.js" crossorigin="anonymous"></script>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
    }

    .topnav {
      overflow: hidden;
      background-color: purple;


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

      .topnav a,
      .topnav input[type=text],
      .topnav .search-container button {
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

    /* .sidebar {
      position: sticky;
      top: 0;
      left: 0;
      height: 00vh;
      width: 80px;
      background-color: purple;
      padding: 0.4rem 0.8rem;
      transition: all 0.5s ease;
      overflow-y: auto;
      overflow-x: hidden;
      position: -webkit-sticky;
      position: sticky;
      top: 0;


    } */
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



    .accordion {
      font-family: Arial, Helvetica, sans-serif;
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
      color: purple !important;
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

    .sidebar.active~.main-content {
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
      display: none;
      /*display text size normal to bold  display:auto;*/
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
      width: 10px;
      /* Set the width of the scrollbar */
    }

    /* Change color of scrollbar thumb */
    .sidebar::-webkit-scrollbar-thumb {
      /* Set the color of the thumb */
      border-radius: 5px;
      /* Set the border radius of the thumb */
      height: 10px
    }

    /* Change color of scrollbar track */
    .sidebar::-webkit-scrollbar-track {
      background: #f1f1f1;
      /* Set the background color of the track */
    }


    #navbar {
      font-size: 12px;
      position: -webkit-sticky;
      position: sticky;
      top: 0;
      z-index: 2;
    }

    .container-fluid {
      background-color: purple;
      color: white;
      position: sticky;

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


    /* {$prefix}accordion-btn-focus-box-shadow: #{$accordion-button-focus-box-shadow}; */
  </style>

</head>


<?php
        
            include('connection.php');
            if(isset($_POST['submit'])){
                //print_r($_POST);die;

                // $name = $_POST['name'];
                // $email = $_POST['email'];
                // $address = $_POST['address'];
                // $aadharno=$_POST['aadharno'];
                // $dateofbirth=$_POST['dateofbirth'];

                // $blood = $_POST['blood'];
                // $gender = $_POST['gender'];
                // $username = $_POST['username'];
                // $password = $_POST['password'];
                // $mobno = $_POST['mobno'];
                // $profession = $_POST['profession'];
                // $qualification = $_POST['qualification'];
                // $department = $_POST['department'];
                $name = $_POST['name'];
                $profession = $_POST['profession'];
                $aadhar = $_POST['aadhar'];
                $contact = $_POST['contact'];
                $email = $_POST['email'];
                $dob=$_POST['dob'];
                $blood=$_POST['blood'];
                $gender=$_POST['gender'];
                $address=$_POST['address'];
                $user=$_POST['username'];
                $pass=$_POST['password'];
                $qualification = $_POST['qualification'];
                $department = $_POST['department'];
                $experience = $_POST['experience'];

                $myfile = $_FILES["myfile"]["name"];
                $tmpmyfile = $_FILES["myfile"]["tmp_name"];
                $folder = "uploads/" .$myfile;
                
                $sqla = "SELECT * FROM hospital where Aadhar_no= '$aadhar'";
                $resa = mysqli_query($conn,$sqla);
                

                
                    if (mysqli_num_rows($resa) > 0) {
                        echo "aadhar number already exists. Please choose another.";
                        echo "already registered!";
                    }else{   
               
            $sql = "INSERT INTO `hospital`(`Name`, `Proffession`, `Aadhar_no`, `Contact`, `Email`, `DOB`, `Blood_group`, `Gender`, `Address`, `Qualification`, `Department`, `Experience`, `Profile`, `Username`, `Password`) VALUES ('$name','$profession','$aadhar','$contact','$email','$dob','$blood','$gender','$address','$qualification','$department','$experience','$myfile','$user','$pass')";

            $a = mysqli_query($conn, $sql);
            move_uploaded_file($tmpmyfile, $folder);
            if($a){
              echo '<script>
                  $(document).ready(function(){
                     Swal.fire({
                    title: "Registered!",
                    text: "Registration Successfully.",
                    icon: "success"
                  }).then(function() {
                    window.history.go(-2);
                });
                  });
              </script>'; 
           } else {
               echo "fail";
           }



            // if($a){
            //     $sqll = "SELECT * FROM `hospital` WHERE `Proffession` = '$profession' ";
            //     $res = mysqli_query($conn,$sqll);
            //     $row = mysqli_fetch_assoc($res);

                // if($row){

                //     if($row['Proffession']== 'doctor'){
    
                //         $sql1 = "INSERT INTO `doctor` (`name`, `email`, `address`, `aadharno`, `dateofbirth`, `blood`, `gender`, `username`, `password`, `mobno`, `profession`, `qualification`, `department`, `myfile`) VALUES ('$name', '$email', '$address', '$aadharno', '$dateofbirth', '$blood', '$gender', '$username', '$password', '$mobno', '$profession', '$qualification', '$department', '$myfile')";
                        
                //         $d = mysqli_query($conn, $sql1); 
    
                //         if($d){
                //             echo '<script>
                //             $(document).ready(function(){
                //                 Swal.fire({
                //                     title: "Registered!",
                //                     text: "Data inserted successfully!",
                //                     icon: "success",
                //                     confirmButtonText: "OK"
                //                 }).then(function() {
                //                     window.location.href = "viewdoctors.php"; // Redirect to login.php after user clicks OK
                //                 });
                //             });
                //         </script>';
                //         }
                //         else{
                //             echo "fail";
                //         }
                //     }
                    
                //     elseif($row['Proffession']== 'receptionist'){
                //         $sql2 = "INSERT INTO `receptionist` (`name`, `email`, `address`, `aadharno`, `dateofbirth`, `blood`, `gender`, `username`, `password`, `mobno`, `profession`, `qualification`, `department`, `myfile`) VALUES ('$name', '$email', '$address', '$aadharno', '$dateofbirth', '$blood', '$gender', '$username', '$password', '$mobno', '$profession', '$qualification', '$department', '$myfile')";
                        
                //         $r = mysqli_query($conn, $sql2);
                        
                //         if($r){
                //             echo '<script>
                  //             $(document).ready(function(){
                  //                 Swal.fire({
                  //                     title: "Registered!",
                  //                     text: "Data inserted successfully!",
                  //                     icon: "success",
                  //                     confirmButtonText: "OK"
                  //                 }).then(function() {
                  //                     window.location.href = "viewreceptionist.php"; // Redirect to login.php after user clicks OK
                  //                 });
                  //             });
                  //         </script>';
                //         }
                //         else{
                //             echo "fail";
                //         }
                //     }
                    
                    
                //     elseif($row['Proffession']== 'nurse'){
                //         $sql3 = "INSERT INTO `nurse` (`name`, `email`, `address`, `aadharno`, `dateofbirth`, `blood`, `gender`, `username`, `password`, `mobno`, `profession`, `qualification`, `department`, `myfile`) VALUES ('$name', '$email', '$address', '$aadharno', '$dateofbirth', '$blood', '$gender', '$username', '$password', '$mobno', '$profession', '$qualification', '$department', '$myfile')";
                        
                //         $n = mysqli_query($conn, $sql3); 
    
                //         if($n){
                            
                //             echo '<script>
                  //             $(document).ready(function(){
                  //                 Swal.fire({
                  //                     title: "Registered!",
                  //                     text: "Data inserted successfully!",
                  //                     icon: "success",
                  //                     confirmButtonText: "OK"
                  //                 }).then(function() {
                  //                     window.location.href = "viewnurses.php"; // Redirect to login.php after user clicks OK
                  //                 });
                  //             });
                  //         </script>';
                //         }
                //         else{
                //             echo "there is some interuption";
                //         }
                //     }
    
    
    
                // }
                
            // }
                }

        
        }
        ?>



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
        <!-- Departments -->
        <div class="accordion-item" style="border: none;">
          <h2 class="accordion-header" id="headingDepartment">
            <button class="accordion-button shadow-none" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseDepartment" aria-expanded="true" aria-controls="collapseDepartment"
              style="background-color: purple;color: white;">

              <!-- <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse"data-bs-target="#dashboard" aria-expanded="false" aria-controls="dashboard" style="color: white"> -->
              <i class="fa-solid fa-boxes-stacked"></i>

              <i class="fa-solid fa-user-crown fs-5 " style="color:purple;"></i>&nbsp;&nbsp;&nbsp;&nbsp;
              <span class="fs-6 ms-3 d-none d-sm-inline" style="padding-bottom: 3px;">Departments</span>
            </button>
          </h2>
          <div id="collapseDepartment" class="accordion-collapse collapse" aria-labelledby="headingDepartment"
            data-bs-parent="#accordionExample">
            <div class="accordion-body" style="background-color: purple;color: white;">
              <a href="#" class="list-group-item list-group-item-action">Neurologiest</a>
              <a href="#" class="list-group-item list-group-item-action">Gynecologist</a>
              <a href="#" class="list-group-item list-group-item-action">Cardiologist</a>
              <a href="#" class="list-group-item list-group-item-action">Dermatologist</a>
              <a href="#" class="list-group-item list-group-item-action">Orthopedic</a>
              <a href="#" class="list-group-item list-group-item-action">Radiologist</a>
              <a href="#" class="list-group-item list-group-item-action">ICU</a>
              <a href="#" class="list-group-item list-group-item-action">Dental</a>



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


  <div class="main-content" style="padding: 0;">


    <nav class="navbar navbar-expand-lg bg-body-tertiary" id="navbar">
      <div class="container-fluid">


        <img src="https://marketplace.canva.com/EAFBb6P4OLs/1/0/1600w/canva-red-blue-simple-logo-hbl5vlZh180.jpg
      " alt="Bootstrap" width="55" height="54" style="border-radius: 50%; margin: 4px; float: right;">

        <a class="navbar-brand" href="AdminDashboard.php" id="b">Home</a>
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

    <div class="container border bg-light p-3">
        <div class="registration">
      <h2 style="text-align: center;font-family: Arial, Helvetica, sans-serif;"><i class="fa-solid fa-hospital-user"></i>&nbsp;Registration</h2>
      <hr>
      <form method="post" action="#" enctype="multipart/form-data" id="registrationForm">
        <div class="row">
          <div class="col-md-6">
                <label for="name">Name<span class="text-danger">*</span> :</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required />
                <small id="nameValidation" style="color: red"></small>
          </div>
          <div class="col-md-6">
              <label for="profession">Profession<span class="text-danger">*</span> :</label>
                <select name="profession" id="profession" class="form-control" required>
                  <option value="Admin">Admin</option>
                  <option value="Doctor">Doctor</option>
                  <option value="Staff">Staff</option>
                  <option value="Nurse">Nurse</option>
                  <option value="Receptionist">Receptionist</option>
                  <option value="Accountant">accountant</option>
                </select>
          </div>
        </div>
        <!-- Other form fields -->
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="aadharno">Aadhar No<span class="text-danger">*</span> :</label>
            <input type="text" class="form-control" name="aadhar" id="aadharno"
              oninput="this.value=this.value.replace(/[^0-9]/g,'')" size="12" minlength="12" maxlength="12"
              placeholder="1234-4567-7891" placeholder="enter your aadhar no" required />
            <small id="aadharnoValidation" style="color: red"></small>
          </div>
          <div class="col-md-6 mb-3">
            <label for="mobno">Contact<span class="text-danger">*</span> :</label>
            <input type="text" class="form-control" name="contact" id="mobno"
              oninput="this.value=this.value.replace(/[^0-9]/g,'')" size="10" minlength="10" maxlength="10"
              placeholder="0123456789" placeholder="Enter your phone no" required />
            <small id="mobno" style="color: red"></small>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="dateofbirth">Date of Birth :</label>
            <input type="date" class="form-control" name="dob" id="dateofbirth" />
          </div>
          <div class="col-md-6 mb-3">
            <label for="blood">Choose a Blood Group:</label>
            <select name="blood" id="blood" class="form-control">
              <option value="">Select blood group</option>
              <option value="A +ve">A+ve</option>
              <option value="B +ve">B+ve</option>
              <option value="O +ve">O+ve</option>
              <option value="A -ve">A-ve</option>
              <option value="B -ve">B-ve</option>
              <option value="O -ve">O-ve</option>
              <option value="AB -ve">AB-ve</option>
              <option value="AB +ve">AB+ve</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="email">Email Id :</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" />
            <small id="emailValidation" style="color: red"></small>
          </div>
          <div class="col-md-6 mb-3">
            <label for="gender"  class="form-check-label" required>Gender<span class="text-danger">*</span> :</label><br>
            <input type="radio" class="form-check-input" name="gender" id="gender" value="male" /> Male
            <input type="radio" class="form-check-input" name="gender" id="gender" value="female" /> Female
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
              <label for="address">Address :</label>
              <input type="text" class="form-control" name="address" id="address" style="height: 60px" />
          </div>
          <div class="col-md-6 mb-3">
            <label for="qualification">Qualification<span class="text-danger">*</span> :</label>
            <input type="text" name="qualification" class="form-control" id="qualification" style="height: 60px" required />
          </div>
          
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            
             <label for="department">Department<span class="text-danger">*</span> :</label>
            <select name="department" class="form-select" required>
              <option>Select Department</option>
              <option value="neurology">Neurology</option>
              <option value="gynaecology">Gynaecology</option>
              <option value="cardiology">Cardiology</option>
              <option value="dermatology">Dermatology</option>
              <option value="radiology">Radiology</option>
              <option value="ortho">Ortho</option>
              <option value="dentistry">Dentistry</option>
            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label for="experience">Experience<span class="text-danger">*</span> :</label>
            <input type="text" class="form-control" name="experience" id="experience" placeholder="Enter your number"
              required />
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
          <label for="myfile">Upload your Image :</label>
            <input type="file" class="form-control" name="myfile" id="myfile" placeholder="Upload the image"
              accept="image/*;capture=camera" >

            <script>
              const myInput = document.getElementById("myfile");

              function sendPic() {
                const file = myInput.files[0];
                // Send the file here (e.g., using FormData and XHR)
                // or handle it as needed.
              }

              myInput.addEventListener("change", sendPic, false);
            </script>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            
            <label for="username">Username<span class="text-danger">*</span> :</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Enter your Username"
              required />
          </div>
          <div class="col-md-6 mb-3">
            <label for="password">Password<span class="text-danger">*</span> :</label>
            <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" id="password" required />
              <span class="input-group-text" onclick="password_show_hide();">
                <i class="fas fa-eye" id="show_eye"></i>
                <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
              </span>
            <br />
            <small id="passwordValidation" style="color: red"></small>
            </div>
          </div>

          <div class="row d-none">
            <div class="col-md-6 mb-3">
              <label for="registrationdate"></label>
              <input type="text" name="registrationdate" />
            </div>
          </div>
        </div>
        <div style="text-align:center">
          <button type="submit" name="submit" id="newbtn"
            class="btn btn-primary button">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <button type="reset" name="reset" id="newbtn" class="btn btn-dark button">Reset</button>
        </div>
      </form>
          </div>
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
<script>
    document
      .getElementById("name")
      .addEventListener("input", function (event) {
        var nameInput = event.target.value;
        var nameRegex = /^[A-Za-z\s]+$/;
        var nameValidation = document.getElementById("nameValidation");

        if (!nameRegex.test(nameInput)) {
          nameValidation.textContent =
            "Name must contain only letters and spaces.";
        } else {
          nameValidation.textContent = "";
        }
      });

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

  <script>
    //aadhar field valiadtion
    document
      .getElementById("aadhar")
      .addEventListener("input", function (event) {
        var aadharno = event.target.value;
        var aadharno = /^[A-Za-z\s]+$/;
        var aadharnoValidation =
          document.getElementById("aadharnoValidation");

        if (!nameRegex.test(nameInput)) {
          nameValidation.textContent = "aadhar must contains only numbers.";
        } else {
          nameValidation.textContent = "";
        }
      });

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

  <script>
    //email filed Valiadtion
    document
      .getElementById("email")
      .addEventListener("input", function (event) {
        var emailInput = event.target.value;
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        var emailValidation = document.getElementById("emailValidation");

        if (!emailRegex.test(emailInput)) {
          emailValidation.textContent =
            "email must contains only lowercaseletters.";
        } else {
          emailValidation.textContent = "";
        }
      });

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
  <script>
    //password field Validations
    document
      .getElementById("password")
      .addEventListener("input", function (event) {
        var passwordInput = event.target.value;
        var passwordRegex =
          /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/;
        var passwordValidation =
          document.getElementById("passwordValidation");

        if (!passwordRegex.test(passwordInput)) {
          passwordValidation.textContent =
            "Password must contain at least one digit, one lowercase letter, one uppercase letter, one special character, and be at least 8 characters long.";
        } else {
          passwordValidation.textContent = "";
        }
      });

    // Form submission validation
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
  <!-- hide and show password script -->
  <script>
        function password_show_hide() {
            var x = document.getElementById("password");
            var show_eye = document.getElementById("show_eye");
            var hide_eye = document.getElementById("hide_eye");
            hide_eye.classList.remove("d-none");
            if (x.type === "password") {
              x.type = "text";
              show_eye.style.display = "none";
              hide_eye.style.display = "block";
            } else {
              x.type = "password";
              show_eye.style.display = "block";
              hide_eye.style.display = "none";
            }
        }
    </script>

</html>