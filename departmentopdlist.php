<?php
session_start();
 //$patient = $_SESSION['patient'];
include('connection.php');


    $sql1 = "SELECT * FROM `patients` WHERE `patient` = 'OPD'";
    $res1 = mysqli_query($conn,$sql1);

            
      $sql = "SELECT * FROM patients";
      $result = $conn->query($sql);
      
      if(isset($_POST['submit'])){
        $report = $_FILES["myfile"]["name"];
        $tmpmyfile = $_FILES["myfile"]["tmp_name"];
        $folder = "upload/reports/" .$report;

        $rid=$_POST['rid'];

        // $sql="INSERT INTO `patients` (`report`)VALUES('$report') WHERE `id` = '$rid'";
        $sql="UPDATE `patients` SET `report` = '$report'
        WHERE `id` = '$rid'";
        $a = mysqli_query($conn, $sql);
            move_uploaded_file($tmpmyfile, $folder);

            if($a){
              echo '<script>
                  $(document).ready(function(){
                     Swal.fire({
                    title: "Registered!",
                    text: "Report Added Successfully.",
                    icon: "success"
                  }).then(function() {
                    window.history.go(-2);
                });
                  });
              </script>'; 
           } else {
               echo "fail";
           }
          }



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

   <div class="container">
   <div class="container table-responsive">
    <div class="row" style="margin-top:20px">
        
        <div class="col-sm-8">
    <h2>OPD Patients List</h2>
    </div>
    <div class="col-sm-4">
    
    <div class="input-group  mb-3">
                                 <input type="text" class="form-control shadow-none " placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2" id="search" onkeyup="searchfun()"style="z-index: 1;">
                               <button class="btn btn-outline-dark " type="button" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                              </div>
    </div>
  </div>


                      
       <div class="table-responsive" style="text-align:center">
        <table class="table table-bordered table-hover mt-4" id="mytable">
            <thead class="bg-primary" style="background-color">
                <tr>
                    <th scope="col">Sr. No.</th>
                    <th scope="col">Patient Type</th>
                    <th scope="col"> Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Aadhar</th>
                    <th scope="col">Upload Reports</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $cn = 1;
                while($row= mysqli_fetch_array($res1)){ ?>
                    <tr>
                        <td><?php echo $cn++; ?></td>
                        <td><?php echo $row['patient'];?></td>
                        <td><?php echo $row['fname'];?></td>
                        <td><?php echo $row['gender'];?></td>
                        <td><?php echo $row['aadhar'];?></td>
                       <td >
                        <form method="post" enctype="multipart/form-data">
                        <div class="row justify-content-center">
                          <input type="hidden" name="rid" value="<?php echo $row['id'] ?>">
                          <div class="col-md-8"><input type="file" value="<?php echo $report ?>"  name="myfile" class="form-control"></div>
                          <div class="col-md-2"><input type="submit" class="btn btn-primary" name="submit" value="Add"></div>
                        </div>
                        </form>
                      
                      
                    </td>
                        <td>
                            <a href="pprofiledepartment.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">View</a>
                            <a href="editpatient.php?id=<?php echo $row['id'];?>" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            <a href="deletepatient.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
                </div>
<!-- <?php ?> -->
       
    
    </div>




<script>
                    function searchfun(){
                        let filter = document.getElementById('search').value.toUpperCase();
                        let mytab = document.getElementById('mytable');
                        let tr = mytab.getElementsByTagName('tr');

                        for(var i=0;i<tr.length;i++){


                            
                                
                                    let td= tr[i].getElementsByTagName('td')[2];
                                    let td2= tr[i].getElementsByTagName('td')[4];
                                    
                                    
                                    // console.log(td);
                                    if(td || td2){
                                        let textvalue = td.textContent || td.innerHTML;
                                        let textvalue2 = td2.textContent || td2.innerHTML;
                                        
                                        
                                        if(textvalue.toUpperCase().indexOf(filter)>-1) {
                                            tr[i].style.display=""; 
                                            
                                        }else if(textvalue2.toUpperCase().indexOf(filter)>-1) {
                                            tr[i].style.display=""; 
                                        
                                        }else{
                                            tr[i].style.display="none"; 

                                        }
                                    }
                           



  
  
</div>







<script>
  let btn = document.querySelector("#btn");
  let sidebar = document.querySelector(".sidebar");
  let searchBtn = document.querySelector(".bx-search");

  btn.onclick = function () {
    sidebar.classList.toggle("active");
  };
</script>





</body>

<script>
  let btn = document.querySelector("#btn");
  let sidebar = document.querySelector(".sidebar");
  let searchBtn = document.querySelector(".bx-search");

  btn.onclick = function () {
    sidebar.classList.toggle("active");
  };
</script>

                         
  </body>
</html>