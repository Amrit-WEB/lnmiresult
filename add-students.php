<?php
    include('includes/config.php');
    if(isset($_REQUEST['studentSubmitButton'])){
            //checking each field of form is filled or not
            if(($_REQUEST['studentname'] == "") || ($_REQUEST['course'] == "") || ($_REQUEST['rollno'] == "") || ($_REQUEST['fromsession'] == "") || ($_REQUEST['tosession'] == "")){
                $msg = '<div class="after-msg unfill-msg"><i class="fas fa-exclamation-circle"></i> Please,Fill All Fields.</div>';
            }
            else{   
                    //assigning from inputed values in declared variables
                    $student_name = $_REQUEST['studentname'];
                    $course_name = $_REQUEST['course'];
                    $roll_no = $_REQUEST['rollno'];
                    $session_from = $_REQUEST['fromsession'];
                    $session_to = $_REQUEST['tosession'];
                    
                    //matchig with database that student is already exist or not
                    $testsql = "SELECT * FROM studenttable WHERE rollno = $roll_no";
                    $testrun = $dbh->query($testsql)->rowcount();
    
                

                    if($testrun == 1){
                        $msg = '<div class="after-msg err-msg"><i class="fas fa-exclamation-circle"></i> Student Already Exist.</div>';
                    }
                    else{

                          //SQL query for inserting data
                          $sql = "INSERT INTO studenttable (studentName,course,rollno,fromSession,toSession) VALUES ('$student_name','$course_name',$roll_no,$session_from,$session_to)";

                          if($dbh->query($sql) == TRUE){
                              $msg = '<div class="after-msg success-msg"><i class="fas fa-check-circle"></i> Student Added Successfully.</div>';
                
                          }else{
                              $msg = '<div class="after-msg unsuccess-msg"><i class="fas fa-times-circle"></i> Unable To Add Student.</div>';   
                          }
                    }
            }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Result Dashboard || LNMI Patna</title>
    
    <link rel="stylesheet" href="./css/dashboard.css" />
    <style>
    
.working_title{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
}
.add_student{
    margin: 0 15px;
}
.fa-arrow-left{
    color:#464545;
    background-color: #5eaaa8;
    padding: 3px;
    
    border-radius: 10px;

}
.working_area{
    display: flex;
    flex-direction: column;
    align-items:center;
}
.after-msg{
    padding: 2px 7px;
    width: fit-content;
    border-radius: 20px;
}
.unfill-msg,.err-msg,.unsuccess-msg{
    background-color: #ff9e2f;
    color: #8b1a00;
    
}
.success-msg{
  background-color: greenyellow;
    color: darkcyan;
}
form{
  background-color: cadetblue;
  padding:2%;
  margin:7% auto;
  border-bottom: 1px solid gainsboro;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.form-group{
  display:flex;
  flex-direction:row;
  justify-content:space-between;
  margin:2%;
  color:white;
  font-size:20px;
}
.form-group > input,select{
  border:none;
  background:none;
  border-bottom: 1px solid gainsboro;
}
.form-group > button{
    background: #5eaaa8;
    margin-top: 20px;
    padding: 10px;
    border: 2px solid #f8f1f1;
    border-radius: 3px;
    color: #f8f1f1;
    letter-spacing: 2px;
    box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ;
    


}
    </style>
    
    <link
      rel="shortcut icon"
      href="./css/img/favicon_io/favicon.ico"
      type="image/x-icon"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
      integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="wrapper">
      <div class="header">
        <div class="headtitle">
          <img src="./css/img/lnmi-logo.png" alt="LNMI_ADMIN_PORTAL" />
        </div>
        <div class="logout">
          <a href="logout.php"><i class="fas fa-sign-out-alt"> LogOut</i></a>
        </div>
      </div>
      <div class="main">
        <div class="left_panel">
          <a href="dashboard.php" class="nav-a"
            ><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
          </a>
          <a href="manage-students.php" class="nav-a nav_active"
            ><i class="fa fa-bars"></i> <span>Student Details</span></a
          >

          <a href="add-result.php" class="nav-a"
            ><i class="fa fa-bars"></i> <span>Add Result</span></a
          >
          <a href="manage-results.php" class="nav-a"
            ><i class="fa fa fa-server"></i> <span>Manage Result</span></a
          >

          <a href="change-password.php" class="nav-a"
            ><i class="fa fa fa-server"></i>
            <span> Change Admin Password</span></a
          >
        </div>
        <div class="working_panel">
          <div class="working_title">
            <h3>Add Student Details</h3>
            <div class="add_student">
                <a class = " add-btn" href="manage-students.php"><i class="fas fa-arrow-left"></i></a>
              </div>
          </div>
          
          <div class="working_area">
          <?php
                     if(isset($msg)){
                        echo $msg;
                     }   
                ?>
            <form method="post" action="">
                <div class="form-group">
                    <label for="studentname">Student Name :</label>
                    <input type="text" class="form-control" name="studentname">
                </div>
                <div class="form-group">
                    <label for="course">Course :</label>
                    <select name="course">
                        <option value=""></option>
                        <option value="BCA">BCA</option>
                        <option value="BBA">BBA</option>
                    </select>
                    
                </div>
                <div class="form-group">
                    <label for="rollno">Roll No.:</label>
                    <input type="text" class="form-control" name="rollno">
                </div>
                <div class="form-group">
                    <label for="session">Session:</label>
                    <input type="text" class="form-control" name="fromsession">
                    to<input type="text" class="form-control" name="tosession">
                </div>
                <div class="form-group">
                    <button class="submit-btn" name="studentSubmitButton">Submit</button>
                </div>
                

            </form>
              
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="copyright">
          © 2021 LNMI Patna | Proudly Designed By S.A.R Group
        </div>
      </footer>
    </div>
  </body>
</html>