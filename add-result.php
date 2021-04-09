<?php
    include('includes/config.php');

    if(isset($_REQUEST['result-btn'])){
      
        $roll_no = $_REQUEST['rollno'];
        $course_name = $_REQUEST['course'];
        $sem = $_REQUEST['semester'];
        $pone = $_REQUEST['paperone'];
        $ptwo = $_REQUEST['papertwo'];                   
        $pthree = $_REQUEST['paperthree'];
        $pfour = $_REQUEST['paperfour'];
        $pfive = $_REQUEST['paperfive'];
        $psix = $_REQUEST['papersix'];
        
        if($roll_no=="" ||  $course_name=="" || $sem=="" || $pone=="" || $ptwo=="" || $pthree=="" || $pfour=="" || $pfive=="" || $psix==""){
          $msg = '<div class="after-msg unfill-msg"><i class="fas fa-exclamation-circle"></i> Please,Fill All Fields.</div>';
        }
        else{     
                    //verifying that adding result of student is firstly added in student database or not

                    $testsql = "SELECT * FROM studenttable WHERE rollno = $roll_no ";
                    $testrun = $dbh->query($testsql)->rowcount();
                    
                    if($testrun == 0){
                        $msg = '<div class="after-msg warning-msg"><i class="fas fa-exclamation-triangle"></i>'.$_REQUEST['rollno'].' is not present in our database.<a href="add-students.php">Click here</a> to add student first, and then declare result</div>';
                    }else{  
                            
                            $samecorsql ="SELECT * FROM studenttable WHERE course='$course_name' AND rollno=$roll_no";
                            $run = $dbh->query($samecorsql)->rowcount();
                            if($run == 0){
                              $msg = '<div class="after-msg warning-msg"><i class="fas fa-exclamation-circle"></i> Cannot Upload Same Roll For Different Courses.</div>';
                            }else{
                              $existsql = "SELECT * FROM resulttable WHERE rollno=$roll_no AND semester='$sem'";
                              $existsqlrun = $dbh->query($existsql)->rowcount();
                              if($existsqlrun == 1){
                              $msg = '<div class="after-msg warning-msg"><i class="fas fa-exclamation-circle"></i> Result Already Declared.</div>';
                              }else{
                                //inserting data in result table
                                $sql = "INSERT INTO resulttable (semroll,rollno,course,semester,subone,subtwo,subthree,subfour,subfive,subsix) VALUES('$sem$roll_no',$roll_no,'$course_name','$sem',$pone,$ptwo,$pthree,$pfour,$pfive,$psix)";
                                if($dbh->query($sql)==TRUE){
                                $msg='<div id="alert" class="after-msg success-msg"><i class="fas fa-check-circle"></i> Result Added Successfully.</div>';

                                }else{
                                $msg = '<div id="alert" class="after-msg unsuccess-msg"><i class="fas fa-check-circle"></i> Delete Successfully.</div>';
                            }
                            }
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
    <style>
      .working_area{
    display: flex;      
    flex-direction: column;
        align-items: center;
}

.after-msg{
    
    padding: 2px 7px;
    width: fit-content;
    border-radius: 20px;
}
.success-msg{
    background-color: greenyellow;
    color: darkcyan;
}
.unsuccess-msg,.warning-msg,.unfill-msg{
    background-color: #ff9e2f;
    color: #8b1a00;
}
form{
    background-color: cadetblue;
    width:40%;
    padding:2%;
    margin:1% auto;
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
          <a href="manage-students.php" class="nav-a"
            ><i class="fa fa-bars"></i> <span>Student Details</span></a
          >

          <a href="add-result.php" class="nav-a nav_active"
            ><i class="fa fa-bars"></i> <span>Add Result</span></a
          >
          <a href="manage-results.php" class="nav-a"
            ><i class="fa fa fa-server"></i> <span>Result Details</span></a
          >

          <a href="change-password.php" class="nav-a"
            ><i class="fa fa fa-server"></i>
            <span> Change Admin Password</span></a
          >
        </div>
        <div class="working_panel">
          <div class="working_title">
            <h3>Add Result</h3>
          </div>
          <div class="working_area">
                <?php
                    if(isset($msg)){
                        echo $msg;
                    }
                ?>
                <form action="" method="POST">
                    
                        <div class="form-group">
                            <label>Roll No:</label>
                            <input type="text" name="rollno" placeholder="Enter Roll No.">
                        </div>
                        <div class="form-group">
                            <label>Course</label>
                            <select name="course">
                                <option value="">Select</option>
                                <option value="BCA">BCA</option>
                                <option value="BBA">BBA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="semester">Semester:</label>
                            <select name="semester">
                                <option value="">Select</option>
                                <option value="First">1st</option>
                                <option value="Second">2nd</option>
                                <option value="Third">3rd</option>
                                <option value="Fourth">4th</option>
                                <option value="Fifth">5th</option>
                                <option value="Sixth">6th</option>
                            </select>
                        </div>
                    
                    
                        <div class="form-group">
                            <label for="subject">Paper 1</label>
                            <input type="text" name="paperone" placeholder="Marks Out of 100">
                        </div>
                        <div class="form-group">
                            <label for="subject">Paper 2</label>
                            <input type="text" name="papertwo" placeholder="Marks Out of 100">
                        </div>
                    
                    
                        <div class="form-group">
                            <label for="subject">Paper 3</label>
                            <input type="text" name="paperthree" placeholder="Marks Out of 100">
                        </div>
                        <div class="form-group">
                            <label for="subject">Paper 4</label>
                            <input type="text" name="paperfour" placeholder="Marks Out of 100">
                        </div>
                    
                    
                        <div class="form-group">
                            <label for="subject">Paper 5</label>
                            <input type="text" name="paperfive" placeholder="Marks Out of 100">
                        </div>
                        <div class="form-group">
                            <label for="subject">Paper 6</label>
                            <input type="text" name="papersix" placeholder="Marks Out of 100">
                        </div>
                    
                    <div class="form-group">
                        <button name="result-btn">Declare Result</button>
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
