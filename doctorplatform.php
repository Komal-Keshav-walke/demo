<?php 
session_start();
include('connection.php');
$sql1="SELECT * FROM `hospital` WHERE `proffession`='Doctor'";
$query1= mysqli_query($conn, $sql1);
if(isset($_POST['login'])){
    $name = $_POST['name'];
$sql = "SELECT * FROM `hospital` WHERE `Name`='$name'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($res);


if($row){
    $_SESSION['aadhar'] = $row['Aadhar_no'];
    $_SESSION['name'] = $row['Name'];
    $_SESSION['id'] = $row['id'];
    
    if($row['Proffession']== 'Doctor'){

        header('location:doctor/doctordashboard.php');

    }else{
        echo "Fail";
    }
}

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">

    <title>Document</title>
    <style>
          *{
            margin: 0px;
            padding: 0px;
        }
        body{
            background-image: url('images/loginbackground1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
        #left-cont{
            padding: 10%;
        }
        #form{
             font-size: 20px; 
        }
        .login{
            border: 1px solid black;
            border-radius: 15px;
            padding: 25px;
            background-color: #A7CCDE;
            /* background-color: rgba(128,0,128,0.6); */
            color: white;
            box-shadow: 10px 10px 15px #0c4b7b ;
        }
        #username,#password{
            background-color: transparent;
        }
            #login{
            background-color: White;
            color:purple;
            }
    
            #login:hover{
            background-color:purple;
            color:white;
            border: 2px solid purple;

            }
    </style>
</head>
<body>
    
<div class="container-fluid" style="margin: 0px; padding: 0px;">
        <div class="row" style="margin: 0px; padding: 0px;">
            <!-- <div class="col-7" style="margin: 0px; padding: 0px;">
                <img src="images/backlogin.jpg" alt="body" width="100%" style="margin-right: 0px;">
            </div> -->
        
        
            <div class="col-sm-7" id="left-cont">
                <img src="images/loginpro.jpg" alt="profile" class="float-end" height="150px">
                
                <div class="login">
                <h2>Hello, <br>
                Welcome Back</h2>
                
                <form method="post" action="#">  
                    <div class="main">

                    <label for="name">Doctor Name</label><br />
                    <select name="name" id="name" class="form-control">
                            <?php
                              $cn =1;
                              while($row = mysqli_fetch_assoc($query1)){
                                 ?>
                              
                              <option value="<?php echo $row['Name'] ?>"><?php echo $row['Name'] ?></option>
                              <?php } ?>
                            </select>
                    <br><br>
            

                <div class="row justify-content-center">
                    <div class="col-5">
                    <input type="submit" class="btn form-control" name="login" id="login" Value="Login">
                    </div>
                    <div class="col-5">
                    <input type="button" class="btn form-control" name="back" id="login" Value="Back" onclick="history.back(); return false;">
                    </div>
                    
                </div>
            </div>
    </form>
    
</body>
</html>