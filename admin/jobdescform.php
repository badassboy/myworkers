<?php

include("../functions.php");
$ch = new Business();

if(isset($_POST['laliga'])){

    $title = $ch->testInput($_POST['title']) ?? "";
    $level = $ch->testInput($_POST['level']) ?? "";
    $job_type = $ch->testInput($_POST['job_type']) ?? "";
    $salary = $ch->testInput($_POST['salary']) ?? "";
    $duties = $ch->testInput($_POST['duties']) ?? "";
    $note = $ch->testInput($_POST['note']) ?? "";

    $jobArray = [

      "title" => $title,
      "level" => $level,
      "job_type" => $job_type,
      "salary" => $salary,
      "duties" => $duties,
      "note" => $note,

    ];

    $laliga = $ch->jobdescription($jobArray);
    if($laliga){
      $msg = '<div class="alert alert-success" role="alert">Employee Registered</div>';
    }else {
      $msg = '<div class="alert alert-danger" role="alert">Failed in registering employee</div>';
    }
  

}
// end of laliga news



?>

            <form method="post" id="appoint">

                <div class="row">

                    <div class="col">
                          <div class="form-group">
                    <label for="exampleFormControlInput1">Job title</label>
        <input type="text" name="title" class="form-control"  placeholder="Job Tiltle" required>
                  </div>
                    </div>

                   

                     <div class="col">
                          <div class="form-group">
                    <label for="exampleFormControlInput1">Career level</label>
                    <select class="form-control" name="level">
                      <option>Select</option>
                      <option value="middle">Middle</option>
                      <option value="senior">Senior</option>
                      <option value="junior">Junior</option>
                     
                    </select>
        
                  </div>
                    </div>

                    

                    
                </div>

                <!-- end of row 1 -->

                 <div class="row">

                     <div class="col">
                          <div class="form-group">
                    <label for="exampleFormControlInput1">Job Type</label>
                     <select class="form-control" name="job_type">
                      <option>Select</option>
                      <option value="hybrid">Hybrid</option>
                      <option value="remote">Remote</option>
                      <option value="office">Office</option>
                     
                    </select>
       
                  </div>
                    </div>

                     <div class="col">
                          <div class="form-group">
                    <label for="exampleFormControlInput1">Salary</label>
        <input type="text" name="salary" class="form-control" placeholder="Salary" required>
                  </div>
                    </div>

                </div>

                <div class="row">

                  
                     <div class="col">
                          <div class="form-group">
                    <label for="exampleFormControlInput1">Duties</label>
        <textarea class="form-control" name="duties" placeholder="Responsibilitie" rows="3"></textarea>
                  </div>
                    </div>
                  

                  
                     <div class="col">
                          <div class="form-group">
                    <label for="exampleFormControlInput1">Note</label>
                     <textarea class="form-control" name="note" placeholder="Note" rows="3"></textarea>
        
                  </div>
                    </div>
                  
                  
                </div>
                   

                <button type="submit" class="btn btn-primary" name="laliga">Submit</button>
               </form> 