<?php

include("../functions.php");
$ch = new Business();

if(isset($_POST['laliga'])){
    // customer data
    $employee = $ch->testInput($_POST['employee']);
    $working_date = $ch->testInput($_POST['working_date']);
    $time_in = $ch->testInput($_POST['time-in']);
    $time_out = $ch->testInput($_POST['time-out']);

    


    $laliga = $ch->Attendance($employee,$working_date,$time_in,$time_out);
    if($laliga){
      $msg = '<div class="alert alert-success" role="alert">Attendance Added</div>';
    }else {
      $msg = '<div class="alert alert-danger" role="alert">Error in adding Attendance</div>';
    }
  

}
// end of creating invoice

//emailing invoice
if (isset($_POST['send'])) {
    $from = $_POST['your_email'];
    $to = $_POST['cust_email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $send_email = mail($to, $subject, $message);
    if ($send_email) {
        echo "<script>alert('email sent')</script>";
    }else {
        echo "<script>alert('failed to  send email')</script>";

    }
}



?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.css">

    

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/sidestyle.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.css">

    <style type="text/css">

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .appointment{
                background-color:rgb(255, 255, 255);
                height: 500px;
                padding-top: 3%;
                display: none;
            }

        .event{
                background-color:rgb(255, 255, 255);
                height: 500px;
                padding-top: 3%;
                display: none;
            }

        .counselling{

            background-color:rgb(255, 255, 255);
            height: 350px;
            padding-top: 3%;
            display: none;
        }

        .show {
          display: block;
        }


    </style>
    

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>HR</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Attendance</p>


            <li>
                <a href="#" id="appointment" data-target="one" class="test">Add Attendance</a>
            </li>

            <li>
                <a href="#" id="event" data-target="two" class="test">All Attendances</a>
            </li>

         
           
           


            </ul>

           

        </nav>
        <!-- end of sidebar -->

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Toggle Sidebar</span>
                </button>
                
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                    
                </div>
            </nav>

            <h2>Attendance</h2>

            <div class="container appointment show" id="one">
              <!-- <div id="message"></div> -->
              <?php
                if(isset($msg)){
                  echo $msg;
                }
              ?>
               <form method="post" id="appoint">

                

                       <div class="form-group">
                    <label for="exampleFormControlInput1">Employee</label>
        <input type="text" name="employee" class="form-control" id="exampleFormControlInput1" placeholder="Employee Name" required>
                  </div> 

                       <div class="form-group">
                    <label for="exampleFormControlInput1">Date</label>
        <input type="date" name="working_date" class="form-control"  required>
                  </div> 

                  <div class="row">

                    <div class="col">
                        <div class="form-group">
                    <label for="exampleFormControlInput1">Time In</label>
        <input type="time" name="time-in" class="form-control"  required>
                  </div>  
                    </div>

                    <div class="col">
                        <div class="form-group">
                    <label for="exampleFormControlInput1">Time Out</label>
        <input type="time" name="time-out" class="form-control"  required>
                  </div>  
                    </div>
                      
                  </div>
                                
                      
                                

                <!-- end of row -->

              
             <button type="submit" class="btn btn-primary" name="laliga">Submit</button>
               </form> 
            </div>

                   
            <div class="container event" id="two">

               <table class="table">

            <thead>
              <tr>
                
                <th scope="col">Employee</th>
                <th scope="col">Working Date</th>
                <th scope="col">TimeIn</th>
                <th scope="col">TimeOut</th>
               
                <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody>
                <?php

                $details = $ch->displayAttendance();
                foreach ($details as $row) {
                
                ?>

                <tr>
                    <td><?php echo $row['employee']; ?></td>
                    <td><?php echo $row['working_date']; ?></td>
                    <td><?php echo $row['time_in']; ?></td>
                    <td><?php echo $row['time_out']; ?></td>
                </tr>

            <?php } ?>
                
            </tbody>

            </table>
              
            </div>
               
             

            <!-- end of div -->

        </div>
        <!-- end of  content -->
           
    </div>
    <!-- end of wrapper -->

    <?php  

    $data = $ch->getEmail();
    foreach ($data as $row) {
        $admin_email = $row['email'];
    }

    $data =$ch->invoiceEmail();
    
    ?>

     <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Message Contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">

          <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">From</label>
              <div class="col-sm-10">
                <input type="email" name="your_email" class="form-control" id="inputPassword"
                value="<?php echo $admin_email; ?>">
              </div>
            </div>

        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">To</label>
            <div class="col-sm-10">
                <select class="form-control" name="cust_email" id="exampleFormControlSelect1">
                    <?php 

                    foreach ($data as $row) {
                    echo '
                        <option>'.$row['email'].'</option>

                    ';
                }

                    ?>
                  
                </select>
              <!-- <input type="email" name="cust_email" class="form-control" id="inputPassword"> -->
            </div>
          </div>

          <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Subject</label>
              <div class="col-sm-10">
                <input type="text" name="subject" class="form-control" id="inputPassword">
              </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Message</label>
                <div class="col-sm-10">
                 <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                 name="message"></textarea>
                </div>
              </div>

         

          <button type="submit" name="send" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

                


           

          

    <!-- jQuery CDN  -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   
    <!-- Bootstrap JS -->
   <script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });

        // creating an array-like based of child nodes on a specified class name
        var links = document.getElementsByClassName("test");

     //attach click handler to each
        for (var i = 0; i < links.length; i++) {
            links[i].onclick = toggleVisible;
        }

        function toggleVisible(){
                //hide currently shown item
               document.getElementsByClassName('show')[0].classList.remove('show');
               // getting info from custom data-target  set on the element
               var id = this.dataset.target;
               // showing div
               document.getElementById(id).classList.add('show');
        }

        

    var button = document.getElementById("upload");
    button.addEventListener("click", function(){

        online = window.navigator.onLine;


        if (navigator.onLine) {
          // console("onLine");
        } else {
          alert("offline");
        }


    });

  
              


        

           






        


    </script>
</body>

</html>