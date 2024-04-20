<?php
session_start();


include('connection.php');
$query="SELECT COUNT(*) AS totaldr FROM hospital where Proffession='Doctor'";

$query1="SELECT COUNT(*) AS totalnr FROM hospital where Proffession='Nurse'";

$query2="SELECT COUNT(DISTINCT Department) AS totaldept FROM hospital ";

$query3="SELECT COUNT(*) AS totalpat FROM patients";






$res= mysqli_query($conn, $query);
$row= mysqli_fetch_assoc($res);
$countdr= $row['totaldr'];

$res1= mysqli_query($conn, $query1);
$row1= mysqli_fetch_assoc($res1);
$countnurse= $row1['totalnr'];

$res2= mysqli_query($conn, $query2);
$row2= mysqli_fetch_assoc($res2);
$countdept= $row2['totaldept'];


$res3= mysqli_query($conn, $query3);
$row3= mysqli_fetch_assoc($res3);
$countpat= $row3['totalpat'];


//ml to litre
function ml_to_litre($ml) {
  $litre = $ml / 1000;
  return $litre;
}

//Sum the blood group for Availability
//A+ve
$query4="SELECT SUM(Dblood_ml) AS totalblood FROM bdonation";
$res4= mysqli_query($conn, $query4);
$row4= mysqli_fetch_assoc($res4);
$count4= $row4['totalblood'];
$countblood=ml_to_litre($count4);



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Department Dashboard</title>
  <link rel="stylesheet" href="admin.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


  <script src="https://kit.fontawesome.com/6ee00b2260.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="app/deptmain.css" media="screen" >
</head>

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
        <!-- <div class="accordion-item" style="border: none;">
          <h2 class="accordion-header" id="headingDepartment">
            <button class="accordion-button shadow-none" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseDepartment" aria-expanded="true" aria-controls="collapseDepartment"
              style="background-color: purple;color: white;">

              comment.... <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse"data-bs-target="#dashboard" aria-expanded="false" aria-controls="dashboard" style="color: white">

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
        </div> -->
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

      
      <a href="departmentlist.php" class="btn btn-primary btn-sm" style="text-decoration:none;float: right;margin-right: 20px;">
    Department list</a>

    <a href="departmentreg.php" class="btn btn-primary btn-sm" style="text-decoration:none;float: right;margin-right: 20px;">Add
Department
    </a>
    



<div class="row mb-3 p-5">
  
<?php

$sql="SELECT * FROM department";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){
  $id=$row['id'];
  $name=$row['name'];
 
  $myfile=$row['myfile'];
 

//   echo '<div class="container mt-5 ">';
//   echo '<div class="row mb-3">';
//   echo '<div class="col-md-4" >';
//   echo '<a href="icumain.php" style="text-decoration:none">';
//   echo '<div class="card bg-light  mt-3">';
//   echo '<div class="card-body d-flex">';
//   echo '<img src="upload/departmentlogo/'.$myfile.'" class="card-img-left me-3" alt="Image 1" style="width: 50px; height: 50px"/>';
//   echo '<div>';
//   echo '<h5 class="card-title" >'.$name.'</h5>';  
 
//   echo '</div>';
//   echo '</div>';
//   echo '</div>';
//   echo '</a>';
//   echo '</div>';
//   echo '</div>';
//   echo '</div>';
// }



?>
        
        <div class="col-md-6 col-lg-4 col-xl-3" style="color:purple" >
        <a href="AdminDashboard.php" style="text-decoration:none">
          <div class="card bg-light  mt-3">
            <div class="card-body d-flex">
              <?php echo'<img src="upload/departmentlogo/'.$myfile.'" class="card-img-left me-3 img-fluid" alt="Image 1" style="width: 70px; height: 70px"/>';?>

              
              <div>
                <h5 class="card-title" style="color:purple" ><?php echo $name ?></h5>
                <div class="row" style="text-align: center;">
    <a href="departmentmain.php?dname=<?php echo $name?>" class="btn btn-primary" style="background-color: purple; border: none;">View Dept</a>
</div>

              </div>
            </div>
          </div>
          </a>
        </div>
        <?php } ?>
       
      </div>















    <!-- <div class="container mt-5 ">
      
      <div class="row mb-3">
        
        <div class="col-md-4" >
        <a href="AdminDashboard.php" style="text-decoration:none">
          <div class="card bg-light  mt-3">
            <div class="card-body d-flex">
              <img
                src="https://static.vecteezy.com/system/resources/thumbnails/011/718/508/small/brain-logo-template-design-brainstorm-logo-ideas-neurology-logo-think-idea-concept-free-vector.jpg"
                class="card-img-left me-3"
                alt="Image 1"
                style="width: 50px; height: 50px"
              />

              
              <div>
                <h5 class="card-title" >NEUROLOGY</h5>
                <p class="card-text">Text</p>
              </div>
            </div>
          </div>
          </a>
        </div>
       
        <div class="col-md-4">
        <a href="AdminDashboard.php" style="text-decoration:none">
          <div class="card bg-light mt-3">
            <div class="card-body d-flex">
              <img
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRj5t58BNAZoigBV7WmS4T5JFoNqavqPcpPKu5j0uYIBg&s"
                class="card-img-left me-3"
                alt="Image 2"
                style="width: 50px; height: 50px"
              />
              <div>
                <h5 class="card-title">GYNECOLOGY</h5>
                <p class="card-text">Text</p>
              </div>
            </div>
          </div>
          </a>
        </div>
       
        <div class="col-md-4">
             <a href="AdminDashboard.php" style="text-decoration:none">
          <div class="card bg-light mt-3">
            <div class="card-body d-flex">
              <img
                src="https://i.pinimg.com/736x/d3/08/ba/d308ba1a563908dde7efed86f26277f1.jpg"
                class="card-img-left me-3"
                alt="Image 3"
                style="width: 50px; height: 50px"
              />
              <div>
                <h5 class="card-title">CARDIOLOGY</h5>
                <p class="card-text">Text</p>
              </div>
            </div>
          </div>
          </a>
        </div>
      </div>

    
      <div class="row mb-3">
       
        <div class="col-md-4">
        <a href="AdminDashboard.php" style="text-decoration:none">
          <div class="card bg-light mt-3">
            <div class="card-body d-flex">
              <img
                src="https://static.vecteezy.com/system/resources/previews/019/761/802/non_2x/beauty-parlour-skincare-salon-spa-dermatology-clinic-logo-design-design-concept-free-vector.jpg"
                class="card-img-left me-3"
                alt="Image 4"
                style="width: 50px; height: 50px"
              />
              <div>
                <h5 class="card-title">DERMATOLOGY</h5>
                <p class="card-text">Text</p>
              </div>
            </div>
          </div>
          </a>
        </div>
     
        <div class="col-md-4">
            <a href="pythologymain.php" style="text-decoration:none">
          <div class="card bg-light mt-3">
            <div class="card-body d-flex">
              <img
                src="https://static.vecteezy.com/system/resources/thumbnails/007/636/003/small/microscope-icon-design-template-free-vector.jpg"
                class="card-img-left me-3"
                alt="Image 5"
                style="width: 50px; height: 50px"
              />
              <div>
                
                <h5 class="card-title">PYTHOLOGY</h5>
                <p class="card-text">Text</p>
              </div>
            </div>
          </div>
          </a>
        </div>
        
        <div class="col-md-4">
        <a href="AdminDashboard.php" style="text-decoration:none">
          <div class="card bg-light mt-3">
            <div class="card-body d-flex ">
              <img
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7dUlzS-tvcaPdU9Ezxpb1CtnJpPAGrPii1I8yB8Kz0-hZ0cxYeLeJSmotMY1qCbpLYDc&usqp=CAU"
                class="card-img-left me-3"
                alt="Image 6"
                style="width: 50px; height: 50px"
              />
              <div>
                <h5 class="card-title">RADIOLOGY</h5>
                <p class="card-text">Text</p>
              </div>
            </div>
          </div>
          </a>
        </div>
      </div>

     
      <div class="row mb-3">
        
        <div class="col-md-4">
        <a href="icumain.php" style="text-decoration:none">
          <div class="card bg-light mt-3">
            <div class="card-body d-flex">
              <img
                src="https://img.freepik.com/premium-vector/i-c-u-intensive-care-unit-logo-designs-medical-service_1093924-752.jpg"
                class="card-img-left me-3"
                alt="Image 7"
                style="width: 50px; height: 50px"
              />
              <div>
                <h5 class="card-title">ICU</h5>
                <p class="card-text">Text</p>
              </div>
            </div>
          </div>
          </a>
        </div>
       
        <div class="col-md-4">
        <a href="AdminDashboard.php" style="text-decoration:none">
          <div class="card bg-light mt-3">
            <div class="card-body d-flex">
              <img
                src="https://st2.depositphotos.com/1768926/10094/v/450/depositphotos_100947348-stock-illustration-dental-logo-template-healthy-business.jpg"
                class="card-img-left me-3"
                alt="Image 8"
                style="width: 50px; height: 50px"
              />
              <div>
                <h5 class="card-title">DENTAL</h5>
                <p class="card-text">text</p>
              </div>
            </div>
          </div>
          </a>
        </div>
       
        <div class="col-md-4">
        <a href="AdminDashboard.php" style="text-decoration:none">
          <div class="card bg-light mt-3">
            <div class="card-body d-flex">
              <img
                src="https://img.freepik.com/premium-vector/ent-doctor-logo-template-ear-nose-throat-doctor-clinic-mouth-health-otolaryngology-illustration_41737-1017.jpg"
                class="card-img-left me-3"
                alt="Image 9"
                style="width: 50px; height: 50px"
              />
              <div>
                <h5 class="card-title">Otolaryngology</h5>
                <p class="card-text">Text</p>
              </div>
            </div>
          </div>
          </a>
        </div>
      </div>
    </div> -->

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


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