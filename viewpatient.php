<?php
session_start();
// $id = $_SESSION['id'];
include('../connection.php');



$sql = "SELECT * FROM `patients`";
$res = mysqli_query($conn, $sql);
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <style>
       

        #img{
            padding-left: 10px;
        }

        .butt:hover{
            background-color: purple;
            color: aliceblue;

        }
        /* .home:hover{
            background-color: black;
            color: black;

        } */

        #content {
            background-image:url('images/hospitalbackground.jpg');
            background-size: cover;
            height: 90%;
            width: auto;
            
        }
        .patient:hover{
            color:black;
        }
        .card{
            height:100px;
            width:200px;
        
            display:inline-block;
            margin:50px;
              background-color: transparent;
              border: none;
           
            
        }

       
    </style>

</head>
<body>
    <div class="fluid-container">
        <div class="row">
            <div class="col-sm-2 " style="outline: 2px solid gray;">
                <center><img width="100" align="center" src="../images/1600w-hbl5vlZh180.webp"
                ><br>
                    <font color="PURPLE" style="font-size: 20px;font-family: Arial, Helvetica, sans-serif;font-weight: bold;">Health Care</font>
                </center>
                <hr style="margin: 7px; ">
                <!-- <div><img src="uploads/<?php //echo $row['Profile']; ?>" alt="image" height="80px" width="80px" style="border-radius: 50%;margin-left: 9px;">&nbsp;&nbsp;&nbsp;&nbsp;<font style="font-size: 20px; font-weight: bold;"><?php //echo $row['Name'] ?></font></div> -->

                <hr style="margin: 7px; ">
                <div class="dropdown butt" style="width:100%;margin-left:7px">
                    <!-- <button class="btn dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width:100%;padding-left:7px;"><i class="fa-solid fa-user-doctor"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Appointment
                  </button> -->
                   <ul class="dropdown-menu">
                     <li><a class="dropdown-item" href="doctor.php">patient1 details</a></li>
                     <li><a class="dropdown-item" href="drview.php">patient1 details</a></li>
                     
                 </ul>
                </div><br>

                <div class="dropdown butt" style="width:100%;margin-left:7px">
                  <button class="btn dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width:100%;padding-left:7px;"><i class="fa-solid fa-users"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Patients
      </button>
                   <ul class="dropdown-menu">
                    
                     <a class="dropdown-item" href="ipdpatientslist.php">IPD Patient Records</a>
                     <a class="dropdown-item" href="opdpatientlists.php">OPD Patient Records</a>
                     <a class="dropdown-item" href="emergencypatientslist.php">Emergency Patient Records</a>
                    
                 </ul>
                </div><br>


                <!-- <div class="dropdown butt" style="width:100%;margin-left:7px">
                    <button class="btn dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width:100%;padding-left:7px;"><i class="fa-solid fa-users"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Reports
                  </button>
                   <ul class="dropdown-menu">
                   <a class="dropdown-item" href="#">Blood Reports</a>
            <a class="dropdown-item" href="#">X-Rays</a>
            <a class="dropdown-item" href="#">MRI Scans</a>
                     
                     
                 </ul>
                </div><br>     -->


                <div class="dropdown butt" style="width:100%;margin-left:7px">
                    <button class="btn dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width:100%;padding-left:7px;"><i class="fa-solid fa-user-nurse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nurse&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   
                  </button>
                   <ul class="dropdown-menu">
                     <li><a class="dropdown-item" href="">Nurse Records</a></li>
                     
                 </ul>
                </div><br>


                <!-- <div class="dropdown butt" style="width:100%;margin-left:7px">
                    <button class="btn dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width:100%;padding-left:7px;"><i class="fa-solid fa-money-bill-transfer"></i></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Billing
                  </button>
                   <ul class="dropdown-menu">
                     <li><a class="dropdown-item" href="#">Patients Records</a></li>
                     
                    
                     
                 </ul>
                </div><br> -->

                <div class="dropdown butt" style="width:100%;margin-left:7px">
                    <button class="btn dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width:100%;padding-left:7px;"><i class="fa-solid fa-droplet"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                     Blood Bank
                  </button>
                   <ul class="dropdown-menu">
                     <li><a class="dropdown-item" href="#">Available Blood</a></li>
                     <li><a class="dropdown-item" href="">Donar list</a></li>
                     <!-- <li><a class="dropdown-item" href="">Donar Registration</a></li> -->
                 </ul>
                </div><br>

                <!-- <div class="dropdown butt" style="width:100%;margin-left:7px">
                    <button class="btn dropdown form-control" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width:100%;padding-left:7px;"><i class="fa-solid fa-boxes-stacked"></i>&nbsp;&nbsp;&nbsp;
                     Departments
                  </button>
                   <ul class="dropdown-menu" id="butt">
                     <li><a class="dropdown-item" href="#">Neurologist</a></li>
                     <li><a class="dropdown-item" href="#">Gynecologist</a></li>
                     <li><a class="dropdown-item" href="#">Cardiologist</a></li>
                     <li><a class="dropdown-item" href="#">Dermatologist</a></li>
                     <li><a class="dropdown-item" href="#">Radiologist</a></li>
                     <li><a class="dropdown-item" href="#">Orthopedic</a></li>
                     <li><a class="dropdown-item" href="#">ICU</a></li>
                     <li><a class="dropdown-item" href="#">Dental</a></li>
                 </ul>
                </div><br> -->

                <a href="logout.php" style="text-decoration: none;"><button class="form-control butt" style="text-decoration: none;" id="butt"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;Log Out</button></a><br><br><br><br>

                                            

                <hr style="margin: 7px;">
            </div>

            <div class="col-sm-10">
                <nav class="navbar navbar-expand-lg bg-body-tertiary" >
                    <div class="container-fluid" style="background-color:purple">
                        <a class="navbar-brand" href="#">
                            <img src="images/1600w-hbl5vlZh180.webp" alt="Bootstrap" width="55" height="54" style="border-radius: 50%;">
                          </a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <a href="regestration.php" class="btn btn-primary">
    <i class="fas fa-home"></i> New Regester
</a>
                          <li class="nav-item">
                            <a class="nav-link" href="#" style="color: aliceblue;"></a>
                          </li>
                          <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: aliceblue;">
                              Dashboard
                            </a>

                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="AdminDashboard.php">Admin</a></li>
                              <li><a class="dropdown-item" href="Doctor.php">Doctor</a></li>
                              <li><a class="dropdown-item" href="staffd.php">Staff</a></li>
                              <li><a class="dropdown-item" href="Accountant.php">Accountant</a></li>
                              <li><a class="dropdown-item" href="Nurse.php">Nurse</a></li>
                              <li><a class="dropdown-item" href="receptionistd.php">Receptionist</a></li>
                              
                            </ul>
                          </li> -->
                          
                        </ul>
                        <div class="input-group mb-3" width=50% style="margin-left:55%;margin-top:15px">
                           <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2" >
                         <button class="btn btn-outline-primary" type="button" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                        <!-- <form class="d-flex" role="search">
                          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                          <button class="btn btn-outline-success" type="submit">Search</button>
                        </form> -->
                      </div>
                    </div>
                  </nav>


                 

                  <div class="container table-responsive">


<table class="table table-bordered mt-4 m-4" id="mytable">
<tr>
<th>sr.no</th>
<th>Patient Type</th>
<th> Name</th>

<th>Gender</th>
<th>Aadhar</th>
<th>address</th>
<th>contact</th>
<th>dob</th>
<th>Age</th>
<th>Height</th>
<th>Weight</th>
<th>blood</th>
<th>Occupation</th>
<th>Medical History</th>
<th>indate</th>
<th>outdate</th>
<th>roomno</th>
<th>doctor</th>
<th>Nurse</th>
<th>company</th>
<th>insurance Id</th>
<th>expirydate</th>
<th>holder</th>
<th>ephone</th>
<th>Patient Relation</th>
<th>action</th>

</tr>


<?php 
$cn = 1;
while($row= mysqli_fetch_array($res)){



?>
<tr>
<td><?php echo $cn++; ?></td>
<td><?php echo $row['patient'];?></td>
<td><?php echo $row['fname'];?></td>
<td><?php echo $row['gender'];?></td>
<td><?php echo $row['aadhar'];?></td>
<td><?php echo $row['address'];?></td>
<td><?php echo $row['contact'];?></td>
<td><?php echo $row['dob'];?></td>
<td><?php echo $row['age'];?></td>
<td><?php echo $row['height'];?></td>
<td><?php echo $row['weight'];?></td>
<td><?php echo $row['blood'];?></td>
<td><?php echo $row['occupation'];?></td>
<td><?php echo $row['medical'];?></td>
<td><?php echo $row['indate'];?></td>
<td><?php echo $row['outdate'];?></td>
<td><?php echo $row['roomno'];?></td>
<td><?php echo $row['doctor'];?></td>
<td><?php echo $row['nurse'];?></td>
<td><?php echo $row['company'];?></td>
<td><?php echo $row['insuranceid'];?></td>
<td><?php echo $row['expirydate'];?></td>
<td><?php echo $row['holder'];?></td>
<td><?php echo $row['ephone'];?></td>
<td><?php echo $row['relation'];?></td>

 <td><a href="demos.php?id=<?php echo $row['id']; ?>">View</a></td>



<td>


<a href="editpatient.php?id=<?php echo $row['id'];?>"class="fa fa-pencil" style="font-size:30px;color:black;"></a>
<a href="deletepatient.php?id=<?php echo $row['id'];?>"class="fa fa-trash " style="font-size:30px;color:red;"></a>

</td>




</tr>
<?php } ?>
<script>
                          function searchfun(){
                              let filter = document.getElementById('search').value.toUpperCase();
                              let mytab = document.getElementById('mytable');
                              let tr = mytab.getElementsByTagName('tr');

                              for(var i=0;i<tr.length;i++){


                                  
                                      
                                          let td= tr[i].getElementsByTagName('td')[1];
                                          
                                          
                                          // console.log(td);
                                          if(td){
                                              let textvalue = td.textContent || td.innerHTML;
                                              if(textvalue.toUpperCase().indexOf(filter)>-1){
                                                  tr[i].style.display=""; 
                                              } else {
                                                  tr[i].style.display="none"; 
                                              }
                                          }

                              }

                          }
                          
                                  
                                  
                              
                          


                      </script>
</table>
</div>

</div>
</div>


        

</div>

                 
                  <!-- <div class="container" style="margin-top: 50px;">
                    <div class="row">

                        <div class="col-sm-3">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                  <div class="col-md-4">
                                    
                                    <img src="images/doctor2.jpg" class="img-fluid rounded-start" alt="...">
                                  </div>
                                  <div class="col-md-8">
                                    <div class="card-body">
                                      <h5 class="card-title" style="color: purple;">Doctors</h5>
                                      <p><?php ?></p>

                                      
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                  <div class="col-md-4">
                                    
                                    <img src="images/nurse1.jpg" class="img-fluid rounded-start" alt="...">
                                  </div>
                                  <div class="col-md-8">
                                    <div class="card-body">
                                      <h5 class="card-title" style="color: purple;">Nurse</h5>
                                      <p><?php ?></p>

                                      
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>

                              
                        </div>

                        <div class="col-sm-3">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                  <div class="col-md-4">
                                    <img src="images/dept.jpg" height="70px" width="70px" class="img-fluid rounded-start" alt="...">
                                  </div>
                                  <div class="col-md-8">
                                    <div class="card-body">
                                      <h5 class="card-title" style="color: purple;">Departments</h5>
                                      <p><?php ?></p>
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                  <div class="col-md-4">
                                    <img src="images/patients.jpg" class="img-fluid rounded-start" alt="...">
                                  </div>
                                  <div class="col-md-8">
                                    <div class="card-body">
                                      <h5 class="card-title" style="color: purple;">Patients</h5>
                                      <p><?php ?></p>
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div> -->

                        <!-- <div class="col-sm-3">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                  <div class="col-md-4">
                                    <img src="images/blood.png" height="90px" class="img-fluid rounded-start" alt="...">
                                  </div>
                                  <div class="col-md-8">
                                    <div class="card-body">
                                      <h5 class="card-title" style="color: purple;">Blood Bank</h5>
                                      <p><?php ?></p>
                                      
                                    </div>
                                  </div>
                                </div>
                              </div> -->
                        <!-- </div>
                    </div>
                  </div> -->
            </div>




        </div>
    </div>
    
</body>
</html>