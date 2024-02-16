<?php

include("../functions.php");
$ch = new Business();

if(isset($_POST['laliga'])){
    $employee = $ch->testInput($_POST['employee']) ?? "";
    $leave = $ch->testInput($_POST['leave_type']) ??  "";
    $duration = $ch->testInput($_POST['duration']) ?? "";
    $starting = $ch->testInput($_POST['starting']) ?? "";
    $ending = $ch->testInput($_POST['ending']);
    $note = $_POST['note'] ??  "";
    
    $leaveData = [

      "employee" => $employee,
      "leave_type" => $leave,
      "duration" => $duration,
      "starting" => $starting,
      "ending" => $ending,
      "note" => $note,
    ];
  

  
    $laliga = $ch->employeeLeave($leaveData);
    if($laliga){
      $msg = '<div class="alert alert-success" role="alert">Employee Leave Added</div>';
    }else {
      $msg = '<div class="alert alert-danger" role="alert">Failed in adding employee leave</div>';
    }
  

}

?>
             <?php
                if(isset($msg)){
                  echo $msg;
                }
              ?>

            <form method="post" id="appoint">

                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                    <label for="exampleFormControlInput1">Employee Name</label>
    <input type="text"  name="employee" class="form-control" placeholder="Employee" required>
                  </div> 
                    </div>

                    <div class="col">
                        <div class="form-group">
                <label for="exampleFormControlInput1">Leave Type</label>
                <select class="form-control" name="leave_type" required>
                     <option value="parental">Parental Leave</option>
                     <option value="sick">Sick Leave</option>
                     <option value="voting">Voting</option>
                     <option value="jury">Jury Duty</option>
                    
                   </select>

              </div> 
                    </div>
                    
                </div>

               

           <div class="form-row">
            <div class="col">
                <div class="form-group">
                <label for="exampleFormControlInput1">Leave Duration</label>
    <input type="text" name="duration" class="form-control"  placeholder="Location" required>
              </div> 
            </div>

            <div class="col">
                <div class="form-group">
                <label for="exampleFormControlInput1">Starting Date</label>
    <input type="date" name="starting" class="form-control"  required>
              </div> 
            </div>
               
           </div>

              

            <div class="form-row">
              <div class="col">
                 <div class="form-group">
                <label for="exampleFormControlInput1">Ending Date</label>
    <input type="date" name="ending" class="form-control"  required>
              </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <label>Note</label>
                   <textarea class="form-control" name="note" placeholder="Note" rows="3"></textarea>
                  
                </div>
              </div>
              
            </div>
              

              

                
                <button type="submit" class="btn btn-primary" name="laliga">Submit</button>
               </form> 

