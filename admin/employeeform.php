 <?php

include("../functions.php");
$ch = new Business();

if(isset($_POST['laliga'])){

    $fullName = $ch->testInput($_POST['fullname']) ?? "";
   
   
    $mobile = $ch->testInput($_POST['mobile']) ?? "";

    $residence = $ch->testInput($_POST['residence']) ?? "";

    $address = $ch->testInput($_POST['address']);

   $gender = $ch->testInput($_POST['gender']) ?? "";
    $emp_status = $ch->testInput($_POST['status']) ?? "";
    $department = $ch->testInput($_POST['department']) ?? "";
    $email = $ch->testInput($_POST['email']) ?? "";

    $picture = $_FILES['photo']['name'];
  // var_dump($picture);
  

 
    $laliga = $ch->registerEmployee($fullName,$mobile,$residence,$address,$gender,$emp_status,$department,$email,$picture);
    if($laliga){
      $msg = '<div class="alert alert-success" role="alert">Employee Registered</div>';
    }else {
      $msg = '<div class="alert alert-danger" role="alert">Failed in registering employee</div>';
    }
  

}
// end of laliga news



?>

 <form method="post" id="appoint" enctype="multipart/form-data">

                <div class="row">

                    <div class="col">
                          <div class="form-group">
                    <label for="exampleFormControlInput1">FullName</label>
        <input type="text" name="fullname" class="form-control"  placeholder="Full Name" required>
                  </div>
                    </div>

                   <!--  <div class="col">
                          <div class="form-group">
                    <label for="exampleFormControlInput1">Last Name</label>
        <input type="text" name="last" class="form-control" placeholder="Last Name" required>
                  </div>
                    </div> -->

                     <!-- <div class="col">
                          <div class="form-group">
                    <label for="exampleFormControlInput1">Country</label>
                    <select class="form-control" name="country" id="exampleFormControlSelect1">
                      <option value="ghana">Ghana</option>
                      <option value="china">China</option>
                      <option value="nigeria">Nigerian</option>
                      <option value="algeria">Algeria</option>
                      <option value="egypt">Egypt</option>
                      <option value="togo">Togo</option>
                      <option value="benin">Benin</option>
                    </select>
        
                  </div>
                    </div> -->

                     <div class="col">
                          <div class="form-group">
                    <label for="exampleFormControlInput1">Mobile Number</label>
        <input type="text" name="mobile" class="form-control"  placeholder="Phone Number" required>
                  </div>
                    </div>
                    <!-- email -->

     <div class="col">
          <div class="form-group">
    <label for="exampleFormControlInput1">Email</label>
    <input type="email" class="form-control" name="email" required placeholder="Email">
        
  </div>
    </div>


                    
                </div>

                <!-- end of row 1 -->

                 <div class="row">

                     <div class="col">
                          <div class="form-group">
      <label>Location</label>
        <input type="text" name="residence" class="form-control"  placeholder="Location" required>
                  </div>
                    </div>

                      <div class="col">
                          <div class="form-group">
        <label>Address</label>
        <input type="text" name="address" class="form-control"  placeholder="House Address" required>
                  </div>
                    </div>

          <div class="col">
                <div class="form-group">
          <label for="exampleFormControlInput1">Gender</label>
           <select class="form-control" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="transgender">Transgender</option>
           
          </select>

        </div>
          </div>

                    <!--  <div class="col">
                          <div class="form-group">
                    <label for="exampleFormControlInput1">City</label>
        <input type="text" name="city" class="form-control"  placeholder="City" required>
                  </div>
                    </div> -->


                     <!-- <div class="col">
                          <div class="form-group">
                    <label for="exampleFormControlInput1">Region</label>
                     <select class="form-control" name="region" required>
                      <option value="ashanti">Ashanti</option>
                      <option value="bono">Brong-Ahafo</option>
                      <option value="central">Central</option>
                      <option value="eastern">Eastern</option>
                      <option value="accra">Greater Accra</option>
                      <option value="northern">Northern</option>
                      <option value="upper east">Upper East</option>
                      <option value="upper west">Upper West</option>
                      <option value="volta">Volta</option>
                      <option value="western">Western</option>
                    </select>
       
                  </div>
                    </div> -->

                   

                    


                   


                </div>

                 <div class="row">

                     

                    <div class="col">
                          <div class="form-group">
                    <label for="exampleFormControlInput1">Employment Status</label>
                    <select class="form-control" name="status" required>
                      <option value="full time">Full time employment</option>
                      <option value="probation">Probation</option>
                      <option value="part time">Part time</option>
                      
                    </select>
                  </div>
                    </div>

                    


                     <div class="col">
                          <div class="form-group">
                    <label for="exampleFormControlInput1">Department</label>
                <select class="form-control" name="department" id="exampleFormControlSelect1" required>
                      <option value="IT">IT</option>
                      <option value="HR">HR</option>
                      <option value="management">Management</option>
                      <option value="labourer">Labourers</option>
                      <option value="cooking">Cooking</option>
                    </select>
                  </div>
                    </div>

                    <div class="col">
                      
                       <div class="form-group">
                   <label>Picture</label>
                <input type="file" name="photo" class="form-control-file" id="upload" required>
                   </div>
                    </div>


                    

                </div>
                    
                    
               

                
                <button type="submit" class="btn btn-primary" name="laliga">Submit</button>
               </form> 