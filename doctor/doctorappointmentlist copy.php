<?php
session_start();

include('../connection.php');



if(isset($_GET['search'])) {
    $fdate=$_GET['fdate'];
    $tdate=$_GET['tdate'];
    
    $sql = "SELECT * FROM `appointment` WHERE `Date` BETWEEN '$fdate' AND '$tdate' ";

    $res = mysqli_query($conn, $sql);

} else {
    $sql="SELECT * FROM `appointment` WHERE DATE(Date)=CURDATE() ";
    $res = mysqli_query($conn, $sql);

}



date_default_timezone_set('Asia/Kolkata');

$sql = "SELECT * FROM appointment";
$result = $conn->query($sql);


$total_records = $result->num_rows;



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
        #btn{
            background-color: purple;
            color:White;
            }
    
            #btn:hover{
            background-color:White;
            color:purple;
            border: 2px solid purple;

            }
            .table-responsive{
          height: 70vh;
        }
    </style>

</head>
<body class="animate_animated animate_fadeIn">

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
            <h3 style="text-align:center;margin:5px" class="animate_animated animate_fadeInDown">Doctor</h3>
            <hr style="margin: 7px; ">
            <div class="dropdown butt animate_animated animate_fadeInLeft" style="width:100%;margin-left:7px">
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
               
                <a href="imppatientlist.php" class="btn butt" style="width:100%;padding-left:7px;"> <i class="fa-solid fa-users"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Patient List   
               </a>
                    <ul class="dropdown-menu">
                    
                     <a class="dropdown-item" href="doctorpatientlist.html">IPD Patient Records</a>
                     <a class="dropdown-item" href="">OPD Patient Records</a>
                     <a class="dropdown-item" href="#">Emergency Patient Records</a>
                    
                 </ul>
                </div><br>

                <div >
               
               <a href="patientappointment.php" class="btn butt" style="width:100%;padding-left:7px;"> <i class="fa-solid fa-users"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Appointments 
              </a>
                   
                   
                </ul>
    </div><br>
                

                <div class="dropdown butt" style="width:100%;margin-left:7px">
                    <button class="btn dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width:100%;padding-left:7px;"><i class="fa-solid fa-user-nurse"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Nurse
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="doctornurseview.php">Nurse Records</a></li>
                    </ul>
                </div>
                <br>

                <div class="dropdown butt" style="width:100%;margin-left:7px">
                    <button class="btn dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width:100%;padding-left:7px;"><i class="fa-solid fa-droplet"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                    Blood Bank
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="rbloodbank.php">Available Blood</a></li>
                        <li><a class="dropdown-item" href="donarlist.php">Donar list</a></li>
                        <!-- <li><a class="dropdown-item" href="donation.php">Donar Registration</a></li> -->
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
                        <li class="nav-item" >
                          <a href="doctordashboard.php">
        <i class="fas fa-home" style="font-size: 24px;"></i>
    </a>
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
            <div class="container-fluid" id="content">
            <div class="container border pb-4">
                        <div class="row mt-4">

                            <div class="col-sm-7">
                                <h3><i class="fa-regular fa-calendar-check" style="color:purple;"></i>&nbsp;&nbsp;&nbsp;Appointment List</h3>
                                <h5>Date-<?php echo $currentDate = date("Y-m-d"); ?></h5>
                            </div>
                            <div class="col-sm-5">
                                <form action="#" method="get">
                                    <div class="row">
                                        <div class="col-4">
                                                <label for="fdate">From Date</label>
                                                <input type="date" name="fdate" class="form-control">
                                        </div>
                                        <div class="col-4">
                                                <label for="tdate">To Date</label>
                                                <input type="date" name="tdate" class="form-control">
                                        </div>
                                        <div class="col-1">
                                            <br>
                                            <input type="submit" value="search" class="btn "name="search" id="btn">
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered mt-4">
                                <thead>
                                    <tr>
                                    <th>Sr No.</th>
                                    <th>Name</th>
                                    <th>Dr.Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <?php
                                $cn =1;
                                while($row = mysqli_fetch_assoc($res)){
                                ?>
                                <tr>
                                    <td><?php echo $cn++ ?></td>            
                                    <td><?php echo $row['Name'] ?></td>
                                    <td><?php echo $row['Doctor_name'] ?></td>
                                    <td><?php echo $row['Date'] ?></td>
                                    <td><?php echo $row['Time'] ?></td>
                                    <td>
                                        
                                        <?php if($row['Status'] == 'Confirm'){ ?>
                                            <button type="button" class="btn btn-success">Confirm</button>
                                        <?php }elseif($row['Status'] == 'Cancel'){ ?>
                                            <button type="button" class="btn btn-danger pe-4">Cancel</button>
                                        <?php }elseif($row['Status'] == 'Pending'){ ?>
                                            <button type="button" class="btn btn-warning">Pending</button>
                                        <?php } ?>

                                
                                    </td>
                                    <td><div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="updateapointmentstatus.php?id=<?php echo $row['id']; ?>&status=<?php echo "Confirm"; ?>">Confirm</a></li>
                                            <li><a class="dropdown-item" href="updateapointmentstatus.php?id=<?php echo $row['id']; ?>&status=<?php echo "Cancel"; ?>">Cancel</a></li>
                                        </ul>
                                        </div>
                                </td>

                                        


                                    <!-- <td><a href="#?id=<?php echo $row['id']; ?>"><i class="fa fa-pencil" style="font-size:20px; color:black;"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="#?id=<?php echo $row['id']; ?>"><i class="fa fa-trash" style="font-size:20px; color:red;"></i></a></td> -->
                                </tr>
                            </tbody>
                            <?php } ?>
                            </table>
                        </div>

                    </div>

                    <p>Total Records: <?php echo $total_records; ?></p>
          
          
     
              
                    
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>