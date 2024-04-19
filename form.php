<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
  </head>
  <body>
  <div class="container">
      <form action="#" style="padding-top:20px">
        <div class="card p-4">
          <h2 style="text-align: center">Pathology Registrations</h2>
          <br />
          <div class="row">
            <div class="form-group col-sm-6">
              <label>Patients Name:</label>
              <input
                type="text"
                class="form-control"
                placeholder="Enter your name"
              />
            </div>
            <div class="form-group col-sm-6">
              <label>Aadhar No:</label>
              <input
                type="Text"
                class="form-control"
                placeholder="Enter 12 digit Aadhar No"
              />
            </div>
        </div>
          <br/>

          <div class="row">
            <div class="form-group col-sm-6">
              <label>Email Address:</label>
              <input type="Email" class="form-control" placeholder="abc@gmail.com" />
            </div>

            <div class="form-group col-sm-6">
              <label>Mobile No:</label>
              <input
                type="text"
                class="form-control"
                placeholder="Enter 10-digit mobile number"
                pattern="[0-9]{10}"
                title="Please enter a 10-digit mobile number"
                maxlength="10"
                required
              />
            </div>
          </div>
          <br />

          <div class="row">
            <div class="form-group col-sm-6">
              <label>Referal Doctor:</label>
              <select class="form-select">
              <option value="dr1">Select Doctor</option>
                <option value="dr1">Dr.komal</option>
                <option value="dr2">Dr.shubham</option>
                <option value="dr3">Dr.sonal</option>
                <option value="dr1">Dr.shubham</option>
                <option value="dr2">Dr.mrug</option>
                
              </select>
            </div>
           
            
              <div class="form-group col-sm-6">
                <label>Patients DOB:</label>
                <input type="Date" class="form-control" />
              </div>
              </div>
              <br>



            <div class="row">
              <div class="form-group col-sm-6">
                <label>Disease:</label>
                <input type="text" class="form-control" placeholder="Disease" />
              </div>

              <br>

              <div class="form-group col-sm-6">
                <label>Treatment:</label>
                <input type="text" class="form-control" placeholder="Treatment" />
              </div>
            </div>
            <br>


            <div class="row">
            <div class="form-group col-sm-6">
              <label>Upload file:</label>
              <input type="file" class="form-control">
            </div>
            
            
            

              <div class="form-group col-sm-6">
                <label>Address:</label>
                <input type="text" class="form-control" placeholder="Enter your address" />
              </div>
            
          </div>
          <br>
          


            <div class="container">
              <form>
                <h5><label for="blood test">Test:</label></h5>
               
                  <div class="row">
                    <div class="form-group col-sm-3">
                      <input type="checkbox" id="test1" name="test1" value="test1">
                      <label for="test1"> CBC</label><br>
                    </div>
                    <div class="form-group col-sm-3">
                      <input type="checkbox" id="test2" name="test2" value="test2">
                      <label for="test2"> Uric acid</label><br>
                    </div>
                    <div class="form-group col-sm-3">
                      <input type="checkbox" id="test3" name="test3" value="test3">
                      <label for="test3"> Aso test</label><br>
                    </div>
                    <div class="form-group col-sm-3">
                      <input type="checkbox" id="test4" name="test4" value="test4">
                      <label for="test4"> Lft</label><br>
                      </div>
</div>
                  
                      <div class="row">
                      <div class="form-group col-sm-3">
                      <input type="checkbox" id="test5" name="test5" value="test5">
                      <label for="test5">Rft</label><br>
                      </div>
                      <div class="form-group col-sm-3">
                      <input type="checkbox" id="test6" name="test6" value="test6">
                      <label for="test6"> sugar</label><br>
                    </div>
                    <div class="form-group col-sm-3">
                      <input type="checkbox" id="test6" name="test6" value="test7">
                      <label for="test6">Calcium</label><br>
                      </div>
                      <div class="form-group col-sm-3">
                        <input type="checkbox" id="test7" name="test7" value="test8">
                        <label for="test7">Pp sugar</label><br>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-sm-3">
                        <input type="checkbox" id="test8" name="test8" value="test9">
                        <label for="test8">Lipid profile</label><br>
                        </div>
                        <div class="form-group col-sm-3">
                        <input type="checkbox" id="test9" name="test9" value="test10">
                        <label for="test9">RA test</label><br>
                      </div>
                      <div class="form-group col-sm-3">
                        <input type="checkbox" id="test10" name="test10" value="test11">
                        <label for="test10">Stool routine</label><br>
                        </div>
                        
                    
                  
                     
                  
              </form>
            </div>
            
           
            <br />

            <div class="button" style="text-align: center">
              <div class="form-group col-sm-2">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      </form>
    </div>
  </body>
</html>