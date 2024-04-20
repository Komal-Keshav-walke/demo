<!Doctype html>
<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    </head>
<body>
    <?php 
include('connection.php');


$id = $_GET['id'];
// echo $id;

$sql = "DELETE FROM `hospital` WHERE `id` = '$id'";
// $sql = "DELETE FROM `doctor` WHERE `id` = '$id'";
$res = mysqli_query($conn,$sql);
if($res){
    echo '<script>
        $(document).ready(function(){
          Swal.fire({
            title: "Good job!",
              text: "Data deleted successfully!",
              icon: "success",
              confirmButtonText: "OK"
          }).then(function() {
              window.history.back();// Redirect to view03.php after user clicks OK
          });
        });
    </script>'; 
}
else{
    echo "fail";
} 


?>

 