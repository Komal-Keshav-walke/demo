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
if(isset($_POST['update'])){
    
    extract($_POST);

    $id = $_POST['id'];
    $oldfile = $_POST['oldfile'];

    $myfile = $_FILES["newfile"]["name"];
    $tmpmyfile = $_FILES["newfile"]["tmp_name"];
    $folder = "uploads/".$myfile;

    if(move_uploaded_file($tmpmyfile, $folder)){
        $oldfile = $myfile;
    }

    $sql = "UPDATE `hospital` SET `Name`='$name',`Proffession`='$profession',`Aadhar_no`='$aadhar',`Contact`='$contact',`Email`='$email',`DOB`='$dob',`Blood_group`='$blood',`Gender`='$gender',`Address`='$address',`Qualification`='$qualification',`Department`='$department',`Experience`='$experience',`Profile`='$oldfile',`Username`='$user',`Password`='$pass' WHERE `id`='$id'";

    $dname=$_GET['dname'];

   
     
   $res = mysqli_query($conn, $sql);
    if($res){
        $sql2="UPDATE `patients` SET `doctor`='$name' WHERE `doctor`='$dname'";
        $result = mysqli_query($conn, $sql2);
        echo '<script>
        $(document).ready(function(){
            Swal.fire({
                title: "Good job!",
                text: "Data updated successfully!",
                icon: "success",
                confirmButtonText: "OK"
            }).then(function() {
                window.history.go(-2); // Redirect to view2.php after user clicks OK
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