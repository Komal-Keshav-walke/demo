
<?php
include('../connection.php');
//Overall donar count
$query="SELECT COUNT(*) AS total FROM bdonation";
$res= mysqli_query($conn, $query);
$row= mysqli_fetch_assoc($res);
$count= $row['total'];
//today donar count
$queryd="SELECT COUNT(*) AS dtotal FROM bdonation Where DATE(date) = CURDATE()";
$dres= mysqli_query($conn, $queryd);
$drow= mysqli_fetch_assoc($dres);
$dcount= $drow['dtotal'];


//ml to liter
function ml_to_liter($ml) {
  $liter = $ml / 1000;
  return $liter;
}

//Sum the blood group for Availability
//A+ve
$query1="SELECT SUM(Dblood_ml) AS total1 FROM bdonation WHERE Blood='A+ve'";
$res1= mysqli_query($conn, $query1);
$row1= mysqli_fetch_assoc($res1);
$count1= $row1['total1'];
$Apositive=ml_to_liter($count1);

//A-ve
$query2 = "SELECT SUM(Dblood_ml) AS total2 FROM bdonation WHERE Blood='A-ve'";
$res2 = mysqli_query($conn, $query2);
$row2 = mysqli_fetch_assoc($res2);
$count2 = $row2['total2'];
$Anegative=ml_to_liter($count2);

//B+ve
$query3="SELECT SUM(Dblood_ml) AS total3 FROM bdonation WHERE Blood='B+ve'";
$res3= mysqli_query($conn, $query3);
$row3= mysqli_fetch_assoc($res3);
$count3= $row3['total3'];
$Bpositive=ml_to_liter($count3);

//B-ve
$query4="SELECT SUM(Dblood_ml) AS total4 FROM bdonation WHERE Blood='B-ve'";
$res4= mysqli_query($conn, $query4);
$row4= mysqli_fetch_assoc($res4);
$count4= $row4['total4'];
$Bnegative=ml_to_liter($count4);

//O+ve
$query5 = "SELECT SUM(Dblood_ml) AS total5 FROM bdonation WHERE Blood='O+ve'";
$res5 = mysqli_query($conn, $query5);
$row5 = mysqli_fetch_assoc($res5);
$count5 = $row5['total5'];
$Opositive=ml_to_liter($count5);

//O-ve
$query6 = "SELECT SUM(Dblood_ml) AS total6 FROM bdonation WHERE Blood='O-ve'";
$res6 = mysqli_query($conn, $query6);
$row6 = mysqli_fetch_assoc($res6);
$count6 = $row6['total6']; // Adjusted to correct key 'total6'
$Onegative=ml_to_liter($count6);

//AB+ve
$query7 = "SELECT SUM(Dblood_ml) AS total7 FROM bdonation WHERE Blood='AB+ve'";
$res7 = mysqli_query($conn, $query7);
$row7 = mysqli_fetch_assoc($res7);
$count7 = $row7['total7'];
$ABpositive=ml_to_liter($count7);


//AB-ve
$query8="SELECT SUM(Dblood_ml) AS total8 FROM bdonation WHERE Blood='AB-ve'";
$res8= mysqli_query($conn, $query8);
$row8= mysqli_fetch_assoc($res8);
$count8= $row8['total8'];
$ABnegative=ml_to_liter($count8);


?>


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

/* doctor name text */
@keyframes typing {
      from { width: 0 }
      to { width: 100% }
  }

  .animated-text {
      overflow: hidden; /* Ensures text remains within the box */
      /* Simulates cursor */
      white-space: nowrap; /* Prevents text from wrapping */
      animation: typing 3s steps(40, end) ;
  }


  .patient:hover{
    color:black;
}
.card{
    height:120px;
    width:250px;

    display:inline-block;
     margin:50px; 
    background-color: white;
  
    align-items: center;
   
   
    
}

  
    /* .menu ul,li:hover {
  display: inline-block;
} */

    /* *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    
}
.user-img{
    width: 60px;
    height: 60px;
    border-radius: 100%;
    border: 1px solid #eee;
}



.sidebar{
    position: absolute;
    top: 0;
    left: 0;
    height: 130vh;
    width: 80px;
    background-color:purple ;
    padding: 0.4rem 0.8rem;
    transition: all 0.5s ease;
    position: fixed;
}


 .sidebar.active ~ .main-content{
    left: 250px;
    width: calc(100% - 250px);
}
.sidebar.active{
    width: 250px;
}
 .sidebar #btn{
    position: absolute;
    color: #fff;
    top: .2rem;
    left:50%;
    font-size: 1.2rem;
   line-height:40px;
    cursor: pointer;
    transform: translateX(-50%);
}

.sidebar.active #btn{
    left: 90%;

} 

.sidebar.top.logo{
    display: flex;
    color: #fff;
    height: 50px;
    width: 100%;
    align-items: center;
    pointer-events: none;
    opacity: 0;
}

.sidebar.active.top.logo{
    opacity: 1;
   
}

.top.logo i{
    font-size: 2rem;
    margin-right: 5px;
}

.user{
    display: flex;
    align-items: center;
    margin: 1rem 0;
}

.user p{
    color: #fff;
    opacity: 1;
    margin-left: 1rem;
   
} 

.bold{
    font-weight: 600;
}

.sidebar p{
    opacity: 0;
}
.sidebar.active p{
    opacity: 1;
}


.sidebar ul li{
    position: relative;
    list-style-type:none;
    height:50px;
    width: 90%;
    margin: 0.8rem auto;
    line-height: 50px;
    
}

.sidebar ul li a{
    
    color: #fff;
    text-decoration: none;
    display: flex;
    align-items: center;
    text-decoration: none;
    border-radius: 0.8rem;
    
    
}

.sidebar ul li a:hover{
    background-color: #fff;
    color: purple;
}

.sidebar ul li a i{
   min-width: 50px;
   text-align: center;
   height:50px;
   border-radius: 12px;
   line-height: 50px;
   
}

.sidebar .nav-item{
    opacity: 1;
    margin-left: 13px;
    
}

.sidebar ul li .tooltip{
    position: absolute;
    left:125px;
    top: 50%;
    transform: translateY(-50%, -50%);
    box-shadow: 0 0.5rem 0.8rem  rgba(0,0,0,0.2);
    border-radius: .6rem;
    padding: 0.4rem 1.2rem;
    line-height: 1.8rem;
    z-index:20;
    opacity: 0;
}

.sidebar ul li a:hover .tooltip{
    opacity: 1;
    
}

.sidebar.active ul li .tooltip{
    display: none;
}

.main-content{
    position: relative;
    min-height: 100vh;
    top: 0;
    left: 80px;
    width: calc(100% - 80px);
    height: 100vh;
    background-color: #f4f4f4;
    transition: all 0.5s ease;
    padding: 1rem;

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
        <p>Doctor</p>


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
            <span class="fs-6 ms-3 d-none d-sm-inline" style="padding-bottom: 3px;">Patients</span>
          </button>
        </h2>
        <div id="collapseDashboard" class="accordion-collapse collapse" aria-labelledby="headingDoctor"
          data-bs-parent="#accordionExample">
          <div class="accordion-body" style="background-color: purple;color: white;">
            <a href="imppatientlist.php" class="list-group-item list-group-item-action">All Patients</a>
            <a href="ipdpatientslist.php" class="list-group-item list-group-item-action">Ipd Patients</a>
            
            <a href="opdpatientslist.php" class="list-group-item list-group-item-action">Opd patients</a>
            <a href="emergencypatientslist.php" class="list-group-item list-group-item-action">Emergency Patients</a>

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
              <span class="fs-6 ms-3 d-none d-sm-inline" style="padding-bottom: 3px;">Appointments</span>
            </button>
          </h2>
          <div id="collapseDoctor" class="accordion-collapse collapse" aria-labelledby="headingDoctor"
            data-bs-parent="#accordionExample">
            <div class="accordion-body" style="background-color: purple;color: white;">
              <a href="doctorappointmentlist.php" class="list-group-item list-group-item-action">Appointment  list</a>
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
              <span class="fs-6 ms-3 d-none d-sm-inline" style="padding-bottom: 3px;">Nurse</span>

            </button>
          </h2>
          <div id="collapsePatients" class="accordion-collapse collapse" aria-labelledby="headingPatients"
            data-bs-parent="#accordionExample">
            <div class="accordion-body" style="background-color: purple;color: white;">
              <a href="doctornurseview.php" class="list-group-item list-group-item-action">Nurse Records</a>
              

            </div>
          </div>
        </div>
        <!-- Patients -->
       
        <!-- Accountant -->
        
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
              <a href="dbloodbank.php" class="list-group-item list-group-item-action">Available Blood</a>
              <a href="donarlist.php" class="list-group-item list-group-item-action">Donar list</a>
            </div>
          </div>
        </div>
        <!-- Departments -->
        
        <!-- Inventory -->
        <div class="accordion-item" style="border: none;">
       
          



        </div>
      </div>
      <!-- New Register -->

    </div>







    <ul class="menu" style="padding-left: 0rem;" id="accordion">



          
        <li class="sidebar-item">




</a>
<a href="../logout.php" class="sidebar-link has-dropdown collapsed">
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
    <div class="container-fluid" id="content">

<div class="card">
  <a href="imppatientlist.php">
  <img src="https://cdn-icons-png.flaticon.com/512/9450/9450083.png" height="70px" width="70px" style="margin-left:90px;margin-top: 10px;" ></a>
<p style="text-align: center;">Patient Record</p>
</div>

<div class="card" >
  <a href="">
  <img src="https://cdn2.iconfinder.com/data/icons/hospital-169/25/medical_check_up_1_pictogram_hospital_duo_color_line_f-1024.png" height="70px" width="70px" href=""  style="margin-left:90px;margin-top: 10px;"></a>
<p  style="text-align: center;">Patient Reports</p>
</div>

</div>

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

</html>