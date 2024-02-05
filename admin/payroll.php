<?php

include("../functions.php");
$ch = new Business();

if(isset($_POST['laliga'])){

    $employee = $ch->testInput($_POST['employee']);
    $over_time = $ch->testInput($_POST['over_time']);
    $bonus = $ch->testInput($_POST['bonus']);
    $deduction = $ch->testInput($_POST['deduction']);

    // $residence = $ch->testInput($_POST['residence']);
    // $address = $ch->testInput($_POST['address']);
    // $city = $ch->testInput($_POST['city']);
    // $region = $ch->testInput($_POST['region']);

    // $gender = $ch->testInput($_POST['gender']);
    // $emp_status = $ch->testInput($_POST['status']);
    // $department = $ch->testInput($_POST['department']);
    // $email = $ch->testInput($_POST['email']);

    


    // $picture = $_FILES['photo']['name'];
  // var_dump($picture);
  

 
    $laliga = $ch->payroll($employee,$over_time,$bonus,$deduction);
    if($laliga){
      $msg = '<div class="alert alert-success" role="alert">Payroll Prepared</div>';
    }else {
      $msg = '<div class="alert alert-danger" role="alert">Failed in preparing payroll</div>';
    }
  

}
// end of laliga news



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

            .interview{
                background-color:rgb(255, 255, 255);
                height: 500px;
                padding-top: 3%;
                display: none;
            }

            .training{
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
                <p>PayRoll</p>


            <li>
                <a href="#" id="appointment" data-target="one" class="test">Set PayRoll</a>
            </li>

            <!--  <li>
                <a href="#" id="interview" data-target="three" class="test">Interview</a>
            </li>

             <li>
                <a href="#" id="training" data-target="four" class="test">Trainings</a>
            </li>

             <li>
                <a href="#" id="safety" data-target="five" class="test">Safety</a>
            </li> -->

            <li>
                <a href="#" id="event" data-target="two" class="test">View PayRoll</a>
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

            <h2>Employee PayRoll</h2>

            <div class="container appointment show" id="one">
              <!-- <div id="message"></div> -->
              <?php
                if(isset($msg)){
                  echo $msg;
                }
              ?>
               <form method="post" id="appoint">

                <div class="row">

                    <div class="col">
                          <div class="form-group">
                    <label for="exampleFormControlInput1">Employee Name</label>
        <input type="text" name="employee" class="form-control"  placeholder="First Name" required>
                  </div>
                    </div>

                   
                     <div class="col">
                          <div class="form-group">
                    <label for="exampleFormControlInput1">Overtime(hrs)</label>
    <input type="number" class="form-control" name="over_time" placeholder="Overtime hours" required>
                   
                
        
                  </div>
                    </div>

                     <div class="col">
                          <div class="form-group">
                    <label for="exampleFormControlInput1">Bonus</label>
        <input type="number" name="bonus" class="form-control"  placeholder="Bonus" required>
                  </div>
                    </div>

                     <div class="col">
                          <div class="form-group">
                    <label for="exampleFormControlInput1">Deductions</label>
        <input type="number" name="deduction" class="form-control"  placeholder="Bonus" required>
                  </div>
                    </div>

                    
                </div>

                <!-- end of row 1 -->

                <!--  <div class="row">

                     <div class="col">
                          <div class="form-group">
                    <label for="exampleFormControlInput1">Place of Residence</label>
        <input type="text" name="residence" class="form-control"  placeholder="Residence" required>
                  </div>
                    </div>

                      <div class="col">
                          <div class="form-group">
                    <label for="exampleFormControlInput1">House Address</label>
        <input type="text" name="address" class="form-control"  placeholder="House Address" required>
                  </div>
                    </div>

                     <div class="col">
                          <div class="form-group">
                    <label for="exampleFormControlInput1">City</label>
        <input type="text" name="city" class="form-control"  placeholder="City" required>
                  </div>
                    </div>


                     <div class="col">
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
                    </div>

                </div>
                    -->

                    


                   



                <!--  <div class="row">

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
                    <label for="exampleFormControlInput1">Email</label>
                    <input type="email" class="form-control" name="email" required placeholder="Email">
                        
                  </div>
                    </div>

                </div>
                     -->
               <!--      
                <div class="form-group">
                   <label>Picture</label>
                <input type="file" name="photo" class="form-control-file" id="upload" required>
                   </div> -->

                
                <button type="submit" class="btn btn-primary" name="laliga">Submit</button>
               </form> 
            </div>

                   


            <div class="container event" id="two">

               <table class="table">

            <thead>
              <tr>
                
                <th scope="col">Employee</th>
                <th scope="col">Overtime(hrs)</th>
                <th scope="col">Bonus</th>
                <th scope="col">Deduction</th>
                <th scope="col">NetPay</th>
                <!-- <th scope="col">Email Employee</th> -->
                <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody></tbody>

            </table>
              
            </div>

            <!-- <div class="container interview" id="three">

                <form method="post">

                    <div class="form-group">
                        <label>email</label>
                        <input type="email" class="form-control" name="">
                    </div>
                    
                </form>
                
            </div>
 -->
            <!--  <div class="container training" id="four">

                <form method="post">

                    <div class="form-group">
                        <label>email</label>
                        <input type="email" class="form-control" name="">
                    </div>
                    
                </form>
                
            </div> -->

             <!-- <div class="container safety" id="five">

                <form method="post">

                    <div class="form-group">
                        <label>email</label>
                        <input type="email" class="form-control" name="">
                    </div>
                    
                </form>
                
            </div>
 -->

               
             

            <!-- end of div -->

        </div>
        <!-- end of  content -->
           
    </div>
    <!-- end of wrapper -->

    <?php  

        if (isset($_POST['send'])) {
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $msg = $_POST['message'];

            $send_email = mail($email, $subject, $msg);
            if ($send_email) {
                $msg = '<div class="alert alert-success" role="alert">Email sent</div>';
            }else {
                $msg = '<div class="alert alert-danger" role="alert">Email failed to send</div>';
            }
        }

    ?>

    <!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
                <?php 

                if (isset($msg)) {
                    echo $msg;
                }

                ?>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form method="post">

              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="Email">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Subject</label>
                <input type="text" name="subject" class="form-control" placeholder="Subject">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Message</label>
          <textarea class="form-control" name="message" rows="3"></textarea>
               
              </div>



               

            

            

              <button type="submit" name="send" class="btn btn-primary">Submit</button>
            </form>

          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>
        </div>
      </div>
    </div>
    <!-- modal -->

                


           

          

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

        // display all featured news
        $(document).ready(function(){

$.ajax({
 url:"payroll_ajax.php",
 type:"get",
 dataType:"JSON",
 success:function(response){
   console.log(response);
     var len = response.length;
     for (var i = 0; i < len; i++) {

           var edit = response[i]['edit'];
         var my_delete  = response[i]["delete"];

         var action = edit.concat(" ", my_delete);

         var employee = response[i]["employee"];

         var overtime = response[i]["overtime"];
       
         var  bonus = response[i]["bonus"];
         var  deduction = response[i]["deduction"];
         var net_pay= "15";
         // var  gender = response[i]["gender"];
         // var  email_icon = response[i]["email_icon"];

         var table_str = "<tr>" +
                      
                      
                      "<td>" + employee + "</td>" +
                      "<td>" + overtime + "</td>" +
                    
                      "<td>" + bonus + "</td>" +
                      "<td>" + deduction + "</td>" +
                      "<td>" + net_pay + "</td>" +
                      
                      "<td>" + action + "</td>" +
                      "</tr>";


              $(".table tbody").append(table_str);

            }
             
          },
          error:function(response){
            console.log("Error: "+ response);
          }
      
          });  

      });

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