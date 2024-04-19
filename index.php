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
    <script type="text/javascript">
        function preventBack(){
        window.history.forward()};
        setTimeout("preventBack()",0);
        window.onunload=function(){null;}


        $(document).ready(function(){
            $('#login').click(function(){
                var username = $('#username').val();
                var password = $('#password').val();
                
                // Perform case sensitivity check
                if(username !== username.toLowerCase()) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid Username',
                        text: 'Username must be in lowercase letters only!'
                    });
                    return false;
                }
                // updated password Validations.
                
          // Password validation
          if (!password.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/)) {
            Swal.fire({
              icon: "error",
              title: "Invalid Password",
              text: "Password must contain at least 8 characters with at least one digit, one lowercase letter, and one uppercase letter.",
            });
            return false;
          }
            });
        });
       

    </script>


    <title>Hospital Managment System</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">

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
            background-color:  #A7CCDE;
            color: white;
            box-shadow: 10px 10px 15px #0c4b7b ;
            line-height: 2;
        }
        #username,#password{
            background-color: transparent;
        }
    </style>
</head>
<body>
    
    <?php 
session_start();
include('connection.php');
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    /* $profession = $_POST['profession'];
$sql = "SELECT * FROM `register` WHERE `username` = '$username' AND `password` = '$password'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);*/
$sql = "SELECT * FROM `hospital` WHERE `Username` = '$username' AND `Password` = '$password'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
//print_r ($row);

if($row){
   
    $_SESSION['aadharno'] = $row['Aadhar_no'];
    $_SESSION['name'] = $row['Name'];
    $_SESSION['id'] = $row['id'];
    echo "some";

    if($row['Proffession']== 'Admin'){
       
        header('location:AdminDashboard.php');

    }
    elseif($row['Proffession']== 'Doctor'){
       
        header('location:doctor/doctordashboard.php');

    }
    elseif($row['Proffession']== 'Nurse'){

        header('location:nursedashboard.php');

    }
    elseif($row['Proffession']== 'Receptionist'){

        header('location:receptionistd.php');

    }
    
}
else{
        
        echo '<script>
        $(document).ready(function(){
            Swal.fire({
                title: "Failed to Login!",
                text: "Invalid credentials!",
                icon: "warning",
                confirmButtonText: "OK"
            })
        });
    </script>';
}

}

/*if($row){
    $_SESSION['username'] = $row['username'];
    $_SESSION['name'] = $row['name']; 
    $_SESSION['id'] = $row['id'];
    // echo  $_SESSION['email'];  die; 
    header('location:doctor.php');

}
else{
    echo "Wrong email and password";
}*/
?>




<div class="container-fluid" style="margin: 0px; padding: 0px;">
        <div class="row" style="margin: 0px; padding: 0px;">
            <!-- <div class="col-7" style="margin: 0px; padding: 0px;">
                <img src="images/backlogin.jpg" alt="body" width="100%" style="margin-right: 0px;">
            </div> -->
        
        
            <div class="col-sm-7" id="left-cont">
                <img src="images/loginpro.jpg" alt="profile" class="float-end" height="140px">
                
                <div class="login">
                <h2 >Hello, <br>
                Welcome Back</h2>
               
                <form method="post" action="#">  
                    <div class="main">
                    
                    <label for="username">Username :</label>
                    <div class="input-group mb-3">
                        <span class="border-white input-group-text" id="basic-addon1"> <i class="fa-solid fa-user"></i></span>
                        <input type="text" name="username" id="username"  required class="form-control" pattern="[a-zd.]{5,}" title="Must contain lowerCaseLetters & size only five letter"  placeholder="Enter username" >
                    </div>


                    <label for="password">Password :</label>
                    <div class="input-group mb-3">
                        <span class="border-white input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" name="password" id="password"  required class="form-control" placeholder="Enter your password"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}"
                    title="Must contain at least 8 or more characters." >
                        <span class="input-group-text btn border-white" onclick="password_show_hide();">
                            <i class="fas fa-eye" id="show_eye"></i>
                            <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                        </span>
                    </div>
        
                    <!-- Password: <input type="text" name="profession" id="profession" placeholder="Enter your password"> -->
                    
                <div class="row justify-content-center">
                    <div class="col-4 pt-4">
                    <input type="submit" class="btn btn-primary form-control" name="login" id="login" value="Login">
                    <a href="#"class="pt-2 ps-4">forgot password</a>

                    </div>
                </div>
            </div>
    </form>

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
    
</body>
</html>