<?php 

session_start();
include('../connection.php');
if(isset($_POST['submit'])){

    $patient = $_POST['patient'];
    $name = $_POST['fname'];
    // $mname = $_POST['mname'];
    // $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $aadhar = $_POST['aadhar'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $blood = $_POST['blood'];
    $occupation = $_POST['occupation'];
    $medical = $_POST['medical'];

    $indate = $_POST['indate'];

    $outdate = $_POST['outdate'];
    $roomno = $_POST['roomno'];
    $doctor = $_POST['doctor'];
    $nurse = $_POST['nurse'];
    $company = $_POST['company'];
    $insuranceid = $_POST['insuranceid'];
    $expirydate = $_POST['expirydate'];
    $holder = $_POST['holder'];
    $ephone = $_POST['ephone'];
    $relation = $_POST['relation'];
  


      $sql = "INSERT INTO `patients`( `patient`, `fname`, `gender`, `aadhar`, `address`, `contact`, `dob`, `age`,`height`,`weight`,`blood`,`occupation`,`medical`,`indate`, `outdate`, `roomno`, `doctor`,`nurse`, `company`, `insuranceid`, `expirydate`, `holder`, `ephone`,`relation`) VALUES ('$patient','$name','$gender','$aadhar','$address','$contact','$dob','$age','$height','$weight','$blood','$occupation','$medical','$indate','$outdate','$roomno','$doctor','$nurse','$company','$insuranceid','$expirydate','$holder','$ephone','$relation')";

     $a = mysqli_query($conn, $sql);

     if($a) {
         echo "success";
         header('location:viewpatient.php');
     }
         else {
         echo "fail";

         }
    
}


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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

   <style>
       #hiddenDiv {
      display: none;
    }
   </style>

</head>
<body>
<div class="container  box-shadow: 2px 2px;">
    <div class="row ">
        <div class="col-md-12">
            <div class="card ">

            <div class="header" style="background-color:purple;color:white;height:50px;">
                
                    <h3 class="card-title text-center">Patient Report Form</h3>
                  </div><br>
                <div class="card-body">
                    
                    <form method="post" action ="#" enctype="multipart/form-data">

                       
                        <div class="row ">
                           
                            <div class="form-group col-md-4">
                            <label for="patient"> Select Patient type</label>
                                <select class="form-control" id="patient"  name="patient" required>
                               
                                <option value="" disabled selected hidden>Patient Types</option>
                                  <option value="OPD">OPD</option>
                                  <option value="IPD">IPD</option>
                                  <option value="Emergency">Emergency</option>
                                 </select>
                            </div>

                            <div class="form-group col-md-4">
                               <label for="fname"> Name</label>
                         <input type="text" class="form-control" placeholder="Enter First Name" name="fname" id="fname"required>
                         <small id="fnameValidation" style="color: red"></small>
                        </div>


                            <div class="form-group col-md-4">
                                <label for="gender">Select gender:</label>
                                <select class="form-control" id="gender"  name="gender" required>
                            <option value="" disabled selected hidden>Select Gender</option>
                           
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Other">Other</option>
                             
                            </select>
                            </div>

</div><br>


                        
                        <div class="row">
                           
                            <div class="form-group col-md-4">
                                <label for="aadhar">Adhar No</label>
                                <input type="text" class="form-control" placeholder="Enter Adhar No" name="aadhar" id="aadhar"
                                oninput="this.value=this.value.replace(/[^0-9]/g,'')"|size="12" minlength="12" maxlength="12"placeholder="123-899-783-123"required>
                            </div>
                        

                    <div class="form-group col-md-4">
                         <label for="address">Address</label>
                            <input type="text" textarea class="form-control" name="address" id=address rows="3" placeholder="Enter Patient's Address"required ></textarea>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="contact">Contact</label>
                        <input type="text" class="form-control" placeholder="Enter Contact Number" name="contact" id="contact"oninput="this.value=this.value.replace(/[^0-9]/g,'')"
                        size="10"
                        minlength="10"
                        maxlength="10"
                        placeholder="0123456789"required >
                    </div>
                  </div><br>


                  <div class="row">
                    <div class="form-group col-md-4">
                        <label for="aadhar">Emergency Contact</label>
                            <input type="text" class="form-control" placeholder="Enter econtact" name="econtacts" id="econtacts"
                            oninput="this.value=this.value.replace(/[^0-9]/g,'')"
                            size="10"
                            minlength="10"
                            maxlength="10"
                            placeholder="0123456789">
                    </div>
                       

                          <div class="form-group col-md-4">
                                <label for="dob">DOB:</label>
                                <input type="date" class="form-control"  name="dob"  id="dob" placeholder=""required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" placeholder="Age" name="age" id="age"required >
                            </div>
</div><br>

                           
                    <div class="row">
                            <div class="form-group col-md-4">
                                <label for="height">Height</label>
                                <input type="height" class="form-control" placeholder="Height" name="height" id="height"required >
                            </div>
                       
                  
                            <div class="form-group col-md-4">
                                <label for="weight">Weight</label>
                                <input type="text" class="form-control" placeholder="Weight" name="weight" id="weight"required >
                            </div>

                 <div class="form-group col-md-4">
                 <label for="blood">blood group</label><br>
                    <select class="form-control" name="blood" id="blood"required >
                    <option value="" disabled selected hidden>Blood Group</option>
                    <!-- <option value= "disabled">Select Blood Group</option> -->
                      <option value="A+">A+</option>
                      <option value="A-">A-</option>
                      <option value="B+">B+</option>
                      <option value="B-">B-</option>
                      <option value="AB+">AB+</option>
                      <option value="AB-">AB-</option>
                      <option value="O+">O+</option>
                      <option value="O-">O-</option>
                    </select>
        </div>

</div><br>

                            <div class="row">

                            <div class="form-group col-md-4">
                                <label for="occupation">Occupation</label>
                            <input type="text" class="form-control" placeholder="Occupation" name="occupation" id="occupation"required>
                            <small id="occupationValidation" style="color: red"></small>
                            </div>

                       
                              <div class="form-group col-md-4">
                              <label for="medical">Medical History</label>
                            <input type="text" class="form-control" placeholder="Medical History" name="medical" id="medical"required >
                            <small id="medicalValidation" style="color: red"></small>
                            </div>

                              
                            <div class="form-group col-md-4">
                                <label for="indate">Indate</label>
                                <input type="date" class="form-control" placeholder="Enter Indate" name="indate" id="indate"required>
                               
                              </div>
</div><br>

                            

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="outdate">Outdate:</label>
                                <input type="date" class="form-control"  name="outdate" id="outdate"required>
                              </div>
                         
                           
                                <div class="form-group col-md-4">
                                    <label for="roomno">Room No</label>
                                    <input type="text" class="form-control" placeholder="Enter Room Number" name="roomno" id="roomno"required>
                                </div>
    
                                  
                                <div class="form-group col-md-4">
                                    <label for="doctor">doctor assigned</label>
                            <input type="text" class="form-control" placeholder=" Dr. Name" name="doctor" id="doctor"required>
                                   
                                  </div>
</div><br>

    
                               
             <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="nurse">Nurse Assigned </label>
                                    <input type="text" class="form-control" placeholder="Enter Adhar No" name="nurse" id="nurse"required >
                                  </div>
</div><br>
                               

                                <div>
                                    <button  onclick="preventsubmit(event);toggleDiv();" class="btn btn-danger">Insurance</button>   
                                </div> 

                                <p>Insurance Details</p>

                                <div id="hiddenDiv">

                            
                                
                           
                                <div class="row">

<div class="form-group col-md-4">
                 <label for="holder"> Insurance Company</label>
                 <input type="text" class="form-control" id="company" name="company" placeholder="Holder"required>
             </div>

             
     <div class="form-group col-md-4">
                 <label for="holder">Holder Name</label>
                 <input type="text" class="form-control" id="holder" name="holder" placeholder="Holder"required>
             </div>



               
             <div class="form-group col-md-4">
             <label for="insuranceid">Insurance Id</label>
<input type="text" class="form-control" id="insuranceid" name="insuranceid" placeholder="Insurance ID"required>
</div>
</div><br>
<div class="row">

   <div class="form-group col-md-4">
                 <label for="holder">Expiry Date</label>
                 <input type="date" class="form-control" id="expirydate" name="expirydate" placeholder="Holder"required>
             </div>


             
<div class="form-group col-md-4">
                 <label for="ephone">Emergency Contact</label>
                 <input type="text" class="form-control" id="ephone" name="ephone" placeholder="Emergency Contact"
                 name="contacts" id="contacts"
                 oninput="this.value=this.value.replace(/[^0-9]/g,'')"
                 size="10"
                 minlength="10"
                 maxlength="10"
                 placeholder="0123456789"required >
                
               </div>
</div><br>


            <div class="row">     
             <div class="form-group col-md-4">
                 <label for="relation">Relation</label>
                 <input type="text" class="form-control" id="relation" name="relation" placeholder="Relation"required>
             
               </div>
</div><br>


                                            <script>
                                                function toggleDiv() {
                                                 var div = document.getElementById('hiddenDiv');
                                                if (div.style.display === 'none') {
                                                 div.style.display = 'block';
                                                } else {
                                                div.style.display = 'none';
                                              }
                                            }
                                                </script>


                                </div>




                                <div class="card-footer footer" >

                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="check"> 
                                       <label class="form-check-label" for="check">By submitting this form, I hereby declare that the information provided above is accurate and true to the best of my knowledge.</label>
                                       </div>

                            <div style="text-align:center">
                                <button type="submit" name="submit"  id="submit" class="btn btn-primary button">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="reset" name="reset"  id="reset" class="btn btn-dark button">Reset</button>
                                </div>
                        <div>
                        </div>
                                        </div>

                       
                    </form>
                </div>
            </div>
        </div>
    </div>

           
<script>
    // let hideshow=document.getElementByClass('emergency')

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
function preventsubmit(event)
{
    event.preventDefault();
}
</script>
<script>
    //validation for firstname.
      document
        .getElementById("fname")
        .addEventListener("input", function (event) {
          var fnameInput = event.target.value;
          var fnameRegex = /^[A-Za-z\s]+$/;
          var fnameValidation = document.getElementById("fnameValidation");

          if (!fnameRegex.test(fnameInput)) {
            fnameValidation.textContent =
              "Name must contain only letters and spaces.";
          } else {
            fnameValidation.textContent = "";
          }
        });
        //Validation for Middlename.
        document
        .getElementById("mname")
        .addEventListener("input", function (event) {
          var mnameInput = event.target.value;
          var mnameRegex = /^[A-Za-z\s]+$/;
          var mnameValidation = document.getElementById("mnameValidation");

          if (!mnameRegex.test(mnameInput)) {
            mnameValidation.textContent =
              "Name must contain only letters and spaces.";
          } else {
            mnameValidation.textContent = "";
          }
        });

        //Valiadtion for lastname.
        document
        .getElementById("lname")
        .addEventListener("input", function (event) {
          var lnameInput = event.target.value;
          var lnameRegex = /^[A-Za-z\s]+$/;
          var lnameValidation = document.getElementById("lnameValidation");

          if (!lnameRegex.test(lnameInput)) {
            lnameValidation.textContent =
              "Name must contain only letters and spaces.";
          } else {
            lnameValidation.textContent = "";
          }
        });

        //Validations for occupation filed.
        document
        .getElementById("occupation")
        .addEventListener("input", function (event) {
          var occupationInput = event.target.value;
          var occupationRegex = /^[A-Za-z\s]+$/;
          var occupationValidation = document.getElementById("occupationValidation");

          if (!occupationRegex.test(mnameInput)) {
            occupationValidation.textContent =
              "Name must contain only letters and spaces.";
          } else {
            occupationValidation.textContent = "";
          }
        });
    
        //Validations for submit filed.
      document
        .getElementById("registrationForm")
        .addEventListener("submit", function (event) {
          var inputs = document.querySelectorAll("input");
          var isValid = true;

          inputs.forEach(function (input) {
            if (!input.checkValidity()) {
              isValid = false;
            }
          });

          if (!isValid) {
            event.preventDefault();
          }
        });
</script>

</div>