<!Doctype html>
<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    </head>
<body><?php 
session_start();
include('connection.php');
if(isset($_POST['submit'])){
    
    extract($_POST);

    $id = $_POST['id'];
   

    $sql = "UPDATE `bdonation` SET `Fname`='$fname',`Mname`='$mname',`Lname`='$lname',`Email`='$email',`Contact`='$contact',`Blood`='$blood',`Dblood_ml`='$donate',`Height`='$height',`Weight`='$weight',`Dob`='$dob',`Date`='$date',`Donate previsiously`='$dona' WHERE `id`='$id'";

    
    
     
   $res = mysqli_query($conn, $sql);
    if($res){
        echo '<script>
        $(document).ready(function(){
            Swal.fire({
                title: "Good job!",
                text: "Donar Data updated successfully!",
                icon: "success",
                confirmButtonText: "OK"
            }).then(function() {
                window.history.go(-2);
            });
        });
    </script>';
    }
    else{
        echo "fail to update data";
    }
}


?>

    
</body>
</html>