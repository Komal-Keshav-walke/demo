<!Doctype html>
<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    </head>
<body><?php 
session_start();
include('../connection.php');
    
    extract($_POST);

    $id = $_GET['id'];
    $status = $_GET['status'];

    $sql1="SELECT * FROM appointment WHERE `id`='$id'";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);


    
   

    if($row1['Status'] == 'Confirm'){
        
        echo $sql2 = "UPDATE `appointment` SET `status`='Confirm' WHERE `id`='$id'";
        $res = mysqli_query($conn, $sql2);
     }
     else{
        echo $sql3 = "UPDATE `appointment` SET `status`='$status' WHERE `id`='$id'";
        $res = mysqli_query($conn, $sql3);     
    }


    
    
     
   
    if($res){
        echo '<script>
        $(document).ready(function(){
            window.history.back();
        });
    </script>';
    }
    else{
        echo "fail to update data";
    }



?>

    
</body>
</html>